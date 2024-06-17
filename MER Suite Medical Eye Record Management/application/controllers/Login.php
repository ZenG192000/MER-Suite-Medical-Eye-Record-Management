<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('pasyente_model');
    }

    public function index()
    {
        if ($this->session->userdata('user_info')) {
            redirect('home');
        }
        $username = $this->input->post('Username');
        $login_attempts = $this->login_model->get_login_attempts($username);

        $data['login_attempts'] = $login_attempts;

        $this->form_validation->set_rules('Username', 'Username', 'trim|required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('Username');
            $password = md5($this->input->post('Password')); // Assuming passwords are stored as MD5 hashes
            $recaptcha_response = $this->input->post('g-recaptcha-response');

            // Check if the user is locked out
            $is_locked_out = $this->login_model->is_locked_out($username);

            if ($is_locked_out) {
                // Check if it has been 5 minutes since the last lockout
                $lockout_time = 300; // 5 minutes in seconds
                $last_lock_time = $this->login_model->get_last_lock_time($username);

                if (time() - $last_lock_time >= $lockout_time) {
                    // Reset the lockout and attempt count
                    $this->login_model->reset_lockout($username);
                    $this->login_model->reset_attempts($username);
                } else {
                    if (!empty($recaptcha_response)) {
                        // Verify reCAPTCHA
                        $recaptcha_secret = "6LcQrS0oAAAAAOWji4-Y5Hwz65mVcirN3vGMXCZU"; // Replace with your actual secret key
                        $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
                        $recaptcha_response_data = file_get_contents($recaptcha_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
                        $recaptcha_result = json_decode($recaptcha_response_data);

                        if ($recaptcha_result->success) {
                            // Remove the lockout and reset attempt count
                            $this->login_model->unlock($username);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'reCAPTCHA verification failed.']);
                            return;
                        }
                    } else {
                        echo json_encode(['status' => 'Lockerror', 'message' => 'Account locked. Please verify reCAPTCHA to remove the lock.']);
                        return;
                    }
                }


                $data = array(
                    'Username'      => $username,
                    'Password'      => $password,
                    'Is_Deleted' => 0
                );

                $login = $this->login_model->login($data);

                if ($login) {
                    $this->session->set_userdata('user_info', $login);
                    echo json_encode(['status' => 'success']);
                } else {
                    $user = $this->login_model->get_user_by_username($username);
                
                    if ($user && $user['Is_Deleted'] == 1) {
                        echo json_encode(['status' => 'error', 'message' => 'This account is disabled. Please contact the administrator.']);
                    } else {
                        // Increment login attempts upon failed login
                        $this->login_model->increment_attempts($username);
                        echo json_encode(['status' => 'error', 'message' => 'Username or password is incorrect. Please try again!']);
                    }
                }
            } else {
                $data = array(
                    'Username'      => $username,
                    'Password'      => $password,
                    'Is_Deleted' => 0
                );

                $login = $this->login_model->login($data);

                if ($login) {
                    $this->session->set_userdata('user_info', $login);
                    echo json_encode(['status' => 'success']);
                } else {
                    $user = $this->login_model->get_user_by_username($username);
                
                    if ($user && $user['Is_Deleted'] == 1) {
                        echo json_encode(['status' => 'error', 'message' => 'This account is disabled. Please contact the administrator.']);
                    } else {
                        // Increment login attempts upon failed login
                        $this->login_model->increment_attempts($username);
                        echo json_encode(['status' => 'error', 'message' => 'Username or password is incorrect. Please try again!']);
                    }
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_info');
        redirect('login');
    }

    public function newuser()
    {
        $this->load->view('users/add_users');
    }
}

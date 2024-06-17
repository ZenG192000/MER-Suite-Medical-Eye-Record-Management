<title>MER Suite | Accounts</title>
<?php
if ($this->session->userdata('user_info')) {
    $user_info = $this->session->userdata('user_info');
?>
    <!-- Sidebar -->
    <li id="DB-btn">
        <a id="none" class=" btn btn-block" href="<?php echo site_url('home/index'); ?>">
            <i class="fa-sharp fa-light fa-chart-mixed"></i>
            <div>Dashboard</div>
        </a>
    </li>
    <li id="Bcku-btn" class="dropdown">

        <a id="none" href="#works" class="dropdown-toggle btn btn-block" data-toggle="dropdown">
            <i class="fa-duotone fa-cloud-arrow-up"></i>
            <div>Back-Up</div>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu animated fadeInLeft ml-4" role="menu">
            <!-- <div class="dropdown-header">Dropdown heading</div> -->

            <li>
                <a id="none" href="<?php echo site_url('pasyente/manageBackup'); ?>">
                    <i class="fa-duotone fa-users-medical"></i>PIR
                </a>
            </li>

            <li>
                <a id="none" href="<?php echo site_url('mer/manageBackup'); ?>">
                    <i class="fa-duotone fa-eye"></i>MER
                </a>
            </li>

        </ul>
    </li>
    <li id="usersm-btn" style="background-color: #ffffff;">
        <a id="active" class=" btn btn-block" href="<?php echo site_url('users/manage'); ?>">
            <i class="fa-duotone fa-users-medical" style="color: black;"></i>
            <div style="color: black;">Users Management</div>
        </a>
    </li>
    <!-- <li id="App-Re-btn">
        <a id="none" class=" btn btn-block" href="#">
            <i class="fa-duotone fa-clipboard-list-check" style="--fa-secondary-color: #e8e8e8;"></i>
            <div>Approval Request</div>
        </a>
    </li> -->
    <!-- <li id="Sett-btn">
        <a id="none" class=" btn btn-block" href="#">
            <i class="fa-duotone fa-gear"></i>
            <div>Settings</div>
        </a>
    </li> -->
    <li id="Sgn-Out-btn">
    <a id="none" class=" btn btn-block" href="#" onclick="confirmSignOut()">
      <!-- <i class="fa-duotone fa-chevrons-left" style="--fa-primary-color: #b9a7a7; --fa-primary-opacity: 0.5; --fa-secondary-color: #c5b4b4; --fa-secondary-opacity: 01;"></i> -->
      <i id="signout-i" class="fa-duotone fa-arrow-right-from-bracket fa-rotate-180" style="color: #e6e6e6;"></i>
      <div>Sign Out</div>
    </a>
  </li>

    </div>

    <!-- Toggle Button -->
    <div class="toggle-btn" onclick="toggleSidebar()">
        <span class="fas fa-bars fa-2x"></span>
    </div>

    <!-- Content Area -->
    <div class="content">
        <div class="container-fluid">
            <!-- Right slide window -->
            <div class="row">

                <div class="container-fluid  text-md-right ">
                    <div class="useri-admn-btn">
                        <div class="col-md-12 ">
                            <!--  Admin Dropdown  -->
                            <button type="button" id="useradmbtn" class="btn dropdown-toggle col-md-13 text-md-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url('image/employees_image/' . $user_info->Image); ?>" width="45" height="45" class="rounded-circle"><?= $user_info->Name ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo site_url('users/myprofile') ?>">Profile</a>
                                <a class="dropdown-item" href="#" onclick="showChangePassword()">Change Password</a>
                                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="confirmSignOut()" href="#">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin: auto;">
                    <div class="userm-txt">
                        Users Management
                    </div>
                </div>

                <!-- Button add modal -->
                <div class="container-fluid text-md-right mt-1">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn mb-3" id="modalbtn" style="background-color: transparent;" data-toggle="modal" data-target="#addusermodal">
                            <i class="fa-solid fa-user-plus fa-beat-fade" style="border: none; border-radius: 50%; padding: 10px 13px; background-color: #073f7f;"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-offset-5 col">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col col-sm-3 col-xs-12">
                                            <h4 class="title">Data <span>List</span></h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table id="example1" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>AccessType</th>
                                                <th>DateCreated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <ul id="sides4" class="nav sidebar-nav">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <img src="<?php echo base_url('logo/Elements/Logo.png') ?>" alt="My Image" width="40" height="40">
                    <a href="#">MER Suite</a>
                </div>
            </div>

            <li id="db-btn">
                <a class="nav-link btn btn-block" href="<?php echo site_url('home/index'); ?>">
                    <i class="fa-sharp fa-light fa-chart-mixed"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            <li id="PIR-btn">
                <a class="nav-link btn btn-block" href="<?php echo site_url('pasyente/manageBackup'); ?>">
                    <i class="fa-thin fa-sensor-cloud" style="color: #ffffff;"></i>
                    <div>PIR Back-up</div>
                </a>
            </li>
            <li id="merb-btn">
                <a class="nav-link btn btn-block" href="<?php echo site_url('mer/manageBackup'); ?>">
                    <i class="fa-light fa-table-tree" style="color: #ffffff;"></i>
                    <div>MER Back-up</div>
                </a>
            </li>
            <?php if ($user_info->AccessType == 'Administrator') {  ?>
                <li id="usersm-btn" style="background-color: white;">
                    <a class="nav-link btn btn-block" href="<?php echo site_url('users/manage'); ?>">
                        <i class="fa-duotone fa-users-medical" style="--fa-primary-color: #2f2727; --fa-primary-opacity: 0.5; --fa-secondary-color: #4e4545; --fa-secondary-opacity: 01;"></i>
                        <div style="color: black;"><b>Users Management</b></div>
                    </a>
                </li>
            <?php
            }

            ?>
            <li id="logout-btn">
                <a class="nav-link btn btn-block" href="<?php echo site_url('login/logout') ?>">
                    <i class="fa-duotone fa-chevrons-left" style="--fa-primary-color: #ffffff; --fa-primary-opacity: 0.5; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 01;"></i>
                    Sign out
                </a>
            </li> -->


            <!-- Button for opening new window -->

            <!-- <div class="container text-center mt-5">
              <h1>Responsive Page with Button</h1>
              <p>This is a responsive Bootstrap 4 webpage.</p>
              <button class="btn btn-primary" onclick="openNewWindow()">Open New Window</button>
             </div> -->
            <!-- ---------------------------- -->



            <!-- <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#team">Team</a></li>
            <li class="dropdown">
            <a href="#works" class="dropdown-toggle"  data-toggle="dropdown">Works <span class="caret"></span></a>
          <ul class="dropdown-menu animated fadeInLeft" role="menu">
           <div class="dropdown-header">Dropdown heading</div>
           <li><a href="#pictures">Pictures</a></li>
           <li><a href="#videos">Videeos</a></li>
           <li><a href="#books">Books</a></li>
           <li><a href="#art">Art</a></li>
           <li><a href="#awards">Awards</a></li>
           </ul>
           </li>
           <li><a href="#services">Services</a></li>
           <li><a href="#contact">Contact</a></li>
           <li><a href="#followme">Follow me</a></li> -->
            <!-- 
        </ul>
    </nav> -->






            <!-- Modal -->
            <div class="modal fade" id="addusermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="user-reg-form">User registration Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="userForm">
                                <div class="form-group">
                                    <label id="name-lbl" for="exampleInputName">Name:</label>
                                    <input type="name" class="form-control" id="Name" name="Name" aria-describedby="emailHelp" required>
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>

                                <div class="form-group">
                                    <label id="username-lbl" for="exampleInputUsername">Username:</label>
                                    <input type="text" class="form-control" id="Username" name="Username" required>
                                </div>

                                <div class="form-group">
                                    <label for="Default Password">Default Password</label>
                                    <input type="text" class="form-control" name="Password" id="Password" value="SecretKey_0101" readonly>
                                </div>
                                <!-- <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div> -->
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                <!-- <small id="Access-type" class="form-text text-muted">Access Type</small> -->
                                <div class="form-group">
                                    <label id="AT-lbl" for="exampleFormControlSelect1">Access Type</label>
                                    <select id="AccessType" name="AccessType" class="form-control" id="dropdown">
                                        <option>Administrator</option>
                                        <option>Optometrist</option>
                                        <option>Secretary</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitUser">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby=" exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="editForm">
                            <div class="modal-body">
                                <input type="text" id="id" class="form-control" name="UserID" hidden>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="editName" class="form-control" name="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="editUsername" class="form-control" name="Username" required>
                                </div>

                                <div class="form-group">
                                    <label>AccessType</label>
                                    <select id="editAccess" name="AccessType" class="form-control" placeholder="editAccess" required>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Optometrist">Optometrist</option>
                                        <option value="Secretary">Secretary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    </div>
    </div>
<?php   } ?>
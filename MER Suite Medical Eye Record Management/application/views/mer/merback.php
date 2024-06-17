<title>MER Suite | Mer Back-up</title>
<?php
if ($this->session->userdata('user_info')) {
    $user_info = $this->session->userdata('user_info');
?>
    <?php
    // Assuming $user_info is available and contains user information
    if ($user_info->isFirstLogin == 1) {
        echo "<script>
                let checked = false;

                function checkFirstLogin() {
                    if (!checked) {
                        showChangePasswordModal();
                        checked = true; // Set the flag to true after the first check
                    }
                }

                // Check once every 1 second
                setInterval(checkFirstLogin, 1000);
              </script>";
    }
    ?>
    <!-- Sidebar -->
    <li id="DB-btn">
        <a id="none" class=" btn btn-block" href="<?php echo site_url('home/index'); ?>">
            <i class="fa-sharp fa-light fa-chart-mixed"></i>
            <div>Dashboard</div>
        </a>
    </li>
    <?php if ($user_info->AccessType == 'Optometrist' or $user_info->AccessType == 'Secretary') {  ?>
        <li id="Opto-Repo-btn" class="dropdown">

            <a id="none" href="#works" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa-light fa-table-tree"></i>Repository
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft ml-4" role="menu">
                <!-- <div class="dropdown-header">Dropdown heading</div> -->

                <li>
                    <a id="none" href="<?php echo site_url('pasyente/manage'); ?>">
                        <i class="fa-duotone fa-users-medical"></i>PIR
                    </a>
                </li>
            <?php
        }

            ?>
            <?php if ($user_info->AccessType == 'Optometrist') {  ?>
                <li>
                    <a id="none" href="<?php echo site_url('mer/manage'); ?>">
                        <i class="fa-duotone fa-eye"></i>MER
                    </a>
                </li>

            </ul>
        </li>
    <?php
            }

    ?>
    <?php if ($user_info->AccessType == 'Administrator') {  ?>
        <li id="Bcku-btn" class="dropdown" style="background-color: #ffffff;">

            <a id="active" href="#works" class="dropdown-toggle btn btn-block" style="color: black;" data-toggle="dropdown">
                <i class="fa-duotone fa-cloud-arrow-up" style="color: black;"></i>
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
        <li id="usersm-btn">
            <a id="none" class=" btn btn-block" href="<?php echo site_url('users/manage'); ?>">
                <i class="fa-duotone fa-users-medical" style="color: ffffff;"></i>
                <div>Users Management</div>
            </a>
        </li>
    <?php
    }

    ?>
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
    <?php if ($user_info->AccessType == 'Optometrist') {  ?>
        <li id="Opto-Arcv-btn" class="dropdown">

            <a id="none" href="#works" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa-sharp fa-solid fa-file-zipper"></i>Archived
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft ml-4" role="menu">
                <!-- <div class="dropdown-header">Dropdown heading</div> -->

                <li>
                    <a id="none" href="<?php echo site_url('pasyente/manageArchived'); ?>">
                        <i class="fa-duotone fa-users-medical"></i>PIR
                    </a>
                </li>

                <li>
                    <a id="none" href="<?php echo site_url('mer/manageArchived'); ?>">
                        <i class="fa-duotone fa-eye"></i>MER
                    </a>
                </li>

            </ul>
        </li>
    <?php
    }

    ?>
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
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="content">

        <div class="container-fluid">
            <!-- Right slide window -->
            <div class="row">

                <div class="container-fluid  text-md-right ">
                    <div class="useri-admn-btn container-fluid ">
                        <div class="col-md-12 ">

                            <!-- Button add modal -->
                            <!-- <div class="container text-md-right mt-1">
                          <div class="row">
                            <div class="col-md-12"> -->
                            <!-- Button add modal -->

                            <!-- </div>
                          </div>
                        </div> -->



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
                <div class="col text-center">
                    <div class="userm-txt">
                        MER Back-up
                    </div>
                </div>
                <div class="container-fluid text-md-right mt-1">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="delete-button1" class="btn btn-warning mb-3"><i class="fa-duotone fa-recycle fa-fade fa-xl"></i></button>
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
                                    <table id="example5" class="table">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Mer No.</th>
                                                <th>PIR No.</th>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>SPH OD</th>
                                                <th>CYL OD</th>
                                                <th>AXIS OD</th>
                                                <th>ADD OD</th>
                                                <th>SPH OS</th>
                                                <th>CYL OS</th>
                                                <th>AXIS OS</th>
                                                <th>ADD OS</th>
                                                <th>PD</th>
                                                <th>Lens</th>
                                                <th>RecordedBy</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
<?php   } ?>
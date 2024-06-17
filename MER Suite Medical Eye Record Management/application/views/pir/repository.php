<title>MER Suite | PIR Repository</title>
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
        <li style="background-color: #ffffff;" id="Opto-Repo-btn" class="dropdown">

            <a id="active" href="#works" class="dropdown-toggle btn btn-block" style="color: black;" data-toggle="dropdown">
                <i class="fa-light fa-table-tree" style="color: black;"></i>
                <div>Repository</div>
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
    <?php if ($user_info->AccessType == 'Secretary') {  ?>
        <li>
            <a id="none" href="<?php echo site_url('mer/manageSec'); ?>">
                <i class="fa-duotone fa-eye"></i>MER
            </a>
        </li>
        </ul>
        </li>
    <?php
    }

    ?>
    <!-- <li id="usersm-btn">
        <a id="none" class=" btn btn-block" href="<?php echo site_url('users/manage'); ?>">
            <i class="fa-duotone fa-users-medical" style="color: #ffffff;"></i>
            <div>Users Management</div>
        </a>
    </li> -->
    <?php if ($user_info->AccessType == 'Optometrist') {  ?>
        <li id="App-Re-btn">
            <a id="none" class=" btn btn-block" href="<?php echo site_url('mer/AppReq'); ?>">
                <i class="fa-duotone fa-clipboard-list-check" style="--fa-secondary-color: #e8e8e8;"></i>
                <div>Approval Request</div>
            </a>
        </li>
    <?php
    }

    ?>
    <!-- <li id="Sett-btn">
        <a id="none" class=" btn btn-block" href="#">
            <i class="fa-duotone fa-gear"></i>
            <div>Settings</div>
        </a>
    </li> -->
    <?php if ($user_info->AccessType == 'Secretary') {  ?>
        <li id="App-Re-btn">
            <a id="none" class=" btn btn-block" href="<?php echo site_url('mer/StatusReq'); ?>">
                <i class="fa-duotone fa-clipboard-list-check"></i>
                <div>Status Request</div>
            </a>
        </li>
    <?php
    }

    ?>
    <?php if ($user_info->AccessType == 'Optometrist' or $user_info->AccessType == 'Secretary') {  ?>
        <li id="Opto-GenR-btn" class="dropdown">

            <a id="none" href="#works" class="dropdown-toggle text-center btn btn-block" data-toggle="dropdown">
                <i class="fa-duotone fa-hospital-user "></i>Record <br> Generator
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft ml-4" role="menu">
                <!-- <div class="dropdown-header">Dropdown heading</div> -->

                <li>
                    <a id="none" href="<?php echo site_url('pasyente/GenerateRecord'); ?>">
                        <i class="fa-duotone fa-users-medical"></i>PIR
                    </a>
                </li>

                <li>
                    <a id="none" href="<?php echo site_url('mer/GenerateRecord'); ?>">
                        <i class="fa-duotone fa-eye"></i>MER
                    </a>
                </li>

            </ul>
        </li>
    <?php
    }

    ?>
    <?php if ($user_info->AccessType == 'Optometrist') {  ?>
        <li id="Opto-Arcv-btn" class="dropdown">

            <a id="none" href="#works" class="dropdown-toggle btn btn-block" data-toggle="dropdown">
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

    <!-- Content Area -->
    <div class="content">

        <div class="container-fluid">
            <!-- Right slide window -->
            <div class="row">

                <div class="container-fluid  text-md-right ">


                    <!-- Button add modal -->
                    <!-- <div class="container text-md-right mt-1">
                          <div class="row">
                            <div class="col-md-12"> -->
                    <!-- Button add modal -->

                    <!-- </div>
                          </div>
                        </div> -->



                    <!--  Admin Dropdown  -->
                    <button type="button" id="admn-btn" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('image/employees_image/' . $user_info->Image); ?>" width="45" height="45" class="rounded-circle"><?= $user_info->Name ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('users/myprofile') ?>">Profile</a>
                        <a class="dropdown-item" href="#" onclick="showChangePassword()">Change Password</a>
                        <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" onclick="confirmSignOut()" href="#">Sign Out</a>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="userm-txt">
                        PIR Repository
                    </div>
                </div>


                <!-- Button add modal -->
                <!-- paki ayos yung alignment ng button plus -->
                <div class="container-fluid text-md-right mt-1">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" style="border: none; border-radius: 60px; padding: 10px 13px; margin-bottom: 10px; background-color: #073f7f;" id="modalbtn" data-toggle="modal" data-target="#patientModal">
                                <i class="fa-solid fa-user-plus fa-beat-fade"></i>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- paki ayos yung alignment ng button plus end-->

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
                                    <table id="example2" class="table">
                                        <thead>
                                            <tr>
                                                <th>PIR No.</th>
                                                <th>Patient Name</th>
                                                <th>Date of Birth</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="PIR-ModalLabel" aria-hidden="true">
                    <!-- </div> -->

                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <div class="modal-header">

                                <!-- <div class="col-1"> -->
                                <button id="mdl-xbtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa-duotone fa-circle-xmark fa-fade fa-lg"></i></span>
                                </button>
                                <!-- </div> -->

                            </div>

                            <div class="modal-body">
                                <form>
                                    <div class="container">

                                        <div class="row align-items-center">
                                            <div class="col-md-1">
                                                <img id="mdl-lgo" src="<?= base_url('image/Mer-logs.png') ?>" alt="MER Suite Logo">
                                            </div>
                                            <div class="col">
                                                <h5 class="PIR-modal-title mt-1" id="PIR-ModalLabel">PIR Form</h5>
                                            </div>
                                            <div class="col-md-7 text-end">
                                                <h4 id="NOTC">Rañon Cruz Optical Clinic</h4>
                                            </div>

                                            <div class="col col-12 text-end">
                                                <span id="crnt-dt"></span>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h4 id="pat-info">Patient Information</h4>
                                        </div>

                                        <div class="row">
                                            <div id="PIR-id" class="form-group col-4">
                                                <label for="pirID">PIR ID:</label>
                                                <input type="text" class="form-control" id="PirIDS" name="PirIDS" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-auto">
                                                <label for="lastname">Name:</label>
                                                <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name (Suffix)">
                                            </div>
                                            <div class="form-group col-md-auto mt-2">
                                                <label for="firstname"></label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-auto mt-2">
                                                <label for="middlename"></label>
                                                <input type="text" class="form-control" id="MiddleName" name="MiddleName" placeholder="Middlename (optional)">
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-auto">
                                                <label for="dob">Date of Birth:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="dob" id="dob" placeholder="mm/dd/yyyy" onchange="calculateAge()">
                                                    <div class="input-group-append" id="calendar-icon">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-auto">
                                                <label for="age">Age:</label>
                                                <input type="email" class="form-control" id="Age" name="Age" placeholder="" readonly>
                                            </div>

                                            <!-- <div class="form-group col">
                  <label for="gender">Gender:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                </div> -->

                                            <div class="form-group col-3">
                                                <label class="mb-2" for="gender">Sex:</label>

                                                <select name="Sex" class="custom-select" id="Sex">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>

                                            </div>



                                        </div>

                                        <div class="mt-3">
                                            <h4 id="cntc-dtls">Contact Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="cpnumber">Cellphone:</label>
                                                <input type="text" class="form-control" id="Contact" name="Contact" placeholder="9XXXXXXXXX" pattern="[9]{1}[0-9]{9}" title="Please enter a valid Philippine phone number" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email">Full Address:</label>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="phase-block-lot" placeholder="Phase / Block / Lot" oninput="updateAddress()" required />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="street-sudbv" placeholder="Street / Subdivision" oninput="updateAddress()" required />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="brgy" placeholder="Barangay" oninput="updateAddress()" required />
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="municip" placeholder="Municipality" oninput="updateAddress()" required />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="provnc" placeholder="Province" oninput="updateAddress()" required />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="number" class="form-control" id="zp-cd" placeholder="Zip Code" oninput="updateAddress()" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <textarea class="form-control" id="Address" name="Address" placeholder="Main Street, Your County, and Anytown" hidden></textarea>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4 mt-2">
                                                <label for="recorded-by">Recorded by:</label>
                                                <input type="text" class="form-control" id="RecordedBy" name="RecordedBy" value="<?= $user_info->Name ?>" readonly>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-primary" id="submitPasyente">SAVE</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="editPir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <!-- <div class="col-1"> -->
                            <button id="mdl-xbtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa-duotone fa-circle-xmark fa-fade fa-lg"></i></span>
                            </button>
                            <!-- </div> -->

                        </div>

                        <div class="modal-body">
                            <form id="editPirForm">
                                <div class="container">

                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <img id="mdl-lgo" src="<?= base_url('image/Mer-logs.png') ?>" alt="MER Suite Logo">
                                        </div>
                                        <div class="col">
                                            <h5 class="PIR-modal-title mt-1" id="PIR-ModalLabel">PIR Form Update</h5>
                                        </div>
                                        <div class="col-md-7 text-end">
                                            <h4 id="NOTC">Rañon Cruz Optical Clinic</h4>
                                        </div>

                                        <div class="col col-12 text-end">
                                            <span id="crnt-dt"></span>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <h4 id="pat-info">Patient Information</h4>
                                    </div>
                                    <input type="text" name="edid" class="form-control" id="id" hidden>

                                    <div class="row">
                                        <div class="form-group col-md-auto">
                                            <label for="lastname">Name:</label>
                                            <input type="text" class="form-control" id="edLastName" name="edLastName" placeholder="Last Name (Suffix)">
                                        </div>
                                        <div class="form-group col-md-auto mt-2">
                                            <label for="firstname"></label>
                                            <input type="text" class="form-control" id="edFirstName" name="edFirstName" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-auto mt-2">
                                            <label for="middlename"></label>
                                            <input type="text" class="form-control" id="edMiddleName" name="edMiddleName" placeholder="Middlename (optional)">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-auto">
                                            <label for="dob">Date of Birth:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="eddob" id="eddob" placeholder="mm/dd/yyyy" onchange="calculateAgeed()">
                                                <div class="input-group-append" id="calendar-iconed">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-auto">
                                            <label for="age">Age:</label>
                                            <input type="email" class="form-control" id="edAge" name="edAge" placeholder="" readonly>
                                        </div>

                                        <!-- <div class="form-group col">
<label for="gender">Gender:</label>
<div class="form-check">
<input class="form-check-input" type="radio" name="gender" id="male" value="Male">
<label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
<label class="form-check-label" for="female">Female</label>
</div>
</div> -->

                                        <div class="form-group col-3">
                                            <label class="mb-2" for="gender">Sex:</label>

                                            <select name="edSex" class="custom-select" id="edSex">
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>

                                        </div>



                                    </div>

                                    <div class="mt-3">
                                        <h4 id="cntc-dtls">Contact Details</h4>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="cpnumber">Cellphone:</label>
                                            <input type="text" class="form-control" id="edContact" name="edContact" placeholder="Number">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">Full Address:</label>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" id="phase-block-lot1" placeholder="Phase / Block / Lot" oninput="updateEdAddress()" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" id="street-sudbv1" placeholder="Street / Subdivision" oninput="updateEdAddress()" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" id="brgy1" placeholder="Barangay" oninput="updateEdAddress()" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" id="municip1" placeholder="Municipality" oninput="updateEdAddress()" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" id="provnc1" placeholder="Province" oninput="updateEdAddress()" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="number" class="form-control" id="zp-cd1" placeholder="Zip Code" oninput="updateEdAddress()" required />
                                                </div>
                                            </div>
                                            <textarea type="address" class="form-control" id="edAddress" name="edAddress" oninput="updateEdAddress()" placeholder="Main Street, Your County, and Anytown" hidden></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4 mt-2">
                                            <label for="recorded-by">Recorded by:</label>
                                            <input type="text" class="form-control" id="edRecordedBy" name="edRecordedBy" value="<?= $user_info->Name ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary" id="designBTNS">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editPir2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <!-- <div class="col-1"> -->
                        <button id="mdl-xbtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-duotone fa-circle-xmark fa-fade fa-lg"></i></span>
                        </button>
                        <!-- </div> -->

                    </div>

                    <div class="modal-body">
                        <form id="editPirForm">
                            <div class="container">

                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <img id="mdl-lgo" src="<?= base_url('image/Mer-logs.png') ?>" alt="MER Suite Logo">
                                    </div>
                                    <div class="col">
                                        <h5 class="PIR-modal-title mt-1" id="PIR-ModalLabel">PIR Form</h5>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <h4 id="NOTC">Rañon Cruz Optical Clinic</h4>
                                    </div>

                                    <div class="col col-12 text-end">
                                        <span id="crnt-dt"></span>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h4 id="pat-info">Patient Information</h4>
                                </div>
                                <input type="text" name="edid1" class="form-control" id="id1" hidden>

                                <div class="row">
                                    <div class="form-group col-md-auto">
                                        <label for="lastname">Name:</label>
                                        <input type="text" class="form-control" id="edLastName1" name="edLastName1" placeholder="Last Name (Suffix)" readonly>
                                    </div>
                                    <div class="form-group col-md-auto mt-2">
                                        <label for="firstname"></label>
                                        <input type="text" class="form-control" id="edFirstName1" name="edFirstName1" placeholder="First Name" readonly>
                                    </div>
                                    <div class="form-group col-md-auto mt-2">
                                        <label for="middlename"></label>
                                        <input type="text" class="form-control" id="edMiddleName1" name="edMiddleName1" placeholder="Middlename (optional)" readonly>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-auto">
                                        <label for="dob">Date of Birth:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="eddob1" id="eddob1" placeholder="mm/dd/yyyy" onchange="calculateAgeed()" readonly>
                                            <div class="input-group-append" id="calendar-iconed">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-auto">
                                        <label for="age">Age:</label>
                                        <input type="email" class="form-control" id="edAge1" name="edAge1" placeholder="" readonly>
                                    </div>

                                    <!-- <div class="form-group col">
<label for="gender">Gender:</label>
<div class="form-check">
<input class="form-check-input" type="radio" name="gender" id="male" value="Male">
<label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
<label class="form-check-label" for="female">Female</label>
</div>
</div> -->

                                    <div class="form-group col-3">
                                        <label class="mb-3" for="gender">Sex:</label>

                                        <select name="edSex1" class="form-control" id="edSex1" readonly>
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>

                                    </div>



                                </div>

                                <div class="mt-3">
                                    <h4 id="cntc-dtls">Contact Details</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="cpnumber">Cellphone:</label>
                                        <input type="text" class="form-control" id="edContact1" name="edContact1" placeholder="Number" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email">Full Address:</label>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="phase-block-lot2" placeholder="Phase / Block / Lot" oninput="updateEdAddress1()" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="street-sudbv2" placeholder="Street / Subdivision" oninput="updateEdAddress1()" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="brgy2" placeholder="Barangay" oninput="updateEdAddress1()" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="municip2" placeholder="Municipality" oninput="updateEdAddress1()" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="provnc2" placeholder="Province" oninput="updateEdAddress1()" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="zp-cd2" placeholder="Zip Code" oninput="updateEdAddress1()" required />
                                            </div>
                                        </div>
                                        <textarea type="address" class="form-control" id="edAddress1" name="edAddress1" oninput="updateEdAddress1()" placeholder="Main Street, Your County, and Anytown" hidden></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 mt-2">
                                        <label for="recorded-by">Recorded by:</label>
                                        <input type="text" class="form-control" id="edRecordedBy1" name="edRecordedBy1" readonly>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPir1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col text-center">
                        <h5 class="modal-title" id="patientModalLabel">PIR Form Update</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                        <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #000000;"></i>
                    </button>
                </div>
                <form id="editPirForm">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input type="text" name="edid" class="form-control" id="id" hidden>

                            <div class="container-fluid">
                                <div class="form-group row m-0">
                                    <label for="firstName" class="col-form-label">First Name:</label>
                                    <div class="col-sm-3 p-0 pr-2 pl-2">
                                        <input type="text" name="edFirstName" class="form-control" id="edFirstName">
                                    </div>
                                    <label for="middleName" class="col-form-label">Middle Name:</label>
                                    <div class="col-sm-2 p-0 pr-2 pl-2">
                                        <input type="text" name="edMiddleName" class="form-control" id="edMiddleName">
                                    </div>
                                    <label for="lastName" class="col-form-label">Last Name:</label>
                                    <div class="col-sm-2 p-0 pr-2 pl-2">
                                        <input type="text" name="edLastName" class="form-control" id="edLastName">
                                    </div>
                                </div>
                            </div>


                            <div class="container-fluid mt-2">
                                <label for="dob" class="col-form-label">Date of birth:</label>
                                <div class="form-group row">
                                    <!-- <div class="form-group ml-2"> -->
                                    <div class="col-sm-3 p-0 pr-2 pl-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="eddob" id="eddob" placeholder="mm/dd/yyyy" onchange="calculateAgeed()">
                                            <div class="input-group-append" id="calendar-iconed">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="gender" class="col-form-label">Sex:</label>
                                    <div class="col-sm-2 p-0 pr-2 pl-2">
                                        <select name="edSex" class="custom-select" id="edSex">
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group row"> -->
                                    <label for="cellphone" class="col-form-label">Cellphone #:</label>
                                    <div class="col-sm-3 p-0 pr-2 pl-2">
                                        <input type="number" name="edContact" class="form-control" id="edContact">
                                    </div>
                                    <label for="age" class="col-form-label">Age:</label>
                                    <div class="col-sm-1 p-0 pr-2 pl-2">
                                        <input type="text" class="form-control" id="edAge" name="edAge" readonly>
                                    </div>



                                </div>
                            </div>

                            <div class="container-fluid">
                                <label for="address" class="col-form-label ml-2">Address:</label>
                                <div class="form-group ">
                                    <div class="row ml-2 mr-sm-4">
                                        <textarea name="edAddress" class="form-control" id="edAddress" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="form-group row">
                                    <label for="recordBy" class="col-form-label ml-2">Record By:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="edRecordedBy" class="form-control" id="edrecordBy" value="<?= $user_info->Name ?>" readonly>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletepasyenteModal" tabindex="-1" role="dialog" aria-labelledby=" exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Patient Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="deletepasyenteForm">
                    <div class="modal-body">
                        <input type="text" id="idd" class="form-control" name="idd" hidden>
                        <h5>Are you sure to Delete this Data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Sure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
<?php   } ?>
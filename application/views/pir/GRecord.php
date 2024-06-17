<title>MER Suite | PIR Gen-Record</title>
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
        <li id="Opto-GenR-btn" class="dropdown" style="background-color: #ffffff;">

            <a id="active" href="#works" class="dropdown-toggle text-center btn btn-block" style="color: black;" data-toggle="dropdown">
                <i class="fa-duotone fa-hospital-user " style="color: black;"></i>Record Generator
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
                            <button type="button" id="admn-btn" class="btn dropdown-toggle col-md-13 text-md-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        PIR Record Generator
                    </div>

                </div>


                <!-- Button add modal -->
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="form-row align-items-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadModal">
                                Generated Files
                            </button>
                        </div>
                        <form id="filterForm">
                            <div class="form-row align-items-center">
                                <div class="col-sm-6">
                                </div>
                                <label for="start_date">Start Date:</label>
                                <div class="col-sm-2">
                                    <input type="date" id="start_date" class="form-control" name="start_date" onchange="filterTable2()">
                                </div>
                                <label for="end_date">End Date:</label>
                                <div class="col-sm-2">
                                    <input type="date" id="end_date" class="form-control" name="end_date" onchange="filterTable2()">
                                </div>
                                <a href="#" id="exportButton" class="btn btn-warning mt-2 mb-2" onclick="exportToExcel2()"><i class="fa-solid fa-download fa-fade"></i>Generate</a>
                            </div>
                        </form>
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
                                    <table id="tableforGen2" class="table">
                                        <thead>
                                            <tr>
                                                <th>PIR No.</th>
                                                <th>Patient Name</th>
                                                <th>Date of Birth</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Files List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="filesTable2" class="display">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($files as $file) : ?>
                                            <tr>
                                                <td><?= $file ?></td>
                                                <td>
                                                    <a href="<?= base_url('Pasyente/downloads/') . $file ?>" class="btn btn-primary">Download</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="patientModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
                    <!-- <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="patientModalLabel" aria-hidden="true"> -->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col text-center">
                                    <h5 class="modal-title" id="patientModalLabel">MER Form</h5>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <!-- <span aria-hidden="true">&times;</span> -->
                                    <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #000000;"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- </div> -->
                                <div class="container mt-md-4">
                                    <div class="form-group row">
                                        <label for="pirid" class="col-form-label ml-sm-4">Pir ID:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="autocomplete form-control" oninput="myFunction()" name="PirID" id="PirID">
                                        </div>
                                        <label for="fullname" class="col-form-label ml-sm-4 ">Patient Name:</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="PatientName" id="PatientName" readonly>
                                        </div>

                                        <!-- <label for="status" class="col-form-label offset-md-2 mr-1">Status:</label>
                                        <div class="col mr-5">                                      
                                        <input type="status" id="inputField" class="form-control color-changing-input" placeholder="">
                                        </div> -->

                                        <!-- <label for="lastName" class="col-form-label">Last Name:</label>
                                        <div class="col">
                                        <input type="text" class="form-control" id="lastName">
                                        </div> -->
                                    </div>
                                </div>


                                <div class="container mt-4 mr-md-4">
                                    <div class="form-group row justify-content-end">
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">SPH</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">CYL</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">AXIS</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">ADD</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="OD-tbl" class="container mt-md-4 ml-4">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">
                                        <label for="OD-lbl" class="col-form-label ml-4 mr-4">OD</label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" id="SPHOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOD = -25; $SPHOD <= 15; $SPHOD++) {
                                                    echo "<option value='$SPHOD'>$SPHOD</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" id="CYLOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <input type="od-box" class="form-control" id="AXISOD">
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" name="ADDOD" id="ADDOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($ADDOD = 100; $ADDOD <= 300; $ADDOD += 25) {
                                                    echo "<option value='$ADDOD'>$ADDOD</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>

                                <div id="OS-tbl" class="container mt-md-2 ml-4">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">
                                        <label for="OD-lbl" class="col-form-label ml-4 mr-4">OS</label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" id="SPHOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOS = -25; $SPHOS <= 15; $SPHOS++) {
                                                    echo "<option value='$SPHOS'>$SPHOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" id="CYLOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <input type="os-box" class="form-control" id="AXISOS">
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" id="ADDOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($ADDOS = 100; $ADDOS <= 300; $ADDOS += 25) {
                                                    echo "<option value='$ADDOS'>$ADDOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>


                                <div id="OS-tbl" class="container mt-md-3 ml-2">
                                    <div class="col">
                                        <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                        <div class="form-group row ml-4">
                                            <label for="OD-lbl" class="col-form-label ml-4 mr-4">Lens</label>
                                            <div class="col-4  ml-3 mr-2">
                                                <select type="lens-box" class="form-control" id="Lens">
                                                    <option value=""></option>
                                                    <option value="Single Vision">Single Vision</option>
                                                    <option value="Bifocal (regular)">Bifocal (regular)</option>
                                                    <option value="Bifocal (multicoated)">Bifocal (multicoated)</option>
                                                    <option value="Progressive">Progressive</option>
                                                </select>

                                            </div>
                                            <label for="PD" class="col-form-label ml-5 mr-4 "> PD</label>
                                            <div class="col-4  ml-3">
                                                <input type="pd-box" class="form-control" id="PD">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="container ml-5 mt-5">
                                    <div class="form-group row ml-5">
                                        <label for="recordBy" class="col-form-label ml-4">Recorded By:</label>
                                        <div class="col-3 ">
                                            <input type="text" class="form-control" id="RecordedBy" value="<?= $user_info->Name ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitMer">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edmerModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
                <!-- <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="patientModalLabel" aria-hidden="true"> -->
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col text-center">
                                <h5 class="modal-title" id="patientModalLabel">MER Form Update</h5>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span> -->
                                <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #000000;"></i>
                            </button>
                        </div>
                        <form id="edmerf">
                            <div class="modal-body">
                                <input type="text" name="edMerID" class="form-control" id="edMerID" hidden>
                                <!-- </div> -->
                                <div class="container mt-md-4">
                                    <div class="form-group row">
                                        <label for="pirid" class="col-form-label ml-sm-4">Pir ID:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="autocomplete form-control" oninput="myFunction1()" name="edPirID" id="edPirID">
                                        </div>
                                        <label for="fullname" class="col-form-label ml-sm-4 ">Patient Name:</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="edPatientName" id="edPatientName" readonly>
                                        </div>

                                        <!-- <label for="status" class="col-form-label offset-md-2 mr-1">Status:</label>
                                        <div class="col mr-5">                                      
                                        <input type="status" id="inputField" class="form-control color-changing-input" placeholder="">
                                        </div> -->

                                        <!-- <label for="lastName" class="col-form-label">Last Name:</label>
                                        <div class="col">
                                        <input type="text" class="form-control" id="lastName">
                                        </div> -->
                                    </div>
                                </div>

                                <div class="container mt-4 mr-md-4">
                                    <div class="form-group row justify-content-end">
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">SPH</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">CYL</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">AXIS</label>
                                        </div>
                                        <div class="col-2 ml-4">
                                            <label class=" col-form-label">ADD</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="OD-tbl" class="container mt-md-4 ml-4">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">
                                        <label for="OD-lbl" class="col-form-label ml-4 mr-4">OD</label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" name="edSPHOD" id="edSPHOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOD = -25; $SPHOD <= 15; $SPHOD++) {
                                                    echo "<option value='$SPHOD'>$SPHOD</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" name="edCYLOD" id="edCYLOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <input type="od-box" class="form-control" name="edAXISOD" id="edAXISOD">
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="od-box" class="form-control" name="edADDOD" id="edADDOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($ADDOD = 100; $ADDOD <= 300; $ADDOD += 25) {
                                                    echo "<option value='$ADDOD'>$ADDOD</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>

                                <div id="OS-tbl" class="container mt-md-2 ml-4">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">
                                        <label for="OD-lbl" class="col-form-label ml-4 mr-4">OS</label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" name="edSPHOS" id="edSPHOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOS = -25; $SPHOS <= 15; $SPHOS++) {
                                                    echo "<option value='$SPHOS'>$SPHOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" name="edCYLOS" id="edCYLOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <input type="os-box" class="form-control" name="edAXISOS" id="edAXISOS">
                                        </div>
                                        <label for="email" class="col-form-label ml-1 "></label>
                                        <div class="col-2  ml-4">
                                            <select type="os-box" class="form-control" name="edADDOS" id="edADDOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($ADDOS = 100; $ADDOS <= 300; $ADDOS += 25) {
                                                    echo "<option value='$ADDOS'>$ADDOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>


                                <div id="OS-tbl" class="container mt-md-3 ml-2">
                                    <div class="col">
                                        <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                        <div class="form-group row ml-4">
                                            <label for="OD-lbl" class="col-form-label ml-4 mr-4">Lens</label>
                                            <div class="col-4  ml-3 mr-2">
                                                <select type="lens-box" class="form-control" name="edLens" id="edLens">
                                                    <option value=""></option>
                                                    <option value="Single Vision">Single Vision</option>
                                                    <option value="Bifocal (regular)">Bifocal (regular)</option>
                                                    <option value="Bifocal (multicoated)">Bifocal (multicoated)</option>
                                                    <option value="Progressive">Progressive</option>
                                                </select>

                                            </div>
                                            <label for="PD" class="col-form-label ml-5 mr-4 "> PD</label>
                                            <div class="col-4  ml-3">
                                                <input type="pd-box" class="form-control" name="edPD" id="edPD">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="container ml-5 mt-5">
                                    <div class="form-group row ml-5">
                                        <label for="recordBy" class="col-form-label ml-4">Recorded By:</label>
                                        <div class="col-3 ">
                                            <input type="text" class="form-control" name="edRecordedBy" id="edRecordedBy" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edmerf">Save</button>
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
<title>MER Suite | MER Status</title>
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
                <i class="fa-duotone fa-clipboard-list-check"></i>
                <div>Approval Request</div>
            </a>
        </li>
    <?php
    }

    ?>
    <?php if ($user_info->AccessType == 'Secretary') {  ?>
        <li id="App-Re-btn" style="background-color: #ffffff;">
            <a id="active" class=" btn btn-block" href="<?php echo site_url('mer/StatusReq'); ?>">
                <i class="fa-duotone fa-clipboard-list-check" style="color: black;"></i>
                <div style="color: black;">Status Request</div>
            </a>
        </li>
    <?php
    }

    ?>
    <?php if ($user_info->AccessType == 'Optometrist' or $user_info->AccessType == 'Secretary') {  ?>
        <li id="Opto-GenR-btn" class="dropdown">

            <a id="none" href="#works" class="dropdown-toggle text-center" data-toggle="dropdown">
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
                        Status Request
                    </div>
                </div>


                <!-- Button add modal -->
                <!-- paki ayos yung alignment ng button plus -->
                <!-- <div class="container-fluid text-md-right mt-1">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn mb-3" style="border-radius: 50%; background-color:rgb(0, 0, 0,0.2);" id="modalbtn" data-toggle="modal" data-target="#patientModal">
                                <i class="fa-duotone fa-circle-plus fa-beat" style="--fa-primary-color: #000000; --fa-secondary-color: #000000;"></i>
                            </button>

                        </div>
                    </div>
                </div> -->
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
                                    <table id="example7" class="table">
                                        <thead>
                                            <tr>
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
                                                <th>Comment</th>
                                                <th>RecordedBy</th>
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
        </div>
    </div>
    <div class="modal fade" id="statusModal" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="MER-ModalLabel" aria-hidden="true">
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
                <form id="status">
                    <div class="modal-body">
                        <input type="text" name="edMerID" class="form-control" id="edMerID" hidden>
                        <div class="container">

                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <img id="mdl-lgo" src="<?= base_url('image/Mer-logs.png') ?>" alt="MER Suite Logo">
                                </div>
                                <div class="col">
                                    <h5 class="MER-modal-title mt-1 col-sm-auto" id="MER-ModalLabel">MER Form</h5>
                                </div>
                                <div class="col-md-7 text-end">
                                    <h4 id="NOTC">Rañon Cruz Optical Clinic</h4>
                                </div>

                                <div class="col col-12 text-end">
                                    <span id="crnt-dt">Current Date</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-8"></div>
                                <div class="col col-4 text-end">
                                    <label for="status" class="col-form-label ml-sm-2">Status:</label>
                                    <input type="status" id="edstatus" name="edstatus" class="form-control color-changing-input" readonly>
                                </div>
                            </div>

                            <div class="mt-2">
                                <h4 id="pat-info"></h4>
                            </div>



                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">

                                            <div class="form-group col-md-1">
                                                <label for="pirid" class="form-label">Pir ID:</label>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="text" class="autocomplete form-control" oninput="myFunction1()" name="edPirID" id="edPirID" readonly>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="fullname" class="form-label ">Patient Name:</label>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" name="edPatientName" id="edPatientName" readonly>
                                            </div>



                                        </div>
                                    </div>
                                </div>



                                <!-- 
                <div class="container">
                  <div class="form-group row justify-content-end">
    
                    <div class="col-2">
                      <label class=" col-form-label">SPH</label>
                    </div>
                    <div class="col-2">
                      <label class=" col-form-label">CYL</label>
                    </div>
                    <div class="col-2">
                      <label class=" col-form-label">AXIS</label>
                    </div>
                    <div class="col-2">
                      <label class=" col-form-label">ADD</label>
                    </div>
    
                  </div>
                </div> -->


                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group row justify-content-end">
                                            <div class="col-md-2 ml-md-3">
                                                <label class="col-form-label">SPH</label>
                                            </div>
                                            <div class="col-md-2 ml-md-3">
                                                <label class="col-form-label">CYL</label>
                                            </div>
                                            <div class="col-md-2 ml-md-3">
                                                <label class="col-form-label">AXIS</label>
                                            </div>
                                            <div class="col-md-2 ml-md-3">
                                                <label class="col-form-label">ADD</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- --------------------------- OD ------------------------------- -->

                                <div id="OD-tbl" class="container">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->

                                    <div class="form-group row justify-content-center">
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="OD-lbl" class="col-form-label ml-4">OD</label>

                                        <div class="col-12 col-md-2">
                                            <select type="od-box" class="form-control" id="edSPHOD" name="edSPHOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOD = -25; $SPHOD <= 15; $SPHOD++) {
                                                    echo "<option value='$SPHOD'>$SPHOD</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label"></label>
                                        <div class="col-12 col-md-2">
                                            <select type="od-box" class="form-control" id="edCYLOD" name="edCYLOD">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label"></label>
                                        <div class="col-12 col-md-2">
                                            <input type="od-box" class="form-control" id="edAXISOD" name="edAXISOD">
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label"></label>
                                        <div class="col-12 col-md-2">
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

                                <!-- --------------------------- O D END ------------------------------- -->






                                <!-- --------------------------- O S ------------------------------- -->

                                <div id="OS-tbl" class="container">
                                    <!-- <div class="row">      -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="OD-lbl" class="col-form-label ml-4">OS</label>

                                        <div class="col-12 col-md-2">
                                            <select type="os-box" class="form-control" id="edSPHOS" name="edSPHOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($SPHOS = -25; $SPHOS <= 15; $SPHOS++) {
                                                    echo "<option value='$SPHOS'>$SPHOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label  "></label>
                                        <div class="col-12 col-md-2">
                                            <select type="os-box" class="form-control" id="edCYLOS" name="edCYLOS">
                                                <option value=""></option>
                                                <?php
                                                // Generate age options dynamically using PHP
                                                for ($CYLOS = -25; $CYLOS >= -400; $CYLOS--) {
                                                    echo "<option value='$CYLOS'>$CYLOS</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label  "></label>
                                        <div class="col-12 col-md-2">
                                            <input type="os-box" class="form-control" id="edAXISOS" name="edAXISOS">
                                        </div>
                                        <!-- -------------------------------------------------------------------------- -->
                                        <label for="email" class="col-form-label "></label>
                                        <div class="col-12 col-md-2">
                                            <select type="os-box" class="form-control" id="edADDOS" name="edADDOS">
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

                                <!-- --------------------------- OS END ------------------------------- -->



                                <!-- ---------------------- LENS ------------------------------ -->

                                <div id="OS-tbl" class="container ">
                                    <!-- <div class="col"> -->
                                    <!-- <label for="OD-lbl" class="col-form-label col ml-md-5">OD</label> -->
                                    <div class="form-group row justify-content-center">

                                        <label for="OD-lbl" class="col-form-label">Lens</label>

                                        <div class="col-12 col-md-4">
                                            <select type="lens-box" class="form-control" id="edLens" name="edLens">
                                                <option value=""></option>
                                                <option value="Single Vision">Single Vision</option>
                                                <option value="Bifocal (regular)">Bifocal (regular)</option>
                                                <option value="Bifocal (multicoated)">Bifocal (multicoated)</option>
                                                <option value="Progressive">Progressive</option>
                                            </select>

                                        </div>

                                        <label for="PD" class="col-form-label "> PD</label>
                                        <div class="col-12 col-md-4">
                                            <input type="pd-box" class="form-control" id="edPD" name="edPD">
                                        </div>

                                    </div>
                                    <!-- </div> -->
                                </div>
                                <div class="form-group col">
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control" rows="3" name="edComment" id="edComment" readonly placeholder="Comments..."></textarea>
                                    </div>
                                </div>
                                <!-- ---------------------- LENS END ------------------------------ -->


                                <div class="container ml-5 mt-5">
                                    <div class="form-group row ml-5">
                                        <label for="recordBy" class="col-form-label ml-4">Recorded By:</label>
                                        <div class="col-5 ">
                                            <input type="text" class="form-control" id="edRecordedBy" name="edRecordedBy" value="<?= $user_info->Name ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button id="edmerf" type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
    </div>
    <div class="modal fade" id="statusModal1" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
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
                <form id="status">
                    <div class="modal-body">
                        <input type="text" name="edMerID" class="form-control" id="edMerID" hidden>
                        <!-- </div> -->
                        <div class="container mt-md-4">
                            <div class="form-group row">
                                <label for="pirid" class="col-form-label ml-sm-2">Pir ID:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="autocomplete form-control" oninput="myFunction1()" name="edPirID" id="edPirID">
                                </div>
                                <label for="fullname" class="col-form-label ml-sm-2 ">Patient Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="edPatientName" id="edPatientName" readonly>
                                </div>

                                <label for="status" class="col-form-label ml-sm-2">Status:</label>
                                <div class="col mr-3">
                                    <input type="status" id="edstatus" name="edstatus" class="form-control color-changing-input" readonly>
                                </div>

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
                                <label for="comment" class="col-form-label ml-4">Comment:</label>
                                <div class="col-8 ">
                                    <textarea type="text" class="form-control" name="edComment" id="edComment" readonly></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="container ml-5 mt-5">
                            <div class="form-group row ml-5">
                                <label for="recordBy" class="col-form-label ml-4">Recorded By:</label>
                                <div class="col-4 ">
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
    <!-- /#page-content-wrapper -->

    </div>
<?php   } ?>
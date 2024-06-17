<title>MER Suite | Home</title>

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
  <li id="DB-btn" style="background-color: #ffffff;">
    <a id="active" class=" btn btn-block" href="<?php echo site_url('home/index'); ?>">
      <i class="fa-sharp fa-light fa-chart-mixed" style="color: black;"></i>
      <div style="color: black;">Dashboard</div>
    </a>
  </li>
  <?php if ($user_info->AccessType == 'Optometrist' or $user_info->AccessType == 'Secretary') {  ?>
    <li id="Opto-Repo-btn" class="dropdown">

      <a id="none" href="#works" class="dropdown-toggle btn btn-block" data-toggle="dropdown">
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
  <?php if ($user_info->AccessType == 'Administrator') {  ?>
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
    <li id="usersm-btn">
      <a id="none" class=" btn btn-block" href="<?php echo site_url('users/manage'); ?>">
        <i class="fa-duotone fa-users-medical" style="color: #ffffff;"></i>
        <div>Users Management</div>
      </a>
    </li>
  <?php
  }

  ?>
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

        <div class="container-fluid">
          <div class="row text-center">
            <div class="userm-txt">
              <h1 id="helo-lbl">Hello <?= $user_info->Name ?>!</h1>
            </div>
          </div>
        <?php
      }

        ?>
        <?php if ($user_info->AccessType == 'Administrator') {  ?>
          <div id="bg-lightblue" class="container-fluid bg-lightblue">
            <div class="container-fluid text-left">
              <h2 id="ttal-pats">Total of Users
                <p class="pl-5"><?php
                                if (isset($users)) {
                                  echo sizeof($users);
                                } else {
                                  echo 0;
                                } ?>
                </p>
              </h2>
            </div>
            <div class="row">

              <!-- First blue box -->
              <div class="col-sm-6 bg-blue mb-3">
                <div id="con1" class="container-fluid text-center pt-5">
                  <h3>New Users</h3>
                  <h3><?php
                      if (isset($newusers)) {
                        echo sizeof($newusers);
                      } else {
                        echo 0;
                      } ?>
                  </h3>
                </div>
              </div>

              <!-- Second blue box -->
              <div class="col-sm-6 bg-blue mb-3">
                <div id="con2" class="container-fluid text-center pt-5">
                  <h3>Old Users</h3>
                  <h3><?php
                      if (isset($oldusers)) {
                        echo sizeof($oldusers);
                      } else {
                        echo 0;
                      } ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <!-- ----------------------------- -->

      <!-- <div class="red-arrow">               
                    <i id="red-arrow" class="fa-regular fa-arrow-trend-down"></i>                    
                </div> -->

      <!-- System Performance -->


    </div>

    <!-- <div class="container-fluid mt-5 pl-4">
      <div class="sys-per">
        <div class="sys-black">System Performance</div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="lightblue-egg">
            <div class="act-logs">Activity logs</div>
            <div class="pie animate" style="--p:67;--c:#2ebe0e"> 67%</div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="yellow-egg">
            <div class="sto-used">Storage Used</div>
            <div class="pie animate" style="--p:46;--c:#3211c5"> 46%</div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="blue-egg">
            <div class="sto-avail">Storage Availability</div>
            <div class="pie animate" style="--p:15;--c:#c51111"> 15%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="red-egg">
            <div class="security">Security</div>
            <div class="pie animate" style="--p:67;--c:#00ccd3"> 67%</div>
          </div>
        </div>
      </div> -->
    <div class="container">
      <div class="row">
        <div class="col-md-2 mt-5">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="intervalDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span id="selectedInterval">Weekly</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="intervalDropdown">
              <a class="dropdown-item" href="#" onclick="Charts.updateData('weekly')">Weekly</a>
              <a class="dropdown-item" href="#" onclick="Charts.updateData('monthly')">Monthly</a>
              <a class="dropdown-item" href="#" onclick="Charts.updateData('yearly')">Yearly</a>
            </div>
          </div>
        </div>
        <div class="col-md-10 mt-5">
          <div class="chart-container">
            <canvas id="weeklyChart"></canvas>
          </div>
        </div>
      </div>
    </div>




    <!-----------  PIE CHARTS  ----------->






  </div>
<?php
        }

?>

<?php {

?>
  <?php if ($user_info->AccessType == 'Optometrist' or $user_info->AccessType == 'Secretary') {  ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-7">
          <div id="bg-lightblue" class="container-fluid bg-lightblue">
            <div class="container-fluid text-left">
              <h2 id="ttal-pats">Total of Patients
                <p class="pl-5"><?php
                                if (isset($pasyentes)) {
                                  echo sizeof($pasyentes);
                                } else {
                                  echo 0;
                                } ?></p>
              </h2>
            </div>


            <div class="row">

              <!-- First blue box -->
              <div class="col-sm-6 bg-blue mb-3">
                <div id="con1" class="container-fluid text-center pt-5">
                  <h3>New Patients</h3>
                  <h3><?php
                      if (isset($newpasyentes)) {
                        echo sizeof($newpasyentes);
                      } else {
                        echo 0;
                      } ?></h3>
                </div>
              </div>

              <div class="col-sm-6 bg-blue mb-3">
                <div id="con2" class="container-fluid text-center pt-5">
                  <h3>Old Patients</h3>
                  <h3><?php
                      if (isset($oldpasyentes)) {
                        echo sizeof($oldpasyentes);
                      } else {
                        echo 0;
                      } ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if ($user_info->AccessType == 'Optometrist') {  ?>
          <div class="col-sm-5">
            <div class="table-responsive">
              <table>
                <thead id="mabebe">
                  <tr>
                    <th>Approval Queue</th>
                    <th id="hidetbody">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th id="hidetbody">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($items)) : ?>
                    <tr>
                      <td colspan="4" style="font-size: 50px; font-style:italic; color: grey;">EMPTY</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($items as $item) : ?>
                      <tr>
                        <td>
                          <div class="outer-circle">
                            <div class="inner-circle">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                        </td>
                        <td class="first-que"><?= $item['PatientName'] ?></td>
                        <td class="first-date"><?= date('F j, Y', strtotime($item['DateCreated'])) ?></td>
                        <td>
                          <a href="<?php echo site_url('mer/AppReq'); ?>" id="today-btn" class="btn btn-warning ripple-btn">VIEW</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php
        }

        ?>
        <?php if ($user_info->AccessType == 'Secretary') {  ?>
          <div class="col-sm-5">
            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Approval Queue</th>
                    <th id="hidetbody">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th id="hidetbody">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($items)) : ?>
                    <tr>
                      <td colspan="3" style="font-size: 50px; font-style:italic; color: grey;">EMPTY</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($items as $item) : ?>
                      <tr>
                        <td>
                          <div class="outer-circle">
                            <div class="inner-circle">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                        </td>
                        <td class="first-que"><?= $item['PatientName'] ?></td>
                        <td class="first-date"><?= date('F j, Y', strtotime($item['DateCreated'])) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php
        }

        ?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2 mt-5">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="intervalDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span id="selectedInterval1">Weekly</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="intervalDropdown1">
                <a class="dropdown-item" href="#" onclick="ChartsNonAdmin.updateData('weekly1')">Weekly</a>
                <a class="dropdown-item" href="#" onclick="ChartsNonAdmin.updateData('monthly1')">Monthly</a>
                <a class="dropdown-item" href="#" onclick="ChartsNonAdmin.updateData('yearly1')">Yearly</a>
              </div>
            </div>
          </div>
          <div class="col-md-10 mt-5">
            <div class="chart-container">
              <canvas id="weeklyChart1"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <?php
  }

  ?>




  </div>
<?php   } ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Module for the first chart
  const Charts = (function() {
    const ctx = document.getElementById("weeklyChart").getContext("2d");

    const chart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [],
        datasets: [{
          label: "Weekly Data",
          data: [],
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "royalblue",
          borderWidth: 2,
          pointRadius: 5,
          pointBackgroundColor: "royalblue",
        }],
      },
      options: {
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: "Days of the Week",
            },
          },
          y: {
            display: true,
            title: {
              display: true,
              text: "Number of Entry Data",
            },
            suggestedMin: 0,
            suggestedMax: 10,
            stepSize: 1,
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          animation: {
            tension: {
              duration: 1000,
              easing: "linear",
              from: 1,
              to: 0,
            },
          },
        },
      },
    });

    function updateData(interval) {
      // Replace the AJAX URL with your actual URL
      $.ajax({
        url: "<?php echo base_url('home/get_user_data'); ?>/" + interval,
        type: "GET",
        dataType: "json",
        success: function(data) {
          let labels = [];
          let values = [];

          if (interval === 'weekly' || interval === 'monthly' || interval === 'yearly') {
            data.forEach(function(item) {
              labels.push(item.Date);
              values.push(item.Count);
            });

            if (interval === 'weekly') {
              chart.options.scales.x.title.text = "Days of the Week";
              document.getElementById('selectedInterval').textContent = 'Weekly';
            } else if (interval === 'monthly') {
              chart.options.scales.x.title.text = "Months of the Year";
              document.getElementById('selectedInterval').textContent = 'Monthly';
            } else if (interval === 'yearly') {
              chart.options.scales.x.title.text = "Years";
              document.getElementById('selectedInterval').textContent = 'Yearly';
            }
          }

          chart.data.labels = labels;
          chart.data.datasets[0].data = values;
          chart.update();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    // Call updateData function with 'weekly' interval to fetch and update the chart with weekly data.
    updateData('weekly');

    return {
      updateData: updateData
    };
  })();
</script>

<script>
  // Module for the second chart
  const ChartsNonAdmin = (function() {
    const ctx1 = document.getElementById("weeklyChart1").getContext("2d");

    const chart1 = new Chart(ctx1, {
      type: "line",
      data: {
        labels: [],
        datasets: [{
          label: "Weekly Data",
          data: [],
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "royalblue",
          borderWidth: 2,
          pointRadius: 5,
          pointBackgroundColor: "royalblue",
        }],
      },
      options: {
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: "Days of the Week",
            },
          },
          y: {
            display: true,
            title: {
              display: true,
              text: "Number of Entry Data",
            },
            suggestedMin: 0,
            suggestedMax: 10,
            stepSize: 1,
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          animation: {
            tension: {
              duration: 1000,
              easing: "linear",
              from: 1,
              to: 0,
            },
          },
        },
      },
    });

    function updateData(interval) {
      // Replace the AJAX URL with your actual URL
      $.ajax({
        url: "<?php echo base_url('home/get_user_data_nonadmin'); ?>/" + interval,
        type: "GET",
        dataType: "json",
        success: function(data) {
          let labels = [];
          let values = [];

          if (interval === 'weekly1' || interval === 'monthly1' || interval === 'yearly1') {
            data.forEach(function(item) {
              labels.push(item.Date);
              values.push(item.Count);
            });

            if (interval === 'weekly1') {
              chart1.options.scales.x.title.text = "Days of the Week";
              document.getElementById('selectedInterval1').textContent = 'Weekly';
            } else if (interval === 'monthly1') {
              chart1.options.scales.x.title.text = "Months of the Year";
              document.getElementById('selectedInterval1').textContent = 'Monthly';
            } else if (interval === 'yearly1') {
              chart1.options.scales.x.title.text = "Years";
              document.getElementById('selectedInterval1').textContent = 'Yearly';
            }
          }

          chart1.data.labels = labels;
          chart1.data.datasets[0].data = values;
          chart1.update();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    // Call updateData function with 'weekly1' interval to fetch and update the chart with non-admin weekly data.
    updateData('weekly1');

    return {
      updateData: updateData
    };
  })();
</script>
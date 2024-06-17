<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<?php
if ($this->session->userdata('user_info')) {
    $user_info = $this->session->userdata('user_info');
?>


    <script type="text/javascript">
 document.addEventListener("DOMContentLoaded", function () {
        // Get the current date
        var currentDate = new Date();

        // Set the start date to the first day of the current month
        var firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        document.getElementById("start_date").value = formatDate(firstDay);

        // Set the end date to the last day of the current month
        var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        document.getElementById("end_date").value = formatDate(lastDay);
    });

    // Function to format date as "YYYY-MM-DD" for input type 'date'
    function formatDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) {
            month = "0" + month;
        }

        if (day < 10) {
            day = "0" + day;
        }

        return year + "-" + month + "-" + day;
    }
        // -------------------------- DARK AND LIGHT THEME ------------------------- //
        // Assume you have jQuery included in your project
        $(document).ready(function() {
            // Fetch the theme using AJAX
            $.ajax({
                type: 'POST',
                url: '<?= base_url('users/getTheme') ?>',
                data: {
                    username: $('#usernameee').val()
                },
                dataType: 'json',
                success: function(response) {
                    // Check the checkbox based on the theme
                    if (response === 'dark') {
                        $('#chk').prop('checked', true);
                        document.body.classList.toggle('dark', chk.checked);
                    } else {
                        $('#chk').prop('checked', false);
                        document.body.classList.toggle('light', !chk.checked);
                    }
                },
                error: function() {
                    console.log('Error fetching theme.');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const chk = document.getElementById('chk');
            const username = document.getElementById('usernameee').value;

            const updateUserTheme = function(theme) {
                const formData = new FormData();
                formData.append('username', username);
                formData.append('theme', theme);

                fetch('<?= base_url('users/update_theme') ?>', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error updating user theme:', error);
                    });
            };


            function createGlassOverlay(animationName) {
                // Create overlay element
                const overlay = document.createElement('div');
                overlay.classList.add('glass-overlay');
                overlay.style.animationName = animationName;

                // Append overlay to the body
                document.body.appendChild(overlay);

                // Remove overlay after animation duration (1.2s in this example)
                setTimeout(() => {
                    overlay.remove();
                }, 1200);
            }
            chk.addEventListener('change', () => {
                const newTheme = chk.checked ? 'dark' : 'light';

                document.body.classList.toggle('dark', chk.checked);
                document.body.classList.toggle('light', !chk.checked);

                const animationName = chk.checked ? 'glassAnimation' : 'glassAnimationReverse';

                // Call the function to create and append the glass overlay with the chosen animation
                createGlassOverlay(animationName);

                // Update the user theme in the database
                updateUserTheme(newTheme);
            });

            // SOCIAL PANEL JS
            const floating_btn = document.querySelector('.floating-btn');
            const close_btn = document.querySelector('.close-btn');
            const social_panel_container = document.querySelector('.social-panel-container');

            floating_btn.addEventListener('click', () => {
                social_panel_container.classList.toggle('visible');
            });

            // Add an event listener to 'close-btn' for the 'click' event
            close_btn.addEventListener('click', () => {
                // Remove the 'visible' class from 'social_panel_container'
                social_panel_container.classList.remove('visible');
            });


        });
        // -------------------------- DARK AND LIGHT THEME END ------------------------- //
        function confirmSignOut() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545', // Gray color for the cancel button
                confirmButtonText: 'Yes, sign me out!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle sign-out logic here
                    window.location.href = "<?php echo site_url('login/logout') ?>";
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');


                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Function to update input value
            function updateInputValue(input) {
                // Set default value to "639" and limit total digits to 13
                input.value = '+639'; // Set default value

                input.addEventListener('input', function() {
                    // Remove non-numeric characters except '+'
                    this.value = this.value.replace(/[^0-9+]/g, '');

                    // Ensure the input starts with "639"
                    if (!this.value.startsWith('+639')) {
                        this.value = '+639' + this.value.substring(3, 13);
                    }

                    // Limit total digits to 13
                    if (this.value.length > 13) {
                        this.value = this.value.substring(0, 13);
                    }
                });
            }

            // Apply the function to the 'Contact' input
            var contactInput = document.getElementById('Contact');
            updateInputValue(contactInput);

            // Apply the function to the 'edContact' input
            var edContactInput = document.getElementById('edContact');
            updateInputValue(edContactInput);
        });
        $("#updatePForm").submit(function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            // Check if the Name and Username field is empty
            const nameValue = $.trim($("#Fullname").val());
            const usernameValue = $.trim($("#Username").val());
            const passwordsValue = $.trim($("#Password").val());


            if (nameValue === "" || usernameValue === "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please input appropriate Name or Username.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }


            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to save the changes!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url('users/profile'); ?>",
                        data: formData,
                        type: "post",
                        processData: false,
                        contentType: false,
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire('Success', response.message, 'success').then(function() {
                                    window.location.href = "<?php echo site_url('login/logout') ?>";

                                });
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while saving your changes or having a duplicated username',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');
                }
            });
        });

        function displayFileName() {
            var input = document.getElementById('Image');
            var profileImage = document.getElementById('profileImage');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                profileImage.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }

        $(document).ready(function() {
            var table = $('#tableforGen').DataTable({
                "ajax": {
                    "url": "<?php echo site_url('mer/fetchDatafromDatabaseGenerator'); ?>",
                    "type": "POST",
                    "data": function(d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                "columns": [{
                        "data": "0"
                    },
                    {
                        "data": "1"
                    },
                    {
                        "data": "2"
                    },
                    {
                        "data": "3"
                    },
                    {
                        "data": "4"
                    },
                    {
                        "data": "5"
                    },
                    {
                        "data": "6"
                    },
                    {
                        "data": "7"
                    },
                    {
                        "data": "8"
                    },
                    {
                        "data": "9"
                    },
                    {
                        "data": "10"
                    },
                    {
                        "data": "11"
                    },
                    {
                        "data": "12"
                    },
                    {
                        "data": "13"
                    },
                    {
                        "data": "14"
                    },
                ],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });

        function filterTable() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            var table = $('#tableforGen').DataTable();
            table.ajax.url('<?php echo site_url('mer/fetchDatafromDatabaseGenerator'); ?>').load();
        }

        function exportToExcel() {
            var dataD = $('#tableforGen').DataTable().rows().data().toArray();
            console.log(dataD);
            $.ajax({
                url: '<?php echo site_url('mer/exportToExcel'); ?>',
                type: 'POST',
                data: {
                    data: dataD,
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function(response) {
                    Swal.fire('Error', 'Generate Record Failed its Emply!', 'error');
                }
            });
        }

        $(document).ready(function() {
            var table = $('#tableforGen2').DataTable({
                "ajax": {
                    "url": "<?php echo site_url('pasyente/fetchDatafromDatabaseGenerator'); ?>",
                    "type": "POST",
                    "data": function(d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                "columns": [{
                        "data": "0"
                    },
                    {
                        "data": "1"
                    },
                    {
                        "data": "2"
                    },
                    {
                        "data": "3"
                    },
                    {
                        "data": "4"
                    },
                    {
                        "data": "5"
                    },
                    {
                        "data": "6"
                    },
                ],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });

        function filterTable2() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            var table = $('#tableforGen2').DataTable();
            table.ajax.url('<?php echo site_url('pasyente/fetchDatafromDatabaseGenerator'); ?>').load();
        }

        function exportToExcel2() {
            var data = $('#tableforGen2').DataTable().rows().data().toArray();

            $.ajax({
                url: '<?php echo site_url('pasyente/exportToExcel'); ?>',
                type: 'POST',
                data: {
                    data: data,
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function(response) {
                    Swal.fire('Error', 'Generate Record Failed its Emply!', 'error');
                }
            });
        }

        function checkArchivedRecords() {
            $.ajax({
                url: '<?php echo base_url('pasyente/check_archived'); ?>', // Replace with your CodeIgniter controller URL
                method: 'POST',
                success: function(response) {
                    console.log(response); // Log the response for debugging
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
        setInterval(checkArchivedRecords, 5000);

        function checkArchivedRecords1() {
            $.ajax({
                url: '<?php echo base_url('mer/check_archived'); ?>', // Replace with your CodeIgniter controller URL
                method: 'POST',
                success: function(response) {
                    console.log(response); // Log the response for debugging
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
        setInterval(checkArchivedRecords1, 5000);
  $(function() {
    // Function to calculate the year range dynamically
    function calculateYearRange() {
        var currentYear = new Date().getFullYear();
        return "1800:" + (currentYear - 1);
    }

    // Datepicker for "dob" input
    $("#dob").datepicker({
        dateFormat: 'mm/dd/yy',
        changeYear: true,
        changeMonth: true,
        yearRange: calculateYearRange()
    });

    // Show datepicker when clicking the calendar icon for "dob"
    $("#calendar-icon").click(function() {
        $("#dob").datepicker("show");
    });

    // Datepicker for "eddob" input
    $("#eddob").datepicker({
        dateFormat: 'mm/dd/yy',
        changeYear: true,
        changeMonth: true,
        yearRange: calculateYearRange()
    });

    // Show datepicker when clicking the calendar icon for "eddob"
    $("#calendar-iconed").click(function() {
        $("#eddob").datepicker("show");
    });
});

        function showChangePasswordModal() {
            Swal.fire({
                title: 'Change Password',
                html: '<div class="password-input-container">' +
                    '<div class="input-group pt-4 pl-4 pr-4">' +
                    '<input type="password" id="new_password" class="form-control" placeholder="New Password">' +
                    '<div class="input-group-append">' +
                    '<span class="input-group-text password-toggle" onclick="togglePassword(\'new_password\', this)"><i class="fas fa-eye"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="password-input-container">' +
                    '<div class="input-group pt-4 pl-4 pr-4">' +
                    '<input type="password" id="confirm_password" class="form-control" placeholder="Confirm New Password">' +
                    '<div class="input-group-append">' +
                    '<span class="input-group-text password-toggle" onclick="togglePassword(\'confirm_password\', this)"><i class="fas fa-eye"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>',
                focusConfirm: false,
                allowOutsideClick: false, // Prevent clicking outside the modal to close
                allowEscapeKey: false, // Prevent using the escape key to close
                preConfirm: () => {
                    const new_password = Swal.getPopup().querySelector('#new_password').value;
                    const confirm_password = Swal.getPopup().querySelector('#confirm_password').value;

                    // Add password requirements validation
                    const requirementsRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                    const isValidPassword = requirementsRegex.test(new_password);

                    if (!new_password || !confirm_password) {
                        Swal.showValidationMessage('Both password fields are required');
                        return false;
                    } else if (new_password !== confirm_password) {
                        Swal.showValidationMessage('Passwords do not match');
                        return false;
                    } else if (!isValidPassword) {
                        Swal.showValidationMessage('Password must be 8 characters or longer and include at least 1 symbol, 1 uppercase letter, and 1 number');
                        return false;
                    }

                    // Handle password change
                    $.post('<?php echo base_url('users/change_password'); ?>', {
                        new_password: new_password,
                        confirm_password: confirm_password
                    }, function(data) {
                        if (data.success) {
                            Swal.fire('Password Changed!', data.message, 'success').then(() => {
                                window.location.href = '<?php echo site_url('login/logout') ?>';
                            });
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    }, 'json');
                }
            });
        }

        function showChangePassword() {
            Swal.fire({
                title: 'Change Password',
                html: '<input type="text" id="useruid" name="useruid" value="<?= $user_info->UserID ?>" hidden>' +
                    '<div class="password-input-container">' +
                    '<div class="input-group pt-4 pl-4 pr-4">' +
                    '<input type="password" id="current_password" class="form-control" placeholder="Current Password">' +
                    '<div class="input-group-append">' +
                    '<span class="input-group-text password-toggle" onclick="togglePassword(\'current_password\', this)"><i class="fas fa-eye"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="password-input-container">' +
                    '<div class="input-group pt-4 pl-4 pr-4">' +
                    '<input type="password" id="new_password" class="form-control" placeholder="New Password">' +
                    '<div class="input-group-append">' +
                    '<span class="input-group-text password-toggle" onclick="togglePassword(\'new_password\', this)"><i class="fas fa-eye"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="password-input-container">' +
                    '<div class="input-group pt-4 pl-4 pr-4">' +
                    '<input type="password" id="confirm_password" class="form-control" placeholder="Confirm New Password">' +
                    '<div class="input-group-append">' +
                    '<span class="input-group-text password-toggle" onclick="togglePassword(\'confirm_password\', this)"><i class="fas fa-eye"></i></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>',
                focusConfirm: false,
                showCloseButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                preConfirm: () => {
                    const useruid = Swal.getPopup().querySelector('#useruid').value;
                    const current_password = Swal.getPopup().querySelector('#current_password').value;
                    const new_password = Swal.getPopup().querySelector('#new_password').value;
                    const confirm_password = Swal.getPopup().querySelector('#confirm_password').value;

                    $.post('<?php echo base_url('users/check_current_password'); ?>', {
                        current_password: current_password,
                        useruid: useruid
                    }, function(data) {
                        if (data.status === 'success') {
                            const requirementsRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                            const isValidPassword = requirementsRegex.test(new_password);

                            if (!new_password || !confirm_password) {
                                Swal.showValidationMessage('Both password fields are required');
                            } else if (new_password !== confirm_password) {
                                Swal.showValidationMessage('Passwords do not match');
                            } else if (!isValidPassword) {
                                Swal.showValidationMessage('Password must be 8 characters or longer and include at least 1 symbol, 1 uppercase letter, and 1 number');
                            } else {
                                $.post('<?php echo base_url('users/change_password'); ?>', {
                                    new_password: new_password,
                                    confirm_password: confirm_password
                                }, function(data) {
                                    if (data.success) {
                                        Swal.fire('Password Changed!', data.message, 'success').then(() => {
                                            window.location.href = '<?php echo site_url('login/logout') ?>';
                                        });
                                    } else {
                                        Swal.fire('Error', data.message, 'error');
                                    }
                                }, 'json');
                            }
                        } else {
                            Swal.showValidationMessage('Current password is incorrect');
                        }
                    }, 'json');

                    // Prevent the modal from closing automatically
                    return false;
                }
            });
        }



        function togglePassword(inputId, iconElement) {
            const inputElement = document.getElementById(inputId);
            if (inputElement.type === "password") {
                inputElement.type = "text";
                iconElement.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                inputElement.type = "password";
                iconElement.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
            document.querySelector('.content').classList.toggle('shift');
        }

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function applyRandomColors() {
            const outerCircles = document.querySelectorAll('.outer-circle');
            const innerCircles = document.querySelectorAll('.inner-circle');

            outerCircles.forEach((outerCircle) => {
                outerCircle.style.borderColor = getRandomColor();
            });

            innerCircles.forEach((innerCircle) => {
                innerCircle.style.backgroundColor = getRandomColor();
            });
        }

        applyRandomColors();



        $(document).ready(function() {
            var trigger = $('.toggle-btn'),
                overlay = $('.overlay'),
                uncovered = false;

            trigger.click(function() {
                overlayout();
            });

            function overlayout() {

                if (uncovered == true) {
                    overlay.hide();
                    uncovered = false;
                } else {
                    overlay.show();
                    uncovered = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function() {
                $('#wrapper').toggleClass('toggled');
            });
        });
        // DataTables ng Users
        $(document).ready(function() {
            $('#example1').DataTable({
                "ajax": "<?php echo base_url('users/fetchDatafromDatabase'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });
        $(document).ready(function() {
            $('#submitUser').click(function(e) {
                e.preventDefault();

                const Name = $('#Name').val();
                const Username = $('#Username').val();
                const AccessType = $('#AccessType').val();

                if (!Name || !Username) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please fill out all fields.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return; // Stop the function execution
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('users/add_users'); ?>',
                    data: {
                        Name: Name,
                        Username: Username,
                        AccessType: AccessType
                    },
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'New user have been saved.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while saving your data or having a duplicated username',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#submitPasyente').click(function(e) {
                e.preventDefault();

                const PirIDS = $('#PirIDS').val();
                const LastName = $('#LastName').val();
                const FirstName = $('#FirstName').val();
                const MiddleName = $('#MiddleName').val();
                const Age = $('#Age').val();
                const Sex = $('#Sex').val();
                const DateOfBirth = $('#dob').val();
                const Address = $('#Address').val();
                const Contact = $('#Contact').val();
                const RecordedBy = $('#RecordedBy').val();

                // Check if age is invalid
                if (Age <= 0) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Invalid age. Please check!.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return; // Stop the function execution
                }

                if (!LastName || !FirstName || !Age || !Sex || !DateOfBirth || !Address || !Contact || !RecordedBy) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please fill out all fields.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return; // Stop the function execution
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('pasyente/addpasyente'); ?>',
                    data: {
                        PirIDS: PirIDS,
                        LastName: LastName,
                        FirstName: FirstName,
                        MiddleName: MiddleName,
                        Age: Age,
                        Sex: Sex,
                        DateOfBirth: DateOfBirth,
                        Address: Address,
                        Contact: Contact,
                        RecordedBy: RecordedBy
                    },
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'New patient has been saved.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while saving your data or contact the developer',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });



        // Displaying data on page end here
        function editFun(id) {
            $.ajax({
                url: "<?php echo base_url('users/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.UserID);
                    $('#editName').val(response.Name);
                    $('#editUsername').val(response.Username);
                    $('#editAccess').val(response.AccessType);
                    $('#editModal').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }


            });
        }

        $("#editForm").submit(function(event) {
            event.preventDefault();

            // Check if the Name and Username field is empty
            const nameValue = $.trim($("#editName").val());
            const usernameValue = $.trim($("#editUsername").val());

            if (nameValue === "" || usernameValue === "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please input appropriate Name or Username.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to save the changes!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, save it!"
                    $.ajax({
                        url: "<?php echo base_url('users/update'); ?>",
                        data: $("#editForm").serialize(),
                        type: "post",
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            $('#editModal').modal('hide');
                            $('#editForm')[0].reset();

                            // Display success SweetAlert
                            Swal.fire({
                                title: 'Success!',
                                text: 'Your changes have been saved.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            // Display error SweetAlert
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while saving your changes or having a duplicated username',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');
                }
            });
        });



        function confirmDelete(userID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "The account will be deactivated",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteeeFun(userID);
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');

            })
        }

        function deleteeeFun(userID) {
            $.ajax({
                url: '<?php echo base_url('users/delete'); ?>', // Replace with your reset URL
                type: 'POST',
                data: {
                    UserID: userID
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        function confirmReset(userID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will reset the user's account",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, reset it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    resetFun(userID);
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            })
        }

        function resetFun(userID) {
            $.ajax({
                url: '<?php echo base_url('users/reset'); ?>', // Replace with your reset URL
                type: 'POST',
                data: {
                    UserID: userID
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        function confirmDeletePir(pirID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will Delete the Patient Data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteFunPir(pirID);
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            })
        }

        function deleteFunPir(pirID) {
            $.ajax({
                url: "<?php echo base_url('pasyente/archived_pasyente'); ?>",
                type: 'POST',
                data: {
                    PirID: pirID
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        function autoDismissSuccessMessage() {
            const successMessageDiv = document.getElementById('success-message');
            const errorMessageDiv = document.getElementById('error-message');

            // Dismiss the alert after 3 seconds
            setTimeout(function() {
                successMessageDiv.style.display = "none";
                errorMessageDiv.style.display = "none";
            }, 3000); // 3000 milliseconds = 3 seconds
        }

        // Call the autoDismissSuccessMessage function after the page is loaded
        document.addEventListener("DOMContentLoaded", function() {
            autoDismissSuccessMessage();
        });

        // DataTables ng Pir
        $(document).ready(function() {
            $('#example2').DataTable({
                "ajax": "<?php echo base_url('pasyente/fetchDatafromDatabase'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });

        $(document).ready(function() {
            $('#example3').DataTable({
                "ajax": "<?php echo base_url('mer/fetchDatafromDatabase'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });

        $(document).ready(function() {
            var table = $('#example4').DataTable({
                "ajax": "<?php echo base_url('pasyente/fetchDatafromDatabaseDeleted'); ?>",
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    } // Disable sorting for the checkbox column
                ],
                "order": [
                    [1, 'asc']
                ], // Set the default sorting column and order
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });

            // Function to toggle the visibility of the "Undelete Selected" button
            function toggleUndeleteButton() {
                var checkedRows = $('.delete-checkbox:checked').length;
                if (checkedRows > 0) {
                    $('#delete-button').show();
                } else {
                    $('#delete-button').hide();
                }
            }

            // Handle checkbox click event using event delegation
            $(document).on('change', '.delete-checkbox', function() {
                // Toggle the visibility of the button
                toggleUndeleteButton();
            });

            // Handle deletion button click
            $('#delete-button').on('click', function() {
                var selectedData = [];
                $('.delete-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = table.row(row).data();
                    selectedData.push(rowData);

                });

                var selectedIds = selectedData.map(function(rowData) {
                    return rowData[1];
                });

                console.log(selectedIds);
                // Show a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to restore selected data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745', // Green color for the confirm button
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, restore it!',
                    cancelButtonText: 'No, cancel',
                    customClass: {
                        popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                        title: 'custom-title-class', // Add a custom class to the title
                        content: 'custom-content-class', // Add a custom class to the content/text

                        icon: 'custom-icon-class', // Add a custom class to the icon

                        form: 'custom-form-class', // Add a custom class to the form
                        resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                    },
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to update the "is_deleted" field
                        $.ajax({
                            url: '<?php echo base_url('pasyente/restoreMultiple'); ?>', // Replace with your update endpoint
                            method: 'POST',
                            data: {
                                ids: selectedIds
                            }, // Send selected IDs to the server
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire('Restored!', response.message, 'success').then(function() {
                                        // Hide the button again
                                        $('#delete-button').hide();
                                        // Handle success, possibly reload the DataTable
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            }
                        });
                    }
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');
                });
            });

            // Initially, hide the button
            $('#delete-button').hide();
        });

        $(document).ready(function() {
            var getsino_value = $('#getsino').val(); // Replace with the actual value

            var table = $('#example9').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('pasyente/fetchDatafromDatabaseBackup'); ?>",
                    "type": "POST",
                    "data": {
                        "getsino": getsino_value
                    }
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    } // Disable sorting for the checkbox column
                ],
                "order": [
                    [1, 'asc']
                ], // Set the default sorting column and order
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });

            // Function to toggle the visibility of the "Undelete Selected" button
            function toggleUndeleteButton() {
                var checkedRows = $('.delete-checkbox:checked').length;
                if (checkedRows > 0) {
                    $('#delete-button2').show();
                } else {
                    $('#delete-button2').hide();
                }
            }

            // Handle checkbox click event using event delegation
            $(document).on('change', '.delete-checkbox', function() {
                // Toggle the visibility of the button
                toggleUndeleteButton();
            });

            // Handle deletion button click
            $('#delete-button2').on('click', function() {
                var selectedData = [];
                $('.delete-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = table.row(row).data();
                    selectedData.push(rowData);

                });

                var selectedIds = selectedData.map(function(rowData) {
                    return rowData[1];
                });

                // Show a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to restore selected data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745', // Green color for the confirm button
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, restore it!',
                    cancelButtonText: 'No, cancel',
                    customClass: {
                        popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                        title: 'custom-title-class', // Add a custom class to the title
                        content: 'custom-content-class', // Add a custom class to the content/text

                        icon: 'custom-icon-class', // Add a custom class to the icon

                        form: 'custom-form-class', // Add a custom class to the form
                        resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                    },
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to update the "is_deleted" field
                        $.ajax({
                            url: '<?php echo base_url('pasyente/restoreMultiple'); ?>', // Replace with your update endpoint
                            method: 'POST',
                            data: {
                                ids: selectedIds
                            }, // Send selected IDs to the server
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire('Restored!', response.message, 'success').then(function() {
                                        // Hide the button again
                                        $('#delete-button2').hide();
                                        // Handle success, possibly reload the DataTable
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            }
                        });
                        // Add custom class to the result message box immediately after showing it
                        const resultPopup = Swal.getPopup();
                        resultPopup.classList.add('custom-result-popup-class');
                    }
                });
            });

            // Initially, hide the button
            $('#delete-button2').hide();
        });

        $(document).ready(function() {
            var getsino_value = $('#getsino').val(); // Replace with the actual value

            var table = $('#example10').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('mer/fetchDatafromDatabaseBackup'); ?>",
                    "type": "POST",
                    "data": {
                        "getsino": getsino_value
                    }
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    } // Disable sorting for the checkbox column
                ],
                "order": [
                    [1, 'asc']
                ], // Set the default sorting column and order
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });

            // Function to toggle the visibility of the "Undelete Selected" button
            function toggleUndeleteButton1() {
                var checkedRows = $('.delete-checkbox:checked').length;
                if (checkedRows > 0) {
                    $('#delete-button3').show();
                } else {
                    $('#delete-button3').hide();
                }
            }

            // Handle checkbox click event using event delegation
            $(document).on('change', '.delete-checkbox', function() {
                // Toggle the visibility of the button
                toggleUndeleteButton1();
            });

            // Handle deletion button click
            $('#delete-button3').on('click', function() {
                var selectedData = [];
                $('.delete-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = table.row(row).data();
                    selectedData.push(rowData);

                });

                var selectedIds = selectedData.map(function(rowData) {
                    return rowData[1];
                });

                // Show a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to restore selected data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745', // Green color for the confirm button
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, restore it!',
                    cancelButtonText: 'No, cancel',
                    customClass: {
                        popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                        title: 'custom-title-class', // Add a custom class to the title
                        content: 'custom-content-class', // Add a custom class to the content/text

                        icon: 'custom-icon-class', // Add a custom class to the icon

                        form: 'custom-form-class', // Add a custom class to the form
                        resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                    },
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to update the "is_deleted" field
                        $.ajax({
                            url: '<?php echo base_url('mer/restoreMultiple'); ?>', // Replace with your update endpoint
                            method: 'POST',
                            data: {
                                ids: selectedIds
                            }, // Send selected IDs to the server
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire('Restored!', response.message, 'success').then(function() {
                                        // Hide the button again
                                        $('#delete-button3').hide();
                                        // Handle success, possibly reload the DataTable
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            }
                        });
                    }
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');
                });
            });

            // Initially, hide the button
            $('#delete-button3').hide();
        });

        $(document).ready(function() {
            var table = $('#example5').DataTable({
                "ajax": "<?php echo base_url('mer/fetchDatafromDatabaseDeleted'); ?>",
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    } // Disable sorting for the checkbox column
                ],
                "order": [
                    [1, 'asc']
                ], // Set the default sorting column and order
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });

            // Function to toggle the visibility of the "Undelete Selected" button
            function toggleUndeleteButton() {
                var checkedRows = $('.delete-checkbox:checked').length;
                if (checkedRows > 0) {
                    $('#delete-button1').show();
                } else {
                    $('#delete-button1').hide();
                }
            }

            // Handle checkbox click event using event delegation
            $(document).on('change', '.delete-checkbox', function() {
                // Toggle the visibility of the button
                toggleUndeleteButton();
            });

            // Handle deletion button click
            $('#delete-button1').on('click', function() {
                var selectedData = [];
                $('.delete-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = table.row(row).data();
                    selectedData.push(rowData);

                });

                var selectedIds = selectedData.map(function(rowData) {
                    return rowData[1];
                });

                // Show a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to restore selected data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745', // Green color for the confirm button
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, restore it!',
                    cancelButtonText: 'No, cancel',
                    customClass: {
                        popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                        title: 'custom-title-class', // Add a custom class to the title
                        content: 'custom-content-class', // Add a custom class to the content/text

                        icon: 'custom-icon-class', // Add a custom class to the icon

                        form: 'custom-form-class', // Add a custom class to the form
                        resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                    },
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to update the "is_deleted" field
                        $.ajax({
                            url: '<?php echo base_url('mer/restoreMultiple'); ?>', // Replace with your update endpoint
                            method: 'POST',
                            data: {
                                ids: selectedIds
                            }, // Send selected IDs to the server
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire('Restored!', response.message, 'success').then(function() {
                                        // Hide the button again
                                        $('#delete-button1').hide();
                                        // Handle success, possibly reload the DataTable
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            }
                        });
                    }
                    // Add custom class to the result message box immediately after showing it
                    const resultPopup = Swal.getPopup();
                    resultPopup.classList.add('custom-result-popup-class');
                });
            });

            // Initially, hide the button
            $('#delete-button1').hide();
        });
        $(document).ready(function() {
            $('#example6').DataTable({
                "ajax": "<?php echo base_url('mer/fetchDatafromDatabaseAppReq'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });
        $(document).ready(function() {
            $('#example7').DataTable({
                "ajax": "<?php echo base_url('mer/fetchDatafromDatabaseStatusReq'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });
        $(document).ready(function() {
            $('#example8').DataTable({
                "ajax": "<?php echo base_url('mer/fetchDatafromDatabaseSec'); ?>",
                "order": [],
                "language": {
                    "search": "_INPUT_", // Customize the search input field
                    "searchPlaceholder": "Search...",
                },
            });
        });
        // Displaying data on page end here
        function editPirFun(id) {
            $.ajax({
                url: "<?php echo base_url('pasyente/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.PirID);
                    $('#edLastName').val(response.LastName);
                    $('#edFirstName').val(response.FirstName);
                    $('#edMiddleName').val(response.MiddleName);
                    $('#edSex').val(response.Sex);
                    $('#edAge').val(response.Age);
                    $('#edContact').val(response.Contact);
                    $('#edAddress').val(response.Address);

                    // Extracted DateOfBirth components
                    $('#eddob').val(response.DateOfBirth);

                    $('#editPir').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }

        function edmerModal(id) {
            $.ajax({
                url: "<?php echo base_url('Mer/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#edMerID').val(response.MerID);
                    $('#edPirID').val(response.PirID);
                    $('#edPatientName').val(response.PatientName);
                    $('#edSPHOD').val(response.SPH_OD);
                    $('#edCYLOD').val(response.CYL_OD);
                    $('#edAXISOD').val(response.AXIS_OD);
                    $('#edADDOD').val(response.ADD_OD);
                    $('#edSPHOS').val(response.SPH_OS);
                    $('#edCYLOS').val(response.CYL_OS);
                    $('#edAXISOS').val(response.AXIS_OS);
                    $('#edADDOS').val(response.ADD_OS);
                    $('#edPD').val(response.PD);
                    $('#edLens').val(response.Lens);
                    $('#edRecordedBy').val(response.RecordedBy);

                    $('#edmerModal').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }
        $("#edmerf").submit(function(event) {
            event.preventDefault();

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to save the changes!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, save it!"
                    $.ajax({
                        url: "<?php echo base_url('mer/updatemer'); ?>",
                        data: $("#edmerf").serialize(),
                        type: "post",
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Changes have been saved.',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            });
        });

        function capitalizeFirstLetter(str) {
            return str.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
        }

        function updateAddress() {
            var phaseBlockLot = capitalizeFirstLetter(document.getElementById('phase-block-lot').value);
            var streetSubdivision = capitalizeFirstLetter(document.getElementById('street-sudbv').value);
            var barangay = capitalizeFirstLetter(document.getElementById('brgy').value);
            var municipality = capitalizeFirstLetter(document.getElementById('municip').value);
            var province = capitalizeFirstLetter(document.getElementById('provnc').value);
            var zipCode = document.getElementById('zp-cd').value;

            var address = [phaseBlockLot, streetSubdivision, barangay, municipality, province].filter(Boolean).join(', ');

            document.getElementById('Address').value = address + ', ' + zipCode;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Get the textarea and input elements
            const edAddress = document.getElementById('edAddress');
            const phaseBlockLot = document.getElementById('phase-block-lot1');
            const streetSubdivision = document.getElementById('street-sudbv1');
            const barangay = document.getElementById('brgy1');
            const municipality = document.getElementById('municip1');
            const province = document.getElementById('provnc1');
            const zipCode = document.getElementById('zp-cd1');

            // Function to update the input fields based on textarea value
            function updateInputsFromEdAddress() {
                const addressParts = edAddress.value.split(', ');

                phaseBlockLot.value = capitalize(addressParts[0]) || '';
                streetSubdivision.value = capitalize(addressParts[1]) || '';
                barangay.value = capitalize(addressParts[2]) || '';
                municipality.value = capitalize(addressParts[3]) || '';
                province.value = capitalize(addressParts[4]) || '';
                zipCode.value = addressParts[5] || '';
            }

            // Function to capitalize the first letter of each word in a string
            function capitalize(s) {
                return s.replace(/\b\w/g, function(char) {
                    return char.toUpperCase();
                });
            }

            // Create a variable to store the interval ID
            let intervalId;

            // Function to update the textarea based on input values
            function updateEdAddress() {
                const capitalizedValues = [
                    capitalize(phaseBlockLot.value),
                    capitalize(streetSubdivision.value),
                    capitalize(barangay.value),
                    capitalize(municipality.value),
                    capitalize(province.value),
                    zipCode.value
                ];

                edAddress.value = capitalizedValues.join(', ');

                // Clear the interval after the update
                clearInterval(intervalId);
            }

            // Listen for input changes in each input field
            phaseBlockLot.addEventListener('input', updateEdAddress);
            streetSubdivision.addEventListener('input', updateEdAddress);
            barangay.addEventListener('input', updateEdAddress);
            municipality.addEventListener('input', updateEdAddress);
            province.addEventListener('input', updateEdAddress);
            zipCode.addEventListener('input', updateEdAddress);

            // Listen for changes in the textarea and update input fields at a 1-second interval
            intervalId = setInterval(updateInputsFromEdAddress, 1000);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Get the textarea and input elements
            const edAddress = document.getElementById('edAddress1');
            const phaseBlockLot = document.getElementById('phase-block-lot2');
            const streetSubdivision = document.getElementById('street-sudbv2');
            const barangay = document.getElementById('brgy2');
            const municipality = document.getElementById('municip2');
            const province = document.getElementById('provnc2');
            const zipCode = document.getElementById('zp-cd2');

            // Function to update the input fields based on textarea value
            function updateInputsFromEdAddress() {
                const addressParts = edAddress.value.split(', ');

                phaseBlockLot.value = capitalize(addressParts[0]) || '';
                streetSubdivision.value = capitalize(addressParts[1]) || '';
                barangay.value = capitalize(addressParts[2]) || '';
                municipality.value = capitalize(addressParts[3]) || '';
                province.value = capitalize(addressParts[4]) || '';
                zipCode.value = addressParts[5] || '';
            }

            // Function to capitalize the first letter of each word in a string
            function capitalize(s) {
                return s.replace(/\b\w/g, function(char) {
                    return char.toUpperCase();
                });
            }

            // Create a variable to store the interval ID
            let intervalId;

            // Function to update the textarea based on input values
            function updateEdAddress1() {
                const capitalizedValues = [
                    capitalize(phaseBlockLot.value),
                    capitalize(streetSubdivision.value),
                    capitalize(barangay.value),
                    capitalize(municipality.value),
                    capitalize(province.value),
                    zipCode.value
                ];

                edAddress.value = capitalizedValues.join(', ');

                // Clear the interval after the update
                clearInterval(intervalId);
            }

            // Listen for input changes in each input field
            phaseBlockLot.addEventListener('input', updateEdAddress1);
            streetSubdivision.addEventListener('input', updateEdAddress1);
            barangay.addEventListener('input', updateEdAddress1);
            municipality.addEventListener('input', updateEdAddress1);
            province.addEventListener('input', updateEdAddress1);
            zipCode.addEventListener('input', updateEdAddress1);

            // Listen for changes in the textarea and update input fields at a 1-second interval
            intervalId = setInterval(updateInputsFromEdAddress, 1000);
        });

        function confirmDeleteMer(MerID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will Delete the mer record!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteMer(MerID);
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            })
        }

        function deleteMer(MerID) {
            $.ajax({
                url: '<?php echo base_url('mer/archived_mer'); ?>', // Replace with your reset URL
                type: 'POST',
                data: {
                    MerID: MerID
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        function confirmApproveMer(MerID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will Approve the mer recorded data!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, Approve it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    ApproveMer(MerID);
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            })
        }

        function ApproveMer(MerID) {
            $.ajax({
                url: '<?php echo base_url('mer/ApproveReq'); ?>', // Replace with your reset URL
                type: 'POST',
                data: {
                    MerID: MerID
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        function statusModal(id) {
            $.ajax({
                url: "<?php echo base_url('Mer/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#edMerID').val(response.MerID);
                    $('#edPirID').val(response.PirID);
                    $('#edPatientName').val(response.PatientName);
                    $('#edSPHOD').val(response.SPH_OD);
                    $('#edCYLOD').val(response.CYL_OD);
                    $('#edAXISOD').val(response.AXIS_OD);
                    $('#edADDOD').val(response.ADD_OD);
                    $('#edSPHOS').val(response.SPH_OS);
                    $('#edCYLOS').val(response.CYL_OS);
                    $('#edAXISOS').val(response.AXIS_OS);
                    $('#edADDOS').val(response.ADD_OS);
                    $('#edPD').val(response.PD);
                    $('#edLens').val(response.Lens);
                    $('#edComment').val(response.Comments);
                    $('#edstatus').val(response.Status);
                    $('#edRecordedBy').val(response.RecordedBy);

                    $('#statusModal').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }

        function ViewMerModal(id) {
            $.ajax({
                url: "<?php echo base_url('Mer/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#id11').val(response.MerID);
                    $('#edPirID11').val(response.PirID);
                    $('#edPatientName11').val(response.PatientName);
                    $('#edSPHOD11').val(response.SPH_OD);
                    $('#edCYLOD11').val(response.CYL_OD);
                    $('#edAXISOD11').val(response.AXIS_OD);
                    $('#edADDOD11').val(response.ADD_OD);
                    $('#edSPHOS11').val(response.SPH_OS);
                    $('#edCYLOS11').val(response.CYL_OS);
                    $('#edAXISOS11').val(response.AXIS_OS);
                    $('#edADDOS11').val(response.ADD_OS);
                    $('#edPD11').val(response.PD);
                    $('#edLens11').val(response.Lens);
                    $('#edRecordedBy11').val(response.RecordedBy);

                    $('#editMer2').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }
        // DataTables initialization
        $(document).ready(function() {
            $('#filesTable').DataTable();
        });

        $(document).ready(function() {
            $('#filesTable2').DataTable();
        });

        function ViewPirModal(id) {
            $.ajax({
                url: "<?php echo base_url('Pasyente/getEditData'); ?>",
                method: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    $('#id1').val(response.PirID);
                    $('#edLastName1').val(response.LastName);
                    $('#edFirstName1').val(response.FirstName);
                    $('#edMiddleName1').val(response.MiddleName);
                    $('#edSex1').val(response.Sex);
                    $('#edAge1').val(response.Age);
                    $('#edContact1').val(response.Contact);
                    $('#edAddress1').val(response.Address);
                    $('#edRecordedBy1').val(response.RecordedBy);

                    // Extracted DateOfBirth components
                    $('#eddob1').val(response.DateOfBirth);

                    $('#editPir2').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }
        $(document).ready(function() {
            function checkStatus() {
                var status = $('#edstatus').val();
                if (status === 'Pending' || status === 'Approved') {
                    $('input, select, textarea').prop('disabled', true);
                    $('#edComment, label[for="comment"], #edmerf').hide();
                } else {
                    $('input, select, textarea').prop('disabled', false);
                    $('#edComment, label[for="comment"], #edmerf').show();
                }
            }

            // Call the function initially
            checkStatus();

            // Set up the interval to call checkStatus every second
            setInterval(checkStatus, 1000);
        });
        $("#status").submit(function(event) {
            event.preventDefault();

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to save the changes!',
                icon: 'warning',
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, save it!"
                    $.ajax({
                        url: "<?php echo base_url('mer/updatemer'); ?>",
                        data: $("#status").serialize(),
                        type: "post",
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Changes have been saved.',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            });
        });

        function confirmRejectMer(MerID) {
            Swal.fire({
                title: 'Are you sure?',
                html: '<input type="text" id="rejectComment" class="swal2-input" placeholder="Enter your comment here...">',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, Reject it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    var comment = $('#rejectComment').val();
                    if (comment) {
                        RejectMer(MerID, comment);
                    } else {
                        Swal.fire('Error', 'Please add a comment.', 'error');
                    }
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            })
        }

        function RejectMer(MerID, comment) {
            $.ajax({
                url: '<?php echo base_url('mer/RejectReq'); ?>',
                type: 'POST',
                data: {
                    MerID: MerID,
                    Comment: comment
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('Success', response.message, 'success').then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        }

        $(document).ready(function() {
            $('#submitMer').click(function(e) {
                e.preventDefault();

                const PirID = $('#PirID').val();
                const PatientName = $('#PatientName').val();
                const SPHOD = $('#SPHOD').val();
                const CYLOD = $('#CYLOD').val();
                const AXISOD = $('#AXISOD').val();
                const ADDOD = $('#ADDOD').val();
                const SPHOS = $('#SPHOS').val();
                const CYLOS = $('#CYLOS').val();
                const AXISOS = $('#AXISOS').val();
                const ADDOS = $('#ADDOS').val();
                const PD = $('#PD').val();
                const Lens = $('#Lens').val();
                const RecordedBy = $('#RecordedBy').val();

                if (!PirID || !PatientName || !SPHOD || !CYLOD || !AXISOD || !ADDOD || !SPHOS || !CYLOS || !AXISOS || !ADDOS || !PD || !RecordedBy) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please fill out all fields.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return; // Stop the function execution
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('mer/addmer'); ?>',
                    data: {
                        PirID: PirID,
                        PatientName: PatientName,
                        SPHOD: SPHOD,
                        CYLOD: CYLOD,
                        AXISOD: AXISOD,
                        ADDOD: ADDOD,
                        SPHOS: SPHOS,
                        CYLOS: CYLOS,
                        AXISOS: AXISOS,
                        ADDOS: ADDOS,
                        PD: PD,
                        Lens: Lens,
                        RecordedBy: RecordedBy
                    },
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'New medical record have been saved.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while saving your data or contact the developer',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
        $("#editPirForm").submit(function(event) {
            event.preventDefault();

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to save the changes!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745', // Green color for the confirm button
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: false,
                customClass: {
                    popup: 'custom-popup-class', // Add a custom class to the popup/dialog

                    title: 'custom-title-class', // Add a custom class to the title
                    content: 'custom-content-class', // Add a custom class to the content/text

                    icon: 'custom-icon-class', // Add a custom class to the icon

                    form: 'custom-form-class', // Add a custom class to the form
                    resultPopup: 'custom-result-popup-class', // Add a custom class to the result message box
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, save it!"
                    $.ajax({
                        url: "<?php echo base_url('pasyente/updatepasyente'); ?>",
                        data: $("#editPirForm").serialize(),
                        type: "post",
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Changes have been saved.',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
                // Add custom class to the result message box immediately after showing it
                const resultPopup = Swal.getPopup();
                resultPopup.classList.add('custom-result-popup-class');
            });
        });


        $("#deletepasyenteForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('pasyente/deletepasyente'); ?>",
                data: $("#deletepasyenteForm").serialize(),
                type: "post",
                async: false,
                dataType: 'json',
                success: function(response) {

                    $('#deletepasyenteModal').modal('hide');
                    $('#deletepasyenteForm')[0].reset();

                    location.reload();
                },
                error: function() {
                    alert("error");
                }
            });
        });

        // function myFunction() {
        //     var PirID = $('#PirID').val();

        //     $.ajax({
        //         url: "<?php echo site_url('mer/search_pir'); ?>",
        //         method: 'post',
        //         data: {
        //             PirID: PirID
        //         },
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.success) {
        //                 $('#fullname').val(response.fullname);
        //             } else {
        //                 $('#fullname').val('');
        //             }
        //         }
        //     });
        // }

        function myFunction() {
            const PirID = document.getElementById('PirID').value;
            if (PirID !== '') {
                $.ajax({
                    url: "<?php echo base_url('mer/search_pir'); ?>",
                    type: 'post',
                    data: {
                        'PirID': PirID
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            document.getElementById('PatientName').value = null;
                        } else {
                            var PatientName = response.FirstName + ' ' + response.MiddleName + ' ' + response.LastName;
                            document.getElementById('PatientName').value = PatientName;
                        }
                    }
                });
            }
        }

        function myFunction1() {
            const edPirID = document.getElementById('edPirID').value;
            if (edPirID !== '') {
                $.ajax({
                    url: "<?php echo base_url('mer/search_pir1'); ?>",
                    type: 'post',
                    data: {
                        'edPirID': edPirID
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            document.getElementById('edPatientName').value = null;
                        } else {
                            var edPatientName = response.FirstName + ' ' + response.MiddleName + ' ' + response.LastName;
                            document.getElementById('edPatientName').value = edPatientName;
                        }
                    }
                });
            }
        }

        function calculateAgeed() {
            var dob = document.getElementById('eddob').value;
            var today = new Date();
            var birthDate = new Date(dob);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('edAge').value = age;
        }

        function calculateAge() {
            var dob = document.getElementById('dob').value;
            var today = new Date();
            var birthDate = new Date(dob);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('Age').value = age;
        }

        // setInterval(calculateAgeed, 1000); 



        document.addEventListener('DOMContentLoaded', function() {
            var currentDateElement = document.getElementById('crnt-dt');
            var currentDate = new Date();
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = currentDate.toLocaleDateString('en-US', options);
            currentDateElement.textContent = formattedDate;
        });

        $(document).ready(function() {
            // Function to fetch and update Resident ID
            function updatePirId() {
                $.ajax({
                    url: "<?php echo site_url('pasyente/generate_pir_id'); ?>",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Update the input field with the generated Resident ID
                        $('#PirIDS').val(data.PirID);
                    }
                });
            }

            // Call the function once after 1 second
            setTimeout(updatePirId, 1000);
        });
        // pag may nag error master pwede mo to burahin tapos i uncomment mo yung nasa taas neto
    </script>
<?php   } ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        overflow-x: hidden;
        /* Hide the horizontal scrollbar */
    }

    /* Sidebar Styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: -260px;
        /* Initially hide the sidebar */
        height: 100%;
        width: 260px;
        background-image: linear-gradient(to right, #073f7f, #073f7f);
        padding-top: 15px;
        transition: 0.3s;
        z-index: 2;
        /* Adjust z-index */
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        /* Hide both vertical and horizontal scroll bars */
        overflow-x: hidden;
    }

    /* Make the scrollbar transparent with 0 opacity */
    .sidebar::-webkit-scrollbar {
        width: 1px;
        /* Adjust the width as needed */
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: white;
        /* Make the thumb transparent */
    }

    .sidebar::-webkit-scrollbar-track {
        background: white;
        /* Make the track transparent */
    }

    .brand {
        position: relative;
        text-align: center;
        width: 100%;
        font-family: Verdana, Geneva, Tahoma, sans-serif;

        position: relative;
        background: linear-gradient(to right bottom, #073f7f 30%, #073f7f 80%);
    }


    #MERsut-txt {
        font-size: 25px;
    }

    .animate-MER {
        margin-top: 10px;
        margin-left: 10px;
        background-image: linear-gradient(225deg,
                #ffffff 0%,
                #ffffff 29%,
                #99a7c8 67%,
                #004cff 100%);
        background-size: auto auto;
        background-clip: border-box;
        background-size: 200% auto;
        color: #fff;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textclip 5s linear infinite;
        display: inline-block;
        /* font-size: 30px; */
    }

    @keyframes textclip {
        to {
            background-position: 200% center;
        }
    }

    .line {
        position: relative;
        width: 100%;
        left: 15px;
        height: 3px;
        background-color: rgb(134, 134, 134);
        /* z-index: 1; */
    }

    .sidebar a#active {
        padding: 35px 25px;
        /* Added padding top and bottom */
        text-decoration: none;
        font-size: 20px;
        color: #d6d5d5;
        display: block;
        align-items: center;
        /* Center the icon and text */
        transition: 0.3s;
        border-bottom: solid 6px rgba(0, 123, 255, 0.513);
        border-top: solid 6px rgba(0, 123, 255, 0.513);
    }

    .sidebar a#none {
        padding: 25px 8px;
        /* Added padding top and bottom */
        text-decoration: none;
        font-size: 20px;
        color: #d6d5d5;
        display: flex;
        align-items: center;
        /* Center the icon and text */
        transition: 0.3s;
    }

    .sidebar a#none i {
        margin-right: 8px;
        /* padding: 10px 0px 10px 0px; */
        padding: 15px;
    }


    .sidebar li {
        position: relative;
        line-height: 20px;
        /* display: inline-block; */
        width: 100%;
        list-style: none;
    }


    .sidebar li:before {
        content: '';
        position: absolute;
        top: 0;
        left: -3px;
        z-index: -1;
        height: 100%;
        width: 3px;
        background-color: #00000072;
        /* color: #a94949; */
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

        border-bottom: rgb(2, 193, 223) 3px solid;

    }

    #Sgn-Out-btn:before {
        background-color: #ff00009a;
        border-bottom: rgb(2, 193, 223) 3px solid;
    }


    /* .sidebar li:nth-child(5n+3):before {
      background-color: #440e04;
    }
    .sidebar li:nth-child(5n+4):before {
      background-color: #ca8b02;
    }
    .sidebar li:nth-child(5n+5):before {
      background-color: #79aefe;
    } */

    .sidebar li:hover:before,
    .sidebar li.open:hover:before {
        width: 101%;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }


    .sidebar li a#none:hover {
        display: block;
        color: #ffffff;
        text-decoration: none;
    }

    .overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(81, 77, 74, 0.8);
        z-index: 1;
    }

    /* Animation */
    .sidebar:before {
        content: "\f054";
        /* Font Awesome bars icon (hamburger) */
        font-family: FontAwesome;
        font-size: 30px;
        color: #fff;
        position: absolute;
        left: -30px;
        transition: 0.3s;
        cursor: pointer;
    }

    .sidebar.open {
        left: 0;
        z-index: 1;
        /* Adjust z-index */
    }

    .sidebar.open:before {
        left: 250px;
    }

    /* Content Area Styles */
    .content {
        margin-left: 0;
        /* Adjusted to 0 when sidebar is open */
        transition: 0.3s;
        padding: 20px;
        /* Added padding */
        z-index: 0;
        /* Adjust z-index */
    }

    /* Toggle Button Styles */
    .toggle-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        z-index: 3;
        /* Adjust z-index */
    }

    @media (min-width: 768px) {
        .toggle-btn {
            display: none;
        }

        .content {
            margin-left: 250px;
        }

        .sidebar {
            left: 0;
        }
    }


    @media (max-height: 760px) {
        .sidebar {
            overflow-y: auto;
        }
    }

    .userm-txt {
        /* position: fixed; */

        font-size: 48px;
        font-weight: bold;
        top: 100px;
        /* left: 740px; */
        background-image: linear-gradient(to right, #073f7f, #b7c3e4);
        -webkit-background-clip: text;
        /* For Safari */
        background-clip: text;
        color: transparent;
        display: inline-block;

    }

    /* ---------   PIE CHARTS   ------------ */

    @property --p {
        syntax: '<number>';
        inherits: true;
        initial-value: 1;
    }

    .pie {
        --p: 20;
        --b: 22px;
        --c: rgb(17, 92, 17);
        --w: 150px;

        width: var(--w);
        aspect-ratio: 1;
        position: relative;
        display: inline-grid;
        margin: 25px;
        place-content: center;
        font-size: 25px;
        font-weight: bold;

    }

    .pie:before,
    .pie:after {
        content: "";
        position: absolute;
        border-radius: 50%;
    }

    .pie:before {
        inset: 0;
        background:
            radial-gradient(farthest-side, var(--c) 98%, #9b6a6a00) top/var(--b) var(--b) no-repeat,
            conic-gradient(var(--c) calc(var(--p)*1%), #88000000 0);
        -webkit-mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
        mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
    }

    .pie:after {
        inset: calc(50% - var(--b)/2);
        background: var(--c);
        transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
    }

    .animate {
        animation: p 1s .5s both;
    }

    .no-round:before {
        background-size: 0 0, auto;
    }

    .no-round:after {
        content: none;
    }

    @keyframes p {
        from {
            --p: 0
        }
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    /* Custom CSS for background colors  */
    #bg-lightblue {
        background: linear-gradient(to right top, #326c92 10%, #9eb2d0, #1766d4 80%);
        padding: 30px 60px;
        width: 100%;
        height: 350px;
        border-radius: 15px;
    }

    .bg-blue {
        height: 200px;
        width: 100%;
        color: black;
        border-radius: 15px;
        /* Add white text for visibility */
    }

    #con1 {
        position: relative;
        margin-top: 20px;
        background-color: #a7c8e7;
        height: 90%;
        width: 100%;
        border-radius: 15px;

    }

    #con2 {
        position: relative;
        margin-top: 20px;
        background-color: #a7c8e7;
        height: 90%;
        width: 100%;
        border-radius: 15px;
        /* margin-bottom: 30px; */
    }

    .sys-per {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .sto-used {
        font-size: 18px;
    }

    .sto-avail {
        font-size: 18px;
    }

    .security {
        font-size: 18px;
    }

    .act-logs {
        font-size: 18px;

    }


    #helo-lbl {
        margin-left: 30px;
        font-size: 30px;
        font-weight: bold;
        background: #073f7f;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }

    .first-que {
        font-size: 15px;
        font-weight: 500;

    }

    .first-date {
        font-size: 15px;
        color: #006875;
    }

    .sec-que {
        font-size: 15px;
        font-weight: 500;
    }

    .sec-date {
        font-size: 10px;
        color: #9a03ff;
    }

    .third-que {
        font-size: 15px;
        font-weight: 500;
    }

    .third-date {
        font-size: 10px;
        color: #ff00b3;

    }

    .outer-circle {
        width: 80px;
        height: 80px;
        border: 2px solid #eb8abe;
        /* Outer circle outline */
        border-radius: 50%;
        /* Rounded shape */
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 10px;
        /* Space around the outer circle */
    }

    .inner-circle {
        width: 66px;
        height: 66px;
        /* background-color: #e4aecb;  */
        /* Inner circle background color */
        border-radius: 50%;
        /* Rounded shape */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 767px) {
        #bg-lightblue {
            min-height: 600px;
            /* Adjust the height as needed for mobile devices */
        }

        .outer-circle {
            width: 50px;
            height: 50px;
            border: 2px solid #eb8abe;
            /* Outer circle outline */
            border-radius: 50%;
            /* Rounded shape */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
            /* Space around the outer circle */
        }

        .inner-circle {
            width: 33px;
            height: 33px;
            /* background-color: #e4aecb;  */
            /* Inner circle background color */
            border-radius: 50%;
            /* Rounded shape */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #today-btn {
            font-size: 10px;
        }

    }

    #hidetbody {
        color: rgb(0, 0, 0, 0.0);
    }

    .single-line {
        white-space: nowrap;
    }

    #patientModalLabel {

        font-weight: bold;
        background-image: linear-gradient(to right, #073f7f, #b7c3e4);
        -webkit-background-clip: text;
        /* For Safari */
        background-clip: text;
        color: transparent;
        display: inline-block;
        font-size: 28px;
    }

    #patientModal {
        color: #073f7f;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
    }

    #editPir {
        color: #073f7f;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
    }

    #edmerModal {
        color: #073f7f;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
    }


    .input-group input {
        font-size: 16px;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
        width: 200px;
        box-sizing: border-box;
    }

    .ui-datepicker {
        font-size: 16px;
        border: 2px solid #337ab7;
        border-radius: 4px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        z-index: 9999 !important;
    }

    .ui-datepicker-header {
        background-color: #337ab7;
        border: none;
        color: #fff;
        border-radius: 4px 4px 0 0;
        position: relative;
        padding-top: 40px;
    }

    .ui-datepicker-prev,
    .ui-datepicker-next {
        border: solid 2px white;
        background-color: #337ab7;
        color: #fff;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        margin-top: -20px;
        padding: 5px 10px;
        /* Adjusted margin */
    }

    .ui-datepicker-prev {
        left: 10px;
    }

    .ui-datepicker-next {
        right: 10px;
    }

    .ui-datepicker-prev:hover,
    .ui-datepicker-next:hover {
        background-color: #23527c;
    }

    .ui-datepicker-calendar {
        border: 1px solid #ccc;
        background-color: #fff;
        border-radius: 0 0 4px 4px;
    }

    .ui-datepicker-calendar th,
    .ui-datepicker-calendar td {
        padding: 10px;
        text-align: center;
    }

    .ui-datepicker-calendar td:hover {
        background-color: #f4f4f4;
    }

    .ui-datepicker-year,
    .ui-datepicker-month {
        width: 49%;
        margin: 5px auto;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .ui-datepicker-trigger {
        background-color: #337ab7;
        border: none;
        color: #fff;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .ui-datepicker-trigger:hover {
        background-color: #23527c;
    }


    /* ----------------------------------------------------------- EDIT PROFILE CSS -------------------------------------------------- */

    #profileImage {
        height: 200px;
        width: 200px;
        /* You can adjust the maximum height as needed */
        overflow: hidden;
    }

    #anotherIcon {
        position: relative;
        max-height: 200px;
        max-width: 200px;
        border-radius: 30px;
        top: 17px;
    }

    #imageInput {
        position: relative;
        z-index: 1;

    }

    #left-frm {
        height: 410px;
        border-color: #073f7f;
    }

    .custom-file-label {
        background-color: #073f7f;
        color: #ffffff;
        font-weight: 500;
        transition: background-color 0.5s;
    }

    .custom-file-label::after {
        content: none;
    }

    .custom-file-label:hover,
    .gradient-hover-effect:focus {
        background-color: #ffffff;
        color: #000000;
    }

    #antioverflow {
        overflow: hidden;
    }

    #descript-txt {
        background-color: #d4dceb;
        max-height: 100px;
        font-weight: 500;
        overflow-y: auto;
    }

    #usr-info {
        color: #ffffff;
        border-radius: 20px;
        background: linear-gradient(65deg, #194A84, #194A8478 75%, #9eb2d0 85%, #194A84);
    }

    #updt-btn {
        background-color: #073f7f;
        font-weight: 500;
        font-size: 20px;
        width: 150px;
        height: 45px;
        transition: background-color 0.5s;
    }

    #updt-btn:hover,
    .gradient-hover-effect:focus {
        background-color: #ffffff;
        color: #000000;
    }

    #updt-btn:active {
        box-shadow: 0 2px #666;
        transform: translateY(3px);
    }

    /* ------------------------------- BIGGER SIZE SCREEN -------------------------------- */

    @media (min-width: 768px) {
        .toggle-btn {
            display: none;
        }

        .editP-txt {
            position: relative;
            margin-left: 20px;
            font-size: 60px;
            font-weight: bold;
            background-image: linear-gradient(to right, #073f7f, #073f7f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

    }

    /* ------------------------------- BIGGER SIZE SCREEN END -------------------------------- */


    /* ------------------------------- SMALLER SIZE SCREEN -------------------------------- */
    @media (max-width: 767px) {


        .editP-txt {
            position: relative;
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            background-image: linear-gradient(to right, #073f7f, #073f7f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        #admin-row {
            flex-direction: row-reverse;
        }

    }

    /* --------------------------------------- ETO YUNG CUSTOM DESIGN SA DATA TABLE ------------------------------------- */

    .panel {
        background: linear-gradient(to right, #073f7f, #2c3e50);
        padding: 0;
        border-radius: 10px;
        border: none;
        box-shadow: 0 0 0 5px rgba(0, 0, 0, 0.05), 0 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .panel .panel-heading {
        padding: 20px 15px;
        border-radius: 10px 10px 0 0;
        margin: 0;
    }

    .panel .panel-heading .title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        text-transform: capitalize;
        line-height: 40px;
        margin: 0;
    }

    .panel .panel-heading .btn {
        color: rgba(255, 255, 255, 0.5);
        background: transparent;
        font-size: 16px;
        text-transform: capitalize;
        border: 2px solid #fff;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
    }

    .panel .panel-heading .btn:hover {
        color: #fff;
        text-shadow: 3px 3px rgba(255, 255, 255, 0.2);
    }

    .panel .panel-heading .form-control {
        color: #fff;
        background-color: transparent;
        width: 35%;
        height: 40px;
        border: 2px solid #fff;
        border-radius: 20px;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    .panel .panel-heading .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        box-shadow: none;
        outline: none;
    }

    .panel .panel-heading .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
        font-size: 15px;
        font-weight: 500;
    }

    .panel .panel-body {
        padding: 0;
    }

    .panel .panel-body .table thead tr th {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 12px;
        border: none;
    }

    .panel .panel-body .table tbody tr td {
        color: #000000;
        /* background: linear-gradient(to right, #073f7f, #20588f); */
        font-size: 14px;
        padding: 10px 12px;
        vertical-align: middle;
        border-color: #045ec6;

        transition: all 0.5 ease 0s;
        overflow: hidden;
    }

    /* Add hover effect for table rows */
    .panel .panel-body .table tbody tr:hover td {
        background: linear-gradient(to right, #20588f, #073f7f);
        /* Change the gradient colors on hover */
        color: #fff;
        /* Change text color on hover */
        transform: scale(1.0);
        /* Add a subtle scale effect on hover */
        overflow: auto;
    }

    .panel .panel-body .table tbody tr:nth-child(even) {
        background-color: rgb(255, 255, 255);
    }

    .panel .panel-body .table tbody .action-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .panel .panel-body .table tbody .action-list li {
        display: inline-block;
        margin: 0 5px;
    }

    .panel .panel-body .table tbody .action-list li a {
        color: #fff;
        font-size: 15px;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }

    .panel .panel-body .table tbody .action-list li a:hover {
        text-shadow: 3px 3px 0 rgba(255, 255, 255, 0.3);
    }

    .panel .panel-body .table tbody .action-list li a:before,
    .panel .panel-body .table tbody .action-list li a:after {
        content: attr(data-tip);
        color: #fff;
        background-color: #111;
        font-size: 12px;
        padding: 5px 7px;
        border-radius: 4px;
        text-transform: capitalize;
        display: none;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
        top: -32px;
        transition: all 0.3s ease 0s;
    }

    .panel .panel-body .table tbody .action-list li a:after {
        content: '';
        height: 15px;
        width: 15px;
        padding: 0;
        border-radius: 0;
        transform: translateX(-50%) rotate(45deg);
        top: -18px;
        z-index: -1;
    }

    .panel .panel-body .table tbody .action-list li a:hover:before,
    .panel .panel-body .table tbody .action-list li a:hover:after {
        display: block;
    }

    .panel .panel-footer {
        color: #a31111;
        background-color: transparent;
        padding: 10px;
        border: none;
    }

    .panel .panel-footer .col {
        line-height: 35px;
    }

    /* Customize the header background color */
    #example1 thead th,
    #example2 thead th,
    #example3 thead th,
    #example4 thead th,
    #example5 thead th,
    #example6 thead th,
    #example7 thead th,
    #example8 thead th,
    #example9 thead th,
    #example10 thead th {
        background-color: #1662b9;
        color: rgb(255, 255, 255);
        border: 1px solid #ffffff32;
    }

    /* Customize the search input */
    #example1_filter input[type="search"],
    #example2_filter input[type="search"],
    #example3_filter input[type="search"],
    #example4_filter input[type="search"],
    #example5_filter input[type="search"],
    #example6_filter input[type="search"],
    #example7_filter input[type="search"],
    #example8_filter input[type="search"],
    #example9_filter input[type="search"],
    #example10_filter input[type="search"] {
        position: relative;
        right: 10px;
        max-width: 230px;
        padding: 5px 10px 5px 20px;
        border: 1px solid #ffffff;
        border-radius: 20px;
        color: white;

        transition: background-color 0.5s ease;

    }

    #example1_filter input[type="search"]:hover,
    #example2_filter input[type="search"]:hover,
    #example3_filter input[type="search"]:hover,
    #example4_filter input[type="search"]:hover,
    #example5_filter input[type="search"]:hover,
    #example6_filter input[type="search"]:hover,
    #example7_filter input[type="search"]:hover,
    #example8_filter input[type="search"]:hover,
    #example9_filter input[type="search"]:hover,
    #example10_filter input[type="search"]:hover {
        background-color: #3e87d9;
        /* color: black; */
    }


    /* Change the color of the search input field's placeholder text */
    .dataTables_filter input::placeholder {
        color: rgb(173, 170, 170);
    }


    /* Change the color of DataTable info text */
    .dataTables_info {
        position: relative;
        color: #ffffff !important;
        left: 10px;
    }

    /* Change the color of the "Show" text */
    .dataTables_length label {
        color: white;
        margin-left: 10px;
    }

    /* Change the color of the "Entries" text */
    .dataTables_length select {
        color: rgb(255, 255, 255);
        background-color: #073f7f !important;
    }


    /* Change the color of the active page button */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        border-radius: 20px;
        color: #020202 !important;
        padding: 5px 13px;
        transition: all 0.3s ease 0s;
        background-color: #004cff !important;
    }

    /* Style for previous and next buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
    .dataTables_wrapper .dataTables_paginate .paginate_button,
    .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        background-color: #073f7f;
        border: 1px solid #007bff;
        border-radius: 20px;
        padding: 5px 13px;
        color: rgb(255, 255, 255) !important;
        text-decoration: none;
        margin-right: 5px;
        transition: all 0.3s ease 0s;
        margin: 5px;
    }


    /* @media (min-width: 1000px) {
      .panel {
        position: relative;

      }
    }

    @media (min-width: 768px) and (max-width: 999px) {
      .panel {
        position: relative;
        left: 215px;

      }
    }

    @media only screen and (max-width:767px) {
      .panel .panel-heading .title {
        text-align: center;
        margin: 0 0 10px;
      }

      .panel .panel-heading .btn_group {
        text-align: center;
      }

    } */



    /* --------------------------------------- ETO YUNG CUSTOM DESIGN SA DATA TABLE END ------------------------------------- */
    /* --------------------------------------- ETO YUNG PARA SA BAGONG STYLE NG MODAL FORM ------------------------------------- */


    .modal-dialog {
        /* display: inline-block; */
        /* Keeps the content from taking up full width */
        border-radius: 23px;
        /* Set the border radius for the container */
        overflow: hidden;
        /* Clip the rounded corners */
    }

    .modal-content {
        /* PAG TRIP NIYO TRANSPARENT NA MODAL FORM */
        /* background: linear-gradient(65deg, #194A84, #194A8478 75%, #9eb2d0 85%, #194A84); */
        background-color: rgb(255, 255, 255);
        background-repeat: no-repeat;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        z-index: 2;
        position: relative;
        border: 5px solid;
        border-radius: 25px;
        /* BORDER ANIMATION TO PWEDENG ICOMMENT PAG FORMAL PRINT */
        border-image: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn) 30;
        animation: borderRotate var(--d) linear infinite forwards;
        /* border-image-slice: 30; */

        /* Adjust this value to control the radius */
        border-image-source: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn);
    }

    /* Styles for the image */


    /* Styles for the image */



    /* Add the overlay */


    /* GUMAGANA ETO KASO EXPERIMENTAL KAYA MAY RED PERO WALANG ERROR, PWEDE DIN NAKA SEPARATE YUNG CSS PROPERTY NETO */
    /* ETO NGA PALA YUNG NAG PAPAGALAW SA BODER ANIMATION SA MODAL */

    @property --angle {
        syntax: '<angle>';
        initial-value: 90deg;
        inherits: true;
    }

    @property --gradX {
        syntax: '<percentage>';
        initial-value: 50%;
        inherits: true;
    }

    @property --gradY {
        syntax: '<percentage>';
        initial-value: 0%;
        inherits: true;
    }

    /* ETO NGA PALA YUNG NAG PAPAGALAW SA BODER ANIMATION SA MODAL */
    /* GUMAGANA ETO KASO EXPERIMENTAL KAYA MAY RED PERO WALANG ERROR, PWEDE DIN NAKA SEPARATE YUNG CSS PROPERTY NETO */

    :root {
        --d: 2500ms;
        --angle: 90deg;
        --gradX: 100%;
        --gradY: 50%;
        --c1: rgba(168, 239, 255, 1);
        --c2: rgba(168, 239, 255, 0.1);
    }

    @keyframes borderRotate {
        100% {
            --angle: 420deg;
        }
    }



    /* -------------------------------------- SAME STYLE LANG YUNG PIR MODAL FORM AT MER MODAL FORM ---------------------------------- */

    #crnt-dt {
        position: relative;
        display: block;
        text-align: end;

    }

    #mdl-lgo {
        background-color: #073f7f;
        padding: 7px;
        border-radius: 10px;
        width: 50px;
        height: 50px;
    }

    #pat-info,
    #cntc-dtls {
        background-color: #073f7f;
        color: #ffffff;
        padding: 7px 15px;
        border-radius: 5px;
        margin-bottom: 20px;

    }

    #NOTC {
        background-color: #073f7f;
        color: #ffffff;
        padding: 7px 65px;
        border-radius: 5px;
    }

    /* ------ PIR ID CUSTOM WIDTH ------ */
    /* #PIR-id {
      max-width: 280px;
    } */
    /* ------ PIR ID CUSTOM WIDTH ------ */


    /* ------ PIR number CUSTOM WIDTH ------ */
    #pat-no {
        max-width: 505px;
    }

    /* ------ PIR number CUSTOM WIDTH ------ */


    .modal-body label {
        color: #073f7f;
        font-weight: bold;
    }

    #PIR-ModalLabel,
    #MER-ModalLabel {
        color: #073f7f;
        font-weight: 500;

    }

    #mdl-xbtn {
        font-weight: bold;
        color: #000000;
    }

    #submitPasyente {
        background-color: #073f7f;
        color: #ffffff;
        font-weight: bold;
    }

    #submitPasyente:hover {
        background-color: #16b3fc;
        color: #000000;
    }

    #submitMer {
        background-color: #073f7f;
        color: #ffffff;
        font-weight: bold;
    }

    #submitMer:hover {
        background-color: #16b3fc;
        color: #000000;
    }

    #edmerfs {
        background-color: #073f7f;
        color: #ffffff;
        font-weight: bold;
    }

    #edmerfs:hover {
        background-color: #16b3fc;
        color: #000000;
    }

    #designBTNS {
        background-color: #073f7f;
        color: #ffffff;
        font-weight: bold;
    }

    #designBTNS:hover {
        background-color: #16b3fc;
        color: #000000;
    }

    /* --------------------------------------- ETO YUNG PARA SA BAGONG STYLE NG MODAL FORM ------------------------------------- */

    .chart-container {
        width: 100%;
        margin: 0 auto;
        overflow-x: auto;
    }

    #weeklyChart {
        background: linear-gradient(to bottom left, #add8e6, #ffffff);
        padding: 15px 20px;
        border-radius: 10px;
        width: 100%;
    }

    #weeklyChart1 {
        background: linear-gradient(to bottom left, #add8e6, #ffffff);
        padding: 15px 20px;
        border-radius: 10px;
        width: 100%;
    }





    /* ------------------ ADMIN BACK UP ------------------ */

    #Bcku-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* ------------------ ADMIN BACK UP END ------------------ */



    /* ------------------ OPTO REPOSITORY ------------------ */

    #Opto-Repo-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* ------------------ OPTO REPOSITORY END ------------------ */



    /* ------------------ OPTO ARCHIVE ------------------ */

    #Opto-Arcv-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* ------------------ OPTO ARCHIVED END ------------------ */


    /* ------------------ OPTO GENERATE RECORD ------------------ */

    #Opto-GenR-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* ------------------ OPTO GENERATE RECORD END ------------------ */



    /* ------------------ SECRETARY REPOSITORY ------------------ */

    #Sec-Repo-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* ------------------ SECRETARY REPOSITORY END ------------------ */



    /* ------------------ SECRETARY GENERATE RECORD ------------------ */

    #Sec-GenR-btn .dropdown-menu {
        background: linear-gradient(65deg, #194A84, #0c284ae4 65%, #9eb2d0 85%, #194A84);
        text-align: center;
        border-radius: 10px;
    }

    /* --------------- First message box modified background color --------------- */
    .custom-popup-class {
        /* background-color: #073f7f !important; */
        background: linear-gradient(125deg, #10417eeb 10%, #7c9dc5 45%, #6180af 75%, #194984ab 100%) !important;

        /* Set your desired background color */
    }

    /* --------------- First message box modified background color End --------------- */


    /* --------------- Second message box modified background color --------------- */
    /* .swal2-popup.custom-result-popup-class {
      background-color: #000000 !important;
    } */
    .swal2-popup.custom-result-popup-class .swal2-title,
    .swal2-popup.custom-result-popup-class .swal2-content {

        color: #073f7f !important;
        /* Set your desired text color for the result message */
    }

    /* --------------- Second message box modified background color End --------------- */


    /* ---------- Message dialog custom colors -------- */

    .custom-title-class {
        color: #ffffff !important;
        /* Set your desired title text color */
    }

    .custom-content-class {
        color: white !important;
        /* Set your desired content/text color */
    }

    .custom-icon-class {
        color: #ffc800 !important;
        /* Set your desired icon color */
    }

    /* ---------- Message dialog custom colors End -------- */

    /* Change the color of the confirm button to green */
    .swal2-confirm {
        background-color: #38b13c !important;
        /* Green color */
        color: #fff;
        /* White text */
        transition: linear 0.5s;
        /* transition: color 0.5s linear; */
        /* transition: background 0.3s ease-in-out; */
        /* Smooth transition on background change */
    }

    /* Change the color of the cancel button to orange */
    .swal2-cancel {
        background-color: rgb(198, 52, 52) !important;
        /* Orange color */
        color: #fff;
        /* White text */
        /* transition: background-color 0.5s; */
    }

    /* Change the outline color of the buttons when clicked or focused */
    .swal2-confirm:focus,
    .swal2-confirm:active,
    .swal2-cancel:focus,
    .swal2-cancel:active {
        box-shadow: 0 0 10px #000000 !important;
        /* Black color */

    }

    /* Add hover color of the buttons when pointered */
    .swal2-confirm:hover {
        /* background-color: #4caf4f !important; */
        background: linear-gradient(65deg, #4caf50 0%, #238825 40%, #176819 70%, #43c745 100%) !important;
    }

    .swal2-cancel:hover {
        /* background-color: #4caf4f !important; */
        background: linear-gradient(65deg, #e41818 0%, #a92121 40%, #7a1515 70%, #e43838 100%) !important;
    }

.swal2-popup.swal2-modal.swal2-icon-error.swal2-show {
        background: linear-gradient(125deg, #10417eeb 10%, #7c9dc5 45%, #6180af 75%, #194984ab 100%) !important;
    }
    #swal2-html-container.swal2-html-container {
        color: white;
    }
    /* ------------------ SECRETARY GENERATE RECORD END ------------------ */




    /* ------------------------- FOR LIGHT THEME ---------------------- */

    .checkbox {
        opacity: 0;
        position: absolute;
    }

    .label {
        background-color: #111;
        border-radius: 50px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px;
        position: relative;
        height: 26px;
        width: 50px;
        transform: scale(1.5);
    }

    .label .ball {
        /* background-color: #073f7fc0; */
        background: linear-gradient(120deg, #e0bd6d 30%, #073f7f 70%, #9eabb9 100%);
        border-radius: 50%;
        position: absolute;
        top: 2px;
        left: 2px;
        height: 22px;
        width: 22px;
        transform: translateX(0px);
        transition: transform 0.2s linear;
    }

    .checkbox:checked+.label .ball {
        transform: translateX(24px);
    }


    .fa-moon {
        color: #e7d281;
    }

    .fa-sun {
        color: #f39c12;
    }

    #ttal-pats {
        color: #000000;
    }

    /* ------------------------- FOR LIGHT THEME END ---------------------- */


    /* ------------------------- FOR DARK THEME --------------------------- */

    .glass-overlay {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, #7dade47d, #355b877d, rgba(255, 255, 255, 0.782), transparent),
            url('<?php echo base_url('logo/Elements/Mer-logs.png') ?>');
        background-size: 50% auto, cover;
        /* Adjust the background size */
        background-position: 0 0, center;
        /* Position the gradient and image */
        /* background: linear-gradient(120deg, #e0bd6d 30%, #073f7f 70%, #9eabb9 100%); */
        /* animation: glassAnimation 1.2s ease-in-out; */
        animation: glassAnimation 0.7s ease-in-out forwards;
        pointer-events: none;
        z-index: -1;
        opacity: 0.5;

        overflow: hidden;
    }


    /* Effects for Light to dark mode */
    @keyframes glassAnimation {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(100%);
        }


    }



    /* Additional keyframes for reversing the animation */
    @keyframes glassAnimationReverse {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(-100%);
        }

    }

.swal2-popup.swal2-modal.swal2-icon-success.swal2-show {
        background: linear-gradient(125deg, #10417eeb 10%, #7c9dc5 45%, #6180af 75%, #194984ab 100%) !important;
    }



    .swal2-success-circular-line-right,
    .swal2-success-fix,
    .swal2-success-circular-line-left {
        background-color: inherit !important;
    }





    :root {
        --text-color-light: #073f7f;
        /* Blue color for light mode */
        --text-color-dark: #ffffff;
        /* White color for dark mode */

    }


    body {
        transition: background 0.9s linear, color 0.9s linear;
        /* animation: gradientTransition 0.9s linear; */
    }

    body.dark {
        background: #292C35;
        color: var(--text-color-dark);
    }

    body.light {
        background: #ffffff;
        color: var(--text-color-light) !important;
        transition: background 0.9s linear, color 0.9s linear;
    }



    /* Close button style in dark mode */
    body.dark #mdl-xbtn {
        color: #ffffff !important;
    }



    body.dark .modal-content {
        background-color: #4d4d4d;
        /* Gray background color for dark mode */
        color: #ffffff;
        /* White text color for dark mode */

        transition: background-color 1.2s ease-in-out, color 1.2s ease-in-out;
        /* Smooth transition on background and text color change */
    }

    /* Light mode transition on background and text color change */
    body.light .modal-content {
        background-color: #ffffff;
        color: #000000;
        transition: background-color 1.2s ease-in-out, color 1.2s ease-in-out;
    }

    body.dark h1,
    body.dark h2,
    body.dark h3,
    body.dark h4,
    body.dark h5,
    body.drak h6,
    body.dark p,
    body.dark label,
    body.dark .editP-txt,
    body.dark .dropdown-toggle

    /* body.dark input, */
    /* body.dark select  */
        {
        color: #ffffff !important;
    }

    body.dark #con1,
    body.dark #con2 {
        background-color: #073f7f;
    }

    body.dark a#active.dropdown-toggle {
        color: black !important;
    }

    body.dark #admn-btn.dropdown-toggle,
    #useradmbtn.dropdown-toggle {
        color: black !important;
    }

    body.dark .modal-body td {
        color: black;
    }

body.dark #antioverflow {
        background-color: #011c3a;
    }

body.dark #Image {
        color: #073f7f;
    }
    /* ------------------------ DATA TABLE IN DARK THEME --------------------- */

    body.dark .panel .panel-body .table tbody tr td {
        color: #ffffff;
        background: linear-gradient(to right, #05274e, #1b4a79);
        font-size: 14px;
        padding: 10px 12px;
        vertical-align: middle;
        border-color: #045ec6;

        transition: all 0.5 ease 0s;
        overflow: hidden;
        transition: background-color 0.6s ease-in-out, color 0.6s ease-in-out;
    }



    /* Add hover effect for table rows */
    body.dark .panel .panel-body .table tbody tr:hover td {
        background: linear-gradient(170deg, rgb(236, 232, 204), #fff);

        color: #000000;


        transform: scale(1.0);

        overflow: auto;


    }

    body.dark .panel .panel-body .table tbody tr:nth-child(even) {
        background-color: rgb(255, 255, 255);
    }



    body.dark .panel {
        background: linear-gradient(to right, #011c3a, #011c3a);
        padding: 0;
        border-radius: 10px;
        border: none;
        box-shadow: 0 0 15px rgba(192, 192, 192, 0.763), 0 0 0 10px rgba(0, 0, 0, 0.05);
    }



    /* Customize the header background color */
    body.dark
    /* #blu-tbl  */
    /* thead th {
        background-color: #87bcf9;
        color: rgb(0, 0, 0);
        border: 1px solid #ffffff32;
        transition: background-color 0.6s ease-in-out, color 0.6s ease-in-out;
    } */


    /* Change the color of the "Entries" text */
    body.dark .dataTables_length select {
        color: rgb(255, 255, 255);
        background-color: #94b4d9 !important;
        border-color: #4d76a4;
        transition: background-color 0.6s ease-in-out, color 0.6s ease-in-out;
    }



    /* Change the color of the active page button */
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        border-radius: 20px;
        color: #020202 !important;
        padding: 5px 13px;
        transition: all 0.3s ease 0s;
        background-color: #004cff !important;
    }

    /* Style for previous and next buttons */
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button,
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        background-color: #87bcf9 !important;
        border: 1px solid #043d7b;
        border-radius: 20px;
        padding: 5px 13px;
        color: #073f7f !important;
        text-decoration: none;
        margin-right: 5px;
        transition: all 0.3s ease 0s;
        margin: 5px;
    }


    /* Style for disabled previous and next buttons */
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button.previous.disabled,
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button.next.disabled {
        background-color: transparent;
        border: 1px solid transparent;
        color: rgba(255, 255, 255, 0.5) !important;
        background-color: #5a9ce0;
        /* cursor: not-allowed; */
        transition: all 0.3s ease 0s;
    }

    /* Hover animation for enabled buttons */
    body.dark .dataTables_wrapper .dataTables_paginate .paginate_button:not(.disabled):hover {
        background-color: #5a9ce0;
        border-color: #195697;
        color: rgb(255, 255, 255) !important;
        transition: all 0.3s ease 0s;
    }

    /* ------------------------- FOR DARK THEME END --------------------------- */
    }
</style>

<body>
    <?php
    if ($this->session->userdata('user_info')) {
        $user_info = $this->session->userdata('user_info');
    ?>
        <div class="overlay"></div>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">

            <div class="brand row">
                <!-- <h3>Brand Name</h3> -->
                <img class="ml-5 mt-2 mb-4" src="<?php echo base_url('logo/Elements/Mer-logs.png') ?>" alt="MER Suite logo" width="40" height="40">
                <a id="MERsut-txt" class="animate-MER" href="<?php echo site_url('home/index'); ?>">MER Suite</a>
                <div class="line mt-2"></div>
            </div>
            <div class="container mt-3 mb-2">
                <div class="container vh-70 d-flex justify-content-center align-items-center">
                    <div class="one-quarter" id="switch">
                        <input type="checkbox" class="checkbox" id="chk" />
                        <label class="label" for="chk">
                            <i class="fas fa-sun"></i>
                            <i class="fas fa-moon"></i>
                            <!-- <i class="fas fa-sun"></i> -->
                            <div class="ball"></div>
                        </label>
                    </div>
                </div>
            </div>
            <input type="text" id="usernameee" value="<?= $user_info->Username ?>" hidden>
        <?php   } ?>
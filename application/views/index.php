<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!-- ----------------------------------FOR BOOTSTRAP SLIDER ------------------- -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
    <script>
        ! function(e) {
            "undefined" == typeof module ? this.charming = e : module.exports = e
        }(function(e, n) {
            "use strict";
            n = n || {};
            var t = n.tagName || "span",
                o = null != n.classPrefix ? n.classPrefix : "char",
                r = 1,
                a = function(e) {
                    for (var n = e.parentNode, a = e.nodeValue, c = a.length, l = -1; ++l < c;) {
                        var d = document.createElement(t);
                        o && (d.className = o + r, r++), d.appendChild(document.createTextNode(a[l])), n.insertBefore(d, e)
                    }
                    n.removeChild(e)
                };
            return function c(e) {
                for (var n = [].slice.call(e.childNodes), t = n.length, o = -1; ++o < t;) c(n[o]);
                e.nodeType === Node.TEXT_NODE && a(e)
            }(e), e
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>

    <!-- ----------------------------------FOR BOOTSTRAP SLIDER END ------------------- -->


    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            background: #bbb6bf;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        /* Style the success icon (green) */
        .green-icon {
            color: white;
            /* Change the color of the icon itself to white */
            background-color: green;
            /* Change the background color to green */
            border: 2px solid green;
            /* Add a green border */
            border-radius: 50%;
            /* Create a circular border */
            padding: 10px;
            /* Adjust padding as needed */
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        /* Hover effect for the success icon */
        .green-icon:hover {
            transform: scale(1.2);
            /* Scale the icon on hover */
        }

        /* Style the error icon (red) */
        .error-icon {
            color: white;
            /* Change the color of the icon itself to white */
            background-color: red;
            /* Change the background color to red */
            border: 2px solid red;
            /* Add a red border */
            border-radius: 50%;
            /* Create a circular border */
            padding: 10px;
            /* Adjust padding as needed */
            animation: shake 0.3s ease-in-out;
            /* Add shake animation */
        }

        /* Keyframes for shake animation */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-5px);
            }

            40% {
                transform: translateX(5px);
            }

            60% {
                transform: translateX(-5px);
            }

            80% {
                transform: translateX(5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        /* ----------------------------------------------------------------------------- */

        @keyframes lights {
            0% {
                color: hsl(230, 40%, 80%);
                text-shadow:
                    0 0 1em hsla(320, 100%, 50%, 0.2),
                    0 0 0.125em hsla(320, 100%, 60%, 0.3),
                    -1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
                    1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
            }

            30% {
                color: hsl(230, 80%, 90%);
                text-shadow:
                    0 0 1em hsla(320, 100%, 50%, 0.5),
                    0 0 0.125em hsla(320, 100%, 60%, 0.5),
                    -0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
                    0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
            }

            40% {
                color: hsl(230, 100%, 95%);
                text-shadow:
                    0 0 1em hsla(320, 100%, 50%, 0.5),
                    0 0 0.125em hsla(320, 100%, 90%, 0.5),
                    -0.25em -0.125em 0.125em hsla(40, 100%, 60%, 0.2),
                    0.25em 0.125em 0.125em hsla(200, 100%, 60%, 0.4);
            }

            70% {
                color: hsl(230, 80%, 90%);
                text-shadow:
                    0 0 1em hsla(320, 100%, 50%, 0.5),
                    0 0 0.125em hsla(320, 100%, 60%, 0.5),
                    0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
                    -0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
            }

            45% {
                color: hsl(0, 0%, 0%);
                text-shadow:
                    0 0 1em hsla(320, 100%, 50%, 0.2),
                    0 0 0.125em hsla(320, 100%, 60%, 0.3),
                    1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
                    -1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
            }
        }

        @keyframes imageFlip {
            0% {
                transform: perspective(1000px) rotateY(0deg);
            }

            50% {
                transform: perspective(1000px) rotateY(180deg);
            }

            100% {
                transform: perspective(1000px) rotateY(360deg);
            }
        }

        .animate-MER {
            margin: auto;
            font-size: 3.5rem;
            font-weight: 300;
            position: relative;
            animation: lights 5s 750ms linear infinite;
        }

        #mrsut-logo {
            width: 430px;
            height: 360px;
            background: rgba(255, 255, 255, 0);
            border-radius: 50%;
            animation: imageFlip 5s linear infinite;
        }








        /* --------------------------------------------------------------------- */

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 25px;
            border: 1px solid #073f7f;
            background-color: #073f7f;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        /* ---------------------------------------------------------------------------- */
        #dropdownMenuButton {
            color: rgb(0, 0, 0);
            background-color: rgb(237, 237, 237);
            border-color: transparent;
            width: 220px;
            display: flex;
            justify-content: center;
        }

        #dropdownMenuButton:hover,
        .gradient-hover-effect:focus {
            background-color: #073f7f;
            color: #ffff;
        }

        #dropdownMenuButton:active {
            box-shadow: 0 3px #666;
        }

        .dropdown {
            /* position: absolute; */
            /* top: 0; */
            margin: 0;
            padding: 0;
            list-style: none;

        }

        .custom-dropdown-toggle {
            background-image: none;
            /* Remove the default arrow */
            position: relative;
            /* Create a relative positioning context */
            padding-right: 30px;
            /* Add some right padding for the custom icon */
        }

        .custom-dropdown-toggle::after {
            content: "\f0dd";
            /* Add your custom icon here (e.g., Font Awesome) */
            font-family: FontAwesome;
            /* Specify the font family for the custom icon */
            position: absolute;
            top: 35%;
            right: 10px;
            font-size: 30px;
            /* Adjust the right position as needed */
            transform: translateY(-50%);
        }

        .dropdown li {
            position: relative;
            line-height: 10px;
            display: inline-block;
            width: 100%;
        }

        .dropdown li:before {
            content: '';
            position: absolute;
            /* top: 0; */
            left: 0;
            z-index: -1;
            height: 100%;
            width: 3px;
            background-color: #aa0a0a;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }


        .dropdown li:nth-child(5n+1):before {
            background-color: #2b2a2b;
        }

        .dropdown li:nth-child(5n+2):before {
            background-color: #2b2a2b;
        }

        .dropdown li:nth-child(5n+3):before {
            background-color: #2b2a2b;
        }



        .dropdown li:hover:before,
        .dropdown li.open:hover:before {
            width: 100%;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .dropdown li a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 15px 10px 30px;
        }

        .dropdown li a:hover,
        .dropdown li a:active,
        .dropdown li a:focus,
        .dropdown li.open a:hover,
        .dropdown li.open a:active,
        .dropdown li.open a:focus {
            color: #ffffff;
            text-decoration: none;
            /* background-color: transparent; */
        }


        /* .dropdown-header {
            position: relative;
            text-align: center;
            font-size: 1em;
            color: #ddd;
            background: #212531;
            background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
        } */

        .dropdown-menu {
            position: relative;
            /* width: 100%; */
            padding: 0;
            margin: 0;
            border-radius: 0;
            border: none;
            background-color: #073f7f;
            box-shadow: none;
        }


        .fadeInDown {
            animation: fadeInDown 0.5s ease-in-out;
            animation-fill-mode: both;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                margin-top: 5px;
                transform: translateY(20);
            }
        }




        /*Fontawesome icons*/
        .dropdown li a::before {
            font-family: fontawesome;
            content: "\f12e";
            vertical-align: baseline;
            display: inline-block;
            padding-right: 5px;
        }


        a[href*="#admin"]::before {
            content: "\f03e" !important;
        }

        a[href*="#optometrist"]::before {
            content: "\f03d" !important;
        }

        a[href*="#secretary"]::before {
            content: "\f02d" !important;
        }

        /* a[href*="#art"]::before {
            content: "\f1fc" !important;
        }

        a[href*="#awards"]::before {
            content: "\f02e" !important;
        } */

        /* ------------------------------------------------------------------------ */
        form {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            /* padding: 0 50px; */
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            /* width: 100%; */
            max-width: 100%;
            min-height: 100%;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .images-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .images-container {
            transform: translateX(100%);
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
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

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 10;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            /* background: #FF416C; */
            /* background: -webkit-linear-gradient(to right, #2bffff, #05dff3); */
            background: linear-gradient(to right, #084fa0, #00254f, #0a51a2);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }


        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 150;
        }

        footer p {
            margin: 10px 0;
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
        }


        /* -------------------------------------------------------------------------------------------------------- */

        section {
            width: 100%;
            height: 100vh;
        }

        /* 
        .swiper-container {
            left: -55px;
            width: 50vw;
            height: 70vh;
        } */



        .swiper-container {
            /* left: -50px; */
            width: 763px;
            height: 100%;
        }




        .slide {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            /* text-align: center;
            font-size: 18px; */

            background: #ffffff;
            overflow: hidden;
        }

        .slide-image {
            /* position: relative; */
            background-position: cover;
            background-size: auto;
            image-rendering: auto;
        }

        .slide-title {
            font-size: 4rem;
            line-height: 1;
            max-width: 50%;
            white-space: normal;
            word-break: break-word;
            color: #9c0000;
            z-index: 12;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            font-weight: normal;
        }

        @media (min-width: 45em) {
            .slide-title {
                font-size: 7vw;
                max-width: none;
            }
        }

        .slide-title span {
            white-space: pre;
            display: inline-block;
            opacity: 0;
        }

        .slideshow {
            position: relative;
        }

        .slideshow-pagination {
            position: relative;
            bottom: 23%;
            left: 0;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            transition: .3s opacity;
            z-index: 10;
        }

        .slideshow-pagination-item {
            display: flex;
            align-items: center;
        }

        .slideshow-pagination-item .pagination-number {
            opacity: 0.5;
        }

        .slideshow-pagination-item:hover,
        .slideshow-pagination-item:focus {
            cursor: pointer;
        }

        .slideshow-pagination-item:last-of-type .pagination-separator {
            width: 0;
        }

        .slideshow-pagination-item.active .pagination-number {
            opacity: 1;
        }

        .slideshow-pagination-item.active .pagination-separator {
            width: 10vw;
        }

        .slideshow-navigation-button {
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 3rem;
            z-index: 13;
            transition: all .3s ease;
            color: #FFF;
        }

        .slideshow-navigation-button:hover,
        .slideshow-navigation-button:focus {
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
        }

        .slideshow-navigation-button.prev {
            left: 0;
        }

        .slideshow-navigation-button.next {
            right: 0;
        }

        .pagination-number {
            font-size: 20px;
            color: #FFF;
            font-family: 'Oswald', sans-serif;
            padding: 0 0.5rem;
        }

        .pagination-separator {
            display: none;
            position: relative;
            width: 20px;
            height: 2px;
            background: rgb(0, 140, 255);
            transition: all .3s ease;
        }

        @media (min-width: 45em) {
            .pagination-separator {
                display: block;
            }
        }

        .pagination-separator-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            transform-origin: 0 0;
        }

        .password-container {
            position: relative;
        }

        #show-password-icon,
        #hide-password-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #hide-password-icon {
            display: none;
        }



        /* -------------- SIGN-IN CUSTOM ON MOBILE SCREENS ------------- */




        @media (max-width: 767px) {
            #mrsut-logo {
                width: 180px;
                height: 180px;
            }

            .animate-MER {
                margin: auto;
                font-size: 2.0rem;
                font-weight: 300;
                position: relative;
                animation: lights 5s 750ms linear infinite;

            }

        }



        @media (max-width: 500px) {



            .animate-MER {
                display: none;
            }



            form {
                position: relative;
                /* background-color: #073f7f; */
                background: linear-gradient(to right, #023978, #5489c6, #073f7f);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                /* padding: 0 50px; */
                /* left: 0; */
                width: 200%;
                height: 100%;
                text-align: center;
            }

            input {
                background-color: #eee;
                border: none;
                padding: 12px 15px;
                margin: 8px 0;
                width: 90%;
                border-radius: 30px;
            }

            .container {
                background-color: #073f7f;
                /* border-radius: 10px; */
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                    0 10px 10px rgba(0, 0, 0, 0.22);
                position: relative;
                overflow: hidden;
                /* width: 100%; */
                max-width: 100%;
                min-height: 100%;
            }

            .form-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 200%;
                height: 100%;
                transition: all 0.6s ease-in-out;
            }

            .images-container {
                left: 0;
                width: 50%;
                z-index: 2;
                transition: all 0.6s ease-in-out;
            }

            .container.right-panel-active .images-container {
                transform: translateX(100%);
            }

            .sign-in-container {
                left: 0;
                width: 50%;
                opacity: 0;
                z-index: 1;
                transition: all 0.6s ease-in-out;
            }

            .sign-in-container h1,
            span,
            a {
                color: #ffffff;
            }


            .form-container.sign-in-container {
                width: 50%;
                transform: translateX(0) !important;
                /* Add this line to reset the translation */

            }

            .form-container.images-container {
                width: 100%;
                transition: all 0.6s ease-in-out;
            }



            .container.right-panel-active .sign-in-container {
                transform: translateX(100%);
                opacity: 1;
                z-index: 5;
                animation: show 0.6s;
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

            .overlay-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
                z-index: 2;
            }

            .container.right-panel-active .overlay-container {
                transform: translateX(0);
            }

            .overlay {
                background: none;
                /* Remove background color */
                position: relative;
                left: -100%;
                height: 100%;
                /* width: 200%; */
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }


            /* Set the background image for the overlay */
            .overlay .slideshow {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0.1;
                /* Adjust the opacity value as needed */
            }

            .slide {
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                /* text-align: center;
        font-size: 18px; */
                background-color: #871f87;
                /* Background color with opacity */
                overflow: hidden;
                opacity: 0.2;
            }

            /* Set the background image for the overlay end */



            .container.right-panel-active .overlay {
                transform: translateX(100%);
            }

            .overlay-panel {
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 40px;
                text-align: center;
                top: 0;
                height: 100%;
                width: 50%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
            }

            .overlay-left {
                transform: translateX(-20%);
            }

            .container.right-panel-active .overlay-left {
                transform: translateX(40%);
            }

            .overlay-right {
                right: 0;
                transform: translateX(0);
                text-shadow: 4px 4px 40px #00214f;
            }

            .overlay-right p {
                font-size: 18px;
                text-shadow: 14px 14px 60px #00214f;
            }

            .overlay-right button {
                box-shadow: 0.5px 4px 10px #ffffff;

            }

            .signIn-2 {
                box-shadow: 0.5px 4px 10px #ffffff;
            }




            .container.right-panel-active .overlay-right {
                transform: translateX(20%);
            }


            .slideshow-pagination-item {
                display: none;
                align-items: center;
            }



            .animate-MER {
                margin: auto;
                font-size: 3.5rem;
                font-weight: 300;
                position: relative;
                animation: lights 5s 750ms linear infinite;

            }

            #mrsut-logo {
                margin: auto;
                width: 60px;
                height: 60px;
                background: rgba(255, 255, 255, 0);
                /* border-radius: 50%; */
                animation: imageFlip 5s linear infinite;
                transform: translateX(-150%);
            }



            .slideshow-navigation-button {
                display: none;
            }



            footer {
                display: none;
            }



        }

        /* -------------------------------------------------------------------------------------------------------- */
    </style>
</head>

<body>


    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form id="loginForm">
                <h1>Welcome!</h1>
                <div class="container-fluid pl-5 pr-5">
                    <span>Use your email for registration</span>
                    <input type="username" placeholder="Username" name="Username" id="Username" required />
                    <div class="password-container">
                        <input type="password" placeholder="Password" name="Password" id="Password" required />
                        <span id="show-password-icon" class="fas fa-eye"></span>
                        <span id="hide-password-icon" class="fas fa-eye-slash"></span>
                    </div>
                    <div id="recaptcha-container" data-sitekey="6LcQrS0oAAAAANP-Ky43qZ1iFg6uTfpjw9Wc8nw8" class="g-recaptcha"></div>
                </div>

                <!------------------------------------------ MAIN SIGN IN BUTTON ------------------------------------------------>
                <button type="submit" class="signIn-2">Sign In</button>
            </form>
            <!------------------------------------------ MAIN SIGN IN BUTTON END -------------------------------------------->
        </div>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

        <div class="form-container images-container">

            <!-- <h1 class="mrsut">MER Suite</h1> -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

            <section>

                <div class="swiper-container slideshow">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide slide">
                            <div class="slide-image">
                                <img src="<?= base_url('image/slide1.jpg'); ?>" alt="Slide 1">
                            </div>
                            <span class="slide-title"></span>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="slide-image">
                                <img src="<?= base_url('image/slide2.jpg'); ?>" alt="Slide 2">
                            </div>
                            <span class="slide-title"></span>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="slide-image">
                                <img src="<?= base_url('image/slide3.jpg'); ?>" alt="Slide 3">
                            </div>
                            <span class="slide-title"></span>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="slide-image">
                                <img src="<?= base_url('image/slide4.jpg'); ?>" alt="Slide 4">
                            </div>
                            <span class="slide-title"></span>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="slide-image">
                                <img src="<?= base_url('image/slide5.jpg'); ?>" alt="Slide 5">
                                <!-- style="background-image: url(https://images.unsplash.com/photo-1482059470115-0aadd6bf6834?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=267bba9a4e280ec64388fe8fb01e9d1b&auto=format&fit=crop&w=1950&q=80)"> -->
                            </div>
                            <span class="slide-title"></span>
                        </div>

                    </div>

                    <div class="slideshow-pagination"></div>

                    <div class="slideshow-navigation">
                        <div class="slideshow-navigation-button prev"><span class="fas fa-chevron-left"></span>
                        </div>
                        <div class="slideshow-navigation-button next"><span class="fas fa-chevron-right"></span>
                        </div>
                    </div>

                </div>

            </section>

            <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->


        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <!-- <h1>icon ng MER Suite</h1> -->
                    <img id="mrsut-logo" src="<?= base_url('image/Logo1.png'); ?>" alt="MER Suite logo">
                    <!-- <p>To keep connected with us please login with your personal info</p> -->
                    <div class="sidebar-brand">
                        <!-- <img src="Logo.png" alt="My Image" width="40" height="40"> -->
                        <span class="animate-MER">MER Suite</span>
                        <!-- <a class="animate-MER" href="#">MER Suite</a> -->
                        <!-- <div class="line mt-3"></div> -->
                    </div>
                    <button class="ghost" id="RCOC">Rañon Cruz Optical Clinic</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello there!</h1>
                    <p>Enter your MER Suite account and start journey with us</p>
                    <button class="ghost" id="signIn-1">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            @2023 Rañon Cruz Optometrist Contactlens Practitioner | All Rights Reserved
            <a target="_blank" href="https://www.facebook.com/profile.php?id=100054419022457&__cft__[0]=AZWoIHgGqbBltz5T1kA5jyWFMaz-56M9Levy6hCZqBxOrO6HH_lavk6Fh7ce6PwcDWHZmR0LFvTmRt0VHZ7FpoOLrBtLnddjSkOpugH1nZ4ml4e0m5sJYD4mjQr0d1u4XvZIhZORrysNqrDXVm1w6saDtXfZHT7goAP8v2Pwm_Sm675KLSsah9jV3NADlW9l0nw&__tn__=-]K-R">here</a>.
        </p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        const passwordInput = document.getElementById('Password');
        const showPasswordIcon = document.getElementById('show-password-icon');
        const hidePasswordIcon = document.getElementById('hide-password-icon');

        function togglePasswordVisibility() {
            const isPasswordEmpty = passwordInput.value === '';

            if (isPasswordEmpty) {
                showPasswordIcon.style.display = 'none';
                hidePasswordIcon.style.display = 'none';
            } else if (passwordInput.type === 'password') {
                showPasswordIcon.style.display = 'inline-block';
                hidePasswordIcon.style.display = 'none';
            } else {
                showPasswordIcon.style.display = 'none';
                hidePasswordIcon.style.display = 'inline-block';
            }
        }

        passwordInput.addEventListener('input', togglePasswordVisibility);

        showPasswordIcon.addEventListener('click', () => {
            passwordInput.type = 'text';
            togglePasswordVisibility();
        });

        hidePasswordIcon.addEventListener('click', () => {
            passwordInput.type = 'password';
            togglePasswordVisibility();
        });

        // Initial setup
        togglePasswordVisibility();
        $(document).ready(function() {
            const loginAttempts = <?php echo $login_attempts; ?>; // Assuming you have $login_attempts set in PHP

            // Function to show or hide reCAPTCHA
            function toggleRecaptcha(show) {
                if (show) {
                    $('#recaptcha-container').show();
                } else {
                    $('#recaptcha-container').hide();
                }
            }

            // Initial state of reCAPTCHA based on login attempts
            toggleRecaptcha(loginAttempts >= 5);

            $('#loginForm').submit(function(e) {
                e.preventDefault();

                const userName = $.trim($("#Username").val());
                const passWord = $.trim($("#Password").val());
                const recaptchaResponse = grecaptcha.getResponse(); // Get reCAPTCHA response

                if (userName === "" || passWord === "") {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please input appropriate Name or Username.',
                        iconHtml: '<i class="fas fa-exclamation-circle error-icon"></i>',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                if (loginAttempts >= 5 && recaptchaResponse === "") {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please complete the reCAPTCHA.',
                        iconHtml: '<i class="fas fa-exclamation-circle error-icon"></i>',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('login/index') ?>',
                    data: {
                        Username: userName,
                        Password: passWord,
                        'g-recaptcha-response': recaptchaResponse
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                title: 'Success',
                                text: 'Login successful!',
                                iconHtml: '<i class="fas fa-check-circle green-icon"></i>',
                                showConfirmButton: true,
                            }).then(function() {
                                location.reload();
                            });
                        } else if (response.status == 'Lockerror') {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                iconHtml: '<i class="fas fa-exclamation-circle error-icon"></i>',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                $('#recaptcha-container').show();
                            });

                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                iconHtml: '<i class="fas fa-exclamation-circle error-icon"></i>',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            });
        });
        const signIn1Button = document.getElementById('signIn-1');
        const RCOCButton = document.getElementById('RCOC');
        const container = document.getElementById('container');

        signIn1Button.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        RCOCButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });


        // JavaScript to handle the click event and update the button text
        // $(document).ready(function () {
        //     $(".dropdown-menu a").click(function () {
        //         var selectedOption = $(this).data('value');
        //         $("#dropdownMenuButton").text(selectedOption);
        //     });
        // });


        $(document).ready(function() {
            $(".dropdown-menu a").click(function() {
                var selectedOption = $(this).data('value');
                $("#dropdownMenuButton").text(selectedOption);

                // Remove the fadeInLeft class from all list items
                $(".dropdown-menu li").removeClass("fadeInDown");

                // Add the fadeInLeft class to the selected list item
                $(this).parent().addClass("fadeInDown");
            });
        });


        // The Slideshow class.
        class Slideshow {
            constructor(el) {

                this.DOM = {
                    el: el
                };

                this.config = {
                    slideshow: {
                        delay: 3000,
                        pagination: {
                            duration: 3,
                        }
                    }
                };

                // Set the slideshow
                this.init();

            }
            init() {

                var self = this;

                // Charmed title
                this.DOM.slideTitle = this.DOM.el.querySelectorAll('.slide-title');
                this.DOM.slideTitle.forEach((slideTitle) => {
                    charming(slideTitle);
                });

                // Set the slider
                this.slideshow = new Swiper(this.DOM.el, {

                    loop: true,
                    autoplay: {
                        delay: this.config.slideshow.delay,
                        disableOnInteraction: false,
                    },
                    speed: 500,
                    preloadImages: true,
                    updateOnImagesReady: true,

                    // lazy: true,
                    // preloadImages: false,

                    pagination: {
                        el: '.slideshow-pagination',
                        clickable: true,
                        bulletClass: 'slideshow-pagination-item',
                        bulletActiveClass: 'active',
                        clickableClass: 'slideshow-pagination-clickable',
                        modifierClass: 'slideshow-pagination-',
                        renderBullet: function(index, className) {

                            var slideIndex = index,
                                number = (index <= 8) ? '' + (slideIndex + 1) : (slideIndex + 1);

                            var paginationItem = '<span class="slideshow-pagination-item">';
                            paginationItem += '<span class="pagination-number">' + number + '</span>';
                            paginationItem = (index <= 8) ? paginationItem + '<span class="pagination-separator"><span class="pagination-separator-loader"></span></span>' : paginationItem;
                            paginationItem += '</span>';

                            return paginationItem;

                        },
                    },

                    // Navigation arrows
                    navigation: {
                        nextEl: '.slideshow-navigation-button.next',
                        prevEl: '.slideshow-navigation-button.prev',
                    },

                    // And if we need scrollbar
                    scrollbar: {
                        el: '.swiper-scrollbar',
                    },

                    on: {
                        init: function() {
                            self.animate('next');
                        },
                    }

                });

                // Init/Bind events.
                this.initEvents();

            }
            initEvents() {

                this.slideshow.on('paginationUpdate', (swiper, paginationEl) => this.animatePagination(swiper, paginationEl));
                //this.slideshow.on('paginationRender', (swiper, paginationEl) => this.animatePagination());

                this.slideshow.on('slideNextTransitionStart', () => this.animate('next'));

                this.slideshow.on('slidePrevTransitionStart', () => this.animate('prev'));

            }
            animate(direction = 'next') {

                // Get the active slide
                this.DOM.activeSlide = this.DOM.el.querySelector('.swiper-slide-active'),
                    this.DOM.activeSlideImg = this.DOM.activeSlide.querySelector('.slide-image'),
                    this.DOM.activeSlideTitle = this.DOM.activeSlide.querySelector('.slide-title'),
                    this.DOM.activeSlideTitleLetters = this.DOM.activeSlideTitle.querySelectorAll('span');

                // Reverse if prev  
                this.DOM.activeSlideTitleLetters = direction === "next" ? this.DOM.activeSlideTitleLetters : [].slice.call(this.DOM.activeSlideTitleLetters).reverse();

                // Get old slide
                this.DOM.oldSlide = direction === "next" ? this.DOM.el.querySelector('.swiper-slide-prev') : this.DOM.el.querySelector('.swiper-slide-next');
                if (this.DOM.oldSlide) {
                    // Get parts
                    this.DOM.oldSlideTitle = this.DOM.oldSlide.querySelector('.slide-title'),
                        this.DOM.oldSlideTitleLetters = this.DOM.oldSlideTitle.querySelectorAll('span');
                    // Animate
                    this.DOM.oldSlideTitleLetters.forEach((letter, pos) => {
                        TweenMax.to(letter, .3, {
                            ease: Quart.easeIn,
                            delay: (this.DOM.oldSlideTitleLetters.length - pos - 1) * .04,
                            y: '50%',
                            opacity: 0
                        });
                    });
                }

                // Animate title
                this.DOM.activeSlideTitleLetters.forEach((letter, pos) => {
                    TweenMax.to(letter, .6, {
                        ease: Back.easeOut,
                        delay: pos * .05,
                        startAt: {
                            y: '50%',
                            opacity: 0
                        },
                        y: '0%',
                        opacity: 1
                    });
                });

                // Animate background
                TweenMax.to(this.DOM.activeSlideImg, 1.5, {
                    ease: Expo.easeOut,
                    startAt: {
                        x: direction === 'next' ? 200 : -200
                    },
                    x: 0,
                });

                //this.animatePagination()

            }
            animatePagination(swiper, paginationEl) {

                // Animate pagination
                this.DOM.paginationItemsLoader = paginationEl.querySelectorAll('.pagination-separator-loader');
                this.DOM.activePaginationItem = paginationEl.querySelector('.slideshow-pagination-item.active');
                this.DOM.activePaginationItemLoader = this.DOM.activePaginationItem.querySelector('.pagination-separator-loader');

                console.log(swiper.pagination);
                // console.log(swiper.activeIndex);

                // Reset and animate
                TweenMax.set(this.DOM.paginationItemsLoader, {
                    scaleX: 0
                });
                TweenMax.to(this.DOM.activePaginationItemLoader, this.config.slideshow.pagination.duration, {
                    startAt: {
                        scaleX: 0
                    },
                    scaleX: 1,
                });


            }

        }

        const slideshow = new Slideshow(document.querySelector('.slideshow'));
    </script>
</body>

</html>
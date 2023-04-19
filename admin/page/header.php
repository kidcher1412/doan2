<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="./assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="./assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
    <!--     Font.s and icons     -->
    <link href="./assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/css/css.css" rel="stylesheet" />
    <link href="./assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <style>
        #id1 {
            width: 100%;
            overflow: auto;
            max-height: 445px;
        }

        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }

        .field-validation-error {
            color: red
        }

        .validation-summary-errors {
            color: red
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class='main-panel'>
            <nav class='navbar navbar-default navbar-fixed'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <button type='button' class='navbartoggle'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                        </button>
                        <a class='navbar-brand'></a>
                    </div>
                    <div class='collapse navbar-collapse'>
                        <ul class='nav navbar-nav navbar-right'>
                            <li>
                                <a onclick='DangXuat()'>
                                    <p><?php 
                                    echo $AdminData["user"]
                                    ?> | <span>Đăng xuất</span></p>
                                </a>
                            </li>
                            <li class='separator hidden-lg hidden-md'></li>
                        </ul>
                    </div>
                </div>
            </nav>
        <div class="root">
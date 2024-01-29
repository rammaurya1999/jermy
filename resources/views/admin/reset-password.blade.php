<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{ asset('public/admin/img/icons/icon-48x48.png') }}" />


    <link rel="canonical" href="{{ Route('admin.login') }}" />

    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <link href="{{ asset('public/admin/img/icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/light.css') }}" rel="stylesheet">
    <style>
        body {
            /* opacity: 0; */
        }

        .otpBox {
            display: none;
        }
    </style>
    <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-10', {
            'anonymize_ip': true
        });
    </script>
</head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <main class="d-flex w-100 h-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Reset password</h1>
                            <p class="lead">
                                Enter your Username to reset your password.
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form>
                                        <div class="errMsg alert alert-danger" id="err_msg"></div>
                                        <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                        <div class="mb-3 ">
                                            <div class="mb-3 ">
                                                <label class="form-label">Username</label>
                                                <input class="form-control form-control-lg" type="email"
                                                    id="username" placeholder="Enter your Username" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputPasswordNew">New
                                                    password</label>
                                                <input type="password" class="form-control" id="new_pass"
                                                    onkeypress="return value.length <10"
                                                    placeholder="Enter your Password">
                                                <i class="bi bi-eye-slash-fill"
                                                    style="float: right;margin: -27px 15px 0;cursor: pointer;"
                                                    id="togglePassword" onclick="eye()"></i>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputPasswordNew2">Confirm
                                                    password</label>
                                                <input type="password" class="form-control" id="con_pass"
                                                    onkeypress="return value.length <10"
                                                    placeholder="Enter your Confirm Password">
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                <a class='btn btn-lg btn-primary' id="resetBtn"
                                                    href='javascript:void(0);'>Reset
                                                    password</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Already Account! <a href="{{ Route('admin.login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('public/admin/js/jquery-3.7.1.js') }}"></script>
    <script>
        $("#resetBtn").click(function() {
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;
            var username = $("#username").val();
            var new_pass = $("#new_pass").val();
            var con_pass = $("#con_pass").val();
            if (username == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Username");
                $("#username").focus();
            } else if (new_pass == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter New Password");
                $("#new_pass").focus();
            } else if (!passwordRegex.test(new_pass)) {
                $("#err_msg").show().addClass('errMsg').html(
                    "*Password must be 10 digit and \n A combination of uppercase & lowercase letters, numbers, and symbols."
                );
                $("#new_pass").focus();
            } else if (con_pass == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Confirm Password");
                $("#con_pass").focus();
            } else if (con_pass != new_pass) {
                $("#err_msg").show().addClass('errMsg').html("*Confirm Password Not Matched");
                $("#con_pass").focus();
            } else {
                $.ajax({
                    url: "{{ url('admin/reset_pass') }}",
                    type: "post",
                    data: {
                        username: username,
                        con_pass: con_pass,
                        _token: "{{ @csrf_token() }}"
                    },
                    success: function(data) {
                        if ($.trim(data) == "userNotMatch") {
                            $("#err_msg").show().addClass('errMsg').html("*Username Not Matched");
                            $("#username").focus();
                        } else if ($.trim(data) == "con_pass_match") {
                            $("#err_msg").show().addClass('errMsg').html(
                                "*You have Already Used This Password");
                            $("#new_pass").focus();
                        } else if ($.trim(data) == "save") {
                            $("#err_msg").hide();
                            $("#suc_msg").show().addClass('sucMsg').html(
                                "*Password Changed Successfully");
                            setTimeout(() => {
                                window.location = "{{ Route('admin.login') }}";
                            }, 3000);
                        }
                    }
                });
            }
        });
        $("#changeBtn").click(function() {
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;
            var new_pass = $("#new_pass").val();
            var con_pass = $("#con_pass").val();
            if (new_pass == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter New Password");
                $("#new_pass").focus();
            } else if (!passwordRegex.test(new_pass)) {
                $("#err_msg").show().addClass('errMsg').html(
                    "*Password must be 10 digit and \n A combination of uppercase & lowercase letters, numbers, and symbols."
                );
                $("#new_pass").focus();
            } else if (con_pass == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Confirm Password");
                $("#con_pass").focus();
            } else if (con_pass != new_pass) {
                $("#err_msg").show().addClass('errMsg').html("*Enter Confirm Password Not Matched");
                $("#con_pass").focus();
            } else {
                $.ajax({
                    url: "{{ url('admin/reset_pass') }}",
                    type: "post",
                    data: {
                        con_pass: con_pass,
                        _token: "{{ @csrf_token() }}"
                    },
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "con_pass_match") {
                            $("#err_msg").show().addClass('errMsg').html(
                                "*You have Already Used This Password");
                            $("#username").focus();
                        } else if ($.trim(data) == "save") {
                            $("#suc_msg").show().addClass('sucMsg').html(
                                "*Password Changed Successfully");
                            setTimeout(() => {
                                window.location = "{{ Route('admin.login') }}";
                            }, 3000);
                        }
                    }
                });
            }
        });

        function eye() {
            if ($("#new_pass").attr('type') === "password") {
                $("#new_pass").attr('type', 'text');
                $("#togglePassword").removeClass('bi-eye-slash-fill').addClass('bi-eye-fill')
            } else {
                $("#new_pass").attr('type', 'password');
                $("#togglePassword").removeClass('bi-eye-fill').addClass('bi-eye-slash-fill')
            }
        }
        document.addEventListener("DOMContentLoaded", function(event) {
            setTimeout(function() {
                if (localStorage.getItem('popState') !== 'shown') {
                    window.notyf.open({
                        type: "success",
                        message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                        duration: 10000,
                        ripple: true,
                        dismissible: false,
                        position: {
                            x: "left",
                            y: "bottom"
                        }
                    });

                    localStorage.setItem('popState', 'shown');
                }
            }, 15000);
        });
    </script>
</body>


</html>

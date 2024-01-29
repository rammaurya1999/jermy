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
    <link rel="shortcut icon" href="{{ asset('public/provider/img/icons/icon-48x48.png') }}" />


    <link rel="canonical" href="{{ Route('provider.login') }}" />

    <title>Sign In - Service Provider</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link href="{{ asset('public/provider/img/icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/provider/css/light.css') }}" rel="stylesheet">
    <script src="{{ asset('public/provider/js/jquery.js') }}"></script>
    <style>
        body {
            /* opacity: 0; */
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
                            <h1 class="h2">Welcome back!</h1>
                            <h1 class="h3">Service Provider</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form>
                                        <div class="errMsg alert alert-danger" id="err_msg"></div>
                                        <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" type="text"
                                                name="username"id="username" placeholder="Enter your Username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password"
                                                name="password"id="password"
                                                placeholder="Enter your password"onkeypress="return value.length <10" />
                                            <i class="bi bi-eye-slash-fill"
                                                style="float: right;margin: -27px 15px 0;cursor: pointer;"
                                                id="togglePassword" onclick="eye()"></i>
                                            <small>
                                                <a href='{{ Route('provider.reset_password_page') }}'>Forgot
                                                    password?</a>
                                            </small>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class='btn btn-lg btn-primary' id='loginBtn'
                                                href='javascript:void(0);'>Sign in</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Don't have an account? <a href='#'>Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $("#loginBtn").click(function() {
            var username = $("#username").val();
            var password = $("#password").val();
            if (username == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Username");
                $("#username").focus();
            } else if (password == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Password");
                $("#password").focus();
            } else {
                $("#err_msg").hide()
                $.ajax({
                    url: "{{ Route('provider.login') }}",
                    type: "post",
                    data: {
                        username: username,
                        password: password,
                        _token: "{{ @csrf_token() }}"
                    },
                    success: function(data) {
                        if ($.trim(data) == "userNotMatch") {
                            $("#err_msg").show().addClass('errMsg').html("*Username Not Matched");
                            $("#username").focus();
                        } else if ($.trim(data) == "passwrong") {
                            $("#err_msg").show().addClass('errMsg').html("*Password Not Matched");
                            $("#password").focus();
                        } else if ($.trim(data) == "login") {
                            $("#suc_msg").show().addClass('sucMsg').html("*Login Successfully");
                            setTimeout(() => {
                                window.location = "{{ Route('provider.dashboard') }}";
                            }, 3000);
                        }
                    }
                });
            }
        });

        function eye() {
            if ($("#password").attr('type') === "password") {
                $("#password").attr('type', 'text');
                $("#togglePassword").removeClass('bi-eye-slash-fill').addClass('bi-eye-fill')
            } else {
                $("#password").attr('type', 'password');
                $("#togglePassword").removeClass('bi-eye-fill').addClass('bi-eye-slash-fill')
            }
        } 
    </script>
</body>


</html>

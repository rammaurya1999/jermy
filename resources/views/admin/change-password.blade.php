@include('admin.includes.header')

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Change password</h1>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="" id="password" role="">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <form>
                                <div class="errMsg alert alert-danger" id="err_msg"></div>
                                <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordCurrent">Current password</label>
                                    <input type="hidden" class="form-control" id="id"
                                        value="{{ Session::get('admin_id') }}">
                                    <input type="password" class="form-control" id="old_pass">
                                    <small><a href="{{ Route('admin.reset-password-page') }}">Forgot your
                                            password?</a></small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew">New password</label>
                                    <input type="password" class="form-control" id="new_pass"
                                        onkeypress="return value.length <10">
                                    <i class="bi bi-eye-slash-fill"
                                        style="float: right;margin: -27px 15px 0;cursor: pointer;" id="togglePassword"
                                        onclick="eye()"></i>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew2">Confirm password</label>
                                    <input type="password" class="form-control" id="con_pass"
                                        onkeypress="return value.length <10">
                                </div>
                                <button type="button" id="changePassBtn" class="btn btn-primary">Change
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $("#uploadBtn").click(function() {
        $("#img").trigger('click')
    });
    // var regex = {
    //     nameVal: /(^[A-Z\a-z\s])\w+/,
    //     emailRegex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    // };
    $("#changePassBtn").click(function() {
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        var con_pass = $("#con_pass").val();
        if (old_pass == "") {
            $("#err_msg").show().addClass('errMsg').html("*Fill Old Password");
            $("#old_pass").focus();
        } else if (new_pass == "") {
            $("#err_msg").show().addClass('errMsg').html("*Fill New Password");
            $("#new_pass").focus();
        } else if (!passwordRegex.test(new_pass)) {
            $("#err_msg").show().addClass('errMsg').html(
                "*Password must be 10 digit and \n A combination of uppercase & lowercase letters, numbers, and symbols."
            );
            $("#new_pass").focus();
        } else if (con_pass == "") {
            $("#err_msg").show().addClass('errMsg').html("*Fill Confirm Password");
            $("#con_pass").focus();
        } else if (con_pass != new_pass) {
            $("#err_msg").show().addClass('errMsg').html("*Fill Confirm Password Not Matched");
            $("#con_pass").focus();
        } else {
            $("#err_msg").hide();
            $.ajax({
                url: "{{ Route('admin.changePassword') }}",
                type: "post",
                data: {
                    id: $("#id").val(),
                    old_pass: old_pass,
                    con_pass: con_pass,
                    _token: "{{ @csrf_token() }}"
                },
                success: function(data) {
                    if ($.trim(data) == "old_pass_not_match") {
                        $("#err_msg").show().addClass('errMsg').html(
                            "*You Enter Wrong Password").focus();
                    } else if ($.trim(data) == "con_pass_match") {
                        $("#err_msg").show().addClass('errMsg').html(
                            "*You Already Used This Password").focus();
                    } else {
                        $("#suc_msg").show().addClass('sucMsg').html(
                            "*Your Password has been Changed").focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.profile') }}"
                        }, 3000);
                    }
                    console.log(data)
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
</script>
@include('admin.includes.footer')

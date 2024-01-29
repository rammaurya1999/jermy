@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Add Staff</h1>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Add Staff</h5>
                            </div>
                            <div class="card-body">
                                <form id="profileForm" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-5">
                                            <div class="text-center">
                                                @if (isset($singleData))
                                                    <img alt="Charles Hall"
                                                        src="{{ asset('public/upload/admin/' . $singleData->img) }}"
                                                        class="rounded-circle img-responsive mt-2" id="image-holder"
                                                        width="128" height="128" />
                                                    <input type="hidden" name="id" value="{{ $singleData->id }}">
                                                    <input type="hidden" name="old_img" value="{{ $singleData->img }}">
                                                @else
                                                    <img alt="Charles Halsl"
                                                        src="{{ asset('public/admin/img/avatars/profile.svg') }}"
                                                        class="rounded-circle img-responsive mt-2" id="image-holder"
                                                        width="128" height="128" />
                                                @endif
                                                <input type="hidden" name="usertype" value="2">
                                                <div class="mt-2">
                                                    <input type="file" name="img" class="d-none" id="img"
                                                        onchange="readURL(this);">
                                                    <span class="btn btn-primary" id="uploadBtn"><i
                                                            class="fas fa-upload"></i>
                                                        Upload</span>
                                                </div>
                                                {{-- <small>For best results, use an image at least 128px by 128px in .jpg
                                                    format</small> --}}
                                            </div>
                                        </div>
                                        <div class="errMsg alert alert-danger" id="err_msg"></div>
                                        <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputFirstName">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Name" name="name" value="<?php if (isset($singleData)) {
                                                        echo $singleData->name;
                                                    } ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Username" name="username" value="<?php if (isset($singleData)) {
                                                        echo $singleData->username;
                                                    } ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputFirstName">Email</label>
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Email" name="email" value="">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Phone</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Phone" name="phone" value=""
                                                    onkeypress="return value.length<10">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputFirstName">Password</label>
                                                <input type="password" class="form-control" id="pass"
                                                    placeholder="Password" name="pass" value=""
                                                    onkeypress="return value.length<10">
                                                <i class="bi bi-eye-slash-fill"
                                                    style="float: right;margin: -27px 15px 0;cursor: pointer;"
                                                    id="togglePassword" onclick="eye()"></i>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Confirm Password</label>
                                                <input type="text" class="form-control" id="con_pass"
                                                    placeholder="Confirm Password" name="con_pass" value=""
                                                    onkeypress="return value.length<10">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="1234 Main St" name="address" value="">
                                        </div>
                                    </div>
                                    <button type="button" id="submitBtn" class="btn btn-primary">Submit
                                    </button>
                                </form>
                            </div>
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
    var regex = {
        nameVal: /(^[A-Z\a-z\s])\w+/,
        emailRegex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        passwordRegex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/
    };
    $("#submitBtn").click(function() {
        var name = $("#name").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var pass = $("#pass").val();
        var con_pass = $("#con_pass").val();
        var address = $("#address").val();
        var img = $("#img").val();
        if (name == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Name");
            $("#name").focus();
        } else if (username == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Username");
            $("#username").focus();
        } else if ($("#email").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Email");
            $("#email").focus();
        } else if (!regex.emailRegex.test(email)) {
            $("#err_msg").show().addClass('errMsg').html("*Enter Valid Email");
            $("#email").focus();
        } else if (phone == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Phone Number");
            $("#phone").focus();
        } else if (phone.length != 10) {
            $("#err_msg").show().addClass('errMsg').html("*Enter Valid Phone Number");
            $("#phone").focus();
        } else if (pass == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Password");
            $("#pass").focus();
        } else if (!regex.passwordRegex.test(pass)) {
            $("#err_msg").show().addClass('errMsg').html(
                "*Password must be 10 digit and \n A combination of uppercase & lowercase letters, numbers, and symbols."
            );
            $("#pass").focus();
        } else if (con_pass == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Confirm Password");
            $("#con_pass").focus();
        } else if (con_pass != pass) {
            $("#err_msg").show().addClass('errMsg').html("*Confirm Password Not Matched");
            $("#con_pass").focus();
        } else if (address == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Your Address");
            $("#address").focus();
        } else if (img == "") {
            $("#err_msg").show().addClass('errMsg').html("*Upload Profile Image");
            $("#address").focus();
        } else {
            $("#err_msg").hide();
            $.ajax({
                url: "{{ Route('admin.update_profile') }}",
                type: "post",
                data: new FormData($("#profileForm")[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data)
                    if ($.trim(data) == "update") {
                        $("#suc_msg").show().addClass('sucMsg').html(
                            "Your Profile Has Been Updated");
                        setTimeout(() => {
                            window.location = "{{ Route('admin.manage-staff') }}"
                        }, 3000);
                    }
                    if ($.trim(data) == "save") {
                        $("#suc_msg").show().addClass('sucMsg').html(
                            "Successfully Add Staff");
                        setTimeout(() => {
                            window.location = "{{ Route('admin.manage-staff') }}"
                        }, 3000);
                    }
                    if ($.trim(data) == "UsernameErr") {
                        $("#err_msg").show().addClass('errMsg').html(
                            "Username Already Used");
                    }
                    if ($.trim(data) == "emailErr") {
                        $("#err_msg").show().addClass('errMsg').html(
                            "Email Already Used");
                    }
                }
            });
        }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-holder').prop('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function eye() {
        if ($("#pass").attr('type') === "password") {
            $("#pass").attr('type', 'text');
            $("#togglePassword").removeClass('bi-eye-slash-fill').addClass('bi-eye-fill')
        } else {
            $("#pass").attr('type', 'password');
            $("#togglePassword").removeClass('bi-eye-fill').addClass('bi-eye-slash-fill')
        }
    }
</script>
@include('admin.includes.footer')

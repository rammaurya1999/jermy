@include('admin.includes.header')

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Profile</h1>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profile</h5>
                            </div>
                            <div class="card-body">
                                <form id="profileForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-5">
                                            <div class="text-center">
                                                @if ($profileData->img == null)
                                                    <img src="{{ asset('public/admin/img/avatars/profile.svg') }}"
                                                        class="rounded-circle img-responsive mt-2" id="image-holder"
                                                        width="128" height="128" />
                                                @else
                                                    <img alt="Charles Hall"
                                                        src="{{ asset('public/upload/admin/' . $profileData->img) }}"
                                                        class="rounded-circle img-responsive mt-2" id="image-holder"
                                                        width="128" height="128" />
                                                @endif
                                                <input type="hidden" name="id" value="{{ $profileData->id }}">
                                                <input type="hidden" name="old_img" value="{{ $profileData->img }}">
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
                                                    placeholder="Name" name="name" value="{{ $profileData->name }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Username" name="username"
                                                    value="{{ $profileData->username }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputFirstName">Email</label>
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Email" name="email"
                                                    value="{{ $profileData->email }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Phone</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Phone" name="phone" value="{{ $profileData->phone }}"
                                                    onkeypress="return value.length<10">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="1234 Main St" name="address"
                                                value="{{ $profileData->address }}">
                                        </div>
                                    </div>
                                    <button type="button" id="updateProfile" class="btn btn-primary">Update
                                        Profile</button>
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
    $("#updateProfile").click(function() {
        if ($("#name").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Name");
            $("#name").focus();
        } else if ($("#username").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Username");
            $("#username").focus();
        } else if ($("#email").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Email");
            $("#email").focus();
        } else if ($("#phone").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Phone Number");
            $("#phone").focus();
        } else if ($("#phone").val().length != 10) {
            $("#err_msg").show().addClass('errMsg').html("*Enter Valid Phone Number");
            $("#phone").focus();
        } else if ($("#address").val() == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Your Address");
            $("#address").focus();
        } else {
            $("#err_msg").hide();
            $.ajax({
                url: "{{ url('admin/update_profile') }}",
                type: "post",
                data: new FormData($("#profileForm")[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    if ($.trim(data) == "update") {
                        $("#suc_msg").show().addClass('sucMsg').html(
                            "Your Profile Has Been Updated");
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
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
</script>
@include('admin.includes.footer')

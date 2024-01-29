@include('provider_panel.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        @if (isset($singleData) && count($singleData) > 0)
            <h1 class="h3 mb-4">Update Services</h1>
        @else
            <h1 class="h3 mb-4">Add Services</h1>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form id="serviceForm" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="provider_id"
                                            value="{{ Session::get('provider_id') }}">
                                        @foreach ($lang as $key => $lang)
                                            <div class="mb-3 col-md-12">
                                                <div class="errMsg alert alert-danger" id="err_msg"></div>
                                                <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                                <input type="hidden" name="id[]" value="<?php if (isset($singleData) && count($singleData) > 0) {
                                                    echo $singleData[$key]['id'];
                                                } ?>">
                                                <input type="hidden" name="locale[]" value="{{ $lang->id }}">
                                                <label class="form-label">Service Title
                                                    - {{ $lang->lang }}</label>
                                                <input type="text" class="form-control service_title"
                                                    id="service_title" placeholder="Enter Service Title"
                                                    name="service_title[]" value="<?php if (isset($singleData) && count($singleData) > 0) {
                                                        echo $singleData[$key]['title'];
                                                    } ?>">
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Service Category
                                                    - {{ $lang->lang }}</label>
                                                <select class="form-select service_cat"
                                                    name="service_cat[]"id="service_cat"
                                                    aria-label="Default select example">
                                                    <option selected disabled>Select Service Category</option>
                                                    @foreach ($serviceCat as $item)
                                                        @if ($item->lang_id == $lang->id)
                                                            @if (isset($singleData) && count($singleData) > 0 && $singleData[$key]['service_cat'] == $item->id)
                                                                <option selected value="{{ $item->id }}">
                                                                    {{ $item->category }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->category }}
                                                                </option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    {{-- @if ($lang->id == 1)
                                                        <option value="0">Other</option>
                                                    @else
                                                        <option value="-1">Autre</option>
                                                    @endif --}}
                                                </select>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Address
                                                    - {{ $lang->lang }}</label>
                                                <textarea type="text" class="form-control address" id="address" placeholder="Enter Address"name="address[]"><?php if (isset($singleData) && count($singleData) > 0) {
                                                    echo $singleData[$key]['address'];
                                                } ?></textarea>
                                            </div>
                                        @endforeach
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Phone No.</label>
                                            <input type="text" class="form-control phone" id="phone"
                                                placeholder="Enter Phone Number " name="phone"
                                                value="<?php if (isset($singleData) && count($singleData) > 0) {
                                                    echo $singleData[$key]['phone'];
                                                } ?>" onkeypress="return value.length <10">
                                        </div>
                                        <div class="imgMoreBox">
                                            <div class="row" id="add_img_box">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Service Image</label>
                                                    <input type="file" class="form-control" id="img"
                                                        name="img[]" multiple>
                                                </div>
                                            </div>
                                            @if ($serviceImg->count())
                                                @foreach ($serviceImg as $item)
                                                    <input type="hidden" name="old_img[]"value="{{ $item->img }}">
                                                    <img src="{{ asset('public/upload/service/' . $singleData[$key]['title'] . '/' . $item->img) }}"
                                                        class="img-fluid w-25 h-50 float-start ms-2 mb-2"
                                                        alt=""></img>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" id="serviceBtn" class="btn btn-primary">
                                        @if (isset($singleData) && count($singleData) > 0)
                                            Update Service
                                        @else
                                            Add Services
                                        @endif
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
    $("#serviceBtn").click(function() {
        var service_title = $("#service_title").val();
        var service_cat = $("#service_cat").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var img = $("#img").val();
        var formIsValid = true;

        $(".address").each(function(i) {
            if ($(this).val() === "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Address");
                $(".address")[i].focus();
                formIsValid = false;
                return false;
            }
        });
        $(".service_cat").each(function(i) {
            if ($(this).val() == null) {
                $("#err_msg").show().addClass('errMsg').html("*Enter Service Category");
                $(".service_cat")[i].focus();
                formIsValid = false;
                return false;
            }
        });
        $(".service_title").each(function(i) {
            if ($(this).val() === "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Service Title");
                $(".service_title")[i].focus();
                formIsValid = false;
                return false;
            }
        });
        if (formIsValid) {
            if (phone == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Phone Number");
                $("#phone").focus();
            } else if ($("#old_img").val() == "" && img == "") {
                $("#err_msg").show().addClass('errMsg').html("*Enter Service Image");
                $("#img").focus();
            } else {
                $.ajax({
                    url: "{{ Route('provider.save_service') }}",
                    type: "post",
                    data: new FormData($("#serviceForm")[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "save") {
                            $("#errMsg").hide();
                            $("#suc_msg").show().addClass('sucMsg').html(
                                " Successfully Add Service");
                            $(window).scrollTop($("#suc_msg"));
                            setTimeout(() => {
                                window.location = "{{ Route('provider.manageServices') }}";
                            }, 3000);
                        }
                        if ($.trim(data) == "update") {
                            $("#errMsg").hide();
                            $("#suc_msg").show().addClass('sucMsg').html(
                                "Successfully Update Service").focus();
                            $(window).scrollTop($("#suc_msg"));
                            setTimeout(() => {
                                window.location = "{{ Route('provider.manageServices') }}";
                            }, 3000);
                        }
                    }
                });
            }
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-holder').css({
                    "display": "block"
                }).prop('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@include('provider_panel.includes.footer')

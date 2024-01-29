@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-4">Add Services Category</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-6">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-0 mb-2">Add Services Category</h5>
                                <form id="serviceForm" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        @foreach ($lang as $key => $lang)
                                            <div class="mb-3 col-md-12">
                                                <div class="errMsg alert alert-danger" id="err_msg"></div>
                                                <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                                <input type="hidden" name="id[]" value="<?php if (count($singleData) > 0) {
                                                    echo $singleData[$key]['id'];
                                                } ?>">
                                                <input type="hidden" name="locale[]" value="{{ $lang->id }}">
                                                <label class="form-label" for="inputFirstName">Service Category
                                                    - {{ $lang->lang }}</label>
                                                <input type="text" class="form-control service_cat" id="service_cat"
                                                    placeholder="Enter Service Category" name="service_cat[]"
                                                    value="<?php if (count($singleData) > 0) {
                                                        echo $singleData[$key]['category'];
                                                    } ?>">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" id="serviceBtn" class="btn btn-primary">Add
                                        Service</button>
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
        var service_cat = $(".service_cat").val();
        if (service_cat == "") {
            $("#err_msg").show().addClass('errMsg').html("*Enter Service Category");
            $(".service_cat").focus();
        } else {
            $.ajax({
                url: "{{ url('admin/save_service_cat') }}",
                type: "post",
                data: $("#serviceForm").serialize(),
                success: function(data) {
                    // console.log(data)
                    if ($.trim(data) == "save") {
                        $("#errMsg").hide();
                        $("#suc_msg").show().addClass('sucMsg').html(
                                "Service Category Add Successfully")
                            .focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.manage_service_cat') }}";
                        }, 3000);
                    }
                    if ($.trim(data) == "update") {
                        $("#errMsg").hide();
                        $("#suc_msg").show().addClass('sucMsg').html(
                                "Service Category Update Successfully")
                            .focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.manage_service_cat') }}";
                        }, 3000);
                    }
                }
            });
        }
    })
</script>
@include('admin.includes.footer')

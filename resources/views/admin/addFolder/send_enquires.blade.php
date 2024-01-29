@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-4">User's Equires</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-6">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-0 mb-2">User's Equires</h5>
                                <form id="serviceForm" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div class="errMsg alert alert-danger" id="err_msg"></div>
                                            <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                            <input type="hidden" name="id" value="">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="inputFirstName">User's Email
                                            </label>
                                            <input type="text" class="form-control" id="email"
                                                placeholder="Enter Subject" name="email" value="robert123@gmail.com"
                                                readonly>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="inputFirstName">User's Enquires
                                            </label>
                                            <textarea type="text" rows="10" class="form-control" id="msg" placeholder="User's Enquires"name="msg"
                                                readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus recusandae enim iure quod debitis earum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus asperiores inventore animi sunt reprehenderit dolor distinctio accusamus corporis eos libero. Dignissimos quod commodi quisquam necessitatibus!</textarea>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="inputFirstName">Reply
                                            </label>
                                            <textarea type="text" rows="10" class="form-control" id="reply" placeholder="Give Reply" name="reply"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="replyBtn" class="btn btn-primary">
                                        Reply</button>
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
    $("#notifyBtn").click(function() {
        // alert("Hello Admin")
        // var service_cat = $(".service_cat").val();
        // if (service_cat == "") {
        //     $("#err_msg").show().addClass('errMsg').html("*Enter Service Category");
        //     $(".service_cat").focus();
        // } else {
        //     $.ajax({
        //         url: "{{ url('admin/save_service_cat') }}",
        //         type: "post",
        //         data: $("#serviceForm").serialize(),
        //         success: function(data) {
        //             // console.log(data)
        //             if ($.trim(data) == "save") {
        //                 $("#errMsg").hide();
        //                 $("#suc_msg").show().addClass('sucMsg').html(
        //                         "Service Category Add Successfully")
        //                     .focus();
        //                 setTimeout(() => {
        //                     window.location = "{{ Route('admin.manage_service_cat') }}";
        //                 }, 3000);
        //             }
        //             if ($.trim(data) == "update") {
        //                 $("#errMsg").hide();
        //                 $("#suc_msg").show().addClass('sucMsg').html(
        //                         "Service Category Update Successfully")
        //                     .focus();
        //                 setTimeout(() => {
        //                     window.location = "{{ Route('admin.manage_service_cat') }}";
        //                 }, 3000);
        //             }
        //         }
        //     });
        // }
    });
</script>
@include('admin.includes.footer')

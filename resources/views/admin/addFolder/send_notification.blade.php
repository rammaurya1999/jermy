@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-4">Send Notification</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-6">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-0 mb-2">Send Notification</h5>
                                <form id="serviceForm" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div class="errMsg alert alert-danger" id="err_msg"></div>
                                            <div class="sucMsg alert alert-success"id="suc_msg"></div>
                                            <input type="hidden" name="id" value="">
                                            <input type="hidden" name="sender_id"
                                                value="{{ Session::get('admin_id') }}">
                                            <label class="form-label" for="inputFirstName">To Send
                                            </label>
                                            <select class="form-select" name="to_users"id="to_users"
                                                aria-label="Default select example">
                                                <option selected disabled>Select Any One</option>
                                                <option value="0">Send to All</option>
                                                <option value="1">Buyers</option>
                                                <option value="2">Sellers</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="inputFirstName">Subject
                                            </label>
                                            <input type="text" class="form-control" id="subject"
                                                placeholder="Enter Subject" name="subject" value="">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="inputFirstName">Message
                                            </label>
                                            <textarea type="text" rows="10" class="form-control" id="msg" placeholder="Enter Message" name="msg"
                                                value=""></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="notifyBtn" class="btn btn-primary">Send
                                        Notification</button>
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
        var users = $("#to_users").val();
        var subject = $("#subject").val();
        var msg = $("#msg").val();
        if (users == null) {
            $("#err_msg").show().addClass('errMsg').html("*Select Any One You Want To Send Notification");
            $("#to_users").focus();
        } else if (subject == '') {
            $("#err_msg").show().addClass('errMsg').html("*Enter Subject");
            $("#subject").focus();
        } else if (msg == '') {
            $("#err_msg").show().addClass('errMsg').html("*Enter Message");
            $("#msg").focus();
        } else {
            $.ajax({
                url: "{{ route('admin.send-notify') }}",
                type: "post",
                data: $("#serviceForm").serialize(),
                success: function(data) {
                    // console.log(data)
                    if ($.trim(data) == "sendAll") {
                        $("#errMsg").hide();
                        $("#suc_msg").show().addClass('sucMsg').html(
                                "Send Notification To All Buyers & Sellers")
                            .focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.notification-list') }}";
                        }, 3000);
                    }
                    if ($.trim(data) == "sendcustomer") {
                        $("#errMsg").hide();
                        $("#suc_msg").show().addClass('sucMsg').html(
                                "Send Notification To All Buyers")
                            .focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.notification-list') }}";
                        }, 3000);
                    }
                    if ($.trim(data) == "sendprovider") {
                        $("#errMsg").hide();
                        $("#suc_msg").show().addClass('sucMsg').html(
                                "Send Notification To All Sellers")
                            .focus();
                        setTimeout(() => {
                            window.location = "{{ Route('admin.notification-list') }}";
                        }, 3000);
                    }
                }
            });
        }
    });
</script>
@include('admin.includes.footer')

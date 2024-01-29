@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">View Notification</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Notification</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <h4 class="fw-bold text-capitalize">To: <span
                                        class="text-muted">{{ $singleData->user_id }}</span></h4>
                            </div>
                            <div class="col-md-12">
                                <h4 class="fw-bold text-capitalize">Subject: <span class="text-muted">{{$}}</span></h4>
                            </div>
                            <div class="col-md-12">
                                <h4 class="fw-bold text-capitalize">Message: </h4>
                                <p class="text-muted fs-5 text-start lh-l">Lorem Ipsum is simply dummy text of the
                                    printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. It has survived not only five centuries, but also the
                                    leap into electronic typesetting, remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.includes.footer')

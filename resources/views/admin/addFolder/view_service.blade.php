@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Service Details</h1>
        <div class="row">
            <div class=" col-lg-12 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            @if ($providerData->img == '')
                                <img src="{{ asset('public/provider/img/avatars/profile.svg') }}" alt="Avatar"
                                    class="img-fluid mt-2 mb-3 p-2 w-50 rounded-circle" />
                            @else
                                <img src="{{ asset('public/upload/admin/' . $providerData->img) }}" alt="Avatar"
                                    class="img-fluid mt-2 mb-3 p-2 w-50 rounded-circle" />
                            @endif
                            <h3 class="text-capitalize">{{ $providerData->name }}</h3>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Provider Information</h6>
                                <hr class=" mb-4">
                                <div class="row pt-1 mb-0">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $providerData->email }}</p>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{ $providerData->phone }}</p>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <h6>Address</h6>
                                        <p class="text-muted">{{ $providerData->address }}</p>
                                    </div>
                                </div>
                                <h6>Services</h6>
                                <hr class="mt-0 mb-3">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        {{-- <h6>Recent</h6> --}}
                                        @php
                                            $service = App\Models\Service::whereRaw('provider_id=? and lang_id=?', [$providerData->id, 1])->get();
                                        @endphp
                                        @foreach ($service as $service)
                                            <p class="text-dark">
                                                <a href="{{ Route('admin.view-service', 'id=' . base64_encode($service->code)) }}"
                                                    class="text-primary m-0 p-0">{{ $service->title }}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div> --}}
                            </div>
                        </div>
                        <hr class="mt-0 mb-3">
                        <div class="card mb-3">
                            <h4 class="card-subtitle mt-4 ms-2 text-center">Service Details</h4>
                            <div class="card-body">
                                <h5 class="card-title fs-2 text-uppercase text-dark">
                                    {{ $singleData->title }}</h5>
                                <h5 class="card-subtitle fs-4 text-muted fw-bold">{{ $singleData->category }}</h5>
                                <div class="row pt-1 mb-0 mt-4 w-50">
                                    <div class="col-6 mb-3">
                                        <h4>Address</h4>
                                        <p class="text-muted h4">{{ $singleData->address }}</p>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <h4>Phone</h4>
                                        <p class="text-muted h4">{{ $singleData->phone }}</p>
                                    </div>
                                </div>
                                @php
                                    $serviceImg = App\Models\ServiceImg::whereRaw('service_id=?', $singleData->code)->get();
                                @endphp

                                <hr class="mt-0 mb-3">
                                <h6 class="card-title mt-4">Images</h6>
                                @foreach ($serviceImg as $serviceImg)
                                    <img src="{{ asset('public/upload/service/' . $singleData->title . '/' . $serviceImg->img) }}"
                                        class="img-fluid float-start m-2 view-service-img" alt="...">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.includes.footer')

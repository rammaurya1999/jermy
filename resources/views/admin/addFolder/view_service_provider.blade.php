@include('admin.includes.header')
<main class="content">
    <section class="h-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <h4 class="card-subtitle mt-4 ms-2 text-center">Service Provider Details</h4>
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                @if ($singleData->img == '')
                                    <img src="{{ asset('public/provider/img/avatars/profile.svg') }}" alt="Avatar"
                                        class="img-fluid mt-2 mb-3 p-2 w-50 rounded-circle" />
                                @else
                                    <img src="{{ asset('public/upload/admin/' . $singleData->img) }}" alt="Avatar"
                                        class="img-fluid mt-2 mb-3 p-2 w-50 rounded-circle" />
                                @endif
                                <h3 class="text-capitalize">{{ $singleData->name }}</h3>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Personal Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h5>Email</h5>
                                            <p class="text-muted h4">{{ $singleData->email }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h5>Phone</h5>
                                            <p class="text-muted h4">{{ $singleData->phone }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h5>Address</h5>
                                            <p class="text-muted h4">{{ $singleData->address }}</p>
                                        </div>
                                    </div>
                                    <h6>Services</h6>
                                    <hr class="mt-0 mb-1">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            {{-- <h6>Recent</h6> --}}
                                            @if (count($service) > 0)
                                                @foreach ($service as $item)
                                                    <p class="text-dark"><a
                                                            href="{{ Route('admin.view-service', 'id=' . base64_encode($item->code)) }}"
                                                            class="btn text-primary m-0 p-0">{{ $item->title }}</a></p>
                                                @endforeach
                                            @else
                                                <p class="text-muted">no service available</p>
                                            @endif
                                        </div>
                                        {{-- <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('admin.includes.footer')

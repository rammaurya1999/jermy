@include('provider_panel.includes.header')
<main class="content">
    <div class="container-fluid p-0 ">
        <div class="row justify-content-between mb-3">
            <div class="col-md-6 text-start">
                <h3 class="">Manage Service</h3>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ Route('provider.addServices') }}" class="btn btn-primary text-light">Add Service
                </a>
            </div>
        </div>
        <div class="row ">

            <div class="col-md-12 col-xl-12  bg-white border border-2 p-2">
                @if ($service->count())
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($service as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="row justify-content-start align-items-baseline">
                                            <div class="col-md-4">
                                                @php
                                                    $serviceImg = App\Models\ServiceImg::whereRaw('service_id=?', $item->code)->first();
                                                @endphp
                                                @if ($serviceImg == null)
                                                    <img src="{{ asset('public/admin/img/avatars/profile.svg') }}"
                                                        class="avatar img-fluid rounded-circle text-start nav-icon"
                                                        alt="profile" />
                                                @else
                                                    <img src="{{ asset('public/upload/service/' . $item->title . '/' . $serviceImg->img) }}"
                                                        class="avatar img-fluid rounded-circle text-start"
                                                        alt="profile" />
                                                @endif

                                            </div>
                                            <div class="col-md-8 text-start">{{ $item->title }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td class="tt">
                                        @if ($item->status == 1)
                                            <button class="btn btn-primary t"
                                                onclick="statusChange('{{ base64_encode('Service') }}','{{ base64_encode($item->code) }}')">Active</button>
                                        @else
                                            <button class="btn btn-danger t"
                                                onclick="statusChange('{{ base64_encode('Service') }}','{{ base64_encode($item->code) }}')">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Route('provider.addServices', 'id=' . base64_encode($item->code)) }}"
                                            class="text-primary text-center"><i data-feather="edit"></i></a>
                                        || <a
                                            href="{{ Route('provider.delete', 'code_id=' . base64_encode($item->code) . '&modelName=' . base64_encode('Service')) }}"
                                            class="text-danger text-center"
                                            onclick="return confirm('{{ 'Are You Sure To Delete Data : ' . $item->title }}')"><i
                                                data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger text-center fw-bold p-3 d-block text-danger"> No Services
                        Found</div>
                @endif
            </div>
        </div>
    </div>
</main>
<script>
    function statusChange(model, id) {
        $.ajax({
            url: "{{ route('provider.statusChange') }}",
            type: "post",
            data: {
                code: id,
                model: model,
                _token: "{{ @csrf_token() }}"
            },
            success: function(data) {
                location.reload();
                // $('.tt').load(location + (' .tt'));
            }
        });
    }
</script>
@include('provider_panel.includes.footer')

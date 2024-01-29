@include('provider_panel.includes.header')
<main class="content">
    <div class="container-fluid p-0 ">
        <div class="row justify-content-between mb-3">
            <div class="col-md-6 text-start">
                <h3 class="">Manage Staff</h3>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ Route('admin.add-staff') }}" class="btn btn-primary text-light">Add Staff
                </a>
            </div>
        </div>
        <div class="row ">

            <div class="col-md-12 col-xl-12  bg-white border border-2 p-2">
                @if ($staffData->count())
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($staffData as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if (Session::get('admin_img') == null)
                                            <img src="{{ asset('public/admin/img/avatars/profile.svg') }}"
                                                class="avatar img-fluid rounded-circle text-start nav-icon"
                                                alt="profile" />
                                        @else
                                            <img src="{{ asset('public/upload/admin/' . $item->img) }}"
                                                class="avatar img-fluid rounded-circle text-start" alt="profile" />
                                        @endif

                                        {{ $item->name }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td class="tt">
                                        @if ($item->status == 1)
                                            <button class="btn btn-primary t"
                                                onclick="statusChange('{{ base64_encode('Admin') }}','{{ base64_encode($item->id) }}')">Active</button>
                                        @else
                                            <button class="btn btn-danger t"
                                                onclick="statusChange('{{ base64_encode('Admin') }}','{{ base64_encode($item->id) }}')">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Route('admin.add-staff', 'id=' . base64_encode($item->id)) }}"
                                            class="text-primary text-center"><i data-feather="eye"></i></a>
                                        || <a
                                            href="{{ Route('admin.delete', 'id=' . base64_encode($item->id) . '&modelName=' . base64_encode('Admin')) }}"
                                            class="text-danger text-center"><i data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger text-center fw-bold p-3 d-block text-danger"> No Service
                        Provider Found</div>
                @endif
            </div>
        </div>
    </div>
</main>
<script>
    function statusChange(model, id) {
        $.ajax({
            url: "{{ url('statusChange') }}",
            type: "post",
            data: {
                id: id,
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

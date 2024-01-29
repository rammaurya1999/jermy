@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0 ">
        <div class="row justify-content-between mb-3">
            <div class="col-md-6 text-start">
                <h3 class="">Manage Notifications</h3>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ Route('admin.send-notification') }}" class="btn btn-primary text-light">Send Notification
                </a>
            </div>
        </div>
        <div class="row ">

            <div class="col-md-12 col-xl-12  bg-white border border-2 p-2">
                {{-- @if ($staffData->count()) --}}
                <table id="table" class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Subject</th>
                            {{-- <th scope="col">Email</th> --}}
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($notifyData as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->admin_name }}</td>
                                @php
                                    if ($item->usertype == 1) {
                                        $c = App\Models\Customer::whereRaw('id=?', $item->user_id)->get();
                                        foreach ($c as $key => $c) {
                                            echo "<td> $c->name </td>";
                                        }
                                    } else {
                                        $c = App\Models\ServiceProvider::whereRaw('id=?', $item->user_id)->get();
                                        foreach ($c as $key => $c) {
                                            echo "<td> $c->name </td>";
                                        }
                                    }
                                @endphp
                                <td>{{ $item->subject }}</td>
                                <td><a href="{{ Route('admin.view-notification', 'id=' . base64_encode($item->id)) }}"
                                        class="text-primary text-center"><i data-feather="eye"></i></a>
                                    || <a href="#" class="text-danger text-center"
                                        onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data : Opening Of Hotels' }}')"><i
                                            data-feather="trash-2"></i></a>
                                    {{-- <a
                                    href="{{ Route('admin.delete', 'id=' . base64_encode(1) . '&modelName=' . base64_encode('ServiceProvider')) }}"
                                    class="text-danger text-center"
                                    onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data : Opening Of Bars' }}')"><i
                                        data-feather="trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @else
                <div class="alert alert-danger text-center fw-bold p-3 d-block text-danger"> No Staff Found</div>
                @endif --}}
            </div>
        </div>
    </div>
</main>
<script>
    function statusChange(model, id) {
        $.ajax({
            url: "{{ route('admin.statusChange') }}",
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
@include('admin.includes.footer')

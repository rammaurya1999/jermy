@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0 ">
        <div class="row justify-content-between mb-3">
            <div class="col-md-6 text-start">
                <h3 class="">Manage Inquires</h3>
            </div>
            <div class="col-md-6 text-end">
                {{-- <a href="{{ Route('admin.send-notification') }}" class="btn btn-primary text-light">Send Notification
                </a> --}}
            </div>
        </div>
        <div class="row ">

            <div class="col-md-12 col-xl-12  bg-white border border-2 p-2">
                {{-- @if ($staffData->count()) --}}
                <table id="table" class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>8097876784</td>
                            <td>mark123@gmail.com</td>
                            <td>{{ substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, quo.', 0, 50) }}...
                            </td>
                            <td><a href="{{ Route('admin.send-inquiry', 'id=' . base64_encode(1)) }}"
                                    class="text-primary text-center"><i
                                        class="align-middle me-2 fas fa-fw fa-reply"></i></a></a>
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
                        <tr>
                            <th scope="row">2</th>
                            <td>Steve</td>
                            <td>9197876784</td>
                            <td>steve123@gmail.com</td>
                            <td>{{ substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, quo.', 0, 50) }}...
                            </td>
                            <td><a href="{{ Route('admin.send-inquiry', 'id=' . base64_encode(1)) }}"
                                    class="text-primary text-center"><i
                                        class="align-middle me-2 fas fa-fw fa-reply"></i></a></a>
                                || <a href="#" class="text-danger text-center"
                                    onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data : Opening Of Restaurant' }}')"><i
                                        data-feather="trash-2"></i></a>
                                {{-- <a href="{{ Route('admin.delete', 'id=' . base64_encode(1) . '&modelName=' . base64_encode('ServiceProvider')) }}"
                                    class="text-danger text-center"
                                    onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data :  Opening Of Bars' }}')"><i
                                        data-feather="trash"></i></a> --}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Robert</td>
                            <td>7845676784</td>
                            <td>robert123@gmail.com</td>
                            <td>{{ substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, quo.', 0, 50) }}...
                            </td>

                            <td><a href="{{ Route('admin.send-inquiry', 'id=' . base64_encode(1)) }}"
                                    class="text-primary text-center">
                                    <i class="align-middle me-2 fas fa-fw fa-reply"></i></a>
                                ||
                                <a href="#" class="text-danger text-center"
                                    onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data : Opening Of Bars' }}')"><i
                                        data-feather="trash-2"></i></a>
                                {{-- <a
                                    href="{{ Route('admin.delete', 'id=' . base64_encode(1) . '&modelName=' . base64_encode('ServiceProvider')) }}"
                                    class="text-danger text-center"
                                    onclick="return confirm('{{ 'Are You Sure To Delete Service Provider Data : ' . $item->name }}')"><i
                                        data-feather="trash"></i></a> --}}
                            </td>
                        </tr>
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

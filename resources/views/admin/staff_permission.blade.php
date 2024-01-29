@include('admin.includes.header')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Staff / Sub Admin Permission</h1>

        <div class="row ">
            <div class="col-12 ">
                <div class="card bg-light">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Staff / Sub Admin Permission</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <table class="table text-center ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <th scope="row">Customers</th>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Services</th>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Service Provider</th>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Service Category</th>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="form-check-input p-2" type="checkbox" id="checkboxNoLabel"
                                                value="">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="col text-center">
                                <button type="button" class="btn btn-primary">Give Access</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.includes.footer')

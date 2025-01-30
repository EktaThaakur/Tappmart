@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Merchant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Merchant List

                            </h3>

                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/merchant_new" class="btn  btn-primary btn-sm">Add
                                        New Merchant</a>
                                </span>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> Name</th>

                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Sales Code</th>
                                    <th>Commission Earned</th>
                                    <th>Merchant Type</th>
                                    <th>Address</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merchants as $merchant)
                                <tr>
                                    <td> {{ $merchant->id }}</td>
                                    <td> {{ $merchant->name }}</td>
                                    <td> {{ $merchant->email }}</td>
                                    <td> {{ $merchant->phone }}</td>
                                    <td> {{ $merchant->sales_code }}</td>
                                    <td></td>
                                    <td> {{ $merchant->merchant_type }}</td>
                                    <td> {{ $merchant->address }}</td>
                                    <td class="text-center"><a class="btn btn-primary btn-sm" href="/edit_merchantForm/{{ $merchant->id }}">
                                            Update</a>
                                        <a class=" btn btn-danger btn-sm" href="/delete_merchant/{{ 7 }}">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@include('layouts.sections.footer')
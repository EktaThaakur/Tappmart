@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales Person</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales Person</li>
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
                            <h3 class="card-title">Sales person </h3>



                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/new_sales_person" class="btn  btn-primary btn-sm">Add
                                        New Sales person</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Code</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales_persons as $sales_person)
                                <tr>
                                    <td>{{ $sales_person->id }}</td>
                                    <td>{{ $sales_person->name }}</td>
                                    <td>{{ $sales_person->email }}</td>
                                    <td>{{ $sales_person->imployee_id }}</td>
                                    <td>{{ $sales_person->state }}</td>
                                    <td>{{ $sales_person->city }}</td>
                                    <td>{{ $sales_person->created_at }}</td>
                                    <td>{{ $sales_person->updated_at }}</td>
                                    <td class="text-center"><a class="btn btn-primary btn-sm" href="/edit_sales_personForm/{{ $sales_person->id }}">Update</a>
                                        <a class=" btn btn-danger btn-sm" href="/delete_sales_person/{{ $sales_person['id'] }}">Delete</a>
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
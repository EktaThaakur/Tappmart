@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Assignment to Pincode</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Assignment to Pincode</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Assignment to Pincode

                            </h3>

                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/category_assignment" class="btn  btn-primary btn-sm">Assign pincode to Category</a>
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
                                    <!-- <th>ID</th> -->
                                    <th>Category</th>
                                    <th>Pincodes</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                <tr>
                                    <!-- <td>{{$category->id}}</td> -->
                                    <td> {{$category->name}}</td>

                                    <td>@foreach($category->pincodes as $pincode){{$pincode->pincodes}}, @endforeach </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="">
                                            Update</a>
                                        <a class="btn btn-danger btn-sm" href="">Delete</a>
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
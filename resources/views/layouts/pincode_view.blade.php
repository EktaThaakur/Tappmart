@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pincode</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pincode</li>
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
                            <h3 class="card-title">Pincode </h3>



                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/add_pincode" class="btn  btn-primary btn-sm">Add
                                        Pincode </a>
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
                                    <th>Pincodes</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pincodes as $pincode)
                                <tr>
                                    <td>{{ $pincode->id }}</td>
                                    <td>{{ $pincode->pincodes }}</td>
                                    <td>{{ $pincode->cities->name }}</td>
                                    <td>{{ $pincode->cities->state->name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="/edit_pincodeForm/{{$pincode->id}}">Update</a>
                                        <a class="btn btn-danger btn-sm" href="/delete_pincode/{{$pincode->id}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-secondary btn-sm" onclick="window.location='{{ $pincodes->previousPageUrl() }}'" {{ $pincodes->onFirstPage() ? 'disabled' : '' }}>
                                &larr; Prev
                            </button>
                            <div>
                                {{ $pincodes->links('pagination::default', ['style' => 'ul.pagination.pagination-sm.m-0.float-right']) }}
                            </div>
                            <button class="btn btn-secondary btn-sm" onclick="window.location='{{ $pincodes->nextPageUrl() }}'" {{ $pincodes->hasMorePages() ? '' : 'disabled' }}>
                                Next &rarr;
                            </button>
                        </div>
                    </div>
                    <div class="card-footer clearfix">


                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </section>
</div>
@include('layouts.sections.footer')
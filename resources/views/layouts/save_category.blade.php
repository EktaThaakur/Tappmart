@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/cat_bulk_data" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group pt-2 pl-3 pr-3">
                            <label for="bulk_register">Upload Category</label>
                            <input type="file" class="form-control" id="bulkuser" name="file">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>

                    <form action="/category_data" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class=" card-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="image" name="image">

                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="exampleCheck1" name="tappsure" value="1">
                                <label for="exampleCheck1">TappSure</label>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>






            </div>
        </div>
    </section>
</div>
@include('layouts.sections.footer')

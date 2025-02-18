@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                            <h3 class="card-title">Products List

                            </h3>

                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/product_new" class="btn  btn-primary btn-sm">Add
                                        New Product</a>
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
                                    <th>Category Id</th>
                                    <th>Name</th>
                                    <th>Discription</th>
                                    <th>Image</th>
                                    <th>Tappoint Percentage</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>

                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['description'] }}</td>

                                        <td>
                                            @if ($product->category->image)
                                                <img src="{{ $product->category->image }}" width=" 60"
                                                    alt="img">
                                            @else
                                                <img src="/dist/img/user1-128x128.jpg" width=" 60" alt="img">
                                            @endif
                                        </td>
                                        <td>{{ $product['tappoint_percentage'] }}</td>

                                        <td class="text-center"><a class="btn btn-primary btn-sm"
                                                href="/edit_productForm/{{ $product['id'] }}">
                                                Update</a>
                                            <a class=" btn btn-danger btn-sm"
                                                href="/delete_product/{{ $product['id'] }}">Delete</a>
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

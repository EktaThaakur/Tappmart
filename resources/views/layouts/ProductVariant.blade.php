@include('layouts.sections.header')
@include('layouts.sections.sidebar')



<?php
$data = \App\Models\product::get();

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product variants</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product variants</li>
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
                            <h3 class="card-title">variants List

                            </h3>

                            <div class="card-tools">
                                <span style="float: left; margin-top: -5px; padding-right: 2px;">
                                    <a href="/product_variant_new" class="btn  btn-primary btn-sm">Add
                                        New Product variants</a>
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
                                    <th>Premium</th>
                                    <th>Commission</th>
                                    <th>Product</th>
                                    <th>Sum Insured</th>
                                    <th>Gross premium</th>
                                    <th>Money In Safe</th>
                                    <th>Neon Sign</th>
                                    <th>Total Content</th>
                                    <th>Image</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_variants as $product_variant)
                                    <tr>
                                        <td>{{ $product_variant['id'] }}</td>
                                        <td>{{ $product_variant['name'] }}</td>
                                        <td>{{ $product_variant['premium'] }}</td>
                                        <td>{{ $product_variant['commission'] }}</td>
                                        <td>{{ isset($product_variant->product->name) ? $product_variant->product->name : '' }}
                                        </td>
                                        <td>{{ $product_variant['suminsured'] }}</td>
                                        <td>{{ $product_variant['grosspremium'] }}</td>
                                        @if ($product_variant->product->id == 2)
                                            <td></td>
                                            <td></td>
                                        @else
                                            <td>{{ $product_variant['moneyinsafe'] }}</td>
                                            <td>{{ $product_variant['neonsign'] }}</td>
                                        @endif
                                        <td>{{ $product_variant['totalcontent'] }}</td>
                                        <td>
                                            @if ($product_variant['image'])
                                                <img src="{{ $product_variant['image'] }}" width=" 60"
                                                    alt="img">
                                            @else
                                                <img src="/dist/img/user1-128x128.jpg" width=" 60" alt="img">
                                            @endif
                                        </td>
                                        <td class="text-center"><a class="btn btn-primary btn-sm"
                                                href="/edit_product_variantForm/{{ $product_variant['id'] }}">
                                                Update</a>
                                            <a class=" btn btn-danger btn-sm"
                                                href="/delete_product_variant/{{ $product_variant['id'] }}">Delete</a>
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

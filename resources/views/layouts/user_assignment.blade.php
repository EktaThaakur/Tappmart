@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Assignment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Assignment</li>
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
                        <h3 class="card-title">Add New Product Assignment</h3>
                    </div>

                    <form action="/assignProductToUser" method="POST">
                        @csrf

                        <div class=" card-body">

                            <div class="form-group">
                                <label for="name">User</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    <option value="">Select Product</option>

                                    @foreach($users as $user)
                                    <option value="{{$user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="pincode">Pin Codes</label>
                                <textarea class="form-control" id="pincode" name="pincode" rows="3" placeholder="Enter Pin Code"></textarea>
                            </div> -->
                            <div class="form-group">
                                <label for="name">Product</label>
                                <select class="form-control" id="product" name="product">
                                    <option value="">Select Product</option>
                                    <?php
                                    //call product
                                    $products = App\Models\Product::all();
                                    ?>
                                    @foreach($products as $product)
                                    <option value="{{$product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
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
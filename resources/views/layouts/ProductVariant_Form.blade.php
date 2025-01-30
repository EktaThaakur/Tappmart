@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Variants</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Variants</li>
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
                        <h3 class="card-title">Add New Product Variant</h3>
                    </div>

                    <form action="/create_product_variant" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class=" card-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Premium</label>
                                <input type="text" class="form-control" id="name" name="premium" placeholder="Premium">
                            </div>
                            <div class="form-group">
                                <label for="name">Commission</label>
                                <input type="text" class="form-control" id="name" name="commission" placeholder="Commission">
                            </div>
                            <div class="form-group">
                                <label for="product">Product</label>
                                <select class="form-control" id="product" name="product">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Sum Insure</label>
                                <input type="text" class="form-control" id="name" name="suminsured" placeholder="Sum Insured">
                            </div>
                            <div class="form-group">
                                <label for="name">Gross premium </label>
                                <input type="text" class="form-control" id="name" name="grosspremium" placeholder="Gross premium">
                            </div>
                            <div class="form-group">
                                <label for="name">Money In Safe </label>
                                <input type="text" class="form-control" id="moneyinsafe" name="moneyinsafe" placeholder="Money In Safe">
                            </div>
                            <div class="form-group">
                                <label for="name">Neon Sign</label>
                                <input type="text" class="form-control" id="neonsign" name="neonsign" placeholder="Neon Sign">
                            </div>
                            <div class="form-group">
                                <label for="name">Total Content</label>
                                <input type="text" class="form-control" id="name" name="totalcontent" placeholder="Total Content">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="image" name="image">

                                    </div>
                                </div>
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
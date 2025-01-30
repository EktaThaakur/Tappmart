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
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Product</h3>
                    </div>

                    <form action="/update_product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class=" card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)

                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="description" value="{{ $product->description }}" placeholder="Description">
                            </div>

                            <div class="form-group">
                                <label for="name">TappPoint</label>
                                <input type="text" class="form-control" id="name" name="tappoint_percentage" value="{{ $product->tappoint_percentage }}" placeholder="TappPoint">
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
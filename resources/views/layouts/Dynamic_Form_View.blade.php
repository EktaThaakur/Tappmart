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

                    <form action="/form_save" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="product">Product</label>
                            <select class="form-control" id="product" name="product">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class=" card-body">
                            @foreach ($data as $inputdata)
                                <div class="form-group">
                                    <label for="name">{{ $inputdata->label }}</label>
                                    <input type="{{ $inputdata->type }}" class="form-control" id="name"
                                        name="{{ $inputdata->name }}" placeholder="{{ $inputdata->placeholder }}">
                                </div>
                            @endforeach

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

@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    @if($errors->any())
    {{ dd($errors->all()) }}
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Merchant Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">New Merchant Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Add New Merchant Category</h3>
                    </div>

                    <form action="/create_merchant_category" method="POST">
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label>Merchant Category</label>
                                <input type="text" class="form-control" name="merchant_category" placeholder="Enter Merchant Category">
                            </div>

                            <div class="form-group">
                                <label>Select Product</label>
                                <select class="form-control" name="product">
                                    <option value="">Select Product</option>

                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach

                                </select>
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
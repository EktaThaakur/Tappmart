@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Merchant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
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
                        <h3 class="card-title">UpdateMerchant</h3>
                    </div>

                    <form action="/update_merchant/{{$merchants->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class=" card-body">

                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $merchants->name }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $merchants->email }}">
                            </div>

                            <div class="form-group">
                                <label for="role">Merchant Type</label>
                                <select class="form-control" id="merchant_type" name="merchant_type">
                                    <option value="2">Merchant a</option>
                                    <option value="1">Merchant b</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $merchants->address }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ $merchants->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="sales_code">Sales Code</label>
                                <input type="text" class="form-control" id="sales_code" name="sales_code" placeholder="Sales Code" value="{{ $merchants->sales_code }}">
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
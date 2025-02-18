@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin User</li>
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
                        <h3 class="card-title">Update Admin User</h3>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/dump" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group pt-2 pl-3 pr-3">
                            <label for="bulk_register">Bulk Register</label>
                            <input type="file" class="form-control" id="bulkuser" name="file">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                    <form action="/update_admin_user/{{ $admin_user->id }}" method="POST">
                        @csrf
                        <!-- Error Messages -->
                        <div class="error-messages">
                            @foreach ($errors->get('name') as $error)
                                <p class="error">{{ $error }}</p>
                            @endforeach
                            @foreach ($errors->get('email') as $error)
                                <p class="error">{{ $error }}</p>
                            @endforeach
                            @foreach ($errors->get('password') as $error)
                                <p class="error">{{ $error }}</p>
                            @endforeach
                            @foreach ($errors->get('password_confirmation') as $error)
                                <p class="error">{{ $error }}</p>
                            @endforeach
                        </div>
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" value="{{ $admin_user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name"> Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" value="{{ $admin_user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="number">Mobile Number</label>
                                <input type="text" class="form-control" id="number" name="phone"
                                    placeholder="Mobile Number" value="{{ $admin_user->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"
                                    value="{{ $admin_user->address }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ir_code">IR Code</label>
                                <input type="text" class="form-control" id="ir_code" name="ir_code"
                                    placeholder="IR Code" value="{{ $admin_user->ir_code }}">
                            </div>


                            <div class="form-group">
                                <label for="name"> Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Password" value="{{ $admin_user->password }}">
                            </div>
                            <div class="form-group">
                                <label for="name"> Confirm Password</label>
                                <input type="text" class="form-control" id="confirm_password"
                                    name="password_confirmation" placeholder="Confirm Password" value="">
                            </div>
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <textarea class="form-control" id="pincode" name="pincodes" rows="3" placeholder="Enter Pincode"
                                    value="{{ $admin_user->pincodes }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="role">categories</label>
                                <select class="form-control" id="category" name="category[]" multiple>
                                    <option value="{{ $admin_user->category_id }}">Select Category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach



                                    <!-- Add more roles as needed -->
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

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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Admin User</h3>
                    </div>

                    <form action="/update_admin_user/{{ $admin_user->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $admin_user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{ $admin_user->password }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
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
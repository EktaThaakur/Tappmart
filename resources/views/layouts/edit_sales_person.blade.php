@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales Person</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales Person</li>
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
                        <h3 class="card-title">Update Sales Person</h3>
                    </div>

                    <form action="/update_sales_person/{{ $sales_person->id }}" method="POST">
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $sales_person->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $sales_person->email }}">
                            </div>
                            <div class="form-group">
                                <label for="employee_id"> Employee Code</label>
                                <input type="text" class="form-control" id="imployee_id" name="imployee_id" placeholder="Employee Code" value="{{ $sales_person->imployee_id }}">
                            </div>

                            <div class="form-group">
                                <label for="city"> City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $sales_person->city }}">
                            </div>
                            <div class="form-group">
                                <label for="state"> State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{ $sales_person->state }}">
                            </div>
                            <div class="form-group">
                                <label for="name"> Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{ $sales_person->password }}">
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
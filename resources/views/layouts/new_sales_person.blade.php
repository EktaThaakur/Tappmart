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
                        <h3 class="card-title">Add New Sales Person</h3>
                    </div>

                    <form action="/create_sales_person" method="POST">
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="name"> Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="name"> Employee Code</label>
                                <input type="text" class="form-control" id="imployee_id" name="imployee_id" placeholder="Employee Code">
                            </div>

                            <div class="form-group">
                                <label for="city"> City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="state"> State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                            </div>
                            <div class="form-group">
                                <label for="name"> Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
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
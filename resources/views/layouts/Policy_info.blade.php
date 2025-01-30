@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Policy Information</h3>
                            <div class="card-header">
                                <a href="/ckeditor" class="btn btn-primary float-right">Add Policy</a>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        use App\Models\Policy;

                                        $policies = Policy::latest()->get();
                                        ?>
                                        @foreach ($policies as $policy)
                                        <tr>
                                            <td>{{ $policy['id'] }}</td>
                                            <td>{{ $policy['product'] }}</td>
                                            <td>{{ $policy['created_at'] }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm"
                                                    href="/policy_edit/{{ $policy['id'] }}">Edit</a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/policy/{{ $policy['id'] }}">View</a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/policy_delete/{{ $policy['id'] }}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@include('layouts.sections.footer')
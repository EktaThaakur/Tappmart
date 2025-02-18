@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <div class="container">

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Varints Form</h3>
                <div class="card-tools">
                    <span style="float: left; margin-top: -5px; padding-right: 2px;">
                        <a href="/form/dynamic_form_View/{{ request()->query('product') }}"
                            class="btn  btn-primary btn-sm">View
                            Form</a>
                    </span>

                </div>
            </div>
        </div>
        <div class="form-group">
            <form method="GET">

                <label for="dropdown" class="dynamic-label">Select Product:</label>
                <select name="product" id="dropdown" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach


                    <!-- Add more options as needed -->
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                {{-- <h3 class="card-title">Varints Form</h3> --}}
                <div class="card-tools">
                    <span style="float: left; margin-top: -5px; padding-right: 2px;">
                        <a href="/form/add_fields/{{ request()->query('product') }}" class="btn  btn-primary btn-sm">Add
                            form
                            fields</a>
                    </span>

                </div>
            </div>
        </div>

        {{-- <div class="d-flex justify-content-end mb-3">
            <a href="/form/add_fields/{{ request()->query('product') }}" class="btn btn-primary">Add form
                fields</a>
        </div> --}}
        <form action="/dynamic_form/create" method="POST">
            @csrf
            @if ($form)
                @foreach ($form->Inputdata as $input)
                    <div class="form-group d-flex justify-content-center align-items-center">

                        <input type="hidden" name="form_id[{{ $input->id }}]" value="{{ $input->id }}"
                            class="col-1 mr-2">

                        <input type="text" id="name" name="name[{{ $input->id }}]" placeholder="Name"
                            value="{{ $input->name }}" class="col-1 mr-2">

                        <input type="text" id="validation" name="validation[{{ $input->id }}]"
                            placeholder="Validation" value="{{ $input->validation }}" class="col-1 mr-2">

                        <input type="text" id="type" name="type[{{ $input->id }}]" placeholder="Type"
                            value="{{ $input->type }}" class="col-1 mr-2">

                        <input type="text" id="Placeholder" name="placeholder[{{ $input->id }}]"
                            placeholder="Placeholder" value="{{ $input->placeholder }}" class="col-1 mr-2">

                        <input type="text" id="value" name="value[{{ $input->id }}]" placeholder="Value"
                            value="{{ $input->value }}" class="col-1 mr-2">

                        <input type="text" id="label" name="label[{{ $input->id }}]" placeholder="Label"
                            value="{{ $input->label }}" class="col-1 mr-2">

                        <a href="/form/delete_fields/{{ $input->id }}" class="btn btn-danger col-1">Delete</a>

                    </div>
                @endforeach
            @else
                <p>No form data available for the selected product.</p>
            @endif
            <button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>
        </form>


    </div>
</div>
@include('layouts.sections.footer')

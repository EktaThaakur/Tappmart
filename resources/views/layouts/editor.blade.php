@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('policy.store') }}" class="editor-form ">
        @csrf
        <label for="product" class="dynamic-label">Product:</label>

        <select name="product" id="product">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>


        <label for="content">Content:</label>
        <textarea name="content" id="content" class="ckeditor">
        </textarea>
        <label for="FAQ" class="dynamic-label">FAQ:</label>
        <textarea name="FAQ" id="FAQ" class="ckeditor">
        </textarea>
        <label for="about" class="dynamic-label">About:</label>
        <textarea name="about" class="ckeditor">
        </textarea>

        <button type="submit" class="button-editor">Save Policy</button>
    </form>
</div>
@include('layouts.sections.footer')

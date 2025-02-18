@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">

    <form method="POST" action="/policy_update/{{ $policy->id }}" class="editor-form ">
        @csrf
        <label for="product" class="dynamic-label">Product:</label>

        <select name="product" id="product">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach

        </select>


        <label for="content">Content:</label>
        foreach ($policies as $policy)
        <textarea name="content" id="content" class="ckeditor">
        {{ $policy->content }}

        </textarea>
        <label for="FAQ">FAQ:</label>
        <textarea name="FAQ" id="FAQ" class="ckeditor">
        {{ $policy->FAQ }}
        </textarea>
        <label for="about">About:</label>
        <textarea name="about" id="about" class="ckeditor">
        {{ $policy->about }}
        </textarea>

        <button type="submit" class="button-editor">Save Policy</button>
    </form>

</div>
@include('layouts.sections.footer')

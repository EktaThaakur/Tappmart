<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Editor with Source View</title>
    <!-- Include CKEditor -->
    <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <style>
        .editor-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        .dynamic-label {
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }

        select,
        .ckeditor,
        .button-editor {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .button-editor {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button-editor:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <form method="POST" action="" class="editor-form">
        @csrf
        <label for="product" class="dynamic-label">Product:</label>
        <select name="product" id="product">
            <option value="Personal Accident">Personal Accident</option>
            <option value="Health Insurance">Health Insurance</option>
            <option value="Life Insurance">Life Insurance</option>
            <!-- Add more options here -->
        </select>

        <label for="content">Content:</label>
        <textarea name="content" id="content" class="ckeditor">
            <!-- Default content for editing -->
           
        </textarea>

        <button type="submit" class="button-editor">Save Policy</button>
    </form>

    <!-- CKEditor Initialization -->
    <script>
        CKEDITOR.replace('content', {
            // Custom toolbar configuration
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'Preview']
                }, // Source button added here
                {
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
            ],

            // File upload configuration
            filebrowserUploadUrl: "",
            filebrowserUploadMethod: 'form',

            // Editor dimensions
            height: 400,

            // Advanced content filtering
            extraAllowedContent: 'table{border, width, height}; tr; td{border, width, height}',

            // Extra plugins
            extraPlugins: 'justify,colorbutton,font,uploadimage',
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <title>File Upload</title>
</head>
<body>
    <input type="file" class="filepond" name="file" />

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // Register the plugins
        FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);

        // Create a FilePond instance
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);

        // Set FilePond options
        FilePond.setOptions({
            server: {
                url: '/upload',
                process: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                    },
                    onload: (response) => {
                        return response; // Return the response
                    },
                    onerror: (response) => {
                        return response; // Return the error response
                    },
                },
            },
        });
    </script>
</body>
</html>

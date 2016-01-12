<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Spurdo Converter</title>
    <meta name="author" content="Lee Watson">
    <meta name="description" content="wat de fugg">
    <meta name="keywords" content="spurdo">
    <link rel="shortcut icon" href="{{ url('assets/img/spurdo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>
<body>
    <div class="text-center">
        <h1>Welcome to the Spurdo Converter</h1>
        <p>To use this converter, simply make a HTTP GET request to <a href="{{ route('api') }}">{{ route('api') }}</a> with the parameters from the table below.</p>
        <p>Example: <a href="{{ route('api', ['text' => 'what the fuck']) }}">{{ route('api', ['text' => 'what the fuck']) }}</a></p>
    </div>
    <table class="center" border="1">
        <tr>
            <th>Parameter</th>
            <th>Description</th>
            <th>Type</th>
            <th>Default</th>
            <th>Required?</th>
        </tr>
        <tr>
            <td>text</td>
            <td>The text to spurdo-ify.</td>
            <td>String</td>
            <td></td>
            <td>Yes</td>
        </tr>
        <tr>
            <td>ebinfaces</td>
            <td>Include ebin faces in your spurdo text.</td>
            <td>Boolean</td>
            <td>true</td>
            <td>No</td>
        </tr>
    </table>
    <div class="text-center">
        <p>On success, the API will return a JSON object with two keys: status and text.<br>Status will always be 0 on success, and text will be the spurdo-ified version of whatever your text paremeter was.</p>
        <p>Example: {{ json_encode(['status' => 0, 'text' => 'wat de fugg']) }}</p>
        <p>On error, the API will return a JSON object with two keys: status and error.<br>Status will always be 1 on error, and error will be a string describing what went wrong.</p>
        <p>Example: {{ json_encode(['status' => 1, 'error' => 'missing_required_parameter: text']) }}</p>

        <img src="{{ url('assets/img/spurdo.png') }}" alt="spurdo">
        <p>Source code: <a href="https://github.com/TheReverend403/Spurdo-Converter">https://github.com/TheReverend403/Spurdo-Converter</a></p>
    </div>
</body>
</html>

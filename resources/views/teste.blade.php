<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/teste.css') }}">
    <script src="{{ asset('/teste.js') }}" defer></script>
</head>

<body>
    <label class="picture" for="picture__input" tabIndex="0">
        <span class="picture__image"></span>
    </label>

    <input type="file" name="picture__input" id="picture__input">

</body>

</html>

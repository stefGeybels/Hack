<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Satisfy&display=swap" rel="stylesheet">

        <title>Coffeecode brew</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

</header>
<body>
    <div class="background">
        <img src= "{{ asset('/img/bg.jpg')}}">
        <div class="background__text-info text-info">
            <h1 class="h1">Welcome to Coffeecode brewhouse</h1>
            <div class="text-info__button-start-brew button-start-brew">
                <button>Start brewing</button>
            </div>
        </div>
    </div>

</body>

</html>
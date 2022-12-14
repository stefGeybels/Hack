<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

        <title>Coffeecode brew</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

</header>
<body>
    <div class="background-wizzard">
        <img src= "{{ asset('/img/background_wizard_room.jpg')}}">
        <h1 class="h1">Choose 2 ingredients to begin ...</h1>
        <div class="old-book">
            <img src= "{{ asset('/img/old_book.png')}}">
            <div class="book-info">
                <div class="ingredients">
                    <h2 class="h2">Ingredients</h2>
                    <div class="ingredient-checkboxes">
                        <form action="/check-potion" method="POST">
                            @csrf
                            <div class="value">
                                <input type="checkbox" id="basil" name="basil" value="1">
                                <label for="basil">
                                    <img src= "{{ asset('/img/basil.png')}}">
                                    <p>Basil</p>
                                </label>
                            </div>
                            <div class="value">
                                <input type="checkbox" id="basil" name="chives" value="1">
                                <label for="basil">
                                    <img src= "{{ asset('/img/chives.png')}}">
                                    <p>Chives</p>
                                </label>
                            </div>
                            <div class="value">
                                <input type="checkbox" id="basil" name="lavender" value="1">
                                <label for="basil">
                                    <img src= "{{ asset('/img/lavender.png')}}">
                                    <p>Lavender<p>
                                </label>
                            </div>
                            <input type="submit" value="Submit" class="submit-button">
                        </form>
                    </div>
                </div>

                <div class="result">
                    <h2 class="h2">Result</h2>
                    <div class="result-poison">
                        @if(isset($potionStatus))
                            @if($potionStatus == "Explosive")
                                <img src="{{ asset('/img/potion-3.png')}}"/>
                                <h6 class="h6">You have explsove posion</h6>
                            @endif
                                @if($potionStatus == "Stable")
                                    <img src="{{ asset('/img/potion-1.png')}}"/>
                                    <h6 class="h6">You have new Stable posion</h6>
                                @endif
{{--                                @if($potionStatus == "3")--}}
{{--                                    <img src="{{ asset('/img/potion-3.png')}}"/>--}}
{{--                                    <h6 class="h6">You have new Stable </h6>--}}
{{--                                @endif--}}

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

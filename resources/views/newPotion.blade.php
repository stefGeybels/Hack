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
        <div class="background-wizzard-succes">
            <img src= "{{ asset('/img/background_wizard_room.jpg')}}">
            <h1 class="h1">You need to be a wizard you made a new potion</h1>
            <div class="old-book">
                <img src= "{{ asset('/img/old_book.png')}}">
                <div class="form-save-potion">
                    <label for="fname">Name potion:</label><br>
                    <input type="text" id="namePotion" name="namePotion" value="name"><br>
                    <label for="lname">Last name:</label><br>
                    <textarea id="info-potion" name="info-potion" rezi></textarea><br>
                    <input type="submit" value="Save potion" class="submit-button">
                </div>
            </div>
        </div>

    </body>
</html>
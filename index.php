<?php session_start(); ?>
<?php //$_session['size'] = $_POST; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" href ="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <style>
        button:hover{
            background: transparent;
            color:white;
            border:3px solid white !important;
        }
    </style>
</head>
<body style="background:rebeccapurple;">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <main>
        <div class = "container">
            
            <div id = "turn" style="margin:0 auto;padding: 3rem 0; text-align: center; font-size: 3rem;color:white;">Tic Tac Toe</div>
            <form action = "./game.php" method ="post" style = "display:flex;justify-content:center">
                <select name = "options" style ="margin:0 30px; width:30%;font-size:1.2rem">
                    <option value = "3">3 X 3</option>
                    <option value = "4">4 X 4</option>
                    <option value = "5">5 X 5</option>
                </select>
                <button type="submint" style = "padding:1rem;border-radius:3rem;border:1px solid black;cursor:pointer;">Select your size</button>
            </form>
            <form  action = "./history.php" style = "display:flex;justify-content:center;margin-top: 100px;">
                <button type="submint" style = "padding:1rem 3rem;border-radius:3rem;border:2px solid black;cursor:pointer;">Game History</button>
            </form>

        </div>
    </main>


    <script src  = "game.js"></script>
</body>
</html>
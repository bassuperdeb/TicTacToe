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
        #result > div:hover{
            color:black !important;
            background:white;
        }
        #result{
            margin: 0 auto;
            height: 100vh;
            width:60%;
            overflow-Y: scroll;
        }
    </style>
</head>
<body style="background:rebeccapurple;">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <main>
        <div class = "container" style = "min-height:100vh;">
            
            <div id = "turn" style="height:60px;margin:0 auto;padding: 3rem 0; text-align: center; font-size: 3rem;color:white;">History</div>
            <div id = "result" style = "text-align:center;width:30%;font-size:1.5rem;padding:0 2rem;">

            </div>

            <form  action = "./index.php" style = "display:flex;justify-content:center;margin-top: 100px;">
                <button type="submint" style = "padding:1rem 3rem;border-radius:3rem;border:2px solid black;cursor:pointer;">< Back to Home</button>
            </form>

            
        </div>
    </main>


    <script src  = "game.js"></script>
    <script>
        jQuery(function($){
            $(document).ready(function(){

                $.ajax({
                    url: './jquery/load_his.php',
                    type:'post',
                    data:{},
                    success: function(data){
                        $('#result').html(data);
                    }
                })

            })
        })
    </script>

</body>
</html>
<?php session_start(); ?>

<?php 
    if(isset($_POST['options'])){
        $_SESSION['size'] = $_POST['options']; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" href ="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <main>
        <div class = "container">
            
            <div id = "turn" style="margin:0 auto;padding: 3rem 0; text-align: center; font-size: 3rem;">player1 turn</div>
            <form action = "./database.php" method ="post">
                <input type="hidden" id="size" name ="size" value="<?php echo $_SESSION['size']; ?>">
                <input type="hidden" id="status" name ="status" value="0">
                <input type="hidden" id="winner" name ="winner" value="">
                <input type="hidden" id="play"  name="play" value="">
                <button type="submit" id = "submit" name ="submit" style="display:none;">dddd</button>
            </form>
            
            <div id = "regame" style="margin:20px auto;text-align: center; font-size: 2rem;padding: 1rem;width: 30%;background-color: rebeccapurple;color: white;border-radius: 2rem;cursor: pointer;">Restart</div>
            <div style = "display:flex;width:40%;margin:20px auto;justify-content:space-between;">
                <div>Player1 <img src ="./pic/x.png" style = "width:20px;height:20px;"></div>
                <div>Player2 <img src ="./pic/o.png" style = "width:20px;height:20px;"></div>
            </div>
            <div id = "board">
                
            </div>
            <form  action = "./index.php" style = "display:flex;justify-content:center;margin-top: 100px;">
                <button type="submint" style = "padding:1rem 3rem;border-radius:3rem;border:2px solid black;cursor:pointer;">< Back to Home</button>
            </form>
        </div>
    </main>


    <script src  = "game.js"></script>
</body>
</html>
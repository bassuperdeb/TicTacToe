<?php session_start(); ?>

<?php 
   
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
            <input id="id" type = "hidden" value = "<?php echo $_GET['id'] ?>">
            <div id = "turn" style="margin:0 auto;padding: 3rem 0; text-align: center; font-size: 3rem;">Replay</div>
            <div id = "winneris" style="margin:0 auto;padding: 0; text-align: center; font-size: 2rem;color:rebeccapurple;">Replay</div>
            <div id = "next" style = "padding:1rem 1rem;border-radius:3rem;border:2px solid black;cursor:pointer;width:20%;text-align:center;margin:10px auto;">Next</div>
            <div id = "prev" style = "padding:1rem 1rem;border-radius:3rem;border:2px solid black;cursor:pointer;width:20%;text-align:center;margin:10px auto;">Previous</div>
            <div style = "display:flex;width:40%;margin:20px auto;justify-content:space-between;">
                <div>Player1 <img src ="./pic/x.png" style = "width:20px;height:20px;"></div>
                <div>Player2 <img src ="./pic/o.png" style = "width:20px;height:20px;"></div>
            </div>
            <div id = "board">
                
            </div>
            <form  action = "./history.php" style = "display:flex;justify-content:center;margin-top: 100px;">
                <button type="submint" style = "padding:1rem 3rem;border-radius:3rem;border:2px solid black;cursor:pointer;">< Back to History</button>
            </form>
        </div>
    </main>


    <script>
        jQuery(function($){
            $(document).ready(function(){

                let turn = -1;
                let log ="";
                let winner ="";
                let width  = 0;
                let height = 0;
                const  board = $('#board');

                function display(){
                    $(`#board > div`).removeClass('player1');
                    $(`#board > div`).removeClass('player2');
                    for(x = 0; x <= turn ; x++){
                        let current_player = log[x].player;
                        let postion_w = log[x].width; 
                        let postion_h = log[x].height; 
                        $(`#board > div[data-width = ${postion_w}][data-height = ${postion_h}]`).addClass(current_player);
                    }
                }
                function displayWinner(){

                }
                function create(){
                    width = width * 1;
                    height = height * 1;
                    for(h = 1 ;h <= height ;h ++){
                    for(w = 1; w <= width ; w++){
                    let element = document.createElement('div');
                    element.setAttribute('data-width', `${w}`);
                    element.setAttribute('data-height', `${h}`);
                    board.append(element);
                    }
                    }
                    board.css('grid-template-columns' , `repeat(${width},1fr)`);
                    board.css('grid-template-row' , `repeat(${height},1fr)`);
               
                } 

                $.ajax({
                    url: './jquery/load_replay.php',
                    type:'post',
                    data:{id:$('#id').val()},
                    success: function(data){
                        let temp = JSON.parse(data);
                        log = JSON.parse(temp[0].log);
                        winner = temp[0].winner;
                        $('#winneris').text(" Winner is " + winner);
                        width = temp[0].size * 1;
                        height = temp[0].size * 1;
                        //alert(width);
                        create(); 
                    }
                })   
                 
                $('#next').on('click',function(){
                    if(turn < log.length-1){
                        turn++;
                        display()
                    }
                    else if (turn == log.length-1) {
                        alert('เกมสิ้นสุดแล้ว');
                    }
                    console.log(turn);
                })
                $('#prev').on('click',function(){
                    if(turn > 0){
                        turn--;
                        display()
                    }
                })

            })
        })
        
        
        
           
    </script>
</body>
</html>
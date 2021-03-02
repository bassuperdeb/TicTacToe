let player = "player1";
let size = document.querySelector('#size').value;
let width = size * 1;
let height = size * 1;
let winnerplay = "";


const board  = document.querySelector('#board');
create(width,height)
const plates = document.querySelectorAll('#board > div');
const re = document.querySelector('#regame');
let endgame = 0;
let status = document.querySelector('#status');
//////////////////////////////////////////////////// เก็บ Log //////////////////////////////////////////////////////////////////////
let log_play = [];

///////////////////////////////////////////////////// Event //////////////////////////////////////////////////////////////////////
re.addEventListener('click',function(){
    location.replace("./game.php");
})

plates.forEach(function(plate){
    plate.addEventListener('click',function(e){
        element = e.currentTarget;
        let width = element.getAttribute("data-width");
        let height = element.getAttribute("data-height");
        //console.log(width,height);
        if(valid(element) === 1 && endgame == 0){
            //console.log('valid');
            element.classList.add(player);
            log_play.push({'player':player,'width':width,'height':height})
            winner()
            testEndgame()
            swift()
        }
        else if(endgame == 0){
            //console.log('Not valid');
            alert('กรุณาเลือกช่องที่ว่างอยู่')
        }
        else if(endgame == 1){
            //console.log('Not valid');
            alert('โปรดเริ่มเกมใหม่')
        }
    })
})

////////////////////////////////////////////////////////fucntion go here/////////////////////////////////////////////////////////
// game start
function create(width,height){

    for(h = 1 ;h <= height ;h ++){
        for(w = 1; w <= width ; w++){
       let element = document.createElement('div');
       element.setAttribute('data-width', `${w}`);
       element.setAttribute('data-height', `${h}`);
       board.appendChild(element);
        }
    }

    board.style.gridTemplateColumns = `repeat(${width},1fr)`;
    board.style.gridTemplateRows = `repeat(${height},1fr)`;
}
//valid
function valid(element){
    if(element.classList.contains('player1') || element.classList.contains('player2')){
        return 0;
    }
    else {
        return 1;
    }
}

//swift player
function swift(){
    if(player === 'player1'){
        player = 'player2';
    }
    else if(player === 'player2'){
        player = 'player1';
    }
    document.querySelector('#turn').innerText = player + ' turn';
}

// check winner
function winner(){
    // 3 รูปแบบ

    //1 check each row
    for(h1 = 1 ;h1 <= height ;h1 ++){
        let array = [];
        for(w1 = 1; w1 <= width ; w1++){
            current = document.querySelector(`#board > div[data-width='${w1}'][data-height='${h1}']`);
            //console.log(current);
            if(current.classList.contains('player1') ){
                array.push('player1');
            }
            else if(current.classList.contains('player2') ){
                array.push('player2');
            }
            else if (!current.classList.contains('player1') && !current.classList.contains('player2')){
                array.push('empty');
            }
            
        }
        let uni = [...new Set(array)];
        if(uni.length == 1 && (uni[0] == 'player1' || uni[0] == 'player2') ){
            alert('winner is ' + uni[0]);
            winnerplay = uni[0];
            document.querySelector('#turn').innerText = 'Game End';
            endgame = 1;
            status.value  = "1";
            break;
        }
    }
    //2 check each row
    for(w1 = 1 ;w1 <= width ;w1 ++){
        let array = [];
        for(h1 = 1; h1 <= width ; h1++){
            current = document.querySelector(`#board > div[data-width='${w1}'][data-height='${h1}']`);
            //console.log(current);
            if(current.classList.contains('player1') ){
                array.push('player1');
            }
            else if(current.classList.contains('player2') ){
                array.push('player2');
            }
            else if (!current.classList.contains('player1') && !current.classList.contains('player2')){
                array.push('empty');
            }
            
        }
        let uni = [...new Set(array)];
        if(uni.length == 1 && (uni[0] == 'player1' || uni[0] == 'player2') ){
            alert('winner is ' + uni[0]);
            winnerplay = uni[0];
            document.querySelector('#turn').innerText = 'Game End';
            endgame = 1;
            status.value  = "1";
            break;
        }
    }
    //3 check cross
        //I
            let array = [];
            for(w1 = 1; w1 <= width; w1++){
            current = document.querySelector(`#board > div[data-width='${w1}'][data-height='${w1}']`);
            //console.log(current);
            if(current.classList.contains('player1') ){
                array.push('player1');
            }
            else if(current.classList.contains('player2') ){
                array.push('player2');
            }
            else if (!current.classList.contains('player1') && !current.classList.contains('player2')){
                array.push('empty');
            }
            }
            let uni = [...new Set(array)];
            if(uni.length == 1 && (uni[0] == 'player1' || uni[0] == 'player2') ){
                alert('winner is ' + uni[0]);
                winnerplay = uni[0];
                document.querySelector('#turn').innerText = 'Game End';
                endgame = 1;
                status.value  = "1";
            }

        // II
            let array2 = [];
            for(w1 = width, h1 = 1; w1 >1 ,h1 <= height; h1++,w1--){
            current = document.querySelector(`#board > div[data-width='${w1}'][data-height='${h1}']`);
            //console.log(current);
            if(current.classList.contains('player1') ){
                array2.push('player1');
            }
            else if(current.classList.contains('player2') ){
                array2.push('player2');
            }
            else if (!current.classList.contains('player1') && !current.classList.contains('player2')){
                array2.push('empty');
            }
            }
            let uni2 = [...new Set(array2)];
            if(uni2.length == 1 && (uni2[0] == 'player1' || uni2[0] == 'player2') ){
                alert('winner is ' + uni2[0]);
                winnerplay = uni2[0];
                document.querySelector('#turn').innerText = 'Game End';
                endgame = 1;
                status.value  = "1";
            }
}

//test log
function testEndgame(){
    if (endgame == 1) {
        log_play = JSON.stringify(log_play);//console.log(log_play1)
        //log_play2 = JSON.stringify(log_play2);//console.log(log_play2)
        document.querySelector('#play').value = log_play;
        //document.querySelector('#play2').value = log_play2;
        document.querySelector('#winner').value = winnerplay
        winnerplay = "";
        document.querySelector('#submit').click();
    };
}

jQuery(function($){

   
    
})
const canvas = document.getElementById("jocCanvas");
let botopausa = document.getElementById("StopButton");
const ctx = canvas.getContext("2d");
let rightPressed = false;
let leftPressed = false;
let estat = false;
let colisioParet = new Audio('public/audio/golpear_31.mp3');
let colisioBloc = new Audio('public/audio/toca_bloc.mp3');
let song = new Audio('public/audio/donkey-kong.mp3');
let gameOver = new Audio('public/audio/mario-kart-lose-2.mp3');
let nivellNou = new Audio('public/audio/subir-nivel.mp3');
let vidaPerduda = new Audio('public/audio/vida_perduda.mp3');
let nik = '';
function Iniciar(){
  if($('#nik').val()){
    nik = $('#nik').val();
    estat = true;
    $('#StartButton').hide();
    $('#StopButton').show();
  }else{
    alert("Falta el Nik");
  }
}
function Parar(){
    estat = false;
    $('#StopButton').hide();
    $('#StartButton').show();
    song.pause();
}
document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
document.addEventListener("mousemove", mouseMoveHandler, false);
document.addEventListener("touchmove", touchMoveHandler, false);
function touchMoveHandler(e) {
    //alert(e.changedTouches[0].pageX);
    let relativeX = e.changedTouches[0].pageX - canvas.offsetLeft;
    if(relativeX > 0+pala.paddleWidth/2  && relativeX < canvas.width-pala.paddleWidth/2) {
        pala.paddleX = relativeX - pala.paddleWidth/2;
    }
}
function keyDownHandler(e) {
    if(e.keyCode === 39) {
        rightPressed = true;
    }
    else if(e.keyCode === 37) {
        leftPressed = true;
    }
}
function keyUpHandler(e) {
    if(e.keyCode === 39) {
        rightPressed = false;
    }
    else if(e.keyCode === 37) {
        leftPressed = false;
    }
}
function mouseMoveHandler(e) {
    let relativeX = e.clientX - canvas.offsetLeft;
    if(relativeX > 0+pala.paddleWidth/2  && relativeX < canvas.width-pala.paddleWidth/2) {
        pala.paddleX = relativeX - pala.paddleWidth/2;
    }
}


class Pilota {
  constructor() {
    this.ballRadius = 6;
    //posicio
    this.x = canvas.width/2;
    this.y = canvas.height-30;
    //desplaçament
    this.dx = 1;
    this.dy = -2;
  }
  drawBall() {
      ctx.beginPath();
      ctx.arc(pilota.x, pilota.y, this.ballRadius, 0, Math.PI*2);
      ctx.fillStyle = "#0095DD";
      ctx.fill();
      ctx.closePath();
  }
}
class Pala {
  constructor() {
    this.paddleHeight = 10;
    this.paddleWidth = 75;
    this.paddleX = (canvas.width-this.paddleWidth)/2;
  }
  drawPaddle() {
      ctx.beginPath();
      ctx.rect(this.paddleX, canvas.height-this.paddleHeight, this.paddleWidth, this.paddleHeight);
      ctx.fillStyle = "#0095DD";
      ctx.fill();
      ctx.closePath();
  }
}
class Blocs {
  constructor() {
    this.brickRowCount = 5;
    this.brickColumnCount = 1;
    this.brickWidth = 75;
    this.brickHeight = 20;
    this.brickPadding = 5;
    this.brickOffsetTop = 30;
    this.brickOffsetLeft = 30;
    this.bricks = [];
      for(let c=0; c<this.brickColumnCount; c++) {
          this.bricks[c] = [];
          for(let r=0; r<this.brickRowCount; r++) {
              this.bricks[c][r] = { x: 0, y: 0, status: 1 };
          }
      }

  }
  drawBricks() {

      for(let c=0; c<this.brickColumnCount; c++) {
          for(let r=0; r<this.brickRowCount; r++) {
              if(this.bricks[c][r].status === 1) {
                  let brickX = (r*(this.brickWidth+this.brickPadding))+this.brickOffsetLeft;
                  let brickY = (c*(this.brickHeight+this.brickPadding))+this.brickOffsetTop;
                  this.bricks[c][r].x = brickX;
                  this.bricks[c][r].y = brickY;
                  ctx.beginPath();
                  ctx.rect(brickX, brickY, this.brickWidth, this.brickHeight);
                  ctx.fillStyle = "#0095DD";
                  ctx.fill();
                  ctx.closePath();
              }
          }
      }
  }
}
class Pantalla {
  constructor() {
    this.score = 0;
    this.scorePantalla = 0;
    this.lives = 3;
    this.nivell = 1;
  }
  drawScore() {
      ctx.font = "16px Arial";
      ctx.fillStyle = "#0095DD";
      ctx.fillText("Puntuacio: "+this.scorePantalla, 8, 20);
  }
  drawLives() {
      ctx.font = "16px Arial";
      ctx.fillStyle = "#ff0000";
      ctx.fillText("Vides: "+this.lives, canvas.width-65, 20);
  }
  drawNivell() {
      ctx.font = "16px Arial";
      ctx.fillStyle = "#777777";
      ctx.fillText("Nivell: "+this.nivell, canvas.width/2, 20);
  }
  gameOver(){
    gameOver.play();
    estat = false;
    pantalla.lives++;
    pilota.x = canvas.width/2;
    pilota.y = canvas.height-30;
    alert("GAME OVER. LA PUNTUACIÓ ES DE: "+pantalla.scorePantalla);
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: "joc/puntuacio",
        type:'POST',
        data: {_token:_token, score:pantalla.score, nom:nik},
        success: function(data) {
            if($.isEmptyObject(data.error)){
              console.log(data.success);
            }else{
              console.log(data.error);
            }
        }
    });
  }
}

class Colisions {
  constructor() {
    this.b =[];
    this.velocitat = 1;
  }
  collisionDetection() {
      for(let c=0; c<blocs.brickColumnCount; c++) {
          for(let r=0; r<blocs.brickRowCount; r++) {
              this.b = blocs.bricks[c][r];
              if(this.b.status === 1) {
                  if(pilota.x+pilota.ballRadius > this.b.x && pilota.x-pilota.ballRadius < this.b.x+blocs.brickWidth && pilota.y+pilota.ballRadius > this.b.y && pilota.y-pilota.ballRadius < this.b.y+blocs.brickHeight) {

                      colisioBloc.play();
                      pilota.dy = -pilota.dy;
                      this.b.status = 0;
                      pantalla.score++;
                      pantalla.scorePantalla++;
                      if(pantalla.score === blocs.brickRowCount*blocs.brickColumnCount) {
                          //alert("YOU WIN, CONGRATS!");
                          nivellNou.play();
                          this.pujarnivell();
                          nivellNou.pause();
                      }
                  }
              }
          }
      }
  }
  colisionsPala(){
    //primera mitat de la pala
    if(pilota.x +pilota.ballRadius> pala.paddleX && pilota.x-pilota.ballRadius < pala.paddleX + pala.paddleWidth/4) {
        colisioParet.play();
        pilota.dy = -pilota.dy;
        pilota.dx -= 2;
    }
    else if (pilota.x +pilota.ballRadius> pala.paddleX + pala.paddleWidth/4 && pilota.x-pilota.ballRadius < pala.paddleX + (pala.paddleWidth/4)*2) {
        colisioParet.play();
        pilota.dy = -pilota.dy;
        pilota.dx -= 1;
    }
    else if (pilota.x +pilota.ballRadius> pala.paddleX + (pala.paddleWidth/4)*2 && pilota.x-pilota.ballRadius < pala.paddleX + (pala.paddleWidth/4)*3) {
        colisioParet.play();
        pilota.dy = -pilota.dy;
        pilota.dx += 1;
    }
    else if (pilota.x +pilota.ballRadius> pala.paddleX + (pala.paddleWidth/4)*3 && pilota.x-pilota.ballRadius < pala.paddleX + (pala.paddleWidth/4)*4) {
        colisioParet.play();
        pilota.dy = -pilota.dy;
        pilota.dx += 2;
    }
    else {
        pantalla.lives--;
        vidaPerduda.play();
        if(!pantalla.lives) {
            pantalla.gameOver();
        }
        else {
            pilota.x = canvas.width/2;
            pilota.y = canvas.height-30;
            pilota.dx = 2;
            pilota.dy = -2;
            pala.paddleX = (canvas.width-pala.paddleWidth)/2;
        }
    }
  }
  colisionsParet(){
    if(pilota.x + pilota.dx > canvas.width-pilota.ballRadius || pilota.x + pilota.dx < pilota.ballRadius) {
        colisioParet.play();
        pilota.dx = -pilota.dx;
    }
    if(pilota.y + pilota.dy < pilota.ballRadius) {
        colisioParet.play();
        pilota.dy = -pilota.dy;
    }
    else if(pilota.y + pilota.dy > canvas.height-pilota.ballRadius) {
        colisions.colisionsPala();
    }
  }
  pujarnivell(){
      pantalla.nivell += 1;
      blocs.brickRowCount += 1;
      blocs.brickColumnCount += 1;
      pantalla.score = 0;
      blocs.brickWidth -= 10;
      blocs.brickHeight -= 2;
      pilota.x = canvas.width/2;
      pilota.y = canvas.height-30;
      pilota.dx = pantalla.nivell +1;
      pilota.dy = -pantalla.nivell -1;
      for(let c=0; c<blocs.brickColumnCount; c++) {
          blocs.bricks[c] = [];
          for(let r=0; r<blocs.brickRowCount; r++) {
              blocs.bricks[c][r] = { x: 0, y: 0, status: 1 };
          }
      }
  }
}
pilota = new Pilota();
pala = new Pala();
blocs = new Blocs();
pantalla = new Pantalla();
colisions = new Colisions();
//connexions = new Connexions();



function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // Paint it black.
    ctx.fillStyle = 'rgba(0, 0, 0, 0.1)';
    ctx.rect(0, 0, 480, 320);
    ctx.fill();
    blocs.drawBricks();
    pilota.drawBall();
    pala.drawPaddle();
    pantalla.drawScore();
    pantalla.drawLives();
    pantalla.drawNivell();
    colisions.collisionDetection();
    if ( estat === true ){
        song.play();
        colisions.colisionsParet();

        if(rightPressed && pala.paddleX < canvas.width-pala.paddleWidth) {
            pala.paddleX += 7;
        }
        else if(leftPressed && pala.paddleX > 0) {
            pala.paddleX -= 7;
        }
        pilota.x += pilota.dx;
        pilota.y += pilota.dy;
    }


    requestAnimationFrame(draw);
}
draw();

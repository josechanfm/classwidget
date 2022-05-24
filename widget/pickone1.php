<div class="overlay">
  <canvas id="world"></canvas>
  <h1 id="winner"></h1>
  <svg id="close" aria-hidden="true" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="white" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg>
</div>

<div class="background">
  <nav>
    <div class="navWrapper">
      <a href="#">RANDOM NAME PICKER</a>
    </div>
  </nav>
  
  <header>
    <div class="namepicker">
      <p>Names:</p>
      <input id="names" type="text" placeholder="Each name followed by a ‘ , ‘">
      <a id="pick">Pick a name</a>
    </div>
  </header>
  
</div>

<script>
var nameArray = [];

$("#pick").click(function() {
    // Get the input value
  var names = document.getElementById("names").value;
  
  // Seperate the names and push them into the array
  var nameArray = names.split(',');
  
  // Get a random name, the winner
  var winner = nameArray[Math.floor(Math.random()*nameArray.length)];
  
  winner = "🎉" + " " + winner + " " + "🎉";
  
  // Display winner
  $("#world").addClass("open");
  $("#winner").addClass("open");
  $("#close").addClass("open");
  $("#winner").text(winner);
});
  
$("#close").click(function() {
  $("#world").removeClass("open");
  $("#winner").removeClass("open");
  $("#close").removeClass("open");
});

// Confetti
(function() {
  var COLORS, Confetti, NUM_CONFETTI, PI_2, canvas, confetti, context, drawCircle, i, range, resizeWindow, xpos;

  NUM_CONFETTI = 350;

  COLORS = [[85, 71, 106], [174, 61, 99], [219, 56, 83], [244, 92, 68], [248, 182, 70]];

  PI_2 = 2 * Math.PI;

  canvas = document.getElementById("world");

  context = canvas.getContext("2d");

  window.w = 0;

  window.h = 0;

  resizeWindow = function() {
    window.w = canvas.width = window.innerWidth;
    return window.h = canvas.height = window.innerHeight;
  };

  window.addEventListener('resize', resizeWindow, false);

  window.onload = function() {
    return setTimeout(resizeWindow, 0);
  };

  range = function(a, b) {
    return (b - a) * Math.random() + a;
  };

  drawCircle = function(x, y, r, style) {
    context.beginPath();
    context.arc(x, y, r, 0, PI_2, false);
    context.fillStyle = style;
    return context.fill();
  };

  xpos = 0.5;

  document.onmousemove = function(e) {
    return xpos = e.pageX / w;
  };

  window.requestAnimationFrame = (function() {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
      return window.setTimeout(callback, 1000 / 60);
    };
  })();

  Confetti = class Confetti {
    constructor() {
      this.style = COLORS[~~range(0, 5)];
      this.rgb = `rgba(${this.style[0]},${this.style[1]},${this.style[2]}`;
      this.r = ~~range(2, 6);
      this.r2 = 2 * this.r;
      this.replace();
    }

    replace() {
      this.opacity = 0;
      this.dop = 0.03 * range(1, 4);
      this.x = range(-this.r2, w - this.r2);
      this.y = range(-20, h - this.r2);
      this.xmax = w - this.r;
      this.ymax = h - this.r;
      this.vx = range(0, 2) + 8 * xpos - 5;
      return this.vy = 0.7 * this.r + range(-1, 1);
    }

    draw() {
      var ref;
      this.x += this.vx;
      this.y += this.vy;
      this.opacity += this.dop;
      if (this.opacity > 1) {
        this.opacity = 1;
        this.dop *= -1;
      }
      if (this.opacity < 0 || this.y > this.ymax) {
        this.replace();
      }
      if (!((0 < (ref = this.x) && ref < this.xmax))) {
        this.x = (this.x + this.xmax) % this.xmax;
      }
      return drawCircle(~~this.x, ~~this.y, this.r, `${this.rgb},${this.opacity})`);
    }

  };

  confetti = (function() {
    var j, ref, results;
    results = [];
    for (i = j = 1, ref = NUM_CONFETTI; (1 <= ref ? j <= ref : j >= ref); i = 1 <= ref ? ++j : --j) {
      results.push(new Confetti);
    }
    return results;
  })();

  window.step = function() {
    var c, j, len, results;
    requestAnimationFrame(step);
    context.clearRect(0, 0, w, h);
    results = [];
    for (j = 0, len = confetti.length; j < len; j++) {
      c = confetti[j];
      results.push(c.draw());
    }
    return results;
  };

  step();

}).call(this);


</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:400,700');
 
* { 
  margin: 0;
}

html {
  font-family: "Roboto";
}

#winner {
  color: white;
  font-size: 100px; 
  z-index: 3;
  visibility: hidden;
  opacity: 0; 
  position: fixed;
  transition: opacity 0.4s ease, visibility 0.4s ease;
  will-change: opacity;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
 
#winner.open {
  visibility: initial; 
  opacity: 1;
  transition: opacity 0.5s ease 1.5s, visibility 0.5s ease 1.5s;
}

#close {
  height: 25px;
  visibility: hidden;
  opacity: 0; 
  position: absolute;
  transition: opacity 0.5s ease, visibility 0.5s ease;
  will-change: opacity;
  top: 40px;
  right: 40px;
  z-index: 4;
  cursor: pointer;
}

#close.open {
  visibility: initial; 
  opacity: 1;
  transition: opacity 0.5s ease 2.5s, visibility 0.5s ease 2.5s;
}

#world {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.95);
  position: fixed;
  z-index: 2;
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.5s ease, visibility 0.5s ease;
  will-change: opacity, visibility;
}

#world.open {
  visibility: initial; 
  opacity: 1;
  transition: opacity 1.5s ease, visibility 0.5s ease;
}

.background {
  whidth: 100%;
  height: 100vh;
  min-height: 700px;
  background: linear-gradient(to bottom right, #FF8B57, #FB5656);
}

nav {
  width: 100%;
  height: 100px;
}

.navWrapper {
  width: 85%;
  margin: auto;
  padding-top: 38px;
}

.navWrapper a {
  text-decoration: none;
  color: white;
  font-size: 24px;
  font-weight: 900;
  letter-spacing: 1px;
}

header {
  width: 100%;
  height: calc(100% - 100px);
  display: grid;
  justify-content: center;
  align-items: center;
}

.namepicker {
  padding: 50px 35px 50px 35px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
  display: block;
  animation: fadeIn 0.75s forwards 0s ease;
}

.namepicker p {
  color: #585858;
  font-size: 24px;
  font-weight: 700;
  letter-spacing: 1px;
  margin-bottom: 15px;
}

.namepicker input {
  width: 420px;
  color: #898989;
  font-size: 20px;
  font-weight: normal;
  background-color: white;
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.08);
  border-radius: 5px;
  padding: 20px;
  border: 0;
  margin-bottom: 75px;
}

.namepicker input::placeholder {
  color: #D9D9D9;
}

.namepicker input:focus {
  outline: none;
}

.namepicker h2 {
  color: #6E6E6E;
  font-size: 48px;
  font-weight: medium;
  letter-spacing: 1px;
  text-align: center;
  margin-bottom: 55px;
}

.namepicker a {
  color: white;
  font-size: 24px;
  font-weight: 700;
  letter-spacing: 1px;
  text-decoration: none;
  padding: 21px 161px;
  background: linear-gradient(to right, #FF8757, #FC5F56);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
  border-radius: 1000px;
  display: block;
  margin: auto;
}

@keyframes fadeIn {
  0% {
    transform: scale(0.5);
    transform: skewY(25deg);
    opacity: 0;
    box-shadow: none;
  }
  100% {
    transform: scale(1);
    transform: skewY(0deg);
    opacity: 1;
    box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
  }
}  
</style>
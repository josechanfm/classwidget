<div class="jumbotron text-center">
  <div class="timer">
    <span class="minutes">00</span> : 
    <span class="seconds">00</span>
  </div>
  
  <div class="timer-buttons">
    <button class="btn btn-lg btn-success" data-btn="start">
      Start
    </button>
    <button class="btn btn-lg btn-danger" data-btn="stop">
      Stop
    </button>
    <button class="btn btn-link btn-block" data-btn="reset">
      Reset
     </button>
  </div>

</div>

<script type="text/javascript">
//grab all
const startButton = document.querySelector('[data-btn=start]');
const stopButton = document.querySelector('[data-btn=stop]');
const resetButton = document.querySelector('[data-btn=reset]');
const minutes = document.querySelector('.minutes');
const seconds = document.querySelector('.seconds');

let timerTime = 00;
let isRunning = false;
let interval;


//function
function startTimer() {
    if (isRunning) return;

    isRunning = true;
    interval = setInterval(incrementTimer, 1000);
}

function stopTimer() {
    if (!isRunning) return;

    isRunning = false;
    clearInterval(interval);
}

function resetTimer() {
    stopTimer();

    timerTime = 0;
    minutes.innerText = '00';
    seconds.innerText = '00';
}

function incrementTimer() {
    timerTime++;

    const numOfMinutes = Math.floor(timerTime / 60);
    const numOfSeconds = timerTime % 60;

    minutes.innerText = pad(numOfMinutes);
    seconds.innerText = pad(numOfSeconds);
}

function pad(number) {
    return (number < 10) ? '0' + number : number;
    // if (number < 10) {
    //     return '0' + number;
    // } else {
    //     return number;
    // }
}


//add event listeners
startButton.addEventListener('click', startTimer);
stopButton.addEventListener('click', stopTimer);
resetButton.addEventListener('click', resetTimer);
	
</script>

<style>
body, .jumbotron {
    padding: 30px;
}

.timer {
    font-size: 100px;
}	
</style>
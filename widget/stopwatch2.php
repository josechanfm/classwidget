<main>
	<time id="timer">0:00:00.00</time>
	<button id="toggle">start</button>
	<button id="clear">clear</button>
</main>

<script type="text/javascript">
(function timer() {
	'use strict';

	//declare
	var output = document.getElementById('timer');
	var toggle = document.getElementById('toggle');
	var clear = document.getElementById('clear');
	var running = false;
	var paused = false;
	var timer;
	
	// timer start time
	var then;
	// pause duration
	var delay;
	// pause start time
	var delayThen;

	
	// start timer
	var start = function() {
		delay = 0;
		running = true;
		then = Date.now();
		timer = setInterval(run,51);
		toggle.innerHTML = 'stop';
	};
	
	
	// parse time in ms for output
	var parseTime = function(elapsed) {
		// array of time multiples [hours, min, sec, decimal]
		var d = [3600000,60000,1000,10];
		var time = [];
		var i = 0;

		while (i < d.length) {
			var t = Math.floor(elapsed/d[i]);

			// remove parsed time for next iteration
			elapsed -= t*d[i];

			// add '0' prefix to m,s,d when needed
			t = (i > 0 && t < 10) ? '0' + t : t;
			time.push(t);
			i++;
		}
		
		return time;
	};
	
	
	// run
	var run = function() {
		// get output array and print
		var time = parseTime(Date.now()-then-delay);
		output.innerHTML = time[0] + ':' + time[1] + ':' + time[2] + '.' + time[3];
	};
	
	
	// stop
	var stop = function() {
		paused = true;
		delayThen = Date.now();
		toggle.innerHTML = 'resume';
		clear.dataset.state = 'visible';
		clearInterval(timer);

		// call one last time to print exact time
		run();
	};
	
	
	// resume
	var resume = function() {
		paused = false;
		delay += Date.now()-delayThen;
		timer = setInterval(run,51);
		toggle.innerHTML = 'stop';
		clear.dataset.state = '';
	};
	
	
	// clear
	var reset = function() {
		running = false;
		paused = false;
		toggle.innerHTML = 'start';
		output.innerHTML = '0:00:00.00';
		clear.dataset.state = '';
	};
	
	
	// evaluate and route
	var router = function() {
		if (!running) start();
		else if (paused) resume();
		else stop();
	};
	
	toggle.addEventListener('click',router);
	clear.addEventListener('click',reset);
	
})();
	
</script>

<style>
body {
	background-image: radial-gradient(at top, #999, #000)
}

main {
	height: 150px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
time {
	display: block;
	width: 310px;
	text-align: center;
	color: white;
	font-size: 4rem;
	font-weight: 900;
	text-align: center;
}

button {
	padding: .5em 1.25em;
	position: absolute;
	bottom: 0;
	/*color: white;*/
	border: 1px solid white;
	border-radius: .5em;
	text-transform: uppercase;
	font-size: 1.25rem;
}
	
#toggle {right: 0}
#clear {
	transition: all 300ms cubic-bezier(.4,.25,.3,1);
	left: 0;
	opacity: 0;
	pointer-events: none;
	opacity: 1;
	pointer-events: auto;
}	
[data-state='visible'] {
		opacity: 1;
		pointer-events: auto;
	}
}
	
}	
</style>
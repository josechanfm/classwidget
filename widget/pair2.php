<div id="wrapper">

  <h1>Random Name Generator</h1>
  <p>This name generator will take two words from the wordbank and combine them into 5 names.<br>Sometimes an &quot;s&quot; will be added to the 2nd word.</p>

  <form>
    <label>Wordbank</label>
    <textarea id="wordbank" cols="20" rows="30" placeholder="Type in one word per line."></textarea><br>
    <button type="button">Generate 5 Names</button>
  </form>

  <ul id="names"></ul>
</div>


<script>
var index,
    prevIndex,
    s,
    words;

$('button').click(function() {
  
  // Store all the words in an array.
  words = $('#wordbank').val().split('\n');
  
  if (words.length > 1) {
  
    // Remove all child nodes from the <ul>
    $('#names').empty();

    // Create name ideas by combining two random words
    for (var i = 0; i < 5; i++) {
      $('#names').append("<li>" +
                     randomName(words) +
                    "</li>");
    }
    
  } else {
    alert("You need at least 2 words for this to work.");
  }
  
});


function randomWord(wordbank) {
  // Avoid duplicate names
  while (prevIndex == index)
    index = Math.round(Math.random() * (wordbank.length - 1));
  
  prevIndex = index;
  return wordbank[index];
}

function randomName(wordbank) {
  // Sometimes an "s" will be added to the end of the name.
  s = Math.round(Math.random() * 1) ? "" : "s";
  return randomWord(wordbank) + " " + randomWord(wordbank) + s;
}  
</script>


<style>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: #222;
}

#wrapper {
  max-width: 80%;
  margin: 0 auto;
}

ul, form {float: left;}

h1, ul, label, p {
  font-family: 'Voltaire', sans-serif;
  color: white;
}

h1, p {
  text-align: center;
}

form {
  width: 20%;
}

textarea {
  width: 100%;
}

ul {
  list-style: none;
  width: 80%;
  margin: 0;
  padding: 0;
}

li {
  padding: 16px;
  margin: 15px;
  background: #444;
  color: white;
  border-radius: 10px;
  text-align: center;
  font-size: 1.8em;
}

</style>

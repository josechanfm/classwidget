<link href='' rel='stylesheet' type='text/css'>

<h1>Paircrush!</h1>

<p>Hello Class Management Team! <br/>
  Click the button below to generate your team pairings.</p>

<p><span id="pairButton" class="primary-btn">Generate Pairs!</span></p>

<div id="pairList"></div>

<p class="small">
  <a href="https://skillcrush.atlassian.net/wiki/spaces/CLASS/pages/67908195/" target="_blank">Click here to check out the Paircrush Guide</a>    
</p>


<script>
//skillcrush class team pairing

// Generate Pairs button
const pairButton = document.getElementById("pairButton");

//randomize arrays
//http://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
function shuffle(array) {
  var currentIndex = array.length,
    temporaryValue,
    randomIndex;
  // While there remain elements to shuffle...
  while (0 !== currentIndex) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
}

function generatePairs() {
  
  // team list
const teamMembers = [
"Stacey Baldini",
"Adda Birnir",
"Ann Cascarano",
"Emily Davis",
"Erin Denton",
"Libby Espeland",
"Hilary Fetter",
"Kayla Ford",
"Caro Griffin",
"Max Haack",
"Chelsea Jennings",
"Lizu Kabos",
"William King",
"Cristy Koebler",
"Lauren Lang",
"Valerie Mertsock",
"Scott Morris",
"Sharon Siegel",
"Kelli Smith",
"Sara Strahan",
"Brian Swanick",
"Maren Vernon",
"Aleia Walker",
"Cassandra Wilcox",
"Haele Wolfe",
"Kara Thayer"
];
  
  const shuffledTeamMembers = shuffle(teamMembers);
  const teamHalfLength = Math.ceil(teamMembers.length / 2);

  //split team into 2 arrays
  console.log(shuffledTeamMembers, shuffledTeamMembers.length);
  const group1 = shuffledTeamMembers.splice(0, teamHalfLength);
  console.log(group1, group1.length);
  const group2 = shuffledTeamMembers;

  // create pairs
  const pairs = group2.map((person, i) => {
    return `${person} is paired with ${group1[i]}!`;
  });

  // handle odd number
  if (group1[group2.length]) {
    console.log(group1[group2.length])
    let str = pairs[pairs.length - 1].slice(0, -1);
    str = str + ` and ${group1[group2.length]}!`;
    pairs.pop();
    pairs.push(str);
  }

  // create html elements for each pair
  const listItems = pairs.map(item => {
    const el = document.createElement("div");
    el.innerText = item;
    return el;
  });

  // clear the current list
  document.getElementById("pairList").innerText = "";

  const success = document.createElement("p");
  success.innerText = "Alright! Here are your pairs for this week!";
  document.getElementById("pairList").append(success);

  // append each pair element
  listItems.forEach(item => {
    document.getElementById("pairList").append(item);
  });
}

pairButton.addEventListener("click", generatePairs);

console.log(teamMembers.length);
  
</script>

<style>
*{
  font-family: 'Open Sans', sans-serif;
}

a{color:#F16059;}

.small{
  font-size:1em;
}

h1{
  color: #F16059;
  font-family: 'Montserrat', sans-serif;
  font-size: 33px;
  line-height: 1em;
  font-weight: bold;
  tex-transform: uppercase;
  text-align:center;
}

p{
  text-align:center;
  color: #3B3B3B;
  font-family: 'Open Sans', sans-serif;
  font-size: 21px;
}

#pairList{
  margin: 50px 0;
}

#pairList, #pairList span{
  list-style: none;
  text-indent: 0;
  text-align: center;
  line-height: 2.5em;
  color: #3B3B3B;
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
}

.primary-btn {
  display:inline-block;
  width: auto;
  height:35px;
  padding:15px 30px 5px 30px;
  background-color:#f16059;
  color:#ffffff;
  text-decoration:none;
  text-align: center;
  text-transform:uppercase;
  font-weight:bold;
  font-family: Montserrat, sans-serif;
  font-size:18px;
  display: inline-block;
}
.primary-btn:hover {
  background-color:#bb433d;
}  
</style>
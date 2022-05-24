<h1>Random Group Generator</h1>
<div class="wrap alt">
    <p class="toggle-wrap">Number of People per group <a class="choice" href="#choice"><strong>TOGGLE</strong><span class="switch"></span></a> Number of Groups</p>
    <p class="pergroup-wrap">Number of students per group: <input class="pergroup" type="integer" value="" /></p>
    <p class="numgroups-wrap">Number of groups: <input class="numgroups" type="integer" value="" /></p>
    <p><textarea name="students" id="students" cols="40" rows="15">Lovella
Harry
Bethel
Lettie
Shon
Alberto
Paola
Jim
Dagny
Altha
Shonda
Wesley</textarea></p>
    <button>Make Groups</button>
    <div class="groups"></div>
</div>
<p><small>This tool was made as a proof of concept for <a href="http://flipquiz.me">FlipQuiz</a>&trade;. Production version can now be seen <a href="http://flipquiz.me/grouper">here</a>.</small></p>



<script type="text/javascript">
$('button').on('click', function(e) {
    e.preventDefault();
    var namespergroup = parseInt($('.pergroup').val()),
        allnames = $('textarea').val().split('\n'),
        allnameslen = allnames.length;

    var numgroups = Math.ceil(allnameslen / namespergroup);
    
    if($('.numgroups').val()){
        numgroups = parseInt($('.numgroups').val());
        namespergroup = allnameslen / numgroups;
    }

    $('.groups').empty();

    for (i = 0; i < numgroups; i++) {
        $('.groups').append('<div class="group" id="group' + (i+1) + '"><h2>Group ' + (i+1) + '</h2></div>');
    }

    $('.group').each(function() {
        for (j = 0; j < namespergroup; j++) {
            var randname = Math.floor(Math.random() * allnames.length);
            if(allnames[randname]){
                $(this).append('<p>' + allnames[randname] + '</p>');
            }
            allnames.splice(randname, 1);
            console.log(allnames);
        }
    });
});

$('.toggle-wrap a').on('click', function(e){
    e.preventDefault();
    $('.wrap').toggleClass('alt');
    $('.pergroup-wrap, .numgroups-wrap').find('input').val('');
});    
</script>


<style>
*, *:before, *:after {
  -webkit-box-sizing: border-box; 
  -moz-box-sizing: border-box; 
  box-sizing: border-box;
}

body {
    font-family: sans-serif;
    font-size: 17px;
    padding: 1em;
}

.toggle-wrap {
    a {
        display: inline-block;
        background: #444;
        border-radius: 1000px;
        position: relative;
        width: 3em;
        height: 1.25em;
        vertical-align: middle;
        margin: 0 0.5em;
        
        strong {
            display: none;
        }
    }
}

.switch {
    position: absolute;
    top: 0.1em;
    left: 0.15em;
    height: 1em;
    width: 1.5em;
    background: #fff;
    border-radius: 1000px;
    transition: 0.3s;
    
    .alt & {
        left: calc(100% - 1.6em);
    }
}

.numgroups-wrap {
    display: none;
    
    .alt & {
        display: inherit;
    }
}

.alt .pergroup-wrap {
    display: none;
}

input, textarea, button {
    font-size: 1em;
    padding: 0.25em;
}

.groups {
    padding: 1em;
    background: #ddd;
    margin: 1em 0;
}

.group {
    display: inline-block;
    vertical-align: top;
    background: #fff;
    padding: 1em;
    margin: 0.25em;
    width: 18%;
    border-radius: 3px;
    box-shadow: 0 0 0.5em rgba(0,0,0,0.1);
    
    h2 {
        margin: 0;
    }
}    
</style>
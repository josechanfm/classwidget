<div class="rating">
    <span class="stars-container" score="5" id="223">
        <span id="star5" star-score="5" class="fa star"></span>
        <span id="star4" star-score="4" class="fa star"></span>
        <span id="star3" star-score="3" class="fa star"></span>
        <span id="star2" star-score="2" class="fa star"></span>
        <span id="star1" star-score="1" class="fa star"></span>
    </span>
    <a class="reviews">(40)</a>
</div>

<div class="rating">
    <span class="stars-container" score="0" id="221">
        <span id="star5" class="fa star"></span>
        <span id="star4" class="fa star"></span>
        <span id="star3" class="fa star"></span>
        <span id="star2" class="fa star"></span>
        <span id="star1" class="fa star"></span>
    </span>
    <a class="reviews">(40)</a>
</div>

<script>

var ratingList = $(".rating").find(".stars-container");
ratingList.each(function(){
    var id = "#" + $(this).attr("id");
    var score = $(this).attr("score");
    var intScore = Math.floor(score);
    
    $(id + " #star" + intScore).addClass("selected");
    
    $(id + ' .star').on('click', function () {
        $(id + ' .star').removeClass('selected');
    $(this).addClass('selected');
        var starScore = $(this).attr("star-score");
        rateSet(id, starScore);
  });
});

function rateSet(id, score){
    $("#rateType").val("set");
    $("#rateID").val(id);
    $("#rateScore").val(score);
    $("#rateSubmit").click();
}
    
</script>

<style>
    /* set all stars to 'empty star' */
    .stars-container {
        display: inline-block;
        vertical-align: top;
    }
    /* set all stars to 'empty star' */
    .stars-container .star {
        float: right;
        display: inline-block;
        padding: 2px;
        color: orange;
        cursor: pointer;
            font-size:30px;
    }
    .stars-container .star:before {
        content:"\f006";
        /* fontAwesome empty star code */
    }
    /* set hovered/selected star to 'filled star' */
    .star:hover:before, .star.selected:before {
        content:"\f005";
        /* fontAwesome filled star code */
    }
    /* set all stars after hovered/selected to'filled star' 
    ** it will appear that it selects all after due to positioning */
    .star:hover ~ .star:before, .star.selected ~ .star:before {
        content:"\f005";
        /* fontAwesome filled star code */
    }
    .reviews {
        vertical-align: top;
    }
    button {
        margin-top: 20px;
    }
</style>
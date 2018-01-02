var $img = new Array(7);
    for(var i = 0; i <7; i++){
        $img[i] = new Image();
        $img[i].src = (i+1)+".jpg";
    }
    var $box1 = $("#box1");
    var $box2 = $("#box2");
    var index = 1;
    setInterval(fn,2000);
    function fn() {
        index++;
        if(index>7){
            index = 1;
        }
        $box1.animate({opacity:0},700,function() {
        $box1.css({"background-image":"url(image/"+index+".jpg)",opacity:1});
        });
        $box2.css("background-image","url(image/"+index+".jpg)");
    }
var slideImg = document.getElementById("slideImg");

    var images = new Array(
        "images/index/mergle.jpeg",
        "images/index/audirs6.jpeg",
        "images/index/classG.jpeg",
        "images/index/rangesvr.jpeg",
        
    );

    var len = images.length;
    var i=0;

    function slider(){
        if(i > len-1){
            i = 0;
        }

        slideImg.src = images[i];
        i++;
        setTimeout('slider()', 3000);
    }
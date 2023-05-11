window.onscroll = function(e){
    var pageTop = window.scrollY;
    var pageBottom = pageTop + window.innerHeight;
    var tags = document.getElementsByClassName('animate');

    if(window.scrollY >= 50){
        document.getElementById('navbar').classList.add("navbar-colored");
    }
    else{
        document.getElementById('navbar').classList.remove("navbar-colored");
    }

    for(var i = 0; i < tags.length; i++){
        var tag = tags[i];
        if(tag.offsetTop < pageBottom - 50){
            tag.classList.add('fadeUpIn');
        }
    }
};

window.onload = function(){
    var tag = document.getElementsByClassName('animate2')[0];

    tag.classList.add('fadeIn');
}
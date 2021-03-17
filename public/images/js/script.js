function init() {
    window.addEventListener('scroll', function(e) {
        var distanceY = window.pageYOffset || document.documentElement.scrollTop;
        var shrinkOn = 300;
        if (distanceY > shrinkOn) {
            var element = document.getElementById("header");
            element.classList.add("smaller");
        } else {
            var element = document.getElementById("header");
            element.classList.remove("smaller");
        }
    });
}

window.onload = init();
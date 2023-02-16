window.onload = function() {
    const ham = document.querySelector("#js_ham"); 
    const nav = document.querySelector('#nav'); 
    ham.addEventListener('click', function () { 
        ham.classList.toggle('active'); 
        nav.classList.toggle('active'); 
    });

    slideshow_timer();
}

var pics_src = new Array("images/tennai.jpg","images/kittin.jpg","images/kanban.jpg");

var num = -1;

function slideshow_timer(){
    if (num === 2){
        num = 0;
    } 
    else {
        num++;
    }

    document.getElementById("pic").src=pics_src[num];
    setTimeout("slideshow_timer()",3000);

    console.log(num);
};








var arrImg = [
    "../img/img_modal/img1.jpg",
    "../img/img_modal/img2.jpg",
    "../img/img_modal/img3.jpg",
    "../img/img_modal/img4.jpg",
    "../img/img_modal/img5.jpg"
];

var index = 0;

function prev() {
    index--;
    if (index < 0)index = arrImg.length -1;
    var show = document.getElementById("show");
    show.src = arrImg[index];
}
function next() {
    index++;
    if (index >= arrImg.length)index=0;
    var show = document.getElementById("show");
    show.src = arrImg[index];
}
         
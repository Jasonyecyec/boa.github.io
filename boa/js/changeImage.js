"use strict";

const subImage = document.querySelectorAll(".sub-image");
let mainImage = document.querySelector(".feature1");

const original = mainImage.src;

function removeBorder() {
    for (let image of subImage){
        image.parentElement.classList.remove("changeBorderColor");
    }
              
}



for (let image of subImage) {

    image.addEventListener("mouseover", function (e) {
        mainImage.src = e.currentTarget.src;
        removeBorder();
        e.currentTarget.parentElement.classList.add("changeBorderColor");
      

    });
}



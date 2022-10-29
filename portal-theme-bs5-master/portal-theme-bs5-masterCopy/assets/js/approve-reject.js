let image = document.querySelectorAll(".click-img");
let imageCont = document.querySelector(".image-cont");
let bigImage = document.querySelector(".big-image");

image.forEach(function (el, i) {
  let arr = el.getAttribute("src");

  let splitArr = arr.split("upload/");

  image[i].addEventListener("click", function (e) {
    // bigImage.style.display = "block";
    if (bigImage.style.display == "block") {
      bigImage.style.display = "none";
    } else {
      bigImage.style.display = "block";
    }
    imageCont.innerHTML = "";
    let g = e.target.getAttribute("src");
    let imgStr = `<img src=${g}>`;
    imageCont.insertAdjacentHTML("afterbegin", imgStr);
  });

  // image.addEventListener("click", function(e){
  // 	console.log(e.target);
  // })
});

let textArea = document.querySelector(".textarea-comment");
let actualComment = document.querySelector(".actual-comment");
let fff = document.querySelector(".fff");

textArea.addEventListener("focus", function () {
  actualComment.style.height = `${131}px`;
  actualComment.style.transitionProperty = "height";

  //   document.querySelector("body").addEventListener("click", function(){
  // 	actualComment.style.height = `${54}px`;
  //   actualComment.style.transitionProperty = "height";
  // })
});

textArea.addEventListener("keyup", function () {
  document.querySelector(".save-button").style.backgroundColor = "blue";
  document.querySelector(".save-button").style.color = "white";
  document.querySelector(".save-button").disabled = false;

  if (textArea.value == "") {
    document.querySelector(".save-button").style.backgroundColor = "#edebeb";
    document.querySelector(".save-button").style.color = "#959494";
    document.querySelector(".save-button").disabled = true;
  }
});

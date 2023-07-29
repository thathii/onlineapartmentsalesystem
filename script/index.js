function loadData(name) {
  if (name == "bttn1") {
    document.getElementById("image1").src = "./assets/park.jpg";
  } else if (name == "bttn2") {
    document.getElementById("image1").src = "./assets/gym.jpg";
  } else if (name == "bttn3") {
    document.getElementById("image1").src = "./assets/swim.jpg";
  } else if (name == "bttn4") {
    document.getElementById("image1").src = "./assets/play.jpg";
  } else if (name == "bttn5") {
    document.getElementById("image1").src = "./assets/garden.jpg";
  } else {
    alert("Invalid");
  }
}

function scrollToTop(){
  window.scrollTo(0,0);
}

// (A) SHOW & HIDE SPINNER
function show_spinner() {
  document.getElementById("spinner").classList.add("show");
}
function hide_spinner() {
  document.getElementById("spinner").classList.remove("show");
}

// (B) AJAX DEMO - USE HTTP:// NOT FILE://
function demoAJAX() {
  show_spinner(); // BLOCK PAGE WHILE LOADING
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "page.html");
  xhr.onload = function () {
    document.getElementById("container").innerHTML = this.response;
    hide_spinner(); // UNBLOCK PAGE
  };
  xhr.send();
}

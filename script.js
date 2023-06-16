setTimeout(() => {
  document.getElementById("run").style.display = "none";
}, 1500);

const img = document.getElementById("welcome");
img.hidden = true;
setTimeout(() => {
  img.hidden = false;
}, 2500);

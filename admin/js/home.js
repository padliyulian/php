var keyword = document.querySelector("#keyword");
var table = document.querySelector("#ip-container");

keyword.addEventListener("keyup", function () {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      table.innerHTML = xhr.responseText;
    }
  }
  xhr.open("GET", "./ajax/search.php?keyword=" + keyword.value, true);
  xhr.send();
});

document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);
});
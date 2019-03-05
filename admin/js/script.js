var keyword = document.querySelector("#keyword");
var table = document.querySelector("#julian-table");

keyword.addEventListener("keyup", function () {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      table.innerHTML = xhr.responseText;
    }
  }
  xhr.open("GET", "./ajax/students.php?keyword=" + keyword.value, true);
  xhr.send();
});
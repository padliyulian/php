// document.querySelector("#mvc-add-btn").addEventListener("click", () => {
//   document.querySelector("#exampleModalLabel").innerHTML = "Add Employee"
//   document.querySelector(".modal-footer button[type=submit]").innerHTML = "Add"
// })

// document.querySelectorAll(".mvc-edit-btn").forEach(el => {
//   el.addEventListener("click", (ev) => {
//     document.querySelector("#exampleModalLabel").innerHTML = "Edit Employee"
//     document.querySelector(".modal-footer button[type=submit]").innerHTML = "Update"


//     const id = ev.target.getAttribute("data-id")
//     $.ajax({
//       url: "http://localhost/mvc/public/employee/edit",
//       data: { id: id },
//       method: "post",
//       success: function(data){
//         console.log(data)
//       }
//     })
//   })
// })

$("#mvc-add-btn").on("click", function() {
  $("#exampleModalLabel").html("Add Employee")
  $(".modal-footer button[type=submit]").html("Add")
  $("#id").val("")
  $("#name").val("")
  $("#position").val("")
  $("#division").val("")
})

$(".mvc-edit-btn").on("click", function() {
  $("#exampleModalLabel").html("Edit Employee")
  $(".modal-footer button[type=submit]").html("Update")
  $(".modal-body form").attr("action", "http://localhost/mvc/public/employee/update")

  const id = $(this).data("id")
  $.ajax({
    url: "http://localhost/mvc/public/employee/edit",
    data: { id : id },
    method: "post",
    dataType: "json",
    success: function(data){
      $("#id").val(data.id)
      $("#name").val(data.name)
      $("#position").val(data.position)
      $("#division").val(data.division)
    }
  })
})
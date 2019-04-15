$("#search").on("click", function(){
  searchMovie()
})

$("#keyword").on("keyup", function(ev){
  ev.keyCode === 13 ? searchMovie() : ""
})

$("#movie-list").on("click", ".card-link", function(){
  $.ajax({
    url: "http://www.omdbapi.com",
    type: "get",
    dataType: "json",
    data: {
      "apikey" : "1a7912c3",
      "i": $(this).data("id")
    },
    success: function(res) {
      if(res.Response == "True"){
        $(".modal-body").html(`
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <img src="${res.Poster}" class="img-fluid"/>
              </div>
              <div class="col-md-8">
                <ul class="list-group">
                  <li class="list-group-item">
                    <h3>${res.Title}</h3>
                  </li>
                  <li class="list-group-item">
                    Release : ${res.Released}
                  </li>
                  <li class="list-group-item">
                    Genre : ${res.Genre}
                  </li>
                  <li class="list-group-item">
                    Director : ${res.Director}
                  </li>
                  <li class="list-group-item">
                    Actors : ${res.Actors}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        `)
      }
    }
  })
})

function searchMovie() {
  $("#movie-list").html("")
  $.ajax({
    url: "http://www.omdbapi.com",
    type: "get",
    dataType: "json",
    data: {
      "apikey": "1a7912c3",
      "s": $("#keyword").val()
    },
    success: function(res) {
      if(res.Response == "True") {
        let movies = res.Search
        $.each(movies, function(i, data){
          $("#movie-list").append(`    
            <div class="col-md-3">
              <div class="card mb-3">
                <img src="${data.Poster}" class="card-img-top"/>
                <div class="card-body">
                  <h5 class="card-title">${data.Title}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
                  <a href="#" class="card-link" data-toggle="modal" data-target="#exampleModal" data-id=${data.imdbID}>More</a>
                </div>
              </div>
            </div>  
          `)
        })
        $("#keyword").val("")
      } else {
        $("#movie-list").html(`
          <div class="col-md-8">
            <h4 class="text-center">
              ${res.Error}
            </h4>
          </div>    
        `)
      }
    }
  })
}
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">

    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{url('/about')}}">About</a>
        <a class="nav-item nav-link" href="{{url('/employee')}}">Employee</a>

        <div class="dropdown">
        <a class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Position
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($positions as $position)
                <a class="dropdown-item" href="/position/{{$position->id}}">{{$position->position}}</a>
            @endforeach
        </div>
        </div>
      </div>
    </div>
    
  </div>
</nav>
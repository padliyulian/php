<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}">App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{url('/about')}}">About</a>
                <div class="dropdown nav-item nav-link" style="cursor: pointer">
                    <a class="dropdown-toggle" id="manages-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="manages-button">
                        <a class="dropdown-item" href="{{url('/pages/client')}}">Clients</a>
                        <a class="dropdown-item" href="{{url('/employee')}}">Employees</a>
                        <a class="dropdown-item" href="{{url('/pages/meeting')}}">Meetings</a>
                        <a class="dropdown-item" href="{{url('/position')}}">Positions</a>
                        <a class="dropdown-item" href="{{url('/project')}}">Projects</a>
                    </div>
                </div>
                <a class="nav-item nav-link" href="{{url('/exim')}}">Export/Import</a>
            </div>
        </div>
    
    </div>
</nav>
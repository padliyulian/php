@if (session('status'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
@endif

<p>Name : <br>{{ $meeting->name }}</p>
<p>Description : <br>{{ $meeting->description }}</p>
<p>Time : <br>{{ $meeting->time }}</p>
<p>Location : <br>{{ $meeting->location }}</p>
<p>Member : <br>
    @foreach ($meeting->employees as $employee)
        {{ $employee->name }},
    @endforeach
</p>
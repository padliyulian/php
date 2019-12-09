{!! Form::model($meeting, [
        'url' => $meeting->exists ? '/api/v1/meeting/'.$meeting->id : '/api/v1/meeting',
        'method' => $meeting->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Description</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
    <div class="form-group">
        <label for="time">Date Time</label>
        @if($meeting->exists)
            <?php
                $time = $meeting->time;
                $time = str_replace(' ','T',$time);
                $time = substr($time,0,-3);
            ?>
            <input value="{{$time}}" type="datetime-local" name="time" class="form-control">
        @else
            <?php
                $time = date("Y-m-d H:i:s");
                $time = str_replace(' ','T',$time);
                $time = substr($time,0,-3);
            ?>
            <input value="{{$time}}" type="datetime-local" name="time" class="form-control">
        @endif
    </div>
    <div class="form-group">
        <label for="location" class="control-label">Location</label>
        {!! Form::text('location', null, ['class' => 'form-control', 'id' => 'location']) !!}
    </div>
    <div class="form-group">
        <label for="s_meeting_team">Select Team</label>
        <select multiple class="form-control" name="s_meeting_team" id="s_meeting_team">
            @if(isset($meeting))
                <?php
                    $ids = array();
                    foreach ($meeting->employees as $employee) {
                        array_push($ids, $employee->id);
                    }
                ?>
                @foreach ($employees as $employee)
                    @if (in_array($employee->id, $ids))
                        <option value="{{$employee->id}}" disabled>{{$employee->name}} - {{$employee->position->position}}</option>
                    @else
                        <option value="{{$employee->id}}">{{$employee->name}} - {{$employee->position->position}}</option>
                    @endif
                @endforeach
            @else
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}} - {{$employee->position->position}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Teams</label>
        <ol class="js-meeting__teams">
            @if(isset($meeting))
                <?php
                    $id = array();
                    foreach ($meeting->employees as $employee) {
                        echo '<li><input type="hidden" value="'.$employee->id.'">'.$employee->name.' - '.$employee->position->position.' - <span class="text-danger js-meeting__team-delete" style="cursor: pointer;">delete</span></li>';
                        array_push($id, $employee->id);
                    }
                    $str = implode (",", $id);
                ?>
            @endif
        </ol>
        <input type="text" name="meeting_teams_id" class="form-control js-meeting__teams_id" value="{{$str ?? $str}}" readonly>
    </div>
{!! Form::close() !!} 
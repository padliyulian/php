<div class="form-group">
    <label for="project">Project</label>
    <input value="{{old('project') ?? $project->project}}" name="project" type="text" class="form-control @error('project') is-invalid @enderror" id="project" placeholder="project name">
    @error('project')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror"  id="description" rows="5" placeholder="project description">{{old('description') ?? $project->description}}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="team">Select Team</label>
    <select multiple class="form-control @error('teams_id') is-invalid @enderror" name="team" id="team">
        @if(isset($project))
            <?php
                $ids = array();
                foreach ($project->employees as $employee) {
                    array_push($ids, $employee->id);
                }
            ?>
            @foreach ($employees as $employee)
                @if (in_array($employee->id, $ids))
                    <option class="js-team" value="{{$employee->id}}" disabled>{{$employee->name}} - {{$employee->position->position}}</option>
                @else
                    <option class="js-team" value="{{$employee->id}}">{{$employee->name}} - {{$employee->position->position}}</option>
                @endif
            @endforeach
        @else
            @foreach ($employees as $employee)
                <option class="js-team" value="{{$employee->id}}">{{$employee->name}} - {{$employee->position->position}}</option>
            @endforeach
        @endif
    </select>
    @error('teams_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="teams">Team</label>
    <ol class="js-teams">
        @if(isset($project))
            <?php
                $id = array();
                foreach ($project->employees as $employee) {
                    echo '<li><input type="hidden" value="'.$employee->id.'">'.$employee->name.' - '.$employee->position->position.' - <span class="text-danger js-team-delete" style="cursor: pointer;">delete</span></li>';
                    array_push($id, $employee->id);
                }
                $str = implode (",", $id);
            ?>
        @endif
    </ol>
    <input type="hidden" name="teams_id" class="js-teams_id" value="{{$str ?? $str}}">
</div>
<button type="submit" class="btn btn-info">{{$btn_title}}</button>

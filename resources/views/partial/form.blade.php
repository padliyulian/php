<div class="form-group">
    <label for="nik">NIK</label>
    <input value="{{old('nik') ?? $employee->nik}}" name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK">
    @error('nik')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input value="{{old('name') ?? $employee->name}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="sex">Sex</label>
    <input value="{{ old('sex') ?? $employee->sex }}" name="sex" type="text" class="form-control @error('sex') is-invalid @enderror" id="sex" placeholder="Sex">
    @error('sex')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="position_id">Position</label>
    <select name="position_id" id="position_id" class="form-control @error('position_id') is-invalid @enderror">
        <option disabled selected>--select position</option>

        @foreach ($positions as $position)
            <option {{$employee->position_id === $position->id ? 'selected':''}} value="{{$position->id}}">{{$position->position}}</option>
        @endforeach
        
    </select>
    @error('position_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-info">{{$btn_title}}</button>
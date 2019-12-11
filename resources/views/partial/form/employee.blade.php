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
    <input type="hidden" class="form-control @error('sex') is-invalid @enderror">
    <label>Sex</label><br>
    <div class="form-check form-check-inline">
        <input
            class="form-check-input @error('sex') is-invalid @enderror"
            type="radio"
            name="sex"
            id="male"
            value="Male"
            @if(old('sex') === 'Male' || $employee->sex === 'Male')
                checked
            @endif
        >
        <label class="form-check-label" for="male">
            Male
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input
            class="form-check-input @error('sex') is-invalid @enderror"
            type="radio"
            name="sex"
            id="male"
            value="Female"
            @if(old('sex') === 'Female' || $employee->sex === 'Female')
                checked
            @endif
        >
        <label class="form-check-label" for="female">
            Female
        </label>
    </div>
    @error('sex')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="position_id">Position</label>
    <select name="position_id" id="position_id" class="form-control @error('position_id') is-invalid @enderror">
        <option disabled selected>--select position--</option>
        @foreach ($positions as $position)
            <option {{old('position_id') == $position->id ? 'selected':'' || $employee->position_id == $position->id ? 'selected':''}} value="{{$position->id}}">{{$position->position}}</option>
        @endforeach
    </select>
    @error('position_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input value="{{old('email') ?? $employee->email}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your email">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="photo">Photo</label>
    <input value="{{old('photo') ?? $employee->photo}}" name="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
    @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-info">{{$btn_title}}</button>
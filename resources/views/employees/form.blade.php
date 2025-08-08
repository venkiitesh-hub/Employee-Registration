
<div class="mb-3">
    <label>Firstname</label>
    <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $employee->firstname ?? '') }}">
</div>
<div class="mb-3">
    <label>Lastname</label>
    <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $employee->lastname ?? '') }}">
</div>
<div class="mb-3">
    <label>Date of Birth</label>
    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $employee->date_of_birth ?? '') }}">
</div>
<div class="mb-3">
    <label>Education Qualification</label>
    <input type="text" name="education_qualification" class="form-control" value="{{ old('education_qualification', $employee->education_qualification ?? '') }}">
</div>
<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $employee->address ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}">
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}">
</div>
<div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    @if(!empty($employee->photo))
        <img src="{{ asset('storage/' . $employee->photo) }}" width="80">
    @endif
</div>
<div class="mb-3">
    <label>Resume</label>
    <input type="file" name="resume" class="form-control">
    @if(!empty($employee->resume))
        <a href="{{ asset('storage/' . $employee->resume) }}" target="_blank">View Current Resume</a>
    @endif
</div>
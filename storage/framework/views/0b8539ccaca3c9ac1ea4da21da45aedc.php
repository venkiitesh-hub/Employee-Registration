
<div class="mb-3">
    <label>Firstname</label>
    <input type="text" name="firstname" class="form-control" value="<?php echo e(old('firstname', $employee->firstname ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Lastname</label>
    <input type="text" name="lastname" class="form-control" value="<?php echo e(old('lastname', $employee->lastname ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Date of Birth</label>
    <input type="date" name="date_of_birth" class="form-control" value="<?php echo e(old('date_of_birth', $employee->date_of_birth ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Education Qualification</label>
    <input type="text" name="education_qualification" class="form-control" value="<?php echo e(old('education_qualification', $employee->education_qualification ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control"><?php echo e(old('address', $employee->address ?? '')); ?></textarea>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $employee->email ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $employee->phone ?? '')); ?>">
</div>
<div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    <?php if(!empty($employee->photo)): ?>
        <img src="<?php echo e(asset('storage/' . $employee->photo)); ?>" width="80">
    <?php endif; ?>
</div>
<div class="mb-3">
    <label>Resume</label>
    <input type="file" name="resume" class="form-control">
    <?php if(!empty($employee->resume)): ?>
        <a href="<?php echo e(asset('storage/' . $employee->resume)); ?>" target="_blank">View Current Resume</a>
    <?php endif; ?>
</div><?php /**PATH D:\notes\htdocs\employee-registration\resources\views/employees/form.blade.php ENDPATH**/ ?>
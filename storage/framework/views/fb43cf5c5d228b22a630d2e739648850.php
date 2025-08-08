
<?php $__env->startSection('content'); ?>

<style>
    .form-box {
        max-width: 700px;
        margin: 0 auto;
        padding: 40px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: #fff;
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="form-box">
        <h2 class="text-center mb-4">Add Employee</h2>
        <form action="<?php echo e(route('employees.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('employees.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\notes\htdocs\employee-registration\resources\views/employees/create.blade.php ENDPATH**/ ?>
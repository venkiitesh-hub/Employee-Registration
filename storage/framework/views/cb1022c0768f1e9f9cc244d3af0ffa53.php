

<?php $__env->startSection('content'); ?>

<style>
    .listcss {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 40px;
        background-color: #fff;
        border-radius: 8px;
    }
    .thumb-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }
    .sort-link {
        color: white;
        text-decoration: underline;
    }
</style>

<div class="container py-5"> <!-- Equal top & bottom padding -->
    <div class="listcss">

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Employee List</h2>
            <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-success">Add Employee</a>
        </div>

        <!-- Filter & Search -->
        <form method="GET" class="mb-4">
            <div class="row row-cols-1 row-cols-md-5 g-2">
                <div class="col">
                    <input type="text" name="firstname" class="form-control form-control-sm" placeholder="Firstname" value="<?php echo e(request('firstname')); ?>">
                </div>
                <div class="col">
                    <input type="text" name="lastname" class="form-control form-control-sm" placeholder="Lastname" value="<?php echo e(request('lastname')); ?>">
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" value="<?php echo e(request('email')); ?>">
                </div>
                <div class="col">
                    <input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone" value="<?php echo e(request('phone')); ?>">
                </div>
                <div class="col d-flex">
                    <button type="submit" class="btn btn-primary btn-sm me-2">Search</button>
                    <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
                </div>
            </div>
        </form>

        <!-- Success Alert -->
        <?php if(session('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Employee Table -->
        <table class="table table-bordered text-center table-sm">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>
                        <a href="<?php echo e(route('employees.index', ['sort_by' => 'firstname', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page']))); ?>" class="sort-link">
                            Firstname <?php if(request('sort_by') === 'firstname'): ?> (<?php echo e(request('order')); ?>) <?php endif; ?>
                        </a>
                    </th>
                    <th>
                        <a href="<?php echo e(route('employees.index', ['sort_by' => 'lastname', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page']))); ?>" class="sort-link">
                            Lastname <?php if(request('sort_by') === 'lastname'): ?> (<?php echo e(request('order')); ?>) <?php endif; ?>
                        </a>
                    </th>
                    <th>
                        <a href="<?php echo e(route('employees.index', ['sort_by' => 'email', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page']))); ?>" class="sort-link">
                            Email <?php if(request('sort_by') === 'email'): ?> (<?php echo e(request('order')); ?>) <?php endif; ?>
                        </a>
                    </th>
                    <th>
                        <a href="<?php echo e(route('employees.index', ['sort_by' => 'phone', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page']))); ?>" class="sort-link">
                            Phone <?php if(request('sort_by') === 'phone'): ?> (<?php echo e(request('order')); ?>) <?php endif; ?>
                        </a>
                    </th>
                    <th>Photo</th>
                    <th>Resume</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php $i = ($employees->currentPage() - 1) * $employees->perPage() + 1; ?>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($employee->firstname); ?></td>
                        <td><?php echo e($employee->lastname); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->phone); ?></td>
                        <td>
                            <?php if($employee->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $employee->photo)); ?>" class="thumb-img" alt="Photo">
                            <?php else: ?>
                                <span class="text-muted">N/A</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($employee->resume): ?>
                                <a href="<?php echo e(asset('storage/' . $employee->resume)); ?>" target="_blank" class="btn btn-sm btn-outline-info">View</a>
                            <?php else: ?>
                                <span class="text-muted">N/A</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('employees.show', $employee)); ?>" class="btn btn-sm btn-primary">View</a>
                            <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('employees.destroy', $employee)); ?>" method="POST" style="display:inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8">No employees found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            <?php echo e($employees->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\notes\htdocs\employee-registration\resources\views/employees/index.blade.php ENDPATH**/ ?>
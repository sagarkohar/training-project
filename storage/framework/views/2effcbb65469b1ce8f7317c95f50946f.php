

<?php $__env->startSection("content"); ?>

<div class="card-box p-3 shadow mt-5">

    <form action="<?php echo e(url('addAttendance')); ?>" method="POST" id="addAttendanceForm">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-4">
                <label for="employee">Employee *</label>
                <select class="form-control w-100" name="employee" id="employee" required>
                    <option value="" disabled selected>Select Employee</option>
                    <option value="Sagar" <?php echo e(old('employee') == 'Sagar' ? 'selected' : ''); ?>>Sagar</option>
                    <option value="Suraj" <?php echo e(old('employee') == 'Suraj' ? 'selected' : ''); ?>>Suraj</option>
                    <option value="Sunny" <?php echo e(old('employee') == 'Sunny' ? 'selected' : ''); ?>>Sunny</option>
                    <option value="Ankit" <?php echo e(old('employee') == 'Ankit' ? 'selected' : ''); ?>>Ankit</option>
                    <option value="Ashish" <?php echo e(old('employee') == 'Ashish' ? 'selected' : ''); ?>>Ashish</option>
                </select>
                <?php $__errorArgs = ['employee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-4">
                <label for="department">Department *</label>
                <select class="form-control w-100" name="department" id="department" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="Editor" <?php echo e(old('department') == 'Editor' ? 'selected' : ''); ?>>Editor</option>
                    <option value="Engineer" <?php echo e(old('department') == 'Engineer' ? 'selected' : ''); ?>>Engineer</option>
                    <option value="Plumber" <?php echo e(old('department') == 'Plumber' ? 'selected' : ''); ?>>Plumber</option>
                    <option value="Electrician" <?php echo e(old('department') == 'Electrician' ? 'selected' : ''); ?>>Electrician</option>
                </select>
                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-4">
                <label for="designation">Designation *</label>
                <select class="form-control w-100" name="designation" id="designation" required>
                    <option value="" disabled selected>Select Designation</option>
                    <option value="Designation1" <?php echo e(old('designation') == 'Designation1' ? 'selected' : ''); ?>>Designation1</option>
                    <option value="Designation2" <?php echo e(old('designation') == 'Designation2' ? 'selected' : ''); ?>>Designation2</option>
                    <option value="Designation3" <?php echo e(old('designation') == 'Designation3' ? 'selected' : ''); ?>>Designation3</option>
                    <option value="Designation4" <?php echo e(old('designation') == 'Designation4' ? 'selected' : ''); ?>>Designation4</option>
                </select>
                <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label for="date">Date *</label>
                <input type="date" class="form-control" name="date" id="date" value="<?php echo e(old('date')); ?>" required>
                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-4">
                <label for="in-time">In-Time *</label>
                <input type="time" class="form-control" name="in-time" id="in-time" value="<?php echo e(old('in-time')); ?>" required>
                <?php $__errorArgs = ['in-time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-4">
                <label for="out-time">Out-Time *</label>
                <input type="time" class="form-control" name="out-time" id="out-time" value="<?php echo e(old('out-time')); ?>" required>
                <?php $__errorArgs = ['out-time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="mt-4 px-5">
            <button type="button" class="btn btn-primary" onclick="addAttendance()">Save</button>
            <a href="/attendance-home" class="btn btn-danger">Cancel</a>
        </div>
    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("masterLayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\firstProject\resources\views/attendace/add_attendace.blade.php ENDPATH**/ ?>
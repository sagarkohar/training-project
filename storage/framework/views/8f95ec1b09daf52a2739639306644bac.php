<div class="row box box-shadow border-2" id="de-module<?php echo e($module_id); ?>-material<?php echo e($material_id); ?>-type">

    <div class="row">
        <div class="col-8">
            <h3>Material<?php echo e($material_id); ?></h3>

        </div>
        <div class="col-4">

            <div class="btn btn-danger removeMaterial" data-module-id="module<?php echo e($module_id); ?>-material<?php echo e($material_id); ?>-type">
                Remove
            </div>

        </div>
    </div>

    <div class="col-6">
        <select name="materialtype" id="module<?php echo e($module_id); ?>-material<?php echo e($material_id); ?>-type" onchange="materialType(<?php echo e($module_id); ?>,<?php echo e($material_id); ?>)">
            <option value="file">File</option>
            <option value="link">Link</option>
        </select>
    </div>
    <div class="col-6 my-5">
        <input type="file" name="module[<?php echo e($module_id); ?>][file][]" id="module<?php echo e($module_id); ?>-material<?php echo e($material_id); ?>-file">
        <input type="text" style="display:none" placeholder="Enter the Link" name="module[<?php echo e($module_id); ?>][link][]" id="module<?php echo e($module_id); ?>-material<?php echo e($material_id); ?>-link">


    </div>
</div>
<hr>
<?php /**PATH C:\xampp\htdocs\firstProject\resources\views/material.blade.php ENDPATH**/ ?>
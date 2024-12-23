<div class="card shadow-sm border-2 p-3 mb-5 bg-white rounded" id="module-<?php echo e($module_id); ?>">
    <div class="row">
        <div class="row">
            <div class="col-8">
                <h3>Add Modal<?php echo e($module_id); ?></h3>

            </div>
            <div class="col-4">

                <button class="remove-module btn btn-danger" data-module-id="<?php echo e($module_id); ?>">Remove</button>
            </div>
        </div>

        <div class="row">



            <div class="col-4">
                <label for="Title"> Title</label><br>
                <input type="text" name="module[<?php echo e($module_id); ?>][title]" id="title">
            </div>
            <div class="col-4">
                <label for="status">Status</label><br>
                <select name="module[<?php echo e($module_id); ?>][status]" id="status">

                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="col-4">
                <label for="status">Is Testable</label><br>
                <select name="module[<?php echo e($module_id); ?>][isTestable]" id="mySelect" onchange="handleSelectChange(<?php echo e($module_id); ?>)">

                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <div class="mt-5">
            <label for="description">Description</label><br>
            <textarea name="module[<?php echo e($module_id); ?>][description]" id="description" cols="80" rows="10"></textarea>

        </div>
        <hr>

        <div data-module-id=" material-<?php echo e($module_id); ?>" class="material-<?php echo e($module_id); ?>"></div>

        <button type="button" class="btn btn-outline-primary w-25 add-material" data-module-id="<?php echo e($module_id); ?>"> + Add Material</button>

        <hr>



        <div class="test" id="test<?php echo e($module_id); ?>">
            <h5>Course Test</h5>

            <div class="row">


                <div class="col-6">

                    <label for="test">Test Title</label><br>

                    <input type="text" class="w-50" name="module[<?php echo e($module_id); ?>][test-title]" id="test">

                </div>

                <div class="col-6">
                    <label for="test">Duration</label><br>
                    <input type="number" class="w-50" name="module[<?php echo e($module_id); ?>][test-duration]" id="test">


                </div>
            </div>




            <label for="instruction">Instructions:</label>
            <textarea class="w-100" name="module[<?php echo e($module_id); ?>][instruction]" id="instruction" cols="30" rows="8"></textarea>

            <div class="questions box questionContainer-<?php echo e($module_id); ?>" id=""></div>
            <button type="button" class="btn btn-outline-primary w-25 my-3 addQuestion" data-module-id="<?php echo e($module_id); ?>"> + Add Question</button></a>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\firstProject\resources\views/addModule.blade.php ENDPATH**/ ?>
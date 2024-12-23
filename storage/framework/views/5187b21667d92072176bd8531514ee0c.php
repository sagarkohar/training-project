<div class="border-2" id="qns-module-<?php echo e($module_id); ?>question-<?php echo e($question_no); ?>">

    <div class="row mt-3">
        <div class="col-8">
            <h5>Question<?php echo e($question_no); ?></h5>


            <input type="text" name="module[<?php echo e($module_id); ?>][question][]" class="w-100" placeholder="Enter your question" required>


        </div>
        <div class="col-4">

            <label for="status">Status</label><br>
            <select name="module[<?php echo e($module_id); ?>][question-status][]" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

        </div>
    </div>
    <div class="row my-3">
        <div class="col-6">
            <input type="checkbox" value="1" name="module[<?php echo e($module_id); ?>][answer][]" id="qns${q}Option1">

            <input type="text" name="module[<?php echo e($module_id); ?>][option1][]" placeholder="Option 1" class="w-75" required>

        </div>
        <div class="col-6">
            <input type="checkbox" value="2" name="module[<?php echo e($module_id); ?>][answer][]" id="qns${q}Option2">


            <input type="text" name="module[<?php echo e($module_id); ?>][option2][]" placeholder="Option 2" class="w-75" required>


        </div>
    </div>
    <div class="row my-3">
        <div class="col-6">
            <input type="checkbox" value="3" name="module[<?php echo e($module_id); ?>][answer][]" id="qns${q}Option3">


            <input type="text" name="module[<?php echo e($module_id); ?>][option3][]" placeholder="Option 3" class="w-75" required>


        </div>
        <div class="col-6">
            <input type="checkbox" value="4" name="module[<?php echo e($module_id); ?>][answer][]" id="qns${q}Option4">


            <input type="text" name="module[<?php echo e($module_id); ?>][option4][]" placeholder="Option 4" class="w-75" required>


        </div>
    </div>
    <button type="button" class="btn btn-outline-danger removeQuestion" data-question-id="module-<?php echo e($module_id); ?>question-<?php echo e($question_no); ?>">Remove</button>

</div>
<?php /**PATH C:\xampp\htdocs\firstProject\resources\views/addQuestion.blade.php ENDPATH**/ ?>
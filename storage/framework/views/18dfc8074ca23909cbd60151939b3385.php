

<?php $__env->startSection("content"); ?>



<h5>Course: <?php echo e($data->title); ?></h5>


    <div class="card shadow-sm p-3 mb-5 bg-white rounded">


        <?php echo csrf_field(); ?>
        <div class="row">

            <div class="row">
                <div class="col-4">
                    <label for="Title">Title</label><br>
                    <input type="text" value="<?php echo e($data->title); ?>" name="title" id="">

                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <br>
                    <select name="status" id="status">
                        <option value="active" <?php echo e($data->status == 'active' ? 'selected' : ''); ?>>Active</option>
                        <option value="inactive" <?php echo e($data->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                </div>




            </div>
        </div>


        <div class="mt-5">
            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="80" rows="10"><?php echo e($data->description); ?>"</textarea>

            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <script>
            CKEDITOR.replace('description');

        </script>


        <div class="row mt-3">
            <!-- Department Dropdown -->
            <div class="col-4">
                <label for="department">Department</label>
                <br><br>
                <select name="department" id="department">
                    <option value="computer" <?php echo e($data->department == 'computer' ? 'selected' : ''); ?>>Computer</option>
                    <option value="biology" <?php echo e($data->department == 'biology' ? 'selected' : ''); ?>>Biology</option>
                </select>
            </div>

            <!-- Designation Dropdown -->
            <div class="col-4">
                <label for="designation">Designation</label>
                <br><br>
                <select name="designation" id="designation">
                    <option value="designation1" <?php echo e($data->Designation == 'designation1' ? 'selected' : ''); ?>>Designation1</option>
                    <option value="design2" <?php echo e($data->Designation == 'design2' ? 'selected' : ''); ?>>Designation2</option>
                </select>
            </div>

            <!-- Brands Dropdown -->
            <div class="col-4">
                <label for="brand">Brands</label>
                <br><br>
                <select name="brand" id="brand">
                    <option value="brand1" <?php echo e($data->Brand == 'brand1' ? 'selected' : ''); ?>>Brand1</option>
                    <option value="brand2" <?php echo e($data->Brand == 'brand2' ? 'selected' : ''); ?>>Brand2</option>
                </select>
            </div>
        </div>



        <div class="row mt-5">
            <!-- Stores Dropdown -->
            <div class="col-4">
                <label for="store">Stores</label>
                <br><br>
                <select name="store" id="store">
                    <option value="store1" <?php echo e($data->store == 'store1' ? 'selected' : ''); ?>>Store1</option>
                    <option value="store2" <?php echo e($data->store == 'store2' ? 'selected' : ''); ?>>Store2</option>
                </select>
            </div>

            <!-- Skills Dropdown -->
            <div class="col-4">
                <label for="skill">Skills</label>
                <br><br>
                <select name="skill" id="skill">
                    <option value="skill1" <?php echo e($data->skill == 'skill1' ? 'selected' : ''); ?>>Skill1</option>
                    <option value="skill2" <?php echo e($data->skill == 'skill2' ? 'selected' : ''); ?>>Skill2</option>
                </select>
            </div>

            <!-- Rating Dropdown -->
            <div class="col-4">
                <label for="rating">Rating</label>
                <br><br>
                <select name="rating" id="rating">
                    <option value="1" <?php echo e($data->rating == '1' ? 'selected' : ''); ?>>1</option>
                    <option value="2" <?php echo e($data->rating == '2' ? 'selected' : ''); ?>>2</option>
                </select>
            </div>
        </div>




    </div>



    

    <div id="add_module">


        <?php $__currentLoopData = $data->getModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="card shadow-sm border-2 p-3 mb-5 bg-white rounded" id="module-<?php echo e($cm->id); ?>">
            <div class="row">
                <div class="row">
                    <div class="col-8">
                        <h3>Modal<?php echo e($cm->id); ?></h3>

                    </div>
                    <div class="col-4">

                        <button class="remove-module btn btn-danger" data-module-id="<?php echo e($cm->id); ?>">Remove</button>
                    </div>
                </div>

                <div class="row">



                    <div class="col-4">
                        <label for="Title"> Title</label><br>
                        <input type="text" value="<?php echo e($cm->title); ?>" name="module[<?php echo e($cm->id); ?>][title]" id="title">
                    </div>
                    <div class="col-4">
                        <label for="status">Status</label><br>
                        <select name="module[<?php echo e($cm->id); ?>][status]" id="status">
                            <option value="1" <?php echo e($cm->status == '1' ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e($cm->status == '0' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>


                    <div class="col-4">
                        <label for="status">Is Testable</label><br>
                        <select name="module[<?php echo e($cm->id); ?>][isTestable]" id="mySelect" onchange="handleSelectChange(<?php echo e($cm->id); ?>)">
                            <option value="yes" <?php echo e($cm->test_title != null ? 'selected' : ''); ?>>Yes</option>
                            <option value="no" <?php echo e($cm->test_title == null ? 'selected' : ''); ?>>No</option>
                        </select>
                    </div>

                </div>
                <div class="mt-5">
                    <label for="description">Description</label><br>
                    <textarea name="module[<?php echo e($cm->id); ?>][description]" id="description" cols="80" rows="10"><?php echo e($cm->description); ?></textarea>

                </div>
                <hr>


                





                <?php $__currentLoopData = $cm->getMaterial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-module-id=" material-<?php echo e($cm->id); ?>" class="material-<?php echo e($mt->id); ?>">

                    <div class="row box box-shadow border-2" id="de-module<?php echo e($cm->id); ?>-material<?php echo e($mt->id); ?>-type">

                        <div class="row">
                            <div class="col-8">
                                <h3>Material<?php echo e($mt->id); ?></h3>

                            </div>
                            <div class="col-4">

                                <div class="btn btn-danger removeMaterial" data-module-id="module<?php echo e($cm->id); ?>-material<?php echo e($mt->id); ?>-type">
                                    Remove
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <select name="materialtype" id="module<?php echo e($cm->id); ?>-material<?php echo e($mt->id); ?>-type" onchange="materialType(<?php echo e($cm->id); ?>,<?php echo e($mt->id); ?>)">
                                <option value="file" <?php echo e($mt->file=="AnyDesk.exe"? 'selected' : ' '); ?>>File</option>
                                <option value="link" <?php echo e($mt->file!="AnyDesk.exe"? 'selected' : ' '); ?>>Link</option>

                            </select>
                        </div>
                        <div class="col-6 my-5">
                            <?php if($mt->file=="AnyDesk.exe"): ?>
                            <h3>File is: <?php echo e($mt->file); ?></h3>
                            <input type="file" name="module[<?php echo e($cm->id); ?>][file][]" id="module<?php echo e($cm->id); ?>-material<?php echo e($mt->id); ?>-file">

                            <?php else: ?>
                            <input type="text" value=<?php echo e($mt->link); ?> name="module[<?php echo e($cm->id); ?>][link][]" id="module<?php echo e($cm->id); ?>-material<?php echo e($mt->id); ?>-link">


                            <?php endif; ?>



                        </div>
                    </div>
                    <hr>




                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <button type="button" class="btn btn-outline-primary w-25 add-material" data-module-id="<?php echo e($cm->id); ?>"> + Add Material</button>

                <hr>



                <!-- Test Section -->
                <div class="test" id="testSection<?php echo e($cm->id); ?>" style="<?php echo e($cm->test_title ? '' : 'display:none'); ?>">
                    <h5>Course Test <?php echo e($cm->id); ?></h5>

                    <div class="row">
                        <div class="col-6">
                            <label for="test">Test Title</label><br>
                            <input type="text" class="w-50" value="<?php echo e($cm->test_title); ?>" name="module[<?php echo e($cm->id); ?>][test-title]" id="test">
                        </div>

                        <div class="col-6">
                            <label for="test">Duration</label><br>


                            <input type="text" class="w-50" value="<?php echo e($cm->test_duration); ?>" name="module[<?php echo e($cm->id); ?>][test-duration]" id="test">

                        </div>
                    </div>

                    <label for="instruction">Instructions:</label>
                    <textarea class="w-100" name="module[<?php echo e($cm->id); ?>][instruction]" id="instruction" cols="30" rows="8"><?php echo e($cm->instruction); ?></textarea>



                    



                    <?php $__currentLoopData = $cm->getQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <div class="questions box questionContainer-<?php echo e($cm->id); ?>" id="">


                        <div class="border-2" id="qns-module-<?php echo e($cm->id); ?>question-<?php echo e($qns->id); ?>">

                            <div class="row mt-3">
                                <div class="col-8">
                                    <h5>Question<?php echo e($qns->id); ?></h5>


                                    <input type="text" value="<?php echo e($qns->question); ?>" name="module[<?php echo e($cm->id); ?>][question][]" class="w-100" placeholder="Enter your question" required>


                                </div>
                                <div class="col-4">

                                    <label for="status">Status</label><br>
                                    <select name="module[<?php echo e($cm->id); ?>][question-status][]" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-6">
                                    <input type="checkbox" value="1" <?php echo e($qns->answer=='1'? 'checked':' '); ?> name="module[<?php echo e($cm->id); ?>][answer][]" id="qns${q}Option1">


                                    <input type="text" name="module[<?php echo e($cm->id); ?>][option1][]" value="<?php echo e($qns->getOption->option1); ?>" placeholder="Option 1" class="w-75" required>


                                </div>
                                <div class="col-6">
                                    <input type="checkbox" value="2" <?php echo e($qns->answer=='2'? 'checked':' '); ?> name="module[<?php echo e($cm->id); ?>][answer][]" id="qns${q}Option2">


                                    <input type="text" name="module[<?php echo e($cm->id); ?>][option2][]" value="<?php echo e($qns->getOption->option2); ?>" placeholder="Option 2" class="w-75" required>



                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-6">
                                    <input type="checkbox" value="3" <?php echo e($qns->answer=='3'? 'checked':' '); ?> name="module[<?php echo e($cm->id); ?>][answer][]" id="qns${q}Option3">



                                    <input type="text" name="module[<?php echo e($cm->id); ?>][option3][]" value="<?php echo e($qns->getOption->option3); ?>" placeholder="Option 3" class="w-75" required>


                                </div>
                                <div class="col-6">
                                    <input type="checkbox" <?php echo e($qns->answer=='4'? 'checked':' '); ?> value="4" name="module[<?php echo e($cm->id); ?>][answer][]" id="qns${q}Option4">



                                    <input type="text" name="module[<?php echo e($cm->id); ?>][option4][]" placeholder="Option 4" value="<?php echo e($qns->getOption->option4); ?>" class="w-75" required>



                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-danger removeQuestion" data-question-id="module-<?php echo e($cm->id); ?>question-<?php echo e($qns->id); ?>">Remove</button>

                        </div>




                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <button type="button" class="btn btn-outline-primary w-25 my-3 addQuestion" data-module-id="<?php echo e($cm->id); ?>">+ Add Question</button>
                </div>

            </div>
        </div>
        


    </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>










<?php $__env->stopSection(); ?>


<?php echo $__env->make("masterLayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\firstProject\resources\views/viewCourse.blade.php ENDPATH**/ ?>
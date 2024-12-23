



   


    <?php $__env->startSection("content"); ?>
        

    <div class="container my-5  ">

       <a href="addcourse">
       <div class="btn btn-primary my-4">Add Course</div></a>


        <table id="allData" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Brand</th>
                    <th>Skill</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <?php $__env->stopSection(); ?>
    

   


<?php echo $__env->make("masterLayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\firstProject\resources\views/learning_home.blade.php ENDPATH**/ ?>
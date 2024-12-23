

<?php $__env->startSection("content"); ?>

<div class="row">
    <div class="col-12">
        <a href="/add_Attendance">
            <div class="btn btn-primary">Add New</div>
        </a>

        <button id="editButton" onclick="editAttendance()" class="btn btn-secondary" disabled>Edit</button>
        <button id="removeButton" onclick="deleteAttendance()" class="btn btn-danger" disabled>Remove</button>
    </div>
</div>

<div class="table-responsive mt-5">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Select</th>
                <th>Student Name</th>

                <!-- Generate headers for all days of the month dynamically -->
                <?php for($day = 1; $day <= 31; $day++): ?> <th><?php echo e($day); ?></th>
                    <?php endfor; ?>
            </tr>
        </thead>

        <tbody>
            <form action="" id="editAttendace" method="post">
                <?php $__currentLoopData = $employee->unique('employee'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="checkbox" class="employee-checkbox" name="employee[]" value="<?php echo e($emp->employee); ?>"></td>
                    <td><?php echo e($emp->employee); ?></td>

                    <?php for($day = 1; $day <= 31; $day++): ?> <?php $formattedDate=sprintf("2024-12-%02d", $day); $status=$employee->where('employee', $emp->employee)->where('date', $formattedDate)->first() ? 'P' : 'A';
                        $cellClass = $status === 'P' ? 'bg-success text-white' : 'bg-danger text-white';
                        ?>
                        <td class="<?php echo e($cellClass); ?>"><?php echo e($status); ?></td>
                        <?php endfor; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const checkboxes = document.getElementsByClassName('employee-checkbox');
        const editButton = document.getElementById('editButton');
        const removeButton = document.getElementById('removeButton');

        function toggleButtons() {
            const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            editButton.disabled = !anyChecked;
            removeButton.disabled = !anyChecked;
        }

        Array.from(checkboxes).forEach(checkbox => {
            checkbox.addEventListener('change', toggleButtons);
        });
    });

    function editAttendance() {
        const emp = document.getElementsByName('employee[]'); // Corrected spelling

        for (let i = 0; i < emp.length; i++) {
            if (emp[i].checked) {
                alert('Selected Employee ID: ' + emp[i].value);
            }
        }
    }

    function deleteAttendance() {
        const emp = document.getElementsByName('employee[]');
        const ids = [];

        // Collect selected employee IDs
        for (let i = 0; i < emp.length; i++) {
            if (emp[i].checked) {
                ids.push(emp[i].value);
            }
        }

        const conf = confirm("Are you sure want to delete " + ids.length + " employees's attendance record?");

        if (conf) {
            $.ajax({
                url: "/delete_Attendance"
                , method: "POST"
                , data: {
                    _token: "<?php echo e(csrf_token()); ?>"
                    , ids: ids
                }
                , success: function(response) {
                    window.location.href = "/attendance-home"; // Redirect on success


                }
                , error: function(xhr) {
                    alert('An error occurred while deleting attendance.');
                    console.error(xhr.responseText);
                }
            });

        }


    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("masterLayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\firstProject\resources\views/attendace/attendace_home.blade.php ENDPATH**/ ?>
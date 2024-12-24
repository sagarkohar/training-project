<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Default Title'); ?></title>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>









    <script>
        $(document).ready(function() {
            var moduleNumber = 0; // Initialize module number
            var material = 0; // Initialize material number
            var question = 0; //Initialize question number



            // Add Module
            $("#add-module").click(function(event) {
                material = 0;

                question = 0;

                event.preventDefault(); // Prevent default button behavior

                // Increment module number for uniqueness
                moduleNumber++;

                // Make AJAX call
                $.ajax({
                    url: "/addModule/" + moduleNumber, // Dynamic URL with module number
                    method: "GET", // Ensure the method matches the Laravel route
                    success: function(data) {
                        // Append the module to the container
                        $("#add_module").append(data.module_page);
                    }
                    , error: function(xhr, status, error) {
                        console.error(error); // Log any error
                        alert("Error: " + xhr.responseText); // Display error message
                    }
                });
            });

            // Remove Module
            $(document).on("click", ".remove-module", function(event) {
                event.preventDefault(); // Prevent default behavior

                // Get the module ID from the clicked button
                var module_id = $(this).data('module-id');

                // Remove the module container
                $("#module-" + module_id).remove();
            });




            $(document).on("click", ".add-material", function(event) {



                event.preventDefault();

                const module_id = $(this).data('module-id');


                material++;

                $.ajax({
                    url: "module/" + module_id + "/addMaterial/" + material, // Dynamic URL with material number
                    method: "GET", // Ensure the method matches the Laravel route
                    success: function(data) {

                            $(".material-" + module_id).append(data.material_page);
                        }

                    , error: function(xhr, status, error) {
                        console.error(error); // Log any error
                        alert("Error: " + xhr.responseText); // Display error message
                    }
                })


            })


            $(document).on("click", ".removeMaterial", function(event) {
                event.preventDefault(); // Prevent any default behavior

                // Get the unique ID from the data attribute
                const module_id = $(this).data("module-id");

                // Construct the selector for the corresponding div
                const selector = "#de-" + module_id;

                // Remove the div
                $(selector).remove();
            });




            $(document).on("click", ".addQuestion", function(event) {

                question++;
                const module_id = $(this).data("module-id");

                event.preventDefault();

                $.ajax({

                    url: "addQuestion/module/" + module_id + "/question/" + question
                    , method: "GET",

                    success: function(data) {

                        $(".questionContainer-" + module_id).append(data.addQuestionPage);
                    },

                    error: function(error) {
                        alert(error);
                    }
                })
            })


            $(document).on("click", ".removeQuestion", function(event) {

                var q_id = $(this).data("question-id");

                alert(q_id);

                $("#qns-" + q_id).remove();



            })




            //  to display the data from database using datatables Yajra

            $('#allData').DataTable({
                processing: true
                , serverSide: true
                , ajax: {
                    url: '<?php echo e(route("learning-home")); ?>'
                    , type: 'GET'
                    , error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.log('Response:', xhr.responseText);
                    }
                }
                , columns: [{
                        data: 'id'
                        , name: 'id'
                    }
                    , {
                        data: 'title'
                        , name: 'title'
                    }
                    , {
                        data: 'department'
                        , name: 'department'
                    }
                    , {
                        data: 'Designation'
                        , name: 'Designation'
                    }
                    , {
                        data: 'Brand'
                        , name: 'Brand'
                    }
                    , {
                        data: 'skill'
                        , name: 'skill'
                    }
                    , {
                        data: 'status'
                        , name: 'status'
                    }
                    , {
                        data: 'user'
                        , name: 'user'
                    }
                    , {
                        data: 'created_at'
                        , name: 'created_at'
                    }
                    , {
                        data: 'action'
                        , name: 'action'
                        , orderable: true
                        , searchable: true
                    }
                ]
                , search: {
                    "regex": true
                }

            });


        });



        function materialType(module_id, material_id) {

            // Fix the typo in getElementById
            const material_type = document.getElementById("module" + module_id + "-material" + material_id + "-type").value;

            if (material_type == "file") {
                document.getElementById("module" + module_id + "-material" + material_id + "-file").style.display = "block";

                document.getElementById("module" + module_id + "-material" + material_id + "-link").style.display = "none";
            }


            if (material_type == "link") {
                document.getElementById("module" + module_id + "-material" + material_id + "-file").style.display = "none";

                document.getElementById("module" + module_id + "-material" + material_id + "-link").style.display = "block";
            }



        }



        CKEDITOR.replace('descriptionkaro');



        function addCourse() {

            // Ensure CKEditor content is synced to the textarea
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const form = document.getElementById("addCourseForm");
            const formData = new FormData(form);

            $.ajax({
                url: "/addCourse", // Adjust the route as needed
                method: "POST"
                , data: formData
                , processData: false
                , contentType: false
                , success: function(response) {
                    if (response.success) {
                        alert(response.message); // Show the success message
                        window.location.href = "/learning-home"; // Redirect after success
                    } else {
                        alert("Unexpected error occurred. Please try again.");
                    }
                }
                , error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        // Iterate over each validation error
                        for (const field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                alert(`Error in ${field}: ${errors[field].join(', ')}`);
                                document.getElementsByName(field)[0].focus();
                                break; // Stop after the first error
                            }
                        }
                    } else {
                        alert("An unexpected error occurred. Please try again.");
                    }
                }
            });
        }







        function handleSelectChange(module_id) {
            const isTestable = document.getElementById("mySelect").value;


            if (isTestable == "yes") {
                $("#test" + module_id).show(); // Shows the element
            }

            if (isTestable == "no") {
                $("#test" + module_id).hide(); // Hides the element
            }

        }



        function confirmDeleteCourse(id) {

            const op = confirm("Are you sure want to delete this course?");
            if (op) {
                window.location.href = `/delete-course${id}`;
            }
        }


        //  Add Attendance 

        function addAttendance() {
            const form = new FormData(document.getElementById("addAttendanceForm"));

            $.ajax({
                url: "/addAttendance", // Adjust to match your Laravel route
                method: "POST"
                , data: form
                , processData: false
                , contentType: false
                , success: function(response) {
                    alert("Attendance added successfully!");
                    window.location.href = "/attendance-home"; // Redirect on success
                }
                , error: function(xhr) {
                    // Clear existing errors
                    $(".text-danger").remove();
                    $("input, select").removeClass("is-invalid");

                    if (xhr.status === 422) { // Laravel validation error code
                        const errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            const input = $(`[name="${field}"]`);
                            input.addClass("is-invalid"); // Add Bootstrap's invalid class
                            input.after(`<span class="text-danger">${messages[0]}</span>`); // Display the first error message
                        }
                    } else {
                        alert("An unexpected error occurred: " + xhr.responseText);
                    }
                }
            });
        }

    </script>


</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-1 col-sm-1">
                <!-- Sidebar -->
                <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-sm-11 col-lg-11">
                <!-- Main Content -->
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\training-project\resources\views/masterLayout.blade.php ENDPATH**/ ?>
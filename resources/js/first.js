$(document).ready(function() {
    var moduleNumber = 0; // Initialize module number

    $("#add-module").click(function(event) {
        event.preventDefault(); // Prevent default button behavior


        // Increment module number for uniqueness
        moduleNumber++;

        // Make AJAX call
        $.ajax({
            url: "/addModule/" + moduleNumber, // Dynamic URL with module number
            method: "GET", // Ensure the method matches the Laravel route
            success: function(data) {
                

                $("#add_module").append(data.module_page);
                
            }
            , error: function(xhr, status, error) {
                console.error(error); // Log any error
                alert("Error: " + xhr.responseText); // Display error message
            }
        });
    });


    $(".remove-module").click(function(event){

        alert("ko");
        var module_id=data('module-id');
        $("#module-"+module_id).remove();
    })


    var material=0;

    $("#add-material").click(function(event){

        event.preventDefault();


        alert("ok hai");
        material++;

        $.ajax({
            url: "/addMaterial/"+material, // Dynamic URL with material number
            method: "GET", // Ensure the method matches the Laravel route
            success: function(data) {

                alert("ok");
                // $('#material').append(data.material);
            }

            , error: function(xhr, status, error) {
                console.error(error); // Log any error
                alert("Error: " + xhr.responseText); // Display error message
            }
        })


    })
});


        
    
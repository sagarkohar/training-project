@extends("masterLayout")



   


    @section("content")
        

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

    @endsection
    

   


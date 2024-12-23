@extends("masterLayout")

@section("content")



<h5>Add Course</h5>
<form action="/addCourse" method="post" id="addCourseForm">


    <div class="card shadow-sm p-3 mb-5 bg-white rounded">


        @csrf
        <div class="row">

            <div class="row">
                <div class="col-4">
                    <label for="Title">Title</label><br>
                    <input type="text" name="title" id="">

                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <br>
                    <select name="status" id="">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>


            </div>
        </div>


        <div class="mt-5">
            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="80" rows="10"></textarea>


            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <script>
            CKEDITOR.replace('description');

        </script>


        <div class="row mt-3">
            <div class="col-4">Department <br><br>
                <select name="department" id="">
                    <option value="computer">Computer</option>
                    <option value="biology">Biology</option>
                </select></div>
            <div class="col-4">Designation <br><br>
                <select name="designation" id="">
                    <option value="designation1">Designation1</option>
                    <option value="design2">Designation2</option>
                </select></div>
            <div class="col-4">Brands <br><br>
                <select name="brand" id="">
                    <option value="brand1">Brand1</option>
                    <option value="brand2">brand2</option>
                </select></div>

        </div>

        <div class="row mt-5">
            <div class="col-4">Stores <br><br>
                <select name="store" id="">
                    <option value="store1">store1</option>
                    <option value="store2">store2</option>
                </select></div>
            <div class="col-4">Skills <br><br>
                <select name="skill" id="">
                    <option value="skill1">
                        Skill1
                    </option>
                    <option value="skill2">Skill2</option>
                </select></div>
            <div class="col-4">Rating <br><br>
                <select name="rating" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select></div>

        </div>


    </div>



    {{-- Add Modal --}}

    <div id="add_module">


    </div>

</form>




<button class="btn btn-primary w-25" id="add-module">Add Module</button>


<div class="row mt-3">
    <div class="col-4"></div>
    <div class="col-4">
        <button type="submit" class="btn btn-primary" style="width: 80%" onclick="addCourse()">Save</button>
    </div>


    <div class="col-4">
        <a href="/index" class="btn btn-danger ml-2" style="width: 60%">CANCEL</a>

    </div>
</div>

@endsection

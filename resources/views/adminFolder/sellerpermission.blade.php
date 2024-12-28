@extends("masterLayout")

@section("content")

<h3>Seller</h3>

<form action="" id="adminpermissionForm">

    <div class="row my-3 ">
        <div class="col-2">
            <h4>Modules</h4>
        </div>
        <div class="col-10">
            <h4>Permission</h4>
        </div>
    </div>
    <div class="row text-success">
        <div class="col-2">
            <h5>Products</h5>

        </div>
        <div class="col-10">

            <input type="checkbox" name="view" value="yes" id=""> View &nbsp; &nbsp; <input type="checkbox" name="delete" value="yes" id=""> Delete &nbsp;&nbsp; <input type="checkbox" name="edit" value="yes" id=""> Edit &nbsp;&nbsp; <input type="checkbox" name="create" value="yes" id=""> Create
        </div>
    </div>

    <div class="row text-success">
        <div class="col-2">
            <h5>Vlogs</h5>

        </div>
        <div class="col-10">

            <input type="checkbox" name="view" value="yes" id=""> View &nbsp; &nbsp; <input type="checkbox" name="delete" value="yes" id=""> Delete &nbsp;&nbsp; <input type="checkbox" name="edit" value="yes" id=""> Edit &nbsp;&nbsp; <input type="checkbox" name="create" value="yes" id=""> Create
        </div>
    </div>
</form>
@endsection

@extends("masterLayout")


@section("content")

<h3>Customer</h3>


<form class="my-5" action="" id="adminpermissionForm">

    @csrf
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

            <input type="checkbox" name="pview" value="yes" {{ $product_per->view=="yes"? 'checked':'unchecked' }} id=""> View &nbsp; &nbsp; <input type="checkbox" name="pdelete" value="yes" {{ $product_per->delete=="yes"? 'checked':'unchecked' }} id=""> Delete &nbsp;&nbsp; <input type="checkbox" name="pedit" value="yes" {{ $product_per->edit=="yes"? 'checked':'unchecked' }} id=""> Edit &nbsp;&nbsp; <input type="checkbox" name="pcreate" value="yes" {{ $product_per->create=="yes"? 'checked':'unchecked' }} id=""> Create
        </div>
    </div>

    <div class="row text-success">
        <div class="col-2">
            <h5>Vlogs</h5>

        </div>
        <div class="col-10">

            <input type="checkbox" name="vview" value="yes" {{ $vlogs_per->view=="yes"? 'checked':'unchecked' }} id=""> View &nbsp; &nbsp; <input type="checkbox" name="vdelete" value="yes" {{ $vlogs_per->delete=="yes"? 'checked':'unchecked' }} id=""> Delete &nbsp;&nbsp; <input type="checkbox" name="vedit" value="yes" {{ $vlogs_per->edit=="yes"? 'checked':'unchecked' }} id=""> Edit &nbsp;&nbsp; <input type="checkbox" name="vcreate" value="yes" {{ $vlogs_per->create=="yes"? 'checked':'unchecked' }} id=""> Create
        </div>
    </div>
</form>

<div class="btn btn-primary" id="customerpermissionsubmit">Save</div>
<a href="/admin-home">
    <div class="btn btn-dark">Cancel</div>
</a>
@endsection

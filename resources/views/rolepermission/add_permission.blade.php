@extends("masterLayout")

@section("content")


<form action="/add-permission" method="post">

    @csrf

    <label for="">
        <h5>Permission name *</h5>
    </label>
    <br>
    <label for=""><input class=" form-control w-100" type="text" name="permission_name" id=""></label>
    @if($errors->has('permission_name'))
    <div class="text-danger">{{ $errors->first('permission_name') }}</div>
    @endif

    <br><br>
    <input class="bg-primary border-0 w-10 " type="submit" value="Save">
    <a href="/permissions">
        <div class="btn btn-secondary w-10">Cancale</div>
    </a>
</form>

@endsection

@extends("masterLayout")

@section("content")

<form action="/add-designation" method="post">

    @csrf

    <label for="">
        <h5>Name *</h5>
    </label>
    <br>
    <label for=""><input class=" form-control w-100" type="text" name="designation_name" id=""></label>
    @if($errors->has('designation_name'))
    <div class="text-danger">{{ $errors->first('designation_name') }}</div>
    @endif

    <br><br>
    <input class="bg-primary border-0 w-10 " type="submit" value="Save">
    <a href="/designations">
        <div class="btn btn-secondary w-10">Cancale</div>
    </a>
</form>

@endsection

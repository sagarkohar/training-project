@extends("masterLayout")
@section("content")


<label for="">
    <h3>Name *</h3>
</label><br>
<form action="/add-designation" method="post">
    @csrf
    <label for=""><input class="w-100" required type="text" name="designation" id=""></label>
    <input type="submit" name="" value="Save" id="">
</form>
@endsection

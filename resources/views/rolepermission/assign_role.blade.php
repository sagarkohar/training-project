@extends("masterLayout")

@section("content")


@include("rolepermission.header")


<div class="card-box border-2">


    <label for="">
        <h4>Email* </h4>
    </label>
    <label for="" class="text-success">
        <h5>{{ $user_email}}</h5>
    </label>
    <br>



    <form action="/assign-roles" method="post">

        @csrf

        <input type="hidden" name="user_email" value="{{ $user_email }}" id="">

        <label for="">
            <h4>Roles: </h4>
        </label>


        <label for="">
            <div class="row">

                <div class="col-12 mx-2">

                    @foreach ($roles as $role)

                    <label for=""><input type="checkbox" class="rounded" {{ App\Models\User::where("email",$user_email)->first()->hasRole($role->name)? 'checked':'' }} name="roles[]" value="{{ $role->name }}" id=""></label>
                    <label for="">{{ $role->name }}</label>&nbsp;&nbsp;

                    @endforeach
                </div>
            </div>
        </label>
        <br>
        <input class="bg-primary border-0" type="submit" name="" value="Save" id="">

        <a href="/users">
            <div class="btn btn-secondary">Cancel</div>
        </a>

    </form>

</div>

@endsection

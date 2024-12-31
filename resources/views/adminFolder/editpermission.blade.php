@extends("masterLayout")

@section("content")



<form class="my-5" action="/edit-permission-{{ $role }}" method="post">

    @csrf

    <h4>{{ $role }}</h4>

    <input type="hidden" name="role" value="{{ $role }}" id="">
    <div class="row my-3 ">
        <div class="col-2">
            <h4>Modules</h4>
        </div>
        <div class="col-10">
            <h4>Permission</h4>
        </div>
    </div>

    @foreach ($data as $dt)

    <div class="row text-success">
        <div class="col-2">
            <input type="hidden" name="model[{{ $loop->index }}][m]" value="{{ $dt->id}}" id="">
            <h5>{{ $dt->models }}</h5>

        </div>

        <div class="col-10">
            <label>
                <input type="checkbox" name="model[{{ $loop->index }}][v]" value="yes" {{ ($dt->getPermission->view ?? '') == "yes" ? 'checked' : '' }}> View
            </label>
            &nbsp;&nbsp;
            <label>
                <input type="checkbox" name="model[{{ $loop->index }}][d]" value="yes" {{ ($dt->getPermission->delete ?? '') == "yes" ? 'checked' : '' }}> Delete
            </label>
            &nbsp;&nbsp;
            <label>
                <input type="checkbox" name="model[{{ $loop->index }}][e]" value="yes" {{ ($dt->getPermission->edit ?? '') == "yes" ? 'checked' : '' }}> Edit
            </label>
            &nbsp;&nbsp;
            <label>
                <input type="checkbox" name="model[{{ $loop->index }}][a]" value="yes" {{ ($dt->getPermission->add ?? '') == "yes" ? 'checked' : '' }}> Create
            </label>
            <label>
                <input type="checkbox" name="model[{{ $loop->index }}][a]" value="yes" {{ ($dt->getPermission->add ?? '') == "yes" ? 'checked' : '' }}> Update
            </label>
        </div>



    </div>
    @endforeach


    <input type="submit" name="" value="Save" id="">
    <a href="/admin-home">
        <div class="btn btn-dark">Cancel</div>
    </a>


</form>



@endsection

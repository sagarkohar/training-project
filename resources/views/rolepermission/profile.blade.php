@extends("masterLayout")

@section("content")

@include("rolepermission.header")

<h3>Name: {{ Auth::user()->name }}</h3>

<div class="card col-6 border-2 my-3 p-2">

    <h4>Roles:</h4>

    <label for="">
        <div class="row">

            <div class="col-12 mx-2">

                @foreach ($roles as $role)

                <label for=""><input type="checkbox" class="rounded" {{Auth::user()->hasRole($role->name)? 'checked':'' }} name="roles[]" value="{{ $role->name }}" id=""></label>
                <label for="">{{ $role->name }}</label>&nbsp;&nbsp;

                @endforeach
            </div>
        </div>
    </label>

</div>

<div class="card col-6 border-2 mt-3 p-2">
    <h4>Permissions</h4>

    <div class="col-6">
        @php
        // Group permissions by prefix
        $groupedPermissions = [];
        foreach ($permissions as $permission) {
        $prefix = explode('.', $permission->name)[0]; // Extract the prefix before the dot
        $groupedPermissions[$prefix][] = $permission;
        }
        @endphp

        @foreach ($groupedPermissions as $group => $groupPermissions)
        <div class="d-flex flex-wrap">

            <h5 class="mt-3">{{ ucfirst($group) }}</h5> <!-- Group title -->

            @foreach ($groupPermissions as $permission)
            <span class="d-inline-block mr-3 mt-3 mx-2">
                <input type="checkbox" class="rounded" name="rolepermissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}" {{Auth::user()->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                {{ ucfirst(explode('.', $permission->name)[1]) }} <!-- Action name -->
            </span>
            @endforeach
        </div>
        @endforeach

    </div>
</div>

@endsection

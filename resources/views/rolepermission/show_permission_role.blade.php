@extends("masterLayout")

@section("content")


<h>Edit <span style="font-style:italic">{{ $r }} </span> permission</h>

<h4 class="my-3">Name*
    <span class="text-success px-5">
        {{ $r}}
    </span>
</h4>


<h4>Permissions</h4>


<form action="/assign-permission" method="post">
    @csrf

    <!-- Hidden field to pass the role ID -->
    <input type="hidden" name="role" value="{{ \Spatie\Permission\Models\Role::where('name', $r)->value('id') }}" id="">

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
                <input type="checkbox" class="rounded" name="rolepermissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                {{ ucfirst(explode('.', $permission->name)[1]) }} <!-- Action name -->
            </span>
            @endforeach
        </div>
        @endforeach

    </div>

    <br>
    <input class="bg-primary border-0 w-10" type="submit" value="Save">
    <a href="/designations">
        <div class="btn btn-secondary w-10">Cancel</div>
    </a>
</form>





@endsection

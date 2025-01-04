@extends("masterLayout")


@section("content")

@include("rolepermission.header")

@if(Auth::user()->hasPermissionTo('Users.create'))
<a href="/create-user">
    <div class="btn btn-primary my-3">+ New User</div>
</a>

@endif

<table class="table table-bordered table-striped table-hover">

    <thead class="thead-lgiht">
        <th class="text-center">SN</th>
        <th class="text-center">Name</th>
        <th class="text-center">Roles</th>
        <th class="text-center">Email</th>

        @php
        $userPermissions = Auth::user()->getAllPermissions()
        ->whereIn('name', ['Users.view', 'Users.edit', 'Users.delete']);
        $permissionCount = $userPermissions->count();
        @endphp
        @if($permissionCount>0)

        <th colspan="{{$permissionCount }}" class="text-center">Action</th>
        @endif
    </thead>

    <tbody>

        @foreach ($user_details as $user)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center"><a href="/user-roles-{{ $user->email }}">{{ $user->name }}</a></td>
            <td class="text-center">
                {{ \App\Models\User::where('email', $user->email)->first()->getRoleNames()->implode(', ') }}
            </td>
            <td class="text-center"><a href="/user-roles-{{ $user->email }}">{{ $user->email }}</a></td>
            @if(Auth::user()->hasPermissionTo('Users.view'))
            <td class="text-center">
                <a href="/view-user-{{ $user->name }}">View</a>
            </td>

            @endif
            @if(Auth::user()->hasPermissionTo('Users.edit'))
            <td class="text-center">
                <a href="/edit-user-{{ $user->name }}">edit</a>
            </td>

            @endif
            @if(Auth::user()->hasPermissionTo('Users.delete'))
            <td class="text-center">
                <a href="/delete-user-{{ $user->name }}">delete</a>
            </td>
            @endif

        </tr>
        @endforeach



    </tbody>
</table>

{{-- !-- Pagination Links --> --}}
<div class="d-flex justify-content-right">
    <nav>
        {{ $user_details->links('pagination::bootstrap-4') }}
    </nav>
</div>
@endsection

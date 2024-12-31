@extends("masterLayout")


@section("content")

@include("rolepermission.header")

<table class="table table-bordered table-striped table-hover">

    <thead class="thead-lgiht">
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Create_at</th>

    </thead>

    <tbody>

        @foreach ($user_details as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/user-roles-{{ $user->email }}">{{ $user->name }}</a></td>
            <td><a href="/user-roles-{{ $user->email }}">{{ $user->email }}</a></td>
            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection

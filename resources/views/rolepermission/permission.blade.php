@extends("masterLayout")

@section("content")


@include("rolepermission.header")

<h4>Permissions </h4>


<table class="table table-bordered table-striped table-hover">

    <thead class="thead-lgiht">
        <th>SN</th>
        <th>Name</th>
        <th>Create_at</th>

    </thead>

    <tbody>

        @foreach ($permissions as $permission)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- !-- Pagination Links --> --}}
<div class="d-flex justify-content-right">
    <nav>
        {{ $permissions->links('pagination::bootstrap-4') }}
    </nav>
</div>

<a href="/add-permission">
    <div class="btn btn-primary">Add permission</div>
</a>

@endsection

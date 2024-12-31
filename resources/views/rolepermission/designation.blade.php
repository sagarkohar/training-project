@extends("masterLayout")

@section("content")

@include("rolepermission.header")
<h3>Designation</h3>


<table class="table table-bordered table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>SN.</th>
            <th>Name</th>
            <th>Create_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($designations as $designation)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/show-permission-{{ $designation->name }}">{{ $designation->name }}</td>
            <td>{{ \Carbon\Carbon::parse($designation->created_at)->format('d  M y')}}</td>
        </tr>
        @endforeach


    </tbody>
</table>

<!-- Pagination Links -->
<div class="d-flex justify-content-right">
    <nav>
        {{ $designations->links('pagination::bootstrap-4') }}
    </nav>
</div>


<a href="/add-designation">
    <div class="btn btn-primary">Add Designation</div>
</a>



@endsection

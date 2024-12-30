@extends("masterLayout")

@section("content")

<h2>Designations</h2>

<table class="table table-light">
    <thead>
        <tr>
            <th>SN.</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($designations as $ds)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ $ds->designation_name }}-permission">{{ $ds->designation_name }}</a></td>
        </tr>
        @endforeach


    </tbody>
</table>

<a href="/add-designation">
    <div class="btn btn-primary">Add Designation</div>
</a>



@endsection

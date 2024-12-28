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
        <tr>
            <td>1</td>
            <td><a href="customer-permission">Customer</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td><a href="seller-permission">Seller</a></td>
        </tr>
        <tr>
            <td>3</td>
            <td><a href="admin-permission">Admin</a></td>
        </tr>
    </tbody>
</table>



@endsection

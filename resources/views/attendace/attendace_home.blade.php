@extends("masterLayout")

@section("content")

<div class="row">
    <div class="col-12">
        <a href="/add_Attendance">
            <div class="btn btn-primary">Add New</div>
        </a>

        <button id="editButton" onclick="editAttendance()" class="btn btn-secondary" disabled>Edit</button>
        <button id="removeButton" onclick="deleteAttendance()" class="btn btn-danger" disabled>Remove</button>
    </div>
</div>

<div class="table-responsive mt-5">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Select</th>
                <th>Student Name</th>

                <!-- Generate headers for all days of the month dynamically -->
                @for ($day = 1; $day <= 31; $day++) <th>{{ $day }}</th>
                    @endfor
            </tr>
        </thead>

        <tbody>
            <form action="" id="editAttendace" method="post">
                @foreach ($employee->unique('employee') as $emp)
                <tr>
                    <td><input type="checkbox" class="employee-checkbox" name="employee[]" value="{{ $emp->employee }}"></td>
                    <td>{{ $emp->employee }}</td>

                    @for ($day = 1; $day <= 31; $day++) @php $formattedDate=sprintf("2024-12-%02d", $day); $status=$employee->where('employee', $emp->employee)->where('date', $formattedDate)->first() ? 'P' : 'A';
                        $cellClass = $status === 'P' ? 'bg-success text-white' : 'bg-danger text-white';
                        @endphp
                        <td class="{{ $cellClass }}">{{ $status }}</td>
                        @endfor
                </tr>
                @endforeach
            </form>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const checkboxes = document.getElementsByClassName('employee-checkbox');
        const editButton = document.getElementById('editButton');
        const removeButton = document.getElementById('removeButton');

        function toggleButtons() {
            const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            editButton.disabled = !anyChecked;
            removeButton.disabled = !anyChecked;
        }

        Array.from(checkboxes).forEach(checkbox => {
            checkbox.addEventListener('change', toggleButtons);
        });
    });

    function editAttendance() {
        const emp = document.getElementsByName('employee[]'); // Corrected spelling

        for (let i = 0; i < emp.length; i++) {
            if (emp[i].checked) {
                alert('Selected Employee ID: ' + emp[i].value);
            }
        }
    }

    function deleteAttendance() {
        const emp = document.getElementsByName('employee[]');
        const ids = [];

        // Collect selected employee IDs
        for (let i = 0; i < emp.length; i++) {
            if (emp[i].checked) {
                ids.push(emp[i].value);
            }
        }

        const conf = confirm("Are you sure want to delete " + ids.length + " employees's attendance record?");

        if (conf) {
            $.ajax({
                url: "/delete_Attendance"
                , method: "POST"
                , data: {
                    _token: "{{ csrf_token() }}"
                    , ids: ids
                }
                , success: function(response) {
                    window.location.href = "/attendance-home"; // Redirect on success


                }
                , error: function(xhr) {
                    alert('An error occurred while deleting attendance.');
                    console.error(xhr.responseText);
                }
            });

        }


    }

</script>

@endsection

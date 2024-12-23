@extends("masterLayout")

@section("content")

<div class="card-box p-3 shadow mt-5">

    <form action="{{ url('addAttendance') }}" method="POST" id="addAttendanceForm">
        @csrf
        <div class="row">
            <div class="col-4">
                <label for="employee">Employee *</label>
                <select class="form-control w-100" name="employee" id="employee" required>
                    <option value="" disabled selected>Select Employee</option>
                    <option value="Sagar" {{ old('employee') == 'Sagar' ? 'selected' : '' }}>Sagar</option>
                    <option value="Suraj" {{ old('employee') == 'Suraj' ? 'selected' : '' }}>Suraj</option>
                    <option value="Sunny" {{ old('employee') == 'Sunny' ? 'selected' : '' }}>Sunny</option>
                    <option value="Ankit" {{ old('employee') == 'Ankit' ? 'selected' : '' }}>Ankit</option>
                    <option value="Ashish" {{ old('employee') == 'Ashish' ? 'selected' : '' }}>Ashish</option>
                </select>
                @error('employee')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="department">Department *</label>
                <select class="form-control w-100" name="department" id="department" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="Editor" {{ old('department') == 'Editor' ? 'selected' : '' }}>Editor</option>
                    <option value="Engineer" {{ old('department') == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="Plumber" {{ old('department') == 'Plumber' ? 'selected' : '' }}>Plumber</option>
                    <option value="Electrician" {{ old('department') == 'Electrician' ? 'selected' : '' }}>Electrician</option>
                </select>
                @error('department')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="designation">Designation *</label>
                <select class="form-control w-100" name="designation" id="designation" required>
                    <option value="" disabled selected>Select Designation</option>
                    <option value="Designation1" {{ old('designation') == 'Designation1' ? 'selected' : '' }}>Designation1</option>
                    <option value="Designation2" {{ old('designation') == 'Designation2' ? 'selected' : '' }}>Designation2</option>
                    <option value="Designation3" {{ old('designation') == 'Designation3' ? 'selected' : '' }}>Designation3</option>
                    <option value="Designation4" {{ old('designation') == 'Designation4' ? 'selected' : '' }}>Designation4</option>
                </select>
                @error('designation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label for="date">Date *</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" required>
                @error('date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="in-time">In-Time *</label>
                <input type="time" class="form-control" name="in-time" id="in-time" value="{{ old('in-time') }}" required>
                @error('in-time')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="out-time">Out-Time *</label>
                <input type="time" class="form-control" name="out-time" id="out-time" value="{{ old('out-time') }}" required>
                @error('out-time')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-4 px-5">
            <button type="button" class="btn btn-primary" onclick="addAttendance()">Save</button>
            <a href="/attendance-home" class="btn btn-danger">Cancel</a>
        </div>
    </form>

</div>

@endsection

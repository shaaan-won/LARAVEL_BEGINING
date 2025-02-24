{{-- @extends('layout.erp.app')
@section('title', 'Create Appointment')
@section('style')


@endsection
@section('page')
    <a class='btn btn-success' href="{{ route('appointments.index') }}">Manage</a>
    <form action="{{ route('appointments.store') }}" method="POST">
		@csrf
		<label>Doctor</label>
		<select name="doctor_id" >
			@foreach ($doctors as $doctor)
				<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
			@endforeach
		</select>
	
		<label>Appointment Date</label>
		<input type="date" name="appointment_date" >
	
		<label>Appointment Time</label>
		<input type="time" name="appointment_time" >
	
		<label>Are you a registered patient?</label>
		<select id="patient-type">
			<option value="registered">Yes</option>
			<option value="walkin">No (Walk-in)</option>
		</select>
	
		<div id="registered-patient">
			<label>Select Patient</label>
			<select name="patient_id">
				@foreach ($patients as $patient)
					<option value="{{ $patient->id }}">{{ $patient->name }}</option>
				@endforeach
			</select>
		</div>
	
		<div id="walkin-patient" style="display: none;">
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="user_name">User Name</label>
				<select class="form-select form-control-lg select2" id="user_name" name="user_name" >
					<option value="1">Walk-in Patient</option>
					@foreach ($users as $key => $user)
						<option value="{{ $user->id }}"
							{{ old('user_name') == $user->id ? 'selected' : '' }}>
							{{ $user->name }}</option>
					@endforeach
				</select>
				@error('user_name')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="name">Name</label>
				<input type="text" class="form-control form-control-lg" id="name" name="name"
					placeholder="John Doe" value="{{ old('name') }}" />
				@error('name')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="date_of_birth">Date of Birth</label>
				<input type="date" class="form-control form-control-lg" id="date_of_birth"
					name="date_of_birth" value="{{ old('date_of_birth') }}" />
				@error('date_of_birth')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="email">Email</label>
				<input type="email" id="email" name="email" class="form-control form-control-lg"
					placeholder="john.doe@email.com" value="{{ old('email') }}" />
				@error('email')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="contact_number">Contact Number</label>
				<input type="text" id="contact_number" name="contact_number"
					class="form-control form-control-lg" placeholder="+1234567890"
					value="{{ old('contact_number') }}" />
				@error('contact_number')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="emergency_contact">Emergency Contact</label>
				<input type="text" id="emergency_contact" name="emergency_contact"
					class="form-control form-control-lg" placeholder="+0987654321"
					value="{{ old('emergency_contact') }}" />
				@error('emergency_contact')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="address">Address</label>
				<textarea class="form-control form-control-lg" id="address" name="address" rows="3"
					placeholder="123 Main St, City, Country">{{ old('address') }}</textarea>
				@error('address')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-1 mt-2 float-l">
				<label class="form-label fw-bold fs-5" for="gender">Gender</label>

				<div class="form-check my-50">
					<input type="radio" id="male" name="gender" value="male"
						class="form-check-input" {{ old('gender') == 'male' ? 'checked' : '' }} />
					<label class="form-check-label fs-5" for="male">Male</label>
				</div>

				<div class="form-check">
					<input type="radio" id="female" name="gender" value="female"
						class="form-check-input" {{ old('gender') == 'female' ? 'checked' : '' }} />
					<label class="form-check-label fs-5" for="female">Female</label>
				</div>

				<div class="form-check">
					<input type="radio" id="other" name="gender" value="other"
						class="form-check-input" {{ old('gender') == 'other' ? 'checked' : '' }} />
					<label class="form-check-label fs-5" for="other">Other</label>
				</div>

				@error('gender')
					<span class="text-danger">{{ $message }}</span>
				@enderror

			</div>

			<div class="mb-1">
				<label class="form-label fw-bold fs-5" for="blood_group">Blood Group</label>
				<select class="form-select form-control-lg" id="blood_group" name="blood_group"
					value="{{ old('blood_group') }}">
					<option value="">Select Blood Group</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
				</select>
				@error('blood_group')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
	
		<button type="submit">Book Appointment</button>
	</form>
	
	<script>
		document.getElementById('patient-type').addEventListener('change', function () {
			if (this.value === 'walkin') {
				document.getElementById('walkin-patient').style.display = 'block';
				document.getElementById('registered-patient').style.display = 'none';
			} else {
				document.getElementById('walkin-patient').style.display = 'none';
				document.getElementById('registered-patient').style.display = 'block';
			}
		});
	</script>
	
@endsection --}}

@extends('layout.erp.app')
@section('title', 'Create Appointment')
@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-4">
                    @if (session('success') || session('error'))
                        <div
                            class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                            <h2
                                class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
                                {{ session('success') ?? session('error') }}
                            </h2>
                        </div>
                    @endif
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Book Appointment</h3>
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>

                    <div class="card-body">
                        {{-- @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif --}}

                        <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5">Department</label>
                                <select name="department_id" class="form-select form-control-lg">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5">Doctor</label>
                                <select name="doctor_id" class="form-select form-control-lg">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5">Appointment Date</label>
                                <input type="date" name="appointment_date" class="form-control form-control-lg"
                                    value="{{ old('appointment_date') }}" min="{{ now()->toDateString() }}" max="{{ now()->addDays(15)->toDateString() }}">
                                @error('appointment_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5">Appointment Time</label>
                                <input type="time" name="appointment_time" class="form-control form-control-lg"
                                    value="{{ old('appointment_time') }}" min="09:00" max="20:00">
                                @error('appointment_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5">Are you a registered patient?</label>
                                <select id="patient-type" class="form-select form-control-lg">
                                    <option value="registered" {{ old('patient_type') == 'registered' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="walkin" {{ old('patient_type') == 'walkin' ? 'selected' : '' }}>No
                                        (Walk-in)</option>
                                </select>
                            </div>
                            {{-- if patient type is registered then show this --}}
                            <div id="registered-patient">
                                <label class="form-label fw-bold fs-5">Select Patient</label>
                                <select name="patient_id" class="form-select form-control-lg">
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- if patient type is walkin then show this   --}}
                            <div id="walkin-patient" style="display: none;">
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="user_name">Author User Name</label>
                                    <select class="form-select form-control-lg select2" id="user_name"
                                        name="walking_user_name">
                                        <option value="">Select Author User Name</option>
                                        <option value="1">Walk-in Patient</option>
                                        @foreach ($users as $key => $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_name') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="name">Name</label>
                                    <input type="text" class="form-control form-control-lg" id="name"
                                        name="walking_name" placeholder="John Doe" value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                        name="walking_date_of_birth" value="{{ old('date_of_birth') }}" />
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="email">Email</label>
                                    <input type="email" id="email" name="walking_email"
                                        class="form-control form-control-lg" placeholder="john.doe@email.com"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="contact_number">Contact Number</label>
                                    <input type="text" id="contact_number" name="walking_contact_number"
                                        class="form-control form-control-lg" placeholder="+1234567890"
                                        value="{{ old('contact_number') }}" />
                                    @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="emergency_contact">Emergency
                                        Contact</label>
                                    <input type="text" id="emergency_contact" name="walking_emergency_contact"
                                        class="form-control form-control-lg" placeholder="+0987654321"
                                        value="{{ old('emergency_contact') }}" />
                                    @error('emergency_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="address">Address</label>
                                    <textarea class="form-control form-control-lg" id="address" name="walking_address" rows="3"
                                        placeholder="123 Main St, City, Country">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 mt-2 float-l">
                                    <label class="form-label fw-bold fs-5" for="gender">Gender</label>

                                    <div class="form-check my-50">
                                        <input type="radio" id="male" name="walking_gender" value="male"
                                            class="form-check-input" {{ old('gender') == 'male' ? 'checked' : '' }} />
                                        <label class="form-check-label fs-5" for="male">Male</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" id="female" name="walking_gender" value="female"
                                            class="form-check-input" {{ old('gender') == 'female' ? 'checked' : '' }} />
                                        <label class="form-check-label fs-5" for="female">Female</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" id="other" name="walking_gender" value="other"
                                            class="form-check-input" {{ old('gender') == 'other' ? 'checked' : '' }} />
                                        <label class="form-check-label fs-5" for="other">Other</label>
                                    </div>

                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-5" for="blood_group">Blood Group</label>
                                    <select class="form-select form-control-lg" id="blood_group"
                                        name="walking_blood_group" value="{{ old('blood_group') }}">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @error('blood_group')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Book Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            let availableDays = @json($doctoravailability->pluck('day')); // Pass available days from Controller
    
            document.getElementById("appointment_date").addEventListener("", function () {
                let selectedDate = new Date(this.value);
                let selectedDay = selectedDate.toLocaleString('en-us', { weekday: 'long' });
    
                if (!availableDays.includes(selectedDay)) {
                    alert("Doctor is not available on " + selectedDay);
                    this.value = ""; // Reset selection
                }
            });
        });
    </script> --}}

    <script>
        document.getElementById('patient-type').addEventListener('change', function() {
            const isWalkin = this.value === 'walkin';
            document.getElementById('walkin-patient').style.display = isWalkin ? 'block' : 'none';
            document.getElementById('registered-patient').style.display = isWalkin ? 'none' : 'block';
        });
    </script>
    
@endsection



{{-- by selecting deprtment doctors from the dropdown will be sorted --}}
{{-- <div class="mb-1">
    <label class="form-label fw-bold fs-5">Department</label>
    <select name="department_id" class="form-select form-control-lg" id="departmentSelect" >
        <option value="">Select Department</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select>
    @error('department_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-1">
    <label class="form-label fw-bold fs-5">Doctor</label>
    <select name="doctor_id" class="form-select form-control-lg" id="doctorSelect" >
        <option value="">Select Doctor</option>
        <!-- Doctors will be populated dynamically -->
    </select>
    @error('doctor_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#departmentSelect').on('change', function () {
            var departmentId = $(this).val();
            $('#doctorSelect').html('<option value="">Loading...</option>');

            if (departmentId) {
                $.ajax({
                    url: '{{ route("getDoctorsByDepartment") }}',
                    type: 'GET',
                    data: { department_id: departmentId },
                    success: function (data) {
                        $('#doctorSelect').empty().append('<option value="">Select Doctor</option>');
                        $.each(data, function (key, doctor) {
                            $('#doctorSelect').append('<option value="' + doctor.id + '">' + doctor.name + '</option>');
                        });
                    },
                    error: function () {
                        $('#doctorSelect').html('<option value="">Error loading doctors</option>');
                    }
                });
            } else {
                $('#doctorSelect').html('<option value="">Select Doctor</option>');
            }
        });
    });
</script>
@endsection


web.php :
Route::get('/get-doctors-by-department', [App\Http\Controllers\DoctorController::class, 'getDoctorsByDepartment'])->name('getDoctorsByDepartment');

Doctor controller :
public function getDoctorsByDepartment(Request $request)
{
    $departmentId = $request->department_id;
    $doctors = Doctor::where('department_id', $departmentId)->get();

    return response()->json($doctors);
} --}}

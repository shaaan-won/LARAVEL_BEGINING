@extends('layouts.backend.main')

@section('page-content')
    @php
        $users = DB::table('hms_users')->get();
        $departments = DB::table('hms_departments')->get(); 
    @endphp

    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Update Doctor Details of <span class="text-success">{{ $doctor->name }}</span></h4>
                        <a href="{{ url('doctors') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                    <div class="card-body table-responsive mt-2">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ url('doctors/' . $doctor->id) }}" id="doctor-form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="user_id">User Name</label>
                                <select class="form-select form-control-lg select2" id="user_id" name="user_id">
                                    <option value="">Select User</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $doctor->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Dr. John Doe" value="{{ old('name', $doctor->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control form-control-lg" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $doctor->date_of_birth) }}" />
                                @error('date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="department_id">Department</label>
                                <select class="form-select form-control-lg" id="department_id" name="department_id">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id', $doctor->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="specialization">Specialization</label>
                                <input type="text" class="form-control form-control-lg" id="specialization" name="specialization" placeholder="Cardiologist" value="{{ old('specialization', $doctor->specialization) }}" />
                                @error('specialization')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="experience">Experience (Years)</label>
                                <input type="number" class="form-control form-control-lg" id="experience" name="experience" value="{{ old('experience', $doctor->experience) }}" />
                                @error('experience')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="contact_number">Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number" class="form-control form-control-lg" placeholder="+1234567890" value="{{ old('contact_number', $doctor->contact_number) }}" />
                                @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="doctor@email.com" value="{{ old('email', $doctor->email) }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="address">Address</label>
                                <textarea class="form-control form-control-lg" id="address" name="address" rows="3" placeholder="Clinic Address">{{ old('address', $doctor->address) }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="gender">Gender</label>
                                <div class="form-check">
                                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input" {{ old('gender', $doctor->gender) == 'Male' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input" {{ old('gender', $doctor->gender) == 'Female' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="other" name="gender" value="Other" class="form-check-input" {{ old('gender') == 'Other' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="other">Other</label>
                                </div>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="qualification">Qualification</label>
                                <textarea class="form-control form-control-lg" id="qualification" name="qualification" rows="3" placeholder="Medical Degrees">{{ old('qualification', $doctor->qualification) }}</textarea>
                                @error('qualification')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="registration_no">Registration Number</label>
                                <input type="text" class="form-control form-control-lg" id="registration_no" name="registration_no" placeholder="REG123456" value="{{ old('registration_no', $doctor->registration_no) }}" />
                                @error('registration_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <!-- Doctor Photo Input -->
                                <div>
                                    <label for="photo" class="form-label fw-bold fs-5">Doctor's Profile Photo</label>
                                    <input class="form-control form-control-lg" type="file" id="photo" name="photo" accept="image/*"
                                           onchange="previewImage(event, 'photoPreview')" />
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <!-- Doctor's Photo Preview -->
                                <div>
                                    <img id="photoPreview"
                                         src="{{ old('photo') ? asset('img/doctors/' . old('photo')) : '#' }}" 
                                         alt="Doctor's Photo Preview"
                                         style="display: {{ old('photo') , asset('img/doctors/' . old('photo')) ? 'block' : 'none' }}; max-width: 120px; height: auto; border: 1px solid #ccc;" />
                                </div>
                            </div>
                            
                            <!-- Image Preview Script -->
                            <script>
                                function previewImage(event, previewId) {
                                    let input = event.target;
                                    let reader = new FileReader();
                            
                                    reader.onload = function () {
                                        let img = document.getElementById(previewId);
                                        img.src = reader.result;
                                        img.style.display = 'block'; // Show the image
                                    };
                            
                                    if (input.files && input.files[0]) {
                                        reader.readAsDataURL(input.files[0]); // Convert to Base64 URL
                                    }
                                }
                            </script>
                            
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="bio">Bio</label>
                                <textarea class="form-control form-control-lg" id="bio" name="bio" rows="3" placeholder="Short biography">{{ old('bio', $doctor->bio) }}</textarea>
                                @error('bio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="available_days">Available Days</label>
                                <input type="text" class="form-control form-control-lg" id="available_days" name="available_days" placeholder="e.g. Monday, Wednesday, Friday" value="{{ old('available_days', $doctor->available_days) }}" />
                                @error('available_days')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="available_time">Available Time</label>
                                <input type="text" class="form-control form-control-lg" id="available_time" name="available_time" placeholder="09:00 AM - 03:00 PM" value="{{ old('available_time', $doctor->available_time ) }}" />
                                @error('available_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="consultation_fee">Consultation Fee</label>
                                <input type="text" class="form-control form-control-lg" id="consultation_fee" name="consultation_fee" placeholder="200.00" value="{{ old('consultation_fee', $doctor->consultation_fee) }}" />
                                @error('consultation_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


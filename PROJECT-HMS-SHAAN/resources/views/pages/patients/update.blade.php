@extends('layout.erp.app')
@section('page')
    @php
        $users = DB::table('users')->get();
        // print_r($patient->toArray());
    @endphp


    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto"> <!-- Made width smaller -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Update Patient Details of <span class="text-success">{{ $patient->name }}</span></h4>
                        <a href="{{ url('patients') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ url('patients/' . $patient->id ) }}" id="patient-form" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mt-3 mb-1">
                                <label class="form-label fw-bold fs-5" for="user_name">User Name</label>
                                <select class="form-select form-control-lg select2" id="user_name" name="user_name">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_name', $patient->user_id ) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                        {{-- <option value="{{ $name }}" {{ old('country', $hospitals->country) == $name ? 'selected' : '' }}>
                                            {{ $user->name }}</option> --}}
                                    @endforeach
                                </select>
                                @error('user_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror                               
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    placeholder="John Doe" value="{{ old('name', $patient->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                    name="date_of_birth" value="{{ old('date_of_birth', $patient->date_of_birth) }}" />
                                @error('date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    placeholder="john.doe@email.com" value="{{ old('email', $patient->email) }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="contact_number">Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number"
                                    class="form-control form-control-lg" placeholder="+1234567890"
                                    value="{{ old('contact_number', $patient->contact_number) }}" />
                                @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="emergency_contact">Emergency Contact</label>
                                <input type="text" id="emergency_contact" name="emergency_contact"
                                    class="form-control form-control-lg" placeholder="+0987654321"
                                    value="{{ old('emergency_contact', $patient->emergency_contact) }}" />
                                @error('emergency_contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="address">Address</label>
                                <textarea class="form-control form-control-lg" id="address" name="address" rows="3"
                                    placeholder="123 Main St, City, Country">{{ old('address', $patient->address) }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 mt-2 float-l">
                                <label class="form-label fw-bold fs-5" for="gender">Gender</label>

                                <div class="form-check my-50">
                                    <input type="radio" id="male" name="gender" value="male"
                                        class="form-check-input" {{ old('gender', $patient->gender) == 'male' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="male">Male</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" id="female" name="gender" value="female"
                                        class="form-check-input" {{ old('gender', $patient->gender) == 'female' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="female">Female</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" id="other" name="gender" value="other"
                                        class="form-check-input" {{ old('gender', $patient->gender) == 'other' ? 'checked' : '' }} />
                                    <label class="form-check-label fs-5" for="other">Other</label>
                                </div>

                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="blood_group">Blood Group</label>
                                <select class="form-select form-control-lg" id="blood_group" name="blood_group">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+" {{ old('blood_group', $patient->blood_group ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_group', $patient->blood_group ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_group', $patient->blood_group ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_group', $patient->blood_group ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ old('blood_group', $patient->blood_group ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_group', $patient->blood_group ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ old('blood_group', $patient->blood_group ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_group', $patient->blood_group ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                                @error('blood_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="insurance_provider">Insurance Provider</label>
                                <input type="text" id="insurance_provider" name="insurance_provider"
                                    class="form-control form-control-lg" placeholder="BlueCross"
                                    value="{{ old('insurance_provider', $patient->insurance_provider) }}" />
                                @error('insurance_provider')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="insurance_number">Insurance Number</label>
                                <input type="text" id="insurance_number" name="insurance_number"
                                    class="form-control form-control-lg" placeholder="INS123456"
                                    value="{{ old('insurance_number', $patient->insurance_number) }}" />
                                @error('insurance_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" />
                                    <label class="form-check-label fs-5" for="terms">Agree to our terms and
                                        conditions</label>
                                    @error('terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

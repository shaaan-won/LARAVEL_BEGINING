@extends('layout.erp.app')
@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto"> <!-- Made width smaller -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder fs-2 ">Edit Hospital Details of <span
                                class="text-white">{{ $hospitals->name }}</span></h3>
                        <a href="{{ url('hospital_list') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        {{-- /// Validation Errors if there is any --}}
                        @if (session('success') || session('error'))
                            <div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="alert alert-{{ session('success') ? 'success' : (session('error') ? 'danger' : '') }}"
                                                role="alert">
                                                {{ session('success') ?? session('error') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- // form starts here --}}
                        <form action="{{ url('hospital_list/' . $hospitals->id) }}" id="hospital-form" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="hospital-name">Hospital Name</label>
                                <input type="text" class="form-control form-control-lg" id="hospital-name"
                                    name="hospital-name" placeholder="Enter Hospital Name"
                                    value="{{ old('hospital-name', $hospitals->name) }}" />
                                @error('hospital-name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Country Dropdown -->
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="country">Country</label>
                                <select class="form-select form-control-lg select2" id="country" name="country">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $key => $name)
                                        <option value="{{ $name }}"
                                            {{ old('country', $hospitals->country) == $name ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="address">Address</label>
                                <input type="text" class="form-control form-control-lg" id="address" name="address"
                                    placeholder="Enter Hospital Address"
                                    value="{{ old('address', $hospitals->address) }}" />
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="city">Website</label>
                                <input type="text" class="form-control form-control-lg" id="website" name="website"
                                    placeholder="Enter Hospital Website URL.com"
                                    value="{{ old('website', $hospitals->website) }}" />
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="phone">Phone</label>
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                                    placeholder="+1-212-555-1234" value="{{ old('phone', $hospitals->phone) }}" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="email">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="hospital@example.com" value="{{ old('email', $hospitals->email) }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="description">Description</label>
                                <textarea class="form-control form-control-lg" id="description" name="description" rows="3"
                                    placeholder="Brief hospital description"> {{ old('description', $hospitals->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <!-- Logo Input -->
                                <div>
                                    <label for="logo" class="form-label fw-bold fs-5">Logo</label>
                                    <input class="form-control form-control-lg" type="file" id="logo" name="logo"
                                        accept="image/*" onchange="previewImage(event, 'logoPreview')" />
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Logo Preview -->
                                <div>
                                    <img id="logoPreview"
                                        src="{{ old('logo', asset('img/hospital_list/logos/' . $hospitals->logo)) }}"
                                        alt="Logo Preview"
                                        style="display: {{ old('logo', asset('img/hospital_list/logos/' . $hospitals->logo)) ? 'block' : 'none' }}; max-width: 80px; height: auto; border: 1px solid #ccc;" />
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-3">
                                <!-- Banner Input -->
                                <div>
                                    <label for="banner" class="form-label fw-bold fs-5">Banner</label>
                                    <input class="form-control form-control-lg" type="file" id="banner"
                                        name="banner" accept="image/*"
                                        onchange="previewImage(event, 'bannerPreview')" />
                                    @error('banner')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Banner Preview -->
                                <div>
                                    <img id="bannerPreview"
                                        src="{{ old('banner', asset('img/hospital_list/banners/' . $hospitals->banner)) }}"
                                        alt="Banner Preview"
                                        style="display: {{ old('banner', asset('img/hospital_list/banners/' . $hospitals->banner)) ? 'block' : 'none' }}; max-width: 120px; height: auto; border: 1px solid #ccc;" />
                                </div>
                            </div>

                            <!-- Image Preview Script -->
                            <script>
                                function previewImage(event, previewId) {
                                    let input = event.target;
                                    let reader = new FileReader();

                                    reader.onload = function() {
                                        let img = document.getElementById(previewId);
                                        img.src = reader.result;
                                        img.style.display = 'block'; // Show the image
                                    };

                                    if (input.files && input.files[0]) {
                                        reader.readAsDataURL(input.files[0]); // Convert to Base64 URL
                                    }
                                }
                            </script>



                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.backend.main')



@section('page-content')
{{-- /// country list php code start --}}
    @php
        // Path to the local JSON file
        $jsonFilePath = public_path('app-assets/data/countries/countries.json');

        // Initialize an array for countries
        $countries = [];

        // Check if the file exists
        if (file_exists($jsonFilePath)) {
            // Fetch the contents of the JSON file
            $response = file_get_contents($jsonFilePath);

            // Check if the file content was retrieved
            if ($response !== false) {
                $countriesData = json_decode($response, true);

                // Loop through the API response and store country name in $countries
                foreach ($countriesData as $country) {
                    // Ensure that 'ccn3' and 'name' are present before using them
                    if (isset($country['ccn3']) && isset($country['name']['common'])) {
                        $countries[$country['ccn3']] = $country['name']['common'];
                    }
                }
            }
        }

        // Fallback countries (in case the file doesn't exist or is empty)
       $countries = array_merge(
           [
        'usa' => 'USA',
        'uk' => 'UK',
        'france' => 'France',
        'australia' => 'Australia',
        'spain' => 'Spain',
            ],
            $countries,
        ); // Merge file countries with the fallback list
    @endphp


    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto"> <!-- Made width smaller -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Add Hospital</h4>
                        <a href="{{ url('hospital_list') }}" class="btn btn-primary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        {{-- /// Validation Errors if there is any --}}
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        {{-- // form starts here --}}
                        <form action="{{ url('hospital_list') }}" id="hospital-form" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="hospital-name">Hospital Name</label>
                                <input type="text" class="form-control form-control-lg" id="hospital-name"
                                    name="hospital-name" placeholder="Enter Hospital Name"
                                    value="{{ old('hospital-name') }}" />
                                @error('hospital-name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="country">Country</label>
                                <select class="form-select form-control-lg" id="country" name="country"
                                    value="{{ old('country') }}">
                                    <option value="">Select Country</option>
                                    <option value="usa">USA</option>
                                    <option value="uk">UK</option>
                                    <option value="france">France</option>
                                    <option value="australia">Australia</option>
                                    <option value="spain">Spain</option>
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <!-- Country Dropdown -->
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="country">Country</label>
                                <select class="form-select form-control-lg select2" id="country" name="country">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $key => $name)
                                        <option value="{{ $name }}" {{ old('country') == $name ? 'selected' : '' }}>
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
                                    placeholder="Enter Hospital Address" value="{{ old('address') }}" />
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="city">Website</label>
                                <input type="text" class="form-control form-control-lg" id="website" name="website"
                                    placeholder="Enter Hospital Website URL.com" value="{{ old('website') }}" />
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="phone">Phone</label>
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                                    placeholder="+1-212-555-1234" value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="email">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="hospital@example.com" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="description">Description</label>
                                <textarea class="form-control form-control-lg" id="description" name="description" rows="3"
                                    placeholder="Brief hospital description"> {{ old('description') }}</textarea>
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
                                         src="{{ old('logo') ? asset('img/hospital_list/logos/' . old('logo')) : '#' }}" 
                                         alt="Logo Preview"
                                         style="display: {{ old('logo') ? 'block' : 'none' }}; max-width: 80px; height: auto; border: 1px solid #ccc;" />
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
                                         src="{{ old('banner') ? asset('img/hospital_list/banners/' . old('banner')) : '#' }}" 
                                         alt="Banner Preview"
                                         style="display: {{ old('banner') ? 'block' : 'none' }}; max-width: 120px; height: auto; border: 1px solid #ccc;" />
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
                            


                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script>
        $countries = fetch("https://restcountries.com/v3.1/all")
            .then(response => response.json())
            .then(data => {
                let countryDropdown = document.getElementById("country");
                data.forEach(country => {
                    let option = document.createElement("option");
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    countryDropdown.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching countries:", error));
    </script> --}}
@endsection

@extends('layouts.backend.main')

@section('page-content')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto"> <!-- Made width smaller -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Add Hospital</h4>
                        <a href="{{ url('hospital_list') }}" class="btn btn-primary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('hospital_list') }}" id="hospital-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="hospital-name">Hospital Name</label>
                                <input type="text" class="form-control form-control-lg" id="hospital-name"
                                    name="hospital-name" placeholder="Enter Hospital Name" />
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="country">Country</label>
                                <select class="form-select form-control-lg" id="country" name="country">
                                    <option value="">Select Country</option>
                                    <option value="usa">USA</option>
                                    <option value="uk">UK</option>
                                    <option value="france">France</option>
                                    <option value="australia">Australia</option>
                                    <option value="spain">Spain</option>
                                </select>
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="address">Address</label>
                                <input type="text" class="form-control form-control-lg" id="address" name="address"
                                    placeholder="Enter Hospital Address" />
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="phone">Phone</label>
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                                    placeholder="+1-212-555-1234" />
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="email">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="hospital@example.com" />
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="description">Description</label>
                                <textarea class="form-control form-control-lg" id="description" name="description" rows="3"
                                    placeholder="Brief hospital description"></textarea>
                            </div>

                            <div class="mb-1">
                                <label for="logo" class="form-label fw-bold fs-5">Logo</label>
                                <input class="form-control form-control-lg" type="file" id="logo" name="logo" />
                            </div>

                            <div class="mb-1">
                                <label for="banner" class="form-label fw-bold fs-5">Banner</label>
                                <input class="form-control form-control-lg" type="file" id="banner" name="banner" />
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        fetch("https://restcountries.com/v3.1/all")
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
    </script>
@endsection

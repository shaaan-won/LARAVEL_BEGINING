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
                    <form id="jquery-val-form" method="post">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="basic-default-name">Name</label>
                            <input type="text" class="form-control form-control-lg" id="basic-default-name" name="basic-default-name"
                                placeholder="John Doe" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="basic-default-email">Email</label>
                            <input type="text" id="basic-default-email" name="basic-default-email"
                                class="form-control form-control-lg" placeholder="john.doe@email.com" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="basic-default-password">Password</label>
                            <input type="password" id="basic-default-password" name="basic-default-password"
                                class="form-control form-control-lg"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control form-control-lg"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="dob">DOB</label>
                            <input type="text" class="form-control form-control-lg" name="dob" id="dob" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="select-country">Country</label>
                            <select class="form-select form-control-lg select2" id="select-country" name="select-country">
                                <option value="">Select Country</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                                <option value="france">France</option>
                                <option value="australia">Australia</option>
                                <option value="spain">Spain</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="customFile" class="form-label fw-bold fs-5">Profile pic</label>
                            <input class="form-control form-control-lg" type="file" id="customFile" name="customFile" />
                        </div>
                        <div class="mb-1">
                            <label class="d-block form-label fw-bold fs-5">Gender</label>
                            <div class="form-check my-50">
                                <input type="radio" id="validationRadiojq1" name="validationRadiojq"
                                    class="form-check-input" />
                                <label class="form-check-label fs-5" for="validationRadiojq1">Male</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="validationRadiojq2" name="validationRadiojq"
                                    class="form-check-input" />
                                <label class="form-check-label fs-5" for="validationRadiojq2">Female</label>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="d-block form-label fw-bold fs-5" for="validationBio">Bio</label>
                            <textarea class="form-control form-control-lg" id="validationBio" name="validationBiojq" rows="3"></textarea>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="validationCheck"
                                    name="validationCheck" />
                                <label class="form-check-label fs-5" for="validationCheck">Agree to our terms and
                                    conditions</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



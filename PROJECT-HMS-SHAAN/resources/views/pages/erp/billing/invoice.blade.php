@extends('layout.erp.app')

@section('title', 'Invoice')

{{-- @section('style')
    <style>
        .bill-header {
            background-color: #8E44AD;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .final-amount {
            background-color: #D5C2E8;
            font-weight: bold;
        }

        .signature {
            margin-top: 20px;
        }
    </style>
@endsection --}}

@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-12 mt-3 mx-auto ">
                <div class="card mb-4">
                    <!-- Card Header -->
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Hospital Bill Book & Invoice </h3>
                        <a href="{{ route('billings.index') }}" class="btn btn-lg btn-warning">Manage Billings</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Bill Details -->
                        <div class="row-md fs-4 d-flex justify-content-between">
                            <div class="col-md-6">
                                <strong>Bill No: #{{ date('Ymd') }}-HMS-A00<span id="bill_no"
                                        class="fw-bold"></span></strong>
                            </div>
                            <div class="col-md-6"><strong>Bill Date:{{ date('d-m-Y h:i A') }}</strong></div>
                        </div>

                        <!-- Patient Details Table -->
                        <div class="card-header ">
                            <table class="table ">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <label for="patient_name" class="me-2"><strong>Name of
                                                    Patient:</strong></label>
                                            <select name="patient_name" id="patient_name" class="form-control w-50"
                                                required>
                                                <option value="">Select Patient</option>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                        </div>
                                    </td>
                                    <td><strong>Address: <span id="patient_address"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile No.: <span id="patient_contact"></span></strong></td>
                                    <td><strong>Email: <span id="patient_email"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Name of Treating Doctor: <span id="doctor_name"></span></strong></td>
                                    <td><strong>Department: <span id="department"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Appointment Date: <span id="appointment_date"></span></strong></td>
                                    <td><strong>Appointment Time: <span id="appointment_time"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Date/Time of Admission:</strong></td>
                                    <td><strong>Date/Time of Discharge:</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Accommodation Type:</strong></td>
                                    <td><strong>Room No.:</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Diagnosis:</strong></td>
                                </tr>
                            </table>
                        </div>

                        <!-- Billing Tables -->
                        <div class="card-body">
                            <!-- Professional Fees Table -->
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Total Professional Fees</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Price/Unit</th>
                                        <th>GST (%)</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Billing Heads Table -->
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Billing Heads</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Price/Unit</th>
                                        <th>GST (%)</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Amount Summary -->
                            <div class="row mt-3">
                                <div class="col-md-6"><strong>Amount In Words:</strong></div>
                                <div class="col-md-6 text-end">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Sub Total:</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Discount:</strong></td>
                                        </tr>
                                        <tr class="final-amount">
                                            <td><strong>Final Amount:</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount Paid:</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Balance:</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="mt-3"><strong>Declaration:</strong></div>
                            <div class="signature row">
                                <div class="col-md-6 text-start"><strong>Client's Signature</strong></div>
                                <div class="col-md-6 text-end"><strong>Business Signature</strong></div>
                            </div>
                            <div class="text-center mt-3">
                                <strong>Thanks for business with us!!! Please visit us again !!!</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            //  alert('hello');
            // const cart = new Cart('consultations');
            // printCart();
            function formatDate(dateTimeString) {
                const date = new Date(dateTimeString); // Parse the date-time string
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }; // Customize the format
                return date.toLocaleDateString(undefined, options); // Format to a readable date
            }
            $('select').select2();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "api/billings/lastID", // Replace with Laravel route
                type: "get",
                success: function(response) {
                    // console.log("Success:", response);
                    let newbillno = parseInt(response.last_id) + 1;
                    $("#bill_no").text(newbillno);

                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
            $.ajax({
                url: "api/patients", // Replace with Laravel route
                type: "get", // Use GET, POST, PUT, DELETE
                data: {
                    key1: "",
                    key2: "",
                },
                success: function(response) {
                    // console.log("Successfully Data Loaded.");
                    // console.log(response);

                    if (Array.isArray(response)) { // Check if response is an array
                        response.forEach(patient => {
                            // console.log("Patient_ID:", patient.id);
                            // console.log("Patient_Name:", patient.name);
                            html = "";
                            html += '<option value="' + patient.id + '">' + patient.name +
                                '</option>';
                            $("#patient_name").append(html);
                        });
                    } else {
                        // console.log("Single Patient ID:", response.id);
                        // console.log("Single Patient Name:", response.name);
                        html = "";
                        html += '<option value="' + response.id + '">' + response.name +
                            '</option>';
                        $("#patient_name").append(html);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
            $("#patient_name").on("change", function() {
                let patient_id = $(this).val();
                // console.log(patient_id);
                $.ajax({
                    url: "api/patients/" + patient_id, // Replace with Laravel route
                    type: "get", // Use GET, POST, PUT, DELETE
                    data: {
                        key1: "",
                        key2: "",
                    },
                    success: function(response) {
                        // console.log("Successfully Data Loaded.");
                        // console.log(response);
                        $("#patient_address").text(response.address);
                        $("#patient_contact").text(response.contact_number);
                        $("#patient_email").text(response.email);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
                $.ajax({
                    url: "api/appointments/" + patient_id, // Laravel API route
                    type: "GET",
                    success: function(response) {
                        let appointment = null;

                        if (response.approved && response.approved.length > 0) {
                            appointment = response.approved[
                            0]; // Get the first approved appointment
                        } else if (response.completed && response.completed.length > 0) {
                            appointment = response.completed[
                            0]; // Get the first completed appointment
                        } else if (response.ongoing && response.ongoing.length > 0) {
                            appointment = response.ongoing[
                            0]; // Get the first ongoing appointment
                        }

                        if (appointment) {
                            $("#appointment_date").text(appointment.appointment_date);
                            $("#appointment_time").text(appointment.appointment_time);

                            // Ensure doctor_id exists before making AJAX request
                            if (appointment.doctor_id) {
                                $.ajax({
                                    url: "api/doctors/" + appointment
                                    .doctor_id, // Laravel API route
                                    type: "GET",
                                    success: function(response) {
                                        console.log("Successfully Data Loaded.");
                                        console.log(response[0]);
                                        $("#doctor_name").text(response[0].name);
                                        // $("#department").text(response.department);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(
                                            "Error fetching doctor details:",
                                            error);
                                        $("#doctor_name").text(
                                            "Error loading doctor details.");
                                    }
                                });
                            } else {
                                console.error("Invalid appointment or missing doctor ID.");
                                $("#doctor_name").text("No doctor assigned.");
                            }
                        } else {
                            // No appointments found, reset UI
                            console.log("No appointments found.");
                            $("#appointment_date").text("No appointments found.");
                            $("#appointment_time").text("No appointments found.");
                            $("#doctor_name").text("");
                            // $("#doctor_name").text("No doctor found.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching appointments:", error);
                        $("#appointment_date").text("Error loading appointments.");
                        $("#appointment_time").text("Error loading appointments.");
                        $("#doctor_name").text("Error loading doctor details.");
                    }
                });

            })
        })
    </script>
    <script src="{{ asset('assets') }}/js/cart-invoice/cart_.js"></script>
@endsection

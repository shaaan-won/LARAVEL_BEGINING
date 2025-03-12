@extends('layout.erp.app')

@section('title', 'Invoice')

@section('style')
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
@endsection

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
                    <div class="row mt-3">
                        <div class="col-md-6"><strong>Bill No.: <span id="bill_no" class="fw-bold"></span></strong></div>
                        <div class="col-md-6 text-end"><strong>Bill Date:</strong></div>
                    </div>

                    <!-- Patient Details Table -->
                    <div class="card-header mt-3">
                        <table class="table mt-2">
                            <tr>
                                <td><strong>Name of Patient: </strong></td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Date/Time of Admission:</strong></td>
                                <td><strong>Date/Time of Discharge:</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Treating Doctor:</strong></td>
                                <td><strong>Department:</strong></td>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        })
        $.ajax({
            url: "/api/billings/lastID", // Replace with Laravel route
            type: "get", // Use GET, POST, PUT, DELETE
            data: {
                key1: "",
                key2: "",
            },
            success: function(response) {
                console.log("Success:", response);

            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });

        
    </script>
    <script src="{{ asset('assets') }}/js/cart-invoice/cart_.js"></script>
@endsection

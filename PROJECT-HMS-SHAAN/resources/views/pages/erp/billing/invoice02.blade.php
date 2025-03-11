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

    <div class="container mt-3 border p-3">
        <div class="bill-header">Hospital Bill Book Format</div>
        <div class="row mt-3">
            <div class="col-md-6"><strong>Bill No.:</strong></div>
            <div class="col-md-6 text-end"><strong>Bill Date:</strong></div>
        </div>
        <table class="table table-bordered mt-2">
            <tr>
                <td><strong>Name of Patient:</strong></td>
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

        <div class="row">
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

        <div class="mt-3"><strong>Declaration:</strong></div>
        <div class="signature row">
            <div class="col-md-6 text-start"><strong>Client's Signature</strong></div>
            <div class="col-md-6 text-end"><strong>Business Signature</strong></div>
        </div>
        <div class="text-center mt-3"><strong>Thanks for business with us!!! Please visit us again !!!</strong></div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            alert('hello');
        })
    </script>
    <script src="{{ asset('assets') }}/js/cart-invoice/cart_.js"></script>
@endsection


{{-- <div class="container invoice-2 ">
    <div class="card">
        <div class="card-body">
            <table class="table-wrapper table-responsive theme-scrollbar">
                <tbody>
                    <tr>
                        <td>
                            <table class="table-responsive" style="width: 100%;">
                                <tbody>
                                    <tr style="padding: 28px 0 5px; display: flex; justify-content: space-between;">
                                        <td>
                                            <h4 style="font-size:42px; font-weight: 600;color: #7A70BA; margin:0;">
                                                INVOICE</h4>
                                            <ul
                                                style="list-style: none; display: flex; gap:15px; padding: 0; margin: 20px 0;">
                                                <li> <span
                                                        style=" font-size: 16px; font-weight: 600; opacity: 0.8;">Invoice
                                                        to :</span>
                                                </li>
                                                <li> <span
                                                        style="font-weight:600;font-size: 16px; color: #7A70BA; display: block; margin-bottom: 8px;">Brooklyn
                                                        Simmons</span><span
                                                        style="width: 75%; display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">2972
                                                        Westheimer Rd. Santa Ana, Illinois 85486 </span><span
                                                        style="line-height:1.9;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Phone
                                                        : (219) 555-0114</span><span
                                                        style="line-height:1.7;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Email
                                                        : yourmail@themesforest.com</span><span
                                                        style="line-height:1.7;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Website:
                                                        www.websites.com</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <img class="img-fluid for-light"
                                                src="{{ asset('assets') }}/images/logo/logo.png" alt=""
                                                style="margin-bottom: 14px;"><img class="img-fluid for-dark"
                                                src="{{ asset('assets') }}/images/logo/logo_light.png" alt=""
                                                style="margin-bottom: 14px;"><span
                                                style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">2118
                                                Thornridge Cir. Syracuse, Connecticut 35624, United State</span><span
                                                style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Phone
                                                : (239) 555-0108</span><span
                                                style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Email
                                                : Mofi@themesforest.com</span><span
                                                style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Website:
                                                www.Mofithemes.com</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table-responsive"
                                style="width: 100%; border-spacing: 4px; margin-bottom: 20px;">
                                <tbody>
                                    <tr>
                                        <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                            <p
                                                style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">
                                                Date :</p><span style="font-size: 16px; font-weight: 600;">10 Mar,
                                                2023</span>
                                        </td>
                                        <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                            <p
                                                style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">
                                                Invoice No :</p><span
                                                style="font-size: 16px; font-weight: 600;">#VL25000365</span>
                                        </td>
                                        <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                            <p
                                                style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">
                                                Account No :</p><span
                                                style="font-size: 16px; font-weight: 600;">0981234098765</span>
                                        </td>
                                        <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                            <p
                                                style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">
                                                Due Amount :</p><span
                                                style="font-size: 16px; font-weight: 600;">$7860.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table-responsive" style="width: 100%; border-spacing:0;">
                                <thead>
                                    <tr style="background: #7A70BA;">
                                        <th
                                            style="padding: 18px 15px;text-align: left; position: relative; border-top-left-radius: 10px;">
                                            <span
                                                style="color: #fff; font-size: 16px; font-weight: 600;">Description</span>
                                        </th>
                                        <th style="padding: 18px 15px;text-align: center"><span
                                                style="color: #fff; font-size: 16px; font-weight: 600;">Unite
                                                Price</span></th>
                                        <th style="padding: 18px 15px;text-align: center"><span
                                                style="color: #fff; font-size: 16px; font-weight: 600;">Quantity</span>
                                        </th>
                                        <th
                                            style="padding: 18px 15px;text-align: center;position: relative; border-top-right-radius: 10px;">
                                            <span
                                                style="color: #fff; font-size: 16px; font-weight: 600;">Subtotal</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 30px;">
                                            <h4
                                                style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">
                                                Proposal & Brochure Design</h4><span
                                                style="opacity: 0.8; font-size: 16px;">Regular License</span>
                                        </td>
                                        <td style="width: 12%; text-align: center;"><span
                                                style="opacity: 0.8;">$300.00</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="opacity: 0.8;">1</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$300.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 30px 30px;">
                                            <h4
                                                style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">
                                                Web design and development</h4><span
                                                style="opacity: 0.8; font-size: 16px;">Regular License</span>
                                        </td>
                                        <td style="width: 12%; text-align: center;"><span
                                                style="opacity: 0.8;">$400.00</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="opacity: 0.8;">2</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$800.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 30px 30px;">
                                            <h4
                                                style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">
                                                Logo & Brand design</h4><span
                                                style="opacity: 0.8; font-size: 16px;">Regular License</span>
                                        </td>
                                        <td style="width: 12%; text-align: center;"><span
                                                style="opacity: 0.8;">$240.00</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="opacity: 0.8;">2</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$4800.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 30px 30px;">
                                            <h4
                                                style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">
                                                Stationary Design</h4><span
                                                style="opacity: 0.8; font-size: 16px;">Regular License</span>
                                        </td>
                                        <td style="width: 12%; text-align: center;"><span
                                                style="opacity: 0.8;">$100.00</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="opacity: 0.8;">1</span></td>
                                        <td style="width: 12%; text-align: center;"> <span
                                                style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$100.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr
                        style="height:3px; width: 100%; background: linear-gradient(90deg, #7A70BA 20.61%, #0DA759 103.6%); display:block; margin-top: 6px;">
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%;">
                                <tbody>
                                    <tr
                                        style="display:flex; justify-content: space-between; margin:16px 0 24px 0; align-items: end;">
                                        <td style="display: flex; gap: 10px;"><span
                                                style="color: #7A70BA; font-size: 16px; font-weight: 500; font-weight: 600;">Payment
                                                Teams : </span><span
                                                style=" display:block; line-height: 1.5;  font-size: 16px; font-weight: 400; width: 55%;">This
                                                denotes a payment credit for a full month's supply.</span></td>
                                        <td>
                                            <ul style="padding: 0; margin: 0; list-style: none;">
                                                <li style="display:flex; padding-bottom: 16px;"> <span
                                                        style="display: block; width: 95px; ">Subtotal </span><span
                                                        style="display: block; width:25px;">:</span><span
                                                        style="display: block;  width: 95px; color: #7A70BA; opacity: 0.9; font-weight:600;">$6100.00</span>
                                                </li>
                                                <li style="display:flex; padding-bottom: 16px;"> <span
                                                        style="display: block; width: 95px; ">Tax</span><span
                                                        style="display: block; width:25px;"> :</span><span
                                                        style="display: block; width: 95px;color: #7A70BA; opacity: 0.9; font-weight:600;">$50.00</span>
                                                </li>
                                                <li style="display:flex; padding-bottom: 20px;"> <span
                                                        style="display: block; width: 95px; ">Discount </span><span
                                                        style="display: block; width:25px;"> :</span><span
                                                        style="display: block; width: 95px;color: #7A70BA; opacity: 0.9; font-weight:600;">$30.00</span>
                                                </li>
                                                <li style="display:flex; align-items: center;"> <span
                                                        style="display: block; width: 95px; ">Total Due</span><span
                                                        style="display: block; color: #7A70BA; opacity: 0.9; font-weight:600; padding: 12px 25px; border-radius: 5px; background: rgba(122, 112, 186 , 0.1); font-size: 16px;">$6120.00</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr style="width: 100%; display: flex; justify-content: space-between;">
                        <td> <img src="{{ asset('assets') }}/images/email-template/invoice-3/sign.png"
                                alt="sign"><span
                                style="color: #7A70BA;display: block;font-size: 16px;font-weight: 600;">Laurine T.
                                Ebbert</span><span style=" display: block; font-size: 14px; padding-top: 5px;">(
                                Designer )</span></td>
                        <td> <span style="display: flex; justify-content: end; gap: 15px;"><a
                                    style="background: rgba(122, 112, 186, 1); color:rgba(255, 255, 255, 1);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;"
                                    href="#!" onclick="window.print();">Print Invoice<i class="icon-arrow-right"
                                        style="font-size:13px;font-weight:bold; margin-left: 10px;"></i></a><a
                                    style="background: rgba(122, 112, 186, 0.1);color: rgba(122, 112, 186, 1);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;"
                                    href="../template/invoice-1.html" download="">Download<i
                                        class="icon-arrow-right"
                                        style="font-size:13px;font-weight:bold; margin-left: 10px;"></i></a></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div> --}}

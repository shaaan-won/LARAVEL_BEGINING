@extends('layout.erp.app')

@section('title', 'Invoice')

@section('style')

@endsection

@section('page')
<div class="container invoice-2 ">
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
                        <h4 style="font-size:42px; font-weight: 600;color: #7A70BA; margin:0;">INVOICE</h4>
                        <ul style="list-style: none; display: flex; gap:15px; padding: 0; margin: 20px 0;">
                          <li> <span style=" font-size: 16px; font-weight: 600; opacity: 0.8;">Invoice to :</span></li>
                          <li> <span style="font-weight:600;font-size: 16px; color: #7A70BA; display: block; margin-bottom: 8px;">Brooklyn Simmons</span><span style="width: 75%; display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">2972 Westheimer Rd. Santa Ana, Illinois 85486 </span><span style="line-height:1.9;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Phone : (219) 555-0114</span><span style="line-height:1.7;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Email : yourmail@themesforest.com</span><span style="line-height:1.7;  font-size: 16px; font-weight: 400;opacity: 0.8; display:block;">Website: www.websites.com</span></li>
                        </ul>
                      </td>
                      <td><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt="" style="margin-bottom: 14px;"><img class="img-fluid for-dark" src="../assets/images/logo/logo_light.png" alt="" style="margin-bottom: 14px;"><span style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">2118 Thornridge Cir. Syracuse, Connecticut 35624, United State</span><span style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Phone : (239) 555-0108</span><span style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Email : Mofi@themesforest.com</span><span style="display:block; line-height: 1.5;  font-size: 16px; font-weight: 400;opacity: 0.8;">Website: www.Mofithemes.com</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr> 
              <td> 
                <table class="table-responsive" style="width: 100%; border-spacing: 4px; margin-bottom: 20px;">
                  <tbody>
                    <tr> 
                      <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                        <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Date :</p><span style="font-size: 16px; font-weight: 600;">10 Mar, 2023</span>
                      </td>
                      <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;"> 
                        <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Invoice No :</p><span style="font-size: 16px; font-weight: 600;">#VL25000365</span>
                      </td>
                      <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;"> 
                        <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Account No :</p><span style="font-size: 16px; font-weight: 600;">0981234098765</span>
                      </td>
                      <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;"> 
                        <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Due Amount :</p><span style="font-size: 16px; font-weight: 600;">$7860.00</span>
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
                      <th style="padding: 18px 15px;text-align: left; position: relative; border-top-left-radius: 10px;"><span style="color: #fff; font-size: 16px; font-weight: 600;">Description</span></th>
                      <th style="padding: 18px 15px;text-align: center"><span style="color: #fff; font-size: 16px; font-weight: 600;">Unite Price</span></th>
                      <th style="padding: 18px 15px;text-align: center"><span style="color: #fff; font-size: 16px; font-weight: 600;">Quantity</span></th>
                      <th style="padding: 18px 15px;text-align: center;position: relative; border-top-right-radius: 10px;"><span style="color: #fff; font-size: 16px; font-weight: 600;">Subtotal</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="padding: 30px;">
                        <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Proposal & Brochure Design</h4><span style="opacity: 0.8; font-size: 16px;">Regular License</span>
                      </td>
                      <td style="width: 12%; text-align: center;"><span style="opacity: 0.8;">$300.00</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="opacity: 0.8;">1</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$300.00</span></td>
                    </tr>
                    <tr>
                      <td style="padding: 0 30px 30px;">
                        <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Web design and development</h4><span style="opacity: 0.8; font-size: 16px;">Regular License</span>
                      </td>
                      <td style="width: 12%; text-align: center;"><span style="opacity: 0.8;">$400.00</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="opacity: 0.8;">2</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$800.00</span></td>
                    </tr>
                    <tr>
                      <td style="padding: 0 30px 30px;">
                        <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Logo & Brand  design</h4><span style="opacity: 0.8; font-size: 16px;">Regular License</span>
                      </td>
                      <td style="width: 12%; text-align: center;"><span style="opacity: 0.8;">$240.00</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="opacity: 0.8;">2</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$4800.00</span></td>
                    </tr>
                    <tr>
                      <td style="padding: 0 30px 30px;">
                        <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Stationary Design</h4><span style="opacity: 0.8; font-size: 16px;">Regular License</span>
                      </td>
                      <td style="width: 12%; text-align: center;"><span style="opacity: 0.8;">$100.00</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="opacity: 0.8;">1</span></td>
                      <td style="width: 12%; text-align: center;"> <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$100.00</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr style="height:3px; width: 100%; background: linear-gradient(90deg, #7A70BA 20.61%, #0DA759 103.6%); display:block; margin-top: 6px;"></tr>
            <tr> 
              <td>
                <table style="width:100%;">
                  <tbody>
                    <tr style="display:flex; justify-content: space-between; margin:16px 0 24px 0; align-items: end;">
                      <td style="display: flex; gap: 10px;"><span style="color: #7A70BA; font-size: 16px; font-weight: 500; font-weight: 600;">Payment Teams : </span><span style=" display:block; line-height: 1.5;  font-size: 16px; font-weight: 400; width: 55%;">This denotes a payment credit for a full month's supply.</span></td>
                      <td>
                        <ul style="padding: 0; margin: 0; list-style: none;">
                          <li style="display:flex; padding-bottom: 16px;"> <span style="display: block; width: 95px; ">Subtotal           </span><span style="display: block; width:25px;">:</span><span style="display: block;  width: 95px; color: #7A70BA; opacity: 0.9; font-weight:600;">$6100.00</span></li>
                          <li style="display:flex; padding-bottom: 16px;"> <span style="display: block; width: 95px; ">Tax</span><span style="display: block; width:25px;"> :</span><span style="display: block; width: 95px;color: #7A70BA; opacity: 0.9; font-weight:600;">$50.00</span></li>
                          <li style="display:flex; padding-bottom: 20px;"> <span style="display: block; width: 95px; ">Discount     </span><span style="display: block; width:25px;">     :</span><span style="display: block; width: 95px;color: #7A70BA; opacity: 0.9; font-weight:600;">$30.00</span></li>
                          <li style="display:flex; align-items: center;"> <span style="display: block; width: 95px; ">Total Due</span><span style="display: block; color: #7A70BA; opacity: 0.9; font-weight:600; padding: 12px 25px; border-radius: 5px; background: rgba(122, 112, 186 , 0.1); font-size: 16px;">$6120.00</span></li>
                        </ul>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr style="width: 100%; display: flex; justify-content: space-between;">
              <td> <img src="../assets/images/email-template/invoice-3/sign.png" alt="sign"><span style="color: #7A70BA;display: block;font-size: 16px;font-weight: 600;">Laurine T. Ebbert</span><span style=" display: block; font-size: 14px; padding-top: 5px;">( Designer )</span></td>
              <td> <span style="display: flex; justify-content: end; gap: 15px;"><a style="background: rgba(122, 112, 186, 1); color:rgba(255, 255, 255, 1);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;" href="#!" onclick="window.print();">Print Invoice<i class="icon-arrow-right" style="font-size:13px;font-weight:bold; margin-left: 10px;"></i></a><a style="background: rgba(122, 112, 186, 0.1);color: rgba(122, 112, 186, 1);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;" href="../template/invoice-1.html" download="">Download<i class="icon-arrow-right" style="font-size:13px;font-weight:bold; margin-left: 10px;"></i></a></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection


{{-- @extends('layout.erp.app')
@section('title', 'Create Billing')
@section('style')
<style>
    .invoice-2 {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .table-responsive {
        width: 100%;
    }
    .table-responsive th, .table-responsive td {
        padding: 15px;
        text-align: left;
    }
    .table-responsive th {
        background: #7A70BA;
        color: #fff;
        font-weight: 600;
    }
    .form-control-lg {
        font-size: 16px;
        padding: 10px;
    }
    .btn-primary {
        background: #7A70BA;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
    }
    .btn-primary:hover {
        background: #5a4f9f;
    }
</style>
@endsection

@section('page')
<div class="container invoice-2">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('billings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table-wrapper table-responsive theme-scrollbar">
                    <tbody>
                        <!-- Patient Details -->
                        <tr>
                            <td>
                                <table class="table-responsive" style="width: 100%;">
                                    <tbody>
                                        <tr style="padding: 28px 0 5px; display: flex; justify-content: space-between;">
                                            <td>
                                                <h4 style="font-size:42px; font-weight: 600;color: #7A70BA; margin:0;">CREATE BILLING</h4>
                                                <ul style="list-style: none; display: flex; gap:15px; padding: 0; margin: 20px 0;">
                                                    <li>
                                                        <span style="font-size: 16px; font-weight: 600; opacity: 0.8;">Patient Name:</span>
                                                        <input type="text" class="form-control form-control-lg" name="patient_name" placeholder="Patient Name" required>
                                                    </li>
                                                    <li>
                                                        <span style="font-size: 16px; font-weight: 600; opacity: 0.8;">Address:</span>
                                                        <input type="text" class="form-control form-control-lg" name="patient_address" placeholder="Address" required>
                                                    </li>
                                                    <li>
                                                        <span style="font-size: 16px; font-weight: 600; opacity: 0.8;">Phone:</span>
                                                        <input type="text" class="form-control form-control-lg" name="patient_phone" placeholder="Phone" required>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Billing Details -->
                        <tr>
                            <td>
                                <table class="table-responsive" style="width: 100%; border-spacing: 4px; margin-bottom: 20px;">
                                    <tbody>
                                        <tr>
                                            <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                                <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Date:</p>
                                                <input type="date" class="form-control form-control-lg" name="billing_date" required>
                                            </td>
                                            <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                                <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Invoice No:</p>
                                                <input type="text" class="form-control form-control-lg" name="invoice_no" placeholder="Invoice No" required>
                                            </td>
                                            <td style="background: rgba(122, 112, 186 , 0.1);padding: 15px 25px;">
                                                <p style="font-size:16px; font-weight:500; color:#7A70BA; opacity:0.8; margin:0;line-height: 2;">Account No:</p>
                                                <input type="text" class="form-control form-control-lg" name="account_no" placeholder="Account No" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Services, Lab Tests, Beds, Medicines -->
                        <tr>
                            <td>
                                <table class="table-responsive" style="width: 100%; border-spacing:0;">
                                    <thead>
                                        <tr style="background: #7A70BA;">
                                            <th style="padding: 18px 15px;text-align: left; border-top-left-radius: 10px;">
                                                <span style="color: #fff; font-size: 16px; font-weight: 600;">Description</span>
                                            </th>
                                            <th style="padding: 18px 15px;text-align: center">
                                                <span style="color: #fff; font-size: 16px; font-weight: 600;">Unit Price</span>
                                            </th>
                                            <th style="padding: 18px 15px;text-align: center">
                                                <span style="color: #fff; font-size: 16px; font-weight: 600;">Quantity</span>
                                            </th>
                                            <th style="padding: 18px 15px;text-align: center; border-top-right-radius: 10px;">
                                                <span style="color: #fff; font-size: 16px; font-weight: 600;">Subtotal</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Consultation -->
                                        <tr>
                                            <td style="padding: 30px;">
                                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Consultation</h4>
                                                <select class="form-control form-control-lg" name="consultation_id">
                                                    @foreach($consultations as $consultation)
                                                        <option value="{{ $consultation->id }}">{{ $consultation->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="text" class="form-control form-control-lg" name="consultation_price" placeholder="Price" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="number" class="form-control form-control-lg" name="consultation_quantity" placeholder="Qty" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$0.00</span>
                                            </td>
                                        </tr>

                                        <!-- Lab Tests -->
                                        <tr>
                                            <td style="padding: 0 30px 30px;">
                                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Lab Tests</h4>
                                                <select class="form-control form-control-lg" name="lab_test_id">
                                                    @foreach($lab_tests as $lab_test)
                                                        <option value="{{ $lab_test->id }}">{{ $lab_test->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="text" class="form-control form-control-lg" name="lab_test_price" placeholder="Price" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="number" class="form-control form-control-lg" name="lab_test_quantity" placeholder="Qty" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$0.00</span>
                                            </td>
                                        </tr>

                                        <!-- Beds -->
                                        <tr>
                                            <td style="padding: 0 30px 30px;">
                                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Beds</h4>
                                                <select class="form-control form-control-lg" name="bed_id">
                                                    @foreach($beds as $bed)
                                                        <option value="{{ $bed->id }}">{{ $bed->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="text" class="form-control form-control-lg" name="bed_price" placeholder="Price" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="number" class="form-control form-control-lg" name="bed_quantity" placeholder="Qty" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$0.00</span>
                                            </td>
                                        </tr>

                                        <!-- Medicines -->
                                        <tr>
                                            <td style="padding: 0 30px 30px;">
                                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #7A70BA;">Medicines</h4>
                                                <select class="form-control form-control-lg" name="medicine_id">
                                                    @foreach($medicines as $medicine)
                                                        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="text" class="form-control form-control-lg" name="medicine_price" placeholder="Price" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <input type="number" class="form-control form-control-lg" name="medicine_quantity" placeholder="Qty" required>
                                            </td>
                                            <td style="width: 12%; text-align: center;">
                                                <span style="color: #7A70BA; font-weight: 600;opacity: 0.9;">$0.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Total Calculation -->
                        <tr>
                            <td>
                                <table style="width:100%;">
                                    <tbody>
                                        <tr style="display:flex; justify-content: space-between; margin:16px 0 24px 0; align-items: end;">
                                            <td>
                                                <ul style="padding: 0; margin: 0; list-style: none;">
                                                    <li style="display:flex; padding-bottom: 16px;">
                                                        <span style="display: block; width: 95px;">Subtotal</span>
                                                        <span style="display: block; width:25px;">:</span>
                                                        <span style="display: block; width: 95px; color: #7A70BA; opacity: 0.9; font-weight:600;">$0.00</span>
                                                    </li>
                                                    <li style="display:flex; padding-bottom: 16px;">
                                                        <span style="display: block; width: 95px;">Tax</span>
                                                        <span style="display: block; width:25px;">:</span>
                                                        <input type="text" class="form-control form-control-lg" name="tax" placeholder="Tax" required>
                                                    </li>
                                                    <li style="display:flex; padding-bottom: 20px;">
                                                        <span style="display: block; width: 95px;">Discount</span>
                                                        <span style="display: block; width:25px;">:</span>
                                                        <input type="text" class="form-control form-control-lg" name="discount" placeholder="Discount" required>
                                                    </li>
                                                    <li style="display:flex; align-items: center;">
                                                        <span style="display: block; width: 95px;">Total Due</span>
                                                        <span style="display: block; color: #7A70BA; opacity: 0.9; font-weight:600; padding: 12px 25px; border-radius: 5px; background: rgba(122, 112, 186 , 0.1); font-size: 16px;">$0.00</span>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Submit Button -->
                        <tr>
                            <td style="text-align: center;">
                                <button type="submit" class="btn btn-primary">Create Billing</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Add JavaScript for dynamic calculations if needed
</script>
@endsection --}}
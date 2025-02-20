{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layout.erp.app')

@section('page')
<div class="container-fluid dashboard-4">
    <div class="row">
      <div class="col-xl-6 col-md-12 proorder-md-1">  
        <div class="row"> 
          <div class="col-xl-6 col-sm-6"> 
            <div class="card">
              <div class="card-body student">
                <div class="d-flex gap-2 align-items-end"> 
                  <div class="flex-grow-1">
                    <h2>42,954</h2>
                    <p class="mb-0 text-truncate"> Total Students</p>
                    <div class="d-flex student-arrow text-truncate">
                      <p class="mb-0 up-arrow bg-light-danger"><i class="icon-arrow-down font-danger"></i></p><span class="f-w-500 font-danger">- 17.06%</span>than last 6 Month
                    </div>
                  </div>
                  <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/icon/student.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6"> 
            <div class="card">
              <div class="card-body student-2">
                <div class="d-flex gap-2 align-items-end"> 
                  <div class="flex-grow-1">
                    <h2>659</h2>
                    <p class="mb-0 text-truncate"> Total Teachers</p>
                    <div class="d-flex student-arrow text-truncate">
                      <p class="mb-0 up-arrow bg-light-success"><i class="icon-arrow-up font-success"></i></p><span class="f-w-500 font-success">+27.02%</span>than last 4 Month
                    </div>
                  </div>
                  <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/icon/teacher.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6"> 
            <div class="card">
              <div class="card-body student-3">
                <div class="d-flex gap-2 align-items-end"> 
                  <div class="flex-grow-1">
                    <h2>984</h2>
                    <p class="mb-0 text-truncate"> Events</p>
                    <div class="d-flex student-arrow text-truncate">
                      <p class="mb-0 up-arrow bg-light-success"><i class="icon-arrow-up font-success"></i></p><span class="f-w-500 font-success">+ 12.01%</span>than last 8 Month
                    </div>
                  </div>
                  <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/icon/calendar.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6"> 
            <div class="card">
              <div class="card-body student-4">
                <div class="d-flex gap-2 align-items-end"> 
                  <div class="flex-grow-1">
                    <h2>1,984</h2>
                    <p class="mb-0 text-truncate"> Invoice Status</p>
                    <div class="d-flex student-arrow text-truncate">
                      <p class="mb-0 up-arrow bg-light-danger"><i class="icon-arrow-down font-danger"></i></p><span class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                    </div>
                  </div>
                  <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/icon/invoice.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6 proorder-md-2"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Study Statistics</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body"> 
            <div class="studay-statistics"> 
              <ul class="d-flex align-item-center gap-2">
                <li> <span class="bg-primary"> </span>UX Design</li>
                <li> <span class="bg-secondary"> </span>Illustrations</li>
              </ul>
            </div>
            <div id="study-statistics"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-md-12 proorder-md-4"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Assignments</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown1"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body pt-0 assignments-table px-0">
            <div class="table-responsive theme-scrollbar">
              <table class="table display" id="assignments-table" style="width:100%">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </th>
                    <th>Id no  </th>
                    <th>Teacher</th>
                    <th>Subject  </th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Progress</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td> <span>0542</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/1.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Gary payi</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Accounts</td>
                    <td>12 May 2023  </td>
                    <td>20 May 2023 </td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-primary">
                          <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown2"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td><span>9548</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/2.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Ralph Waters</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>UI/UX Design</td>
                    <td>06 May 2023</td>
                    <td>16 May 2023</td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-secondary">
                          <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown3"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td><span>2950</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/3.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Edwin Day</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Mathematics</td>
                    <td>25 Sep 2023  </td>
                    <td>30 May 2023 </td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-warning">
                          <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown4" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td><span>9605</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/4.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Aaron Hogan</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Computer App</td>
                    <td>23 May 2023  </td>
                    <td>26 May 2023</td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-tertiary">
                          <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown5" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown5"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td> <span>1552</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/2.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Ralph Waters</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Accounts</td>
                    <td>15 May 2023  </td>
                    <td>26 May 2023 </td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-success">
                          <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown6" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown6"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td><span>125</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/3.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Aaron Hogan</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Accounts</td>
                    <td>05 May 2023  </td>
                    <td>19 May 2023 </td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-danger">
                          <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown7" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label"></label>
                      </div>
                    </td>
                    <td><span>254</span></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/user/1.png" alt=""></div>
                        <div class="flex-grow-1 ms-2"><a href="product-page.html">
                            <h6>Gary payi</h6></a></div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>Accounts</td>
                    <td>22 May 2023  </td>
                    <td>02 May 2023 </td>
                    <td> 
                      <div class="progress-showcase">
                        <div class="progress sm-progress-bar progress-border-info">
                          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown8" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 proorder-md-5"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Live Meeting</h4>
              <div class="location-menu dropdown">
                <button class="btn dropdown-toggle" id="userdropdown9" type="button" data-bs-toggle="dropdown" aria-expanded="false">1pm-2pm</button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown9"><a class="dropdown-item" href="#">Address Selection</a><a class="dropdown-item" href="#">Geo-Menu</a><a class="dropdown-item" href="#">Place Picker</a></div>
              </div>
            </div>
          </div>
          <div class="card-body live-meet">
            <div class="live-metting">  <img class="img-fluid" src="{{asset('assets')}}/images/dashboard-4/metting/teacher.png" alt="">
              <div class="star-img"><img class="img-fluid" src="{{asset('assets')}}/images/dashboard-4/metting/chart.png" alt=""><img class="img-fluid" src="{{asset('assets')}}/images/dashboard-4/metting/message.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/1.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/2.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/3.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/4.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/5.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/6.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/7.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/8.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/9.png" alt=""><img src="{{asset('assets')}}/images/dashboard-4/metting/10.png" alt=""></div>
            </div>
            <ul>
              <li> 
                <h5 class="text-truncate"> <span>Class: </span>Technique of Drawing in One Line</h5>
              </li>
              <li>
                <h5 class="text-truncate"> <span>Batch: </span>GDM (2/3) </h5>
              </li>
              <li><a href="https://support.pixelstrap.com/ " target="_blank">
                  <h5 class="font-primary text-truncate"> <span>Class Link: </span>https://support.pixelstrap.com/ </h5></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xxl-4 col-xl-7 box-col-7 col-md-6 proorder-md-3"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Actively Hours</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown10" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown10"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="actively-hours"></div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-xl-5 box-col-5 col-md-6 proorder-md-6"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Enrolled Classes</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown11" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown11"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body pt-0 pb-1">
            <ul class="enrolled-class"> 
              <li class="d-flex align-items-center gap-2"><span class="b-primary bg-primary"></span>
                <div class="flex-grow-1"> <a href="">
                    <h5 class="text-truncate">After Effects CC Masterclass </h5></a>
                  <p>10:20 -11:30</p>
                </div>
                <div class="flex-shrink-0"> 
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown12" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-angle-right"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown12"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center gap-2"><span class="b-secondary bg-secondary"></span>
                <div class="flex-grow-1"> <a href="">
                    <h5 class="text-truncate">Design from A to Z</h5></a>
                  <p>09:00 -10:30</p>
                </div>
                <div class="flex-shrink-0"> 
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown13" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-angle-right"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown13"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center gap-2"><span class="b-warning bg-warning"></span>
                <div class="flex-grow-1"> <a href="">
                    <h5 class="text-truncate">Graphic Design Bootcamp</h5></a>
                  <p>15:00 -16:00</p>
                </div>
                <div class="flex-shrink-0"> 
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown14" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-angle-right"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown14"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center gap-2"><span class="b-tertiary bg-tertiary"></span>
                <div class="flex-grow-1"> <a href="">
                    <h5 class="text-truncate">The Ultimate Guide to Usabillity</h5></a>
                  <p>13:25 -14:30</p>
                </div>
                <div class="flex-shrink-0"> 
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown15" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-angle-right"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown15"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center gap-2"><span class="b-success bg-success"></span>
                <div class="flex-grow-1"> <a href="">
                    <h5 class="text-truncate">After Effects CC Masterclass</h5></a>
                  <p>12:45 -14:20</p>
                </div>
                <div class="flex-shrink-0"> 
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown16" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-angle-right"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown16"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xxl-5 col-xl-6 box-col-6 proorder-4-xl-1 proorder-md-7"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Featured Courses</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown17" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown17"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body p-0 featured-table">
            <div class="table-responsive theme-scrollbar">
              <table class="table display" id="featured-table" style="width:100%">
                <thead>
                  <tr>
                    <th>Course Name</th>
                    <th>Start</th>
                    <th>Rate</th>
                    <th>Type</th>
                    <th>Save</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0"> <img src="{{asset('assets')}}/images/dashboard-4/featured/1.png" alt=""></div>
                        <div class="flex-grow-1"><a href="product-page.html">
                            <h5>Mobile UX</h5></a><span>Erin Mooney</span></div>
                      </div>
                    </td>
                    <td>Feb 15</td>
                    <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary" data-feather="star"> </i>4.8</span></td>
                    <td>UX/UI Design</td>
                    <td class="initial-color" id="colorChangeButton"><i data-feather="bookmark"> </i></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2"> 
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/featured/2.png" alt=""></div>
                        <div class="flex-grow-1"><a href="product-page.html">
                            <h5>Illustration</h5></a><span>Elsie Lemon</span></div>
                      </div>
                    </td>
                    <td>Mar 22</td>
                    <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary" data-feather="star"> </i>2.3</span></td>
                    <td>Web Designer</td>
                    <td class="initial-color" id="colorChangeButton1"><i data-feather="bookmark"> </i></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/featured/3.png" alt=""></div>
                        <div class="flex-grow-1"><a href="product-page.html">
                            <h5>Design System</h5></a><span>Anna Green</span></div>
                      </div>
                    </td>
                    <td>Jun 28</td>
                    <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary" data-feather="star"> </i>1.5</span></td>
                    <td>Developer</td>
                    <td class="initial-color" id="colorChangeButton2"><i data-feather="bookmark"> </i></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/featured/4.png" alt=""></div>
                        <div class="flex-grow-1"><a href="product-page.html">
                            <h5>Leadership</h5></a><span>John  Elliot</span></div>
                      </div>
                    </td>
                    <td>Apr 04</td>
                    <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary" data-feather="star"> </i>2.4</span></td>
                    <td>UX/UI Design</td>
                    <td class="initial-color" id="colorChangeButton3"><i data-feather="bookmark"> </i></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0"><img src="{{asset('assets')}}/images/dashboard-4/featured/5.png" alt=""></div>
                        <div class="flex-grow-1"><a href="product-page.html">
                            <h5>Latest Figma</h5></a><span>Dylan Field</span></div>
                      </div>
                    </td>
                    <td>jun 01</td>
                    <td><span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary" data-feather="star"> </i>5.4</span></td>
                    <td>Graphic Designer</td>
                    <td class="initial-color" id="colorChangeButton4"><i data-feather="bookmark"> </i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-12 box-col-12 proorder-md-8"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Monthly  Attendance Report (Feb)</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown18" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown18"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body pb-0">
            <div class="monthly-report">
              <ul class="d-flex align-item-center gap-2">
                <li> <span class="bg-primary"> </span>Teacher</li>
                <li> <span class="bg-secondary"> </span>Student</li>
              </ul>
            </div>
            <div id="monthly-reportchart"></div>
          </div>
        </div>
      </div>
      <div class="col-xxl-5 col-xl-6 box-col-6 proorder-md-9"> 
        <div class="card">
          <div class="card-header card-no-border pb-0">
            <div class="header-top">
              <h4>Schedule</h4>
              <div class="dropdown icon-dropdown">
                <button class="btn dropdown-toggle" id="userdropdown19" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown19"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
              </div>
            </div>
          </div>
          <div class="card-body schedult-calendar pt-0">
            <div class="schedule-container"> 
              <div id="schedulechart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layout.erp.app')

@section('page')
    <section id="multilingual-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div
                                        class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2
                                            class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
                                            {{ session('success') ?? session('error') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Hospital List</h2>
                        <a href="{{ url('hospital_list/create') }}" class="btn btn-lg btn-primary">Add Hospital</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        {{-- {{print_r($hospitals->toArray())}} --}}
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                            role="grid" aria-describedby="basic-1_info">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Address</th>
                                    <th>website</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Logo</th>
                                    <th>Banner</th>
                                    {{-- <th>Created At</th>
                                    <th>Updated At</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $hospital->id }}</td>
                                        <td>{{ $hospital->name }}</td>
                                        <td>{{ $hospital->country }}</td>
                                        <td>{{ $hospital->address }}</td>
                                        <td>{{ $hospital->website }}</td>
                                        <td>{{ $hospital->phone }}</td>
                                        <td>{{ $hospital->email }}</td>
                                        {{-- <td>{{ $hospital->description }}.</td> --}}
                                        <td>
                                            <img class="img-fluid" style="max-width: 80px; height: auto;"
                                                src="{{ asset('img/hospital_list/logos/' . $hospital->logo) }}"
                                                alt="{{ $hospital->name }} Logo">
                                        </td>
                                        <td>
                                            <img class="img-fluid" style="max-width: 80px; height: auto;"
                                                src="{{ asset('img/hospital_list/banners/' . $hospital->banner) }}"
                                                alt="{{ $hospital->name }} Banner">
                                        </td>

                                        {{-- <td>{{ $hospital->created_at }}</td>
                                        <td>{{ $hospital->updated_at }}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <!-- Show Link -->
                                                    <a class="dropdown-item text-success fs-6"  
                                                        href="{{ url('hospital_list/' . $hospital->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>

                                                    <!-- Edit Link -->
                                                    <a class="dropdown-item text-primary fs-6"
                                                        href="{{ url('hospital_list/' . $hospital->id . '/edit') }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>

                                                    <!-- Delete Link (with confirmation) -->
                                                    <form action="{{ url('hospital_list/' . $hospital->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this hospital?');"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger fs-6">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>

                                                    <!-- Delete Link For soft delete (Fixed URL) -->
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ url('hospital_list/soft_delete/' . $hospital->id) }}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Soft Delete</span>
                                                    </a> --}}

                                                    {{-- <a class="dropdown-item"
                                                        href="{{ url('hospital_list/delete/' . $hospital->id) }}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a> --}}

                                                    <!-- Delete Link For hard delete (Fixed URL) -->
                                                    {{-- <form action="{{ url('hospital_list/' . $hospital->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </div>

                                            <!-- Feather Icons Script -->
                                            <script>
                                                feather.replace();
                                            </script>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center fw-bold text-danger fs-10">No Hospitals Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




{{-- table data html code  --}}
{{-- <tr>
                                    <td>
                                        <img src="../../../app-assets/images/icons/react.svg" class="me-75" height="20"
                                            width="20" alt="React" />
                                        <span class="fw-bold">React Project</span>
                                    </td>
                                    <td>Ronald Frest</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0" title="Lilian Nenez">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge rounded-pill badge-light-success me-1">Completed</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../../../app-assets/images/icons/vuejs.svg" class="me-75"
                                            height="20" width="20" alt="Vuejs" />
                                        <span class="fw-bold">Vuejs Project</span>
                                    </td>
                                    <td>Jack Obes</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0" title="Lilian Nenez">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge rounded-pill badge-light-info me-1">Scheduled</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../../../app-assets/images/icons/bootstrap.svg" class="me-75"
                                            height="20" width="20" alt="Bootstrap" />
                                        <span class="fw-bold">Bootstrap Project</span>
                                    </td>
                                    <td>Jerry Milton</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0" title="Lilian Nenez">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar pull-up my-0"
                                                title="Alberto Glotzbach">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                    alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge rounded-pill badge-light-warning me-1">Pending</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>  --}}


{{-- multilingual datatable html code  --}}
{{-- <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Hospital List</h4>
                    </div>
                    <div class="card-datatable">
                        <table class="dt-multilingual table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Active</td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Active</td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Active</td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

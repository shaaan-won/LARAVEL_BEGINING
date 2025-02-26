{{-- @extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Pending Lab Tests</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Consultation Id</th>
                <th>Patient Name</th>
                <th>Test Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingTests as $test)
                <tr>
                    <td>{{ $test->consultation_id }}</td>
                    <td>{{ $test->consultation->patient->name }}</td>
                    <td>{{ $test->labTest->name }}</td>
                    <td>
                        <form action="{{ url('labtests/result/update', $test->id) }}" method="POST">
                            @csrf
                            <input type="text" name="lab_test_result" placeholder="Enter result" required>
                            <button type="submit" class="btn btn-success">Submit Result</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

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
                        <h2 class="mb-0 fw-bolder fs-2">Pending Lab Tests</h2>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                            role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Consultation ID</th>
                                    <th>Patient Name</th>
                                    <th>Test Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendingTests as $test)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $test->consultation_id }}</td>
                                        <td>{{ $test->consultation->patient->name ?? 'N/A' }}</td>
                                        <td>{{ $test->labTest->name ?? 'N/A' }}</td>
                                        <td>
                                            <form action="{{ url('labtests/result/update', $test->id) }}" method="POST">
                                                @csrf
                                                <input type="text" name="lab_test_result" placeholder="Enter result" required>
                                                <button type="submit" class="btn btn-success">Submit Result</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center fw-bold text-danger fs-6">No Pending Lab Tests Found</td>
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

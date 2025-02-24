@extends('layout.erp.app')

@section('page')
    <section id="pending-appointments">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2 class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
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
                        <h2 class="mb-0 fw-bolder fs-2">Pending Appointments</h2>
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-warning">All Appointments</a>
                    </div>

                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->appointment_time }}</td>
                                        <td>
                                            <span class="badge fs-6 lg fw-bold {{ $appointment->status->name == 'Pending' ? 'bg-warning text-dark' : ($appointment->status->name == 'Approved' ? 'bg-success' : 'bg-danger') }}">{{ $appointment->status->name }}</span>
                                        </td>
                                        {{-- <td>
                                            <form class="d-flex flex-column" action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status_id" class="form-select form-control-sm" required>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}" {{ $appointment->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary btn-sm mt-2 w-100">Update</button>
                                            </form>
                                        </td> --}}
                                        <td class="d-flex flex-column align-items-center">
                                            <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status_id" class="form-select form-control-sm w-50 " data-appointment-id="{{ $appointment->id }}" required>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}" {{ $appointment->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                        
                                                <div class="mt-2" id="cancellation-reason-{{ $appointment->id }}" style="display: {{ $appointment->status->name == 'Cancelled' ? 'block' : 'none' }};">
                                                    <textarea name="cancellation_reason" class="form-control" placeholder="Enter cancellation reason">{{ $appointment->cancellation_reason }}</textarea>
                                                </div>
                                        
                                                <button type="submit" class="btn btn-primary btn-sm mt-2 w-50 justify-content-center">Update</button>
                                            </form>
                                        </td>
                                        
                                        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
                                        <script>
                                            $(function () {
                                                $('select[name="status_id"]').on('change', function () {
                                                    const appointmentId = $(this).data('appointment-id');
                                                    const reasonDiv = $('#cancellation-reason-' + appointmentId);
                                                    const selectedText = $(this).find('option:selected').text();
                                        
                                                    if (selectedText === 'Cancelled' || selectedText === 'Rejected') {
                                                        reasonDiv.show();
                                                    } else {
                                                        reasonDiv.hide();
                                                    }
                                                });
                                            });
                                        </script>
                                        
                                        {{-- <script>
                                            document.querySelector('select[name="status_id"]').addEventListener('change', function() {
                                                const reasonDiv = document.getElementById('cancellation-reason-{{ $appointment->id }}');
                                                reasonDiv.style.display = this.options[this.selectedIndex].text === 'Cancelled' ? 'block' : 'none';
                                            });
                                        </script> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center fw-bold text-danger fs-5">No Pending Appointments</td>
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

@extends('layout.erp.app')

@section('title', 'Cancelled Appointments')



@section('page')
    {{-- <style>
        .action-box {
            display: flex;
            align-items: center;
            gap: 5px;
            /* Small spacing between elements */
            justify-content: center;
            white-space: nowrap;
            /* Prevent elements from wrapping */
        }

        .status-form {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .status-form select {
            width: auto;
            /* Adjust to fit content */
            min-width: 120px;
            /* Prevent excessive shrinking */
            padding: 2px;
            font-size: 12px;
        }

        .status-form button {
            padding: 3px 8px;
            font-size: 12px;
        }

        .reschedule-btn {
            padding: 3px 8px;
            font-size: 12px;
        }
    </style> --}}
    <section id="cancelled-appointments">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
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
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Cancelled Appointments</h2>
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-warning">All Appointments</a>
                    </div>

                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped display dataTable no-footer" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Cancellation Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->appointment_time }}</td>
                                        <td>{{ $appointment->cancellation_reason }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                {{-- Reschedule Button --}}
                                                <button type="button" class="btn btn-info btn-sm reschedule-btn"
                                                    data-appointment-id="{{ $appointment->id }}">
                                                    Reschedule
                                                </button>

                                                {{-- Update Status Form --}}
                                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                                    method="POST" class="d-flex align-items-center gap-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status_id" class="form-select form-select-sm" required>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}"
                                                                {{ $appointment->status_id == $status->id ? 'selected' : '' }}>
                                                                {{ $status->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center fw-bold text-danger fs-5">No Cancelled
                                            Appointments</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Reschedule Modal --}}
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="rescheduleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="appointment_id" id="rescheduleAppointmentId">
                        <div class="mb-3">
                            <label for="new_date" class="form-label" >New Appointment Date</label>
                            <input type="date" class="form-control" name="new_date" min="{{ now()->toDateString() }}" max="{{ now()->addDays(15)->toDateString() }}" required value="{{ now()->toDateString() }}">
                        </div>
                        <div class="mb-3">
                            <label for="new_time" class="form-label">New Appointment Time</label>
                            <input type="time" class="form-control" name="new_time" min="09:00" max="20:00" required value="{{ now()->format('H:i') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Reschedule</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Reschedule Script --}}
    <script>
        $(document).ready(function() {
            $(".reschedule-btn").on("click", function() {
                let appointmentId = $(this).data("appointment-id");
                $("#rescheduleAppointmentId").val(appointmentId);
                $("#rescheduleForm").attr("action", `/appointments/reschedule/${appointmentId}`);
                $("#rescheduleModal").modal("show");
            });
        });
    </script>
@endsection

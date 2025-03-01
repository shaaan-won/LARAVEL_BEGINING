{{-- 
@extends('layout.erp.app')
@section('title','Manage Consultation')
@section('style')


@endsection
@section('page')
<a href="{{route('consultations.create')}}">New Consultation</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Appointment Id</th>
			<th>Symptoms</th>
			<th>Diagnosis</th>
			<th>Prescription</th>
			<th>Consultation Notes</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($consultations as $consultation)
		<tr>
			<td>{{$consultation->id}}</td>
			<td>{{$consultation->appointment_id}}</td>
			<td>{{$consultation->symptoms}}</td>
			<td>{{$consultation->diagnosis}}</td>
			<td>{{$consultation->prescription}}</td>
			<td>{{$consultation->consultation_notes}}</td>
			<td>{{$consultation->created_at}}</td>
			<td>{{$consultation->updated_at}}</td>

			<td>
			<form action = "{{route('consultations.destroy',$consultation->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('consultations.show',$consultation->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('consultations.edit',$consultation->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection --}}


@extends('layout.erp.app')
@section('title', 'Manage Consultations')
@section('style')
 <style>
    .shortline{
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        max-width: 180px;
    }
 </style>
@endsection

@section('page')
<section id="multilingual-datatable">
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
                    <h2 class="mb-0 fw-bolder fs-2">Consultation List</h2>
                    <a href="{{ route('consultations.create') }}" class="btn btn-lg btn-primary">Add Consultation</a>
                </div>
                <div class="table-responsive theme-scrollbar card-body">
                    <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Appointment ID</th>
                                <th>Symptoms</th>
                                <th>Diagnosis</th>
                                <th>Prescription</th>
                                <th>Consultation Notes</th>
                                {{-- <th>Created At</th>
                                <th>Updated At</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->id }}</td>
                                    <td>{{ $consultation->appointment_id }}</td>
                                    <td class="shortline">{{ $consultation->symptoms }}</td>
                                    {{-- <td>{{ $consultation->diagnosis }}</td> --}}
                                    {{-- <td>{{ \Illuminate\Support\Str::limit($consultation->diagnosis, 20, '...') }}</td> --}}
                                    {{-- <td class="text-nowrap">{{ $consultation->prescription }}</td> --}}
                                    <td class="shortline">{{$consultation->diagnosis}}</td>
                                    <td class="shortline">{{ $consultation->prescription }}</td>                                    
                                    <td class="shortline">{{ $consultation->consultation_notes }}</td>
                                    {{-- <td>{{ $consultation->created_at }}</td>
                                    <td>{{ $consultation->updated_at }}</td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu p-2">
                                                <!-- Show Link -->
                                                <a class="dropdown-item text-success fs-6" href="{{ route('consultations.show', $consultation->id) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>Show</span>
                                                </a>

                                                <!-- Edit Link -->
                                                <a class="dropdown-item text-primary fs-6" href="{{ route('consultations.edit', $consultation->id) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>

                                                <!-- Delete Link (with confirmation) -->
                                                <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this consultation?');" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger fs-6">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center fw-bold text-danger fs-10">No Consultations Found</td>
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

@section('script')
<script>
    feather.replace();
</script>
@endsection


{{-- <td>
    @if($test->lab_test_file)
        <a href="{{ asset('storage/' . $test->lab_test_file) }}" target="_blank" class="btn btn-info">
            View Result
        </a>
    @else
        <span class="text-muted">No file uploaded</span>
    @endif
</td> --}}

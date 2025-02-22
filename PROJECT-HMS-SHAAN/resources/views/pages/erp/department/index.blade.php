
{{-- @extends('layout.erp.app')
@section('title','Manage Department')
@section('style')


@endsection
@section('page')
<a href="{{route('departments.create')}}">New Department</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($departments as $department)
		<tr>
			<td>{{$department->id}}</td>
			<td>{{$department->name}}</td>
			<td>{{$department->description}}</td>
			<td>{{$department->created_at}}</td>
			<td>{{$department->updated_at}}</td>

			<td>
			<form action = "{{route('departments.destroy',$department->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('departments.show',$department->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('departments.edit',$department->id)}}"> Edit </a>
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

@section('title', 'Manage Department')

@section('style')
<!-- Add custom styles if needed -->
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
                    <h2 class="mb-0 fw-bolder fs-2">Department List</h2>
                    <a href="{{ route('departments.create') }}" class="btn btn-lg btn-primary">+ New Department</a>
                </div>
                <div class="table-responsive theme-scrollbar card-body">
                    <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->description }}</td>
                                    <td>{{ $department->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $department->updated_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu p-2">
                                                <a class="dropdown-item text-success fs-6" href="{{ route('departments.show', $department->id) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>View</span>
                                                </a>
                                                <a class="dropdown-item text-primary fs-6" href="{{ route('departments.edit', $department->id) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this department?');" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger fs-6">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <script>
                                            feather.replace();
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center fw-bold text-danger fs-5">No Departments Found</td>
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
<!-- Add any custom scripts if needed -->
@endsection

{{-- 
@extends('layout.erp.app')
@section('title','Manage LabTestCategory')
@section('style')


@endsection
@section('page')
<a href="{{route('labtestcategorys.create')}}">New LabTestCategory</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Status Id</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($labtestcategorys as $labtestcategory)
		<tr>
			<td>{{$labtestcategory->id}}</td>
			<td>{{$labtestcategory->name}}</td>
			<td>{{$labtestcategory->description}}</td>
			<td>{{$labtestcategory->status->name}}</td>
			<td>{{$labtestcategory->created_at}}</td>
			<td>{{$labtestcategory->updated_at}}</td>

			<td>
			<form action = "{{route('labtestcategorys.destroy',$labtestcategory->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('labtestcategorys.show',$labtestcategory->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('labtestcategorys.edit',$labtestcategory->id)}}"> Edit </a>
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
                        <h2 class="mb-0 fw-bolder fs-2">Manage Lab Test Categories</h2>
                        <a href="{{ route('labtestcategorys.create') }}" class="btn btn-lg btn-primary">Add New Category</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    {{-- <th>Created At</th>
                                    <th>Updated At</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($labtestcategorys as $labtestcategory)
                                    <tr>
                                        <td>{{ $labtestcategory->id }}</td>
                                        <td>{{ $labtestcategory->name }}</td>
                                        <td>{{ $labtestcategory->description }}</td>
                                        <td>{{ $labtestcategory->status->name }}</td>
                                        {{-- <td>{{ $labtestcategory->created_at }}</td>
                                        <td>{{ $labtestcategory->updated_at }}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <!-- View -->
                                                    <a class="dropdown-item text-success fs-6" href="{{ route('labtestcategorys.show', $labtestcategory->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>View</span>
                                                    </a>
                                                    <!-- Edit -->
                                                    <a class="dropdown-item text-primary fs-6" href="{{ route('labtestcategorys.edit', $labtestcategory->id) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <!-- Delete -->
                                                    <form action="{{ route('labtestcategorys.destroy', $labtestcategory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="display: inline;">
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
                                        <td colspan="7" class="text-center fw-bold text-danger fs-10">No Lab Test Categories Found</td>
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
{{-- 
@extends('layout.erp.app')
@section('title','Manage User')
@section('style')


@endsection
@section('page')
<a href="{{route('users.create')}}">New User</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Email Verified At</th>
			<th>Role Id</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Password</th>
			<th>Remember Token</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->email_verified_at}}</td>
			<td>{{$user->role_id}}</td>
			<td>{{$user->phone}}</td>
			<td>{{$user->address}}</td>
			<td>{{$user->password}}</td>
			<td>{{$user->remember_token}}</td>
			<td>{{$user->created_at}}</td>
			<td>{{$user->updated_at}}</td>

			<td>
			<form action = "{{route('users.destroy',$user->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('users.show',$user->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('users.edit',$user->id)}}"> Edit </a>
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

@section('title','Manage User')

@section('style')
@endsection

@section('page')
<section id="multilingual-datatable">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            @if (session('success') || session('error'))
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
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 fw-bolder fs-2">User List</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-lg btn-primary">Add User</a>
                </div>
                <div class="table-responsive theme-scrollbar card-body">
                    <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th>Email Verified At</th> --}}
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Address</th>
                                {{-- <th>Password</th>
                                <th>Remember Token</th>
                                <th>Created At</th>
                                <th>Updated At</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>{{ $user->email_verified_at }}</td> --}}
                                    <td>{{ optional($user->role)->name ?? 'No Role' }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    {{-- <td>{{ $user->password }}</td>
                                    <td>{{ $user->remember_token }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu p-2">
                                                <a class="dropdown-item text-success fs-6" href="{{ route('users.show', $user->id) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>View</span>
                                                </a>
                                                <a class="dropdown-item text-primary fs-6" href="{{ route('users.edit', $user->id) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display: inline;">
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
                                    <td colspan="12" class="text-center fw-bold text-danger fs-10">No Users Found</td>
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

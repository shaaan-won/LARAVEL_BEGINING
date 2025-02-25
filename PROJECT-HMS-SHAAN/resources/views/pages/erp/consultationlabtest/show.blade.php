
@extends('layout.erp.app')
@section('title','Show ConsultationLabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('consultationlabtests.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$consultationlabtest->id}}</td></tr>
		<tr><th>Consultation Id</th><td>{{$consultationlabtest->consultation_id}}</td></tr>
		<tr><th>Lab Test Id</th><td>{{$consultationlabtest->lab_test_id}}</td></tr>
		<tr><th>Lab Test Result</th><td>{{$consultationlabtest->lab_test_result}}</td></tr>
		<tr><th>Created By</th><td>{{$consultationlabtest->created_by}}</td></tr>
		<tr><th>Updated By</th><td>{{$consultationlabtest->updated_by}}</td></tr>
		<tr><th>Created At</th><td>{{$consultationlabtest->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$consultationlabtest->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection

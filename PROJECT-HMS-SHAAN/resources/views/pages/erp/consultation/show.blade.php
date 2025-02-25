
@extends('layout.erp.app')
@section('title','Show Consultation')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('consultations.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$consultation->id}}</td></tr>
		<tr><th>Appointment Id</th><td>{{$consultation->appointment_id}}</td></tr>
		<tr><th>Symptoms</th><td>{{$consultation->symptoms}}</td></tr>
		<tr><th>Diagnosis</th><td>{{$consultation->diagnosis}}</td></tr>
		<tr><th>Prescription</th><td>{{$consultation->prescription}}</td></tr>
		<tr><th>Consultation Notes</th><td>{{$consultation->consultation_notes}}</td></tr>
		<tr><th>Created At</th><td>{{$consultation->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$consultation->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection

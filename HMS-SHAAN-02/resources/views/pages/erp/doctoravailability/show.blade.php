<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/doctoravailability/_show.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 12:05:37 PM
* Contact: towhid1@outlook.com
*/
?>
@extends('layouts.backend.main')
@section('title','Show DoctorAvailability')
@section('style')


@endsection
@section('page-content')
<a class='btn btn-success' href="{{route('doctoravailabilitys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$doctoravailability->id}}</td></tr>
		<tr><th>Doctor Id</th><td>{{$doctoravailability->doctor_id}}</td></tr>
		<tr><th>Day</th><td>{{$doctoravailability->day}}</td></tr>
		<tr><th>Start Time</th><td>{{$doctoravailability->start_time}}</td></tr>
		<tr><th>End Time</th><td>{{$doctoravailability->end_time}}</td></tr>
		<tr><th>Created At</th><td>{{$doctoravailability->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$doctoravailability->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection

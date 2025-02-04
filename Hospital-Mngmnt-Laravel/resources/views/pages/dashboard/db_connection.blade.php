@extends('layouts.backend.main')

@section('page-content')

    <h1>Hospital Management Database </h1>
    <h1>
        <?php
            if(DB::connection('mysql')->getDatabaseName() == 'hospital_management'){
                echo "Connected successfully";
            }else {
                echo "Not Connected";
            }
        ?>
    </h1>
 
@endsection
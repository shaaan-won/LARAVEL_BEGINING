@extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Pending Lab Tests</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Test Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingTests as $test)
                <tr>
                    <td>{{ $test->consultation->patient->name }}</td>
                    <td>{{ $test->labTest->name }}</td>
                    <td>
                        <form action="{{ url('labtests/result/update', $test->id) }}" method="POST">
                            @csrf
                            <input type="text" name="lab_test_result" placeholder="Enter result" required>
                            <button type="submit" class="btn btn-success">Submit Result</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12"

                @if (session('success'))
                    <div class=" alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center bg-info text-white">
                        <h4>
                            Customer List
                        </h4>
                        <button class="btn btn-success text-white "> <a class="text-white text-decoration-none" href="{{ url('/customer/create') }}"> Add Customer</a></button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer['id'] }}</td>
                                        <td>{{ $customer['name'] }}</td>
                                        <td>{{ $customer['email'] }}</td>
                                        <td>{{ $customer['phone'] }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

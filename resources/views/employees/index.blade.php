<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employees</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Employees List</h1>
        <p class="text-muted">This is the employees index view.</p>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif --}}
        <p class="text-muted">
        <a href="{{ route('create') }}" class="btn btn-primary btn-sm">Create</a>

        </p>
         <script>
        function confirmerSuppression(elt){
            let confirm = confirm("Are you sure to delete this employee?")
            if(!confirm){
                return;
            }
            elt.
            
        }
    </script>
        <div class="row g-4">
            @foreach ($employees as $employee)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $employee['fullName'] }}

                            @if ($employee['isActive'])
                            <span class="badge bg-success mb-2">Active</span>
                            @else
                            <span class="badge bg-danger mb-2">Inactive</span>
                            @endif
                        </h5>
                        <ul class="list-unstyled">
                            <li><strong>Age:</strong> {{ $employee['age'] }}</li>
                            <li><strong>Email:</strong> {{ $employee['email'] }}</li>
                            <li><strong>Department:</strong> {{ $employee['department'] }}</li>
                        </ul>
                        <div class="btns">
                            <a href="/employees/{{ $employee['id'] }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('edit',['id' =>$employee['id'] ]) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="{{ route('delete',['id' =>$employee['id'] ]) }}" onclick="(e) => confirmerSuppression(e)" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>

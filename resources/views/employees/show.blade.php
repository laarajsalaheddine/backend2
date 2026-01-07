<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="/employees" class="btn btn-primary btn-sm mb-3">Back to Employees List</a>
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Employee Details</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>Age:</strong> {{ $employee['age'] }}</li>
                    <li class="mb-2"><strong>Email:</strong> {{ $employee['email'] }}</li>
                    <li><strong>Department:</strong> {{ $employee['department'] }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

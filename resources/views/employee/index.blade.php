<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show ALL Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Request</h1>
            <a class="btn btn-primary px-5" href="{{ route('employee.create') }}">Create New Request</a>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>leave Type</th>
                <th>start Leaves</th>
                <th>Duration Days</th>
                <th>Status</th>
                <th>Reson</th>
            </tr>
            <tbody>
                @foreach ($leave_requests as $leave_request)
                    @if (Auth::user()->role === 'employee')
                        <tr>
                            <td>{{ $leave_request->id }}</td>
                            <td>{{ $leave_request->leaveType->name }}</td>
                            <td>{{ $leave_request->start_date }}</td>
                            <td>{{ $leave_request->duration_days }}</td>
                            <td>{{ $leave_request->status }}</td>
                            <td>{{ $leave_request->reason }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        @if (session('msg'))
            Swal.fire(
                'Good job!',
                '{{ session('msg') }}',
                'success'
            )
        @endif
    </script>
</body>

</html>

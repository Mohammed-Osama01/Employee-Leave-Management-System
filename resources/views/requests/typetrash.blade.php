<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Trash Type</h1>
            <a class="btn btn-primary px-5" href="{{ route('request.type') }}">Back Leaves Type</a>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>Leaves Type</th>
                <th>Use it</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($leaveTypes as $leaveType)
                        <tr>
                            <td>{{ $leaveType->id }}</td>
                            <td>{{ $leaveType->name }}</td>
                            <td>{{ $leaveType->leave_requests->count() }}</td>
                            <td>
                                <a href="{{ route('request.Typerestore' , $leaveType->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-undo"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ route('request.typeforcedelete', $leaveType->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
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
                '{{ session("msg") }}',
                'success'
            )
        @endif
    </script>
</body>

</html>

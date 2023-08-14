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
            <h1>All Request</h1>
            <a class="btn btn-primary px-5" href="{{ route('request.create') }}">Create New Type Leaves</a>
            <a class="btn btn-primary px-5" href="{{ route('request.type') }}">Show Types Leaves Requests</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="#" class="btn btn-info">
                <i class="fa-solid fa-skull-crossbones"></i> Admin </a>
            <a href="{{ route('request.Typetrash') }}" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Trash </a>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>Employee Name</th>
                <th>Leaves Type</th>
                <th>start Leaves</th>
                <th>Duration Days</th>
                <th>Status</th>
                <th>Reson</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($leave_requests as $leave_request)
                        <tr>

                            <td>{{ $leave_request->id }}</td>
                            <td>{{ $leave_request->user->name }}</td>
                            <td>{{ $leave_request->leaveType->name }}</td>
                            <td>{{ $leave_request->start_date }}</td>
                            <td>{{ $leave_request->duration_days }}</td>
                            <td>{{ $leave_request->status }}</td>
                            <td>{{ $leave_request->reason }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('request.edit' , $leave_request->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger btn-delete">
                                    <i class="fas fa-trash"></i></button>
                                <form class="d-inline" action="" method='post'>
                                    @csrf
                                    @method('delete')
                                </form>
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
                '{{ session('msg') }}',
                'success'
            )
        @endif
    </script>
    <script>
        $('.btn-delete').on('click', function() {
            let form = $(this).next('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )

                }
            })
        })
    </script>
</body>

</html>

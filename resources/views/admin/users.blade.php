<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Employee</h1>
            <a class="btn btn-primary px-5" href="{{ route('admin.create') }}">Create New User</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.all-admin') }}" class="btn btn-info">
                <i class="fa-solid fa-skull-crossbones"></i> Admin </a>

            <a href="{{ route('admin.trash') }}" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Trash </a>

        </div>


        <form action="{{ route('admin.users') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search here.." name="search"
                    value="{{ request()->search }}">
                <button class="btn btn-dark px-5" id="button-addon2">Search</button>
            </div>
        </form>

        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Status</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->role === 'employee')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ Str::words($user->address, 3, '...') }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td><img width="80" src="{{ asset('uploads/users/'.$user->image) }}" alt=""></td>
                            {{-- <!--<td>{{ $user->updated_at }}</td>--> 3mint ago --}}
                            <td>
                                <a href="{{ route('admin.show', $user->id) }}" class="btn btn-sm btn-success"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger btn-delete"><i
                                    class="fas fa-trash"></i></button>
                                <form class="d-inline" action="{{ route('admin.destroy', $user->id) }}" method='post'>
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $users->appends(['search' => request()->search])->links() }}
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

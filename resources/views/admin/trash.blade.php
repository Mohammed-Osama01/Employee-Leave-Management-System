<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trash Emplyee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>
    <div class="container mt-5">
        <h1>All Employee</h1>
        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Employee Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.restore', $user->id) }}" class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.forcedelete', $user->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.restore_all') }}" class="btn btn-success"> <i class="fas fa-undo"></i> Restore All</a>
        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.delete_all') }}" class="btn btn-danger"><i class="fas fa-times"></i> Delete All</a>
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

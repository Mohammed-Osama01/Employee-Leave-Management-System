<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Updated User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Update User</h1>
            <a class="btn btn-primary px-5" href="{{ route('admin.users') }}">All Users</a>
        </div>

        @include('admin.errors')

        <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.form')

            <button class="btn btn-info px-5">Updated</button>
        </form>

    </div>
  </body>
</html>

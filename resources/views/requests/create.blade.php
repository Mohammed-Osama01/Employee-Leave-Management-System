<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-primary px-5" href="{{ route('request.index') }}">All Request</a>
        </div>

        @include('admin.errors')

        <form action="{{ route('request.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="start_date" class="form-label">Add Type Leaves</label>
                <input type="text" class="form-control" id="start_date" name="name">
            </div>

            <button class="btn btn-success px-5">Add</button>
        </form>
    </div>
  </body>
</html>

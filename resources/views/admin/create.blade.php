<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Add New Employee</h1>
            <a class="btn btn-warning px-5" href="{{ route('admin.users') }}">Back Employee</a>
        </div>

        @include('admin.errors')

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.form')
            <div class="d-flex gap-2 col-12 mx-auto justify-content-center">
            <button class="btn btn-success px-5 mb-3 w-75 ">Add</button>
            </div>
        </form>
    </div>
  </body>
</html>

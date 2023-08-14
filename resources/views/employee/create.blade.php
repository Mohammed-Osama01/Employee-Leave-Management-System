<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>create new request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1> New Request</h1>
            <a class="btn btn-primary px-5" href="{{ route('employee.index') }}">Back</a>
        </div>

        @include('employee.errors')

        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('employee.form')

            <button class="btn btn-success px-5">Add</button>
        </form>
    </div>
  </body>
</html>

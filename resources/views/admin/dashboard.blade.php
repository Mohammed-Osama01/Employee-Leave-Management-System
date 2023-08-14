<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container m-5">

        <h1>Admin Dashboard</h1>
        <a href="{{ route('admin.users') }}" class="btn btn-sm btn-primary mt-5 d-block w-25 ">Show All Emoloyees</a>
        <a href="{{ route('request.index') }}" class="btn btn-sm btn-primary mt-5 d-block w-25 ">Show All Request</a>

    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
</head>
<body>
    <h1 style="text-align:center;color:blue;">Admin Page!</h1>
    <form method="POST" action="{{ route('admin.logout') }}" style="margin:100px;">
        @csrf
        <button style="border:none;background:none;cursor:pointer;font-weight:bold;" type="submit">Logout</button>
    </form>
    <h3 style="text-align:center;color:tomato;">Testing if the gitub repository is working or not!</h3>
</body>
</html>

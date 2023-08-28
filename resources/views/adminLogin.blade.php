<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>

    <style>
        form h2 {
            text-align: center;
        }
        .form-container {
            border: 1px solid #000;
            padding: 10px;
        }

        .form-controll {
            margin: 20px;
            padding: 15px;
            text-align: center;
        }

        .form-controll input{
            padding: 20px;
            border: 1px solid #DDD;
            width: 60%;
            margin: auto;
        }

        .form-controll button {
            padding: 15px;
            background: none;
            border: none;
            background-color: royalblue;
            color: #FFF;
            font-weight: bold;
            width: 40%;
            margin: auto;
        }

        .form-controll button:hover {
            background-color: #FFF;
            color: royalblue;
            border: 1px solid royalblue;
            transition: all .3s  ease-in-out;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <h2>Admin Login Form</h2>
            <div class="form-controll">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Type email here..."/>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-controll">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Type password here..."/>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-controll">
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

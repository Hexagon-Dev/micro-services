@extends('default')

@section('content')
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            margin: 0 auto;
            padding-top: 250px;
        }
        input {
            border: 1px solid #333;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
    </style>
    <form>
        <h1>Register</h1>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" id="submit">
    </form>
    <script>
        $(document).ready(function()
        {
            $('#submit').click(function(e) {

                e.preventDefault();

                $.ajax({
                    url: "http://localhost:81/api/register",
                    crossDomain: true,
                    method: "POST", // Что бы воспользоваться POST методом, меняем данную строку на POST
                    data: {"name": $('#name').val(), "email": $('#email').val(), "password": $('#password').val()},
                    success: function (data) {
                        console.log(data); // Возвращаемые данные выводим в консоль
                    }
                });
            });
        });
    </script>
@endsection

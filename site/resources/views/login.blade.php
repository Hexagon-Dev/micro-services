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
        <h1>Login</h1>
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
                    url: "http://localhost:81/api/login",
                    crossDomain: true,
                    method: "POST",
                    data: {"email": $('#email').val(), "password": $('#password').val()},
                    success: function (data) {
                        console.log(data);
                        modal.style.display = "block";
                        modalText.innerHTML = "<h2>Your token:</h2><p style = \"background: lightcyan;overflow-x: auto;padding: 20px;\">" + data.token + "</p>";
                    },
                    error: function (data) {
                        modal.style.display = "block";
                        modalText.innerHTML = 'ошибка';
                    }
                });
            });
        });
    </script>
@endsection

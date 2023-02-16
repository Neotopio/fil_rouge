<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<style>
    body {
        background: #1c242d;
    }

    .box {
        border: 1px solid #c4c4c4;
        padding: 30px 25px 10px 25px;
        background: white;
        margin: 30px auto;
        width: 360px;
    }

    h1.box-logo a {
        text-decoration: none;
    }

    h1.box-title {
        color: #AEAEAE;
        background: #f8f8f8;
        font-weight: 300;
        padding: 15px 25px;
        line-height: 30px;
        font-size: 25px;
        text-align: center;
        margin: -27px -26px 26px;
    }

    .box-button {
        border-radius: 5px;
        background: #d2483c;
        text-align: center;
        cursor: pointer;
        font-size: 19px;
        width: 100%;
        height: 51px;
        padding: 0;
        color: #fff;
        border: 0;
        outline: 0;
    }

    .box-register {
        text-align: center;
        margin-bottom: 0px;
    }

    .box-register a {
        text-decoration: none;
        font-size: 12px;
        color: #666;
    }

    .box-input {
        font-size: 14px;
        background: #fff;
        border: 1px solid #ddd;
        margin-bottom: 25px;
        padding-left: 10px;
        border-radius: 5px;
        width: 347px;
        height: 50px;
    }

    .box-input:focus {
        outline: none;
        border-color: #5c7186;
    }

    .sucess {
        text-align: center;
        color: white;
    }

    .sucess a {
        text-decoration: none;
        color: #58aef7;
    }

    p.errorMessage {
        background-color: #e66262;
        border: #AA4502 1px solid;
        padding: 5px 10px;
        color: #FFFFFF;
        border-radius: 3px;
    }



    label input {
        position: relative;
        font-size: 1em;
        color: black;
        background: transparent;
        padding: 1rem;
        width: 330px;
        border-radius: 5px;
        border: 2px solid #7a7a7a;
        transition: all 0.2s;
    }

    label input:focus {
        border-color: #ff4754;
    }

    .password-icon {
        

        position: absolute;


        transform: translateY(-50%);
        width: 20px;
        color: black;
        transition: all 0.2s;
    }

    label .password-icon:hover {
        cursor: pointer;
        color: #ff4754;
    }

    .feather-eye-off {
        display: none;
    }
</style>

<body>

    <form class="box" action="../model/validate.php" method="post" name="login">

        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur">
        <label>
            <input type="password" name="password" placeholder="Mot de passe">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            <div class="password-icon">

            </div>
        </label>
        <input type="submit" value="Connexion " name="submit" class="box-button">
        

        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace();
        </script>
        <script>
            const eye = document.querySelector(".feather-eye");
            const eyeoff = document.querySelector(".feather-eye-off");
            const passwordField = document.querySelector("input[type=password]");
            eye.addEventListener("click", () => {
                eye.style.display = "none";
                eyeoff.style.display = "block";
                passwordField.type = "text";
            });

            eyeoff.addEventListener("click", () => {
                eyeoff.style.display = "none";
                eye.style.display = "block";
                passwordField.type = "password";
            });
        </script>
</body>

</html>
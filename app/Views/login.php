<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"/>
    <style>
        body {
            background-image: url('<?= base_url('img/upn14x.jpeg') ?>');
            font-family: sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .login {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            width: 310px;
            box-shadow: 0 0 10px 5px #334b06;
        }

        .avatar {
            font-size: 50px;
            background: rgb(21, 20, 20);
            width: 75px;
            height: 75px;
            line-height: 70px;
            text-align: center;
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            color: #fff;
        }

        .h4 {
            text-align: center;
            color: white;
            padding: 10px;
            letter-spacing: 4px;
            font-weight: bolder;
        }
        .box-login {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 2px solid white;
            padding: 8px 0 ;
        }
        .box-login i {
            font-size: 20px;
            color: white;
        }
        .box-login input {
            width: 100%;
            padding: 0 10px;
            color: white;
            background: none;
            border: none;
            outline:none;
            font-size: 17px;
        }
        .box-login input::placeholder {
            color: white;
        }

        .button {
            width: 100%;
            margin-right: 100%;
            background: none;
            padding: 15px;
            border: 1px solid white;
            font-size: 18px;
            letter-spacing: 5px;
            line-height: 25px;
            margin-right: 50px;
            color: white;
            cursor: pointer;
            transition:  0.3s;
            justify-content: space-between;
        }
        .button:hover {
            background: rgb(0, 0, 0);
        }
        .alert-danger {
            background-color: transparent;
            border: none;
            color: white;
            text-align: center;
            padding: 0;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="avatar">
                <i class="fas fa-user"></i>
            </div>
            <br>
            <h4 class="h4">Login Form</h4>
            <form action="" method="POST">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <div class="box-login">
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="nim"id="inputNim" placeholder="Nim">
                </div>
                <div class="box-login">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" id="inputPassword" placeholder="Password">
                </div>
                    <input type="submit" name="login" class="button" value="Login">
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YhWW5s5T5Px1vniDQpttbBTmOhzdiBtdONjo4Zvddj50LCNm4hwGpC6mszPlHZYD" crossorigin="anonymous"></script>
</body>

</html>

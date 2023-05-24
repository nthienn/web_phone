<?php
    session_start();
    include('./config/config.php');
    $err = [];
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
        $query = mysqli_query($mysqli, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkEmail = mysqli_num_rows($query);
        if ($checkEmail==1) {
            $checkPass = $data['password'];
            if ($checkPass==$password) {
                $_SESSION['admin'] = $data;
                echo "<script> window.location.href='index.php' </script>";
            } else {
                $err['password'] = "Mật khẩu không chính xác";
            }
        } else {
            $err['email'] = "Email không tồn tại";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleadmin.css">
    <title>Đăng nhập Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            background-color: #f1f1f1;
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }

        .form-login {
            width: 360px;
            min-height: 100px;
            padding: 32px 24px;
            text-align: center;
            background-color: #fff;
            border-radius: 2px;
            margin: 24px;
            align-self: center;
            box-shadow: 0 2px 5px 0 rgba(51, 62, 73, 0.1);
        }

        .form-heading {
            font-size: 28px;
            font-weight: 400;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        .form-label {
            font-weight: 700;
            padding-bottom: 6px;
            font-size: 20px;
            text-align: left;
        }

        .form-control {
            height: 48px;
            padding: 8px 12px;
            border: 1px solid #b3b3b3;
            border-radius: 4px;
            outline: none;
            font-size: 16px;
        }

        .form-control:hover {
            border-color: #1dbfaf;
        }

        .form-message {
            font-size: 14px;
            line-height: 16px;
            padding: 4px 0 0;
            color: #f33a58;
            text-align: left;
        }

        .form-submit {
            outline: none;
            background-color: #1dbfaf;
            margin-top: 12px;
            padding: 12px 16px;
            font-weight: 700;
            color: #fff;
            border: none;
            width: 100%;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #1ac7b6;
        }

        .spacer {
            margin-top: 36px;
        }
    </style>
</head>
<body>
    <div class="main">
        <form autocomplete="off" method="POST" id="form" class="form-login">
            <h3 class="form-heading">Đăng nhập Admin</h3>
            <div class="spacer"></div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                <span class="form-message"><?php echo (isset($err['email']))?$err['email']:'' ?></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Mật khẩu" 
                class="form-control">
                <span class="form-message"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
            </div>
            <button class="form-submit" name="login">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
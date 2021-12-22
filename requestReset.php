<?php
ob_start();
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if (isset($_POST["email"])) {
    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetPasswords(code,email) VALUES ('$code','$emailTo')");

    if (!$query) {
        exit("Error");
    }

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'join.beasiswaku@gmail.com';                     //SMTP username
        $mail->Password   = 'r4h4si4be4sisw4ku';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


        //Recipients
        $mail->setFrom('join.beasiswaku@gmail.com', 'Beasiswaku');
        $mail->addAddress($emailTo);     //Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "<h1>Silahkan perbarui password anda</h1>
                            dengan klik <a href='$url'>di sini</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Silahkan periksa Email Anda!';
        echo "<script>
        alert('Silahkan periksa Email anda!');
     </script>";
    } catch (Exception $e) {
        echo "Gagal kirim. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            color: #fff;
            background: #004d79;
        }

        .logo {
            margin-bottom: 50px;
        }

        .title-menu {
            text-align: left;
            color: #004d79;
            padding-bottom: 8px;
        }

        .text-center {
            color: #004d79;
        }

        .text-bottom {
            color: #004d79;
            text-decoration: none;
        }

        .form-control {
            min-height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: transparent;
        }

        .form-control:focus {
            background: #e2e2e2;
        }

        .form-control,
        .btn {
            border-radius: 2px;
        }

        .login-form {
            width: 350px;
            margin: 30px auto;
            text-align: center;
        }

        .login-form h2 {
            margin: 10px 0 25px;
        }

        .login-form form {
            color: #7a7a7a;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #004d79;
            border: none;
            outline: none !important;
        }

        .login-form .btn:hover,
        .login-form .btn:focus {
            background: #2389cd;
        }

        .login-form a {
            color: #fff;
            text-decoration: underline;
        }

        .login-form a:hover {
            text-decoration: none;
        }

        .login-form form a {
            color: #7a7a7a;
            text-decoration: none;
        }

        .login-form form a:hover {
            text-decoration: underline;
        }

        .text-center small {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <div class="logo">
            <img src="img/logo1.png">
        </div>
        <form method="post">
            <h2 class="text-center">Reset Password</h2>
            <div class="form-group ">
                <div class="form-group has-error">
                    <div class="title-menu"><i class="fas fa-envelope"></i> Email Anda : </div>
                    <input type="text" class="form-control" name="email" placeholder="masukkan email anda" required="required">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Kirim">
                </div>
        </form>
    </div>
</body>

</html>
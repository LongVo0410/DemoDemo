<?php
include "index.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = sha1($_POST['password1']); // Hash the password
        $flagtbao = false;
        // Prepare SQL query to check credentials
        $sql = "SELECT * FROM dangky WHERE email = '$email' AND password = '$password'";
        $result=$connect->prepare($sql);
        $result->execute();
        if($result->num_rows>0){
            $flagtbao=true;
            require 'class/class.phpmailer.php';
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.sendgrid.net';
            $mail->Port = '587';
            $mail->SMTPAuth = true;
            $mail->Username = 'apikey';
            $mail->Password = 'your smtp apikey or password here';
            $mail->SMTPSecure = 'TLS';
            $mail->From = 'your mail here';
            $mail->FromName = 'Singup Confirmation';
            $mail->AddAddress($email);
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $mail->Subject = 'Verification code for Verify Your Email Address';

            $message_body = '
            <p>For verify your email address, enter this verification code when prompted: <b>'.$otp.'</b>.</p>
            <p>Sincerely,</p>
            ';
            $mail->Body = $message_body;

            if($mail->Send())
            {
                echo '<script>alert("Please Check Your Email for Verification Code")</script>';
                header('Refresh:1; url=email_verify.php?code='.$activation_code);
            }
            else
            {
                $message = $mail->ErrorInfo;
            }
        }

        
    }
    ?>
    <form action="login.php" method="post" id="dangky">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Login</h2>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg"  />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="login" id="ticklogin" value="Đăng nhập" class="btn btn-primary">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="dangky.php"
                                            class="fw-bold text-body"><u>Sign up here</u></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            <?php if (isset($_POST['login'])): ?>
                var isSuccess = <?php echo $flagtbao ? 'true' : 'false'; ?>;
                if (isSuccess) {
                    Swal.fire({
                        icon: "success",
                        title: "Đăng nhập thành công",
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Đăng nhập thất bại",
                        text: "Password or Email không tìm thấy!"
                    });
                }
            <?php endif; ?>
        });
    </script>
  </body>
</html>
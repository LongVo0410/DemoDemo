<?php
include "index.php";
echo $otp_chuoi=str_shuffle("0123456789");
echo "<br>";
echo $otp=substr($otp_chuoi,0,5);
$act_str=rand(1000000,1000000000);
echo "<br>";
$activation_code=str_shuffle(("abcdefghijklmno".$act_str));
echo $activation_code;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $isSuccess = false;
    $row=null;
    if (isset($_POST['checkemail'])){
        
        $email = $_POST['email'];
        $sql = "SELECT * FROM dangky WHERE email = '$email' ";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result); // dùng để truy vấn kiểm tra hàng đó có trùng không
      

    }
    if (isset($_POST['create'])) {
        $name = $_POST['name1'];
        $email = $_POST['email'];
        $password = sha1($_POST['password1']);
        $confirmpassword = sha1($_POST['confirmpassword']); // Cần mã hóa cùng phương thức
        $phone=$_POST['number'];

        if ($password == $confirmpassword) {
            // Nếu mật khẩu khớp, chèn vào cơ sở dữ liệu
            $sql = "INSERT INTO dangky (name, email, password,phone,otp,activate_code) VALUES (?, ?, ?,?,?,?)";
            $insert = $connect->prepare($sql);
            $insert->execute([$name, $email, $password,$phone,$otp,$activation_code]);
            $isSuccess = true; // Cập nhật kết quả thành công

            // Send OTP Mail tool PHPMailer
        }
    }
    ?>
    <form action="dangky.php" method="post" id="dangky">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                    <!-- Check email tồn tại hay không -->
                                     <?php 
                                    if($row){
                                        echo '<p style="color: red;">Email đã tồn tại</p>';
                                    }
                                     ?>
                                    <?php ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="name1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="name">Your Name</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="submit" name="checkemail" class="btn btn-primary" value="Check Email" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="confirmpassword" class="form-control form-control-lg"  />
                                        <label class="form-label" for="confirmpassword">Repeat your password</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="number" class="form-control form-control-lg"  />
                                        <label class="form-label" for="number">Your Phone</label>
                                    </div>
                                    <!-- <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="otp" class="form-control form-control-lg" placeholder="Input OTP" />
                                        
                                    </div>
                                    <div class="d-flex ">
                                        <input type="submit" value="Send OTP" name="sendOTP" class="btn btn-primary">
                                    </div> -->
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" name="agree"  />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="create" id="tick" value="Đăng ký" class="btn btn-primary">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php"
                                            class="fw-bold text-body"><u>Login here</u></a></p>
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
            // Hiển thị thông báo sau khi form submit
            <?php if (isset($_POST['create'])): ?>
                var isSuccess = <?php echo $isSuccess ? 'true' : 'false'; ?>;
                if (isSuccess ) {
                    Swal.fire({
                        icon: "success",
                        title: "Đăng ký thành công"
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Đăng ký thất bại",
                        text: "Password không trùng khớp hoặc OTP sai !!!"
                    });
                }
            <?php endif; ?>
        });
    </script>
  </body>
</html>

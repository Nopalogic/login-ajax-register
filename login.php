<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>LOGIN</label>
                        <hr>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="text" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>

                        <button class="btn btn-login btn-block btn-success">LOGIN</button>

                    </div>
                </div>

                <div class="text-center" style="margin-top: 15px;">
                    Belum punya akun? <a href="register.php">Silahkan Register</a>
                </div>

            </div>
        </div>
    </div>

    <script src="./jQuery/jquery-3.6.0.min.js"></script>
    <script src="./bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-login").click( function(){
                var username = $("#username").val();
                var password = $("#password").val();

                if(username.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib Diisi!'
                    });
                } else if(password.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi!'
                    });
                } else {
                    $.ajax({
                        url: "cek-login.php",
                        type: "POST",
                        data: {
                            "username": username,
                            "password": password
                        },

                        success:function(response){
                            if(response == "success"){
                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Anda akan diarahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                .then (function(){
                                    window.location.href = "dashboard.php";
                                });
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: "Login Gagal!",
                                    text: 'silahkan coba lagi!'
                                });
                            }
                            console.log(response);
                        },
                        error:function(response){
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });
                        console.log(response);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
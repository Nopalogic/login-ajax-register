<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
    <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>REGISTER</label>
                        <hr>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>

                        <button class="btn btn-register btn-success">REGISTER</button>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 15px;">
                    Sudah punya akun? <a href="login.php">Silahkan Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./jQuery/jquery-3.6.0.min.js"></script>
    <script src="./bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-register").click(function(){
                var nama_lengkap = $("#nama_lengkap").val();
                var username     = $("#username").val();
                var password     = $("#password").val();

                if(nama_lengkap.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text:'Nama Lengkap Wajib Diisi!'
                    });
                } else if(username.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text:'Username Wajib Diisi!'
                    });
                } else if(password.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text:'Password Wajib Diisi!'
                    });
                } else {
                    $.ajax({
                        url: "simpan-register.php",
                        type: "POST",
                        data: {
                            "nama_lengkap": nama_lengkap,
                            "username": username,
                            "password": password
                        },
                        success:function(response){
                            if(response == "success"){
                                Swal.fire({
                                    type: 'success',
                                    title: 'Register Berhasil!',
                                    text: 'silahkan login!'
                                });

                                $('#nama_lengkap').val('');
                                $('#username').val('');
                                $('#password').val('');
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Register Gagal!',
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
                        }
                    })
                }
            });
        })
    </script>
</body>
</html>
<?php
    session_start();

    if(!$_SESSION['id_user']){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active">MAIN MENU</li>
                    <a href="dashboard.php" class="list-group-item" style="color: #212529;">Dashboard</a>
                    <li class="list-group-item">Profile</li>
                    <a href="logout.php" class="list-group-item" style="color: #212529;">Logout</a>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <label>DASHBOARD</label>
                        <hr>

                        Selamat Datang <?php echo $_SESSION['nama_lengkap'] ?>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="./jQuery/jquery-3.6.0.min.js"></script>
    <script src="./bootstrap-4/js/bootstrap.min.js"></script>
</body>
</html>
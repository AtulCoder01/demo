<?php
session_start();



if( empty( $_SESSION['username'] ) || empty( $_SESSION['password'] )){
    echo "<script>window.location.href='index.php'</>";
}else{
    require_once('db.php');
    $sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."' ";
    $result = $conn->query($sql);
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile</title>
  </head>
  <body>
  <h1 align="center" class="mt-5" style="color:green;">Welcome <?php echo $_SESSION['username']; ?> !</h1>
    <div class="container mt-5">
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-secondary">
                <?php
                    if ( $result-> num_rows > 0) {
                        while( $row = $result->fetch_assoc() ){
                ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <th scope="row"><?php echo $row['name']; ?></th>
                                <th scope="row"><?php echo $row['username']; ?></th>
                                <th scope="row"><?php echo $row['email']; ?></th>
                                <th scope="row"><?php echo $row['phone']; ?></th>
                                <td><a href="profile.php?action=logout" class="btn btn-danger">Logout</a></td>
                            </tr>
                <?php
                        }

                    }
                ?>
                
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
if( isset($_REQUEST['action'])){
    if( $_REQUEST['action'] == 'logout'){
        session_destroy();
        echo "<script>toastr.success('Logout successfully.');</script>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000)</script>";
    }
}
?>
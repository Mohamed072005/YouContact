<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "youcontact");
if ($conn == false) {
    die('Connection Error' . mysqli_connect_errno());
}

$error = '';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `userprofile` WHERE `email` = '$email' AND `passwordd` = '$password'";
    $sql = mysqli_query($conn, $query);

    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME_1'] = $row['first_name'];
        $_SESSION['USER_NAME_2'] = $row['last_name'];
        header("location: hello.php");
    }else{
        $error = 'A user with this email does not exist';
    }
}
?>

<DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>YouContact</title>
</head>
<body class="bg-info-subtle">
    <main class="d-flex flex-column align-items-center">
        <div class="d-flex flex-column align-items-center mt-5">
            <h3 class="text-success">Welcome To YouContact</h3>
            <form method ="POST"  class="row w-75 justify-content-center g-3 mt-2">
                <div class="col-md-8">
                    <label for="validationDefaultUsername" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="email" class="form-control" name="email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="validationDefault03" required>
                </div>
                <div class="col-12 text-center mb-4">
                    <button class="btn btn-outline-success" name="login" type="submit">Log in</button>
                </div>
                <?php
                    echo "<div class='col-md-8'>
                    <p class='text-danger'>";

                    echo $error;

                    echo"</p>
                    </div>";
                ?>
                <div class="col-12 text-center">
                    <span>Need an account? <a href="index.php">sing in</a></span>
                </div>
            </form>
        </div>
    </main>
</body>
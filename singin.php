<?php
$con = mysqli_connect("localhost", "root", "", "youcontact");

if ($con == false) {
    die('Connection Error' . mysqli_connect_errno());
}

$error = '';

if (isset($_POST['sing'])) { 
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phnumber = $_POST['phnumber'];
    $date_create = date('Y-m-d h:i:s');

    $query = "SELECT * FROM `userprofile` WHERE `email` = '$email' OR `phone_number` =  '$phnumber'";
    $sql = mysqli_query($con, $query);

    if (mysqli_num_rows($sql) > 0) {
        $error = "Your Email and Phone Number have already been taken";
    } else {
        if ($password == $cpassword) {
            $query1 = "INSERT INTO userprofile(`first_name`, `last_name`, `email`, `passwordd`, `phone_number`, `date_create`) VALUES ('$fname','$lname','$email','$password','$phnumber','$date_create')";
            $result = mysqli_query($con, $query1);

            if ($result) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Error in inserting data into the database: " . mysqli_error($con);
            }
        } else {
            $error = "Your Passwords do not match!";
        }
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
            <form method ="POST"  class="row w-50 justify-content-center g-3 mt-2">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" name="first_name" id="validationDefault01" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last_name" id="validationDefault02" required>
                </div>
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
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Confirme Password</label>
                    <input type="password" class="form-control" name="cpassword" id="validationDefault03" required>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phnumber" id="validationDefault03" required>
                </div>
                <?php
                    echo "<div class='col-md-8'>
                    <p class='text-danger'>";

                    echo $error;

                    echo"</p>
                    </div>";
                ?>
                <div class="col-12 text-center mb-4">
                    <button class="btn btn-outline-primary" name="sing" type="submit">Sing in</button>
                </div>
                <div class="col-12 text-center">
                    <span>Already have an account? <a href="login.php">log in</a></span>
                </div>
            </form>
        </div>
    </main>
</body>

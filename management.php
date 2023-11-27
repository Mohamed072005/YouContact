<?php 
    $con = mysqli_connect("localhost", "root", "", "youcontact");
    if($con == false){
        die('Connection Error'. mysqli_connect_errno());
    }
    if (isset($_POST['ok'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $describ = $_POST['describ'];
        $date_create = date('y-m-d h:i:s');
        $user_id = $_SESSION['USER_ID'];
        
        $sql = "Insert into usercontacts (first_name, last_name, email, describ, date_create, user_profile_id) values ('$first_name', '$last_name', '$email', '$describ', '$date_create', '$user_id')";
        $query = mysqli_query($con, $sql);
    }
?>


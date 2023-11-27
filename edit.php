<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $edit = "SELECT first_name, last_name, email, describ FROM usercontacts WHERE id = '$id'";
    $result = mysqli_query(mysqli_connect("localhost", "root", "", "youcontact"), $edit);
    $scan = mysqli_fetch_assoc($result);
}
?>
<?php
include "navbar.php"
?>
<body>
    <main class="d-flex flex-column align-items-center">
        <div class="d-flex flex-column align-items-center mt-5">
            <h3 class="text-success">Update an Contact</h3>
            <form method ="POST" class="row w-50 justify-content-center g-3 mt-2">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" name="first_name" value="<?= $scan['first_name'] ?>" id="validationDefault01" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="<?= $scan['last_name'] ?>" id="validationDefault02" required>
                </div>
                <div class="col-md-8">
                    <label for="validationDefaultUsername" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="email" class="form-control" name="email" value="<?= $scan['email'] ?>" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Describ</label>
                    <input type="text" class="form-control" name="describ" value="<?= $scan['describ'] ?>" id="validationDefault03" required>
                </div>
                <div class="col-12 text-center">
                    <input class="border-light text-light rounded bg-primary" name="submit" type="submit" value="Submit">
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])){
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $describ = $_POST['describ'];

                $update = "UPDATE `usercontacts` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`describ`='$describ' WHERE id = '$id'";
                $results = mysqli_query(mysqli_connect("localhost", "root", "", "youcontact"), $update);
                
                if($result){
                    header("location: pro.php");
                }
            }
            ?>
        </div>
    </main>
    <?php
    include "footer.php"
    ?>
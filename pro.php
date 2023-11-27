<?php 
    session_start();
    //Create a contact
    include "management.php";
    //Delete a contact
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $id_Delete =  "DELETE FROM `usercontacts` WHERE `id` = '$id'";
        $delet = mysqli_query( $con, $id_Delete);
    }
?>
<?php
    include "navbar.php"
?>
<body>
    <main class="d-flex flex-column align-items-center">
        <div class="d-flex flex-column align-items-center mt-5">
            <h3 class="text-success">Create an Contact</h3>
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
                    <label for="validationDefault03" class="form-label">Describ</label>
                    <input type="text" class="form-control" name="describ" id="validationDefault03" required>
                </div>
                <div class="col-12 text-center">
                    <input class="border-light text-light rounded bg-primary" name="ok" type="submit" value="Submit">
                </div>
            </form>
        </div>
        <div class="container mt-4">
            <table class="border border-3 border-dark w-100 rounded">
                <tr class="border border-3 border-dark">
                    <th class="border border-top-2 border-dark h5 text-center">Profil</th>
                    <th class="border border-top-2 border-dark h5 text-center">First Name</th>
                    <th class="border border-top-2 border-dark h5 text-center">Last Name</th>
                    <th class="border border-top-2 border-dark h5 text-center">Email</th>
                    <th class="border border-top-2 border-dark h5 text-center">Describ</th>
                    <th class="border border-top-2 border-dark h5 text-center">Delete</th>
                    <th class="border border-top-2 border-dark h5 text-center">Edit</th>
                </tr>
                <?php
                $user_id = $_SESSION['USER_ID'];
                $sql = "SELECT * FROM usercontacts WHERE user_profile_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($user = mysqli_fetch_assoc($result)){?>
                <tr class="border border-3">
                    <th class="border border-top-2 text-center" style="width: 10%;"><a class="navbar-brand" href=""><img src="./brief-6-img/user-photo.png" class="img-fluid" alt=""></a></th>
                    <th class="border border-top-2 text-center"><?= $user['first_name'] ?></th>
                    <th class="border border-top-2 text-center"><?= $user['last_name'] ?></th>
                    <th class="border border-top-2 text-center"><?= $user['email'] ?></th>
                    <th class="border border-top-2 text-center"><?= $user['describ'] ?></th>
                    <th class="border border-top-2 text-center"><a class="navbar-brand" href="pro.php?id=<?= $user['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#eb0630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a></th>
                    <th class="border border-top-2 text-center"><a href="edit.php?id=<?= $user['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#2e74df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a></th>
                </tr>
                <?php }} ?>
            </table>
        </div>
    </main>
    <?php
    include "footer.php";
    ?>
</body>
</html>



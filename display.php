<?php
session_start();
include "management.php"
?>
<?php
include "navbar.php"
?>
<body>
    <main>
        <div class="container-fluid row d-flex justify-content-center mt-5">
            <div class="col-sm-4 h-50">
                <img src="./brief-6-img/Online Review-cuate.png" class="img-fluid" alt="">
            </div>
        </div>
        <div class="container mt-4">
            <table class="border border-3 border-dark w-100 rounded">
                <tr class="border border-3 border-dark">
                    <th class="border border-top-2 border-dark h5 text-center">Profil</th>
                    <th class="border border-top-2 border-dark h5 text-center">First Name</th>
                    <th class="border border-top-2 border-dark h5 text-center">Last Name</th>
                    <th class="border border-top-2 border-dark h5 text-center">Email</th>
                    <th class="border border-top-2 border-dark h5 text-center">Describ</th>
                    <th class="border border-top-2 border-dark h5 text-center">Management</th>
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
                    <th class="border border-top-2 text-center"><a class="navbar-brand" href="pro.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#14A44D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a></th>
                </tr>
                <?php }} ?>
            </table>
        </div>
    </main>
    <?php
    include "footer.php"
    ?>
</body>
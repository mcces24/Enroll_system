<div class="dropdown">
    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        $sel = "SELECT * FROM users WHERE role='Guidance Office' AND online = '1' AND username='$username'";
        $query = mysqli_query($conn, $sel);
        $resul = mysqli_fetch_assoc($query);
        ?>
        <span class="me-2 d-none d-sm-block"><?php echo $resul['name'] ?></span>
        <img class="navbar-profile-image" src="../../../admin/admin/user/uploads/<?php echo $resul['profile'] ?>" alt="Image">
    </div>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="../login/logout.php?id=<?php echo $resul['id'] ?>">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
    </ul>
</div>
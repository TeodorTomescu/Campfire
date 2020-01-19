<?php
    // Handle login request by comparing submitted password with database password 
    if ($METHOD === 'POST') {
        $email = $_POST['email'];        
        $user = get_user($email);
        $hashed = hash_password($_POST['password']);
        $valid = true;

        if ($user === null || $hashed !== $user['password']) {
            $valid = false;
        } else {
            $_SESSION['auth'] = $user;
            // Redirect to home page
            go_home();
        } 
    }


?>


<div class="form">
    <form class="register-form" action="/login" method="post">
    <?php if (isset($valid) && !$valid) {?>
        <em>Invalid email or password</em>
    <?php } ?>
        <input required type="email" name="email" placeholder="Email">
        <input required type="password" name="password" placeholder="Password">
        <input type="submit" value="Submit" id="submit">
    </form>
</div>
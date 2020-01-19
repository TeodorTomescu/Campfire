<?php
    if ($METHOD === 'POST') {
        $valid = true;

        // Validate post data

        // Validate email
        if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
        
        if (!strlen($_POST['first_name'])) {
            $valid = false;
        }

        if (!strlen($_POST['last_name'])) {
            $valid = false;
        }
        
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $valid = false;
        }

        // Remove password confirm
        unset($_POST['password_confirm']);

        if ($valid) {
            // Try to create user and handle duplicate user
            $duplicate_user = false;
            try {
                create_user($_POST);
                $user = get_user($_POST['email']);
                // Authenticate the user
                $_SESSION['auth'] = $user;

                // Redirect to home page
                go_home();
                // header('Location: ' . isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER['HTTP_HOST']);
            } catch (Exception $e) {
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    $duplicate_user = true;
                }
            }
        }
        
    }
?>

<div id="titleTing">
        <h1>Sign Up for Camp<span class = "highlight">Fire</span></h1>
        <p>Start exploring!</p>
    </div>
    <!-- Create div for registration page -->
    <div class="login-page">
        <!-- Create form where user will input information-->
        <div class="form">
            <?php if (isset($valid) && !$valid) {?>
                <em>Invalid user registration data</em>
            <?php } ?>
            <form class="register-form" action="/signup" method="post">
                <!-- Create fields -->
                <input type="text" id="regFN" name="first_name" placeholder="First name">
                <input type="text" id="regLN" name="last_name" placeholder="Last name">
                <input type="password" id="regPW1"  name="password" placeholder="Password">
                <input type="password" id="regPW2" name="password_confirm" placeholder="Confirm Password">
                <?php if (isset($duplicate_user) && $duplicate_user) {?>
                    <em>Email is already registered</em>
                <?php }?>
                <input type="text" id="regEM" name="email"placeholder="Email">
                <input type="submit" value="Submit" id="submit">
            </form>

        </div>
    </div>
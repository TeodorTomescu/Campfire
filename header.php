<header>
    <div class="container">
        <div id="brand">
            <h1>Camp<span class = "highlight">Fire</span></h1>
        </div>
        <!-- Create nav bar -->
        <nav>
            <ul>
                <!-- Navigation bar buttons -->
                <li><a href="/">Home</a></li>
                <?php if ($_SESSION['auth']) {?>
                    <li><a href="/submit">Submit a campsite</a></li>
                <?php } ?>
                <li><a href="About.html">About</a></li>
                <?php if (!$_SESSION['auth']) {?>
                    <li><a href="/login">Log in</a></li>
                    <li><a href="/signup">Sign up</a></li>
                <?php } else { ?>
                    <li><a href="/logout">Log out</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
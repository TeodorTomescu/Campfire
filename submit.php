<?php
    if (!is_authenticated()) {
        go_login();
    }

    if ($METHOD === 'POST') {
        // Validate campsite data
        $valid = isset($_POST['campsite_name']) &&
            isset($_POST['lat']) &&
            isset($_POST['lng']) &&
            isset($_POST['description']);        

        if ($valid) {
            // Try to cereate campsite
            try {
                $id = create_campsite($_POST);
                // Redirect to campsite page
                go_campsite($id);
            } catch (Exception $e) {
                error_log($e);
                $valid = false;
            }
        }
        
    }



?>

<div id="titleTing">
    <h1>Submit a new campsite!</h1>
</div>
<div class="login-page">
    <!-- Declare submission form, input fields, and validate that the campsite name is greater than 2 digits-->
    <div class="form">
        <form class="register-form" method="post">
        <?php if (isset($valid) && !$valid) {?>
                <em>Unable to create campsite</em>
            <?php } ?>
            <input type="text" placeholder="Campsite name" name="campsite_name" required pattern=".{2,}">
            <textarea cols="42" rows="20" name="description" placeholder="Description"></textarea>
            <input required type="text" name="lat" placeholder="Latitude">
            <input required type="text" name="lng" placeholder="Longitude">
            <!-- image submission -->
            Select image to upload:
            <input type="file" name="img" id="fileToUpload">
            <input type="submit" value="Submit" id="submit">
        </form>
    </div>
</div>
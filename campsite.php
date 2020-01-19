<?php
    $pieces = explode('/', $PATH);    
    if (count($pieces) >= 3) {        
        $id = array_values(array_slice($pieces, -1))[0];
        $campsite = get_campsite($id);
        $reviews = get_reviews($id) || array();            
    } else {
        return go_home();
    }

    if ($METHOD === 'POST') {        
        $rating = (int) $_POST['rating'];
        // Validate review
        $valid = ($rating >= 1 && rating <= 5);
        
        if ($valid) {
            // Create review
            try {
                create_review([
                    'rating' => $rating,
                    'comment' => $_POST['comment'],
                    'user_email' => $_SESSION['auth']['email'],
                    'campsite_id' => $campsite['id'],
                ]);
                go_campsite($id);
            } catch (Exception $e) {
                $valid = false;
            }
        }                        
    }
?>

<section id="individualResult">
    <div class="bicontainer" id="IRtext">
        <!-- Title and desc -->
        <h1>
            <?= $campsite['name'] ?>
        </h1>
        <!-- <p><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span> by 2 reviewers</p> -->
        <h2>Description</h2>
        <p>
            <?= $campsite['description']?>
        </p>
    </div>

    <script>
        var CAMPSITE_LOCATION = {
            lat: <?= $campsite['lat'] ?>,
            lng: <?= $campsite['lng'] ?>
        };
    </script>

    <!-- Link image -->
    <div id="mapcont2">
        <div id="map2"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOwugZY04hVMOjN5_Tjgr_R40oRxNW1jY&callback=initMapSingle">
        </script>
    </div>

    <div class="container">
        <div class="form">
            <form class="register-form" method="post">
                <?php if (isset($valid) && !$valid) {?>
                <em>Unable to create review</em>
                <?php } ?>
                <textarea style="width: 100%" rows=2 name="comment" placeholder="Comment"></textarea>
                <select name="rating">
                    <option>Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="submit" value="Submit" id="submit">
            </form>
        </div>
        <!-- Create user review section using the same custom-counter class used in results_sample-->
        <h1>User Reviews</h1>
        <ol class="custom-counter">
            <?php foreach ($reviews as $review) { ?>
            <li>
                <?php for ($rating = 0; $rating < $review['rating']; $rating++) { ?>
                <span>&#128293;</span>
                <?php } ?>
                <!-- <p><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span><span>&#128293;</span></p> -->
                <p>
                    <?= $review['comment'] ?>
                </p>
                <p>
                    <?= $review['user_email'] ?>
                </p>
            </li>
            <?php } ?>
        </ol>
    </div>
</section>
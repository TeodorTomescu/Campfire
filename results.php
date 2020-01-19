<?php
    $query = $_GET['q'];
    try {
        $results = find_campsites($query);
    } catch (Exception $e) {
        error_log($e);
    }    
?>

    <div class="container">
        <div class="bicontainer" id="resultsTitle">
            <h1>Search results:</h1>
            <!-- Declare an unordered list with the class custom-counter which will later be used to give our list items some personality-->
            <ol class="custom-counter">

                <?php foreach ($results as $campsite) { ?>
                    <li>
                    <h1>
                        <a href="/campsite/<?=$campsite['id']?>", \<?=$campsite['name']?></a>
                    </h1>
                    <p>Latitude, longitude: <?=$campsite['lat']?>, <?=$campsite['lat']?></p>
                </li>
                <?php } ?>

            </ol>
        </div>
        <div id="mapcont">
            <div id="map"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE2D3YRJbeIx4NjHvFo3I_X0a0PlUg42s&callback=initMapResults">
            </script>
        </div>
    </div>
//Declare map function for individual objects page
function initMapSingle() {
    //declare variables
    var location = {lat: 43.8050234, lng: -79.1394137};
    //inititalize new map
    var map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 9,
        center: location
    });
    //define marker for individual campsite
    var marker1 = new google.maps.Marker({
        position: location,
        map: map2
    });
}
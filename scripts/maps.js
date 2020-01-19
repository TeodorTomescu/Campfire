//Initialize map function for search results page
function initMapResults() {
    //Declare variables
    var ting = { lat: 43.9050234, lng: -79.1394137 }
    var location = { lat: 43.8050234, lng: -79.1394137 };
    var location1 = { lat: 44.0345701, lng: -79.2709219 };
    var location2 = { lat: 43.990719, lng: -78.73886 };
    var marker1Content = '<h1><a href="individual_sample.html">Glen Rouge Campground</a></h1><b></b><p>Great campsite situated near Ajax</p>';
    var marker2Content = '<h1><a href="individual_sample.html">Cedar Beach Resort</a></h1><b></b><p>Great outdoor camping activites</p>';
    var marker3Content = '<h1><a href="individual_sample.html">Cedar Park Resort</a></h1><b></b><p>Family fun!</p>';
    //Define new map with set options
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: ting
    });

    //Define the info windows which pop up when a certain marker is selected
    var infowindow1 = new google.maps.InfoWindow({
        content: marker1Content
    });
    var infowindow2 = new google.maps.InfoWindow({
        content: marker2Content
    });
    var infowindow3 = new google.maps.InfoWindow({
        content: marker3Content
    });
    //first marker
    var marker1 = new google.maps.Marker({
        position: location,
        map: map,
        title: 'Glen Rouge',
        label: '1'
    });
    //Listener waits until its clicked and then opens correct info window
    marker1.addListener('click', function () {
        infowindow1.open(map, marker1);
    });
    //second marker
    var marker2 = new google.maps.Marker({
        position: location1,
        map: map,
        title: 'Cedar Beach',
        label: '2'
    });
    marker2.addListener('click', function () {
        infowindow2.open(map, marker2);
    });
    //third marker
    var marker3 = new google.maps.Marker({
        position: location2,
        map: map,
        title: 'Cedar Park',
        label: '3'
    });
    marker3.addListener('click', function () {
        infowindow3.open(map, marker3);
    });
}







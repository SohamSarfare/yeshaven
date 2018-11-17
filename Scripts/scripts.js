// JavaScript Document
$(document).ready(function(){
	L.mapbox.accessToken = 'pk.eyJ1IjoibWlrZXN0YW5seSIsImEiOiJjamppczV0YnE1eXJoM2tvNmpla3poaGMyIn0.I820UjMupRh8a64yZ8LEng';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([55.67691, -4.06661], 13);

L.mapbox.featureLayer({
    
    type: 'Feature',
    geometry: {
        type: 'Point',
        
        coordinates: [-4.06661,55.67691]
    },
    properties: {
        title: 'Strathaven',
        description: 'Scotland',
        
        'marker-size': 'large',
        'marker-color': '#406ab4',
        'marker-symbol': 'city'
    }
}).addTo(map);
	
	$('.mobile-view').click(function(){
		$('.desktop-view').toggleClass('expand');
	});
});


function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

$(function () {
	"use strict";

    /* basic map */
    var mapBasic = L.map('map-basic').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapBasic);

    L.marker([51.506531, -0.088234]).addTo(mapBasic)
        .bindPopup('London Bridge')
        .openPopup();

    mapBasic.on('click', onMapClick);

    /* icon map */
    var mapIcon = L.map('map-icon').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapIcon);

    var CustomIcon = L.Icon.extend({
        options: {
            iconSize:     [40, 40],
            shadowSize:   [50, 64],
            iconAnchor:   [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor:  [-3, -76]
        }
    });

    var svgmarker = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="#00ff00" d="M18.364 17.364L12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>';
    var svggasstation = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="#ff0000" d="M3 19V4a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v8h2a2 2 0 0 1 2 2v4a1 1 0 0 0 2 0v-7h-2a1 1 0 0 1-1-1V6.414l-1.657-1.657 1.414-1.414 4.95 4.95A.997.997 0 0 1 22 9v9a3 3 0 0 1-6 0v-4h-2v5h1v2H2v-2h1zM5 5v6h7V5H5z"/></svg>';
    var svgbuilding = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="#0000ff" d="M21 19h2v2H1v-2h2V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v15h2V9h3a1 1 0 0 1 1 1v9zM7 11v2h4v-2H7zm0-4v2h4V7H7z"/></svg>';

    /* 
    For data URI SVG support in Firefox & IE it's necessary to URI encode the string
    & replace the '#' character with '%23'. `encodeURI()` won't do this which is
    why `replace()` must be used on the string afterwards.
    */
    var urlmarker = encodeURI("data:image/svg+xml," + svgmarker).replace('#','%23');
    var urlgasstation = encodeURI("data:image/svg+xml," + svggasstation).replace('#','%23');
    var urlbuilding = encodeURI("data:image/svg+xml," + svgbuilding).replace('#','%23');

    var markerIcon = new CustomIcon({iconUrl: urlmarker});
    var gasStationIcon = new CustomIcon({iconUrl: urlgasstation});
    var buildingIcon = new CustomIcon({iconUrl: urlbuilding});

    L.marker([51.506531, -0.088234], {icon: markerIcon}).bindPopup("I am data URI SVG icon.").addTo(mapIcon);    
    L.marker([51.501531, -0.084234], {icon: gasStationIcon}).bindPopup("I am Gas Station data URI SVG icon.").addTo(mapIcon);    
    L.marker([51.4976, -0.100937], {icon: buildingIcon}).bindPopup("I am Building data URI SVG icon.").addTo(mapIcon);


    /* polygon map */
    var mapPolygon = L.map('map-polygon').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapPolygon);

    var marker = L.marker([51.5, -0.09]).addTo(mapPolygon);

    var circle = L.circle([51.508, -0.11], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mapPolygon);

    var polygon = L.polygon([
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
    ]).addTo(mapPolygon);

    marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
    circle.bindPopup("I am a circle.");
    polygon.bindPopup("I am a polygon.");

    var popup = L.popup();

    function onMapPolygonClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mapPolygon);
    }

    mapPolygon.on('click', onMapPolygonClick);

    /* geojson map */
    var mapGeojson = L.map('map-geojson');

    mapGeojson.createPane('labels');

    // This pane is above markers but below popups
	mapGeojson.getPane('labels').style.zIndex = 650;

	// Layers in this pane are non-interactive and do not obscure mouse/touch events
	mapGeojson.getPane('labels').style.pointerEvents = 'none';

	var cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

	var positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
		attribution: cartodbAttribution
	}).addTo(mapGeojson);

	var positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
		attribution: cartodbAttribution,
		pane: 'labels'
	}).addTo(mapGeojson);

	var geojson = L.geoJson(euCountries).addTo(mapGeojson);

	geojson.eachLayer(function (layer) {
		layer.bindPopup(layer.feature.properties.name);
	});

	mapGeojson.setView({ lat: 47.040182144806664, lng: 9.667968750000002 }, 4);

});
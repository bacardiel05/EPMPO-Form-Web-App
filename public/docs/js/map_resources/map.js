var counterCORD = 0;
var map;
//assists in storing points clicked by user
var paths = {
    lat: [],
    lng: []
};
//holds points generated by user
var makersClicked = [];
var linesGenerated = [];
// Globals for shapes on map
var polylines = [];
var points = [];

//document.getElementById("points").value = points;

console.log(points);

//clears points & lines and objects related to shapes on map
function clearMetadata() {
    //lines of query
    for (var i = 0; i < polylines.length; i++) {
        polylines[i].setMap(null);
    }
    //crashes
    for (var i = 0; i < points.length; i++) {
        points[i].setMap(null);
    }
    //line generated that connects markers by user
    for (x in linesGenerated) {
        linesGenerated[x].setMap(null);
    }
    //markers user generated
    for (x in makersClicked) {
        makersClicked[x].setMap(null);
        makersClicked[x].setMap(null);
    }
    paths = {
        lat:null,
        lng:null
    };
    paths = {
        lat:[],
        lng:[]
    };
    points = [];
    polylines = [];
    makersClicked = [];
    linesGenerated = [];
    counterCORD = 0;
    clearCrashesData();
}

function addLine(points) {
    var poly;
    var to_vizualize = [{
            lat: points.lat[counterCORD - 2],
            lng: points.lng[counterCORD - 2]
        },
        {
            lat: points.lat[counterCORD - 1],
            lng: points.lng[counterCORD - 1]
        }
    ]
    poly = new google.maps.Polyline({
        path: to_vizualize,
        strokeColor: 'blue',
        strokeOpacity: 1.0,
        strokeWeight: 3
    });
    poly.setMap(map);
    linesGenerated.push(poly);
}

// Initialize and add the map
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), { // callback
        zoom: 11,
        disableDoubleClickZoom: true,
        center: new google.maps.LatLng(31.837465, -106.2851078)
    });
    map.addListener('dblclick', addLatLng);
}

// Handles click events on a map, and adds a new points and connects them with line
function addLatLng(event) {

    paths.lat.push(event.latLng.lat());
    paths.lng.push(event.latLng.lng());
    counterCORD++;

    if (counterCORD >= 2) {
        addLine(paths);
    }
    
    var marker = new google.maps.Marker({
        position: event.latLng,
        title: '#' + counterCORD, 
        map: map
    });
    makersClicked.push(marker);
    console.log(makersClicked);
    document.getElementById("point").value = makersClicked;
}
//get coordinates between the points
function generateCoordinates(point1, point2, circlesOnLines) {
    let diffLan = difference(point1.lat, point2.lat) / circlesOnLines;
    let diffLot = difference(point1.lng, point2.lng) / circlesOnLines;

    const to_visualize = {
        lat: parseFloat(point1.lat),
        lng: parseFloat(point1.lng)
    };
    var genCord = [];

    for (let i = 0; i < circlesOnLines; i++) {
        to_visualize.lat += diffLan;
        to_visualize.lng += diffLot;
        genCord.push(Object.values(to_visualize));
    }
    return genCord;
}
//helper method
function difference(num1, num2) {
    return num2 - num1;
}

function pointInTheMiddle(point1, point2) {
    let to_visualize = {
        lat: 0,
        lng: 0
    };
    to_visualize.lng = (point1.lng + point2.lng) / 2;
    to_visualize.lat = (point1.lat + point2.lat) / 2;

    //debugging purposes
    var marker = new google.maps.Marker({
        position: to_visualize,
        map: map
    });
    return to_visualize;
}

// Function that will iterate 2 points at a time and draws 2 points per iteration so
// user can click infinite circles and draw
function point_drawer() {
    let circleCordinates = [];
    for (let i = 0; i < paths.lat.length; i++) {
        if (i >= 1) {
            let point1 = {
                lat: parseFloat(paths.lat[i]),
                lng: parseFloat(paths.lng[i])
            };
            let point2 = {
                lat: parseFloat(paths.lat[i - 1]),
                lng: parseFloat(paths.lng[i - 1])
            };
            circleCordinates.push(generateCoordinates(point1, point2, 300));
            filterCrashes(circleCordinates);
            circleCordinates = [];
        }
    }
}

function lineDrawer() {
    let circleCordinates = [];
    for (let i = 0; i < paths.lat.length; i++) {
        if (i >= 1) {
            let point1 = {
                lat: parseFloat(paths.lat[i]),
                lng: parseFloat(paths.lng[i])
            };
            let point2 = {
                lat: parseFloat(paths.lat[i - 1]),
                lng: parseFloat(paths.lng[i - 1])
            };
            circleCordinates.push(generateCoordinates(point1, point2, 300));
            drawLines(circleCordinates);
            circleCordinates = [];
        }
    }
}
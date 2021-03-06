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

var bridges_points = [];
var crash_points = [];

var pavementsData = {
    good: 0,
    fair: 0,
    poor: 0,
    lane_miles: 0
}
var bridgeData = {
    good: 0,
    fair: 0,
    poor: 0,
    deckArea_good: 0,
    deckArea_fair: 0,
    deckArea_poor: 0
};
var crashesData = {
    total_crashes_tx: 0,
    fatal_crashes_tx: 0, // K - killed
    serious_injury_crashes_tx: 0, // A - suspected serious
    ped_bike_crashes_tx: 0,
    total_crashes_nm: 0,
    fatal_crashes_nm: 0,
    serious_injury_crashes_nm: 0,
    ped_bike_crashes_nm: 0
}

function clearBridgesPoints() {
    for (var i = 0; i < bridges_points.length; i++) {
        bridges_points[i].setMap(null);
    }
    bridges_points = [];
    clear_HTML_N_ObjectsData("bridges");
}

function clearCrashesPoints() {
    for (var i = 0; i < crash_points.length; i++) {
        crash_points[i].setMap(null);
    }
    crash_points = [];
    clear_HTML_N_ObjectsData("crashes");
}

function clearPavementsLines() {
    for (var i = 0; i < polylines.length; i++) {
        polylines[i].setMap(null);
    }
    polylines = [];
    clear_HTML_N_ObjectsData("pavements");
}

//clears points & lines and objects related to shapes on map
function clearMetadata() {
    clearPavementsLines();
    clearCrashesPoints();
    clearBridgesPoints();

    //line generated that connects markers by user
    for (x in linesGenerated) {
        linesGenerated[x].setMap(null);
    }
    //markers user generated
    for (x in makersClicked) {
        makersClicked[x].setMap(null);
        makersClicked[x].setMap(null);
    }
    // Clears points.
    for (x in points) {
        points[x].setMap(null);
    }

    paths = {
        lat: null,
        lng: null
    };
    paths = {
        lat: [],
        lng: []
    };
    points = [];
    makersClicked = [];
    linesGenerated = [];
    counterCORD = 0;
    clear_HTML_N_ObjectsData("crashes");
    clear_HTML_N_ObjectsData("bridges");
    clear_HTML_N_ObjectsData("pavements");
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
    /* If project is not on show, do not enable listener

       This could have been solved by using removeEventListener() but for some reason is throwing 
       and error. This was necessery so when user is on show he or she will not be able to click on
       the map and since this will draw points. 
       Project is visible since on show blade we made it global.
    */
    try {
        if (project.status == 2) {
            // no listener
            console.log("No listener");
        } else {
            map.addListener('dblclick', addLatLng);
        }
    } catch {
        map.addListener('dblclick', addLatLng);
    }
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
    document.getElementById("point").value = JSON.stringify(paths);
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
function point_drawer(typeOfPoint) {
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
            if (typeOfPoint == "crashes") {
                filterCrashes(circleCordinates);
            } else if (typeOfPoint == "bridges") {
                filterBridges(circleCordinates);
            }

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
/** 
 * This Function plots the points saved on project so user can see on show and edit
 * where he or she had clicked. Without this function the map will appear empty after having the project saved.
 * Checks if values exists on the bridges, crashes and pavements. If value exists then 
 * run query so points can be seen. 
 */
function show_edit_ViewMap() {
    let image = "../../docs/images/redPin.png";
    try {
        let markers = JSON.parse(project.points);
        for (marker in markers.lat) {
            paths.lat.push(markers.lat[marker]);
            paths.lng.push(markers.lng[marker]);
            counterCORD++; // global var that counts click, we are adding since add line requires this number. Can be seen on action on addLatLng Function
            if (marker >= 1) {
                addLine(paths);
            }
            let to_Plot = {
                lat: markers.lat[marker],
                lng: markers.lng[marker]
            };

            let pointT = new google.maps.Marker({
                position: to_Plot,
                title: "#" + (parseInt(marker) + 1),
                icon: image
            });
            pointT.setMap(map);
            points.push(pointT);
        }
        if (project.poor_bridges + project.good_bridges + project.fair_bridges > 0) {
            console.log("about to call bridges");
            point_drawer('bridges');
        }
        if (project.pavement_fair_condition  + project.pavement_good_condition + project.pavement_fair_condition > 0) {
            console.log("about to call pavements");
            lineDrawer();
        }
       
        if (project.total_crash_EP + project.total_crash_DA > 0) {
            console.log("about to crashes");
            point_drawer('crashes');
        }
    } catch {
        console.log("Nothing on map");
    }
}

function clear_HTML_N_ObjectsData(toErase) {
    if (toErase == "crashes") {
        setAll(0, crashesData);
        document.getElementById("EP_total_crash").value = 0;
        document.getElementById("EP_fatal_crash").value = 0;
        document.getElementById("EP_injury_crash").value = 0;
        document.getElementById("EP_pedestrian_crash").value = 0;
        document.getElementById("DA_total_crash").value = 0;
        document.getElementById("DA_fatal_crash").value = 0;
        document.getElementById("DA_injury_crash").value = 0;
        document.getElementById("DA_pedestrian_crash").value = 0;
    } else if (toErase == "bridges") {
        setAll(0, bridgeData);
        document.getElementById("good_bridge").value = 0;
        document.getElementById("good_deck_area").value = 0;
        document.getElementById("fair_bridge").value = 0;
        document.getElementById("fair_deck_area").value = 0;
        document.getElementById("poor_bridge").value = 0;
        document.getElementById("poor_deck_area").value = 0;
    } else if (toErase == "pavements") {
        setAll(0, pavementsData);
        document.getElementById("good_pavement").value = 0;
        document.getElementById("fair_pavement").value = 0;
        document.getElementById("poor_pavement").value = 0;
    }
}

/** 
 * Handles point section on map
 *  
 */

function setAll(val, obj) {
    Object.keys(obj).forEach(function (index) {
        obj[index] = val
    });
}

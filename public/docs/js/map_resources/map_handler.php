<?php
    /** 
     * Backend for Map
     * Sends query and gets table 
     * Works only with Points
    */
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 30000); //300 seconds = 5 minutes
    
    $user = "ctis";
    $db = "mpo_test_jhuerta";
    $ps = "19691963";
    $host = "irpsrvgis35.utep.edu";
    $conn = mysqli_connect($host, $user, $ps, $db);

    $key = $_GET['key']; // key sent from front-end, from the object defined at the ajax call
    //global array that will return requested data
    $toReturn = array();
    $temporal = 0;
    
    $shape = array();	

    if ($key == "all_pm18_19") {
        $query = "select OGR_FID,crash_year,type,killed,classA,classB,classC,classO,non_injuri,unknown_in,statefp, astext(SHAPE) as shape from pm18_19";
    }else if($key == "form_bridges"){
        $query = "select OGR_FID,cat10___br,cat29___de, astext(SHAPE) as shape from $pm_table where corridor_key = '$key'"; 
    }else {
        $query = "select astext(SHAPE) as shape from $pm_table where corridor_key = '$key'"; // temporal note: find an elegant way to generalize this
    }

    $result = mysqli_query($conn, $query); 
    while($temporal = mysqli_fetch_assoc($result)){ 
	    array_push($shape, $temporal);
    }

    $toReturn['shape_arr'] = $shape; // store it in an index on our array, by name == more significant
    header('Content-Type: application/json'); //specifies how the data will return 
    echo json_encode($toReturn); //encodes our array to json, which lets us manipulate in front-end

    $conn->close();
?>


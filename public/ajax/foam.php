<?php
    //use \App\FoamType;
    //$foamtypes = FoamType::all();
    $response['foamtypes']= "test";
    header('Content-type: application/json');
    echo json_encode($response);
?>
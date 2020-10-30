<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $response = array("code" => 200,"value" => []);

    if (isset($_POST["animal"])) {
        if ($_POST["animal"] == "cat") {
            array_push($response["value"], array("animals" => "cat","people" => "soup"));
        }
    }

    array_push($response["value"], array("animals" => "dog","people" => "max"));

    echo json_encode($response);

?>
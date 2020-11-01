<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    require("connect.php");

    $response = array("query" => null, "code" => 200,"value" => []);

    $condition = null;
    if ( isset($_POST["nickname"]) && !empty($_POST["nickname"]) ) {
        $condition = "WHERE nickname = '{$_POST["nickname"]}' ";
        // $condition = "WHERE nickname = '".$_POST["nickname"]."' ";
    }
    $sql = "SELECT * FROM students {$condition}";
    // $response["query"] = $sql;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($response["value"], $row);
        }
    } else { $response["code"] = 404; }

    echo json_encode($response);
    
?>
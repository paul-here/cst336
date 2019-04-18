<?php
    
    $keyword = $_GET['q'];
    
    $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.unsplash.com/search/photos/?client_id=8be25c82bd945171ae42021d857679273cdeddd23f48356b2eb77002d5dd26ff&query=$keyword",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
        ),
    ));
    
    $jsonData = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    $data = json_decode($jsonData, true);  //from JSON format to an Array
    
    //print_r($data);
    $imageURL = $data["results"][0]["urls"]["regular"];
    $desc = $data["results"]["description"];
    $attribution = $data["results"][0]["user"]["links"]["html"];
    $name = $data["results"][0]["user"]["name"];
    
    // print_r($imageURL);
    // print_r($attribution);
    // print_r($name);
    
    $values = array($imageURL, $desc, $attribution, $name);
    
    echo json_encode($values); 
?>
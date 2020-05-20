<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

//include database and object files
// include database and object files
include_once '../config/database.php';
include_once '../objects/posts.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$posts = new posts($db);
 
// read products will be here

// query products
$stmt = $posts->read();
//get row count 
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
    
    // products array
    $posts_arr=array();
    //$posts_arr['data']=array();
 //
    // retrieve our table contents
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

 
        $posts_item=array(
            'id' => $id,
            'roomno' => $roomno,
            'seater' => $seater,
            'feespm' => $feespm,
            'foodstatus' => $foodstatus,
            'stayfrom' => $stayfrom,
            'duration'=> $duration,
            'course'=> $course,
            'regno'=> $regno,
            'emailid'=> $emailid,

        );
 
        array_push($posts_arr, $posts_item);
        
    }
 
 
    // show products data in json format 
    echo json_encode($posts_arr);
}


else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}











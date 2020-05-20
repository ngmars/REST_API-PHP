<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

//include database and object files
// include database and object files
include_once '/Applications/XAMPP/xamppfiles/htdocs/Hostel Management/api/config/database.php';
include_once '/Applications/XAMPP/xamppfiles/htdocs/Hostel Management/api/objects/posts.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$posts = new posts($db);

//Get id from URL
$posts->id=isset($_GET['id']) ? $_GET['id']:die();

//read single 
$posts->read_single();

//create array 
$posts_arr =array(
	'id'=> $posts->id,
	'title'=> $posts->title,
	'body'=> $posts->body,
	'author'=> $posts->author,
	'category_id'=> $posts->category_id,
	'category_name'=> $posts->category_name

	);

//make JSON
//echo($posts->title);
//print_r(json_encode(($posts_arr)));
                                
                        
            echo ($posts->title);
            echo ($posts->body);
            echo ($posts->author);
            echo ($posts->category_id);


?>
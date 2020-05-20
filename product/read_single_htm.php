
                        
                           <?php
                                if (isset($_POST['id']) && $_POST['id']!="") {
                                 $order_id = $_POST['id'];
                                 $url = "http://localhost/Hostel Management/api/product/read_single.php?id=".$id;
                                 
                                 $client = curl_init($url);
                                 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                                 $stmt = curl_exec($client);
                                 
                                 $result = json_decode($stmt);
                                 
                             
                                 echo ( $result->id);
                                 echo ($result->title);
                                 echo ( $result->body);
                                 echo ($result->author);
                               
                                }
                                    ?>
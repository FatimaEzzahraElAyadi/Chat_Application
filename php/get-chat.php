<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    
                    $v = explode('.',$row['files']);
                  
                    if($row['msg'] != NULL){ 
                         $output .= '<div class="chat outgoing">
                         
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div></div>';
                    }
                    
                     else if($v[1] == "png" || $v[1] == "jpg" || $v[1] == "JPG"||$v[1] == "jpeg"){
                        $output .= '<div class="chat outgoing">
                        <div class="details">
                        <img style ="border-radius: 6px;
                                    width: 150px;"  src="'.$row['files'].'" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                    }
                    
                    else if($v[1] == "mp3" || $v[1] == "wav" || $v[1] == "mp4"   ){
                           $output .= '<div class="chat outgoing">
                        <div class="details">
                        <img style ="border-radius: 6px;
                                     width: 50px; height:50px"  src="micro.png" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                        
                    } else{
                         $output .= '<div class="chat outgoing">
                        <div class="details">
                        <img style ="border-radius: 6px;
                                     width: 157px;height: 85px"  src="files.png" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                    }
									
                }
                 else if ($row['outgoing_msg_id'] !== $outgoing_id){
                       $v = explode('.',$row['files']);
                  

                    if($row['msg'] != NULL){
                        $output .= '<div class="chat incoming">
                        <img src="'.$row['img'].'" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p></div> </div>';
                    }

                   else if($v[1] == "png" || $v[1] == "jpg" || $v[1] == "JPG" ||$v[1] == "jpeg" ){
                        $output .= '<div class="chat incoming">
                        <div class="details">
                        
                        <img style ="border-radius: 6px;
                                    width: 155px; height:100px"  src="'.$row['files'].'" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                           }
                             else if($v[1] == "mp3" || $v[1] == "wav"  ){
                           $output .= '<div class="chat incoming">
                        <div class="details">
                        <img style ="border-radius: 6px;
                                     width: 50px; height:50px"  src="micro.png" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                        
                    }
                     else{
                         $output .= '<div class="chat incoming">
                        <div class="details">
                        <img style ="border-radius: 6px;
                                     width: 157px;height: 85px"  src="files.png" alt=""> 
                                    <div class="downloadImg"> 
                                        <a href="'.$row['files'].'"  download target="_blank">
                                        <i class="fas fa-download" ></i>Download</a>
                                    </div>
                                </div> </div>';
                    }
            }
        }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>
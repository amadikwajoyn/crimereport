<?php
ob_start();
session_start();
require_once('db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $sql = "SELECT * FROM `crime` WHERE `id` = '$id';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $img=$result['img'];
       $img2=explode("##", $img);
                  $a = count($img2);
        for ($i=0; $i < $a; $i++) { 

      array_map('unlink', (glob("file/".$img2[$i])? glob("file/".$img2[$i]): array()));
    }
    }
        $bulk_option = "delete";
        
        if($bulk_option == 'delete'){
            $bulk_del_query = "DELETE FROM `crime` WHERE `id` = '$id';";
            mysqli_query($conn, $bulk_del_query);
             header('Location: view.php');

        }
                
    }
    
?>
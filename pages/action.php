<?php 
          include("connect.php"); 

          //Tableau Tempurature

   if(isset($_POST['id'])){
    $stmt = $conn->prepare ("SELECT * FROM iot_project");
    $stmt -> execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $res){
  
  echo'<tr class="row100 body">
  <td class="cell100 column2">'.$res["id"].'</td>
  <td class="cell100 column3">'.$res["temperature"].'</td>
  <td class="cell100 column4">'.$res["humidity"].'</td>
  <td class="cell100 column5">'.$res["created_at"].'</td>
  </tr>';

  
  }
   }


        //Tableau Courant

   if(isset($_POST['idc'])){
    $stmt = $conn->prepare ("SELECT * FROM iot_project");
    $stmt -> execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $res){
  
  echo'<tr class="row100 body">
  <td class="cell100 column2">'.$res["id"].'</td>
  <td class="cell100 column3">'.$res["courant"].'</td>
  <td class="cell100 column4">'.$res["tension"].'</td>
  <td class="cell100 column4">'.$res["puissance"].'</td>
  <td class="cell100 column5">'.$res["created_at"].'</td>
  </tr>';

  
  }
   }

      //Tableau Eclirage

   if(isset($_POST['ide'])){
    $stmt = $conn->prepare ("SELECT * FROM iot_project");
    $stmt -> execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $res){
  
  echo'<tr class="row100 body">
  <td class="cell100 column2">'.$res["id"].'</td>
  <td class="cell100 column3">'.$res["sensorValue"].'</td>
  <td class="cell100 column5">'.$res["created_at"].'</td>
  </tr>';

  
  }
   }







  //  *********************************************************************
  //  *******************************Recherche Tempurature*******************
  //  ***********************************************************************



   if(isset($_POST['idser'])){
     $dated = $_POST['date1'];
     $dateF = $_POST['date2'];
    //  Date de debit rechrche
     $date=".$dated.";
     $sec = strtotime($date);
     $newdate1 = date ("Y-m-d H:i", $sec);  
     $newdate1 = $newdate1 . ":00"; 

    //  Date de fin de rechreche
    $date1=".$dateF.";
    $sec1 = strtotime($date1);
    $newdate2 = date ("Y-m-d H:i", $sec1);  
    $newdate2 = $newdate2 . ":00"; 
    //  $date = DateTime::createFromFormat('Y-M-j H:i', '2021-09-15 16:30');
    //  $datet = DateTime.ParseExact();
    $stmt = $conn->prepare ("SELECT * FROM iot_project WHERE created_at > '$newdate1' AND  created_at < '$newdate2' ");
    $stmt -> execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if( $stmt->rowCount() >0){
      echo'<div class="container-table100" style="
  MARGIN-LEFT: 61PX;
">
        
      <div class="wrap-table100">
     
      <div class="table100 ver1 m-b-110">
      <div class="table100-head">
        
      <table>
      <thead>
      
    <tr class="row100 head">
      <th class="cell100 column2">ID</th>
      <th class="cell100 column3">Tempurature</th>
      <th class="cell100 column4">Humidité</th>
      <th class="cell100 column5">Time</th>
      </tr>
      </thead>
      </table>
      </div>
      <div class="table100-body js-pscroll">
      <table>
       
      <tbody>';
        foreach($result as $res){
  
  
      echo ' 
  <tr class="row100 body">
  <td class="cell100 column2">'.$res["id"].'</td>
  <td class="cell100 column3">'.$res["temperature"].'</td>
  <td class="cell100 column4">'.$res["humidity"].'</td>
  <td class="cell100 column5">'.$res["created_at"].'</td>
  </tr>
  ' ;

  
  }
  echo '</tbody> 
    
  </table>
  </div>
  </div>

  </div>
  </div>';
    }else{
      echo"<h1>Not Found </h1> ".$newdate1."date 2 :".$stmt->rowCount();
    }
  
   }
















   //  *********************************************************************
  //  *******************************Recherche Courant *******************
  //  ***********************************************************************

  if(isset($_POST['idserc'])){
    $dated = $_POST['date1'];
    $dateF = $_POST['date2'];
   //  Date de debit rechrche
    $date=".$dated.";
    $sec = strtotime($date);
    $newdate1 = date ("Y-m-d H:i", $sec);  
    $newdate1 = $newdate1 . ":00"; 

   //  Date de fin de rechreche
   $date1=".$dateF.";
   $sec1 = strtotime($date1);
   $newdate2 = date ("Y-m-d H:i", $sec1);  
   $newdate2 = $newdate2 . ":00"; 
   //  $date = DateTime::createFromFormat('Y-M-j H:i', '2021-09-15 16:30');
   //  $datet = DateTime.ParseExact();
   $stmt = $conn->prepare ("SELECT * FROM iot_project WHERE created_at > '$newdate1' AND  created_at < '$newdate2' ");
   $stmt -> execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   if( $stmt->rowCount() >0){
     echo'<div class="container-table100" style="
 MARGIN-LEFT: 61PX;
">
       
     <div class="wrap-table100">
    
     <div class="table100 ver1 m-b-110">
     <div class="table100-head">
       
     <table>
     <thead>
     
   <tr class="row100 head">
     <th class="cell100 column2">ID</th>
     <th class="cell100 column3">Courant</th>
     <th class="cell100 column4">Tension</th>
     <th class="cell100 column4">Puissance</th>
     <th class="cell100 column5">Time</th>
     </tr>
     </thead>
     </table>
     </div>
     <div class="table100-body js-pscroll">
     <table>
      
     <tbody>';
       foreach($result as $res){
 
     echo ' 
 <tr class="row100 body">
 <td class="cell100 column2">'.$res["id"].'</td>
 <td class="cell100 column3">'.$res["courant"].'</td>
 <td class="cell100 column4">'.$res["tension"].'</td>
 <td class="cell100 column4">'.$res["puissance"].'</td>
 <td class="cell100 column5">'.$res["created_at"].'</td>
 </tr>
 ' ;

 
 }
 echo '</tbody> 
   
 </table>
 </div>
 </div>

 </div>
 </div>';
   }else{
     echo"<h1>Not Found </h1> ".$newdate1."date 2 :".$stmt->rowCount();
   }
 
  }










     //  *********************************************************************
  //  *******************************Recherche Eclirage **********************
  //  ************************************************************************

  if(isset($_POST['idserEcl'])){
    $dated = $_POST['date1'];
    $dateF = $_POST['date2'];
   //  Date de debit rechrche
    $date=".$dated.";
    $sec = strtotime($date);
    $newdate1 = date ("Y-m-d H:i", $sec);  
    $newdate1 = $newdate1 . ":00"; 

   //  Date de fin de rechreche
   $date1=".$dateF.";
   $sec1 = strtotime($date1);
   $newdate2 = date ("Y-m-d H:i", $sec1);  
   $newdate2 = $newdate2 . ":00"; 
   //  $date = DateTime::createFromFormat('Y-M-j H:i', '2021-09-15 16:30');
   //  $datet = DateTime.ParseExact();
   $stmt = $conn->prepare ("SELECT * FROM iot_project WHERE created_at > '$newdate1' AND  created_at < '$newdate2' ");
   $stmt -> execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   if( $stmt->rowCount() >0){
     echo'<div class="container-table100" style="
 MARGIN-LEFT: 61PX;
">
       
     <div class="wrap-table100">
    
     <div class="table100 ver1 m-b-110">
     <div class="table100-head">
       
     <table>
     <thead>
     
   <tr class="row100 head">
     <th class="cell100 column2">ID</th>
     <th class="cell100 column3">luminosité</th>
     <th class="cell100 column5">Time</th>
     </tr>
     </thead>
     </table>
     </div>
     <div class="table100-body js-pscroll">
     <table>
      
     <tbody>';
       foreach($result as $res){
 
     echo ' 
 <tr class="row100 body">
 <td class="cell100 column2">'.$res["id"].'</td>
 <td class="cell100 column3">'.$res["sensorValue"].'</td>
 <td class="cell100 column4">'.$res["humidity"].'</td>
 <td class="cell100 column5">'.$res["created_at"].'</td>
 </tr>
 ' ;
 }
 echo '</tbody> 
   
 </table>
 </div>
 </div>

 </div>
 </div>';
   }else{
     echo"<h1>Not Found </h1> ".$newdate1."date 2 :".$stmt->rowCount();
   }
 
  }
			?>
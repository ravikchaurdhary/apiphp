<?php

//creating response array
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    //getting values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

 //   $password=md5($passwords);
  

    
    //including the db operation file
    require_once '../includes/DbOperation.php';

    $db = new DbOperation();

    //inserting values 
    if($db->createTeam($first_name,$last_name,$email,$password,$gender,$id)){

        echo "name ".$id;
        $response['error']=false;
        // $response['id']=$id;
        $response['message']='Team added successfully';
        //$response['data']=$id;
    }else{

        $response['error']=true;
        $response['message']='Could not add team';
    }


}
else{
    $response['error']=true;
    $response['message']='not authorise';
}
echo json_encode($response);
?>
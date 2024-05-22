<?php  

require_once("../config/configer.php");

if(isset($_REQUEST['submit']))
{
   $fastName=$_REQUEST['fname'];
   $Student_ID=$_REQUEST['Student_ID'];
   $email=$_REQUEST['email'];
   $password=$_REQUEST['password'];
   $number=$_REQUEST['number'];
   
   $query="SELECT id FROM `student_login_info` WHERE  `email`='$email' AND `password`='$password' AND `number`='$number'";
    $data_adan=mysqli_fetch_assoc(mysqli_query($connect,$query));
    if($data_adan)
    {
        header('Location: ../Sing-up.php?havedata=true');
        
    }else
    {
        $insert_data="INSERT INTO `student_login_info`(`firstName`, `Student_ID`, `email`, `password`, `number`)
        VALUES ('$fastName','$Student_ID','$email','$password','$number')";
       $data= mysqli_query($connect,$insert_data);
       if($data)
       {
        header('Location:../home.php?success');
       }else
       {
        header('Location: ../Sing-up.php?retryeEroor=true');
       }
        
    }
    

   
   
}


?>

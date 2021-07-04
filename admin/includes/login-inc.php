<?php

include "db.php";
session_start();
ob_start();

//to login the user
  if(isset($_POST['id']) && isset($_POST['password'] )){
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $id = strtoupper($id);
      $password = mysqli_real_escape_string($conn,$_POST['password']);

      if(empty($id) || empty($password)){
        echo "<script>
         $('#error-box').css('display', 'block');
          $('#error-box').text('All fields are required!!!');</script>";
        exit();
      }else{
        $query = "SELECT * FROM login WHERE mail = '$id' and password = '$password'  LIMIT 1";
        $result =  mysqli_query($conn, $query);
        if(!$result){
          echo "<script>
          $('#error-box').css('display', 'block');
           $('#error-box').text('Connetion error !!!');</script>";
         exit();
        }else{
          if(!mysqli_num_rows($result)>0){
             echo "<script>
                $('#error-box').css('display', 'block');
                $('#error-box').text('Invalid ID or Password !!');</script>";
             exit();
          }else{
             $_SESSION['mail'] = $id;
              echo "<script type='text/javascript'>window.location.href = 'upload.php';</script>";
              exit();
          }
        }
      }
  }

//to logout the user
  if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
      echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
  }

#to get faculty name with class and subject
if(isset($_POST['subject'])){
  $subject = $_POST['subject'];
//  echo $subject;
  if(!empty($subject)){
      $query = "SELECT * FROM subject_topics WHERE subject='$subject' ";
      $result =mysqli_query($conn,$query);
      if(!$result){
        echo "<option value=''>Unknown error</option>";
        exit();
      }else{
          if(mysqli_num_rows($result)>0){
              
            while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['topic']."'>".$row['topic']."</option>";}
            exit();
          }
          else{
            echo "<option value=''>No data available</option>";
            exit();
          }
      }
  }

}



if(isset($_POST['submit-form'])){
    
    if(!empty($_POST['question']) && !empty($_POST['option1']) && !empty($_POST['option2']) && !empty($_POST['option3']) && !empty($_POST['option3']) && !empty($_POST['Answer']) && !empty($_POST['explanation']) && !empty($_POST['branch']) && !empty($_POST['topic-ma']) && !empty($_POST['subject-ma']) && !empty($_POST['difficulty'])){
    
    
    $mail=$_SESSION['mail'];
    $j="Select * from login where mail='$mail' LIMIT 1";
    $e=mysqli_query($conn,$j);
    $r=mysqli_fetch_assoc($e);
    $name=$r['name'];
    $facid=$r['id'];
    
    $question=$_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $answer=$_POST['Answer'];
    $explanation=$_POST['explanation'];
    $video=$_POST['video'];
    $difficulty=$_POST['difficulty'];
    $branch=$_POST['branch'];
    $subject=$_POST['subject-ma'];
    $topic=$_POST['topic-ma'];
    
        
    $q="Insert into questions values('$question','$option1','$option2','$option3','$option4','$answer','$explanation','$video','$subject','$topic','$difficulty')";
    $j=mysqli_query($conn,$q);
//    echo $q;
        if($j){
    echo "<script>alert('submitted');</script>";}
        else{
            echo "<script>alert('Check your details once again')</script>";        
        }
        
    }
    
    else{
    echo "<script>alert('Please fill all the details')</script>";
}
    
}


if(isset($_POST['submit-t']) && !empty($_POST['subject-t']) && !empty($_POST['topic-t'])){
    
    $sub=$_POST['subject-t'];
    $topic=$_POST['topic-t'];
    $q="INSERT into subject_topics values('$sub','$topic')";
    $j=mysqli_query($conn,$q);
    if($j){
        echo "<script>alert('Added Successfully')</script>";}
    else{
        echo "<script>alert('Check once again')</script>";
    }
    
}


?>

<?php
include "includes/login-inc.php";
if(!isset($_SESSION['mail']) || empty($_SESSION['mail'])){
 echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
}
include "includes/db.php";

include "header.php";
?>

<?php 
      $id = $_SESSION['mail'];
      $query = "SELECT * FROM login where mail= '$id' LIMIT 1";
      $result = mysqli_query($conn,$query);
      if(!$result){
        echo mysqli_error($conn);
      }else{
          $row = mysqli_fetch_assoc($result);
          $depart = $row['department'];
          $name = $row['name'];
          $facid=$row['id'];
          $mail=$row['mail'];
      }
  ?>

<br>
<div class="main">
    <h2 class="heading-primary text-center mb-3">Hello &nbsp;<i><?php echo strtoupper($name).","?></i></h2>
   <br>
    <!--      <h2 class="heading-primary text-center mb-4">Complete the Faculty Survey</h2>-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box">
        <p for="" class="bg-primary p-3 rounded text-white" style="font-size:1.5rem;">Faculty ID : <?= strtoupper($facid); ?></p>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box">
        <p for="" class="bg-primary p-3 rounded text-white " style="font-size:1.5rem;">Department : <?= strtoupper($depart); ?></p>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box mr-5 ">
        <a href="upload.php"><input type="submit" name="view-details" class="bg-success text-white" value='Form'/></a>
    </div>

    <div class="element-box ml-5">
        <div class="logout-box">
            <button id="logout" class="bg-danger ">LOGOUT</button>
        </div>
    </div>
    <br><br>
<!--
     
    <br>
-->
    <!-- error display box -->
    <div class="alert alert-danger text-center" id="survey-error-box" role="alert"></div>
    <!-- survey form box -->
    
    <h2 class="heading-primary text-center mb-4">Add Subject & Topics : </h2>
    <br>
    <form method="post" action="upload1.php" >
    <div style="margin-left:12rem;">
        <h3>Subject</h3><br>
        <input type="text" name="subject-t">
    </div><br>
    <div style="margin-left:12rem;">
        <h3>Topic</h3><br>
        <input type="text" name="topic-t">
    </div><br>
    
     <div style="margin-left:12rem">
        <input type="submit" name="submit-t" class="bg-success text-white" />
    </div>
    </form>
    <br><br>


</div>
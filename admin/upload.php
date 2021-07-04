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
      }
     
  ?>
<br>
<div class="main">
    <h2 class="heading-primary text-center">Hello &nbsp;<i><?php echo strtoupper($name).","?></i></h2><br>
    <!--      <h2 class="heading-primary text-center mb-4">Complete the Faculty Survey</h2>-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box">
        <p for="" class="bg-primary p-3 rounded text-white" style="font-size:1.5rem;">Faculty ID : <?= strtoupper($facid); ?></p>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box">
        <p for="" class="bg-primary p-3 rounded text-white" style="font-size:1.5rem;">Department : <?= strtoupper($depart); ?></p>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="element-box mr-5 ml-5">
        <a href="upload1.php"><input type="submit" name="view-details" class="bg-success text-white" value='Submissions' /></a>
    </div>

    <div class="element-box ml-5">
        <div class="logout-box">
            <button id="logout" class="bg-danger ">LOGOUT</button>
        </div>
    </div>
    <!-- error display box -->
    <div class="alert alert-danger text-center" id="survey-error-box" role="alert"></div>
    <!-- survey form box -->
    <form action="upload.php" method="POST">

        <div id="container survey_form" style="width:75%; margin-left:14rem; margin-top:2rem;">
            <h2 class="heading-primary text-center mb-4">Uploading Questions : </h2>
            <div>

            </div>

            <div>
                <h3>Question :</h3><br>
                <textarea name="question"></textarea>
                <br>
            </div><br>
            <div>
                <h3>Options : (Ex : A:temperature )</h3><br>
                <h5>Option1</h5>
                <input type="text" name="option1" class="mb-4" />
                <h5>Option2</h5>
                <input type="text" name="option2" class="mb-4" />
                <h5>Option3</h5>
                <input type="text" name="option3" class="mb-4" />
                <h5>Option4</h5>
                <input type="text" name="option4" />
            </div><br>
            <div>
                <h3>Answer :</h3><br>
                <input type="text" name="Answer" />
                <br>
            </div><br>
            <div>
                <h3>Explanation :</h3><br>
                <textarea name="explanation"></textarea>
                <br>
            </div><br>
            <div>
                <h3>Video Lecture : (Ex : NA if not available)</h3><br>
                <input type="text" name="video" />
                <br>
            </div><br>

            <!--            <select ></select>-->


            <!--
            <div>
                <h3>Department :</h3><br>
                <div class="radio">
                    <input type="radio" name="optradio" value="Maths"><label style="font-size: 14px;">Maths</label>
                </div>
                <div class="radio">
                    <input type="radio" name="optradio" value="Physics"><label style="font-size: 14px;">Physics</label>
                </div>
                <div class="radio">
                    <input type="radio" name="optradio" value="chemistry"><label style="font-size: 14px;">Chemistry</label>
                </div>

            </div><br>
-->
            <div>
                <h3>Branch :</h3><br>
                <!--                <select class="form-select" aria-label="Default select example" id="secondmenu" name="branch"></select>-->
                <input type="text" name="branch" />
            </div><br>
            <div>
                <h3>Subject :</h3><br>
                <select class="form-select" aria-label="Default select example" id="subject" name="subject-ma">
                    <option>Select subject</option>
                    <?php 
                        $q="SELECT distinct(subject) from subject_topics";
                        $j=mysqli_query($conn,$q);
                        if(mysqli_num_rows($j)>0){
                            while($r=mysqli_fetch_assoc($j)){
                                $subje=$r['subject'];
                                echo "<option value='$subje'>$subje</option>";
                            }
                        }
                    ?>
                </select>
                <!--                <input type="text" name="subject"/>-->
            </div><br>
            <div>
                <h3>Topic :</h3><br>
                <select class="form-select" aria-label="Default select example" id="topic" name="topic-ma">
                    <option>Select Topic</option>
                </select>
                <!--                <input type="text" name="subject"/>-->
            </div><br>
            <div>
                <h3>Difficulty Level :</h3><br>
                <select class="form-select" aria-label="Default select example" id="secondmenu" name="difficulty">
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div><br><br>

            <div>

                <input type="submit" name="submit-form" class="bg-success text-white" />

            </div>
            <br><br><br>

        </div>

    </form>


</div>

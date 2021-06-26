<?php include('includes/header.php'); ?>
<?php include('includes/db_connect.php'); ?>
<div style="text-align:center;">
    <h3>Subjects</h3>
</div>
<br>
<div class="container text-center">
    <br>
    <?php
        $q="SELECT distinct(subject) from subject_topics";
        $e=mysqli_query($db,$q);
        if(mysqli_num_rows($e)>0){
            while($r=mysqli_fetch_assoc($e)){
                $s=$r['subject'];
        $j="Select topic from subject_topics where subject='$s'";
        $a=mysqli_query($db,$j);
        if(mysqli_num_rows($a)>0){
            $out="<div class='row shom'>
        <div class='col-6'>
            <i class='fa fa-long-arrow-right d-block p-2 rounded'  style='font-size:20px; text-align:start; background-color:#B0C4DE;'>$s<br>
            </i>
        </div>
        <div class='col-6 mad1 rounded p-3' style='font-size:18px; text-align:start; background-color:#B0C4DE;'> ";
            while($row=mysqli_fetch_assoc($a)){
                $top=$row['topic'];
                $out.="
                <i class='fa fa-angle-right ml-5'></i><a href='practice.php?data=$top' class='ml-1 text-dark' style='font-weight:500;'>$top</a><br>";
                
            }
            
        }
                $out.="</div></div><br>";
                echo $out;
                
            }
        }
        
    ?>
    <!--
    <div class="row showm">
        <div class="col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded " style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
            </i>
        </div>
        <div class="col-6 mad stretch_topics rounded p-3" style="font-size:18px; text-align:start; background-color:#B0C4DE;">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'></i><a href='practice.php?data=$top' class='ml-1 text-dark' style='font-weight:500;'>$top</a><br>";
                        }
                    }
                ?>
        </div>
    </div>
    <br>
    <div class="row showm">
        <div class="col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded " style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
            </i>
        </div>
        <div class="col-6 mad stretch_topics rounded p-3" style="font-size:18px; text-align:start; background-color:#B0C4DE;">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'></i><a href='practice.php?data=$top' class='ml-1 text-dark' style='font-weight:500;'>$top</a><br>";
                        }
                    }
                ?>
        </div>
    </div>
    <br>
    <div class="row showm">
        <div class="col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded " style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
            </i>
        </div>
        <div class="col-6 mad stretch_topics rounded p-3" style="font-size:18px; text-align:start; background-color:#B0C4DE;">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'></i><a href='practice.php?data=$top' class='ml-1 text-dark' style='font-weight:500;'>$top</a><br>";
                        }
                    }
                ?>
        </div>
    </div>
    <br>
    <div class="row showm">
        <div class="col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded " style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
            </i>
        </div>
        <div class="col-6 mad stretch_topics rounded p-3" style="font-size:18px; text-align:start; background-color:#B0C4DE;">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'></i><a href='practice.php?data=$top' class='ml-1 text-dark' style='font-weight:500;'>$top</a><br>";
                        }
                    }
                ?>
        </div>
    </div>
    <br>
-->
    <!--
    <div class="row">
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#B0C4DE;">Theory of Computation<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='TOC'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='practice.php?data=$top' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#ADD8E6;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='practice.php?data=$top' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>


    </div>
    <br>

    <div class="row">
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='practice.php?data=$top' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#ADD8E6;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='practice.php?data=$top' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>


    </div>
    <br>
    <div class="row">
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='practice.php?data=$top' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#B0C4DE;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="showm col-6">
            <i class="fa fa-long-arrow-right d-block p-2 rounded stretch_topics" style="font-size:20px; text-align:start; background-color:#4682B4;">Aptitude<br>
                <div class="mad mt-3">
                    <?php 
                    $j="Select topic from subject_topics where subject='Aptitude'";
                    $a=mysqli_query($db,$j);
                    if(mysqli_num_rows($a)>0){
                        while($row=mysqli_fetch_assoc($a)){
                            $top=$row['topic'];
                            echo "<i class='fa fa-angle-right ml-5'><a href='' class='ml-1'>$top</a></i><br>";
                        }
                    }
                ?>
                </div>
            </i>
        </div>

    </div>
-->
</div>

<script>
    $('.showm').click(function() {
        $('.mad1').addClass('mad2');
    });
</script>
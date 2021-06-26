<?php include('includes/header.php'); ?>
<?php include('includes/db_connect.php'); ?>
<?php
$query = "SELECT * FROM questions order by rand() limit 3";
$result = mysqli_query($db, $query);
?>

<?php

if (isset($_POST['submit_exam'])) {
    echo "Exam Submitted successfully";
}

?>


<main>
    <!-- <form method="post" action="exam.php"> -->
    <div id="timer"><?php require_once('includes/side_nav.php'); ?></div>

    <div class="container mt-5">

        <br>

        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $q_no = $row['q_no'];
            $correct_ans = $row['answer'];
        ?>
            <br>
            <span>Question: <?php echo $i; ?></span>
            <span id="<?php echo $i; ?>_status"></span>
            <hr style="border-bottom: .1em solid #06F !important; padding:0px 40px;">

            <div class="container" id="<?php echo $i; ?>">
                <h5><?php echo $row['question']; ?></h5>

                <div class="container"><br>
                    <table class="table table-hover">
                        <thead>
                            <p>options</p>
                        </thead>
                        <tbody>

                            <?php
                            $val = array(0, 0, 0, 0);
                            $random = rand(0, 3);
                            $j = 0;
                            while ($val[0] == 0 or $val[1] == 0 or $val[2] == 0 or $val[3] == 0) {
                                $j++;
                                if ($val[$random] == 0) {
                                    switch ($random) {
                                        case 0:
                            ?>
                                            <tr onclick="check_rad('<?php echo $correct_ans; ?>','<?php echo $q_no; ?>-1','<?php echo $i; ?>-<?php echo $j; ?>' )">
                                                <td><input type="radio" id="<?php echo $q_no; ?>-1" name="<?php echo $q_no; ?>">&nbsp;&nbsp;<?= $j ?>
                                                    <label for="<?php echo $q_no; ?>-1"><?php echo $row['option1']; ?></label>
                                                </td>
                                            </tr>

                                        <?php
                                            $val[0] = 1;
                                            break;
                                        case 1:
                                        ?>
                                            <tr onclick="check_rad('<?php echo $correct_ans; ?>','<?php echo $q_no; ?>-2','<?php echo $i; ?>-<?php echo $j; ?>')">
                                                <td><input type="radio" id="<?php echo $q_no; ?>-2" for="<?php echo $q_no; ?>-2" name="<?php echo $q_no; ?>">&nbsp;&nbsp;<?= $j ?>
                                                    <label for="<?php echo $q_no; ?>-2"><?php echo $row['option2']; ?></label>
                                                </td>

                                            </tr>
                                        <?php
                                            $val[1] = 1;
                                            break;
                                        case 2:
                                        ?>

                                            <tr onclick="check_rad('<?php echo $correct_ans; ?>','<?php echo $q_no; ?>-3','<?php echo $i; ?>-<?php echo $j; ?>')">
                                                <td><input type="radio" id="<?php echo $q_no; ?>-3" for="<?php echo $q_no; ?>-3" name="<?php echo $q_no; ?>">&nbsp;&nbsp;<?= $j ?>
                                                    <label for="<?php echo $q_no; ?>-3"><?php echo $row['option3']; ?></label>
                                                </td>
                                            </tr>
                                        <?php
                                            $val[2] = 1;
                                            break;
                                        case 3:
                                        ?>
                                            <tr onclick="check_rad('<?php echo $correct_ans; ?>','<?php echo $q_no; ?>-4','<?php echo $i; ?>-<?php echo $j; ?>')">
                                                <td><input type="radio" id="<?php echo $q_no; ?>-4" for="<?php echo $q_no; ?>-4" name="<?php echo $q_no; ?>">&nbsp;&nbsp;<?= $j ?>
                                                    <label for="<?php echo $q_no; ?>-4"><?php echo $row['option4']; ?></label>
                                                </td>
                                            </tr>
                            <?php
                                            $val[3] = 1;
                                            break;
                                    }
                                } else {
                                    $j--;
                                }
                                $random = rand(0, 3);
                            }
                            ?>




                        </tbody>
                    </table>

                </div>
            </div>



            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><?php echo $row['subject']; ?></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><?php echo $row['topic']; ?></a>
            <br>
            <br>


            <div id="<?php echo $i; ?>_ans" class="container explanation d-none">
                <div>
                    <h5 id="<?php echo $i; ?>_option">Correct Ans: <?php echo $correct_ans ?></h5>
                </div>
                <hr>
                <h6>Question Explanation: </h6>
                <pre class="explanation-text">
                <?php echo $row['explanation']; ?>
            </pre>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Video Explanation</a>
            </div>


        <?php
            $i++;
        }
        ?>

        <div class="container text-center">
            <hr>
            <button id="sub_exam" onclick="show_marks()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Submit Exam
            </button>

            <button id="keyPressBtn" class="d-none" type="button" data-toggle="modal" data-target="#exampleModalCenter">
            </button>

            <a href="subjects.php">
                <button type="button"  id="gotonextBtn" class="btn btn-primary d-none">Go to Next Topics</button>
            </a>
            <button type="button" onClick="window.location.reload();" id="rewrite1" class="btn btn-secondary d-none">Rewrite Exam</button>
            <br>
            <br>
        </div>

    </div>
    </form>


</main>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelTitle">Exam Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="marks"></p>
                <p id="correct"></p>
                <p id="wrong"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="modelDismiss" class="btn btn-success" data-dismiss="modal">Check answers</button>
                <button type="button" id="forModelClear" class="btn btn-success d-none" ></button>
                <a href="subjects.php">
                    <button type="button" id="nextBtn" class="btn btn-primary">Go to Next Topics</button>
                </a>
                <button type="button" id="rewrite" onClick="window.location.reload();" class="btn btn-secondary">Rewrite Exam</button>
            </div>
        </div>
    </div>
</div>









<script>
    let checked_options = {}
    let correct_answers = {}
    // let submitted=false;


    function check_rad(correct_ans, op_id, qid_op) {

        console.log(op_id, qid_op)

        let q = qid_op.split("-")
        console.log(q[0])

        let checked = document.getElementById(op_id).checked = true;
        if (document.getElementById(op_id).checked) {
            let selected_option = document.getElementById(op_id).nextElementSibling.innerText

            correct_answers[q[0]] = correct_ans

            checked_options[q[0]] = selected_option
            console.log(checked_options)
            console.log(correct_answers)

        }
    }

    timeup = false

    function show_marks(correct_ans) {
        let total_marks = 3
        let size = Object.keys(checked_options).length
        console.log(timeup)
        console.log(size)
        if (size < 3 & timeup == false) {
            document.getElementById('modelTitle').textContent = "Message";
            document.getElementById('marks').textContent = "Please answer all questions before submitting";
            document.getElementById('modelDismiss').textContent = "OK";
            document.getElementById('nextBtn').remove();
            document.getElementById('rewrite').remove();

        } else {
            marks = 0
            wrong = 0

            if (size != 0) {
                for (i = 1; i <= total_marks; i++) {
                    let option_status = i + "_status";
                    let op_status = document.getElementById(option_status);
                    op_status.classList.add("option_styles")
                    if (checked_options[i] == null) {
                        checked_options[i] = 400000000
                    }

                    if (checked_options[i] == correct_answers[i]) {
                        document.getElementById(i).style.backgroundColor = "#ADE0C1";

                        op_status.textContent = "Correct"
                        op_status.style.backgroundColor = "#063"

                        marks++
                    } else {
                        document.getElementById(i).style.backgroundColor = "#ff8080";

                        op_status.textContent = "wrong"
                        op_status.style.backgroundColor = "#B5281E"

                        wrong++
                    }
                    document.getElementById(i + '_ans').classList.remove("d-none")

                }
            } else {
                for (i = 1; i <= total_marks; i++) {

                    let option_status = i + "_status";
                    let op_status = document.getElementById(option_status);
                    op_status.classList.add("option_styles")

                    document.getElementById(i).style.backgroundColor = "#ff8080";
                    document.getElementById(i + '_ans').classList.remove("d-none")

                    op_status.textContent = "wrong"
                    op_status.style.backgroundColor = "#B5281E"

                }

            }
            document.getElementById('modelTitle').textContent = "Exam Report";
            document.getElementById('marks').textContent = "Your Marks: " + marks;
            document.getElementById('correct').textContent = "Correct Questions: " + marks;
            document.getElementById('wrong').textContent = "Wrong Questions: " + wrong;

            document.getElementById('sub_exam').remove();
            document.getElementById('timer').remove();
            // document.getElementById('rewrite1').classList.remove("d-none")
            // document.getElementById('gotonextBtn').classList.remove("d-none")

        }

    //     submitted=true;
    //     if(submitted==true){
    //     console.log("Submitted");
    //     // document.getElementById('exampleModalCenter').remove();
    // }

    }

    


    // document.addEventListener('contextmenu', event => event.preventDefault());

    // document.addEventListener("keydown", function(e) {
    //     e = e || window.event;

    //     // use e.keyCode
    //     let nxt=document.getElementById('nextBtn');
    //     let rew=document.getElementById('rewrite');
    //     if(nxt!=null){
    //         nxt.remove();
    //     }
    //     if(rew!=null){
    //         rew.remove();
    //     }

    //     if(submitted!=true){
    //         document.getElementById('modelTitle').textContent = "Warning";
    //         document.getElementById('modelDismiss').classList.add("btn-danger");
    //         document.getElementById('modelDismiss').textContent = "OK";
    //         document.getElementById("marks").textContent = "Please Dont press any keys during exam";
    //         document.getElementById("keyPressBtn").click();
    //     }

        
        

    // });

</script>


<?php include('includes/footer.php'); ?>
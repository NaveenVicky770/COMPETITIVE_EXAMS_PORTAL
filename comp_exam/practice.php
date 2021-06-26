<?php include('includes/db_connect.php'); ?>
<?php

if(isset($_GET['data'])){
    $topic=$_GET['data'];
    echo "<script>alert($topic)</script>";
    $query = "SELECT * FROM questions where topic='$topic' order by rand()";
    $result = mysqli_query($db, $query);
}
else{
    $query = "SELECT * FROM questions order by rand() limit 2";
    $result = mysqli_query($db, $query);
}
?>  
<?php include('includes/header.php'); ?>
<main>
        <div class="element-box" style="margin-left:65rem;">
        <a href="exam.php"><button class="bg-success text-white p-1"><i class="fas fa-long-arrow-alt-right"></i> Test Yourself </button></a>
    </div>
    <div class="container">
        

        <br>

        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $q_no = $row['q_no'];
            $correct_ans = $row['answer'];
        ?>
            <br>
            <span>Question: <?php echo $i; ?></span>
            <span id="<?php echo $q_no; ?>_status"></span>
            <hr>

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
                                        <tr id="<?php echo $q_no; ?>-op1" onclick="check('<?php echo $q_no ?>-op1','<?php echo $correct_ans ?>')">
                                            <td style="width: 30px;"><?= $j ?></td>
                                            <td><?php echo $row['option1']; ?></td>
                                        </tr>
                                    <?php
                                        $val[0] = 1;
                                        break;
                                    case 1:
                                    ?>
                                        <tr id="<?php echo $q_no; ?>-op2" onclick="check('<?php echo $q_no ?>-op2','<?php echo $correct_ans ?>')">
                                            <td><?= $j ?></td>
                                            <td><?php echo $row['option2']; ?></td>
                                        </tr>
                                    <?php
                                        $val[1] = 1;
                                        break;
                                    case 2:
                                    ?>

                                        <tr id="<?php echo $q_no; ?>-op3" onclick="check('<?php echo $q_no ?>-op3','<?php echo $correct_ans ?>')">
                                            <td><?= $j ?></td>
                                            <td><?php echo $row['option3']; ?></td>
                                        </tr>
                                    <?php
                                        $val[2] = 1;
                                        break;
                                    case 3:
                                    ?>
                                        <tr id="<?php echo $q_no; ?>-op4" onclick="check('<?php echo $q_no ?>-op4','<?php echo $correct_ans ?>')">
                                            <td><?= $j ?></td>
                                            <td><?php echo $row['option4']; ?></td>
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

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><?php echo $row['subject']; ?></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><?php echo $row['topic']; ?></a>
            <br>
            <br>
            <div id="<?php echo $q_no; ?>" class="container explanation d-none">

                <div>
                    <h5 id="<?php echo $q_no; ?>_option"></h5>
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

        
    </div>
</main>

<script>
    function check(qid_op, correct_ans) {
        let option_row = document.getElementById(qid_op).childNodes[3].innerText;
        console.log(option_row)
        console.log(correct_ans)

        var res = qid_op.split("_")
        var qid = res[0].split("-")
        console.log(qid[0])
        var ele = document.getElementById(qid[0])
        ele.classList.remove("d-none");

        let option_status = qid[0] + "_status";
        let op_status = document.getElementById(option_status);

        if (option_row == correct_ans) {
            document.getElementById(qid_op).style.backgroundColor = "#ADE0C1"

            op_status.textContent = "Correct"
            op_status.style.backgroundColor = "#063"
            op_status.classList.add("option_styles")

        } else {
            document.getElementById(qid_op).style.backgroundColor = "#ff8080"

            let option_text = qid[0] + "_option"
            var answerElement = document.getElementById(option_text);
            answerElement.textContent = "Correct Answer: " + correct_ans;
            answerElement.style.fontStyle = "bold";

            op_status.textContent = "wrong"
            op_status.style.backgroundColor = "#B5281E"
            op_status.classList.add("option_styles")


        }



    }
</script>


<?php include('includes/footer.php'); ?>
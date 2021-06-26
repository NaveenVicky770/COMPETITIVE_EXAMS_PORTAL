<?php
session_start();
if(isset($_SESSION['clg_id'])){
    header("Location: upload.php");
}

include "header.php";
?>

        <div>
            <h3 class="sub-heading text-center">Online Assessments</h3>
        </div>

        <!-- form -->
        <div class="form-login">
            <div class="alert alert-danger text-center" id="error-box" role="alert"></div>
            <div class="form-group form-element">
                <label for="id">Email :</label>
                <input type="text" id="id" name="id" placeholder="Enter Your Mail" />
            </div>
            <div class="form-group form-element">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" />
            </div>
            <div class="form-group form-element">
                <button id="login" class="form-control bg-primary button-login">Login</button>
            </div>
        </div>
  
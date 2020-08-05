<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
?>
<?php 
    include './Lab4Common/Header.php';
    include './Lab4Common/function.php';
?>
<?php
//        // put your code here       
        
        extract($_POST);
		$agreeErr="";
        $self = htmlentities($_SERVER['PHP_SELF']);
        // $agree = $_POST['agree'];
        if(isset($_POST['start'])){
            $Error = TRUE;
        $agreeErr = ValidateAgree($agree);
        if(empty($agreeErr)){
            $_SESSION["agree"] = "agree";
            header("Location: CustomerInfo.php");
            exit( );

        }
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
            <h1>Terms and Conditions</h1>
        <p>I agree to abide by the Bank's Terms and Conditions and rules in force and the changes thereto in Terms and Conditions from time to 
                time relating to my account as communicated and made available on the Bank's website.</p>
        <p>I agree that the bank before opening any deposit account, will carry out a due diligence as required under Know Your Customer guidelines of the bank. 
            I would be required to submit necessary documents or proofs, such as identity, address, photograph and any such information, 
            I agree to submit above documents again at periodic intervals, as may be required by the Bank.</p>
        <p>I agree that the Bank can at its sole discretion, amend any of the services/facilities given in my account either wholly or partially at any time by 
            giving me at least 30 days notice and/or provide an option to me to switch to other services/facilities.</p>

        <span class="error"><?php print "$agreeErr"; ?></span>
        <br>
        <input type="checkbox" id="agree" name='agree'> I have read and agree the Terms and Conditions.
        <br>
        <input type="submit" id='start' name="start" value="Start"> 
      
        
        </form>
    </body>
</html>
<?php 
    include './Lab4Common/footer.php';
   
?>

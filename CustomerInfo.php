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
// put your code here

 
if (empty($_SESSION["agree"])) {
    header("Location:Disclaimer.php ");
} else {

    $self = htmlentities($_SERVER['PHP_SELF']);
	 extract($_POST);
	if(isset ($_POST['pc'])){
     $postalcode = $_POST["pc"];
	}
	 if(isset ($_POST['phone'])){
     $phone = $_POST["phone"];
	 }
	 if(isset ($_POST['email'])){
     $email = $_POST["email"];
	 }
	 if(isset ($_POST['name'])){
     $name = $_POST["name"];
	 }
	if (empty($_SESSION["agree"])) {
    header("Location:Disclaimer.php ");
} else {

    $self = htmlentities($_SERVER['PHP_SELF']);
	 //extract($_POST);
		if(isset($_POST['time'])){
		$time = $_POST["time"];
		}
   
    $i ="";
	if(isset($_POST['radio'])){
    $contactType = $_POST["radio"];
    if ($contactType == "phone") {
        $i = 1;
    } 
    if($contactType == "email"){
        $i = 2;
    }
	}
 
	$nameError = 
        $postalcodeError = 
        $emailError =
        $contactTypeError = 
		$phoneError=
        $timeError = "";
		
    if (isset($_POST['calculate'])) {
        $Error = TRUE;
		
        $nameError = ValidateName($name);
        $postalcodeError = ValidatePostalCode($postalcode);
        $phoneError = ValidatePhone($phone);
        $emailError = ValidateEmail($email);
        $contactTypeError = ValidateContactType($contactType);
        $timeError = ValidateTime($contactType, $time);

        if (empty($nameError) && empty($postalcodeError) && empty($postalcodeError) && empty($phoneError) && empty($emailError) && empty($contactTypeError) && empty($timeError) && $Error) {
            $_SESSION['name'] = $name;
            $_SESSION['postal'] = $postalcode;
            $_SESSION['phone'] = $phone;
            $_SESSION["email"] = $email;
            $i = NULL;
            unset($time);
            header("Location: DepositCalculator.php");
        }
    }
    if (isset($clear)) {
        $name = "";
        $email = "";
        $postalcode = "";
        $phone = "";
        $contactType = "";
        unset($time);
        
        $i= NULL;
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <h1>Customer Information</h1>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" value="<?php if(isset ($_POST['name'])){print $name;} ?>"><span  name="error_name" class="error"><?php print "$nameError"; ?></span></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><input type="text"  id="pc" name="pc"value="<?php if(isset ($_POST['pc'])){ print $postalcode;} ?>" ><span name="error_pc" class="error"><?php print "$postalcodeError"; ?></span></td>
                </tr>
                <tr>
                    <td>Phone number:  <br style="font-weight: lighter;">(nnn-nnn-nnnn)</td>
                    <td><input type="text" name="phone" id="phone" value="<?php if(isset ($_POST['phone'])){print $phone;} ?>"><span name="error_phone" class="error" ><?php print "$phoneError"; ?></span></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text"  name="email" id="email" value="<?php if(isset ($_POST['email'])){ print "$email";} ?>"><span name="error_email" class="error" ><?php print "$emailError"; ?></span></td>
                </tr>

                <tr class="blank_row">
                    <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                </tr>
                <tr>

                    <td>Preferred Contact Method:</td>
                    <td><input type="radio" name="radio" value="phone" <?php if ($i == 1) {
    print "checked = 'checked'";$i = "";
} ?> id="rd_phone"  >Phone
                        <input type="radio" name="radio" value="email" <?php if ($i == 2) {
    print "checked = 'checked'"; $i = "";
} ?> id="rd_email"  >Email
                        <span id="error_radio" name="error_radio" class="error"><?php print "$contactTypeError"; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        If Phone is selected, when can we contact you?<br>(check all applicable)
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="morning" name="time[]" value="Morning" <?php if(isset($_POST['time']) && is_array($_POST['time']) && in_array("Morning", $_POST['time'])) echo 'checked="checked"'; ?>>Morning
                        <input type="checkbox" id="afternoon" name="time[]"  value="Afternoon" <?php if(isset($_POST['time']) && is_array($_POST['time']) && in_array("Afternoon", $_POST['time'])) echo 'checked="checked"'; ?> >Afternoon
                        <input type="checkbox"  id="evening" name="time[]" value="Evening"<?php if(isset($_POST['time']) && is_array($_POST['time']) && in_array("Evening", $_POST['time'])) echo 'checked="checked"'; ?> >Evening <span id="error_time" name="error_time" class="error"><?php print "$timeError"; ?></span></td>

                </tr>
                <tr>
                    <td><input type="submit" value="Submit" name="calculate" id="calculate" style="background-color: #4CAF50;  border: none;  color: white;
                               padding: 15px 15px; text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin: 2px 2px; cursor: pointer;"></td>
                    <td> <input type="submit" value="Clear" id="clear" name="clear" style="background-color: #4CAF50;  border: none;  color: white;
                                padding: 15px 15px; text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin:2px 2px; cursor: pointer;"></td>
                </tr>

            </table>
<?php
// put your code here
$i=NULL;
}?>
    </body>
</html>

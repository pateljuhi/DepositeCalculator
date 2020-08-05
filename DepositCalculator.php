
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
        
        if(empty($_SESSION['name']) || empty($_SESSION['postal']) || empty($_SESSION['phone']) || empty($_SESSION["email"])) {
            header("Location: CustomerInfo.php ");
        }
        else{
            $self = htmlentities($_SERVER['PHP_SELF']);
            extract($_POST);
			if(isset ($_POST['pa'])){
     $principalAmount = $_POST['pa'];
	}
            if(isset ($_POST['ir'])){
            $interest_rate = $_POST["ir"];
			}
            
			if(isset ($_POST['ud'])){
				$yeartoDeposit = $_POST["ud"];
			}
			 $principalAmountErr= 
                $interest_rateErr= 
                $yeartoDepositErr= "";
            if (isset($_POST['calculate'])){
                $Error = TRUE;
                $principalAmountErr= ValidatePrincipal($principalAmount);
                $interest_rateErr= ValidateIntrest($interest_rate);
                $yeartoDepositErr= ValidateYears($yeartoDeposit);
                
                if(empty($principalAmountErr) && empty($interest_rateErr) && empty($yeartoDepositErr) && $Error){
                    $_SESSION["principalAmount"] = $principalAmount;
                    $_SESSION["interestRate"] = $interest_rate;
                    $_SESSION["yeartoDeposit"]= $yeartoDeposit;
                    print("The following is the result of calculation.");
                    print "<table>";
                    $runningPrincipal = $principalAmount;
                    print("<th><td> Year </td><td>Principal at Year Start </td><td> Interest for the Year</td></th>");
                    for($i = 1; $i <= $yeartoDeposit; ++$i){
                        $interest = $runningPrincipal * $interest_rate * 0.01;
                        printf("<tr><td>%s</td><td>\$%.2f</td><td>\$%.2f</td></tr>", $i, $runningPrincipal, $interest);
                        $runningPrincipal += $interest;

                    }
                     print "</table>";

                }
            }
            if (isset($clear)){
                $principalAmount="";
                $interest_rate="";
                $yeartoDeposit="";
            } 
                
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Enter Principal Amount, Interest Rate select number of years to deposit</h3>
        <form action = "<?php  echo $_SERVER['PHP_SELF']; ?>" method="post" >
            
            <table>
            <tr>
                <td>Principal Amount:</td>
                <td><input type="text" name="pa" id="pa" value="<?php if(isset ($_POST['pa'])) echo $principalAmount; ?>">
                    <span id="error_pa" name="error_pa" class="error"value=""><?php print $principalAmountErr; ?></span></td>
            </tr>
            <tr>
                <td>Interest Rest(%):</td>
                <td><input type="text"  name="ir" id="ir" value="<?php if(isset ($_POST['ir'])) echo $interest_rate; ?>"> 
                    <span id="error_ir" name="error_ir" class="error"><?php print $interest_rateErr;?></span></td>
            </tr>
            <tr>
                <td>Years to Deposit:</td>
                <td><input type="text" name="ud" id="ud" value="<?php if(isset ($_POST['ud'])) print $yeartoDeposit; ?>" >
                    <span id="error_ud" name="error_ud" class="error"><?php print "$yeartoDepositErr"; ?></span></td>
            </tr>
            <tr>
                <td><input type="submit" value="Calculate" name="calculate" id="calculate" style="background-color: #4CAF50;  border: none;  color: white;
                     padding: 15px 15px; text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin: 2px 2px; cursor: pointer;"></td>
                <td> <input type="submit" value="Clear" id="clear" name="clear" style="background-color: #4CAF50;  border: none;  color: white;
                     padding: 15px 15px; text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin:2px 2px; cursor: pointer;"></td>
            </tr>
            </table>
        

        <?php
        include './Lab4Common/footer.php';
        ?>
    </body>
</html>

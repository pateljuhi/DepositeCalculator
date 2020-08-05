<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
         function ValidateAgree($agree){
             $msg="";
            global $Error;
            if(empty($agree)){
                $msg = "You must agree to the terms and conditions";
                $Error = FALSE;
            }
            return $msg;
         }
         function ValidatePrincipal($principal_amount) {
            $msg="";
            global $Error;
            if(empty($principal_amount) || (!is_numeric($principal_amount)) || $principal_amount <= 0){
               // array_push($errMsg,"The Principal amount must be numeric and grater than 0.");
                $msg = " Principal amount must be numeric";
                $Error = FALSE;
            }
           
            return $msg;
        }
        
        function ValidateIntrest($interest_rate) {
            $msg="";
            global $Error;
            if(empty($interest_rate) || (!is_numeric($interest_rate)) || $interest_rate <= 0){
               // array_push($errMsg,"The interest rate must be numeric and non-nagative.");
                $msg=" interest rate must be non-nagative";
                $Error = FALSE;
            }
            return $msg;
        }
        
         function ValidateYears($yeartoDeposit) {
            $msg="";
            global $Error;

            if(empty($yeartoDeposit) || (!is_numeric($yeartoDeposit)) || ($yeartoDeposit <= 1 || $yeartoDeposit >20)){
                //array_push($errMsg, "Number of years to deposit must be a numeric between 1 and 20");
                $msg = " Years must be a numeric between 1 and 20";
                $Error = FALSE;
            }
            
            return $msg;
        }
        
        function ValidateName($name) {
            $msg="";
            global $Error;
            if(empty($name)){
               // array_push($errMsg,"The name can not be blank.");
                $msg=" Name can not be blank";
                $Error = FALSE;
            }
            
            $regex = "/^[a-zA-Z'. -]+$/";
            if(!preg_match($regex, $name) ){
                $msg="Incorrect Name";
                $Error = FALSE;
            }
            return $msg;
        }
        
        function ValidatePostalCode($postalcode) {
            $msg="";   
            global $Error;
            if(empty($postalcode)){
               // array_push($errMsg,"The postal code can not be blank.");
                $msg=" Postal code can't be blank";
                $Error = FALSE;
            }
            $postcode_reg = "/[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]/";
            if(!preg_match($postcode_reg, $postalcode) ){
               
               // array_push($errMsg,"The postal code Must be in correct form.");
                $msg=" Incorrect postal code";
                $Error = FALSE;
            }
            return $msg;
        }
        function ValidatePhone($phone) {
            $msg=""; 
            global $Error;
            if(empty($phone)){
               // array_push($errMsg,"The phone number can not be blank.");
                $msg=" Phone number can't be blank";
                $Error = FALSE;
            }
            
            $phone_reg = "/[1-9]{3}-[0-9]{3}-[0-9]{4}/";
            if(!preg_match($phone_reg, $phone)){
                //array_push($errMsg, "The Phone number must be in the correct form");
                $msg=" incorrect phone number formate";
                $Error = FALSE;
            }
            return $msg;
        }
        
        function ValidateEmail($email) {
            $msg=""; 
            global $Error;
            if(empty($email)){
                $msg = " The email can not be blank.";
                $Error = FALSE;
            }
            $email_reg = "/\b[a-zA-Z0-9._%+-]+@(([a-zA-Z0-9-]+)\.)+[a-zA-Z]{2,4}\b/";
            if(!preg_match($email_reg, $email)){
                $msg = " Incorrect form of email"; 
                $Error = FALSE;
            }
            return $msg;
        }
        
        function ValidateContactType($contactType) {
            global $Error;
            $msg="";
            if(empty($contactType)){
                $msg ="Must Select preffered contact method.";
                $Error = FALSE;
            }
            return $msg;
        }
        function ValidateTime($contactType,$time) {
            $msg="";
            global $Error;
            if((!empty($contactType))&& $contactType == "phone"){
                    if(empty($time)){
                        $msg = " preferred contact method is phone, you have to select contact time";
                        $Error = FALSE;
                    }
            }
            return $msg;
        }
        ?>
    </body>
</html>

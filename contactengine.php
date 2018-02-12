<?php

$EmailTo = "hello@joerutland.com";

$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email']));
$company = Trim(stripslashes($_POST['company']));
$url = Trim(stripslashes($_POST['url'])); 
$message = Trim(stripslashes($_POST['message'])); 


$EmailFrom = $email;
$Subject = "jrutlanddesign website enquiry from ".$name;


// validation
/*
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}
*/
// prepare email body text
$Body = "";
$Body .= "Website Enquiry: ";
$Body .= "\n";
$Body .= "\n";

$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email Address: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Company Name: ";
$Body .= $company;
$Body .= "\n";
$Body .= "Current URL: ";
$Body .= $url;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;




// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/thankyou\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/404\">";
}
?>
<?php

$EmailTo = "hello@jrutlanddesign.co.uk";

$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email']));

$url = Trim(stripslashes($_POST['url'])); 
$about = Trim(stripslashes($_POST['about']));
$goals = Trim(stripslashes($_POST['goals']));

$budget = Trim(stripslashes($_POST['budget']));
$sday = Trim(stripslashes($_POST['sday'])); 
$smonth = Trim(stripslashes($_POST['smonth'])); 
$syear = Trim(stripslashes($_POST['syear'])); 

$cday = Trim(stripslashes($_POST['cday'])); 
$cmonth = Trim(stripslashes($_POST['cmonth'])); 
$cyear = Trim(stripslashes($_POST['cyear']));

$additional = Trim(stripslashes($_POST['cyear'])); 



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
$Body .= "Personal Details: ";
$Body .= "\n";
$Body .= "\n";

$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email Address: ";
$Body .= $email;
$Body .= "\n";

$Body .= "\n";
$Body .= "\n";

$Body .= "Business Detials: ";
$Body .= "\n";
$Body .= "\n";

$Body .= "URL: ";
$Body .= $url;
$Body .= "\n";
$Body .= "About the Business: ";
$Body .= $about;
$Body .= "\n";
$Body .= "Project Goals: ";
$Body .= $goals;
$Body .= "\n";

$Body .= "\n";
$Body .= "\n";

$Body .= "Project Detials: ";
$Body .= "\n";
$Body .= "\n";

$Body .= "Budget: ";
$Body .= $budget;
$Body .= "\n";

$Body .= "Start Date: ";
$Body .= "\n";
$Body .= "\n";
$Body .= $sday;
$Body .= "\n";
$Body .= $smonth;
$Body .= "\n";
$Body .= $syear;

$Body .= "\n";
$Body .= "\n";

$Body .= "Deadline Date: ";
$Body .= "\n";
$Body .= "\n";
$Body .= $cday;
$Body .= "\n";
$Body .= $cmonth;
$Body .= "\n";
$Body .= $cyear;

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/thankyou.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>
<?php

require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp.fas.harvard.edu';


//Retrieve Variables from POST


//General Variables
$group = $_POST['Group'] ;
$day = $_POST['Day'] ;
$date = $_POST['Date'] ;
$author = $_POST['Author'] ;

//Group Summary Variables
$kids = $_POST['Kids'] ;
$counselors = $_POST['Counselors'] ;
$meeting = $_POST['Meeting'] ;
$homework = $_POST['Homework'] ;
$project = $_POST['Project'] ;
$goodbad = $_POST['ProbsGood'] ;
$comments = $_POST['Comments'];

//Project Card Variables
$title = $_POST['Title'] ;
$topic = $_POST['Topic'] ;
$other = $_POST['Other'] ;
$series = $_POST['Series'] ;
$inspiration = $_POST['Inspiration'] ;
$preparation = $_POST['Preparation'] ;
$materials = $_POST['Materials'] ;
$procedures = $_POST['Procedures'] ;
$results = $_POST['Results'] ;
$comments3 = $_POST['Comments3'] ;

//write summary to e-mail lists

$report .= "$group summary for $day, $date" ;
$report = "\nwritten by: $author" ;
$report .= "\n\n\t\t ATTENDANCE" ;
$report .= "\n Kids present: $kids" ;
$report .= "\n Counselors present: $counselors" ;
$report .= "\n\n\t\t MEETING KIDS" ;
$report .= "\n $meeting" ;
$report .= "\n\n\t\t HOMEWORK" ;
$report .= "\n $homework" ;
$report .= "\n\n\t\t PROJECT TIME" ;
$report .= "\n $project";
$report .= "\n\n\t\t PROBLEMS & GOOD STUFF" ;
$report .= "\n $goodbad" ;
$report .= "\n\n\t\t COMMENTS, SUGGESTIONS" ;
$report .= "\n $comments" ;

//mail to lists

$mail->SetFrom('chtnasp@hcs.harvard.edu', 'CHTNASP-ty');

$to = "chtnasp-$group" ;
$to .= "@lists.hcs.harvard.edu" ;
$mail->AddAddress($to);

$re = "[chtnasp] $group report for $day, $date" ;
$mail->Subject = $re;

$mail->Body = $report;

$mail->send()

?>

<html>

<head>
<title> Group Summary and Project Cards</title>
</head>

<body bgcolor=990000>

<font color=white>

<h1>Group Summary was sent!!</h1>

Thank you, <?php echo ( $author ); ?>, for submitting!
<BR>
<BR>Return <a href="http://www.hcs.harvard.edu/~chtnasp">home</a>

</body>


</html>


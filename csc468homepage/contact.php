<html>
    <!-- Setup including page title etc. -->
    <head>
      <!-- page title-->
      <title>Benjamin Kaiser | Contact</title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body class="body-bg">
    <center><a href="index.html"><img src="assets/SiteHeader.gif" alt="SiteHeader.gif"/></a></center>
    <hr>
    <center class="links"><a class="intern" href="bio.html">Bio</a> <a class="intern" href="exp.html">Experience</a> <a class="intern" href="project.html">Projects</a> <a class="intern" href="contact.html">Contact</a></center>
<?php


if(isset($_POST['email']))
{



    $email_to = "benjamin.kaiser@mines.sdsmt.edu";

    $email_subject = "Contact from Personal Website";






    function died($error)
    {


        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['first']) ||

        !isset($_POST['last']) ||

        !isset($_POST['email']) ||

        !isset($_POST['phone']) ||

        !isset($_POST['mssg']))
    {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $first_name = $_POST['first']; // required

    $last_name = $_POST['last']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['phone']; // not required

    $comments = $_POST['mssg']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {

    $error_message .= 'The First Name you entered does not appear to be valid.<br />';

  }

  if(!preg_match($string_exp,$last_name)) {

    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';

  }

  if(strlen($comments) < 2) {

    $error_message .= 'The Comments you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below:\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";

    $email_message .= "Last Name: ".clean_string($last_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";
    $email_message.= "Date/Time: ".date('m/d/Y h:i:s a', time());





// create email headers
/*
$headers = 'From: '.$email_from."\n".

'Reply-To: '.$email_from."\n" .

'X-Mailer: PHP/'.phpversion();
*/
$fout = fopen("messages.txt", "a") or die("Unable to send form.  Please contact me at Benjamin.Kaiser@mines.sdsmt.edu");
fwrite($fout, $email_message);
fclose($fout);

//echo mail($email_to, $email_subject, $email_message, $headers);

?>



Thank you for contacting me! I will be in touch with you as soon as possible.



  <?php

  }

  ?>
  </body>
</html>

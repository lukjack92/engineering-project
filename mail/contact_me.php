<?php
	session_start();

	$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
        $headers .= 'From: lukjack' . "\r\n";
        $headers .= 'Praca inżynierska' . "\r\n";
        $text = "Kopia wiadomości do".$to."\n";
	$name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'Demo Contact Form';
        $to = 'lukjack92@gmail.com';
        $subject = 'Kontakt ze strony lukjack.eu';
        $body = "From:" .$name. "\n E-Mail: ".$email." \n\n Message:\n\n ".$message;

        $all_ok = true;

        // Check if name has been entered
        if (!$_POST['name']) {
            $_SESSION['errName'] = '<div class="alert alert-danger">Please enter your name</div>';
            $all_ok = false;
        }

        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errEmail'] = '<div class="alert alert-danger">Please enter a valid email address</div>';
            $all_ok = false;
        }

        //Check if message has been entered
        if (!$_POST['message']) {
            $_SESSION['errMessage'] = '<div class="alert alert-danger">Please enter your message</div>';
            $all_ok = false;
        }

        if($all_ok)
        {
          mail($to, $subject, $body, $headers);
	  			mail($email,$text,$body,$headers);
          $_SESSION['result'] = '<div class="alert alert-success"><strong>Thank You!</strong> Message was sent. I will be in touch.</div>';
        } else {
          $_SESSION['result'] = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        }

        header("Location: ../contact.php");
?>

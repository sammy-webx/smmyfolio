<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['send'])){
		$name 	= $_POST['username'];
		$email	= $_POST['email'];
		$requirement	= $_POST['requirement'];
		$msg	= $_POST['msg'];

		require 'PHPMailer/Exception.php';
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings                     //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'officialsameeransari0@gmail.com';                     //SMTP username
			$mail->Password   = 'cimc pgfk cllg wrev			';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom( $email , 'SmmyFolio');
			$mail->addAddress('officialsameeransari0@gmail.com', 'sammyfolio');   

			

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'testing';
			$mail->Body    = "sender name - $name <br> Mail - $email <br>  Subject - $requirement <br> 	Msg - $msg";

			$mail->send();
			header("Location: thank_you.php");
			exit();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	?>
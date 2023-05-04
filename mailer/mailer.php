<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    class Mailer
    {
        private $to = null;
        private $message = null;
        private $subject = null;
        private $mail = null;

        function __construct($to,$subject,$message)
        {
            $this->to = $to;
            $this->subject = $subject;
            $this->message = $message;

            $this->mail = new PHPMailer(true);
        }

        function send()
        {
            try {
                $this->mail->SMTPDebug = false; 
                $this->mail->isSMTP();
                $this->mail->Host = 'smtp.gmail.com';
                $this->mail->SMTPAuth = true;
                $this->mail->Username = 'autohubcarwashcarcare@gmail.com';
                $this->mail->Password = 'bimkixiyttjgqbge';
                $this->mail->SMTPSecure = 'tls';
                $this->mail->Port = 587;
                $this->mail->setFrom('autohubcarwashcarcare@gmail.com', 'Auto Hub');
                $this->mail->addAddress($this->to);
                $this->mail->isHTML(true);
                $this->mail->Subject = $this->subject;
                $this->mail->Body = $this->message;
                $this->mail->send();
                return true;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>
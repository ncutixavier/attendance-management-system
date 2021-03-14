<?php
    require 'vendor/autoload.php';
    class SendEmail{
        public static function SendMail($to,$subject,$content)
        {
            $key = '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';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("ncuti65@gmail.com", "Ncuti Xavier");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain");
        // $email->addContent("text/html");

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;
            } catch (Exception $e) {
                echo 'Email exception caught: '.$e->getMessage()."\n";
                return false;
            }
        }
}

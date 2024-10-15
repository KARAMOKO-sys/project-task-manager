<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user = $userManager->getUserByEmail($email);

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $userManager->storeResetToken($user['user_id'], $token);

        $resetLink = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . 'views/authentification/reset-password.php?token=' . $token;

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'detoleandre@gmail.com';
            $mail->Password   = '09181864'; // Utiliser un mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('detoleandre@gmail.com', 'Task Manager');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = 'Click the following link to reset your password: <a href="' . $resetLink . '">Reset Password</a>';

            $mail->send();
            echo 'An email with the reset link has been sent to your email address.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with that email address.";
    }
}
?>
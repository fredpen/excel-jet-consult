<?php
// require the necessary files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/vendor/autoload.php';
// import mail functionality
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// create a connection with the tablebase
$timezone = date_default_timezone_set("Africa/Lagos");

// error reporting and logging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// create a new database connection
try {
    //$con = new mysqli("localhost", "exceljet_fredrick", "lautech@1991", "exceljet_app");
    $con = new mysqli("localhost", "root", "", "exceljet_app");
    $con->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    die("connection to the database failed ");
}

// set up all the varaiables and remove tags
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$birthdate = strip_tags($_POST['birthdate']);
$phone = $_POST['phone'];
$country = strip_tags($_POST['country']);
$depositor = strip_tags($_POST['depositor']);
$account_number = $_POST['account_number'];
$gender = strip_tags($_POST['gender']);
$course = strip_tags($_POST['course']);
$marry = strip_tags($_POST['marry']);
$payment = strip_tags($_POST['payment']);
$bank = strip_tags($_POST['bank']);
$timestamp = date("Y-m-d-l-h:m");

$stmt = $con->prepare("INSERT INTO clients VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("sssssssssssss", $timestamp, $name, $email, $birthdate, $phone, $country, $depositor, $account_number, $gender, $course, $marry, $payment, $bank);
$stmt->execute();

// echo ($stmt->affected_rows === 0 ? false : true);


if ($stmt->affected_rows !== 0) {



    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.exceljetconsult.com.ng';            // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'abiola.david@exceljetconsult.com.ng';                 // SMTP username
        $mail->Password = 'lautech@1991';                           // SMTP password
        $mail->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('abiola.david@exceljetconsult.com.ng', 'Excel Jet Consult');
        $mail->addAddress('fredricksola@yahoo.com', 'fred');     // Add a recipient
        $mail->addReplyTo('abiola.david@exceljetconsult.com.ng', 'reply');

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'from the real mail';
        $mail->Body    = (file_get_contents('course.php'), __DIR__);
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo true;
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo false;
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


} else{
    echo false;
}

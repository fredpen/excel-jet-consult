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

// build the mail string
$message =
"<!DOCTYPE html>
<html>
    <body>
        <div>
            <p>A client just register for ". $course ." on the site. Find the details below</p>
        <ul>
          <p style='margin: 20px 0; color: black; font-size: 20px;text-transform: capitalize;'>Personal details</p>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>Registered at: " .$timestamp ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>full Name: " .$name ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;'>Email: " .$email."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>birthdate: " .$birthdate ."</li>
                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>phone number: " .$phone ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>country: " .$country ."</li>

      <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>gender: " .$gender ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>course registered for: " .$course ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>Mariage status: " .$marry ."</li>



      <p style='margin: 20px 0; color: black; font-size: 20px;text-transform: capitalize;'>payment details</p>
                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>depositor's account name: " .$depositor ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>Depositor's account number: " .$account_number ."</li>


                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>mode of payment: " .$payment ."</li>

                <li style='list-style-type: circle;margin: 10px 0; color: blue;
        text-transform: capitalize;'>bank name : " .$bank ."</li>
            </ul>
    </div>
            <p> Simply reply to this email with the details of the client training after confirming the payment </p>
        <div>
            &copy; Excel Jet Consult. All Rights Reserved.
        </div>
    </body>
</html>
";

$stmt = $con->prepare("INSERT INTO clients VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $timestamp, $name, $email, $birthdate, $phone, $country, $depositor, $account_number, $gender, $course, $marry, $payment, $bank);
$stmt->execute();


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
        $mail->addReplyTo($email, 'reply');

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Course registration !!!';
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);

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

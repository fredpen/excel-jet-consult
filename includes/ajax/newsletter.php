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
    $con = new mysqli("localhost", "exceljet_fredrick", "lautech@1991", "exceljet_app");
    // $con = new mysqli("localhost", "root", "", "exceljet_app");
    $con->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    die("connection to the database failed ");
}

// set up all the varaiables and remove tags
$name = strip_tags($_POST['newslettername']);
$email = strip_tags($_POST['newsletteremail']);
$timestamp = date("Y-m-d-l-h:m");

// build the mail string
$message = "Dear Administartor, <p>A client with name " . $name . " and email " . $email . " has subsribed to your newsletter</p><p>Regards</p>";
$client_message = "Dear " . $name . ",<p> You have successfully subscribed to our newsletter.</p>
                    <p>Find out more about our services <a href='http://exceljetconsult.com.ng/index.php#services'> here</a></p>
                    <p>Regards</p>";


$stmt = $con->prepare("INSERT INTO newsletter VALUES('', ?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $timestamp);
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
        $mail->Password = 'abiola@2019';                           // SMTP password
        $mail->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //admin
        $mail->setFrom('abiola.david@exceljetconsult.com.ng', 'Excel Jet Consult');
        $mail->addAddress('abiola.david@exceljetconsult.com.ng', 'David Abiola');     // Add a recipient
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'New newsletter Subscription';
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);
        $mail->send();


        // clients
        $mail->ClearAllRecipients();
        $mail->ClearAddresses();
        $mail->ClearReplyTos();
        $mail->addAddress($email, $name);     // Add a recipient
        $mail->Body    = $client_message;
        $mail->AltBody = strip_tags($client_message);
        $mail->send();

        echo true;
    } catch (Exception $e) {
        echo false;
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


} else{
    echo false;
}


?>

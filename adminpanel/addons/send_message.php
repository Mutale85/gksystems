<?php
    require '../../includes/db.php';
    require '../../includes/conf.php';
    require '../../PHPMailer/PHPMailer.php';
    require '../../PHPMailer/SMTP.php';
    require '../../PHPMailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $selectedEmployees = $_POST['employees'];
    $messageType = $_POST['messageType'];
    $messageContent = $_POST['messageContent'];

    if($messageType == 'email'){
        // use php mailer to send email
       echo sendEMail($selectedEmployees, $messageContent);
    }else{
        // use the SMS function
        foreach($selectedEmployees as $to){
            echo SMSNOW($to, $messageContent, API, SENDER);
        }
        $response = array(
            'success' => true,
            'message' => 'SMS sent successfully.'
        );

    }

    

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    function sendEMail($selectedEmployees, $messageContent){

        $mail = new PHPMailer(true);

        try {
            // Configure SMTP settings
            $mail->isSMTP();
            $mail->Host = HOST;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL;
            $mail->Password = PWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set sender information
            $mail->setFrom('sender@example.com', 'Sender Name');

            // Iterate through selected employees and send emails
            foreach ($selectedEmployees as $employeeID) {
                // Retrieve the employee email from the database based on the ID
                $employeeEmail = getEmailFromDatabase($employeeID);

                // Set recipient information
                $mail->addAddress($employeeEmail);

                // Set email subject and body
                $mail->Subject = 'Your Subject';
                $mail->Body = $messageContent;

                // Send the email
                $mail->send();

                // Clear recipient information for the next email
                $mail->clearAddresses();
            }

            // Prepare the response message
            $response = array(
                'success' => true,
                'message' => 'Emails sent successfully.'
            );
        } catch (Exception $e) {
            // Prepare the response message in case of an error
            $response = array(
                'success' => false,
                'message' => 'Email sending failed: ' . $mail->ErrorInfo
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Function to retrieve the employee email from the database based on the ID
    function getEmailFromDatabase($employeeID) {
        global $connect;
        $statement = $connect->prepare("SELECT email FROM team_members WHERE phonenumber = ? AND email != '' ");
        $statement->execute([$employeeID]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['email'];
    }
?>

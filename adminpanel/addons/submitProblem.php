<?php 
    include("../../includes/db.php");
    include("../../includes/conf.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $names = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $problemType = filter_input(INPUT_POST, 'problemType', FILTER_SANITIZE_SPECIAL_CHARS);
        $problemDescription = filter_input(INPUT_POST, 'problemDescription', FILTER_SANITIZE_SPECIAL_CHARS);
        $problemDate = filter_input(INPUT_POST, 'problemDate', FILTER_SANITIZE_SPECIAL_CHARS);
        $problemDate = date("Y-m-d", strtotime($problemDate));
        $severity = filter_input(INPUT_POST, 'severity', FILTER_SANITIZE_SPECIAL_CHARS);
        $urgency = filter_input(INPUT_POST, 'urgency', FILTER_SANITIZE_SPECIAL_CHARS);
        $reference = uniqid();
        $reporter_id = $_SESSION['phonenumber'];
      
        // Insert problem report into the database
        $stmt = $connect->prepare('INSERT INTO problem_reports (`reporter_id`, `names`, `email`, `problemType`, `problemDescription`, `problemDate`, `severity`, `urgency`, `reference`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$reporter_id, $names, $email, $problemType, $problemDescription, $problemDate, $severity, $urgency, $reference]);
        $reportId = $connect->lastInsertId();
        $message = 'Your report has been sent';
        echo SEND_SMSNOW($reporter_id, $message, API, SENDER);
        // send a message to superadmin
        $message = $problemType. ' has been reported ';
        $to = '+260970448181';
        echo SEND_SMSNOW($to, $message, API, SENDER);
        $to = '+260976330092';
        echo SEND_SMSNOW($to, $message, API, SENDER);
        // Handle file uploads
        $attachments = $_FILES['attachments'];
      
        foreach ($attachments['name'] as $index => $fileName) {
            $tmpFilePath = $attachments['tmp_name'][$index];
            $fileSize = $attachments['size'][$index];
            $fileError = $attachments['error'][$index];
      
            if ($fileError === UPLOAD_ERR_OK && is_uploaded_file($tmpFilePath)) {
                // Generate a unique filename for each uploaded file
                $uniqueFileName = uniqid() . '_' . $fileName;
                $uploadPath = 'uploads/' . basename($uniqueFileName);
        
                // Move the uploaded file to the designated folder
                move_uploaded_file($tmpFilePath, $uploadPath);
                // Insert file information into the database
                $stmt = $connect->prepare('INSERT INTO report_attachments (report_id, reference, file_name, file_path) VALUES (?, ?, ?, ?)');
                $stmt->execute([$reportId, $reference, $fileName, $uploadPath]);
            }
        }
      
        // Return a JSON response indicating success
        $response = ['success' => true];
        header('Content-Type: application/json');
        echo json_encode($response);
        // here we send a text message to the client with reference.
      } else {
        // Return a JSON response indicating error
        $response = ['success' => false, 'message' => 'Invalid request'];
        header('Content-Type: application/json');
        echo json_encode($response);
      }
?>
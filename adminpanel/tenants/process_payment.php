<?php

  // Assign all POST parameters and value to a local array
  $req = 'cmd=notify-validate';

  foreach($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req.= "&$key=$value";
  }

  // assign posted variables to local variables
  $item_name = $_POST['item_name'];
  $custom = $_POST['custom'];
  $payment_status = $_POST['status'];
  $payment_amount = $_POST['amount'];
  $payment_currency = $_POST['currency_code'];
  $merchant = $_POST['merchant'];
  $payer_email = $_POST['customer'];

  // post back to FloCash system to validate
  $url = 'NOTIFY URL';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
  $res = curl_exec($ch);

  // Process response from FloCash gateway
  if (curl_errno($ch)) {

    // HTTP ERROR
    $log_mess.= "CONN-ERROR:" . curl_error($ch) . "\n";
    fwrite($fp_file, $log_mess);
    fclose($fp_file);
    exit;
  }else {
    // We have received data
    curl_close($ch);

    // Log message if required
    $log.= "Got-data : " . $req . "\n";
    $log.= "Data: " . $res . "\n";

    // check if Post Back has been verified by FloCash Gateway
    if (strcmp($res, "VERIFIED") == 0) {
          // If VERIFIED, then FloCash Gateway confirmed that your previous post was valid. Now we proceed to verify rest of transaction data

          // check that merchant_email is your Primary FloCash email
          if (!($merchant == 'mutamuls@gmail.com')) {

            // invalid merchant ID
            $log.= "Log: Invalid merchant email. " . $message . "\n";

            // log message
            exit;
          }

          // check the payment_status is Completed
          if (!(strcmp($payment_status, "0000") == 0)) {

            // Payment not successful
            $log.= "Log: Payment not successful."n";


            // log message
            exit;
          }

     // From here, you can be sure that payment has been successful and you can do additional
       check such as
     // check that txn_id has not been previously processed
     // check that payment_amount/payment_currency are correct
     // then process payment

          {
         // Your payment processing code goes here
          }


     // You may also need to log the transaction data into a database (MySQL)
     // get connection
           $mysqli = new mysqli("localhost", "root", "password", "merchant_db", "3306");

            if (mysqli_connect_errno()) {
              echo "FailedtoconnecttoMySQL:
                  " . mysqli_connect_error() . PHP_EOL;
            } else {
             /* create a prepared statement */
             $stmt = $mysqli->stmt_init();
             /* Insert into trans table */
     if ($stmt->prepare("INSERT INTO" . "notify_trans(trans_id, fpn_id, merchant, item_price, sender_acct, " .
       "order_id, item_name, currency_code, quantity, amount, " .
               "custom, customer, status, status_msg, verified, created_at) " .
               "VALUES( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) ")) {

             /* bind parameters */
             $stmt->bind_param("sssdssssidssssis",
                 $_POST["trans_id"], $_POST["fpn_id"],
                 $_POST["merchant"], $_POST["item_price"],
                 $_POST["sender_acct"], $_POST["order_id"],
                 $_POST["item_name"], $_POST["currency_code"],
                 $_POST["quantity"], $_POST["amount"],
                 $_POST["custom"], $_POST["customer"],
                 $_POST["status"], $_POST["status_msg"],
                 $verified = 0, date("Y - m - dH : i : s"));

                 /* execute query */
                 $stmt->execute();
                 /* close statement */
                 $stmt->close();
          } else {
             echo mysqli_error($mysqli) . PHP_EOL;
          }
          /* close connection */
              $mysqli->close();
        }
}
  }

?>
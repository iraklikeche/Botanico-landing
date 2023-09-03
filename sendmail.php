<?php if($_POST['sendmail'] = "sendmail"){
    
        // ********** API EMAIL START **************

        $fromName = 'SH reservation';
        $fromEmail = 'reservation@silkhospitality.com';
        $subject = 'New Lovemonth Reservation';

        $htmlMessage = '
        <p>Hello, you recieved new Reservation from ...</p><br><br>
        <p>Name: '. $_POST['name'] .'</p>
        <p>Email: '. $_POST['email'] .'</p>
        <p>Mobile Number: '. $_POST['phone'] .'</p>
        <p>Date From: '. $_POST['pfrom'] .'</p>
        <p>Date To: '. $_POST['pto'] .'</p>
        ';

        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" => $fromName         
            ),
            "to" => array(
                array(
                    "email" => "tamar.karchava@silkhospitality.com",
                    "name" => "tamar",
                    ),
                array(
                    "email" => "giorgi.naskidashvili@silkroad.ge",
                    "name" => "giorgi",
                    ),
                array(
                    "email" => "welcome@silkhospitality.com",
                    "name" => "Welcome",
                    )
            ), 
            "subject" => $subject,
            "htmlContent" => '<html><head></head><body><p>'.$htmlMessage.'</p></p></body></html>'
        ); 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: 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';
        $headers[] = 'Content-Type: application/json';  
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);


        // if (curl_errno($ch)) {
        //     echo 'Error:' . curl_error($ch);
        // }
        // print_r($result);
        // print_r($data);


        // *********  EMAIL API END **********************
    }
?>
<?php

$to = 'statueofliberty12@mail.ru';

if (!empty($_POST)) {
    if (trim($_POST["name"]) == "") {
        $response = array('error' => 'Empty name', 'field' => 'fullname');
        echo json_encode($response);
        exit();
    }
    if (trim($_POST["subject"]) == "") {
        $response = array('error' => 'Empty subject', 'field' => 'typefield');
        echo json_encode($response);
        exit();
    }
    if (trim($_POST["message"]) == "") {
        $response = array('error' => 'Empty message', 'field' => 'message');
        echo json_encode($response);
        exit();
    }

    $message = '<html><body>';
    $message .= '<p>' . $_POST['message'] . '</p>';
    $message .= "</body></html>";
    $subject = $_POST['subject'];

    $headers = "From: " . $_POST['name'] . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        $response = array('success' => true);
    }
    echo json_encode($response);
}
?>
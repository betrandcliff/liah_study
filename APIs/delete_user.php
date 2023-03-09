<?php

require_once("../include/initialized.php");

$enroll = new Enrollment($conn);
$data = json_decode(file_get_contents("php://input"));

$enroll->email = $data->email;

$enroll->delete_single()

?>
<?php

require_once("../include/initialized.php");
$enroll = new Enrollment($conn);

$data = json_decode(file_get_contents("php://input"));

$enroll->fullname    = $data->fullname;
$enroll->email       = $data->email;
$enroll->password    = $data->password;
$enroll->cv          = $data->cv;
$enroll->type        = $data->type;
$enroll->duration    = $data->duration;
$enroll->start_date  = $data->start_date;
$enroll->end_date    = $data->end_date;
$enroll->location    = $data->location;
$enroll->specialty   = $data->specialty;

$enroll->create();



?>
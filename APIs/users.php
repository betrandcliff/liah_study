<?php

require_once("../include/initialized.php");
$enroll = new Enrollment($conn);

$result = $enroll->read();

$count  = $result->row_count();

$data[] = array();
if($count>0){
    while($row = $result->fetch(PDO::Fetch_ASSOC)){
        extract($row);

        $arr_data(
            [
                "fullname"   => $fullname,
                "email"      => $email,
                "password"   => $password,
                "cv"         => $cv,
                "type"       => $type,
                "duration"   => $duration,
                "start_date" => $start_date,
                "end_date"   => $end_date,
                "location"   => $location,
                "specialty"  => $specialty,

            ]
            );
            array_push($data, $arr_data);
    }

    echo json_encode($data);
}


?>

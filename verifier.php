<?php
$show_detail = FALSE;



if (isset($_GET['batchid'])) {
   
    $batch_id = $_GET['batchid'];
    $tcd_id = $_GET['tcdid'];

    $result  = [];
    if (file_exists("csv/$batch_id.csv")){
    if (($handle = fopen("csv/$batch_id.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // echo "reference_id = " . $reference_id;
            // echo "<br>";
            // echo "data[0] = " . $data[0];
            // echo "<hr>";
            if ($data[0] === $tcd_id) {
                $show_detail = TRUE;
                $result = $data;
                break;
            } 
        }
        fclose($handle);
        // var_dump($result);
        $issue_date = $result[1];
        $intern_name = $result[2];
        $designation = $result[3];
        $designation_description = $result[4];
       // $avatar = ($result[8] == '') ? "https://i.stack.imgur.com/34AD2.jpg" : $result[8];
   
        include('certificate.html');
    }
};

    
}
else echo ("Incorrect Details")

?>


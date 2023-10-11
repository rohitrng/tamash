<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "school_erp";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit']))
{
     
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate selected file is a CSV file or not
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line        
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
        {
            // Get row data
            $name = $getData[0];
            $student_name = $getData[1];
            $form_number = $getData[4];
            $date_of_birth = $getData[21];
            $class_name = $getData[10];
            $gender = $getData[73];
            $session_name = $getData[7];
            $mobile_number = $getData[78];
            $status = "i";

            $data = [
                "enquiryno" => $getData[4],
                "formno" => $getData[4],
                "studentname_prefix" => "",
                "student_dob" => $getData[21],
                "fathername_prefix" => "Mr.",
                "fathername" => $getData[25],
                "fathermobile" => $getData[29],
                "fatheroccupation" => $getData[30],
                "mothername_prefix" => "Mrs.",
                "mothername" => $getData[49],
                "mothermobile" => $getData[53],
                "motheroccupation" => $getData[54],
                "gender" => $getData[73],
                "admission_type" => "",
                "email" => $getData[79],
                "remarks" => "",
                "address" => $getData[61],
                "city" => $getData[62],
                "pincode" => $getData[65],
                "state" => $getData[63],
                "religion" => $getData[69],
                "caste" => $getData[16],
                "category" => $getData[15],
                "received_amount" => "",
                "presentlyclass" => "",
                "presentlyschool" => "",
                "hear_aboutus" => "",
                "follow_up_date" => "",
                "inter_dt" => $getData[11],
                "Adm" => $getData[11],
                "folloupdate_status" => "",
                "visited" => "",
                "followup_Cancel" => "",
                "Follows" => "",
                "Response" => "",
                "Counseller" => "",
                "Priority" => "",
                "followup_remark" => "",
                "assign_calling" => "",
                "enquiry_through" => "",
                "siblings_name" => "",
                "sibling_class" => "",
                "siblings_school" => "",
                "siblings_bod" => "",
                "siblings_namesecond" => "",
                "sibling_class_second" => "",
                "siblings_school_second" => "",
                "siblings_bod_second" => "",
            ];

            $arrayVar = [
                "studentname_prefix" => "Master",
                "student_dob" => $getData[21],
                "nationality" => "INDIA",
                "student_caste" => $getData[16],
                "religion" => $getData[69],
                "category" => $getData[15],
                "gender" => $getData[73],
                "admission_type" => "",
                "session_name" => $getData[7],
                "present_address" => $getData[61],
                "permanent_address" => $getData[61],
                "phone_number" => "",
                "mobile_number" => $mobile_number,
                "mother_name" => $getData[49],
                "remarks" => "",
                "vaccaination" => "",
                "student_medical_conserns" => "",
                "present_school_name" => "",
                "required_school_trasnport" => "",
                "fathername_prefix" => "Mr.",
                "student_father_name" => $getData[25],
                "father_dob" => "",
                "father_education" => "",
                "father_organization" => "",
                "father_designation" => $getData[30],
                "father_office_telephone" => "",
                "father_email_id" => "",
                "father_mobile" => $getData[29],
                "father_res_address" => "",
                "father_emergency_contact" => "",
                "mothername_prefix" => "Mrs.",
                "mother_res_address" => "",
                "mother_emergency_contact" => "",
                "guardian_name" => "",
                "guardian_office_telephone" => "",
                "guardian_email_id" => "",
                "guardian_mobile" => "",
                "guardian_permanent_address" => "",
                "guardian_emergency_contact" => "",
                "guardian_relation" => "",
                "parents_are" => "",
                "child_live_with" => "",
                "local_guardian" => "",
                "local_address" => "",
                "guradian_phone" => "",
                "guradian_mobile" => "",
                "guradian_parent_category" => "",
                "guradian_new_category" => "",
                "guradian_new_house" => "",
                "siblings_name" => "",
                "sibling_class" => "",
                "siblings_school" => "",
                "siblings_bod" => "",
                "siblings_namesecond" => "",
                "sibling_class_second" => "",
                "siblings_school_second" => "",
                "siblings_bod_second" => "",
            ];
            
            $str_json = json_encode($data);
            $arrayVar_json = json_encode($arrayVar);
            mysqli_query($con, "INSERT INTO inquiry_registration (form_number, date_of_birth, class_name, student_name, gender, session_name, mobile_number, json_str, status) 
            VALUES ('" . $form_number . "', '" . $date_of_birth . "', '" . $class_name . "', '" . $student_name . "', '" . $gender . "', '" . $session_name . "', '" . $mobile_number . "', '" . $str_json . "', '" . $status . "')");

            mysqli_query($con, "INSERT INTO student_registration (form_number, date_of_birth, class_name, student_name, session_name, json_str, mobile_number, inq_mode, status) 
            VALUES ('" . $form_number . "', '" . $date_of_birth . "', '" . $class_name . "', '" . $student_name . "', '" . $session_name . "', '" . $arrayVar_json . "', '" . $mobile_number . "', 'off', 'r')");
        }

        // Close opened CSV file
        fclose($csvFile);

        header("Location: create.php");         
    }
    else
    {
        echo "Please select valid file";
    }
}
?>
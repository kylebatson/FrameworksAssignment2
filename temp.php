<?php
include 'config.php';
include 'autoloader.php';
/* $json = file_get_contents('data/users.json');
 $json_data = json_decode($json,true);


 foreach ($json_data as $course) {
    echo $course['Password'];
}

$hash = password_hash("Testpassw0rd", PASSWORD_DEFAULT);

if (password_verify('Testpassw0rd', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}*/$json = file_get_contents(ROOT_DIR . '/data/courses.json');
                            
        // Decode the JSON file
        $json_data = json_decode($json,true);
        $popular = array_column($json_data,'course_recommendation_count');
        array_multisort($popular, SORT_DESC,$json_data);

        $recommended = array_slice($json_data,0,4); 
        print_r($recommended[3]);

        
<?php
 $json = file_get_contents('data/users.json');
 $json_data = json_decode($json,true);


 foreach ($json_data as $course) {
    echo $course['Password'];
}

$hash = password_hash("Testpassw0rd", PASSWORD_DEFAULT);

if (password_verify('Testpassw0rd', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
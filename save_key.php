<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['lia'])) {
    $current_data = file_get_contents('lixa2.json');
    $array_data = json_decode($current_data, true);

    // Check if $array_data is an array
    if (!is_array($array_data)) {
        $array_data = [];
    }

    $ip = $_POST['ip'];
    $date = $_POST['date'];
    $messageText = $_POST['lia'];

    // Check if an entry with the same IP and date already exists
    $existing_entry = null;
    foreach ($array_data as $key => $entry) {
        if ($entry['ip'] === $ip && $entry['date'] === $date) {
            $existing_entry = $key;
            break;
        }
    }

    if ($existing_entry !== null) {
        // Update existing entry
        $array_data[$existing_entry]['messages'][] = $messageText;
    } else {
        // Create a new entry
        $new_data = array(
            'ip' => $ip,
            'date' => $date,
            'messages' => [$messageText]
        );

        $array_data[] = $new_data;
    }

    $json_data = json_encode($array_data, JSON_PRETTY_PRINT);

    if (file_put_contents('lixa2.json', $json_data)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>

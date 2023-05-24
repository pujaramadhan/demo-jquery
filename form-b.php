<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = intval($_POST['number']);
    $text = $_POST['text'];
    $dataArray = array();

    for ($i = 0; $i < $number; $i++) {
        $dataArray[] = "Order ke - ".strval($i) . ' = ' . $text;
    }

    header('Content-Type: application/json');
    echo json_encode($dataArray);
    exit();
}
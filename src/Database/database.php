<?php

    $config = require __DIR__ . "/../config/config.php";

    try {
        $db = new mysqli (
            $config['host'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );

        if ($db->connect_error) {
            throw new Exception("Connection failed: " . $db->connect_error);
        }
    } catch (Exception $e) {
        echo json_encode ([
            "error" => "server error",
            "message" => $e->getMessage()
        ]);
        exit();
    }
?>
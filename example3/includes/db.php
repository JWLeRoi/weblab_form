<?php

    function db_connect()
    {
        $servername = "localhost";
        $username = "jwl01";
        //$password = "*A8C4C2A61D88A5AB0D7FE3C985C75D96D469D5A0";
        $password = "weblabjwl01";
        $db = "jwl01";

        // Create connection
        $conn = new mysqli($servername, $username, $password,  $db);

        // Check connection
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;

    }


    function db_close($conn)
    {
        mysqli_close($conn);

    }

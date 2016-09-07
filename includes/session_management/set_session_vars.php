<?php
    session_start();

//  Set filepath

    $dir = sys_get_temp_dir() . '/' . uniqid();
    mkdir($dir);
    $_SESSION['dir'] = $dir . '/';

//  Create session variables

    $_SESSION['taskNames'] = array();
    $_SESSION['taskPrty'] = array();
    $_SESSION['taskArrDist'] = array();
    $_SESSION['taskArrPms'] = array();
    $_SESSION['taskSerDist'] = array();
    $_SESSION['taskSerPms'] = array();
    $_SESSION['taskExpDist'] = array();
    $_SESSION['taskExpPmsLo'] = array();
    $_SESSION['taskExpPmsHi'] = array();
    $_SESSION['taskAffByTraff'] = array();
    $_SESSION['taskAssocOps'] = array();

//  Read in default values

    $file = fopen('static_data/default_params.txt','r') or die('Unable to open default parameter file!');

//  Set default number of replications

    $line = fscanf($file, "%s %d");
    $_SESSION['numReps'] = $line[1];

//  Set default number of task types

    $line = fscanf($file, "%s %d");
    $_SESSION['numTaskTypes'] = $line[1];

//  Read in tasks

    for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {

    //  Set task name
        $line = strstr(fgets($file), "\t");
        $line = trim($line);
        $_SESSION['taskNames'][$i] = $line;

    //  Set priority
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskPrty'][$i] = $data;

    //  Set arrival distribution type
        $line = fscanf($file, "%s %s");
        $_SESSION['taskArrDist'][$i] = $line[1];

    //  Set arrival distribution parameters
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskArrPms'][$i] = $data;

    //  Set service distribution type
        $line = fscanf($file, "%s %s");
        $_SESSION['taskSerDist'][$i] = $line[1];

    //  Set service distribution parameters
        list ($name, $data2[0], $data2[1]) = fscanf($file, "%s %f %f");
        $_SESSION['taskSerPms'][$i] = $data2;

    //  Set expiration distribution type
        $line = fscanf($file, "%s %s");
        $_SESSION['taskExpDist'][$i] = $line[1];

    //  Set expiration distribution parameters (lo + hi)
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsLo'][$i] = $data;

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsHi'][$i] = $data;

    //  Set affected by traffic
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskAffByTraff'][$i] = $data;

    //  Set associated operators
        $line = strstr(fgets($file), "\t");
        $data = array_map('intval', explode(" ", $line));
        $_SESSION['taskAssocOps'][$i] = $data;
    }

    fclose($file);

//  Set session

    $_SESSION['session_started'] = true;

    print_r($_SESSION);
?>

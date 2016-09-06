<?php
    session_start();
    // echo "<h1>Calling set_default_tasks...</h1>";

//  Set user's filepath

    $dir = sys_get_temp_dir() . "/" . uniqid();
    mkdir($dir);
    $dir .= "/";
    $_SESSION['dir'] = $dir;

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

//  Read in default values from file

    $file = fopen("static_data/default_params.txt","r") or die("Unable to open default parameter file!");

//  Set default output path

    $line = fscanf($file, "%s %s");
    // $_SESSION['outputPath']=$line[1];
    $_SESSION['outputPath'] = sys_get_temp_dir();
    // echo $_SESSION['outputPath'];
    // echo $line[1]."<br>";

//  Set default number of replications

    $line = fscanf($file, "%s %d");
    $_SESSION['numReps']=$line[1];
    // echo $line[1]."<br>";

//  Set default number of task types

    $line = fscanf($file, "%s %d");
    $_SESSION['numTaskTypes']=$line[1];
    // echo $line[1]."<br>";

//  Read in tasks

    for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {

    //  Set task name

        $line = strstr(fgets($file), "\t");
        $line = trim($line);
        $_SESSION['taskNames'][$i]=$line;
        // echo $line."<br>";

    //  Set priority

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskPrty'][$i]=$data;
        // echo $data[0]."<br>";

    //  Set arrival distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskArrDist'][$i]=$line[1];
        // echo $line[1]."<br>";

    //  Set arrival distribution parameters

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskArrPms'][$i]=$data;
        // echo $data[0]."<br>";

    //  Set service distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskSerDist'][$i]=$line[1];
        // echo $line[1]."<br>";

    //  Set service distribution parameters

        list ($name, $data2[0], $data2[1]) = fscanf($file, "%s %f %f");
        $_SESSION['taskSerPms'][$i]=$data2;
        // echo $data[0]."<br>";

    //  Set expiration distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskExpDist'][$i]=$line[1];
        // echo $line[1]."<br>";

    //  Set expiration distribution parameters (lo + hi)

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsLo'][$i]=$data;
        // echo $data[0]."<br>";

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsHi'][$i]=$data;
        // echo $data[0]."<br>";

    //  Set affected by traffic

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskAffByTraff'][$i]=$data;
        // echo $data[0]."<br>";

    //  Set associated operators

        $line = strstr(fgets($file), "\t");
        $data = array_map('intval', explode(" ", $line));
        $_SESSION['taskAssocOps'][$i]=$data;
        // echo $data[0]." ".$data[1]." ".$data[2]."<br>";
        // echo $_SESSION['taskAssocOps'][$i][0]." ".$_SESSION['taskAssocOps'][$i][1]." ".$_SESSION['taskAssocOps'][$i][2]."<br>";
    }

    // $line = fgets($file);s
    // $line = strstr($line, "\t");
    // $line = explode(" ", $line)
    // echo $line."<br>";
    // print_r(explode(" ", $line));
    // $_SESSION['test']=array();
    // $_SESSION['test'] =
    // $line = fscanf($file, "%s %d %d %d\n");

    // for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
    //     for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
    //         echo $_SESSION['taskAssocOps'][$i][$j]." ";
    //     }
    //     echo "<br>";
    // }

    fclose($file);
?>

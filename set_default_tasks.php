<?php
    session_start();

//  Create session variables

    echo "<h1>Calling set_default_tasks...</h1>";

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

    // $_SESSION['numReps']=100;
    // $_SESSION['outputPath']="/var/www/html/des-web/sessions";
    // $_SESSION['numTaskTypes']=9;

    require_once("header.php");
?>

<?php
    $file = fopen("sessions/default_params.txt","r") or die("Unable to open file!");

//  Set default output path

    $line = fscanf($file, "%s %s");
    $_SESSION['outputPath']=$line[1];
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
        $_SESSION['taskNames'][]=$line;
        // echo $line."<br>";

    //  Set priority

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskPrty'][]=$data;
        // echo $data[0]."<br>";

    //  Set arrival distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskArrDist'][]=$line[1];
        // echo $line[1]."<br>";

    //  Set arrival distribution parameters

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskArrPms'][]=$data;
        // echo $data[0]."<br>";

    //  Set service distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskSerDist'][]=$line[1];
        // echo $line[1]."<br>";

    //  Set service distribution parameters

        list ($name, $data[0], $data[1]) = fscanf($file, "%s %f %f");
        $_SESSION['taskSerPms'][]=$data;
        // echo $data[0]."<br>";

    //  Set expiration distribution type

        $line = fscanf($file, "%s %s");
        $_SESSION['taskExpDist'][]=$line[1];
        // echo $line[1]."<br>";

    //  Set expiration distribution parameters (lo + hi)

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsLo'][]=$data;
        // echo $data[0]."<br>";

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        $_SESSION['taskExpPmsHi'][]=$data;
        // echo $data[0]."<br>";

    //  Set affected by traffic

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        $_SESSION['taskAffByTraff'][]=$data;
        // echo $data[0]."<br>";

    //  Set associated operators

        $line = strstr(fgets($file), "\t");
        $data = array_map('intval', explode(" ", $line));
        $_SESSION['taskAssocOps'][]=$data;
        // echo $data[0]."<br>";
    }

        // $line = fgets($file);s
        // $line = strstr($line, "\t");
        // $line = explode(" ", $line)
        // echo $line."<br>";
        // print_r(explode(" ", $line));
        // $_SESSION['test']=array();
        // $_SESSION['test'] =
        // $line = fscanf($file, "%s %d %d %d\n");

    fclose($file);
?>

<?php
	require_once("footer.php");
?>

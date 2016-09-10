<?php
/****************************************************************************
*																			*
*	File:		set_session_vars.php  									    *
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This sets default session variables, which is defined by    *
*               the default_params.txt file				                    *
*																			*
****************************************************************************/

//  Set session id and directory

    $_SESSION['session_id'] = uniqid();
    $dir = sys_get_temp_dir() . '/' . $_SESSION['session_id'];
    mkdir($dir);
    $_SESSION['session_dir'] = $dir . '/';

//  Create session variables

    $_SESSION['parameters'] = array();
    $_SESSION['tasks'] = array();
    $_SESSION['assistants'] = array();
    // $_SESSION['taskNames'] = array();
    // $_SESSION['taskPrty'] = array();
    // $_SESSION['taskArrDist'] = array();
    // $_SESSION['taskArrPms'] = array();
    // $_SESSION['taskSerDist'] = array();
    // $_SESSION['taskSerPms'] = array();
    // $_SESSION['taskExpDist'] = array();
    // $_SESSION['taskExpPmsLo'] = array();
    // $_SESSION['taskExpPmsHi'] = array();
    // $_SESSION['taskAffByTraff'] = array();
    // $_SESSION['taskAssocOps'] = array();
    // $_SESSION['taskDescription'] = array();

//  Read in default values

    $file = fopen('static_data/default_params.txt', 'r') or die('Unable to open default parameter file!');

//  Set default number of replications

    $line = fscanf($file, "%s %d");
    $_SESSION['parameters']['reps'] = $line[1];

//  Set default number of task types

    $line = fscanf($file, "%s %d");
    $num_tasks = $line[1];

//  Read in tasks

    for ($i = 0; $i < $num_tasks; $i++) {

    //  Set task name
        $line = strstr(fgets($file), "\t");
        $line = trim($line);
        // $_SESSION['taskNames'][$i] = $line;
        $_SESSION['tasks'][$line] = array();
        $curr_task = $line;

    //  Set priority
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        // $_SESSION['taskPrty'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['priority'] = $data;

    //  Set arrival distribution type
        $line = fscanf($file, "%s %s");
        // $_SESSION['taskArrDist'][$i] = $line[1];
        $_SESSION['tasks'][$curr_task]['arrDist'] = $line[1];

    //  Set arrival distribution parameters
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        // $_SESSION['taskArrPms'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['arrPms'] = $data;

    //  Set service distribution type
        $line = fscanf($file, "%s %s");
        // $_SESSION['taskSerDist'][$i] = $line[1];
        $_SESSION['tasks'][$curr_task]['serDist'] = $line[1];

    //  Set service distribution parameters
        list ($name, $data2[0], $data2[1]) = fscanf($file, "%s %f %f");
        // $_SESSION['taskSerPms'][$i] = $data2;
        $_SESSION['tasks'][$curr_task]['serPms'] = $data2;

    //  Set expiration distribution type
        $line = fscanf($file, "%s %s");
        // $_SESSION['taskExpDist'][$i] = $line[1];
        $_SESSION['tasks'][$curr_task]['expDist'] = $line[1];

    //  Set expiration distribution parameters (lo + hi)
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        // $_SESSION['taskExpPmsLo'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['expPmsLo'] = $data;

        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %f %f %f");
        // $_SESSION['taskExpPmsHi'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['expPmsHi'] = $data;

    //  Set affected by traffic
        list ($name, $data[0], $data[1], $data[2]) = fscanf($file, "%s %d %d %d");
        // $_SESSION['taskAffByTraff'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['affByTraff'] = $data;

    //  Set associated operators
        $line = strstr(fgets($file), "\t");
        $data = array_map('intval', explode(" ", $line));
        // $_SESSION['taskAssocOps'][$i] = $data;
        $_SESSION['tasks'][$curr_task]['assocOps'] = $data;
    }

    fclose($file);

//  Set task descriptions

    $_SESSION['tasks']['Communicating']['description'] = "Filtering through the relevant information for the engineer operation and being able to communicate information that may impact the macro-level network of operations";
    $_SESSION['tasks']['Exception Handling']['description'] = "Attending to unexpected or unusual situations that must be handled in order to continue with the trip mission";
    $_SESSION['tasks']['Paperwork']['description'] = "Reviewing and recording operating conditions";
    $_SESSION['tasks']['Maintenance of Way Interactions']['description'] = "Maintaining situation awareness of other crews along track";
    $_SESSION['tasks']['Temporary Speed Restrictions']['description'] = "Recalling information issued on track bulletins and adapting to updates while train in motion";
    $_SESSION['tasks']['Signal Response Management']['description'] = "Attentive to direction from track signalling system and responsive with proper control system within safely allotted time";
    $_SESSION['tasks']['Monitoring Inside']['description'] = "Attention to information from displays and of engineer performance for safe operation";
    $_SESSION['tasks']['Monitoring Outside']['description'] = "Attention to warnings and environmental conditions that may affect operations";
    $_SESSION['tasks']['Planning Ahead']['description'] = "Key function. Manoeuvring locomotive control system for throttle, braking and other subtasks like horn-blowing before railroad crossing";

//  Set operators

    $_SESSION['assistants']['Engineer'] = array();
    $_SESSION['assistants']['Conductor'] = array();
    $_SESSION['assistants']['Positive Train Control'] = array();
    $_SESSION['assistants']['Cruise Control'] = array();
    // $_SESSION['operators']['Custom'] = array();

//  Set session

    $_SESSION['session_started'] = true;

    // print_r($_SESSION);

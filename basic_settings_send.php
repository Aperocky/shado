<?php
	session_start();

//	Store time

	$time = $_POST['num_hours'];
	$_SESSION['traffic_time'] = $time;
    $_SESSION['numHours'] = $time;

//  Store traffic levels

    $traffic['l'] = 0.5;
    $traffic['m'] = 1.0;
    $traffic['h'] = 2.0;
    $_SESSION['traffic_level'] = array();
    $_SESSION['traffic_levels'] = array();

	for($x = 0; $x < $time; $x++) {
		$_SESSION['traffic_level'][$x] = $traffic[$_POST[(string)$x]];
		$_SESSION['traffic_levels'][$x] = $_POST[(string)$x];
	}

//  Store assistants

    $_SESSION['assistants'] = array();
    $_SESSION['assistants'][0] = 0;

	for($i = 1; $i < 5; $i++) {
		if(isset($_POST["extra".$i])) {
            $_SESSION['assistants'][] = $i;
			$_SESSION['operator' . $i] = 1;
		} else {
			$_SESSION['operator' . $i] = -1;
		}
	}

	$_SESSION['operators']['Custom'] = $_POST['custom_name'];

    for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
        if($_POST["custom".$i] == 'y') {
            $_SESSION['taskAssocOps'][$i][] = 4;
        } else {
            if(($key = array_search(4, $_SESSION['taskAssocOps'][$i])) !== false) {
                unset($_SESSION['taskAssocOps'][$i][$key]);
            }
        }
    }

    if ($_POST['run_sim']) {
        header('Location: run_sim.php');
    } else if ($_POST['adv_settings']) {
        header('Location: adv_settings.php');
    } else {
        die("Could not determine action.");
    }
?>

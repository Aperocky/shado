<?php
	echo "Hello Branch!";
	echo '<br>';
	echo 'hi param = ' . $_GET['hi'];
	echo '<br><br><br><br>';

	// $handle = fopen('tmp1/hellofile', 'w') or die('failed!');


	$tmpfname = tempnam('/tmp/session1', 'hellofile3');
	echo "Temporary file created in: " . $tmpfname;
	$handle = fopen($tmpfname, 'w') or die('failed!');
	fwrite($handle, "writing to tempfile TED.");
	fclose($handle);


	echo '<br>';
	echo '<br>';

	if ($result = (tempnam('/tmp/aaa_dir','myPrefix'))) {
		echo 'success! ' . $result;
	} else {
		echo 'failure';
	}

	echo '<br>';
	echo '<br>';
	echo 'End of script reached!';

	phpinfo();

?>

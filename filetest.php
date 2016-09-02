<?php
	echo "Hello Branch!";


	// $handle = fopen('tmp1/hellofile', 'w') or die('failed!');


	$tmpfname = tempnam('/tmp/session1', 'hellofile3');
	echo "Temporary file created in: " . $tmpfname;
	$handle = fopen($tmpfname, 'w') or die('failed!');
	fwrite($handle, "writing to tempfile TED.");
	fclose($handle);

?>
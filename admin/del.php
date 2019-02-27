<?php
	require "functions.php";
	// get id from superglobal method $_GET put on var id
	$id = $_GET["id"];
	// call function del with passed args/params
	if(del($id) > 0) {
		// if success
		echo "
			<script>
				alert('success delete');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		// if failed
		echo "<p style='color: red;'>delete failed ...</p>";
		// print error msg
    echo mysqli_error($conn);
	}
?>
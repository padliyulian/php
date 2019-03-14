<?php
	require "functions.php";
	checkSession("user");
	
	$id = $_GET["id"];
	
	if(delUser($id) > 0) {
    echo "<p style='color: green;'>delete success ...</p>";
    echo "
        <script>
          setTimeout(function(){
            document.location.href = 'user.php';
          }, 2000);
        </script>
    ";
	} else {
		echo "<p style='color: red;'>delete failed ...</p>";
    echo mysqli_error($conn);
	}
?>
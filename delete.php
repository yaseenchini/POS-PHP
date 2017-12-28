<?php
	include("config.php");
 	if (isset($_GET['id'])){

        $query = "DELETE FROM add_student WHERE id=".$_GET['id']; 

       $re= mysqli_query($con1,$query);
       $af = mysqli_affected_rows($re);
       if($af < 0){
       		$msg = "fail";
       }
       	else{
       		$msg = 'Record deleted successfully...';
       	}
       	header("location:viewrecords.php?deletemassage=$msg");
    }
    mysqi_close($con1);
?>
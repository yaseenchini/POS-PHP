<?php 
	include("config.php");
		
        $sql = "UPDATE add_student SET `Student Name`='".$_POST['stdname']."', `Father Name`='".$_POST['fname']."', `Field`='".$_POST['field']."', `Phone`='".$_POST['stphone']."', `Address`='".$_POST['address']."' WHERE `id`=".$_POST['id'];
        $result= mysqli_query($con1,$sql);
        mysqli_close($con1);
        $af = mysqli_affected_rows($result);
       if($af < 0){
                $msg = "fail";
       }
        else{
                $msg = 'Record Updated Successfully...';
        }
        
        header("location:viewrecords.php?updatemessage=$msg");
        
        
?>
<?php
	$pID = $_GET['ID'];
	$dbc = mysqli_connect ("localhost","root","","wildlife");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

	$update = "delete from `payment` where `Payment_ID` = '$pID'";
	$chksql = mysqli_query($dbc,$update);
	if ($chksql)
	{
		Print '<script>alert("Record had been deleted");</script>';
		Print '<script>window.location.assign("FormPaymentList.php");</script>';
	}
	else
	{
		Print '<script>alert("Record feiled to be deleted");</script>';
		Print '<script>window.location.assign("FormPaymentList.php");</script>';
	}
?>
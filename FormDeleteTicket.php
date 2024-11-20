<?php
	$tID = $_GET['ID'];
	$dbc = mysqli_connect ("localhost","root","","wildlife");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

	$update = "delete from `ticket` where `Ticket_ID` = '$tID'";
	$chksql = mysqli_query($dbc,$update);
	if ($chksql)
	{
		Print '<script>alert("Record had been deleted");</script>';
		Print '<script>window.location.assign("FormTicketList.php");</script>';
	}
	else
	{
		Print '<script>alert("Record feiled to be deleted");</script>';
		Print '<script>window.location.assign("FormTicketList.php");</script>';
	}
?>
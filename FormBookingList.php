<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS2304A
-->
<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="List.css">
		<link rel="stylesheet" href="MyCss.css">
		<title></title>
		<style type="text/css">
			.btn1
			{
				background: linear-gradient(#311ECC,#5C52AC);
				color: white;
				font-size: 18px;
				text-transform: uppercase;
				text-decoration: none;
				letter-spacing: 0.1em;
				width: 100%;
				margin: auto;
				display: table;
			}
			.btn2
			{
				position: relative;
				background: linear-gradient(#D51D2D,#EA4D5C);
				color: white;
				font-size: 18px;
				text-transform: uppercase;
				text-decoration: none;
				letter-spacing: 0.1em;
				width: 100%;
				margin: auto;
				display: table;
			}
			.btn1:hover 
			{
				color: #000;
				background: linear-gradient(blue,lightblue);
				transition: 1.0s;
			}
			.btn2:hover 
			{
				color: #000;
				background: linear-gradient(darkred,#EE6E7A);
				transition: 1.0s;
			}
			.font
			{
				color: black;
				background-color: white;
			}

			.clear
			{
				background: #1759B8;
				color: white;
				border: none;
				font-size: 1.1em;
				max-width: 120px;
				font-weight: 500;
				cursor: pointer;
				padding: 14px 30px;
			}
		</style>
	</head>
	<body>
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="FormAddBooking.php" onclick="toggleMenu();">Add Booking</font></a></li>
				<li><a href="#" onclick="toggleMenu();"><font color="black">Booking List</font></a></li>
				<li><a href="FormRegisterTicket.php" onclick="toggleMenu();">Add Ticket Type</a></li>
				<li><a href="FormTicketList.php" onclick="toggleMenu();">Ticket List</font></a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Booking List Database</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>List Of <span class="typing"></span></h3>

					<form>
	                <table bgcolor="black" align="center">

	                    <tr>
	                    	<td bgcolor="grey" align="center" width="15%">BOOKING ID</td>
	                    	<td bgcolor="grey" align="center" width="15%">MEMBER ID</td>
	                    	<td bgcolor="grey" align="center" width="15%">TICKET ID</td>
	                        <td bgcolor="grey" align="center" width="20%">CHECK IN</td>
	                        <td bgcolor="grey" align="center" width="20%">CHECK OUT</td>
	                        <td bgcolor="grey" align="center" width="20%">STATUS</td>
	                        <td colspan="2" bgcolor="grey" align="center" width="4.8%">ACTION</td>
	                    </tr>
	                    
	                    <?php
	                        $dbc = mysqli_connect("localhost","root","","wildlife");

	                        if (mysqli_connect_errno())
	                        {
	                            echo "Failed to connect to MySQL : ".mysqli_connect_error();
	                        }

	                        $sql = "select * from booking";
	                        $result = mysqli_query($dbc, $sql);
	                        if ($result = mysqli_query($dbc, $sql)) 
	                        {
  
							    // Return the number of rows in result set
							    $rowcount = mysqli_num_rows( $result );
							      
							    // Display result
							    printf("Total Booking In Database : %d\n", $rowcount);
							}

	                        while($list = mysqli_fetch_assoc($result))
	                        {
	                        	Print '<tr>
	                        	<td class="font" align="center">'.$list['Booking_ID'].'</td>
	                        	<td class="font" align="center">'.$list['Member_ID'].'</td>
	                            <td class="font" align="center">'.$list['Ticket_ID'].'</td>
	                            <td class="font" align="center">'.$list['Check_In'].'</td>
	                            <td class="font" align="center">'.$list['Check_Out'].'</td>
	                            <td class="font" align="center">'.$list['Booking_Status'].'</td>
	                            <td colspan="2">
	                                <a class="btn1" href="FormUpdateBooking.php?ID='.$list['Booking_ID'].'">Update</a>
	                                <a class="btn2" href="FormDeleteBooking.php?ID='.$list['Booking_ID'].'">Delete</a>
	                            </td>';
	                        }
	                    ?>

	                </table>
	        	</form>
	        	<br><div class="row100">
						<a href="FormAddBooking.php" class="clear" value="Add" title="Add Booking">Add Booking</a>
						<a href="FormRegisterTicket.php" class="clear" value="Add" title="Add More Ticket Type">Add Ticket Type</a>
						<a href="FormPayment.php" class="clear" value="Payment" title="Payment">Payment</a>
					</div>

				</div>
			</div>
		</div>

		<script>
		//JavaScript Navigation kalau page yang panjang//
			window.addEventListener('scroll',function(){
				var header = document.querySelector('header');
				header.classList.toggle('sticky',window.scrollY > 0);
			});

		//JavaScript Untuk Resolution//
			function toggleMenu(){
				/**Used For Responsive Website Phone**/
				var menuToggle = document.querySelector('.toggle');
				var menu = document.querySelector('.menu');
				menuToggle.classList.toggle('active');
				menu.classList.toggle('active');
			}

		//JavaScript Auto Typing bagi class bernama typing//
			var typed = new Typed(".typing", {
				/**Used For Auto Typing In Home Page**/
				strings: ["Booking ID", "Member ID", "Ticket ID","Check In Date","Check Out Date", "Booking_Status"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});


		//JavaScript Untuk Tukar Warna Background, Boleh Guna Untuk Font,Image Dan lain lain juga//
			var background = ["linear-gradient(90deg, #0e3959 0%, #0e3959 30%, #03a9f5 30%,#03a9f5 100%)","linear-gradient(90deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","linear-gradient(90deg, #0e3959 0%, #f368e0 50%, black 50%, lightblue 100%)","#222f3e","#f368e0","#ee5253","#0abde3","#10ac84","#222f3e","#5f27cd","orange","grey"]; 
		    	/**Used To Change Font Colour**/
		        var i = 0; 
		        document.querySelector("button").addEventListener("click",function(){ 
		        i = i < background.length ? ++i : 0; 
		        document.querySelector("body").style.background = background[i] 
	        }) 

		</script>
	</body>
</html>
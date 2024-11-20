<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
-->
<?php
	session_start();
	$dbc=mysqli_connect("localhost","root","","wildlife");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(!empty($_POST['tID']) && !empty($_POST['tType'])  && !empty($_POST['tPrice']))
		{
			$tID = $_POST['tID'];
			$tType = $_POST['tType'];
			$tPrice = $_POST['tPrice'];

			$sql="INSERT INTO `ticket`(`Ticket_ID`, `Ticket_Type`, `Ticket_Price`) values ('$tID','$tType','$tPrice')";
			$result= mysqli_query($dbc,$sql);

			if ($result)
			{
				print '<script>alert("Record Had Been Added");</script>';
				print '<script>window.location.assign("FormTicketList.php");</script>';
			}
			else
			{
				print '<script>alert("Record Not Been Added");</script>';
				print '<script>window.location.assign("FormRegisterTicket.php");</script>';
			}
		}
		else
		{
			print '<script>alert("Please Enter All Data");</script>';
			header("location:FormRegisterTicket.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="form.css">
		<link rel="stylesheet" href="MyCss.css">
		<title></title>
	</head>
	<body>
		<style type="text/css">
			.contactUs
			{
				background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(menu.png);
				background-size: cover;
				background-position: center;
			}
			.box
			{
				left: 15%;
			}
		</style>
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="FormAddBooking.php" onclick="toggleMenu();">Add Booking</font></a></li>
				<li><a href="FormBookingList.php" onclick="toggleMenu();">Booking List</font></a></li>
				<li><a href="FormRegisterTicket.php" onclick="toggleMenu();"><font color="cloudflare">Add Ticket Type</font></a></li>
				<li><a href="FormTicketList.php" onclick="toggleMenu();">Ticket List</a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Book Wildlife Zoo Ticket System</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>Register <span class="typing"></span></h3>
					<form action="" method="POST">
						<div class="formBox">
							<div class="row100">
								<div class="inputBox">
									<span>Ticket ID</span>
									<input type="text" name="tID" required placeholder="Enter Ticket ID" autocomplete="off" minlength="5" maxlength="5" title="Must 5 characters">
								</div>
							</div>
							<div class="row50">
								<div class="inputBox">
									<span>Ticket Type</span>
									<input type="text" name="tType" placeholder="Enter Ticket Type" autocomplete="off" title="Child/Senior Citizen/Adult"required>
								</div>
								<div class="inputBox">
									<span>Ticket Price</span>
									<input type="text" name="tPrice" placeholder="Enter Ticket Price" autocomplete="off" required>
								</div>
							</div>
							<div class="row100">
								<div class="inputBox">
									<input type="submit" value="Save">
								</div>
							</div>
						</div>
					</form>


				<!-- Contact Form -->
				<div class="contact info">
					<h3>Wildlife Info</h3>
					<div class="infoBox">
						<div>
							<p>Zoo Negara, Hulu Kelang, 68000 Ampang, Selangor Darul Ehsan. <br>MALAYSIA</p><br>
							<h3>Website Page</h3>
							<button>Change</button>
						</div>
						<label>How To Use? <a href="StoryBoard.pdf" class="label">Manual </a></label><p>
						<!-- Map Form -->
						<div class="contact map">
							<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD1VnYC6EugmolDY9RjsZ77TeXstyj0288&q=National Zoo of Malaysia&center=3.2101905,101.7566088&zoom=17" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			/**Used For Navigation Animate**/
			window.addEventListener('scroll',function(){
				var header = document.querySelector('header');
				header.classList.toggle('sticky',window.scrollY > 0);
			});

			function toggleMenu(){
				/**Used For Responsive Website Phone**/
				var menuToggle = document.querySelector('.toggle');
				var menu = document.querySelector('.menu');
				menuToggle.classList.toggle('active');
				menu.classList.toggle('active');
			}

			var typed = new Typed(".typing", {
				/**Used For Auto Typing In Home Page**/
				strings: ["Ticket ID","Ticket Type","Ticket Price"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>
</html>
<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS2304A
-->
<?php
	session_start();
	$dbc=mysqli_connect("localhost","root","","wildlife");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        if (!empty($_POST['bID']) && !empty($_POST['mID']) && !empty($_POST['tID']) && !empty($_POST['cIn']) && !empty($_POST['cOut']) && !empty($_POST['bStatus'])) {
            $bID = $_POST['bID'];
            $mID = $_POST['mID'];
            $tID = $_POST['tID'];
            $cIn = $_POST['cIn'];
            $cOut = $_POST['cOut'];
            $bStatus = $_POST['bStatus'];

            $sql = "INSERT INTO `booking` (`Booking_ID`, `Member_ID`, `Ticket_ID`, `Check_In`, `Check_Out`, `Booking_Status`) VALUES ('$bID', '$mID', '$tID', '$cIn', '$cOut', '$bStatus')";
            $result = mysqli_query($dbc, $sql);

            if ($result) {
                echo '<script>alert("Record has been added.");</script>';
                echo '<script>window.location.assign("FormBookingList.php");</script>';
            } else {
                echo '<script>alert("Record could not be added.");</script>';
                echo '<script>window.location.assign("FormAddBooking.php");</script>';
            }
        } else {
            echo '<script>alert("Please enter all data.");</script>';
            header("location:FormAddBooking.php");
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
				<li><a href="FormAddBooking.php" onclick="toggleMenu();"><font color="cloudflare">Add Booking</font></a></li>
				<li><a href="FormBookingList.php" onclick="toggleMenu();">Booking List</font></a></li>
				<li><a href="FormRegisterTicket.php" onclick="toggleMenu();">Add Ticket Type</a></li>
				<li><a href="FormTicketList.php" onclick="toggleMenu();">Ticket List</font></a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Booking System</h2>
			</div>
			<div class="box">
				<!-- Contact Form -->
				<div class="contact form">
				    <h3>Register <span class="typing"></span></h3>
				    <form action="" method="POST">
				        <div class="formBox">
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Booking ID</span>
				                    <input type="text" name="bID" required placeholder="Enter Booking ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				                <div class="inputBox">
				                    <span>Member ID</span>
				                    <input type="text" name="mID" required placeholder="Enter Member ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				                <div class="inputBox">
				                    <span>Ticket ID</span>
				                    <input type="text" name="tID" required placeholder="Enter Ticket ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Check In</span>
				                    <input type="date" name="cIn" placeholder="Enter Check In Date" autocomplete="off" title="Date Check-In" required>
				                </div>
				                <div class="inputBox">
				                    <span>Check Out</span>
				                    <input type="date" name="cOut" placeholder="Enter Check Out Date" autocomplete="off" title="Date Check-Out" required>
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Booking Status</span>
				                    <select name="bStatus" class="option" placeholder="Booking" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
				                        <option name="bStatus" value="Paid">Paid</option>
				                        <option name="bStatus" value="Unpaid">Unpaid</option>
				                    </select>
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
				strings: ["Booking ID", "Member ID", "Ticket ID","Check In","Check Out","Booking Status"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>
</html>
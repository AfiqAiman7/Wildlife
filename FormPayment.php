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

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        if (!empty($_POST['pID']) && !empty($_POST['pMethod']) && !empty($_POST['Total']) && !empty($_POST['iNo']) && !empty($_POST['pDate']) && !empty($_POST['bID'])) {

            $pID = $_POST['pID'];
            $pMethod = $_POST['pMethod'];
            $Total = $_POST['Total'];
            $iNo = $_POST['iNo'];
            $pDate = $_POST['pDate'];
            $bID = $_POST['bID'];

            $sql = "INSERT INTO `payment` (`Payment_ID`, `Payment_Method`, `Total`, `Invoice_No`, `Payment_Date`, `Booking_ID`) VALUES ('$pID', '$pMethod', '$Total', '$iNo', '$pDate', '$bID')";
            $result = mysqli_query($dbc, $sql);

            if ($result) {
                echo '<script>alert("Record has been added.");</script>';
                echo '<script>window.location.assign("FormPaymentList.php");</script>';
            } else {
                echo '<script>alert("Record could not be added.");</script>';
                echo '<script>window.location.assign("FormPayment.php");</script>';
            }
        } else {
            echo '<script>alert("Please enter all data.");</script>';
            header("location:FormPayment.php");
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
				<li><a href="FormPaymentList.php" onclick="toggleMenu();">Payment List</font></a></li>
				<li><a href="FormPayment.php" onclick="toggleMenu();"><font color="cloudflare">Payment</font></a></li>
				<li><a href="FormBookingList.php" onclick="toggleMenu();">Back</a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Payment System</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
				    <h3>Register <span class="typing"></span></h3>
				    <form action="" method="POST">
				        <div class="formBox">
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Payment ID</span>
				                    <input type="text" name="pID" required placeholder="Enter Payment ID" autocomplete="off" minlength="4" maxlength="4"title="Must be 4 characters">
				                </div>
				                <div class="inputBox">
				                    <span>Payment Method</span>
				                    <select name="pMethod" class="option" placeholder="Payment Method" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
				                        <option name="pMethod" value="cash">cash</option>
				                        <option name="pMethod" value="online banking">online banking</option>
				                        <option name="pMethod" value="card">card</option>
				                    </select>
				                </div>
				                <div class="inputBox">
				                    <span>Total</span>
				                    <input type="text" name="Total" placeholder="Enter Total Payment" autocomplete="off" title="Total Price" required>
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Invoice No</span>
				                    <input type="text" name="iNo" placeholder="Enter Invoice No" autocomplete="off"minlength="5" maxlength="5" title="Enter Invoice No" required>
				                </div>
				                <div class="inputBox">
				                    <span>Payment Date</span>
				                    <input type="date" name="pDate" placeholder="Enter Payment Date" autocomplete="off" title="Payment Date" required>
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Booking ID</span>
				                    <input type="text" name="bID" required placeholder="Enter Booking ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
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
				strings: ["Payment ID", "Payment Method", "Total","Invoice No","Payment Date","Booking ID"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>
</html>
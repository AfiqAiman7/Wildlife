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
	$pID = $_GET['ID'];
	$pMethod = $_POST['pMethod'];
	$Total = $_POST['Total'];
	$iNo = $_POST['iNo'];
	$pDate = $_POST['pDate'];
	$bID = $_POST['bID'];

	$update = "update payment set `Payment_ID` = '$pID' , `Payment_Method` = '$pMethod', `Total` = '$Total', `Invoice_No` = '$iNo', `Payment_Date` = '$pDate', `Booking_ID` = '$bID' where `Payment_ID` = '$pID'";

	$chksql = mysqli_query($dbc,$update);

	if ($chksql) {
		echo '<script>alert("Record has been added.");</script>';
		echo '<script>window.location.assign("FormPaymentList.php");</script>';
	} else {
		echo '<script>alert("Record could not be added.");</script>';
		echo '<script>window.location.assign("FormUpdatePayment.php");</script>';
	}
}
?>

<?php
$pID = $_GET['ID'];

$dbc = mysqli_connect ("localhost","root","","wildlife");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

$find = "select * from payment where `Payment_ID` = '$pID'";
$result = mysqli_query($dbc,$find);
$row = mysqli_fetch_assoc($result);
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
	<header>
		<!--Navigation//-->
		<a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
		<div class="toggle" onclick="toggleMenu();"></div>
		<ul class="menu">
			<li><a href="#" onclick="toggleMenu();"><font color="black">Update Ticket Info</font></a></li>
			<li><a href="FormPaymentList.php" onclick="toggleMenu();">Back To Previous Page</a></li>
		</ul>
	</header>

	<div class="contactUs">
		<div class="title">
			<h2>Update Payment System</h2>
		</div>
		<div class="box">

			<!-- Register Form -->
			<div class="contact form">
				<h3>Update <span class="typing"></span></h3>
				<form action="" method="POST">
					<div class="formBox">
						<div class="row50">
							<div class="inputBox">
								<span>Payment ID</span>
								<input type="text" name="pID" value="<?=$row['Payment_ID'];?>" autocomplete="off" disabled>
							</div>
							<div class="inputBox">
								<span>Payment Method</span>
								<select name="pMethod" class="option" placeholder="Payment Method" value="<?=$row['Payment_Method'];?>" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
									<option name="pMethod" value="cash" <?=($row['Payment_Method'] == 'cash') ? 'selected' : ''?>>cash</option>
									<option name="pMethod" value="online banking" <?=($row['Payment_Method'] == 'online banking') ? 'selected' : ''?>>online banking</option>
									<option name="pMethod" value="card" <?=($row['Payment_Method'] == 'card') ? 'selected' : ''?>>card</option>
								</select>
							</div>
							<div class="inputBox">
								<span>Total</span>
								<input type="text" name="Total" placeholder="Enter Total Payment" value="<?=$row['Total'];?>" autocomplete="off" title="Total Price" required>
							</div>
						</div>
						<div class="row50">
							<div class="inputBox">
								<span>Invoice No</span>
								<input type="text" name="iNo" placeholder="Enter Invoice No" value="<?=$row['Invoice_No'];?>" autocomplete="off"minlength="5" maxlength="5" title="Enter Invoice No" required>
							</div>
							<div class="inputBox">
								<span>Payment Date</span>
								<input type="date" name="pDate" placeholder="Enter Payment Date" value="<?=$row['Payment_Date'];?>" autocomplete="off" title="Payment Date" required>
							</div>
						</div>
						<div class="row50">
							<div class="inputBox">
								<span>Booking ID</span>
								<input type="text" name="bID" value="<?=$row['Booking_ID'];?>" autocomplete="off" disabled>
								<input type="hidden" name="bID" value="<?=$row['Booking_ID'];?>">
							</div>
						</div>
						<div class="row100">
							<div class="inputBox">
								<input type="submit" value="Save">
							</div>
						</div>
					</div>
				</form>
			</div>

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
                </div>
            </div>

            	<!-- Map Form -->
            	<div class="contact map">
                	<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD1VnYC6EugmolDY9RjsZ77TeXstyj0288&q=National Zoo of Malaysia&center=3.2101905,101.7566088&zoom=17" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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


				var background = ["linear-gradient(90deg, #0e3959 0%, #0e3959 30%, #03a9f5 30%,#03a9f5 100%)","linear-gradient(-30deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","linear-gradient(30deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","#222f3e","#f368e0","#ee5253","#0abde3","#10ac84","#222f3e","#5f27cd","orange","grey"]; 
                /**Used To Change Font Colour**/
				var i = 0; 
				document.querySelector("button").addEventListener("click",function(){ 
					i = i < background.length ? ++i : 0; 
					document.querySelector("body").style.background = background[i] 
				}) 
		</script>
	</body>
</html>
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

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(!empty($_POST['ID']) && !empty($_POST['Name'])  && !empty($_POST['Birth'])  && !empty($_POST['Gender'])  && !empty($_POST['Phone'])  && !empty($_POST['Address']))
		{
			$ID = $_POST['ID'];
			$Name = $_POST['Name'];
			$Birth = $_POST['Birth'];
			$Gender = $_POST['Gender'];
			$Phone = $_POST['Phone'];
			$Address = $_POST['Address'];

			$sql="INSERT INTO `member`(`Member_ID`, `Member_Name`, `Member_Birth`, `Member_Gender`, `Member_PhoneNum`, `Member_Address`)values ('$ID','$Name','$Birth','$Gender','$Phone','$Address')";
			$result= mysqli_query($dbc,$sql);

			if ($result)
			{
				print '<script>alert("Record Had Been Added");</script>';
				$ID = $_POST['ID'];
				print '<script>window.location.assign("FormMemberList.php");</script>';
			}
			else
			{
				print '<script>alert("Record Had Not Been Added");</script>';
				print '<script>window.location.assign("FormMember.php");</script>';
			}
		}
		else
		{
			print '<script>alert("Please Enter All Data");</script>';
			header("location:FormMember.php");
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


			.next
			{
				background: #1759B8;;
				color: white;
				border: none;
				font-size: 1.1em;
				max-width: 120px;
				font-weight: 500;
				cursor: pointer;
				padding: 14px 30px;
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
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="#" onclick="toggleMenu();"><font color="cloudflare">Add Member</font></a></li>
				<li><a href="FormMemberList.php" onclick="toggleMenu();">Member List</a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Member Wildlife System</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>Register <span class="typing"></span></h3>
					<form action="#" method="POST">
						<div class="formBox">
							<div class="row50">
								<div class="inputBox">
									<span>Member Name</span>
									<input type="text" name="Name" placeholder="Enter Member Name" autocomplete="off" required>
								</div>
								<div class="row25">
									<div class="inputBox">
										<span>Member ID</span>
										<input type="text" name="ID" placeholder="Enter Member ID" autocomplete="off" required minlength="4" maxlength="8" title="Minimum 4 to 8 Characters">
									</div>
									<div class="inputBox">
										<span>Member Birth</span>
										<input type="date" name="Birth" id="bday" value="MM/DD/YYY" min="1900-01-01" max="2022-07-02" required>
									</div>
								</div>
							</div>

							<div class="row50">
								<div class="inputBox">
									<span>Member Gender</span>
									<input type="text" name="Gender" placeholder="Enter Member Gender" autocomplete="off" required title="M OR F ONLY">
								</div>
								<div class="inputBox">
									<span>Phone Number</span>
									<input type="text" name="Phone" placeholder="Enter Phone Number" autocomplete="off" minlength="10" maxlength="12" required title="Minimum 10 to 12 Number" pattern="[0-9]{10,12}">
								</div>
							</div>

							<div class="row100">
								<div class="inputBox">
									<span>Member Address</span>
									<input type="text" placeholder="Enter Member Address" name="Address" autocomplete="off" required></input>
								</div>
							</div>

							<div class="row100">
								<input type="reset" class="clear" value="Reset" title="Reset Form">
								<input type="submit" class="next" value="Save" title="Proceed Saving">
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
				strings: ["Name","Gender","Birth","Phone Number","Address"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});


			// var color = ["#222f3e","#f368e0","#ee5253","#0abde3","#10ac84","#222f3e","#5f27cd","orange","grey"]; 
		    // 	/**Used To Change Font Colour**/
		    //     var i = 0; 
		    //     document.querySelector("button").addEventListener("click",function(){ 
		    //     i = i < color.length ? ++i : 0; 
		    //     document.querySelector("h2").style.color = color[i] 
	        // }) 

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
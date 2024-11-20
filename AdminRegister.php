<!--
MUHAMAD AFIQ AIMAN BIN RUSLAN
CDCS230B
-->
<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
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
		.option
		{
			padding: 12px;
			cursor: pointer;
			color: cornflowerblue;
		}
	</style>
<header>
		<!--Navigation//-->
		<a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
		<div class="toggle" onclick="toggleMenu();"></div>
		<ul class="menu">
            <li><a href="stafflistform(2).php" onclick="toggleMenu();">Staff List</a></li>
			<li><a href="#" onclick="toggleMenu();"><font color="black">Add Staff</font></a></li>
			
			<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
		</ul>
</header>

<div class="contactUs">
	<div class="title">
		<h2>Staff Register Form</h2>
	</div>
	<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>Register <span class="typing"></span></h3>
					<form method="POST" action="registerstaff.php">
						<div class="formBox">

							<div class="row100">
								<div class="inputBox">
									<span>Staff Name</span>
									<input type="text" name="Name" placeholder="Enter Staff Name" autocomplete="off" required>
								</div>
							</div>

							<div class="row50">
								<div class="inputBox">
									<span>Password </span>
										<input type="text" name="password" placeholder="Enter Staff Password" autocomplete="off" required>
								</div>
								<div class="inputBox">
									<span>Building ID</span>
									<input type="text" name="Building_ID" placeholder="Enter Building ID" autocomplete="off" required minlength="5" maxlength="5" title="Must Enter 5 Characters">
								</div>
							</div>

							<div class="row50">
                <div class="inputBox">
									<span>Phone Number</span>
									<input type="text" name="Phone" placeholder="Enter Phone Number" autocomplete="off" minlength="10" maxlength="12" required title="Minimum 10 to 12 Number" pattern="[0-9]{10,12}">
								</div>

								<div class="row25">
									<div class="inputBox">
										<span>Staff ID</span>
										<input type="text" name="ID" placeholder="Enter Staff ID" autocomplete="off" required minlength="4" maxlength="8" title="Minimum 4 to 8 Characters">
									</div>

										<div class="inputBox">
											<span>Admin ID</span>
											<input type="text" name="admin_ID" value="123" autocomplete="off" disabled>
										</div>

								</div>
							</div>
							<div class="inputBox">
									<span>Job Title</span>
									<select name="Job_Title" class="option" placeholder="Choose Job Title" required>
                   	<option name="Job_Title" value="Guided Staff">Guided Staff
                 		<option name="Job_Title" value="Maintenance Staff">Maintenance Staff
                 	</select>
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
				strings: ["ID","Name", "Password", "Phone Number","Building ID",],
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
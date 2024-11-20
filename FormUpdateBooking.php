<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS2304A
-->
<?php
    session_start();
    $dbc = mysqli_connect("localhost", "root", "", "wildlife");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $bID = $_GET['ID'];
	    $mID = $_POST['mID'];
	    $tID = $_POST['tID'];
	    $cIn = $_POST['cIn'];
	    $cOut = $_POST['cOut'];
	    $bStatus = $_POST['bStatus'];

	    $update = "update booking set `Booking_ID`='$bID', `Member_ID`='$mID', `Ticket_ID`='$tID', `Check_In`='$cIn', `Check_Out`='$cOut', `Booking_Status`='$bStatus' where `Booking_ID`='$bID'";

	    $chksql = mysqli_query($dbc, $update);
	    if ($chksql) {
	        Print '<script>alert("Record has been updated.");</script>';
	        Print '<script>window.location.assign("FormBookingList.php");</script>';
	    } else {
	        Print '<script>alert("Record failed to be updated.");</script>';
	        Print '<script>window.location.assign("FormUpdateBooking.php");</script>';
	    }
	}
?>
<?php
    $bID = $_GET['ID'];

    $dbc = mysqli_connect ("localhost","root","","wildlife");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

    $find = "select * from booking where `Booking_ID` = '$bID'";
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
                <li><a href="#" onclick="toggleMenu();"><font color="black">Update Booking</font></a></li>
                <li><a href="FormBookingList.php" onclick="toggleMenu();">Back To Previous Page</a></li>
            </ul>
        </header>

        <div class="contactUs">
            <div class="title">
                <h2>Booking Database</h2>
            </div>
            <div class="box">
                <!-- Register Form -->
                <div class="contact form">
                    <h3>Update <span class="typing"></span></h3>

                    <form name="update booking" method="POST" action="#">
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Booking ID</span>
                                    <input type="text" name="bID" value="<?=$row['Booking_ID'];?>" autocomplete="off" disabled>
                                </div>
                                <div class="inputBox">
                                    <span>Member ID</span>
                                    <input type="text" name="mID" value="<?=$row['Member_ID'];?>" autocomplete="off" disabled>
                                    <input type="hidden" name="mID" value="<?=$row['Member_ID'];?>">
                                </div>
                                <div class="inputBox">
                                    <span>Ticket ID</span>
                                    <input type="text" name="tID" value="<?=$row['Ticket_ID'];?>" autocomplete="off" placeholder="Enter New Ticket ID" disabled>
                                </div>  
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Check In</span>
                                    <input type="date" name="cIn" value="<?=$row['Check_In'];?>" placeholder="Enter Check In">
                                </div>
                                <div class="inputBox">
                                    <span>Check Out</span>
                                    <input type="date" name="cOut" value="<?=$row['Check_Out'];?>" placeholder="Enter Check Out">
                                 </div>
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Booking Status</span>
                                    <select name="bStatus" class="option" placeholder="Booking" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
                                        <option name="bStatus" value="Paid" <?=($row['Booking_Status'] == 'Paid') ? 'selected' : ''?>>Paid</option>
                                        <option name="bStatus" value="Unpaid" <?=($row['Booking_Status'] == 'Unpaid') ? 'selected' : ''?>>Unpaid</option>
                                </select>
                                </div>
                            </div>
                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="Update" onClick="return confirm('Are You Sure?')">
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
                strings: ["Booking_ID", "Member_ID", "Ticket ID","Check In","Check Out", "Booking Status"],
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

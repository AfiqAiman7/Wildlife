<!--
MUHAMAD AFIQ AIMAN BIN RUSLAN
CDCS230B
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
    .btn1 {
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
    .btn2 {
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
    .btn1:hover {
      color: #000;
      background: linear-gradient(blue,lightblue);
      transition: 1.0s;
    }
    .btn2:hover {
      color: #000;
      background: linear-gradient(darkred,#EE6E7A);
      transition: 1.0s;
    }
    .font {
      color: black;
      background-color: white;
    }

    .next {
      background: cornflowerblue;
      color: white;
      border: none;
      font-size: 1.1em;
      max-width: 120px;
      font-weight: 500;
      cursor: pointer;
      padding: 14px 30px;
    }
    .clear {
      background: #1759B8;
      color: white;
      border: none;
      font-size: 1.1em;
      max-width: 120px;
      font-weight: 500;
      cursor: pointer;
      padding: 14px 30px;
    }
    .find {
      background: blue;
      color: white;
      border: none;
      font-size: 1.1em;
      max-width: 120px;
      font-weight: 500;
      cursor: pointer;
      padding: 14px 30px;
    }
    /* For tablets like iPads */
    @media only screen and (min-width: 768px) and (max-width: 1024px) {
      /* Update styles for tablets here */
      body {
        padding: 60px 50px;
      }
      .contactUs {
        padding: 60px 50px;
      }
      /* Adjust other styles as needed */
    }

/* For desktops */
@media only screen and (min-width: 1025px) {
  /* Update styles for desktops here */
  body {
    padding: 90px 100px;
  }
  .contactUs {
    padding: 90px 100px;
  }
  /* Adjust other styles as needed */
}
</style>
</head>
<body>
  <header>
    <!--Navigation//-->
    <a href="#" class="logo">WILDLIFE ZOO TICKET SYSTEM</a>
    <div class="toggle" onclick="toggleMenu();"></div>
    <ul class="menu">
      <li><a href="#" onclick="toggleMenu();"><font color="black">Staff List</a></li>
        <li><a href="AdminRegister.php" onclick="toggleMenu();">Add Staff</font></a></li>

        <li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
      </ul>
    </header>

    <div class="contactUs">
      <div class="title">
        <h2>Staff List Database</h2>
      </div>
      <div class="box">
        <!-- Register Form -->
        <div class="contact form">
          <h3>List Of <span class="typing"></span></h3>

          <form>
            <table bgcolor="black" align="center">
              <tr>
                <td bgcolor="grey" align="center" width="9%">STAFF ID</td>
                <td bgcolor="grey" align="center" width="17%">STAFF NAME</td>
                <td bgcolor="grey" align="center" width="10%">PHONE NUMBER</td>
                <td bgcolor="grey" align="center" width="20%">BUILDING ID</td>
                <td bgcolor="grey" align="center">STAFF PASSWORD</td>
                <td bgcolor="grey" align="center">ADMIN ID</td>
                <td bgcolor="grey" align="center">JOB TITLE</td>
                <td colspan="2" bgcolor="grey" align="center">ACTION</td>
              </tr>

              <?php
              $dbc = mysqli_connect("localhost","root","","wildlife");

              if (mysqli_connect_errno())
              {
                echo "Failed to connect to MySQL : ".mysqli_connect_error();
              }
              $sql = "select * from staff";
              $result = mysqli_query($dbc, $sql);
              if ($result = mysqli_query($dbc, $sql)) 
              {

                  // Return the number of rows in result set
                $rowcount = mysqli_num_rows( $result );
              }

              while($list = mysqli_fetch_assoc($result))
              {
                Print '<tr>
                <td class="font" align="center">'.$list['Staff_ID'].'</td>
                <td class="font">'.$list['Staff_Name'].'</td>
                <td class="font">'.$list['Staff_PhoneNum'].'</td>
                <td class="font">'.$list['Building_ID'].'</td>
                <td class="font">'.$list['Staff_Pass'].'</td>
                <td class="font" align="center">'.$list['admin_ID'].'</td>
                <td class="font">'.$list['Job_Title'].'</td>
                <td colspan="2">
                <a class="btn1" href="frmUpdateStaff.php?fStaff_ID='.$list['Staff_ID'].'">Update</a>
                <a class="btn2" href="delStaff.php?sid='.$list['Staff_ID'].'">Delete</a>
                </td>
                </tr>';
              }
              ?>

            </table>
          </form>
          <br>
          <div class="row100">
            <a href="AdminRegister.php" class="clear" value="Add" title="Add More Staff">Add</a>
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
        var menuToggle = document.querySelector('.toggle');
        var menu = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
        menu.classList.toggle('active');
      }

    //JavaScript Auto Typing bagi class bernama typing//
      var typed = new Typed(".typing", {
        strings: ["ID","Name","Phone Number","Building_ID","Password","Job_Title"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
      });


    //JavaScript Untuk Tukar Warna Background, Boleh Guna Untuk Font,Image Dan lain lain juga//
      var background = ["linear-gradient(90deg, #0e3959 0%, #0e3959 30%, #03a9f5 30%,#03a9f5 100%)","linear-gradient(90deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","linear-gradient(90deg, #0e3959 0%, #f368e0 50%, black 50%, lightblue 100%)","#222f3e","#f368e0","#ee5253","#0abde3","#10ac84","#222f3e","#5f27cd","orange","grey"]; 
      /Used To Change Font Colour/
      var i = 0; 
      document.querySelector("button").addEventListener("click",function(){ 
        i = i < background.length ? ++i : 0; 
        document.querySelector("body").style.background = background[i] 
      }) 

    </script>
  </body>
  </html>
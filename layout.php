<?php
session_start();
include("db_connect.php");
require "vendor/autoload.php";
if(!isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){ header('location:index.php');
      exit;}

$fromm=$_POST['startpoint'];
$too=$_POST['endpoint'];
$startsat=$_POST['receiptrange'];


$_SESSION['from']=$fromm;
$_SESSION['to']=$too;
$_SESSION['receiptrange']=$startsat;

$from=$_SESSION['from'];
$to=$_SESSION['to'];
$startsat=$_SESSION['receiptrange'];

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>card</title>
<style>
  body{
		  	background:white;
		  }
#bg {

  height: 450px;

 	float: left; 
 		
}

#id {
  width:200px;
  height:300px;
  position:absolute;
  opacity: 0.999;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #FFFFFF;
		  	border-radius: 2%;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('images/back.JPG');   /*if you want to change the background image replace logo.png*/
  background-repeat:repeat-x;
  background-size: 197px 304px;
  
  z-index: -1;
  text-align:center;
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:250px;
		  	height:500px;
		  	background: #FFFFFF;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:270px;
		  	border-radius:2%;

		  	
		  }

p.ex1 {
  text-align: right;
    margin: 20px;
    font-size: 9px;
}
img.rounded-corners {
  border-radius: 10px;
}
#boxContainer {
   
    margin: 0px auto 14px auto;
   
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto;
  grid-gap: 20px;
  row-gap: 1px;
}

.grid-container > div {
 margin-right: 120px;
 height: 310px;
}

.item1 {
  grid-row: 1 / 2;
}

    p.ex1 {
  text-align: right;
    margin: 20px;
    font-size: 8px;
}
p.para {
    font-size: 7px;
    font-weight: bold;
}
.id-card {
  width: 4.5in; /* Adjust width as needed */
  height: 5.5in; /* Adjust height as needed */
  background-color: #fff;
  border: 1px solid #000;
  padding: 1cm;
}

.header {
  text-align: center;
  margin-bottom: 1cm;
}

.header img {
  width: 77px;
  height: 93px;
}

.header h1 {
  font-size: 20px;
  font-weight: bold;
}

.student-info {
  margin-top: 1cm;
}

.student-info p {
  margin-bottom: 5px;
}

.instructions {
  margin-top: 1cm;
}

.instructions ul {
  list-style-type: none;
  padding: 0;
}

.footer {
  text-align: center;
  margin-top: 1cm;
}
.label-container {
text-align-last: justify;
    width: fit-content;
 margin: 8px;
}

.label-row {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.label-row span {
    width: 70px;
    text-align: right;
    margin-right: 10px;
}

.label-input {
    flex: 1;
    border: none;
    border-bottom: 1px solid #ccc;
    width: 125px;
}


        .id-card {
            width: 239px;
            height: 408px;
            border: 1px solid black;
            padding: 22px;
            margin: 30px auto;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
         .id-cardb {
            width: 239px;
            height: 408px;
            border: 1px solid black;
            padding: 22px;
            margin: 76px auto;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
             transform: rotate(180deg);
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo img {
            width: 55px;
            height: 70px;
        }

        .details {
            margin-bottom: 20px;
        }

        .details label {
            display: block;
            margin-bottom: 5px;
        }

        .details input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .instructions {
            margin-top: 20px;
        }

        .instructions ol {
            margin: 0;
            padding: 0;
        }

        .instructions li {
            list-style: none;
            margin-bottom: 5px;
        }

        .college-address {
            text-align: center;
            margin-top: 20px;
        }
    </style>
<style>
        table {
            width: 350px;
            height: 700px;
            border-collapse: collapse;
        }

        th, td {
            border: none;
            padding: 3px;
            
        }
    </style>

  
  </div>


<?php  
$sqluse ="SELECT * FROM Inorg WHERE id=1 ";
$retrieve = mysqli_query($db,$sqluse);
$numb=mysqli_num_rows($retrieve); 
while($foundk = mysqli_fetch_array($retrieve)) {
 $profileK= $foundk['pname'];
 $name = $foundk['name'];
}

 $sqlmember ="SELECT * FROM student_id_card WHERE id>=$from && id<=$to";
 $retrieve = mysqli_query($db,$sqlmember);
 $count=0;
  $cnt=+1; 
?>
<table>
      
      <tr> 		
<?php
if (mysqli_num_rows($retrieve) > 0) {
?>	


<?php
$i=0;
while($found = mysqli_fetch_array($retrieve)) {
$course=$found['course'];$name=$found['name'];$sid=$found['sid'];
$id=$found['id'];$session=$found['session'];$phone=$found['phone'];
$count=$count+1;  $address=$found['address']; $father=$found['father'];
$names=$firstname." ".$sirname;
$photo= $found['photo'];
						  
$serial=$id;
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);    
?>   
 
<div class="item<? echo $cnt++; ?>">		

<td>
<div class="id-card">
    <header class="header">
      <img src="uploads/kcc logo.png"  alt="Institute Logo">
     
      <p style="font-weight: bold; font-size: 9px;">Approved by AICTE, Ministry of HRD, Govt. of India & <br>Affiliated to Dr. A.P.J Abdul Kalam technical Univeristy</p>
      <img src="<?php echo $photo ?>" style="height: 110px; width: 92px;"  alt="Institute Logo">
      <br><br>
    <span style="font-weight: bold; font-size: 20px;"><?php if(isset($name)){ $namez=$name;echo$namez;} ?></span>
   <div class="label-container">
        
        <div class="label-row">
            <span style="font-weight: bold;">Course:</span>
            <input type="text" value="<?php if(isset($course)){ echo$course;} ?>" class="label-input">
        </div>
        <div class="label-row">
            <span style="font-weight: bold;">Roll.No.:</span>
            <input type="text" class="label-input">
        </div>
        <div class="label-row">
            <span style="font-weight: bold;">Session:</span>
            <input type="text" class="label-input">
        </div>
        <div class="label-row">
            <span style="font-weight: bold;">Phone:</span>
            <input type="text" class="label-input">
        </div>
        
    </div>
 <div class="signature-section" style="display: flex; ">
  <img src="uploads/sign.png" width="200px" height="100px" style="margin-top: 70px; object-fit: scale-down;">
  <div style="margin-left: 20px;">
    <span style="font-weight: bold;">Issuing Authority</span>
  </div>
</div>
   
 </div>
<style>
.signature-section{
        display: flex;
    justify-content: center;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: stretch;
    align-items: flex-end;
    margin-top: -20px;
    height: 10px;
}
</style>
    
  
    <div class="id-cardb">
        <div style="border-bottom: 1px solid black;">
       <div class="logo" style="display: flex; justify-content: space-between; ">
    <div style="text-align: left;">
        <p style="font-weight: bold; font-size: 9px;">Approved by AICTE, Ministry of HRD,<br> Govt. of India & Affiliated to<br>Dr. A.P.J Abdul Kalam technical Univeristy</p>
    </div>
   
    <div>
        <img src="uploads/kcc logo.png" alt="KCC Institute of Technology and Management Logo">
    </div>
   
    </div>
<style>
.element-with-line {
    border-bottom: 1px solid black; /* Adjust the border style, width, and color as needed */
} </style>
</div>  <div class="label-container">
        
        <div class="label-row">
            <span style="font-weight: bold;">Father:</span>
            <input type="text" value="<?php if(isset($course)){ echo$course;} ?>" class="label-input">
        </div>
        <div class="label-row">
            <span style="font-weight: bold;">Tel.No.:</span>
            <input type="text" class="label-input">
        </div>
        <div class="label-row">
            <span style="font-weight: bold;">Address:</span>
            <input type="text" class="label-input">
        </div>
      
        
    </div>
       <div class="instructions" style="text-align: center; margin-top: 48px;">
    <h2  style="font-size: 12px;">INSTRUCTIONS</h2></div>
    <ol style="margin: 6; padding: 0; font-size: 12px;">
        <li>This card is the property of KCCITM, Gr. Noida and must be kept safely at all time.</li>
        <li>The student must carry this card with him/her at all time.</li>
        <li>Rs. 200/- would be charged for replacement of the I-card.</li>
        <li>Loss must be reported immediately.</li>
        <li>The card must be produced on demand.</li>
    </ol>

       <div class="college-address">
    <h3 style="font-size: 9px; font-weight: bold;">College Address:</h3>
    <p style="font-size: 8px; font-weight: bold;">
        KCC Institute of Technology and Management (Code: 492)<br>
        Plot No. 2B & 2C, Knowledge Park-III,<br>
        Greater Noida, U.P. Ph.: 092100 65555<br>
        www.kccitm.edu.in
    </p>
</div>
    </div>
  </td>  


<?php
$i++;
}
?>
  </tr> 
    </table>  
<?php
}
else{
    echo "No result found";
}
?>  

<script type="text/javascript">	
 		
 	window.print();
 </script>
	</body>
</html>

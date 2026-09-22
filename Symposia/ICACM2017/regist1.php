<?PHP
  // form handler
	 
  if($_POST && isset($_POST['sendfeedback'], $_POST['key'], $_POST['fname'],$_POST['lname'], $_POST['email'],$_POST['affil'], $_POST['country'], $_POST['addlppl'],$_POST['diet'] , $_POST['message'])) {

	$key = $_POST['key'];
    $lname = $_POST['lname'];
	$fname = $_POST['fname'];
    $email = $_POST['email'];
	$affil = $_POST['affil'];
	$country = test_input($_POST["country"]);
    $addlppl = test_input($_POST['addlppl']);
    $diet = test_input($_POST['diet']);
	$message = test_input($_POST['message']);
	
	
    if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $errorMsg = "Please enter a valid Last Name";
	} else if ($key!=834373) {
	   $errorMsg = "Please enter the correct key";
	} elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $errorMsg = "Please enter a valid First Name";
    } elseif(!$email || !preg_match("/^\S+@\S+$/", $email)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$affil)) {
      $errorMsg = "Please enter a valid affiliation";
	} elseif(!$country) {
      $errorMsg = "Please enter your country";
	}elseif(!$addlppl) {
      $errorMsg = "Please enter the number of additional person for the banquet";
	} elseif(!$diet) {
      $errorMsg = "Please enter your dietary restrictions";
    } else {
     
	 $country = test_input($_POST["country"]);
     $addlppl = test_input($_POST['addlppl']);
     $diet = test_input($_POST['diet']);
	 $message = test_input($_POST['message']);
	 
	  $to = $email;
      $subject = "Registration to ICACM Symposium";
      $headers = "From: icacm2017@gmail.com" . "\r\n" . 
        "Reply-To: icacm2017@gmail.com" . "\r\n" ;
      $mail_body =  "Dear $fname $lname, \r\n Thank you for registering to ICACM 2017. \r\n
	  Looking forward to meeting you in Florida. \r\n";
	  
	  // mail($to, $subject, $mail_body, $headers);
	  
	  $to = 'icacm2017@gmail.com';
	  $subject = "registration $lname";
	  $headers = "From: icacm2017@gmail.com" . "\r\n";
	  $mail_body1 = "Name : $lname $fname  \r\n
	  mail : $email \r\n
	  Affilation : $affil , $country \r\n
	  banquet : $addlppl additional people \r\n
	  Diet : $diet \r\n
	  Comments : $message ";
	  
	  // mail($to, $subject, $mail_body1, $headers);
	 
	  echo $mail_body1;
	  
	  // header("Location: regis_thank.html");
      exit;
      exit;
    }

  }
  
  	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-16"><title>ICACM 2017 - Registration</title>

<style type="text/css">
</style>
<style>
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color:blue;
}
u2 {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color:orange;
}
li {
float: left;
}
li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
/* Change the link color to #111 (black) on hover */
li a:hover {
background-color: #111;
}
.active {
background-color: orange;
}
</style>
<style>
div.img {
margin: 5px;
border: 1px solid #ccc;
float: left;
width: 300px;
}
div.img:hover {
border: 1px solid #777;
}
div.img img {
width: 100%;
height: auto;
}
div.desc {
padding: 15px;
text-align: center;
}
</style>
<style> input[type=text] {
width: 40%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
}
</style>
</head>
<body leftmargin="1" style="background-color: azure;">
<img style="width: 100%; height: 200px;" alt="" src="../../image/banniere1.jpg" title="Banniere1" longdesc="../../image/banniere1.jpg">
<ul>
<li><a href="../../home.html">ICACM Home</a></li>
<li><a href="../../partners.html">Partners</a></li>
<li><a href="../../committee.html">Committee</a></li>
<li><a href="../../symposia.html">Previous
symposia</a></li>
<li><a class="active" href="../../upsymposium.html">10<sup>th</sup>
symposium</a></li>
<li><a href="../../publication.html">Publications</a></li>
</ul>
<u2> <li><a class="active" href="../../upsymposium.html">Welcome</a></li>
<li><a class="active" href="orga.html">Organization</a></li>
<li><a class="active" href="Program.html">Program</a></li>
<li><a class="active" href="travel.html">Travel</a></li>
<li><a class="active" href="venue.html">Venue
and
Accomadation</a></li>
<li><a class="active" href="registration.html">Registration</a></li>
</u2>
<br>
<br>

<br>
<br>
<div style="width: 100%; margin-top: 0px; height: 87px;">
<div style="text-align: center;"><big><font color="#041943" size="6"><big>10<sup>th </sup>Annual
US-France Symposium<br>
</big></font></big><big><font color="#041943" size="6"><big>Dynamic Damage and Fragmentation</big></font></big><br>
<big><font color="#041943" size="6"><big><small>17-19
May 2017, Ft Walton Beach, Fl.</small> <br>
</big></font></big></div>

<br>
<form method="POST" action="regist1.php" accept-charset="UTF-8">
<?PHP
  if(isset($errorMsg) && $errorMsg) {
    echo "<p style=\"color: red;\">*",htmlspecialchars($errorMsg),"</p>\n\n";
  }
?>

<p><label>Key<strong>*</strong><br>
<input type="text" size="48" name="key" value="<?PHP if(isset($_POST['key'])) echo ($_POST['key']); ?>"></label></p>

<p><label>First Name<strong>*</strong><br>
<input type="text" size="48" name="fname" value="<?PHP if(isset($_POST['fname'])) echo ($_POST['fname']); ?>"></label></p>

<p><label>Last Name<strong>*</strong><br>
<input type="text" size="48" name="lname" value="<?PHP if(isset($_POST['lname'])) echo ($_POST['lname']); ?>"></label></p>

<p><label>Email Address<strong>*</strong><br>
<input type="email" size="48" name="email" value="<?PHP if(isset($_POST['email'])) echo ($_POST['email']); ?>"></label></p>

<p><label>Affiliation<strong>*</strong><br>
<input type="text" size="48" name="affil" value="<?PHP if(isset($_POST['affil'])) echo ($_POST['affil']); ?>"></label></p>

  <p><label for="country">Country<strong>*</strong>
  <select name="country">
  <option selected="selected" value="<?PHP if(isset($_POST['country'])) echo ($_POST['country']);?>">(Please
select a country)</option>
  <option value="FR" <?php if (isset($_POST['country'])) {if($_POST['country'] == "FR") { echo "selected=\"selected\""; }} ?> >France</option>
  <option value="US" <?php if (isset($_POST['country'])) {if($_POST['country'] == "US") { echo "selected=\"selected\""; }} ?> >United States of America</option>
  <option value="ESP" <?php if (isset($_POST['country'])) {if($_POST['country'] == "ESP") { echo "selected=\"selected\""; }} ?> >Spain</option>
  <option value="ISR" <?php if (isset($_POST['country'])) {if($_POST['country'] == "ISR") { echo "selected=\"selected\""; }} ?> >Israel</option>
  </select>
  </label>
  </p>
  <br>
  
 <br>
  <br>
  <label for="addlppl">Number of additional people for
banquet<strong>*</strong></label>
  <select name="addlppl">
  <option selected="selected" value="<?PHP if(isset($_POST['addlppl'])) echo ($_POST['addlppl']);?>">(Please
select a number)</option>
  <option value="-1" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "0") { echo "selected=\"selected\""; }} ?> >0</option>
  <option value="1" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "1") { echo "selected=\"selected\""; }} ?> >1</option>
  <option value="2" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "2") { echo "selected=\"selected\""; }}?> >2</option>
  <option value="3" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "3") { echo "selected=\"selected\""; }}?> >3</option>
  <option value="4" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "4") { echo "selected=\"selected\""; }}?> >4</option>
  <option value="5" <?php if (isset($_POST['addlppl'])) {if($_POST['addlppl'] == "5") { echo "selected=\"selected\""; }}?> >5</option>
  </select>
  </label>
  <br>
  <br>
  
  <label for="diet">Dietary restriction<strong>*</strong></label>
  <select name="diet">
  <option selected="selected"(Please select an option) value="<?PHP if(isset($_POST['diet'])) echo ($_POST['diet']);?>" > </option>
  <option value="vegan"  <?php if (isset($_POST['diet'])) {if($_POST['diet'] == "vegan") { echo "selected=\"selected\""; }} ?> >Vegan</option>
  <option value="nonvegan" <?php if (isset($_POST['diet'])) {if($_POST['diet'] == "nonvegan") { echo "selected=\"selected\""; }} ?> >NonVegan</option>
  <option value="other" <?php if (isset($_POST['diet'])) {if($_POST['diet'] == "other") { echo "selected=\"selected\""; }} ?> >Other</option>
  </select>
  <br>
  <br>
<p><label>Comments<br>
<textarea name="message" cols="48" rows="8"></textarea></label></p>

<p><input type="submit" name="sendfeedback" value="Register"></p>


</form>
<br>
</div>
</body></html>
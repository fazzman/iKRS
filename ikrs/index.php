<?php
	defined('__NOT_DIRECT') || define('__NOT_DIRECT',1);
	include 'cek-akses2.php';
	if($_POST){
		mysql_connect(DB_HOST,DB_USER,DB_PASS);
		mysql_select_db(DB_NAME);
		$userId = mysql_real_escape_string($_POST['user_id']);
		$data = mysql_fetch_array(mysql_query("SELECT * from user where user_id='".$userId."'"));
		if($data !== false && $data['password'] == md5($_POST['password'])){
			//login berhasil
			$_SESSION['tipe_user'] = $data['type'];
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['my_user_agent'] = md5($_SERVER['HTTP_USER_AGENT']);
			header("Location: admin/index.php");
			//tambahan kalau user langsung ke /user/
			if($_SESSION['tipe_user']=="user"){
				header("Location: user/index.php");
			}
			elseif($_SESSION['tipe_user']=="dosen"){
				header("Location: dosen/index.php");
			}
		}
		else {
			$errors = 1;
		}  
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
	    <title>iKRS</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Le styles -->
	    <link href="css/bootstrap-edit.min.css" rel="stylesheet">
	    <link href="form/styles.css" rel="stylesheet">
	    <style>
	    	/*html {
	    		background-image: 
	    	}*/
	    	body {
	    		padding-top: 20px; /* 60px to make the container go all the way to the bottom of the topbar */
	      	}
	    </style>
	    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

    	<!-- Le fav and touch icons -->
    	<link rel="shortcut icon" href="img/favicon.ico" /> 
	    <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>
	    <style id="wrc-middle-css" type="text/css">.wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal !important;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal !important;	letter-spacing: normal !important;	overflow: hidden;}.wrc_bar_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(60, 60, 60, 1.0);	word-spacing: normal !important;	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 40px;	line-height: normal !important;	letter-spacing: normal !important;	color: white !important;	font-size: 13px !important;}.wrc_middle {	display: table-cell;	vertical-align: middle;	width: 100%;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);	position: relative;	margin-left: auto;	margin-right: auto;	text-align: left;}.wrc_middle_tq_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 16px;	width: 615px;	height: 460px;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-sitecorrect.png) no-repeat;	background-color: white;	color: black !important;	position: relative;	margin-left: auto;	margin-right: auto;	text-align: center;}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_grey_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white !important;	font-size: 15px;	font-weight: bold;}.wrc_middle_actions_grey_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(100, 100, 100) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #aaaaaa;	text-decoration: none;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_grey_button:hover {	background-color: rgb(120, 120, 120) !important;}.wrc_middle_actions_grey_button:active {	background-color: rgb(130, 130, 130) !important;	border: 2px solid #00aaaa;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}</style><script id="wrc-script-middle_window" type="text/javascript" language="JavaScript">var g_inputsCnt = 0;var g_InputThis = new Array(null, null, null, null);var g_alerted = false;/* we test the input if it includes 4 digits   (input is a part of 4 inputs for filling the credit-card number)*/function is4DigitsCardNumber(val){	var regExp = new RegExp('[0-9]{4}');	return (val.length == 4 && val.search(regExp) == 0);}/* testing the whole credit-card number 19 digits devided by three '-' symbols or   exactly 16 digits without any dividers*/function isCreditCardNumber(val){	if(val.length == 19)	{		var regExp = new RegExp('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}');		return (val.search(regExp) == 0);	}	else if(val.length == 16)	{		var regExp = new RegExp('[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}');		return (val.search(regExp) == 0);	}	return false;}function CheckInputOnCreditNumber(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'text')	{		if(is4DigitsCardNumber(value))		{			var cont = true;			for(i = 0; i < g_inputsCnt; i++)				if(g_InputThis[i] == self)					cont = false;			if(cont && g_inputsCnt < 4)			{				g_InputThis[g_inputsCnt] = self;				g_inputsCnt++;			}		}		g_alerted = (g_inputsCnt == 4);		if(g_alerted)			g_inputsCnt = 0;		else			g_alerted = isCreditCardNumber(value);	}	return g_alerted;}function CheckInputOnPassword(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'password')	{		g_alerted = (value.length > 0);	}	return g_alerted;}function onInputBlur(self, bRatingOk, bFishingSite){	var bCreditNumber = CheckInputOnCreditNumber(self);	var bPassword = CheckInputOnPassword(self);	if((!bRatingOk || bFishingSite == 1) && (bCreditNumber || bPassword) )	{		var warnDiv = document.getElementById("wrcinputdiv");		if(warnDiv)		{			/* show the warning div in the middle of the screen */			warnDiv.style.left = "0px";			warnDiv.style.top = "0px";			warnDiv.style.width = "100%";			warnDiv.style.height = "100%";			document.getElementById("wrc_warn_fs").style.display = 'none';			document.getElementById("wrc_warn_cn").style.display = 'none';			if(bFishingSite)				document.getElementById("wrc_warn_fs").style.display = 'block';			else				document.getElementById("wrc_warn_cn").style.display = 'block';			warnDiv.style.display = 'table';		}	}}</script>
  	</head>

 	<body style="background: url(img/cubes.png);">
	    <div class="container" style="width: 300px;">
	    	<div class="row">
    			<center>
    				<img src="img/logo2.png">
    				<h1><font color="#FE6F2D">i</font>KRS</h1>
    			</center>
    		<!--</div>-->
    		<!--<div class ="row">-->
    			<div style="text-align : center; background : whiteSmoke;">
	    			<div id="bottom-shadow"></div>
	    			<div class="well">
		    			<br>
		    			<?php //Kalau Error
		    			if ( !empty($errors) )
							echo "<div class=\"label label-important\">User ID atau Password Salah </div><br>";
						?>
				    	<form method="post" action="">
							<input type="text" name="user_id" placeholder="User ID" /><br>
							<input type="password" name="password" placeholder="Password" /><br>
							<input type="submit" class="btn btn-primary" value="Login"/>
						</form>
						<br>
					</div>
					<div id="top-shadow"></div>
				<div>
			</div>
	    </div> <!-- /container -->

	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="js/jquery-1.8.2.min.js"></script>
	    <script src="js/bootstrap-transition.js"></script>
	    <script src="js/bootstrap-alert.js"></script>
	    <script src="js/bootstrap-modal.js"></script>
	    <script src="js/bootstrap-dropdown.js"></script>
	    <script src="js/bootstrap-scrollspy.js"></script>
	    <script src="js/bootstrap-tab.js"></script>
	    <script src="js/bootstrap-tooltip.js"></script>
	    <script src="js/bootstrap-popover.js"></script>
	    <script src="js/bootstrap-button.js"></script>
	    <script src="js/bootstrap-collapse.js"></script>
	    <script src="js/bootstrap-carousel.js"></script>
	    <script src="js/bootstrap-typeahead.js"></script>
  	</body>
</html>
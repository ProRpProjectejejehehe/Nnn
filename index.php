<?php
include "config.php";
session_start();
/* DECLARE VARIABLES */
$username = $admin_username;
$password = $admin_password;
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
	if ($_POST['username'] == $username && $_POST['password'] == $password)
	{
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		// DISPLAY FORM WITH ERROR
		display_login_form();
		display_error_msg();
	}
}
/* SHOW THE LOGIN FORM */
else
{
	display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
?><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">    
	  
    <!-- Standardised web app manifest -->
    <link rel="manifest" href="appmanifest.json" />
	
    <!-- Allow fullscreen mode on iOS devices. (These are Apple specific meta tags.) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon" sizes="256x256" href="assets/android-chrome-256x256.png" />
    <meta name="HandheldFriendly" content="true" />
	
    <!-- Chrome for Android web app tags -->
    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="shortcut icon" sizes="256x256" href="assets/android-chrome-256x256.png" />
	  
    <!-- Meta -->
    <meta name="description" content="A Tool for playing Google Photos Video using Thrid Party Player i.e JW Player | GDrive-X Free Tool.">
    <meta name="author" content="GDrive-X">
    <meta property="og:image" content="https://1.bp.blogspot.com/-M5JeDVVjRSY/X_AjJXyd6EI/AAAAAAAASPE/iwa_le1CLKEfldZmXQUpcWMM626M8UA1gCK4BGAYYCw/s1600/gdrive-x-premium-logo.png">
    <title>Google Photos - GDrive-X Free Tool</title>   
	  
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="secure.js"></script>
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">	
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/karankankaria/Files/master/css/bracket.min.css">
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/karankankaria/Files/master/css/bracket.simple-white.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" />
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
        <![endif]-->        
    </head>
 <body>
 <!-- Large modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class='form-group'>
               <textarea style="background:#000;color:#fff" class='form-control' id='textArea' readonly='readonly' rows='7'>
                  GDrive-X Free Tool:
		  Google Photos Jwplayer PHP Script Demo:     
		       
                  username: admin 
                  password: admin123
		       
                  Happy Exploring!
              </textarea>
           </div>
        </div>
     </div>
  </div>
	 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="d-flex align-items-center justify-content-center bg-gray-200 ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> GDrive-X <span class="tx-info">Tool</span> <span class="tx-normal">]</span></div>
	      <div class="tx-center mg-b-20">Google Photos Player By <a href='https://gdrivex-premium.blogspot.com/'>GDrive-X</a></div>		
<?php echo '<form action="' . isset($self) . '" method="post">' .
             '<div class="form-group">'.
			 '<input type="text" name="username" value="admin" id="username" class="form-control" placeholder="Enter your username" required>' .
			 '</div>'.
			 '<div class="form-group">'.
			 '<input type="password" name="password" value="admin123" id="password" class="form-control" placeholder="Enter your password" required>' .
			 '</div>'.
			 '<button type="submit" name="submit" class="btn btn-info btn-block">Sign In</button><br>' .
	                 '<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Login Detail</button>'.
		 '</form>';
}
function logged_in_msg($username)
{
?>
<?php
	error_reporting(0);
        include "crypt.php";
	include "config.php";
  
	if($_POST['submit'] != ""){
		$url = $_POST['url'];
		$sub = $_POST['sub'];
		$advast = $_POST["advast"];
		$poster = $_POST['poster'];
		$title = $_POST["title"];
		$iframeid = my_simple_crypt($url);
    }
	  $domain_server = $base_url;
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $domain_server?>/assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain_server?>/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain_server?>/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain_server?>/assets/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $domain_server?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $domain_server?>/assets/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">    
	  
    <!-- Standardised web app manifest -->
    <link rel="manifest" href="<?php echo $domain_server?>/appmanifest.json" />
	
    <!-- Allow fullscreen mode on iOS devices. (These are Apple specific meta tags.) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon" sizes="256x256" href="<?php echo $domain_server?>/assets/android-chrome-256x256.png" />
    <meta name="HandheldFriendly" content="true" />
	
    <!-- Chrome for Android web app tags -->
    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="shortcut icon" sizes="256x256" href="<?php echo $domain_server?>/assets/android-chrome-256x256.png" />
	  
    <!-- Meta -->
    <meta name="description" content="A Tool for playing Google Photos Video using Thrid Party Player. GDrive-X Free Tool.">
    <meta name="author" content="GDrive-X">
    <meta property="og:image" content="https://1.bp.blogspot.com/-M5JeDVVjRSY/X_AjJXyd6EI/AAAAAAAASPE/iwa_le1CLKEfldZmXQUpcWMM626M8UA1gCK4BGAYYCw/s1600/gdrive-x-premium-logo.png">
    <title>Google Photos - GDrive-X Free Tool</title>   
	  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">	
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/karankankaria/Files/master/css/bracket.min.css">
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/karankankaria/Files/master/css/bracket.simple-white.min.css">	
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
    <![endif]-->          
    </head>
 <body>
    <div class="br-logo"><a href="<?php echo $domain_server;?>"><span>[</span>GDrive-X <i>Tool</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?php echo $domain_server;?>" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Google Photos Tool</span>
          </a>
        </li>
      </ul>
      <br>
        <br>        
        <div class="info-list-item"><br> 
        </div>
      <br>
    </div>
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>		
      </div>
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo '<p>Welcome: <b>' . $username . '</b></p>';?></span>
              <img src="<?php echo $domain_server;?>/assets/user.png" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">          
              <ul class="list-unstyled user-profile-nav">               
                <li><a href="<?php echo $domain_server;?>?logout=true"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-time-outline"></i>
            <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
          </a>
        </div>
      </div>
    </div>
     <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-timer-outline tx-24"></i></a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 schedule-scrollbar active" id="calendar" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>
          <div class="pd-x-25">
            <h2 id="brTime" class="br-time"></h2>
            <h6 id="brDate" class="br-date"></h6>
          </div>		  
</div>
 </div>
    </div>
     <div class="br-mainpanel">
      <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="<?php echo $domain_server;?>">Home</a>
          <span class="breadcrumb-item active">Google Photos Tool</span>
        </nav>
      </div>
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-play-outline"></i>
        <div class="pd-sm-l-20">
          <h4 class="tx-gray-800 mg-b-5">GDrive-X Free Tool</h4>
          <p class="mg-b-0">Play Google Photos Video using Thrid Party Player.</p>
        </div>
      </div>    
<div class="br-pagebody"> <div class="form-group"> <label class="font-weight-bold">Demo Google Photos Url: <span class="tx-danger"></span></label> <input type="text" class="form-control" placeholder="https://photos.app.goo.gl/xxxxxxxxxxxxxxxxx " value="https://photos.app.goo.gl/ku48K18A948QppjT9" onclick="this.select()" required> </div> </div>
	     
	  <div class="br-pagebody">
	  <form action="" method="POST" accept-charset="utf-8">
	      <div class="row">
	        <div class="col-md-6">  
			<div class="form-group">
				<label for="drive" class="font-weight-bold">Google Photos Url: <span class="tx-danger">( Required ! )</span></label>
				<input type="text" name="url" class="form-control" placeholder="https://photos.app.goo.gl/xxxxxxxxxxxxxxxxx" onclick="this.select()" required>
				</div>
			</div>	
			<div class="col-md-6"> 
			<div class="form-group">
				<label for="poster" class="font-weight-bold">Poster : <span class="tx-info">( Optional ! )</span></label>
				<input type="text" name="poster" class="form-control" placeholder="https://image.tmdb.org/t/p/w533_and_h300_bestv2/jQHjvKOc3FG3ShoKTJfp1tXoKnQ.jpg" onclick="this.select()">
				</div>
			</div>
		  </div>
		<div class="row">
		   <div class="col-lg-6">
			<div class="form-group">
			   <label for="subtitle" class="font-weight-bold">Subtitle: <span class="tx-info">( Optional ! )</span></label>
			   <input type="text" class="form-control" name="sub" placeholder="https://gdrive-x.com/srt/The-Flash-S01E01-Pilot.srt" onclick="this.select()"> 
		 </div>
                </div>

<div class="col-md-6"> 
			<div class="form-group mg-b-10-force">
                  <div class="form-group">
					 <label for="subtitle" class="font-weight-bold">Advast ( video ads ): <span class="tx-info"><a style="color:red" href='https://gdrivex-premium.blogspot.com' target="_blank">Purchase GDrive-X Premium Tool !</a></span></label>
					 <input type="text" class="form-control" name="advast" placeholder="Purchase GDrive-X Premium Tool" onclick="this.select()" disabled> 
				 </div>
                </div>
			</div>
		  </div>
		  
		  <div class="row">
				   <div class="col-lg-6">
				<div class="form-group">
					 <label for="subtitle" class="font-weight-bold">Title: <span class="tx-info">( Optional ! )</span></label>
					 <input type="text" class="form-control" name="title" placeholder="The Monkey King 2 (2016)" onclick="this.select()"> 
				 </div>

<div class="col-md-4 center">
			<div class="form-group">
				<button value="GET" name="submit" class="btn btn-lg btn-success btn-block"> <span id="loading"></span> <strong>Generate <span id="fa-loading"><i class='fa fa-gear'></i></span></strong></button>
				</div>
			</div>				
				</div>		
			  
			  <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <div class="form-group">
					 <label class="font-weight-bold">Download Option: <span class="tx-info"><a style="color:red" href='https://gdrivex-premium.blogspot.com' target="_blank">Purchase GDrive-X Premium Tool !</a></span></label>
                  <input type="text" class="form-control" name="advast" placeholder="Purchase GDrive-X Premium Tool" onclick="this.select()" disabled> 
				 </div>
                </div>
			  </div>
		  </div>			
				
			
		</form>
		<div class="row">
		    <div class="col-lg-6">
		<div class="form-group">
			<label class="font-weight-bold"></label>
			<?php if($iframeid){echo 'Direct Link: <br><textarea style="margin:10px;width:98%;height:120px;">'.$domain_server.'/embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&title='.$title.'</textarea>';}?>
		</div>
		<div class="form-group">
			<label class="font-weight-bold"></label>
			<?php if($iframeid){echo 'Iframe Embed: <br><textarea style="margin:10px;width:98%;height:120px;">&lt;iframe src="'.$domain_server.'/embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&title='.$title.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?>
		</div>
		</div>
		<div class="col-lg-6">
	        <label class="font-weight-bold">Video Preview: </label>
		<div style="border:1px solid#ddd" class="embed-responsive embed-responsive-16by9">
		<?php if($iframeid){echo '<br /><br><iframe src="'.$domain_server.'/embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&title='.$title.'&" frameborder="0" scrolling="no" allowfullscreen></iframe>';}?>
        </div>
        </div>
        </div>
		</div>  
      <footer class="br-footer">
        <div class="footer-left">
          <div class="tx-center">Copyright &copy; 2020. GDrive-X Free Tool.</div>
		<div class="tx-center">All Rights Reserved. Powered by <a href='https://gdrivex-premium.blogspot.com/'>GDrive-X</a></div>
        </div>
        <div class="footer-right d-flex align-items-center">
          
        </div>
      </footer>
	  
   </div>	
<script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/jquery-ui/ui/widgets/datepicker.min.js"></script>
<script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/moment/min/moment.min.js"></script>
<script src="https://cdn.staticaly.com/gh/karankankaria/Files/master/lib/jquery/bracket.min.js"></script>
</body>
</html>
<?php
	}
function display_error_msg()
{
	echo '<center><p class="error"><span class="tx-danger tx-13 tx-bold">Username or Password is Invalid!</span></p></center>';
}
?>
</div>
</body>
</html>

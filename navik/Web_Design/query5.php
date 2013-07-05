<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Navik-Export</title>
	<meta charset="utf-8">
	<link rel="icon" href="imgs/slogo.ico" type="image/x-icon">
	<link rel="shortcut icon" href="imgs/slogo.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>

	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }	
		 
     jQuery('.magnifier').touchTouch();			
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
				
	</script>

	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <![endif]-->
	</head>

	<body>
    <div class="spinner"></div> 
<!--============================== header =================================-->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
            <h1 class="brand brand_"><a href="navik.html"><img alt="" src="imgs/logo.gif"> </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu">
                <li ><a href="navik.html">Home</a></li>
		<li><a href="about.html">About</a></li>
		
                <li class="sub-menu, active"><a href="service.html">Services</a>
                      <ul>
                    <li><a href="import.html">Import</a></li>
                    <li><a href="export.html">Export</a></li>
                    <li><a href="map.html">Maps</a></li>
                  </ul>
                    </li>
                <li><a href="help.html">Help</a></li>
               
               
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>
<div class="bg-content">
      <div class="container">
    <div class="row">
          <div class="span12"> 

<!--++++++++++++++++++++copntent++++++++++-->
<?php

$itc= $_POST ["code"];
$count=strlen(((string)$itc));
mysql_connect("localhost","root","12345");
@mysql_select_db("trade") or die("unable to select database");
#code for two digits
if(($count==1)||($count==2))
{	$query2=mysql_query("select hs4_no,hs4_des from hs4");
	$query1=mysql_query("select chapter_no,chapter_name from chapter where chapter_no=$itc");
	
	while($row1=mysql_fetch_array($query1))
	{
		echo "<h5>"."Chapter ".$row1['chapter_no'].":". $row1['chapter_name']."</h5>";
		echo "<br>";
		echo "<br>";
	    
	    
		while($row2=mysql_fetch_array($query2))
		{    
			if($itc==((int)($row2['hs4_no']/100)))
			{
				echo" <h5>Sub-Heading   &nbsp;"."<h5>".$row2['hs4_no']."</h5>"."<br>"."<h5>".$row2['hs4_des']."</h5>";
				echo "<br>";
				$query3=mysql_query("select hs6_no,hs6_des from hs6 ");
				
				while($row3=mysql_fetch_array($query3))
				{     
					
					if($itc==((int)($row3['hs6_no']/10000)) && ((int)($row3['hs6_no']/100 ))==$row2['hs4_no'])
					{       
						echo"<h5>".$row3['hs6_no']."------------".$row3['hs6_des']."</h5>";
						
						$query4=mysql_query("select itc,des,policy,con  from itc_code");
						echo "<table >";
						
						echo"<th>ITC(HS)</th>";
						echo"<th>Item Description</th>";
						echo"<th>Policy</th>";
						echo"<th>Conditions</th>";
						echo "<tr>";
						while($row4=mysql_fetch_array($query4))
						{
							
							if(((int)($row4['itc']/100))==$row3['hs6_no'])
							{
								echo "<td>".$row4['itc']."</td>";
								echo "<td>".$row4['des']."</td>";
								echo "<td>".$row4['policy']."</td>";
								echo "<td>".$row4['con']."</td>";
								echo "</tr>";
							}
						}
					
					echo "</table>";
					echo"<br>";
					echo"<br>";
				
					
				}
			
				
				
			}
			
		}
		
	}
}
	
	
}




else if($count==4)
{
	$chap=(int)($itc/100);
	$query1=mysql_query("select chapter_no,chapter_name from chapter where chapter_no=$chap");
	$row1=mysql_fetch_array($query1);
	echo "<h5>Chapter-".$row1['chapter_no']."--------"."<i>".$row1['chapter_name']."</i>"."</h5>";
	echo "<br>";
	echo "<br>";
	$query2=mysql_query("select hs4_no,hs4_des from hs4 where hs4_no=$itc");
	$row2=mysql_fetch_array($query2);
	echo" <h5>Sub-Heading   &nbsp;"."<h5>".$row2['hs4_no']."</h5>"."<br>"."<h5>".$row2['hs4_des']."</h5>";
	echo "<br>";
	$query3=mysql_query("select hs6_no,hs6_des from hs6 ");
	while($row3=mysql_fetch_array($query3))
	{
		if($itc==(int)($row3['hs6_no']/100))
		{
			echo"<h5>".$row3['hs6_no']."------------".$row3['hs6_des']."</h5>";
			echo "<br>";
			echo "<br>";
		
		
			$query4=mysql_query("select itc,des,policy,con  from itc_code");
			echo "<table border='1'>";
			echo"<th>ITC(HS)</th>";
						echo"<th>Item Description</th>";
						echo"<th>Policy</th>";
						echo"<th>Conditions</th>";
			echo"<tr>";
			while($row4=mysql_fetch_array($query4))
			{
					
				if(((int)($row4['itc']/100))==$row3['hs6_no'])
				{
								
					echo "<td>".$row4['itc']."</td>";
								echo "<td>".$row4['des']."</td>";
								echo "<td>".$row4['policy']."</td>";
								echo "<td>".$row4['con']."</td>";
								echo "</tr>";
				}
			}
					
		echo "</table>";
		echo"<br>";
		echo"<br>";
		}
	}
}
else if($count==6)
{
	$chap=(int)($itc/10000);
	$query1=mysql_query("select chapter_no,chapter_name from chapter where chapter_no=$chap");
	$row1=mysql_fetch_array($query1);
	echo "<h5>Chapter-".$row1['chapter_no']."--------"."<i>".$row1['chapter_name']."</i>"."</h5>";
	echo "<br>";
	echo "<br>";
	$hs4=(int)($itc/100);
	$query2=mysql_query("select hs4_no,hs4_des from hs4 where hs4_no=$hs4");
	$row2=mysql_fetch_array($query2);
	echo" <h5>Sub-Heading</h5>   &nbsp;"."<h5>".$row2['hs4_no']."</h5>"."<br>"."<h5>".$row2['hs4_des']."</h5>";
	echo "<br>";
	echo "<br>";
	$query3=mysql_query("select hs6_no,hs6_des from hs6 where hs6_no=$itc");
	$row3=mysql_fetch_array($query3);
	echo"<h5>".$row3['hs6_no']."------------".$row3['hs6_des']."</h5>";
	echo "<br>";
	echo "<br>";
	$query4=mysql_query("select itc,des ,policy,con from itc_code");
	echo "<table border='1' bgcolor='#98fb98'>";
	echo"<th >ITC(HS)</th>";
	echo"<th>Item Description</th>";
	echo"<th >Policy</th>";
	echo"<th >Condition</th>";
	echo "<tr>";
	while($row4=mysql_fetch_array($query4))
	{
				
		if(((int)($row4['itc']/100))==$row3['hs6_no'])
		{
				
			echo "<td>".$row4['itc']."</td>";
			echo "<td>".$row4['des']."</td>";
			echo "<td>".$row4['policy']."</td>";
			echo "<td>".$row4['con']."</td>";
			echo "</tr>";
		}
	}
					
	echo "</table>";
	echo"<br>";
	echo"<br>";
	
}
else if($count==8)
{
	$chap=(int)($itc/1000000);
	$query1=mysql_query("select chapter_no,chapter_name from chapter where chapter_no=$chap");
	$row1=mysql_fetch_array($query1);
	echo "<h5>Chapter-".$row1['chapter_no']."--------"."<i>".$row1['chapter_name']."</i>"."</h5>";
	echo "<br>";
	echo "<br>";	
	$hs4=(int)($itc/10000);
	$query2=mysql_query("select hs4_no,hs4_des from hs4 where hs4_no=$hs4");
	$row2=mysql_fetch_array($query2);
	echo" <h5>Sub-Heading</h5>   &nbsp;"."<h5>".$row2['hs4_no']."</h5>"."<br>"."<h5>".$row2['hs4_des']."</h5>";
	echo "<br>";
	echo "<br>";
	$hs6=(int)($itc/100);
	$query3=mysql_query("select hs6_no,hs6_des from hs6 where hs6_no=$hs6");
	$row3=mysql_fetch_array($query3);
	echo"<h5>".$row3['hs6_no']."------------".$row3['hs6_des']."</h5>";
	echo "<br>";
	echo "<br>";
	
	$query4=mysql_query("select itc,des,policy,con  from itc_code where itc=$itc");
	
	echo "<table border='1' >";
	
	
	
	echo"<th >ITC(HS)</th>";
	
	echo"<th>Item Description</th>";
	echo"<th >Policy</th>";
	echo"<th >Condition</th>";
	echo "<tr>";
	$row4=mysql_fetch_array($query4);
	
	echo "<td >".$row4['itc']."</td>";
	
	echo "<td>".$row4['des']."</td>";
	
	echo "<td>".$row4['policy']."</td>";
	echo "<td>".$row4['con']."</td>";
	echo "</tr>";
	echo "</table>";
	echo"<br>";
	echo"<br>";
}
mysql_close();

?>
<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
	  <li><a class="icon-5" href="#"></a></li>
        </ul>
   
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

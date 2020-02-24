


<?
include("lo_top-main2-prod-js3.inc");
?>

<!-- Menu Section -->  
<div class="main1">

	<!-- Start - Div is here to move the header for the articles in correct position -->
	<div style="position:relative; left:-10px; top:-30px; z-index: 80000">
	    <?
		include $include_path . "lo_header-main2-new-js2.inc";
	?>
 
	</div>

	<!-- Start Content Section -->

	<!-- Start Assoc Search Section -->

<!-- Below used to correct content position need to rewrite to do correct -->
<table>
	<tr>
    	<td style="line-height:5px">&nbsp;</td>
    </tr>
</table>
<!-- Above used to correct content position need to rewrite to do correct -->

<!-- Code Start -->
<div>
	
		<?
			include("lo_top-main2-side2-js50.inc");
		?>




	<table width="1024">
		<tr>
			<td width="240px">
				
				
			<!-- Left Nav Start -->
			

		<?
		include("lo_top-main2-side-new.inc");
		?>	       
	       
	       
		       
			<!-- Left Nav End -->
				
			</td>
			
			
			
			<td width="784">
			
	<div style="position:absolute; left: 25px; top: 0px; z-index: 0; width: 700px">
		
		
		
		
			



	
			<div class="clear"></div>

			<!-- Menu Section -->  

			</div>

			<!-- Content Section -->
			<!-- Begin Section 1 -->  
				
				
        <script>
            printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
            function printDiv(divId) {
                window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }
        </script>				
				
				

			<!-- Position correction for vendor page -->  
			<div style="position:relative; left: 30px; top:5px">
			<div class="tb3" style="width:750px; box-shadow: 5px 5px 5px #888888">
			  &nbsp;&nbsp;Vendor Profile Management Center:&nbsp;&nbsp;
			</div><br />

			<div >
			&nbsp;&nbsp;<a href='https://landscapearchitect.com/vendor/logoff.php'><input type='image' src='/imgz2/logoff-button.jpg' style="box-shadow: 5px 5px 5px #888888" border='0' /></a>
			</div><br />
			<!-- Begin Old Code -->  
			<?
				

				
		
					$company_id = $_GET['id'];

				
					$week2 = $_POST['week'];
				
   					$small2 = trim($_POST['small']);
					$large2 = trim($_POST['large']);
				
					$sDate1 = str_replace("-", "", $small2);
					$sDate2 = str_replace("-", "", $large2);
				

				
			echo '<p><font size="3"> <br /> <span style="font-family:Arial, Helvetica, sans-serif; font-size:24px; font-weight:bold; text-shadow:none; color:#000">  Sales Lead Retrieval </span><br />
					<a href="https://landscapearchitect.com/vendor/ex-test-week3.php?id=' . $company_id . '&week=' . $week2 . '"><font size="3"><strong><span style="text-shadow:none"> <span style="color:#00F">Click Here</span> to Download This Lead Report in .xls Format</strong></span></font></a></p>
					<p><font size="3"><a href="javascript:printDiv(\'div1\')"><span style="text-shadow:none"><strong><span style="color:#00F">Click Here</span> to Print This Lead Report</strong></span></a></font></p>
					<p><font size="3">
					<a href="https://landscapearchitect.com/vendor/index-vendor.php?action=edit&id=' . $company_id . '"><span style="text-shadow:none"><strong><strong><span style="color:#00F">Click Here</span> to Return to Your Vendor Profile & Lead Center</strong></a></span></font></p>
					<br /><hr /><div id="div1">';	
				
            echo "<div><table width=\"715\">";

    $servername = "localhost";
    $username = "land_patchew";
    $password = "59q2GB6k$3";
    $dbname = "land_landscap_lollive";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
				

				// $sql="SELECT * FROM leads WHERE (Date BETWEEN '$small2' and '$large2') AND vendor_id='$id' ";
				$sql="SELECT * FROM leads WHERE (Date BETWEEN '" . $sDate1 . "' and '" . $sDate2 . "') AND vendor_id='" . $company_id . "'";
				$result = $conn->query($sql);
		
			
				
				
												
						while($row = mysqli_fetch_array($result)) {
							
    $pattern1='•';
    $repl1='<br>&#8226;';
    $demogs = str_replace($pattern1, $repl1, iconv('CP1252', 'UTF-8//TRANSLIT', (stripslashes($row['demographic']))));
    
    echo "<tr><td valign=\"top\" width=\"215\" style=\"font-size:12px\"><strong>Name:</strong> ". $row['fname']  . "&nbsp;" .  $row['lname'] . "</td><td valign=\"top\" width=\"200\" rowspan=\"12\" style=\"font-size:12px\"><strong>Demographics: </strong>" . $demogs . "</td></tr>";
                
                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Company: </strong>". $row['company'] . "</td></tr>";
                

                echo "<tr><td width=\"215\" style=\"font-size:12px\"><strong>Address: </strong> ". $row['address'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>City: </strong> ". $row['city'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>State/Zip: </strong>". $row['state'] . "&nbsp;" .  $row['zip'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Phone: </strong>". $row['phone'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Fax: </strong>". $row['fax'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Email: </strong>". $row['email'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\">" . "</td></tr>";

                echo "<tr><td colspan=\"2\"  width=\"215\" style=\"font-size:12px\"><strong>Brand: </strong>". $row['brand'] . "</td></tr>";
                
                echo "<tr><td colspan=\"2\"  width=\"215\" style=\"font-size:12px\"><strong>Issue: </strong>". $row['issueId'] . "</td></tr>";
                
                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Date: </strong>". $row['Date'] . "</td></tr>";

                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Source: </strong>". $row['from'] . "</td></tr>";
                
                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px\"><strong>Choices: </strong>". $row['choices']  . "</td></tr>";
                
                echo "<tr><td colspan=\"2\" width=\"215\" style=\"font-size:12px; height:15px\">" . "</td></tr>";
							
						}
												
						// Free result set
						mysqli_free_result($result);

            echo "</table>";
				
			?>
				
			<script type="text/javascript">
				function printTable(obj) {
					content = document.getElementById(obj).innerHTML;
					newwin = window.open('');
					newwin.document.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"\n',
					'"http://www.w3.org/TR/html4/strict.dtd">\n',
					'<html>\n',
					'<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">\n',
					'<title>Leads Report</title>\n',
					'\n',
					'<body>\n',
					''+content+'\n',
					'</body>\n',
					'</html>');
					newwin.print();
					newwin.close();
				}
	
	
	
	
			</script>

					<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

			</div>				
				
				


			<!-- End Old Code -->  
			</div>



			<!-- End Main Section -->  
			</div>

			<!-- Start Banner Section -->  


		
		
		
		
	
	
	</div>					
			

				
			
			</td>
			
			
			
		</tr>
	</table><br>
	
	<div style="position: relative; left: 250px">
		<? 	//include("lo_top-main2-bottom.inc"); ?>
	</div>
	







<!-- Code End -->


    
	<!-- End Content Section -->
    
</div>
<!-- End Main Section -->
  


</div>





<?
include("lo_footer-main2-new.inc");
?>






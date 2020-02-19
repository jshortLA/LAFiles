
<? 
	
	include '../../includes/la-common-top-inner.php';

	include '../../includes/la-common-header-inner.inc'; 

	include '../../includes/connect4.inc';

?>


      <style>
        .salesLeadHeaderContainer button {
          margin-top: 0px;
          font-size: 14px;
          min-width: 300px;
          width: 100%;
        }
        
        .salesLeadHeaderContainer {
            display: flex;
            align-items: center;
        }
        
        .singleLeadContainer {
          font-size: 14px;
          margin-top: 30px;
          margin-bottom: 40px !important;
        }
        
        .singleLeadContainer .userInfo td {
            padding-bottom: 8px;
        }
        
        .salesLeadButtonContainer button {
          width: 100%;
          font-size: 15px;
          padding: 19px;
          background: white;
          color: #1b8047;
          border: 1px solid #1b8047;
          transition: 300ms;
          margin-top: 20px;
        }
        
        .salesLeadButtonContainer button:hover {
          background: #1b8047;
          color: white;
        }
        
        #selectDatesContainer {
            margin-top: 30px;
        }
        
        #printLeadsContainer .vendorSectionTitles {
            margin-bottom: 20px;
          padding-left: 15px;
        }
        
        
        @media print{
          #printLeadsContainer .userInfoTd {
            width: 600px !important;
          }
          
          #printLeadsContainer .demoTd {
            width: auto !imporant;
          }
          
          .singleLeadContainer {
            margin-bottom: 40px;
          }
        }
       
      
      </style>


<section class="tool_page full_width vendorPages">
<div class="container">
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 sideBarNoSearch">
	

				
				<div class="white_side full_width">
					<h2 class="mobtoggle">ALL CATEGORIES</h2>
					<div class="full_width" id="mobile_slide">


						<!-- sidebar accordian menu -->
						<? include '../../includes/la-common-sidebar-menu.inc'; ?>


					 </div><!-- #mobslide --> 
        </div><!-- /.white_side -->
				
        
        
    </div><!-- /.col-lg-3 -->
    
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
    <div class="row">
      
      
                              
                <?php
                  
                    $action = $_GET['action'];

										$company_id = $_GET['id'];
				            $week2 = $_POST['week'];
      
                    $small2 = trim($_POST['small']);
                    $large2 = trim($_POST['large']);

                    $sDate1 = str_replace("-", "", $small2);
                    $sDate2 = str_replace("-", "", $large2);
      
              
                   

                   //creates week display date range
                   if($action == "week"){

                      date_default_timezone_set( 'America/Los_Angeles' );
                      $yWeek = substr( $week2, -4 );
                      $mWeek = substr( $week2, 0, 2 );
                      $dWeek = substr( $week2, 2, 2 );
                      $date = $yWeek . '-' . $mWeek . '-' . $dWeek;
                      $date1 = strtotime( $date );
                      $date2 = strtotime( "+7 day", $date1 );

                      $weekDisplay = date( 'm/d/Y', $date1 ) . ' - ' . date( 'm/d/Y', $date2 );
                     
                    } else if($action == "custom"){
                     
                      $date1 = DateTime::createFromFormat('Ymj', $sDate1);
                      $date2 = DateTime::createFromFormat('Ymj', $sDate2);

                      $weekDisplay = $date1->format('m/d/Y') . " - " . $date2->format('m/d/Y');

                    } 
      
                    

      
										$sql = "SELECT * FROM new_vendor WHERE id='" . $company_id . "' ";
										$result = $conn->query($sql);									


										 while($row = mysqli_fetch_assoc($result)) {
                       
                        $company_name = $row['company_name'];
                       
                    }
      
                ?>
      
          <!-- header START -->          
          <div style="position: absolute; right: 0px; top: 10; z-index: 200; border-top-right-radius: 5px; overflow: hidden;">
            <a href='https://www.landscapearchitect.com/vendor/logoff.php'><input type='image' src='/imgz2/logoff-button.jpg' style="box-shadow: -5px 5px 5px #888888;" border='0' id="logOffBtn" /></a>
          </div>

      
          <div class="headerBanner col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <h3>
              <span style="font-weight: 400">Welcome</span> <span style="font-weight: 800"><? echo $company_name ?></span>
              <p>Scroll down for <strong>Sales Lead Retrieval</strong> or to edit your company information, add or delete search engine categories, update regional outlets, and manage product profile.</p>     
            </h3>

            <div class="black_v"></div>
          </div>
          <!-- header END -->
      
      
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center_section salesLeadPage">

               <div class="salesLeadHeaderContainer">
                  <h2 class="vendorSectionTitles">Sales Lead Retrieval</h2>
                  <a href="https://landscapearchitect.com/vendor/index-vendor.php?action=edit&id=<? echo $company_id ?>"><button class="button_style">Back to Vendor Profile &amp; Lead Center</button></a>
              </div>

              <div class="salesLeadButtonContainer row">
                
                <a href="https://landscapearchitect.com/vendor/ex-test-week3.php?id=<? echo $company_id ?>&week=<? echo $week2 ?>" class="col-md-5"><button class="button_style">Download This Lead Report in .xls Format</button></a>

                <div class="col-md-4"><button class="button_style" onClick="printDiv('printLeadsContainer')">Print This Lead Report</button></div>
                
                <div class="col-md-3"><button class="button_style" onClick="javascript:displayDateSelect()">Select New Dates</button></div>
                
              </div>
            
            
              <div id="selectDatesContainer" class="salesLeadRetrievalContainer row" style="display: none;">

                <div class="col-lg-6 col-sm-12 col-xs-12">

                   <h6 style="margin-bottom: 0px;">Leads for the Week of:</h6>
                    <p style="font-size:13px; color:#F00">(Make sure to click on a week in the box below)</p>
                  <form name="leadsform" method="POST" action="index-vendor-leads.php?action=week&id=<? echo $company_id ?>">
                          <input type="hidden" name="week3" value="cat" >

                          <div class="weekStyleContainer">
                            <select multiple name="week" size="4" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; width:250px; height:75px; background-color:#f1f1f1; box-shadow: 5px 5px 5px #888888; border: 2px inset; margin-left:auto; text-align: center">
                              <option name="dlistweek" value="none">Select a Week</option>
                              <?php


                              $sql = "SELECT distinct `week` FROM leads WHERE `vendor_id`=" . $company_id . " ";
                              $result = $conn->query( $sql );


                              while ( $row = mysqli_fetch_assoc( $result ) ) {


                                $a = $row[ 'week' ];
                                $weekcsv = $a;

                                date_default_timezone_set( 'America/Los_Angeles' );
                                $yWeek = substr( $a, -4 );
                                $mWeek = substr( $a, 0, 2 );
                                $dWeek = substr( $a, 2, 2 );
                                $date = $yWeek . '-' . $mWeek . '-' . $dWeek;
                                $date1 = strtotime( $date );
                                $date2 = strtotime( "+7 day", $date1 );

                                $leftpart = '&nbsp;&nbsp;' . date( 'm.d.y', $date1 ) . ' - ' . date( 'm.d.y', $date2 );


                                //$leftpart = substr($a,0,2).substr($a,3,2).substr($a,6,4);

                                $dlist .= '<option name="dlistweek" value="' . $a . '">' . $leftpart . '</option>';

                                echo $dlist;

                              }


                              ?>
                            </select>
                            <input type="submit"  value="Retrieve Leads for Selected Week" class="button_style" style="margin-top: 15px;">
                          </div>

                        </form>
                </div>       


                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <form name="leadsform" method="POST" action="index-vendor-leads.php?action=custom&id=<? echo $company_id ?>">
                      <input type="hidden" name="week3" value="cat" >

                          <h6 style="margin-bottom: 0px">Custom Date Range:</h6>
                          <i>Please enter date yyyy-mm-dd in the field below (ex: 2014-01-01)</i>

                          <div class="input_fl" style="margin-left: -8px; margin-right: -8px;">

                            <div class="col-sm-6">
                              <label>Start Date:</label>
                              <input type="text" name="small">
                            </div>

                            <div class="col-sm-6">
                              <label>End Date:</label>
                              <input type="text" name="large">
                            </div>

                            <div class="col-sm-8" style="padding-left: 8px; margin-top: 15px;">
                              <input type="submit" name="find" value="View Custom Leads" class="button_style" style="margin-top: 0px;">
                            </div>

                             <div class=" col-sm-4" style="margin-top: 15px;">
                                 <input type= "reset" value = "Reset" style="font-size: 14px; width: 100%; min-height: 36px; text-align: left;" class="resetHover">
                            </div>
                          </div>

                    </form>
                </div>       

             </div>                  
            
      
              <br /><hr />
            
            
      
               
            
                <div id="printLeadsContainer" class="row">
                  
                   <h2 class="vendorSectionTitles col-lg-12">Sales Leads for: <? echo $weekDisplay ?></h2>
                  
         <?php
              
  
  
                if($action == "week"){
                  
                   $sql="SELECT * FROM `leads` WHERE `vendor_id` = '" . $company_id . "' AND `week` LIKE '" . $week2 . "' ORDER BY `lead_id` DESC";
                  
                } else if($action == "custom"){
                  
                  $sql="SELECT * FROM leads WHERE (Date BETWEEN '" . $sDate1 . "' and '" . $sDate2 . "') AND vendor_id='" . $company_id . "'";
                  
                }
               
                $result = $conn->query($sql);
              
              
                
                


                while($row = mysqli_fetch_array($result)) {
                  
                    echo "<table width=\"100%\" class=\"singleLeadContainer\" style=\"margin-bottom: 30px;\">";

                    $pattern1='•';
                    $repl1='<br>&#8226;&nbsp;';
                    $demogs = str_replace($pattern1, $repl1, iconv('CP1252', 'UTF-8//TRANSLIT', (stripslashes($row['demographic']))));
                  
                    echo "<tr><td valign=\"top\" class=\"col-md-4 userInfoTd\" style=\"min-width: 300px;\"><table class=\"userInfo\">";

                    echo "<tr><td valign=\"top\" ><strong>Name:</strong> ". $row['fname']  . "&nbsp;" .  $row['lname'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Company: </strong>". $row['company'] . "</td></tr>";

                    echo "<tr><td ><strong>Address: </strong> ". $row['address'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>City: </strong> ". $row['city'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>State/Zip: </strong>". $row['state'] . "&nbsp;" .  $row['zip'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Phone: </strong>". $row['phone'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Fax: </strong>". $row['fax'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Email: </strong>". $row['email'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\"  ><strong>Brand: </strong>". $row['brand'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\"  ><strong>Issue: </strong>". $row['issueId'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Date: </strong>". $row['Date'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Source: </strong>". $row['from'] . "</td></tr>";

                    echo "<tr><td colspan=\"2\" ><strong>Choices: </strong>". $row['choices']  . "</td></tr>";
                  
                    echo "</table></td>";
                      
                    echo "<td valign=\"top\" rowspan=\"12\" class=\"col-md-8 demoTd\"><strong>Demographics: </strong>" . $demogs . "</td>";
                      
                    echo "</tr>";


                }

                // Free result set
                mysqli_free_result($result);

                echo "</table>";

          ?>
          
                  </div>
            
				
		     <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		
         
      </div><!-- ./center-section -->
    </div><!-- /.row -->
    	
  </div><!-- ./col-lg-9 -->
</div><!-- /.row -->
</div><!-- /.contianer -->
</section><!-- /.tool_page -->

            
 <? include '../../includes/la-common-footer-inner.inc'; ?>

      
<script>
  
    printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
    function printDiv(divId) {
        window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }

  
  function displayDateSelect(){
    $('#selectDatesContainer').toggle("300");
  }
  

  
</script>			


 
    </body>
</html>

<?php session_start() ?>

<? 
 
	include '../includes/la-common-top.php';

  $pageId = "other";

	include '../includes/la-common-header.inc'; 

 


if($_SESSION['loggedIn']){
  
  include '../includes/connect4.inc'; 
  
  $sql = "SELECT * FROM subscribe WHERE id ='" . $_SESSION['user'] . "'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  
  $firstName = $_SESSION['name'];
  $lastName = $_SESSION['lname'];
  $phone = $row['phone'];
  $email = $row['email'];
  
}

?>


	<section class="contact-page supplemental-pages">
	
			<!--Banner Start -->
      <div class="page-top-banner text-center" style="width:100%; background-image:url('images/contact-bg.png'); height:259px; background-size:cover;">
        <div class="inner-banner">
          <div class="container">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 padding30">
              <h1>Request LA.com Digital Media Kit</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner End -->
    
    
			
			<section class="content-section">
				<div class="container">

						
								<style>
                  
                  .contactTextArea {
                    margin-right: 10px;
                    width: 100%;
                    max-width: 497px;
                    border-radius: 5px;
                    padding: 10px;
                    border-radius: 5px !important;
                    border: solid 1px rgba(35, 35, 35, 0.15);
                    font-size: 12px;
                  }
                  
                  .contact-section .button_style {
                    margin: 10px 0px 0px 0px;
                    max-width: 250px;
                  }
          
								</style>
          <div class="row padding20 contact-section" style="padding-bottom: 0px;">
							<center>	<h3>LandscapeArchitect.com is new and improved with a modern look &amp; substantially stronger SEO.
Just in the last month the product search engine has received over 50k page views and is growing, Now is the time to get involved.</h3>
								</center>
							</div>
								
						<div class="row padding20 contact-section" style="padding-bottom: 0px;">
							
							
              
              
              <div class="col-md-5 col-sm-12 col-xs-12 contact-col">
                <h2 style="margin-top: 0px;">Request LA.com Digital Media Kit</h2>
								
                <form NAME="contactUsForm" id="contactUsForm" action="/" >
                  <div class="input_fl">
                    <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>First Name*</label>
                        <input type="text" name="fname" id="contact_first_name" value="<? echo $firstName ?>" data-msg="Please fill in your first name."/>
                      </div><!-- .col-lg-6 -->
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Last Name*</label>
                        <input type="text" name="lname" id="contact_last_name" value="<? echo $lastName ?>" data-msg="Please fill in your last name."/>
                      </div><!-- .col-lg-6 -->
                     <div class="col-sm-12">
                        <label>PHONE NUMBER*</label>
                        <input type="text" placeholder="555-123-4567" name="phone" id="contact_phone" value="<? echo $phone ?>" data-msg="Please fill in your phone number."/>
                      </div><!-- .col-lg-12 -->
                      <div class="col-sm-12">
                        <label>EMAIL*</label>
                        <input type="text" placeholder="yourname@email.com" name="email" id="contact_email" value="<? echo $email ?>" data-msg="Please fill in your email."/>
                      </div><!-- .col-lg-6 -->
                      <div class="col-sm-12">
                        <label>CONFIRM EMAIL*</label>
                        <input type="text" placeholder="yourname@email.com" name="confirm_email" id="contact_confirm_email" value="<? echo $email ?>" data-msg="Please confirm your email."/>
                      </div><!-- .col-lg-6 -->

                       <div class="col-sm-12">
                        <label>Message</label>
                        <textarea placeholder="Type your message here..." rows="4" class="contactTextArea" name="contact_message" id="contact_message" data-msg="Please fill in your phone number."></textarea>
                      </div><!-- .col-lg-12 -->
                    </div>
                  </div><!-- /.input_fl -->

                  <button type="submit" class="button_style" id="contactSubmitBtn">SUBMIT</button>
                  
                  <div id="errorText"></div>
                
                </form>
                
                <div id="contactThankYou" style="display: none;">
                  <h3>Thank you <span id="contactUsResponseName"></span></h3>
                  <p style="font-size: 18px;">Your message has been sent and we will get back to you as soon as possible. If you need to contact us sooner, you can reach us at 714-979-5276.</p>
                </div>
                
							</div>
              
              <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12 contact-col">
                
                <img style="border:1px solid black;"  src="https://landscapearchitect.com/advertising/LA-2020-Media-Group-DIgital-Media-Kit-EMAIL.jpg" width="400" alt=""/>
<div class="row">
            

                </div>
               
                
              </div>
            </div>
              
             <div class="row padding20 contact-section"> 
              
              
							<div class="col-md-4 col-sm-12 col-xs-12 contact-col">
								<h3>Digital Advertising Sales</h3>
								                <p class="padding10">
								 <p class="padding20">
								  <strong>If your Company Name Begins With: <br>A-L</strong><br>
									
								
                  Nathan Schmok<br>
                  <a href="mailto:nschmok@thelandscapeexpo.com">nschmok@thelandscapeexpo.com</a><br>
                  Ext. 118
								</p>
						  <p class="padding10">	
							  <strong>M-Z</strong><br>
                  Salvador Rivera<br>
                  <a href="mailto:srivera@landscapearchitect.com">srivera@landscapearchitect.com</a><br>
                  Ext. 126
								</p>
								
								
							</div>
							
							
							
							
						</div>
						
						
					</div>
				</div>	
			</section>
            
			
	
	</section>		
           
			
 <? include '../includes/la-common-footer-inner.inc'; ?>


<script>

  $(window).on('load',function(){
    
    $('#contactSubmitBtn').click(function(event){
        event.preventDefault();
        document.getElementById("errorText").innerHTML = " ";
        if(validateContactForm()){
          $.post(
            '/mailback/mailContactFormMk.php',
            {
              fname: $('input[name=fname]').val(),
              lname: $('input[name=lname]').val(),
              userEmail: $('input[name=email]').val(),
              contactMessage: $('textarea[name=contact_message]').val(),
              contactPhone: $('#contact_phone').val(),
            },
             function(data){
               data = JSON.parse(data);               
               if(data.success == true){
                  document.getElementById("contactUsResponseName").innerHTML = data.fname;  
                  $('#contactUsForm').toggle("100");
                  $('#contactThankYou').toggle("500");
                } else {
                  console.log(data);
                }
             }
          )//end post
        } // end if (validateContactForm)
      }); //end contactSubmitBtn click event
    
    }); //end window onload
  
  
    function validateContactForm(){

      var validator = $( "#contactUsForm" ).validate({
        rules: {
          fname: {
            required: true,
          },
          lname: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          confirm_email: {
            required: true,
            email: true,
            equalTo: "#contact_email"
          },
          phone: {
            required: true,
          }
        }
      });
      
        var validated = true;
        
        if(!validator.element("#contact_email")){
          validated = false;
        }
        if(!validator.element("#contact_confirm_email")){
          validated = false;
        }
        if(!validator.element("#contact_first_name")){
          validated = false;
        }
        if(!validator.element("#contact_last_name")){
          validated = false;
        }
        if(!validator.element("#contact_phone")){
          validated = false;
        }
      
      return validated;
    }

</script>


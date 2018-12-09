<?php

$contact='<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form action="contactController.php" role="form" method="post" enctype="multipart/form-data" >
        <br style="clear:both">
                    
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="phone" placeholder="Phone Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" name="message" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
            
        <input type="submit" id="submit" name="submit" class=" pull-right"/>
        </form>
    </div>
</div>
</div>';



?>

  
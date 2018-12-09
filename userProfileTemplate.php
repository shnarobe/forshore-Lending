<?php
include_once("account.php");
//include_once("errorHandler.php");
//echo $old_error_handler = set_error_handler("userErrorHandler");
$userloan="";
if((!logged_in()&&!is_profile())){
	header("Location:foreshore.php");
	die("Redirecting to home page");
	
	
}
elseif((logged_in()&&is_profile())){
if(isset($_SESSION['login_userid'])){
	$userloan=json_encode(base64_encode($_SESSION['login_userid']));
	
}	
	
	
}
elseif((logged_in()&&!is_profile())){
	$te=urlencode(sha1($_SESSION['login_userid']));
	$un=$_SESSION['login_username'];
	header("Location:userProfileTemplate.php?username=$un&userid=$te");
	exit();
}

/*
function viewLoan($loanid){
	$ab=(int)$loanid;
	$res=null;
	$name=DB_DATABASE;
	$user=$_SESSION['username'];
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * FROM loanapplication where user=:u AND loan_status='approved'");	
				$stmt->bindParam(":p",$ab);
				$res=$stmt->fetchAll(PDO::FETCH_BOTH);
		if($res){
			$count=0;
			foreach($res as $i){
				for($j=0;$j<=42;$j++){
				 $out.=$i[$count]."@1gzr3q0";
				 $count=$count+1;
				 }
				}
			echo $out;
		}
		else{
			echo "no lona found";
			
			}
		}
		catch(PDOException $e){}
		
	
	}*/

?>


<html>
<head>
<link rel="stylesheet" href="scripts/bootstrap.min.css">

<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<script src="direct.js"></script>

<style>
.overlay{
/*background-image:url("texture4.JPG");*/	
	}
	body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
     /* background-color: #318E31/*#8CD08C;
      background:url("Forest-Background.jpg");
	  color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;*/
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #318E31;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #318E31 !important;
      background-color: #fff !important;
  }
  .dropdown-menu li a{
	  color:#318E31 !important;
  }
  .dropdown-menu li a:hover{
	background-color:#318E31 !important;
	color:#fff !important;	
	  
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #318E31;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#318E31;
}
span i{
    color:#318E31;
}
.headicon{
	color:#0C0;	
	}
	.red{
	color:red;	
	}
</style>

<script>
function viewStatement(event,pn){
	event.preventDefault();
	var y=<?php echo $userloan;?>;
if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	console.log(y);
	$.ajax({
    url: 'userProfileController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewstatement",id:y,pagenum:page},
    success: function(data) {
	$("#statementholder").html(data);
	
	}
		   });	
	
	
	
	
	
	
}

$(document).ready(function(){
	




	$('#usertab li:eq(0) a').on('shown.bs.tab', function (e) {
		var y=<?php echo $userloan;?>;
		$("#contractholder").html("");
		$("#contractholder").html('Loading...');
	$.ajax({
				   dataType:"text",
				   url:"userProfileController.php",
				   method:"POST",
				   data:{action:"viewcontract",id:y},
				   success:function(data){
					$("#contractholder").html(data);
			
			}
			});
  //e.target // newly activated tab
  //e.relatedTarget // previous active tab
});
$('#usertab li:eq(1) a').on('shown.bs.tab', function (e) {
  var y=<?php echo $userloan;?>;
		$("#statementholder").html("");
		$("#statementholder").html('Loading...');
	$.ajax({
				   dataType:"text",
				   url:"userProfileController.php",
				   method:"POST",
				   data:{action:"viewstatement",id:y},
				   success:function(data){
					$("#statementholder").html(data);
			
			}
			});
});	 
	

	
	




if(location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle='tab']", function(event) {
        location.hash = this.getAttribute("href");
		//console.log(location.hash);
    });

$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
	//console.log(anchor);
	
	
});
});
</script>


</head>

<body>
<?php echo $nav;?>

<div class="container-fluid jumbotron" style="margin-top:150px; height:100%;">
<h2>welcome to your account</h2>

<?php if(logged_in()&& is_profile()):?>
<ul id="usertab" class="nav nav-tabs">
  <li ><a data-toggle="tab" href="#contract">View contract</a></li>
  <li><a data-toggle="tab" href="#menu1">View statements</a></li>
  <li><a data-toggle="tab" href="#review">Leave a review</a></li>
  
</ul>

<div class="tab-content">
  <div id="contract" class="tab-pane fade ">
    <div id="contractholder" >	
	</div>
    </div>

<!-- -->
	<div id="menu1" class="tab-pane fade">
    
	<div id="statementholder">
    </div>
  </div>

  <!-- -->
  
<div id="review" class="tab-pane fade">
    

	<form id="reviewform">
	<legend>Leave a comment</legend>
<div class="col-sm-5">
<div class="form-group">

<textarea class="form-control" id="usercomment" name="usercomment" maxlength="500"  rows='7' type="textarea">
</textarea>
<span id="characterLeft"></span>


</span>

</div>
<div class="form-group">
<input id="send" type="submit" value="Send">
</div>
</div>
</form>

  </div>
<script>
 $('#characterLeft').text('500 characters left');
    $('#usercomment').keydown(function () {
        var max = 500;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#send').attr('disabled',true);            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#send').attr('disabled',false);
            $('#characterLeft').removeClass('red');            
        }
    });    

	
	$("#reviewform").submit(function(event){
	event.preventDefault();
	var y=<?php echo $userloan;?>;
	var form=document.forms[0];
	console.log(document.forms.length);
	var obj=$(form).serializeArray();
	//var d=window.setTimeout(function(){document.location.reload(true);},800); 
	if($("#usercomment").val()==""){
		alert("You did not create a submission.");
		return;
		
	}
	var c=obj[0].value;
		
	
	$.ajax({
				   dataType:"text",
				   url:"userProfileController.php",
				   method:"POST",
				   data:{action:"review",comment:c,id:y},
				   success:function(data){
					var res=JSON.parse(data);
					if(res['error']){
					$("#reviewErrorModal").modal("show");
					}
					else{
						
						$("#reviewSuccessModal").modal("show");
						var d=window.setTimeout(function(){document.location.reload(true);},600); 
						
					}
				   }
			});	
});

	
</script>
  
  <!-- -->
</div>

<?php endif; ?>
<div class="modal fade" id="reviewErrorModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top:20%;">
      <div class="modal-content">
         <div class="modal-body text-center" style="">
		 <span class="text-center">
         <p>We do apologise. Your review could not be submitted. Admin was notified. Please try again.</p>
        </span>
		</div>
        </div>
    </div>
  </div>
  
  <div class="modal fade" id="reviewSuccessModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top:20%;">
      <div class="modal-content">
         <div class="modal-body text-center" style="">
		 <span class="text-center">
         <p>Thank you for your review!</p>
        </span>
		</div>
        </div>
    </div>
  </div>

</div>


  
<footer class="container-fluid text-center">
  
  <p>copyright <a href="http://www.forshorelending.com" title="Visit forshorelending">www.forshorelending.com</a></p>		
</footer>
</body>


</html>
<?php
session_start();
ob_start();

//include 'addressinfoval.php';
include 'config.php';
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
//require 'class.phpmailer.php';
//require 'class.smtp.php';
$borarr=null;
$cobarr=null;
$errors=array();
 $assets=array();
 $liabilities=array();
 $properties=array();;
   
 /*
 
 $_SESSION['fnameErr']=$_SESSION['lnameErr']=$_SESSION['emailErr']=$_SESSION['dobErr']=$_SESSION['mar_statusErr']=$_SESSION['sinErr']=$_SESSION['home_pErr']=$_SESSION['cell_pErr']=$_SESSION['work_pErr']=$_SESSION['faxErr']=$_SESSION['preferred_contactErr']=$_SESSION['currentlyErr']=$_SESSION['preferred_languageErr']=$_SESSION['dependentsErr']=$_SESSION['addressErr']=$_SESSION['unitErr']=$_SESSION['cityErr']=$_SESSION['provinceErr']=$_SESSION['postal_codeErr']=$_SESSION['time_at_residence_yearErr']=$_SESSION['time_at_residence_monthErr']=$_SESSION['current_rentErr']=$_SESSION['pre_addressErr']=$_SESSION['pre_unitErr']=$_SESSION['pre_cityErr']=$_SESSION['pre_provinceErr']=$_SESSION['pre_postal_codeErr']=$_SESSION['pre_time_at_residence_yearErr']=$_SESSION['pre_time_at_residence_monthErr']=$_SESSION['pre_current_rentErr']=$_SESSION['self_emoloyedErr']=$_SESSION['revenueErr']=$_SESSION['employerErr']=$_SESSION['emp_addressErr']=$_SESSION['emp_cityErr']=$_SESSION['emp_provinceErr']=$_SESSION['emp_postal_codeErr']=$_SESSION['emp_statusErr']=$_SESSION['job_titleErr']=$_SESSION['job_typeErr']=$_SESSION['industry_sectorErr']=$_SESSION['income_typeErr']=$_SESSION['annual_incomeErr']=$_SESSION['time_at_job_yearErr']=$_SESSION['time_at_job_monthErr']=$_SESSION['pre_self_employedErr']=$_SESSION['pre_revenueErr']=$_SESSION['pre_employerErr']=$_SESSION['pre_emp_addressErr']=$_SESSION['pre_emp_cityErr']=$_SESSION['pre_emp_provinceErr']=$_SESSION['pre_emp_postal_codeErr']=$_SESSION['pre_emp_statusErr']=$_SESSION['pre_job_titleErr']=$_SESSION['pre_job_typeErr']=$_SESSION['pre_industry_sectorErr']=$_SESSION['pre_income_typeErr']=$_SESSION['pre_annual_incomeErr']=$_SESSION['pre_time_at_job_yearErr']=$_SESSION['pre_time_at_job_monthErr']=$_SESSION['other_income_1Err']=$_SESSION['other_income_2Err']=$_SESSION['other_description_1Err']=$_SESSION['other_description_2Err']=$_SESSION['np_street_nameErr']=$_SESSION['np_street_numberErr']=$_SESSION['np_street_typeErr']=$_SESSION['np_directionErr']=$_SESSION['np_unitErr']=$_SESSION['np_cityErr']=$_SESSION['np_provinceErr']=$_SESSION['np_postal_codeErr']=$_SESSION['np_year_builtErr']=$_SESSION['np_occupancyErr']=$_SESSION['np_tenureErr']=$_SESSION['np_heat_typeErr']=$_SESSION['np_lot_sizeErr']=$_SESSION['np_styleErr']=$_SESSION['np_typeErr']=$_SESSION['np_garage_sizeErr']=$_SESSION['np_garage_typeErr']=$_SESSION['np_property_ageErr']=$_SESSION['np_mlsErr']=$_SESSION['np_legal_descriptionErr']=$_SESSION['pv_purchase_priceErr']=$_SESSION['pv_appraised_valueErr']=$_SESSION['pe_annual_property_taxesErr']=$_SESSION['pe_monthly_condo_expenseErr']=$_SESSION['pe_monthly_rental_incomeErr']=$_SESSION['pe_monthly_heating_costErr']=$_SESSION['pe_monthly_insurance_feesErr']=$_SESSION['pe_rental_expensesErr']=$_SESSION['pe_annual_repairsErr']=$_SESSION['pe_monthly_hydro_expensesErr']=$_SESSION['mi_amortizationErr']=$_SESSION['mi_first_time_buyerErr']=$_SESSION['mi_closing_dateErr']=$_SESSION['mi_payment_frequencyErr']=$_SESSION['mi_termErr']=$_SESSION['mi_mortgage_amountErr']=$_SESSION['mi_down_payment_amountErr']=$_SESSION['mi_product_typeErr']=$_SESSION['mi_insuredErr']=$_SESSION['mi_insurerErr']=$_SESSION['asset_typeErr']=$_SESSION['asset_descriptionErr']=$_SESSION['asset_valueErr']=$_SESSION['down_paymentErr']=$_SESSION['li_liability_typesErr']=$_SESSION['li_liability_descriptionErr']=$_SESSION['li_credit_limitErr']=$_SESSION['li_outstanding_balanceErr']=$_SESSION['li_monthly_paymentErr']=$_SESSION['li_liability_payoffErr']=$_SESSION['li_maturity_dateErr']=$_SESSION['po_property_valueErr']=$_SESSION['po_total_mortgagesErr']=$_SESSION['po_mortgage_paymentsErr']=$_SESSION['po_total_expensesErr']=$_SESSION['po_rental_incomeErr']=$_SESSION['po_rental_expensesErr']="";
 
 
 
 $_SESSION['cofname']=$_SESSION['colname']=$_SESSION['coemail']=$_SESSION['codob']=$_SESSION['comar_status']=$_SESSION['cosin']=$_SESSION['cohome_p']=$_SESSION['cocell_p']=$_SESSION['cowork_p']=$_SESSION['cofax']=$_SESSION['copreferred_contact']=$_SESSION['cocurrently']=$_SESSION['copreferred_language']=$_SESSION['codependents']=$_SESSION['coaddress']=$_SESSION['counit']=$_SESSION['cocity']=$_SESSION['coprovince']=$_SESSION['copostal_code']=$_SESSION['cotime_at_residence_year']=$_SESSION['cotime_at_residence_month']=$_SESSION['cocurrent_rent']=$_SESSION['copre_address']=$_SESSION['copre_unit']=$_SESSION['copre_city']=$_SESSION['copre_province']=$_SESSION['copre_postal_code']=$_SESSION['copre_time_at_residence_year']=$_SESSION['copre_time_at_residence_month']=$_SESSION['copre_current_rent']=$_SESSION['coself_emoloyed']=$_SESSION['corevenue']=$_SESSION['coemployer']=$_SESSION['coemp_address']=$_SESSION['coemp_city']=$_SESSION['coemp_province']=$_SESSION['coemp_postal_code']=$_SESSION['coemp_status']=$_SESSION['cojob_title']=$_SESSION['cojob_type']=$_SESSION['coindustry_sector']=$_SESSION['coincome_type']=$_SESSION['coannual_income']=$_SESSION['cotime_at_job_year']=$_SESSION['cotime_at_job_month']=$_SESSION['copre_self_employed']=$_SESSION['copre_revenue']=$_SESSION['copre_employer']=$_SESSION['copre_emp_address']=$_SESSION['copre_emp_city']=$_SESSION['copre_emp_province']=$_SESSION['copre_emp_postal_code']=$_SESSION['copre_emp_status']=$_SESSION['copre_job_title']=$_SESSION['copre_job_type']=$_SESSION['copre_industry_sector']=$_SESSION['copre_income_type']=$_SESSION['copre_annual_income']=$_SESSION['copre_time_at_job_year']=$_SESSION['copre_time_at_job_month']=$_SESSION['coother_income_1']=$_SESSION['coother_income_2']=$_SESSION['coother_description_1']=$_SESSION['coother_description_2']="";
 
 */
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['action'])&&($_POST['action']=="goo")){
			if(empty($_POST['permission'])){
				$errors['error']="please agree to the privacy policy!";
				$errors['success']=false;
				echo json_encode($errors);
				exit();
			}
			elseif(isset($_POST['permission'])&& ($_POST['permission']=="agree")){
				$arr=array();
				foreach($_POST['my'] as $key=>$value){
				$arr[$key]=$value;
				if(empty($arr[$key])){
				$arr[$key]=$value;
				}
				else{
				$arr[$key]=test_input($value);	
				}
				}
				$_SESSION['otherinfoval']=$arr;
				
				if(isset($_POST['assetarr'])&& isset($_POST['liabilityarr'])&& isset($_POST['propertyarr'])){
	
				$assets=$_POST['assetarr'];
				$liabilities=$_POST['liabilityarr'];
				$properties=$_POST['propertyarr'];
				}
				assimilate();
				//var_dump($_SESSION);
				exit();	
			}
			else{
				$errors['error']="please agree to the privacy policy!-else";
				$errors['success']=false;
				echo json_encode($errors);
				exit();			
				
			}
	
}
elseif(isset($_POST['action'])&& ($_POST['action']=="viewAll")){
	viewAll();
	
	
}
elseif(isset($_POST['action'])&& ($_POST['action']=="delete")){
	if(isset($_POST['mortgage'])){
	deleteMortgage($_POST['mortgage']);
	}
	
}
elseif(isset($_POST['action'])&& ($_POST['action']=="approve")){
	if(isset($_POST['mortgage'])){
	approveMortgage($_POST['mortgage']);
	exit();
	//header("Location:mastermortgage.php");
	}
exit();	
}
exit();
}
elseif(isset($_REQUEST['action'])&& ($_REQUEST['action']=="print")){
	if(isset($_REQUEST['mortgage'])){
	printMortgage($_REQUEST['mortgage']);
	exit();
	//header("Location:mastermortgage.php");
	}
}



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}






function assimilate(){

$borrow=array();
$coborrow=array();
$borrow=$_SESSION['mbor'];
$coborrow=$_SESSION['cbor'];
global $assets;
global $liabilities;
global $properties;
$borentries=array();
$borentries=array_merge($_SESSION['personal'],$_SESSION['address'],$_SESSION['employment'],$_SESSION['otherincomeval'],$_SESSION['otherinfoval']);
//var_dump($borentries);
foreach($borentries as $key=>$value){
	if(array_key_exists($key,$borrow)){
		$borrow[$key]=$value;
		
	}
	
}
foreach($borentries as $key=>$value){
	if(array_key_exists($key,$coborrow)){
		$coborrow[$key]=$value;
		
	}
	
}



//var_dump($masterbor);

create($borrow,$coborrow,$assets,$liabilities,$properties);


}

function create($masterbor,$mastercobor,$assets,$liabilities,$properties){
	
	
	$servername=DB_HOST;
$username = DB_USER;
$password =DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $bool=$conn->beginTransaction();
	   $stmt=$conn->prepare("INSERT INTO mortgage() VALUES()");
	   $stmt->execute();
	   $mid=$conn->lastInsertId();
	   
	   
	   $stmt = $conn->prepare("Insert into borrower(mortgageid,fname,lname,email,dob,mar_status,sin,home_p,cell_p,work_p,fax,preferred_contact,currently,preferred_language,dependents,address,unit,city,province,postal_code,time_at_residence_year,time_at_residence_month,current_rent,pre_address,pre_unit,pre_city,pre_province,pre_postal_code,pre_time_at_residence_year,pre_time_at_residence_month,pre_current_rent,self_employed,revenue,employer,emp_address,emp_city,emp_province,emp_postal_code,emp_status,job_title,job_type,industry_sector,income_type,annual_income,time_at_job_year,time_at_job_month,pre_self_employed,pre_revenue,pre_employer,pre_emp_address,pre_emp_city,pre_emp_province,pre_emp_postal_code,pre_emp_status,pre_job_title,pre_job_type,pre_industry_sector,pre_income_type,pre_annual_income,pre_time_at_job_year,pre_time_at_job_month,other_income_1,other_income_2,other_description_1,other_description_2,np_street_number,np_street_name,np_street_type,np_direction,np_unit,np_city,np_province,np_postal_code,np_year_built,np_occupancy,np_tenure,np_heat_type,np_lot_size,np_style,np_type,np_garage_size,np_garage_type,np_property_age,np_mls,np_legal_description,pv_purchase_price,pv_appraised_value,pe_annual_property_taxes,pe_monthly_condo_expense,pe_monthly_rental_income,pe_monthly_heating_cost,pe_monthly_insurance_fees,pe_rental_expenses,pe_annual_repairs,pe_monthly_hydro_expenses,mi_amortization,mi_first_time_buyer,mi_closing_date,mi_payment_frequency,mi_term,mi_mortgage_amount,mi_down_payment_amount,mi_product_type,mi_insured,mi_insurer,other_income_frequency1,property_type,mi_rate_type,mi_comment) values(?,?,	?,	?,	?,	?,	?,	?,?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,?,?,?,?
)");
   
	$stmt->bindParam(1,$mid);
	$stmt->bindParam(2,$masterbor['fname']);
$stmt->bindParam(3,$masterbor['lname']);
$stmt->bindParam(4,$masterbor['email']);
$stmt->bindParam(5,$masterbor['dob']);
$stmt->bindParam(6,$masterbor['mar_status']);
$stmt->bindParam(7,$masterbor['sin']);
$stmt->bindParam(8,$masterbor['home_p']);
$stmt->bindParam(9,$masterbor['cell_p']);
$stmt->bindParam(10,$masterbor['work_p']);
$stmt->bindParam(11,$masterbor['fax']);
$stmt->bindParam(12,$masterbor['preferred_contact']);
$stmt->bindParam(13,$masterbor['currently']);
$stmt->bindParam(14,$masterbor['preferred_language']);
$stmt->bindParam(15,$masterbor['dependents']);
$stmt->bindParam(16,$masterbor['address']);
$stmt->bindParam(17,$masterbor['unit']);
$stmt->bindParam(18,$masterbor['city']);
$stmt->bindParam(19,$masterbor['province']);
$stmt->bindParam(20,$masterbor['postal_code']);
$stmt->bindParam(21,$masterbor['time_at_residence_year']);
$stmt->bindParam(22,$masterbor['time_at_residence_month']);
$stmt->bindParam(23,$masterbor['current_rent']);
$stmt->bindParam(24,$masterbor['pre_address']);
$stmt->bindParam(25,$masterbor['pre_unit']);
$stmt->bindParam(26,$masterbor['pre_city']);
$stmt->bindParam(27,$masterbor['pre_province']);
$stmt->bindParam(28,$masterbor['pre_postal_code']);
$stmt->bindParam(29,$masterbor['pre_time_at_residence_year']);
$stmt->bindParam(30,$masterbor['pre_time_at_residence_month']);
$stmt->bindParam(31,$masterbor['pre_current_rent']);
$stmt->bindParam(32,$masterbor['self_employed']);
$stmt->bindParam(33,$masterbor['revenue']);
$stmt->bindParam(34,$masterbor['employer']);
$stmt->bindParam(35,$masterbor['emp_address']);
$stmt->bindParam(36,$masterbor['emp_city']);
$stmt->bindParam(37,$masterbor['emp_province']);
$stmt->bindParam(38,$masterbor['emp_postal_code']);
$stmt->bindParam(39,$masterbor['emp_status']);
$stmt->bindParam(40,$masterbor['job_title']);
$stmt->bindParam(41,$masterbor['job_type']);
$stmt->bindParam(42,$masterbor['industry_sector']);
$stmt->bindParam(43,$masterbor['income_type']);
$stmt->bindParam(44,$masterbor['annual_income']);
$stmt->bindParam(45,$masterbor['time_at_job_year']);
$stmt->bindParam(46,$masterbor['time_at_job_month']);
$stmt->bindParam(47,$masterbor['pre_self_employed']);
$stmt->bindParam(48,$masterbor['pre_revenue']);
$stmt->bindParam(49,$masterbor['pre_employer']);
$stmt->bindParam(50,$masterbor['pre_emp_address']);
$stmt->bindParam(51,$masterbor['pre_emp_city']);
$stmt->bindParam(52,$masterbor['pre_emp_province']);
$stmt->bindParam(53,$masterbor['pre_emp_postal_code']);
$stmt->bindParam(54,$masterbor['pre_emp_status']);
$stmt->bindParam(55,$masterbor['pre_job_title']);
$stmt->bindParam(56,$masterbor['pre_job_type']);
$stmt->bindParam(57,$masterbor['pre_industry_sector']);
$stmt->bindParam(58,$masterbor['pre_income_type']);
$stmt->bindParam(59,$masterbor['pre_annual_income']);
$stmt->bindParam(60,$masterbor['pre_time_at_job_year']);
$stmt->bindParam(61,$masterbor['pre_time_at_job_month']);
$stmt->bindParam(62,$masterbor['other_income_1']);
$stmt->bindParam(63,$masterbor['other_income_2']);
$stmt->bindParam(64,$masterbor['other_description_1']);
$stmt->bindParam(65,$masterbor['other_description_2']);
$stmt->bindParam(66,$masterbor['np_street_number']);
$stmt->bindParam(67,$masterbor['np_street_name']);
$stmt->bindParam(68,$masterbor['np_street_type']);
$stmt->bindParam(69,$masterbor['np_direction']);
$stmt->bindParam(70,$masterbor['np_unit']);
$stmt->bindParam(71,$masterbor['np_city']);
$stmt->bindParam(72,$masterbor['np_province']);
$stmt->bindParam(73,$masterbor['np_postal_code']);
$stmt->bindParam(74,$masterbor['np_year_built']);
$stmt->bindParam(75,$masterbor['np_occupancy']);
$stmt->bindParam(76,$masterbor['np_tenure']);
$stmt->bindParam(77,$masterbor['np_heat_type']);
$stmt->bindParam(78,$masterbor['np_lot_size']);
$stmt->bindParam(79,$masterbor['np_style']);
$stmt->bindParam(80,$masterbor['np_type']);
$stmt->bindParam(81,$masterbor['np_garage_size']);
$stmt->bindParam(82,$masterbor['np_garage_type']);
$stmt->bindParam(83,$masterbor['np_property_age']);
$stmt->bindParam(84,$masterbor['np_mls']);
$stmt->bindParam(85,$masterbor['np_legal_description']);
$stmt->bindParam(86,$masterbor['pv_purchase_price']);
$stmt->bindParam(87,$masterbor['pv_appraised_value']);
$stmt->bindParam(88,$masterbor['pe_annual_property_taxes']);
$stmt->bindParam(89,$masterbor['pe_monthly_condo_expense']);
$stmt->bindParam(90,$masterbor['pe_monthly_rental_income']);
$stmt->bindParam(91,$masterbor['pe_monthly_heating_cost']);
$stmt->bindParam(92,$masterbor['pe_monthly_insurance_fees']);
$stmt->bindParam(93,$masterbor['pe_rental_expenses']);
$stmt->bindParam(94,$masterbor['pe_annual_repairs']);
$stmt->bindParam(95,$masterbor['pe_monthly_hydro_expenses']);
$stmt->bindParam(96,$masterbor['mi_amortization']);
$stmt->bindParam(97,$masterbor['mi_first_time_buyer']);
$stmt->bindParam(98,$masterbor['mi_closing_date']);
$stmt->bindParam(99,$masterbor['mi_payment_frequency']);
$stmt->bindParam(100,$masterbor['mi_term']);
$stmt->bindParam(101,$masterbor['mi_mortgage_amount']);
$stmt->bindParam(102,$masterbor['mi_down_payment_amount']);
$stmt->bindParam(103,$masterbor['mi_product_type']);
$stmt->bindParam(104,$masterbor['mi_insured']);
$stmt->bindParam(105,$masterbor['mi_insurer']);
$stmt->bindParam(106,$masterbor['other_income_frequency1']);
$stmt->bindParam(107,$masterbor['property_type']);
$stmt->bindParam(108,$masterbor['mi_rate_type']);
$stmt->bindParam(109,$masterbor['mi_comment']);
	
    $stmt->execute();
	//this has already returned an array so no need to put in another array
	//of course the while loop can be used on the receiver to output the data
	//$record=$conn->lastInsertId();
	if(!empty($_SESSION['personal']['coborr'])){
	$stmt=null;
	$stmt = $conn->prepare("Insert into coborrower (mortgageid,cofname,colname,coemail,codob,comar_status,cosin,cohome_p,cocell_p,cowork_p,cofax,copreferred_contact,cocurrently,copreferred_language,codependents,coaddress,counit,cocity,coprovince,copostal_code,cotime_at_residence_year,cotime_at_residence_month,cocurrent_rent,copre_address,copre_unit,copre_city,copre_province,copre_postal_code,copre_time_at_residence_year,copre_time_at_residence_month,copre_current_rent,coself_employed,corevenue,coemployer,coemp_address,coemp_city,coemp_province,coemp_postal_code,coemp_status,cojob_title,cojob_type,coindustry_sector,coincome_type,coannual_income,cotime_at_job_year,cotime_at_job_month,copre_self_employed,copre_revenue,copre_employer,copre_emp_address,copre_emp_city,copre_emp_province,copre_emp_postal_code,copre_emp_status,copre_job_title,copre_job_type,copre_industry_sector,copre_income_type,copre_annual_income,copre_time_at_job_year,copre_time_at_job_month,coother_income_1,coother_income_2,coother_description_1,coother_description_2,other_income_frequency2) values(?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,?)");
   	$stmt->bindValue(1,$mid);
	$stmt->bindParam(2,$mastercobor['cofname']);
$stmt->bindParam(3,$mastercobor['colname']);
$stmt->bindParam(4,$mastercobor['coemail']);
$stmt->bindParam(5,$mastercobor['codob']);
$stmt->bindParam(6,$mastercobor['comar_status']);
$stmt->bindParam(7,$mastercobor['cosin']);
$stmt->bindParam(8,$mastercobor['cohome_p']);
$stmt->bindParam(9,$mastercobor['cocell_p']);
$stmt->bindParam(10,$mastercobor['cowork_p']);
$stmt->bindParam(11,$mastercobor['cofax']);
$stmt->bindParam(12,$mastercobor['copreferred_contact']);
$stmt->bindParam(13,$mastercobor['cocurrently']);
$stmt->bindParam(14,$mastercobor['copreferred_language']);
$stmt->bindParam(15,$mastercobor['codependents']);
$stmt->bindParam(16,$mastercobor['coaddress']);
$stmt->bindParam(17,$mastercobor['counit']);
$stmt->bindParam(18,$mastercobor['cocity']);
$stmt->bindParam(19,$mastercobor['coprovince']);
$stmt->bindParam(20,$mastercobor['copostal_code']);
$stmt->bindParam(21,$mastercobor['cotime_at_residence_year']);
$stmt->bindParam(22,$mastercobor['cotime_at_residence_month']);
$stmt->bindParam(23,$mastercobor['cocurrent_rent']);
$stmt->bindParam(24,$mastercobor['copre_address']);
$stmt->bindParam(25,$mastercobor['copre_unit']);
$stmt->bindParam(26,$mastercobor['copre_city']);
$stmt->bindParam(27,$mastercobor['copre_province']);
$stmt->bindParam(28,$mastercobor['copre_postal_code']);
$stmt->bindParam(29,$mastercobor['copre_time_at_residence_year']);
$stmt->bindParam(30,$mastercobor['copre_time_at_residence_month']);
$stmt->bindParam(31,$mastercobor['copre_current_rent']);
$stmt->bindParam(32,$mastercobor['coself_employed']);
$stmt->bindParam(33,$mastercobor['corevenue']);
$stmt->bindParam(34,$mastercobor['coemployer']);
$stmt->bindParam(35,$mastercobor['coemp_address']);
$stmt->bindParam(36,$mastercobor['coemp_city']);
$stmt->bindParam(37,$mastercobor['coemp_province']);
$stmt->bindParam(38,$mastercobor['coemp_postal_code']);
$stmt->bindParam(39,$mastercobor['coemp_status']);
$stmt->bindParam(40,$mastercobor['cojob_title']);
$stmt->bindParam(41,$mastercobor['cojob_type']);
$stmt->bindParam(42,$mastercobor['coindustry_sector']);
$stmt->bindParam(43,$mastercobor['coincome_type']);
$stmt->bindParam(44,$mastercobor['coannual_income']);
$stmt->bindParam(45,$mastercobor['cotime_at_job_year']);
$stmt->bindParam(46,$mastercobor['cotime_at_job_month']);
$stmt->bindParam(47,$mastercobor['copre_self_employed']);
$stmt->bindParam(48,$mastercobor['copre_revenue']);
$stmt->bindParam(49,$mastercobor['copre_employer']);
$stmt->bindParam(50,$mastercobor['copre_emp_address']);
$stmt->bindParam(51,$mastercobor['copre_emp_city']);
$stmt->bindParam(52,$mastercobor['copre_emp_province']);
$stmt->bindParam(53,$mastercobor['copre_emp_postal_code']);
$stmt->bindParam(54,$mastercobor['copre_emp_status']);
$stmt->bindParam(55,$mastercobor['copre_job_title']);
$stmt->bindParam(56,$mastercobor['copre_job_type']);
$stmt->bindParam(57,$mastercobor['copre_industry_sector']);
$stmt->bindParam(58,$mastercobor['copre_income_type']);
$stmt->bindParam(59,$mastercobor['copre_annual_income']);
$stmt->bindParam(60,$mastercobor['copre_time_at_job_year']);
$stmt->bindParam(61,$mastercobor['copre_time_at_job_month']);
$stmt->bindParam(62,$mastercobor['coother_income_1']);
$stmt->bindParam(63,$mastercobor['coother_income_2']);
$stmt->bindParam(64,$mastercobor['coother_description_1']);
$stmt->bindParam(65,$mastercobor['coother_description_2']);
$stmt->bindParam(66,$mastercobor['other_income_frequency2']);

    $stmt->execute();
	}
		if(!empty($assets)){

    $stmt = $conn->prepare("Insert into asset (mortgageid,type,description,value,downpayment) values(?,?,	?,	?,	?)");
    $count=2;
	$flag=1;
	$stmt->bindValue(1,$mid);
	foreach($assets as $key=>$value){
		
	$stmt->bindValue($count,$value);
	//echo "$count"."   ".$key." => ".$value;
	//echo"<br/>";
	
	$count=$count+1;
	
	if(($flag%4)==0){
		$stmt->execute();
		$stmt->bindValue(1,$mid);
		$count=2;
		
	}
	$flag++;
	//echo "$count".$value;
	}	
	//echo "success insert";		 
		}
			
	if(!empty($liabilities)){
	$stmt = $conn->prepare("Insert into liability (mortgageid,liab_type,liab_description,credit_limit,outstanding_balance,monthly_payment,liab_payoff,maturity_date) values(?,?,	?,	?,	?,?,?,?)");
    $count=2;
	$flag=1;
	$stmt->bindValue(1,$mid);
	foreach($liabilities as $key=>$value){
		
	$stmt->bindValue($count,$value);
	//echo "$count"."   ".$key." => ".$value;
	//echo"<br/>";
	
	$count=$count+1;
	
	if(($flag%7)==0){
		$stmt->execute();
		$stmt->bindValue(1,$mid);
		$count=2;
		
	}
	$flag++;
	//echo "$count".$value;
	}	
	//echo "success insert";			
	}
	
	if(!empty($properties)){
	$stmt = $conn->prepare("Insert into property_owned (mortgageid,property_value,total_mortgages,mortgage_payments,total_expenses,rental_income
,rental_expenses) values(?,?,?,?,?,?,?)");
    $count=2;
	$flag=1;
	$stmt->bindValue(1,$mid);
	foreach($properties as $key=>$value){
		
	$stmt->bindValue($count,$value);
	//echo "$count"."   ".$key." => ".$value;
	//echo"<br/>";
	
	$count=$count+1;
	
	if(($flag%6)==0){
		$stmt->execute();
		$stmt->bindValue(1,$mid);
		$count=2;
		
	}
	$flag++;
	//echo "$count".$value;
	}	
	}
     $boo=$conn->commit();
		//$dd=$_SESSION['personal']['email'];
		$cc=$_SESSION['personal']['fname'];
	if(isset($_SESSION['login_userid']) && isset($_SESSION['login_username'])){
		$aa=$_SESSION['login_userid'];
		$bb=$_SESSION['login_username'];
		session_unset();
		$_SESSION['login_userid']=$aa;
		$_SESSION['login_username']=$bb;
		
		
	}
	else{
		
		session_unset();
		
	}
	
	$errors['success']=true;
	$errors['mortgageid']=$mid;
	
	applymail($cc,$mid);
	//$handle = fopen("http://www.forshorelending.com", "r");
	//redie("http://www.forshorelending.com");
	
}
	catch(PDOException $e){
		$conn->rollBack();
		$errors['success']=false;
		$errors['message']="We do apologise. Your application could not be submitted. Admin was notified. Please try again.";
		 $dt = date("Y-m-d H:i:s (T)");
		 $mess=$dt."=>".$e;
		error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
		}


$conn=null;	
echo json_encode($errors);
	//unset($borentries);
	//unset$_SESSION['personal'],$_SESSION['address'],$_SESSION['employment'],$_SESSION['otherincomeval'],$_SESSION['otherinfoval']);)
	exit();
	
	}


function viewAll(){
	$servername =DB_HOST;
$username = DB_USER;
$password =DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
		try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT COUNT(mortgageid)AS d from mortgage");
				$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
		$rows=$res[0]['d'];	
		$page_rows=5;
		$last = ceil($rows/$page_rows);
		if($last < 1){
		$last = 1;
		}
		$pagenum = 1;
		if(isset($_POST['pagenum'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_POST['pagenum']);
		}
		// This makes sure the page number isn't below 1, or more than our $last page
		if ($pagenum < 1) { 
		$pagenum = 1; 
		} elseif ($pagenum > $last) { 
			$pagenum = $last; 
			}
			// This sets the range of rows to query for the chosen $pagenum
		$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
		$stmt=null;
		$res=null;
		$stmt=$conn->prepare("SELECT mortgage.mortgageid,mortgage.approved,borrower.fname,borrower.lname,borrower.email,borrower.home_p,coborrower.cofname,coborrower.colname FROM mortgage LEFT JOIN borrower ON mortgage.mortgageid=borrower.mortgageid LEFT JOIN coborrower ON mortgage.mortgageid=coborrower.mortgageid ORDER by mortgage.date DESC $limit");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
		$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Application Id</th><th>Borrower first name</th><th>Borrower last name</th><th>borrower email</th><th>borrower phone</th><th>coborrower name</th><th>coborrower lastname</th><th>Status</th></tr></thead><tbody>";
		foreach($res as $row){
			 $out.= "<tr data-mortgageid=".$row['mortgageid']." ><td>".
        $row['mortgageid'].
        "</td><td>".
		$row['fname'].
        "</td><td>".
		$row['lname'].
        "</td><td>".
		$row['email'].
        "</td><td>".
		$row['home_p'].
        "</td><td>".
		$row['cofname'].
        "</td><td>".
		$row['colname'].
        "</td><td>".
		$row['approved'].
        "</td>";
			$out.="<td><button onclick='approveMortgage(".$row['mortgageid'].")'>Approve/Deny</button>";
			$out.="<td><button onclick='deleteMortgage(".$row['mortgageid'].")'>Delete</button>";
			//$out.="<td><a href='morController.php?action=view&id=".$row['mortgageid']."'<button class='btn btn-success' type='button'>view</button></a></tr>";
			//$out.="<td><button onclick='approveMortgage(".$row['mortgageid'].")'>Approve</button>";
			//$out.="<td><button onclick='prepareContract(".$row['mortgageid'].")'>Prepare contract</button>";
			$out.="<td><button class='btn btn-success' onclick='printMortgage(".$row['mortgageid'].")' type='button'>print</button></tr>";
				
				}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='viewmortgages(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;	
			}
		}
			else{
			echo "No records found";	
				
			}
		}
		catch(PDOException $e){
			echo $e;
		}
			
			$conn=null;
			
			
	
	
	
	
	
}	



function printMortgage($id){
	$servername =DB_HOST;
$username = DB_USER;
$password =DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
		try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * from borrower where mortgageid=$id");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
			//echo json_encode($res);
		foreach($res as $key=>$value){
			
			$_SESSION[$key]=$value;
			
			
			
			}
		}
		else{
			$errors['error']="sorry no records found";
			$errrors['success']=false;
			echo json_encode($errors);
			exit();
		}
		$stmt=null;
		$res=null;
		$stmt=$conn->prepare("SELECT * from coborrower where mortgageid=$id");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
		
			foreach($res as $key=>$value){
			 $_SESSION[$key]=$value;
			
			
			}
			//echo json_encode($res);
		
		}
		$stmt=null;
		$res=null;
		$stmt=$conn->prepare("SELECT * from asset where mortgageid=$id");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
		
		foreach($res as $a){
		 $out='<script language="javascript" type="text/javascript">';
		$out.='var hiddenField = document.createElement("div");';
		$out.="\n";
		$out1=<<<EOT
		$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='asset[]' value='$a[type]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='asset[]' value='$a[description]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Value:</label><input type='text' class='form-control' name='asset[]' value='$a[value]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Downpayment:</label><input type='text' name='asset[]' value='$a[downpayment]'  class='form-control' /><span class='error'>* </span></span></div>");
EOT;
	
	$out.=$out1.'var f=document.getElementById("assetholder"); f.appendChild(hiddenField);';
	$out.='</script>';	
//EOT;
echo $out;
		}	
		
		
		}
		$stmt=null;
		$res=null;
		$stmt=$conn->prepare("SELECT * from liability where mortgageid=$id");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_BOTH);
		if($res){
		
		foreach($res as $a){
		$out2='<script language="javascript" type="text/javascript">';
		$out2.='var hiddenField = document.createElement("div");';
		$out2.="\n";
		$out3=<<<EOT
		$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='liability[]' value='$a[liab_type]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='liability[]' value='$a[liab_description]' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Credit limit:</label><input type='text' class='form-control' name='liability[]' value='$a[credit_limit]' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Outstanding balance:</label><input type='text' name='liability[]' value='$a[outstanding_balance]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>monthly payment:</label><input type='text' name='liability[]' value='$a[monthly_payment]' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Liability payoff:</label><input type='text' name='liability[]' value='$a[liab_payoff]' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Maturity date:</label><input type='text' name='liability[]' value='$a[maturity_date]' class='form-control' /><span class='error'>* </span></span></div>");
EOT;
	
	$out2.=$out3.'var f=document.getElementById("liabilityholder"); f.appendChild(hiddenField);';
	$out2.='</script>';	
//EOT;
echo $out2;
			}
		
		}
		$stmt=null;
		$res=null;
		$stmt=$conn->prepare("SELECT * from property_owned where mortgageid=$id");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_BOTH);
		if($res){
		
		foreach($res as $a){
			$out4='<script language="javascript" type="text/javascript">';
		$out4.='var hiddenField = document.createElement("div");';
		$out4.="\n";
		$out5=<<<EOT
		$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Property value:</label><input type='text' class='form-control' name='propertyo[]' value='$a[propertyvalue]' /><span class='error'>*</span></span><span class='nextto col-sm-2'><label class=''>Total mortgages</label><input type='text' name='propertyo[]' value='$a[total_mortgages]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>mortgage payments:</label><input type='text' class='form-control' name='propertyo[]' value='$a[mortgage_payments]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>total expenses:</label><input type='text' name='propertyo[]' value='$a[total_expenses]' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental income:</label><input type='text' class='form-control' name='propertyo[]' value='$a[rental_income]' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental_expenses:</label><input type='text' name='propertyo[]' value='$a[rental_expenses]' class='form-control' /><span class='error'>* </span></span></div>");
EOT;
	
	$out4.=$out5.'var f=document.getElementById("propertyholder"); f.appendChild(hiddenField);';
	$out4.='</script>';	
//EOT;
echo $out4;
			}
		
		}
		//echo "success";
		
		}
		catch(PDOException $e){}
			
			$conn=null;
			
		exit();	
	
	
	
	
	
}	

function deleteMortgage($loanid){
	$res="";
		
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("DELETE from mortgage where mortgageid=:d");	
				$stmt->bindParam(":d",$loanid);
				$stmt->execute();
				echo "success! Application deleted.";
		}
		catch(PDOException $e){
			echo $e;
			}
		$conn=null;
	
}


function applymail($name,$morid){
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.forshorelending.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loans@forshorelending.com';                 // SMTP username
$mail->Password = 'Abraham_123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
//$mail->confirmReadingTo='loans@forshorelending.com';
//$mail->addReplyTo('loans@forshorelending.com','reply');
$mail->setFrom('loans@forshorelending.com', 'forshorelending');
$mail->addAddress('loans@forshorelending.com', "Admin");  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'A mortgage application was submitted!';
$mail->Body    = "A mortgage application was submitted by <b>$$name<b> and the application id is: <b>$morid<b>";
$mail->AltBody = "A mortgage application was submitted by <b>$$name<b> and the application id is: <b>$morid<b>";

if(!$mail->send()) {
    
  //   'Message could not be sent.';
  $mail->ErrorInfo;
  $dt = date("Y-m-d H:i:s (T)");
$mess=$dt."=>"."from morcontroller.php mail not sent";
error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
return;
} else {
   // echo 'Message has been sent';
    
}
//return;

	
	
	}
	
function redie($url){
$ch = curl_init();

curl_setopt_array(
    $ch, array( 
    CURLOPT_URL =>$url,
     CURLOPT_RETURNTRANSFER =>false,         // return web page 
	 CURLOPT_COOKIESESSION=>true,
	 CURLOPT_FORBID_REUSE=>true,
        CURLOPT_HEADER         => false,        // don't return headers 
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
        CURLOPT_ENCODING       => "",           // handle all encodings 
       
        CURLOPT_AUTOREFERER    => false,         // set referer on redirect 
        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
        CURLOPT_TIMEOUT        => 120,          // timeout on response 
        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects 
        CURLOPT_POST            => 0,            // i am sending post data 
             // this are my post vars 
        CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl 
        CURLOPT_SSL_VERIFYPEER => false,        // 
       // CURLOPT_VERBOSE        => 0        
));
// execute
$output = curl_exec($ch);
echo curl_error($ch);

// free
curl_close($ch);
var_dump(debug_backtrace());	






}

function approveMortgage($mid){
	$a=(int)$mid;
	
		$res="";
		$userid=1;
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
			$decis="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT approved FROM mortgage WHERE mortgageid=:ap");	
				$stmt->bindParam(":ap",$a);
				$stmt->execute();
				$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
				if($res){
					foreach($res as $row){
					$decis=$row['approved'];	
					}
					if($decis=='no'){
						$stmt=null;
					$stmt=$conn->prepare("UPDATE mortgage SET approved='yes' WHERE mortgageid=:app");		
					}
					else{
						$stmt=null;
					$stmt=$conn->prepare("UPDATE mortgage SET approved='no' WHERE mortgageid=:app");		
						
					}
				$stmt->bindParam(":app",$a);
				$stmt->execute();
		
				echo "Change successful";
				}
				else{
				echo "no records found";	
					
				}
				
				
				}
				catch(PDOException $e){
				echo $e;
				}
				$conn=null;
				exit();
				}			
	
	
	
?>

<?php
session_start();
	$masterbor=array();
$masterbor['fname']=$masterbor['lname']=$masterbor['email']=$masterbor['dob']=$masterbor['mar_status']=$masterbor['sin']=$masterbor['home_p']=$masterbor['cell_p']=$masterbor['work_p']=$masterbor['fax']=$masterbor['preferred_contact']=$masterbor['currently']=$masterbor['preferred_language']=$masterbor['dependents']=$masterbor['address']=$masterbor['unit']=$masterbor['city']=$masterbor['province']=$masterbor['postal_code']=$masterbor['time_at_residence_year']=$masterbor['time_at_residence_month']=$masterbor['current_rent']=$masterbor['pre_address']=$masterbor['pre_unit']=$masterbor['pre_city']=$masterbor['pre_province']=$masterbor['pre_postal_code']=$masterbor['pre_time_at_residence_year']=$masterbor['pre_time_at_residence_month']=$masterbor['pre_current_rent']=$masterbor['self_employed']=$masterbor['revenue']=$masterbor['employer']=$masterbor['emp_address']=$masterbor['emp_city']=$masterbor['emp_province']=$masterbor['emp_postal_code']=$masterbor['emp_status']=$masterbor['job_title']=$masterbor['job_type']=$masterbor['industry_sector']=$masterbor['income_type']=$masterbor['annual_income']=$masterbor['time_at_job_year']=$masterbor['time_at_job_month']=$masterbor['pre_self_employed']=$masterbor['pre_revenue']=$masterbor['pre_employer']=$masterbor['pre_emp_address']=$masterbor['pre_emp_city']=$masterbor['pre_emp_province']=$masterbor['pre_emp_postal_code']=$masterbor['pre_emp_status']=$masterbor['pre_job_title']=$masterbor['pre_job_type']=$masterbor['pre_industry_sector']=$masterbor['pre_income_type']=$masterbor['pre_annual_income']=$masterbor['pre_time_at_job_year']=$masterbor['pre_time_at_job_month']=$masterbor['other_income_frequency1']=$masterbor['other_income_1']=$masterbor['other_income_2']=$masterbor['other_description_1']=$masterbor['other_description_2']=$masterbor['np_street_number']=$masterbor['np_street_name']=$masterbor['np_street_type']=$masterbor['np_direction']=$masterbor['np_unit']=$masterbor['np_city']=$masterbor['np_province']=$masterbor['np_postal_code']=$masterbor['np_year_built']=$masterbor['np_occupancy']=$masterbor['np_tenure']=$masterbor['np_heat_type']=$masterbor['np_lot_size']=$masterbor['np_style']=$masterbor['np_type']=$masterbor['np_garage_size']=$masterbor['np_garage_type']=$masterbor['np_property_age']=$masterbor['np_mls']=$masterbor['np_legal_description']=$masterbor['property_type']=$masterbor['pv_purchase_price']=$masterbor['pv_appraised_value']=$masterbor['pe_annual_property_taxes']=$masterbor['pe_monthly_condo_expense']=$masterbor['pe_monthly_rental_income']=$masterbor['pe_monthly_heating_cost']=$masterbor['pe_monthly_insurance_fees']=$masterbor['pe_rental_expenses']=$masterbor['pe_annual_repairs']=$masterbor['pe_monthly_hydro_expenses']=$masterbor['mi_amortization']=$masterbor['mi_first_time_buyer']=$masterbor['mi_closing_date']=$masterbor['mi_payment_frequency']=$masterbor['mi_term']=$masterbor['mi_mortgage_amount']=$masterbor['mi_down_payment_amount']=$masterbor['mi_product_type']=$masterbor['mi_insured']=$masterbor['mi_insurer']=$masterbor['mi_rate_type']=$masterbor['mi_comment']="";
$_SESSION['mbor']=$masterbor;

$mastercobor=array();
$mastercobor['coborrowerid']=$mastercobor['mortgageid']=$mastercobor['cofname']=$mastercobor['colname']=$mastercobor['coemail']=$mastercobor['codob']=$mastercobor['comar_status']=$mastercobor['cosin']=$mastercobor['cohome_p']=$mastercobor['cocell_p']=$mastercobor['cowork_p']=$mastercobor['cofax']=$mastercobor['copreferred_contact']=$mastercobor['cocurrently']=$mastercobor['copreferred_language']=$mastercobor['codependents']=$mastercobor['coaddress']=$mastercobor['counit']=$mastercobor['cocity']=$mastercobor['coprovince']=$mastercobor['copostal_code']=$mastercobor['cotime_at_residence_year']=$mastercobor['cotime_at_residence_month']=$mastercobor['cocurrent_rent']=$mastercobor['copre_address']=$mastercobor['copre_unit']=$mastercobor['copre_city']=$mastercobor['copre_province']=$mastercobor['copre_postal_code']=$mastercobor['copre_time_at_residence_year']=$mastercobor['copre_time_at_residence_month']=$mastercobor['copre_current_rent']=$mastercobor['coself_emoloyed']=$mastercobor['corevenue']=$mastercobor['coemployer']=$mastercobor['coemp_address']=$mastercobor['coemp_city']=$mastercobor['coemp_province']=$mastercobor['coemp_postal_code']=$mastercobor['coemp_status']=$mastercobor['cojob_title']=$mastercobor['cojob_type']=$mastercobor['coindustry_sector']=$mastercobor['coincome_type']=$mastercobor['coannual_income']=$mastercobor['cotime_at_job_year']=$mastercobor['cotime_at_job_month']=$mastercobor['copre_self_employed']=$mastercobor['copre_revenue']=$mastercobor['copre_employer']=$mastercobor['copre_emp_address']=$mastercobor['copre_emp_city']=$mastercobor['copre_emp_province']=$mastercobor['copre_emp_postal_code']=$mastercobor['copre_emp_status']=$mastercobor['copre_job_title']=$mastercobor['copre_job_type']=$mastercobor['copre_industry_sector']=$mastercobor['copre_income_type']=$mastercobor['copre_annual_income']=$mastercobor['copre_time_at_job_year']=$mastercobor['copre_time_at_job_month']=$mastercobor['other_income_frequency2']=$mastercobor['coother_income_1']=$mastercobor['coother_income_2']=$mastercobor['coother_description_1']=$mastercobor['coother_description_2']="";
$_SESSION['cbor']=$mastercobor;
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['otherincomeval'])){
	unset($_SESSION['otherincomeval']);
	
}
//$fname=$_POST['lname'];
$otherarr=array();
//$arr['fname']="jack";
//header("Location:mor.php");
//$arr=$_POST['dat'];
foreach($_POST['dat'] as $key=>$value){
	
	if(empty($value)){
	$otherarr[$key]=$value;
	}
	else{
		$otherarr[$key]=test_input($value);	
	}
}
$_SESSION['otherincomeval']=$otherarr;
//echo json_encode($otherarr);
exit();
//echo json_encode($_SESSION['personal']["fname"]);
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}




?>
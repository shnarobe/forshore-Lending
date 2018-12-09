<?php
session_start();
$fname=$lname=$email=$dob=$mar_status=$sin=$home_p=$cell_p=$work_p=$fax=$preferred_contact=$currently=$preferred_language=$dependents=$address=$unit=$city=$province=$postal_code=$time_at_residence_year=$time_at_residence_month=$current_rent=$pre_address=$pre_unit=$pre_city=$pre_province=$pre_postal_code=$pre_time_at_residence_year=$pre_time_at_residence_month=$pre_current_rent=$self_emoloyed=$revenue=$employer=$emp_address=$emp_city=$emp_province=$emp_postal_code=$emp_status=$job_title=$job_type=$industry_sector=$income_type=$annual_income=$time_at_job_year=$time_at_job_month=$pre_self_employed=$pre_revenue=$pre_employer=$pre_emp_address=$pre_emp_city=$pre_emp_province=$pre_emp_postal_code=$pre_emp_status=$pre_job_title=$pre_job_type=$pre_industry_sector=$pre_income_type=$pre_annual_income=$pre_time_at_job_year=$pre_time_at_job_month=$other_income_1=$other_income_2=$other_description_1=$other_description_2=$np_street_name=$np_street_type=$np_direction=$np_unit=$np_city=$np_province=$np_postal_code=$np_year_built=$np_occupancy=$np_tenure=$np_heat_type=$np_lot_size=$np_style=$np_type=$np_garage_size=$np_garage_type=$np_property_age=$np_mls=$np_legal_description=$pv_purchase_price=$pv_appraised_value=$pe_annual_property_taxes=$pe_monthly_condo_expense=$pe_monthly_rental_income=$pe_monthly_heating_cost=$pe_monthly_insurance_fees=$pe_rental_expenses=$pe_annual_repairs=$pe_monthly_hydro_expenses=$mi_amortization=$mi_first_time_buyer=$mi_closing_date=$mi_payment_frequency=$mi_term=$mi_mortgage_amount=$mi_down_payment_amount=$mi_product_type=$mi_insured=$mi_insurer="";

$fnameErr=$lnameErr=$emailErr=$dobErr=$mar_statusErr=$sinErr=$home_pErr=$cell_pErr=$work_pErr=$faxErr=$preferred_contactErr=$currentlyErr=$preferred_languageErr=$dependentsErr=$addressErr=$unitErr=$cityErr=$provinceErr=$postal_codeErr=$time_at_residence_yearErr=$time_at_residence_monthErr=$current_rentErr=$pre_addressErr=$pre_unitErr=$pre_cityErr=$pre_provinceErr=$pre_postal_codeErr=$pre_time_at_residence_yearErr=$pre_time_at_residence_monthErr=$pre_current_rentErr=$self_emoloyedErr=$revenueErr=$employerErr=$emp_addressErr=$emp_cityErr=$emp_provinceErr=$emp_postal_codeErr=$emp_statusErr=$job_titleErr=$job_typeErr=$industry_sectorErr=$income_typeErr=$annual_incomeErr=$time_at_job_yearErr=$time_at_job_monthErr=$pre_self_employedErr=$pre_revenueErr=$pre_employerErr=$pre_emp_addressErr=$pre_emp_cityErr=$pre_emp_provinceErr=$pre_emp_postal_codeErr=$pre_emp_statusErr=$pre_job_titleErr=$pre_job_typeErr=$pre_industry_sectorErr=$pre_income_typeErr=$pre_annual_incomeErr=$pre_time_at_job_yearErr=$pre_time_at_job_monthErr=$other_income_1Err=$other_income_2Err=$other_description_1Err=$other_description_2Err="";


$cofname=$colname=$coemail=$codob=$comar_status=$cosin=$cohome_p=$cocell_p=$cowork_p=$cofax=$copreferred_contact=$cocurrently=$copreferred_language=$codependents=$coaddress=$counit=$cocity=$coprovince=$copostal_code=$cotime_at_residence_year=$cotime_at_residence_month=$cocurrent_rent=$copre_address=$copre_unit=$copre_city=$copre_province=$copre_postal_code=$copre_time_at_residence_year=$copre_time_at_residence_month=$copre_current_rent=$coself_emoloyed=$corevenue=$coemployer=$coemp_address=$coemp_city=$coemp_province=$coemp_postal_code=$coemp_status=$cojob_title=$cojob_type=$coindustry_sector=$coincome_type=$coannual_income=$cotime_at_job_year=$cotime_at_job_month=$copre_self_employed=$copre_revenue=$copre_employer=$copre_emp_address=$copre_emp_city=$copre_emp_province=$copre_emp_postal_code=$copre_emp_status=$copre_job_title=$copre_job_type=$copre_industry_sector=$copre_income_type=$copre_annual_income=$copre_time_at_job_year=$copre_time_at_job_month=$coother_income_1=$coother_income_2=$coother_description_1=$coother_description_2="";

$cofnameErr=$colnameErr=$coemailErr=$codobErr=$comar_statusErr=$cosinErr=$cohome_pErr=$cocell_pErr=$cowork_pErr=$cofaxErr=$copreferred_contactErr=$cocurrentlyErr=$copreferred_languageErr=$codependentsErr=$coaddressErr=$counitErr=$cocityErr=$coprovinceErr=$copostal_codeErr=$cotime_at_residence_yearErr=$cotime_at_residence_monthErr=$cocurrent_rentErr=$copre_addressErr=$copre_unitErr=$copre_cityErr=$copre_provinceErr=$copre_postal_codeErr=$copre_time_at_residence_yearErr=$copre_time_at_residence_monthErr=$copre_current_rentErr=$coself_emoloyedErr=$corevenueErr=$coemployerErr=$coemp_addressErr=$coemp_cityErr=$coemp_provinceErr=$coemp_postal_codeErr=$coemp_statusErr=$cojob_titleErr=$cojob_typeErr=$coindustry_sectorErr=$coincome_typeErr=$coannual_incomeErr=$cotime_at_job_yearErr=$cotime_at_job_monthErr=$copre_self_employedErr=$copre_revenueErr=$copre_employerErr=$copre_emp_addressErr=$copre_emp_cityErr=$copre_emp_provinceErr=$copre_emp_postal_codeErr=$copre_emp_statusErr=$copre_job_titleErr=$copre_job_typeErr=$copre_industry_sectorErr=$copre_income_typeErr=$copre_annual_incomeErr=$copre_time_at_job_yearErr=$copre_time_at_job_monthErr=$coother_income_1Err=$coother_income_2Err=$coother_description_1Err=$coother_description_2Err="";




//bororower
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$mar_status=$_POST['mar_status'];
$sin=$_POST['sin'];
$home_p=$_POST['home_p'];
$cell_p=$_POST['cell_p'];
$work_p=$_POST['work_p'];
$fax=$_POST['fax'];
$preferred_contact=$_POST['preferred_contact'];
$currently=$_POST['currently'];
$preferred_language=$_POST['preferred_language'];
$dependents=$_POST['dependents'];
$address=$_POST['address'];
$unit=$_POST['unit'];
$city=$_POST['city'];
$province=$_POST['province'];
$postal_code=$_POST['postal_code'];
$time_at_residence_year=$_POST['time_at_residence_year'];
$time_at_residence_month=$_POST['time_at_residence_month'];
$current_rent=$_POST['current_rent'];
$pre_address=$_POST['pre_address'];
$pre_unit=$_POST['pre_unit'];
$pre_city=$_POST['pre_city'];
$pre_province=$_POST['pre_province'];
$pre_postal_code=$_POST['pre_postal_code'];
$pre_time_at_residence_year=$_POST['pre_time_at_residence_year'];
$pre_time_at_residence_month=$_POST['pre_time_at_residence_month'];
$pre_current_rent=$_POST['pre_current_rent'];
$self_emoloyed=$_POST['self_emoloyed'];
$revenue=$_POST['revenue'];
$employer=$_POST['employer'];
$emp_address=$_POST['emp_address'];
$emp_city=$_POST['emp_city'];
$emp_province=$_POST['emp_province'];
$emp_postal_code=$_POST['emp_postal_code'];
$emp_status=$_POST['emp_status'];
$job_title=$_POST['job_title'];
$job_type=$_POST['job_type'];
$industry_sector=$_POST['industry_sector'];
$income_type=$_POST['income_type'];
$annual_income=$_POST['annual_income'];
$time_at_job_year=$_POST['time_at_job_year'];
$time_at_job_month=$_POST['time_at_job_month'];
$pre_self_employed=$_POST['pre_self_employed'];
$pre_revenue=$_POST['pre_revenue'];
$pre_employer=$_POST['pre_employer'];
$pre_emp_address=$_POST['pre_emp_address'];
$pre_emp_city=$_POST['pre_emp_city'];
$pre_emp_province=$_POST['pre_emp_province'];
$pre_emp_postal_code=$_POST['pre_emp_postal_code'];
$pre_emp_status=$_POST['pre_emp_status'];
$pre_job_title=$_POST['pre_job_title'];
$pre_job_type=$_POST['pre_job_type'];
$pre_industry_sector=$_POST['pre_industry_sector'];
$pre_income_type=$_POST['pre_income_type'];
$pre_annual_income=$_POST['pre_annual_income'];
$pre_time_at_job_year=$_POST['pre_time_at_job_year'];
$pre_time_at_job_month=$_POST['pre_time_at_job_month'];
$other_income_1=$_POST['other_income_1'];
$other_income_2=$_POST['other_income_2'];
$other_description_1=$_POST['other_description_1'];
$other_description_2=$_POST['other_description_2'];
$np_street_name=$_POST['np_street_name'];
$np_street_type=$_POST['np_street_type'];
$np_direction=$_POST['np_direction'];
$np_unit=$_POST['np_unit'];
$np_city=$_POST['np_city'];
$np_province=$_POST['np_province'];
$np_postal_code=$_POST['np_postal_code'];
$np_year_built=$_POST['np_year_built'];
$np_occupancy=$_POST['np_occupancy'];
$np_tenure=$_POST['np_tenure'];
$np_heat_type=$_POST['np_heat_type'];
$np_lot_size=$_POST['np_lot_size'];
$np_style=$_POST['np_style'];
$np_type=$_POST['np_type'];
$np_garage_size=$_POST['np_garage_size'];
$np_garage_type=$_POST['np_garage_type'];
$np_property_age=$_POST['np_property_age'];
$np_mls=$_POST['np_mls'];
$np_legal_description=$_POST['np_legal_description'];
$pv_purchase_price=$_POST['pv_purchase_price'];
$pv_appraised_value=$_POST['pv_appraised_value'];
$pe_annual_property_taxes=$_POST['pe_annual_property_taxes'];
$pe_monthly_condo_expense=$_POST['pe_monthly_condo_expense'];
$pe_monthly_rental_income=$_POST['pe_monthly_rental_income'];
$pe_monthly_heating_cost=$_POST['pe_monthly_heating_cost'];
$pe_monthly_insurance_fees=$_POST['pe_monthly_insurance_fees'];
$pe_rental_expenses=$_POST['pe_rental_expenses'];
$pe_annual_repairs=$_POST['pe_annual_repairs'];
$pe_monthly_hydro_expenses=$_POST['pe_monthly_hydro_expenses'];
$mi_amortization=$_POST['mi_amortization'];
$mi_first_time_buyer=$_POST['mi_first_time_buyer'];
$mi_closing_date=$_POST['mi_closing_date'];
$mi_payment_frequency=$_POST['mi_payment_frequency'];
$mi_term=$_POST['mi_term'];
$mi_mortgage_amount=$_POST['mi_mortgage_amount'];
$mi_down_payment_amount=$_POST['mi_down_payment_amount'];
$mi_product_type=$_POST['mi_product_type'];
$mi_insured=$_POST['mi_insured'];
$mi_insurer=$_POST['mi_insurer'];


//coborrower
$cofname=$_POST['cofname'];
$colname=$_POST['colname'];
$coemail=$_POST['coemail'];
$codob=$_POST['codob'];
$comar_status=$_POST['comar_status'];
$cosin=$_POST['cosin'];
$cohome_p=$_POST['cohome_p'];
$cocell_p=$_POST['cocell_p'];
$cowork_p=$_POST['cowork_p'];
$cofax=$_POST['cofax'];
$copreferred_contact=$_POST['copreferred_contact'];
$cocurrently=$_POST['cocurrently'];
$copreferred_language=$_POST['copreferred_language'];
$codependents=$_POST['codependents'];
$coaddress=$_POST['coaddress'];
$counit=$_POST['counit'];
$cocity=$_POST['cocity'];
$coprovince=$_POST['coprovince'];
$copostal_code=$_POST['copostal_code'];
$cotime_at_residence_year=$_POST['cotime_at_residence_year'];
$cotime_at_residence_month=$_POST['cotime_at_residence_month'];
$cocurrent_rent=$_POST['cocurrent_rent'];
$copre_address=$_POST['copre_address'];
$copre_unit=$_POST['copre_unit'];
$copre_city=$_POST['copre_city'];
$copre_province=$_POST['copre_province'];
$copre_postal_code=$_POST['copre_postal_code'];
$copre_time_at_residence_year=$_POST['copre_time_at_residence_year'];
$copre_time_at_residence_month=$_POST['copre_time_at_residence_month'];
$copre_current_rent=$_POST['copre_current_rent'];
$coself_emoloyed=$_POST['coself_emoloyed'];
$corevenue=$_POST['corevenue'];
$coemployer=$_POST['coemployer'];
$coemp_address=$_POST['coemp_address'];
$coemp_city=$_POST['coemp_city'];
$coemp_province=$_POST['coemp_province'];
$coemp_postal_code=$_POST['coemp_postal_code'];
$coemp_status=$_POST['coemp_status'];
$cojob_title=$_POST['cojob_title'];
$cojob_type=$_POST['cojob_type'];
$coindustry_sector=$_POST['coindustry_sector'];
$coincome_type=$_POST['coincome_type'];
$coannual_income=$_POST['coannual_income'];
$cotime_at_job_year=$_POST['cotime_at_job_year'];
$cotime_at_job_month=$_POST['cotime_at_job_month'];
$copre_self_employed=$_POST['copre_self_employed'];
$copre_revenue=$_POST['copre_revenue'];
$copre_employer=$_POST['copre_employer'];
$copre_emp_address=$_POST['copre_emp_address'];
$copre_emp_city=$_POST['copre_emp_city'];
$copre_emp_province=$_POST['copre_emp_province'];
$copre_emp_postal_code=$_POST['copre_emp_postal_code'];
$copre_emp_status=$_POST['copre_emp_status'];
$copre_job_title=$_POST['copre_job_title'];
$copre_job_type=$_POST['copre_job_type'];
$copre_industry_sector=$_POST['copre_industry_sector'];
$copre_income_type=$_POST['copre_income_type'];
$copre_annual_income=$_POST['copre_annual_income'];
$copre_time_at_job_year=$_POST['copre_time_at_job_year'];
$copre_time_at_job_month=$_POST['copre_time_at_job_month'];
$coother_income_1=$_POST['coother_income_1'];
$coother_income_2=$_POST['coother_income_2'];
$coother_description_1=$_POST['coother_description_1'];
$coother_description_2=$_POST['coother_description_2'];


$borarr=array();
$borarr['fname']=$_POST['fname'];
$borarr['lname']=$_POST['lname'];
$borarr['email']=$_POST['email'];
$borarr['dob']=$_POST['dob'];
$borarr['mar_status']=$_POST['mar_status'];
$borarr['sin']=$_POST['sin'];
$borarr['home_p']=$_POST['home_p'];
$borarr['cell_p']=$_POST['cell_p'];
$borarr['work_p']=$_POST['work_p'];
$borarr['fax']=$_POST['fax'];
$borarr['preferred_contact']=$_POST['preferred_contact'];
$borarr['currently']=$_POST['currently'];
$borarr['preferred_language']=$_POST['preferred_language'];
$borarr['dependents']=$_POST['dependents'];
$borarr['address']=$_POST['address'];
$borarr['unit']=$_POST['unit'];
$borarr['city']=$_POST['city'];
$borarr['province']=$_POST['province'];
$borarr['postal_code']=$_POST['postal_code'];
$borarr['time_at_residence_year']=$_POST['time_at_residence_year'];
$borarr['time_at_residence_month']=$_POST['time_at_residence_month'];
$borarr['current_rent']=$_POST['current_rent'];
$borarr['pre_address']=$_POST['pre_address'];
$borarr['pre_unit']=$_POST['pre_unit'];
$borarr['pre_city']=$_POST['pre_city'];
$borarr['pre_province']=$_POST['pre_province'];
$borarr['pre_postal_code']=$_POST['pre_postal_code'];
$borarr['pre_time_at_residence_year']=$_POST['pre_time_at_residence_year'];
$borarr['pre_time_at_residence_month']=$_POST['pre_time_at_residence_month'];
$borarr['pre_current_rent']=$_POST['pre_current_rent'];
$borarr['self_emoloyed']=$_POST['self_emoloyed'];
$borarr['revenue']=$_POST['revenue'];
$borarr['employer']=$_POST['employer'];
$borarr['emp_address']=$_POST['emp_address'];
$borarr['emp_city']=$_POST['emp_city'];
$borarr['emp_province']=$_POST['emp_province'];
$borarr['emp_postal_code']=$_POST['emp_postal_code'];
$borarr['emp_status']=$_POST['emp_status'];
$borarr['job_title']=$_POST['job_title'];
$borarr['job_type']=$_POST['job_type'];
$borarr['industry_sector']=$_POST['industry_sector'];
$borarr['income_type']=$_POST['income_type'];
$borarr['annual_income']=$_POST['annual_income'];
$borarr['time_at_job_year']=$_POST['time_at_job_year'];
$borarr['time_at_job_month']=$_POST['time_at_job_month'];
$borarr['pre_self_employed']=$_POST['pre_self_employed'];
$borarr['pre_revenue']=$_POST['pre_revenue'];
$borarr['pre_employer']=$_POST['pre_employer'];
$borarr['pre_emp_address']=$_POST['pre_emp_address'];
$borarr['pre_emp_city']=$_POST['pre_emp_city'];
$borarr['pre_emp_province']=$_POST['pre_emp_province'];
$borarr['pre_emp_postal_code']=$_POST['pre_emp_postal_code'];
$borarr['pre_emp_status']=$_POST['pre_emp_status'];
$borarr['pre_job_title']=$_POST['pre_job_title'];
$borarr['pre_job_type']=$_POST['pre_job_type'];
$borarr['pre_industry_sector']=$_POST['pre_industry_sector'];
$borarr['pre_income_type']=$_POST['pre_income_type'];
$borarr['pre_annual_income']=$_POST['pre_annual_income'];
$borarr['pre_time_at_job_year']=$_POST['pre_time_at_job_year'];
$borarr['pre_time_at_job_month']=$_POST['pre_time_at_job_month'];
$borarr['other_income_1']=$_POST['other_income_1'];
$borarr['other_income_2']=$_POST['other_income_2'];
$borarr['other_description_1']=$_POST['other_description_1'];
$borarr['other_description_2']=$_POST['other_description_2'];
$borarr['np_street_name']=$_POST['np_street_name'];
$borarr['np_street_type']=$_POST['np_street_type'];
$borarr['np_direction']=$_POST['np_direction'];
$borarr['np_unit']=$_POST['np_unit'];
$borarr['np_city']=$_POST['np_city'];
$borarr['np_province']=$_POST['np_province'];
$borarr['np_postal_code']=$_POST['np_postal_code'];
$borarr['np_year_built']=$_POST['np_year_built'];
$borarr['np_occupancy']=$_POST['np_occupancy'];
$borarr['np_tenure']=$_POST['np_tenure'];
$borarr['np_heat_type']=$_POST['np_heat_type'];
$borarr['np_lot_size']=$_POST['np_lot_size'];
$borarr['np_style']=$_POST['np_style'];
$borarr['np_type']=$_POST['np_type'];
$borarr['np_garage_size']=$_POST['np_garage_size'];
$borarr['np_garage_type']=$_POST['np_garage_type'];
$borarr['np_property_age']=$_POST['np_property_age'];
$borarr['np_mls']=$_POST['np_mls'];
$borarr['np_legal_description']=$_POST['np_legal_description'];
$borarr['pv_purchase_price']=$_POST['pv_purchase_price'];
$borarr['pv_appraised_value']=$_POST['pv_appraised_value'];
$borarr['pe_annual_property_taxes']=$_POST['pe_annual_property_taxes'];
$borarr['pe_monthly_condo_expense']=$_POST['pe_monthly_condo_expense'];
$borarr['pe_monthly_rental_income']=$_POST['pe_monthly_rental_income'];
$borarr['pe_monthly_heating_cost']=$_POST['pe_monthly_heating_cost'];
$borarr['pe_monthly_insurance_fees']=$_POST['pe_monthly_insurance_fees'];
$borarr['pe_rental_expenses']=$_POST['pe_rental_expenses'];
$borarr['pe_annual_repairs']=$_POST['pe_annual_repairs'];
$borarr['pe_monthly_hydro_expenses']=$_POST['pe_monthly_hydro_expenses'];
$borarr['mi_amortization']=$_POST['mi_amortization'];
$borarr['mi_first_time_buyer']=$_POST['mi_first_time_buyer'];
$borarr['mi_closing_date']=$_POST['mi_closing_date'];
$borarr['mi_payment_frequency']=$_POST['mi_payment_frequency'];
$borarr['mi_term']=$_POST['mi_term'];
$borarr['mi_mortgage_amount']=$_POST['mi_mortgage_amount'];
$borarr['mi_down_payment_amount']=$_POST['mi_down_payment_amount'];
$borarr['mi_product_type']=$_POST['mi_product_type'];
$borarr['mi_insured']=$_POST['mi_insured'];
$borarr['mi_insurer']=$_POST['mi_insurer'];





Insert into borrower(fname,lname,email,dob,mar_status,sin,home_p,cell_p,work_p,fax,preferred_contact,currently,preferred_language,dependents,address,unit,city,province,postal_code,time_at_residence_year,time_at_residence_month,current_rent,pre_address,pre_unit,pre_city,pre_province,pre_postal_code,pre_time_at_residence_year,pre_time_at_residence_month,pre_current_rent,self_emoloyed,revenue,employer,emp_address,emp_city,emp_province,emp_postal_code,emp_status,job_title,job_type,industry_sector,income_type,annual_income,time_at_job_year,time_at_job_month,pre_self_employed,pre_revenue,pre_employer,pre_emp_address,pre_emp_city,pre_emp_province,pre_emp_postal_code,pre_emp_status,pre_job_title,pre_job_type,pre_industry_sector,pre_income_type,pre_annual_income,pre_time_at_job_year,pre_time_at_job_month,other_income_1,other_income_2,other_description_1,other_description_2,np_street_name,np_street_type,np_direction,np_unit,np_city,np_province,np_postal_code,np_year_built,np_occupancy,np_tenure,np_heat_type,np_lot_size,np_style,np_type,np_garage_size,np_garage_type,np_property_age,np_mls,np_legal_description,pv_purchase_price,pv_appraised_value,pe_annual_property_taxes,pe_monthly_condo_expense,pe_monthly_rental_income,pe_monthly_heating_cost,pe_monthly_insurance_fees,pe_rental_expenses,pe_annual_repairs,pe_monthly_hydro_expenses,mi_amortization,mi_first_time_buyer,mi_closing_date,mi_payment_frequency,mi_term,mi_mortgage_amount,mi_down_payment_amount,mi_product_type,mi_insured,mi_insurer) values()



Insert into coborrower (cofname,colname,coemail,codob,comar_status,cosin,cohome_p,cocell_p,cowork_p,cofax,copreferred_contact,cocurrently,copreferred_language,codependents,coaddress,counit,cocity,coprovince,copostal_code,cotime_at_residence_year,cotime_at_residence_month,cocurrent_rent,copre_address,copre_unit,copre_city,copre_province,copre_postal_code,copre_time_at_residence_year,copre_time_at_residence_month,copre_current_rent,coself_emoloyed,corevenue,coemployer,coemp_address,coemp_city,coemp_province,coemp_postal_code,coemp_status,cojob_title,cojob_type,coindustry_sector,coincome_type,coannual_income,cotime_at_job_year,cotime_at_job_month,copre_self_employed,copre_revenue,copre_employer,copre_emp_address,copre_emp_city,copre_emp_province,copre_emp_postal_code,copre_emp_status,copre_job_title,copre_job_type,copre_industry_sector,copre_income_type,copre_annual_income,copre_time_at_job_year,copre_time_at_job_month,coother_income_1,coother_income_2,coother_description_1,coother_description_2) values()




$asset=$_POST['assets'];
$servername =DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $stmt = $conn->prepare("INSERT INTO asset (mortgageid,type,description,value,downpayment)Values(:mid,:ty,:des,:val,:dp)");
	   $stmt->bindParam(":m",$mid);
	   $stmt->bindParam(":ty",$typ);
	   $stmt->bindParam(":des",$des);
	   $stmt->bindParam(":val",$val);
	   $stmt->bindParam(":dp",$dp);
	   $assets=array(); 
	   $count=0;
foreach($asset as $key=>$value){
	
	$assets[$count]=$value;
	$count++;
	if ($countt==4){
	$mid=$mortgageid;
	$typ=$assets[0];
	$des=$assets[1];
	$val=$assets[2];
	$dp=$assets[3];
	$stmt->execute();
	$count=0;
	$assets=array();

	}
	
	
}
$stmt=null;


//liability
$stmt = $conn->prepare("INSERT INTO liability (mortgageid,liab_type,liab_description,credit_limit,outstanding_balance,monthly_payment,liab_payoff,maturity_date)Values(:mo,:li,:lid,:cl,:ob,:mp,:lp,:md)");
	   $stmt->bindParam(":mo",$moid);
	   $stmt->bindParam(":li",$lityp);
	   $stmt->bindParam(":lid",$lides);
	   $stmt->bindParam(":cl",$cre);
	   $stmt->bindParam(":ob",$outb);
	   $stmt->bindParam(":mp",$mp);
	   $stmt->bindParam(":lp",$lpay);
	   $stmt->bindParam(":md",$matd);
	   $liabilityarr=array(); 
	   $count=0;
foreach($liability as $key=>$value){
	
	$liabilityarr[$count]=$value;
	$count++;
	if ($countt==7){
	$moid=$mortgageid;
	$lityp=$liabilityarr[0];
	$lides=$liabilityarr[1];
	$cre=$liabilityarr[2];
	$outb=$liabilityarr[3];
	$mp=$liabilityarr[4];
	$lpay=$liabilityarr[5];
	$matd=$liabilityarr[6];
	$stmt->execute();
	$count=0;
	$liabilityarr=array();

	}
	
	
}
$stmt=null;
//properties
$stmt = $conn->prepare("INSERT INTO property_owned (mortgageid,property_value,total_mortgages,mortgage_payments,total_expenses,rental_income,rental_expenses)Values(:mor,:pv,:tm,:mop,:te,:ri,:re)");
	   $stmt->bindParam(":mor",$mor);
	   $stmt->bindParam(":pv",$pv);
	   $stmt->bindParam(":tm",$tm);
	   $stmt->bindParam(":mp",$mop);
	   $stmt->bindParam(":te",$te);
	   $stmt->bindParam(":ri",$ri);
	   $stmt->bindParam(":re",$re);
	   $propertyarr=array(); 
	   $count=0;
foreach($property as $key=>$value){
	
	$propertyarr[$count]=$value;
	$count++;
	if ($count==6){
	$mor=$mortgageid;
	$pv=$propertyarr[0];
	$tm=$propertyarr[1];
	$mop=$propertyarr[2];
	$te=$propertyarr[3];
	$ri=$propertyarr[4];
	$re=$propertyarr[5];
	$stmt->execute();
	$count=0;
	$propertyarr=array();

	}
	
	
}
}
catch(PDOException $e){
	echo $e;
	
	
}










?>
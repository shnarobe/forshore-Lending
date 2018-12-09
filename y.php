<?php
$l=array();
$l['one']="";
$l['two']="two";
foreach($l as $key=>$value){
	if(empty($value)){
		echo $key.'is empty';
		
	}
	
	
}
/*
function h(){
$k=array();
$k['a']="ggggg";
global $l;
$l=$k;
echo $l['a'];
}

h();

*/
?>
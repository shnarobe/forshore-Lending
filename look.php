<?php



echo $_SESSION['me']="";
$ed=array();
$ed["a"]=$ed['h']=$ed['p']=3;
foreach($ed as $key=>$value){
	echo $key."->".$value;
	echo "<br>";
}
?>
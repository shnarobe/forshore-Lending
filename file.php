<?php
$dir=123456789056;
 $loanid="user/".strval($dir);
		$lo= $loanid."/contract";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					echo "$lo/$file";
					echo "<br>";
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			
			
		}
		$lo= $loanid."/statements";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					echo "$lo/$file";
					echo "<br>";
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			
			
		}
		$lo= $loanid."/other";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					echo "$lo/$file";
					echo "<br>";
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			rmdir("user/$dir");
			
		}
		
		
		

?>
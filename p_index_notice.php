<?
if (!isset($_GET['s'])) {
    echo "";
}
else{
	if($_GET['s']=="100"){
		echo"<span class=\"tov-blue\">Setting has been changed!</span>";
	}
	elseif($_GET['s']=="101"){
	echo"<span style=\"color:#F00\">All field must be filled</span>";	
	}
	elseif($_GET['s']=="101e"){
	echo"<span style=\"color:#F00\">You've enter wrong email</span>";	
	}
	elseif($_GET['s']=="102"){
	echo"<span style=\"color:#F00\">You must enter valid email</span>";	
	}
	elseif($_GET['s']=="103"){
	echo"<span style=\"color:#F00\">Your password is too short. Password should be<br/> 8 characters or more.</span>";	
	}
	elseif($_GET['s']=="104"){
	echo"<span style=\"color:#F00\">Invalid new email address. Please enter a valid email address</span>";	
	}
}
?>

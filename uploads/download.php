<?php
if(isset($_POST['upload'])){
	$file_name = $_FILES['myfile']['name'];
	$file_tmp_name = $_FILES['myfile']['tmp_name'];
	if (move_uploaded_file($file_tmp_name, "uploads/" . $file_name)){
		echo"File uploaded sucessfully.";
	}
	else {
		echo"Error ..Please try again.";
	}
}
?><br>
<a href="uploads/<?php echo $file_name;">CLick here to download</a>
<a download="<?php echo $file_name;?>" href="uploads/<?php echo $file_name;?>"<?php echo $file_name;?></a>
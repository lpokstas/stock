<?php 

	// Validating entered data.
	
	function validateFormData ($formData)
	{
		$formData = trim(stripcslashes(htmlspecialchars($formData)));
			return $formData;
	}

	// Password encription

	password_hash ($loginPassword, PASSWORD_DEFAULT);

?>
<?php
	$idToEdit = $_GET['id'];
	$hash = $_GET['hash'];
	// var_dump($idToEdit);
	// var_dump($hash);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    var idToEdit = <?php echo $idToEdit; ?>;
	    var hash = <?php echo $hash; ?>;

	    $.ajax({
			type: "POST",
			url: 'http://127.0.0.1:8000/api/UserAccount/show/' + idToEdit,
			data: {id: idToEdit, hash: hash},
			success: function(data) {
				$("#userID").val(data.id);
				$("#fname").val(data.fname);
				$("#lname").val(data.lname);
				$("#address").val(data.address);
				$("#postcode").val(data.postcode);
				$("#contactnum").val(data.contactnum);
				$("#email").val(data.email);
				$("#username").val(data.username);
			},
			dataType: 'json'
		});

		$("#updateUser").click(function(){
	    	var password = $('#password').val();
	    	var cpassword = $('#cpassword').val();

	    	if (password == '') {

	    	} else {
	    		if (password == cpassword) {
	    			// alert('password match');
	    		} else {
	    			alert('password does not match');
	    			return false;
	    		}
	    	}

			$.ajax({
				type: "POST",
				url: 'http://127.0.0.1:8000/api/UserAccount/update',
				data: $("#userUpdateForm").serialize(),
				success: function(data) {

	            },
				dataType: 'json'
			});

			window.location.href = '/';
	    });
	});
</script>

<form id="userUpdateForm" name="userUpdateForm">
	<input type="text" name="userID" id="userID">

	<div>
		<label>First Name: </label>
		<div>
			<input type="text" name="fname" id="fname">
		</div>
	</div>

	<div>
		<label>Last Name: </label>
		<div>
			<input type="text" name="lname" id="lname">
		</div>
	</div>

	<div>
		<label>Address: </label>
		<div>
			<input type="text" name="address" id="address">
		</div>
	</div>

	<div>
		<label>Postcode:</label>
		<div>
			<input type="text" name="postcode" id="postcode">
		</div>
	</div>

	<div>
		<label>Contact Phone Number: </label>
		<div>
			<input type="text" name="contactnum" id="contactnum">
		</div>
	</div>

	<div>
		<label>Email: </label>
		<div>
			<input type="text" name="email" id="email" disabled>
		</div>
	</div>

	<div>
		<label>Username: </label>
		<div>
			<input type="text" name="username" id="username" disabled>
		</div>
	</div>

	<div>
		<label>Password: </label>
		<div>
			<input type="password" name="password" id="password">
		</div>
	</div>

	<div>
		<label>Confirm Password: </label>
		<div>
			<input type="password" name="cpassword" id="cpassword">
		</div>
	</div>

	<div>
		<input type="button" name="updateUser" id="updateUser" value="Update">
		<input type="button" name="cancel" id="cancel" value="Cancel">
	</div>
</form>

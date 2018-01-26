<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	    $("#addUser").click(function(){
	    	// $.post("http://127.0.0.1:8000/api/UserAccount/create", $("#userCreateForm").serialize(), function(data) {
	    	// 	var parsedJson = $.parseJSON(data);
	    	// 	console.log(parsedJson);
	    	// }, 'json');

			$.ajax({
				type: "POST",
				url: 'http://127.0.0.1:8000/api/UserAccount/create',
				data: $("#userCreateForm").serialize(),
				success: function(data) {

	            },
				dataType: 'json'
			});
	    });
	});
</script>

<form id="userCreateForm" name="userCreateForm">
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
			<input type="text" name="email" id="email">
		</div>
	</div>

	<div>
		<label>Username: </label>
		<div>
			<input type="text" name="username" id="username">
		</div>
	</div>

	<div>
		<label>Password: </label>
		<div>
			<input type="password" name="password" id="password">
		</div>
	</div>

	<div>
		<input type="button" name="addUser" id="addUser" value="Add">
		<input type="button" name="reset" id="reset" value="Reset">
	</div>
</form>

<a href="/">Back</a>
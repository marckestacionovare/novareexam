<!--
	NOTE: Use the command line below on window cmd, if there is allow access issue.

	chrome.exe --user-data-dir="C:/Chrome dev session" --disable-web-security
-->
<!DOCTYPE html>
<html>
<head>
	<title>Exam Novare</title>
</head>
<body>
	<a href="/add">Add</a>
	<input type="button" name="refresh" id="refresh" value="Refresh">
	<input type="button" name="delete_all" id="delete_all" value="Delete All">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			refresh();
		});

		function refresh() {
			$.ajax({
				type: "POST",
				url: 'http://127.0.0.1:8000/api/UserAccount/show_all',
				success: function(data) {
					$.each(data, function(key, value) {
						var NewRow = "<tr><td><input type='checkbox' value='" + value.id + "'></td>";
							NewRow += '<td>' + value.id + '</td>';
							NewRow += '<td>' + value.fname + '</td>';
							NewRow += '<td>' + value.lname + '</td>';
							NewRow += '<td>' + value.address + '</td>';
							NewRow += '<td>' + value.postcode + '</td>';
							NewRow += '<td>' + value.contactnum + '</td>';
							NewRow += '<td>' + value.email + '</td>';
							NewRow += '<td>' + value.username + '</td>';
							NewRow += '<td>' + value.password + '</td>';
							NewRow += "<td><input type='button' data-id='" + value.id + "' id=\'edit\' name=\'edit\' value=\'Edit\'><input type='button' data-id='" + value.id + "' id=\'delete\' name=\'delete\' value=\'Delete\'></td></tr>";

							$(".userAccountsTable").append(NewRow);
					});
	            },
				dataType: 'json'
			});
		}

		$(document).on('click', '#delete_all', function() {
			var toDelete = {};
		    toDelete.deleteID = [];

		    $("input:checkbox").each(function() {
		        if ($(this).is(":checked")) {
		            toDelete.deleteID.push($(this).attr("value"));
		        }
		    });

		    // console.log(toDelete.deleteID);

		    var txt;

		    if (confirm("Delete all selected record?")) {
		        $.ajax({
					type: "POST",
					url: 'http://127.0.0.1:8000/api/UserAccount/remove_all/' + toDelete.deleteID,
					success: function(data) {
						// location.reload();
						// alert("Record Deleted");
		            },
					dataType: 'json'
				});
		    }

		    location.reload();
		});

		$(document).on('click', '#edit', function() {
			var id = $(this).attr("data-id");
			window.location.href = '/edit?id=' + id + '&hash=12345';
		});

		$(document).on('click', '#delete', function() {
			var txt;
			var id = $(this).attr("data-id");

		    if (confirm("Delete this record?")) {
		        $.ajax({
					type: "POST",
					url: 'http://127.0.0.1:8000/api/UserAccount/remove/' + id,
					success: function(data) {
						// location.reload();
						// alert("Record Deleted");
		            },
					dataType: 'json'
				});
		    }
		    location.reload();
			// var id = $(this).attr("data-id");
			// alert(id);
		});
	</script>

	<table class="userAccountsTable">
		<thead>
			<th>x</th>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Postcode</th>
			<th>Contact Phone Number</th>
			<th>Email</th>
			<th>Username</th>
			<th>Password</th>
			<th>Action</th>
		</thead>
	</table>
</body>
</html>
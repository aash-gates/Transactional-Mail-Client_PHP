<!DOCTYPE html>
<html>
<head>
	<title>Send Email</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
	</style>
</head>
<body>

	<div class="container">
		<button id="sendEmailBtn" class="btn btn-primary">Send Email</button>
	</div>

	<div id="successAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
		Email sent successfully!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div id="errorAlert" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
		Failed to send email. Please try again later.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#sendEmailBtn').click(function(){
				$.ajax({
					url: 'send_email.php',
					method: 'POST',
					success: function(response){
						$('#successAlert').removeClass('d-none');
						setTimeout(function() {
							$('#successAlert').addClass('d-none');
						}, 5000);
					},
					error: function(){
						$('#errorAlert').removeClass('d-none');
						setTimeout(function() {
							$('#errorAlert').addClass('d-none');
						}, 5000);
					}
				});
			});
		});
	</script>

</body>
</html>

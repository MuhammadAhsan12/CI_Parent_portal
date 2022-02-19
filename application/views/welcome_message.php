<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

	<title>Document</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/cropped-cedar-school-college-logo.png" style="width : 70px;" alt="Logo" class="img-fluid" /></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link active" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About Us</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							View More
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Web Development</a></li>
							<li><a class="dropdown-item" href="#">Web Designing</a></li>
							<li><a class="dropdown-item" href="#">Android Development</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
				</ul>
				<div class="d-flex">
					<button class="btn btn-light ms-3 button" href="javascript:void(0);" onclick="showLoginModal();">Login</button>
					<button class="btn btn-light ms-3 button" href="javascript:void(0);" onclick="showRegesterModal();">Regester</button>


					<h5 class="btn ms-3 logbutton" style="color:aliceblue"><?php  ?></h5>
					<button class="btn btn-light ms-3 button logbutton" href="javascript:void(0);" onclick="showRegesterModal();">Regester</button>
				</div>
			</div>
		</div>
	</nav>

	<h4 class="text-center text-body">First Of all you must login then see portal</h4>

	<div class="container my-3 bg-light">
		<div class="col-md-12 text-center">
			<button class="btn ms-3 button center" href="javascript:void(0);" onclick="showLoginModal();">Login</button>
			<button class="btn ms-3 button center" href="javascript:void(0);" onclick="showRegesterModal();">Regester</button>
		</div>
	</div>

	<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-dialog">
				<div class="modal-content">
					<div id="alert">

					</div>
					<div class="card-body p-5">
						<h1 id="header-text" class="fs-4 card-title fw-bold mb-4 text-center"></h1>

						<div id="response">

						</div>

					</div>
					<div class="card-footer py-3 border-0">
						<div class="text-center">
							Don't have an account? <a id="create" href="javascript:void(0);" onclick="showRegesterModal();" class="text-dark">Create One</a>
						</div>
					</div>

					<div class="card-footer footer-login py-3 border-0">
						<div class="text-center">
							have an account? <a id="create" href="javascript:void(0);" onclick="showLoginModal();" class="text-dark">login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(".logbutton").hide();

		function showLoginModal() {
			$("#login").modal("show");
			$("#header-text").html('Teacher Protal Login');
			$(".card-footer").show();
			$(".footer-login").hide();
			$("#alert").html("");

			$.ajax({
				url: '<?php echo base_url() . 'index.php/Teacher/User/ShowloginForm' ?>',
				type: 'POST',
				data: {},
				dataType: 'json',
				success: function(response) {
					// console.log(response);
					$("#response").html(response["html"])
				}
			})
		}

		function showRegesterModal() {
			$("#login").modal("show");
			$("#header-text").html('Teacher Protal Regester');
			$(".card-footer").hide();
			$(".footer-login").show();
			$("#alert").html("");

			$.ajax({
				url: '<?php echo base_url() . 'index.php/Teacher/User/ShowRegesterForm' ?>',
				type: 'POST',
				data: {},
				dataType: 'json',
				success: function(response) {
					// console.log(response);
					$("#response").html(response["html"])
				}
			})
		}

		$("body").on("submit", "#saveRegester", function(e) {
			e.preventDefault();
			// alert(); 

			$.ajax({
				url: '<?php echo base_url() . 'index.php/Teacher/User/saveModel' ?>',
				type: 'POST',
				data: $(this).serializeArray(),
				dataType: 'json',
				success: function(response) {
					console.log(response);

					if (response["status"] == 0) {
						if (response["name"] != "") {
							$(".nameError").html(response["name"]).addClass("invalid-feedback d-block");
							$("#name").addClass("is-invalid");
						} else {
							$(".nameError").html("").removeClass("invalid-feedback d-block");
							$("#name").removeClass("is-invalid");
						}

						if (response["email"] != "") {
							$(".emailError").html(response["email"]).addClass("invalid-feedback d-block");
							$("#email").addClass("is-invalid");
						} else {
							$(".emailError").html("").removeClass("invalid-feedback d-block");
							$("#email").removeClass("is-invalid");
						}

						if (response["password"] != "") {
							$(".passwordError").html(response["password"]).addClass("invalid-feedback d-block");
							$("#price").addClass("is-invalid");
						} else {
							$(".passwordError").html("").removeClass("invalid-feedback d-block");
							$("#password").removeClass("is-invalid");
						}
					} else {
						$("#alert").html(response["message"]);


						$(".nameError").html("").removeClass("invalid-feedback d-block");
						$("#name").removeClass("is-invalid");

						$(".emailError").html("").removeClass("invalid-feedback d-block");
						$("#email").removeClass("is-invalid");

						$(".passwordError").html("").removeClass("invalid-feedback d-block");
						$("#password").removeClass("is-invalid");

						// $("#carModelList").append(response["row"])
					}
				}
			})
		});

		$("body").on("submit", "#loginform", function(e) {
			e.preventDefault();
			// alert(); 

			$.ajax({
				url: '<?php echo base_url() . 'index.php/Teacher/User/savelogin' ?>',
				type: 'POST',
				data: $(this).serializeArray(),
				dataType: 'json',
				success: function(response) {
					console.log(response);

					if (response["status"] == 0) {

						if (response["email"] != "") {
							$(".emailError").html(response["email"]).addClass("invalid-feedback d-block");
							$("#email").addClass("is-invalid");
						} else {
							$(".emailError").html("").removeClass("invalid-feedback d-block");
							$("#email").removeClass("is-invalid");
						}

						if (response["password"] != "") {
							$(".passwordError").html(response["password"]).addClass("invalid-feedback d-block");
							$("#price").addClass("is-invalid");
						} else {
							$(".passwordError").html("").removeClass("invalid-feedback d-block");
							$("#password").removeClass("is-invalid");
						}

						// $("#alert").html("this Email and Password is incorrect");

					} else {
						$("#alert").html(response["message"]);

						$(".emailError").html("").removeClass("invalid-feedback d-block");
						$("#email").removeClass("is-invalid");

						$(".passwordError").html("").removeClass("invalid-feedback d-block");
						$("#password").removeClass("is-invalid");

						$(".button").hide();
						$(".text-body").hide();
						$(".logbutton").show();

						window.location.href = "<?php echo site_url('Teacher/User/dashboard'); ?>";
					}
				}
			})
		});
	</script>

</body>

</html>
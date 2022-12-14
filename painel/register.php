<?php
include 'app/require.php';

$user = new UserController;

Session::init();

if (Session::isLogged()) { Util::redirect('/'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $error = $user->registerUser($_POST); }

Util::head('Register');
Util::navbar();

?>

<main class="container mt-2">

	<div class="row justify-content-center">

		<div class="col-12 mt-3 mb-2">

			<?php if (isset($error)) : ?>
				<div class="alert alert-primary" role="alert">
					<?php Util::display($error); ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title text-center">Registrar</h4>

					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Username" name="username" minlength="3" required>
						</div>
						
						<div class="form-group">
							<input type="email" class="form-control form-control-sm" placeholder="E-mail" name="email" minlength="7" maxlength="50" required>
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Discord#1111" name="discord" minlength="6" maxlength="36" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Password" name="password" minlength="4" maxlength="255" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="confirmPassword" minlength="4" maxlength="255" required>
						</div>

						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="invite Code" name="invCode" maxlength="50" required>
						</div>

						<button class="btn btn-outline-primary btn-block" id="submit" type="submit" value="submit">Register</button>

					</form>

				</div>
			</div>
		</div>

	</div>

</main>

<script src="<?php SITE_ROOT ?>/assets/js/matchPass.js"></script>
<?php Util::footer(); ?>
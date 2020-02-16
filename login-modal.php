<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="includes/login.inc.php" method="post" id="loginform">
						<div class="form-group">
							<label for="usernameInput"><i class="fas fa-user mr-2 px-1"></i>Username</label>
							<input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="passwordInput"><i class="fas fa-lock mr-2 px-1"></i>Password</label>
							<input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
						</div>
						<small id="registerLink" class="form-text text-muted">Not a member yet? <a
								href="Registration.php">Sign up here</a></small>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" form="loginform" name="login-submit" class="btn btn-primary rounded">Login</button>
					<button type="button" class="btn rounded" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
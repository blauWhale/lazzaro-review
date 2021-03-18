<div class="row">
	<form action="/user/doCreate" method="post" class="col-6">
		<div class="form-group">
		  <label for="username">Username</label>
	  	<input id="username" name="username" type="text" class="form-control">
		</div>
		<div class="form-group">
		  <label for="email">Mail</label>
	  	<input id="email" name="email" type="text" class="form-control">
		</div>
		<div class="form-group">
			<label class="control-label" for="password">Passwort</label>
			<input id="password" name="password" type="password" class="form-control">
		</div>
		<button type="submit" name="send" class="btn btn-primary">Absenden</button>
	</form>
</div>

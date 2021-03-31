<main class="form-signin">
    <form action="/user/doLogin" onsubmit="return validateUserLogin()" method="post" name="userLogin">
        <input name="email" type="text" id="inputEmail" class="form-control" placeholder="E-Mail" autofocus>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Passwort">
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="loginSend">Absenden</button>
    </form>
</main>
<style>
form > *{
    display:block;
}
</style>

<form action="/user/login" method="POST">
<!-- <input type="hidden" value = "<?PHP echo($CSRF_Token) ?>"> -->
<label for="username">Email</label>
<input type="text" id="username" name="username" required autocomplete>
<label for="pass">Password</label>
<input type="password" id="pass" name="pass">
<input type="submit" value="submit">
</form>

<form action="/" method="POST">
<input type="hidden" value = "<?PHP echo($CSRF_Token) ?>">
<label for="username">Username</label>
<input type="text" id="username" name="username">
<label for="pass">Password</label>
<input type="password" id="pass" name="pass">
<input type="submit" value="submit">
</form>
<script>
let cookie = document.cookie;
let div = document.createElement('div');
div.innerText = cookie;
document.querySelector('body').appendChild(div);
</script>
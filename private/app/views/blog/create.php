<h1>Create Post</h1>

<form method = "post" action = "/blog/createmyblogpost">


<input type = "hidden" value = "" name = "csrf">
<label for = "title">Title</label>
<input type = "text" id = "title" name = "title">
<?php
//not commenting the author section as session is empty for me
//if (isset($_SESSION["username"])) { ?>
<label for = "author">Author</label>
<input type = "email" id = "author" name = "author">
<?php
//}
?>
<label for = "content">Content</label>
<textarea name = "content" id = "content"></textarea>
<input type = "submit" value = "submit">

</form> 
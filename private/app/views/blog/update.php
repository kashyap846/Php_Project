<h1>Update Post</h1>

<form method = "post" action = "/blog/update">
<input type = "hidden" value = "<?php echo $slug?>" name = "slug"/>
<label for = "title">Title</label>
<input type = "text" id = "title" name = "title" value = "<?php echo $title?>"/>
<label for = "author">Author</label>
<!-- Not commenting author here -->
<input type = "email" id = "author" name = "author" value = "<?php echo $author?>"/>

<label for = "content">Content</label>
<textarea name = "content" id = "content"><?php echo $content?></textarea>
<input type = "submit" value = "submit">

</form> 
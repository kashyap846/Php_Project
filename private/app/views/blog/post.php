<main>
<?php echo($content); ?>
</main>
<aside>
<p>Authored by: <a href = "mail to: <?php echo($author); ?>"><?php echo($author); ?></a> </p>
</aside>
<?php
//commenting this section as session is empty for me
//if (isset($_SESSION["username"])) { ?>
<form method="post" action="/blog/update/<?php echo($slug); ?> ">
<input type="submit" value = "Update" />
</form>
<?php
//}
?>

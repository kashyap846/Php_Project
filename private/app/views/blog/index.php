<h1>List of your blogposts</h1>
<?php
//commenting this section as session is empty for me
//if (isset($_SESSION["username"])) { ?>
<a href="/user/logout/" />Logout </a>
<br/>
<a href="/blog/createmyblogpost/" />Create a New Post </a>
<?php
//}
?>
<ul>
<?php
foreach($posts as $post){
echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"]."</a> - <time>" . $post["post_date"] . " </time>");
}
?>
</ul>
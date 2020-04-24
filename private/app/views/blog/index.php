<h1>BlogPost</h1>
<?php
//commenting this section as session is empty for me
//if (isset($_SESSION["username"])) { ?>
<a href="/user/logout/" />Logout </a>
<ul>
<?php
foreach($posts as $post){
echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"]."</a> - <time>" . $post["post_date"] . " </time>");
}
?>
</ul>
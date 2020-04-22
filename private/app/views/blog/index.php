<h1>BlogPost</h1>
<ul>
<?php
foreach($posts as $post){
echo("<li><a href=\"\blog\read\\" . $post->slug . "\">" . "</a> - <time>" . $post->post_date . " </time>");
}
?>
</ul>
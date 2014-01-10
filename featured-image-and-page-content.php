<?php
$postThumbnail = null;
// if it's not a page use the header image
if (!is_page($post->ID) or !current_theme_supports('post-thumbnails') or !has_post_thumbnail($post->ID)) {
	// will return null if no header image or no header image support
	$postThumbnail = get_the_post_thumbnail($post->ID);
}
else {
	$postThumbnail = get_the_post_thumbnail($post->ID, 'full', array(
		'class' => 'attachment-$size max-width'
	));
}
// echo the post thumbnail
echo $postThumbnail;
?>
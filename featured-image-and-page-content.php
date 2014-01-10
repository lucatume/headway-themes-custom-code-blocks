<?php
$imgSrc = null;
// if it's not a page show the header image
if (!is_page($post->ID) or !current_theme_supports('post-thumbnails') or !has_post_thumbnail($post->ID)) {
	$imgSrc = get_header_image();
}
else {
	$imgSrc = wp_get_attachment_url(get_post_thumbnail_id($post->ID ));
}
// create a CSS inline style string to use the post thumbnail as the block-element bg

$cssInlineStyleString = 'style="background-image:url(' .$imgSrc.');background-size:cover;"';

?>
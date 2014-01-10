<?php
/**
 * Get the post thumbnail (featured image)
 */
$postThumbnailImageTag = null;
// if it's not a page use the header image
if (!is_page($post->ID) or !current_theme_supports('post-thumbnails') or !has_post_thumbnail($post->ID)) {
	// will return null if no header image or no header image support
	$postThumbnailImageTag = get_the_post_thumbnail($post->ID);
}
else {
	$postThumbnailImageTag = get_the_post_thumbnail($post->ID, 'full', array(
		'class' => 'attachment-$size max-width'
	));
}
/**
 * Get the post content
 */
// set some defaults about the post content
// @todo should become block options
$shouldFilterPostContent = false;
$shouldOverlayToImage = false;
$contentHorizontalPosition = '';
$contentVerticalPosition = '';
$customClasses = array(
	'banner-style',
	'white'
);
// get the post content
$postContent = null;
if (have_posts()) {
	
	while (have_posts()) {
		the_post();
		$postContent = get_the_content();
	}
}
// apply filter to content
if ($shouldFilterPostContent) {
	$postContent = apply_filters('the_content', $postContent);
}
// init the classes to apply to the content
$contentClasses = array();
if ($shouldOverlayToImage) {
	$classes[] = 'overlay';
}
$classes = array_merge($contentClasses, $customClasses);
$classes[] = $contentHorizontalPosition;
$classes[] = $contentVerticalPosition;
$contentClasses = implode(' ', $classes);
?>
<div sytle="position:relative;">
	<?php
echo $postThumbnailImageTag; ?>
	<h1 class="<?php
echo $contentClasses; ?>">
	<?php
echo $postContent; ?>	
</h1>
</div>
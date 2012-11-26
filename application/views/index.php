<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Post</th>
		<th>Link</th>
		<th>Remove</th>
	</tr>
<?php
foreach ($posts as &$post) {
	$link = $html->create_a('index', 'article', 'view', array('id' => $post['id']));
	$remove = $html->create_post_a('index', 'remove', 'remove', array('id' => $post['id']));
	echo <<<HTML
	<tr>
		<td>{$post['id']}</td>
		<td>{$post['name']}</td>
		<td>{$post['post']}</td>
		<td>{$link}</td>
		<td>{$remove}</td>
	</tr>
HTML;
}
?>
</table>

<?php echo $html->create_a('index', 'create', 'Create Post'); ?>
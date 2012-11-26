<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Post</th>
		<th>Link</th>
	</tr>
<?php
foreach ($posts as &$post) {
	$link = $html->create_a('index', 'article', 'link', array('id' => $post['id']));
	echo <<<HTML
	<tr>
		<td>{$post['id']}</td>
		<td>{$post['name']}</td>
		<td>{$post['post']}</td>
		<td>{$link}</td>
	</tr>
HTML;
}
?>
</table>

<?php echo $html->create_a('index', 'create', 'Create Post'); ?>
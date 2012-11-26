<?php if (!empty($post)): ?>
<h2><?php echo $post['id'] . '.) ' . $post['name'];?></h2>
<p><?php echo $post['post']; ?></p>
<?php else: ?>
<p>Post does not exist... Please see our directory for avaliable posts.</p>
<?php endif; ?>

<?php echo $html->create_a('index', 'index', 'Directory'); ?>
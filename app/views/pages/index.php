<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>Welcome to Carlos' MVC Framework</h1>

<ul>
  <?php foreach ($data['posts'] as $post) : ?>
    <li>
      <?php echo $post->name ?>
    </li>
  <?php endforeach ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>
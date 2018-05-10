<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div id="content-area">
  <!-- Errors -->
  <?php print $messages; ?> 
  <?php
    //print $messages;
    if( !preg_match('/user\/login/', $_SERVER['REQUEST_URI']) && !preg_match('/user\/password/', $_SERVER['REQUEST_URI']) ){ print $messages; }
  ?>
  <div class="nav">
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
  </div>
  <?php print render($page['content']); ?>
</div>

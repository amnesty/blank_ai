<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div id="content-area">
  <!-- Errors -->
  <?php
    //print $messages;
    //echo 'test';
    //print("<pre>".print_r($page['content'], true)."</pre>");
    //exit;
    include_once('api/politica.php');
    if( !preg_match('/user\/login/', $_SERVER['REQUEST_URI']) /*&& !preg_match('/user\/password/', $_SERVER['REQUEST_URI'])*/ ){
        print $messages;
    }
  ?>
  <div class="nav">
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
  </div>
  <?php print render($page['content']); ?>
</div>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div id="content-area">
  <?php print $messages; ?> <!-- Errors -->
  <div class="nav">
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
  </div>
  <?php print render($page['content']); ?>
</div>

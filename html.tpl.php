<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

  <head profile="<?php print $grddl_profile; ?>">
    <?php include_once("ganalytics.php"); ?>
    <?php print $head; ?>
    <title><?php $title = explode('#',$head_title); print $title[0]; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <?php include_once("ganalytics2.php"); ?>
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>

</html>

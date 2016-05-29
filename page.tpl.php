  <div id="page-wrapper"><div id="page">

   <div class="no-css">
    <a href="#main" class="sr-only sr-only-focusable">Go to main content</a>
    <br />
   </div>

   <header id="header">
	  <a href="/"><img class="himg" src="/sites/all/themes/maxtron/images/logo-waves.png" alt=""><img class="himg" src="/sites/all/themes/maxtron/images/logo-banner.png" alt="Maxtron Products, Inc."><img id="header-eye" src="/sites/all/themes/maxtron/images/logo-eye-blue.png" alt=""></a>
   </header>

<?php if ($main_menu): ?>
   <nav id="main-menu" class="navbar navbar-default">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		 </button>
		<div id="navbar" class="navbar-collapse collapse">
    <?php print theme('links__system_main_menu', array(
       'links' => $main_menu,
       'attributes' => array(
         'id' => 'navbar-list',
         'class' => array('nav', 'navbar-nav'),
       ),
       'heading' => array(
         'text' => t('Main menu'),
         'level' => 'h3',
         'class' => array('element-invisible'),
       ),
     )); ?>
    </div>
   </nav> <!-- /#main-menu -->
<?php endif; ?>

   <hr class="sr-only" />

<?php print $messages; ?>

   <div id="main-wrapper" class="" role="main"><div id="main" class="container-fluid<?php if ($is_front) { echo 
" front"; } ?>">

<?php if ($page['highlighted']): ?>
	 <div id="highlighted" class="container-fluid"><?php print render($page['highlighted']); ?></div>
<?php endif; ?>

<?php //if (!$is_front && $page['sidebar_first']): ?>
<?php if ($page['sidebar_first']) { ?>
    <div id="sidebar-first" class="col-md-3"><div class="section">
 <?php print render($page['sidebar_first']); ?>
    </div></div> <!-- /.section, /#sidebar-first -->
	 <hr class="sr-only" />

	 <div id="content" class="column col-md-9"><div class="section">
<?php } else { ?>
	 <div id="content" class="column col-md-12"><div class="section">
<?php } ?>

	  <a id="main-content"></a>

	  <?php if ($breadcrumb): ?>
		<div id="breadcrumb"><span class="sr-only">Current Path: </span> <?php print $breadcrumb; ?></div>
	  <?php endif; ?>

    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>

		<?php print render($title_prefix); ?>
		<?php if (!$is_front && $title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
		<?php print render($title_suffix); ?>

	  <?php print render($page['help']); ?>

	  <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

	  <?php print render($page['content']); ?>

	  <?php print $feed_icons; ?>
	 </div></div> <!-- /.section, /#content -->

   </div></div><!-- /#main, /#main-wrapper -->

   <hr class="sr-only" />

   <div class="no-css">
    <a href="#top">Go to top</a> | <a href="#main-content">Go to main content</a>
   </div>

<?php print render($page['footer']); ?>

  </div></div><!-- /#page, /#page-wrapper -->

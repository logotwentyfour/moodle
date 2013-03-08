<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

if (!empty($PAGE->theme->settings->tagline)) {
    $tagline = '<p>'.$PAGE->theme->settings->tagline.'</p>';
} else {
    $tagline = '<!-- There was no custom tagline set -->';
}
if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->settings->logo;
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div class="front-page">
  <h1 class="headermain">
    <a href="<?php echo $CFG->wwwroot; ?>" title="Home"><?php echo $PAGE->heading ?></a>
  </h1>

  <?php # needed or gives error, but not outputting anything ?>
  <?php echo $OUTPUT->main_content() ?>

  <p>Returning Dermatology SpRs <a href="login/index.php">Login here</a> 
    <span>or</span>
    if you have yet to register on this website, you can <a href="/login/signup.php?">Create a New Account here</a></p>
</div>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
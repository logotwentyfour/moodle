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

<?php if (isloggedin()) { ?>
    <div id="page">

        <div id="wrapper" class="clearfix">

    <!-- START OF HEADER -->

            <div id="page-header">
                <div id="page-header-wrapper" class="wrapper clearfix">

                    <div id="header-left">
                        <h1 class="headermain">
                          <a href="<?php echo $CFG->wwwroot; ?>" title="Home"><?php echo $PAGE->heading ?></a>
                        </h1>
                    </div>
                    <div class="headermenu">
                        <?php
                            echo $OUTPUT->login_info();
                            echo $OUTPUT->lang_menu();
                            echo $PAGE->headingmenu;
                        ?>
                    </div>
                </div>
            </div>

    <!-- END OF HEADER -->

    <!-- START OF CONTENT -->

            <div id="page-content-wrapper" class="wrapper clearfix">
                <div id="page-content">
                    <div id="region-main-box">
                        <div id="region-post-box">

                            <div id="region-main-wrap">
                                <div id="region-main">
                                    <div class="region-content">
                                        <blockquote>
                                          <h2>Welcome all Dermatology SpRs to your website</h2>
                                          <p><strong>You are now part of the IDSS, the Irish Dermatology SpRs Society!</strong></p>
                                          <p>The function of this website is to support your education as your progress through your training. Please take the time to go through your website. It provides practical information relating to lecture and study day time tables as well as National and International meetings. The core Dermatology textbook is available for your use as is the Journal of the American Academy of Dermatology. Recordings of the previous lectures are uploaded. We have a quiz site where regular brain teasers will be posted awaiting your diagnosis. An on site journal club is ready to go where you will all contribute articles of interest on a regular basis. A forum is available which can be used to ask each other questions re difficult cases or pass on messages. A conundrum site will be there for you to post questions on difficult cases for which you may or may not have the answer. Development of the site will be continuous over the years and we welcome your input. We hope you find it a useful support tool during your training!</br></br>
                                        Patsy Lenane</br>
                                        Michelle Murphy</br>
                                        January 2013</p>
                                      </blockquote>
                                        
                                      <?php echo $OUTPUT->main_content() ?>
                                      
                                      <h2>IDSS Mission Statement</h2>
                                      <p>To enhance Dermatology training in Ireland ensuring the highest of standards.</p>
                                      <p>To solidify the group with the intention of improving education, encouraging the exchange of ideas and the support of one another</p>
                                    </div>
                                </div>
                            </div>

                            <?php if ($hassidepost) { ?>
                            <div id="region-post" class="block-region">
                                <div class="region-content">
                                    <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

    <!-- END OF CONTENT -->

        </div> <!-- END #wrapper -->

    <!-- START OF FOOTER -->
        <div id="page-footer" class="wrapper clearfix">
               <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
            <?php
                   echo $OUTPUT->login_info();
                   echo $OUTPUT->home_link();
                echo $OUTPUT->standard_footer_html();
               ?>
           </div>

    <!-- END OF FOOTER -->

    </div> <!-- END #page -->
<?php } else { ?>
  <div id="page">

    <div id="wrapper" class="clearfix">

      <!-- START OF HEADER -->

        <div id="page-header">
          <div id="page-header-wrapper" class="wrapper clearfix">
            <div class="front-page">
              <h1 class="headermain">
                <a href="<?php echo $CFG->wwwroot; ?>" title="Home"><?php echo $PAGE->heading ?></a>
              </h1>

              <?php # needed or gives error, but not outputting anything ?>
                <div class="visually-hidden">
                  <?php echo $OUTPUT->main_content() ?>
                </div>

                <p>Returning Dermatology SpRs <a href="login/index.php">Login here</a> 
                  <span>or</span>
                  To request an account contact <a href="mailto:info@idss.ie">info@idss.ie</a>
                </p>
            </div>
          </div>
        </div>
    </div>
  </div>
  
<?php } ?>

<?php echo $OUTPUT->standard_end_of_body_html() ?>

<?php # phpinfo(); ?>

</body>
</html>
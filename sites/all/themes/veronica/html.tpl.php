<?php

/**
 * @file
 * default theme implementation to display the basic html structure of a single
 * drupal page.
 *
 * variables:
 * - $css: an array of css files for the current page.
 * - $language: (object) the language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. it will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: all the rdf namespace prefixes used in the html document.
 * - $grddl_profile: a grddl profile allowing agents to extract the rdf data.
 * - $head_title: a modified version of the page title, for use in the title
 *   tag.
 * - $head_title_array: (array) an associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as title tag. the key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: the title of the current page, if any.
 *   - name: the name of the site.
 *   - slogan: the slogan of the site, if any, and if there is no title.
 * - $head: markup for the head section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: style tags necessary to import all css files for the page.
 * - $scripts: script tags necessary to load the javascript files and settings
 *   for the page.
 * - $page_top: initial markup from any modules that have altered the
 *   page. this variable should always be output first, before all other dynamic
 *   content.
 * - $page: the rendered page content.
 * - $page_bottom: final closing markup from any modules that have altered the
 *   page. this variable should always be output last, after all other dynamic
 *   content.
 * - $classes string of classes that can be used to style contextually through
 *   css.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!doctype html public "-//w3c//dtd xhtml+rdfa 1.0//en"
  "http://www.w3.org/markup/dtd/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="xhtml+rdfa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
    <script src="http://code.jquery.com/jquery-latest.js" ></script>
    <link href="sites/all/themes/veronica/css/layout.css" rel="stylesheet" />
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>

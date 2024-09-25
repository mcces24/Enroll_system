<?php
include_once '../MainFunction.php';

$semester = getActiveSemester();
if (isStudentLogin()) {
   $button1 = "Accounts";
   $studentData = getStudentData();
   $student = !empty($studentData['students'][0]) ? $studentData['students'][0] : array();
   $student['semester_id'] = isset($semester['semester_name']) ? $semester['semester_name'] : $student['semester_id'];
   $isAlreadySubmittedResponse  = checkIfAlreadyPreEnroll($student);

   $isAlreadySubmitted = isset($isAlreadySubmittedResponse['isAlreadySubmitted']) ? $isAlreadySubmittedResponse['isAlreadySubmitted'] : false;
} else {
   $button1 = "Login";
   header("location: ../enrollnow");
   exit();
}

$academicYear = getActiveAcademicYear();
$enroll = getActiveEnroll();
$new_user_id = getLoginUserId();
$email = getLoginEmail();
$courses = getCourse();
$start = !empty($academicYear) && $academicYear['academic_start'] ? $academicYear['academic_start'] : null;
$end = !empty($academicYear) && $academicYear['academic_end'] ? $academicYear['academic_end'] : null;
$academic = !empty($academicYear) ? "$start-$end" : null;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
   <style type="text/css">
      input::-webkit-inner-spin-button,
      input::-webkit-outer-spin-button {
         -webkit-appearance: none;
      }

      input[type="number"] {
         -moz-appearance: textfield;
      }
   </style>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="../guidance-step/assets/js/scripts.bundle.js"></script>
   <title>Enroll Now &#8211; Madridejos Community College</title>
   <link rel="icon" type="image" href="../icon.png">
   <meta name="robots" content="noindex, nofollow">
   <link rel="dns-prefetch" href="//fonts.googleapis.com">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="dns-prefetch" href="//s.w.org">
   <link rel="alternate" type="application/rss+xml" title="Madridejos Community College &raquo; Feed" href="./../feed/index.html">
   <link rel="alternate" type="application/rss+xml" title="Madridejos Community College &raquo; Comments Feed" href="./../comments/feed/index.html">
   <!-- Pickadate CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.date.css">
   <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Pickadate JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/picker.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/picker.date.js"></script>

   <script>
      window._wpemojiSettings = {
         "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
         "ext": ".png",
         "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
         "svgExt": ".svg",
         "source": {
            "concatemoji": ".\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.0.3"
         }
      };
      /*! This file is auto-generated */
      ! function(e, a, t) {
         var n, r, o, i = a.createElement("canvas"),
            p = i.getContext && i.getContext("2d");

         function s(e, t) {
            var a = String.fromCharCode,
               e = (p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0), i.toDataURL());
            return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
         }

         function c(e) {
            var t = a.createElement("script");
            t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
         }
         for (o = Array("flag", "emoji"), t.supports = {
               everything: !0,
               everythingExceptFlag: !0
            }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
            if (!p || !p.fillText) return !1;
            switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
               case "flag":
                  return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
               case "emoji":
                  return !s([129777, 127995, 8205, 129778, 127999], [129777, 127995, 8203, 129778, 127999])
            }
            return !1
         }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
         t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function() {
            t.DOMReady = !0
         }, t.supports.everything || (n = function() {
            t.readyCallback()
         }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
            "complete" === a.readyState && t.readyCallback()
         })), (e = t.source || {}).concatemoji ? c(e.concatemoji) : e.wpemoji && e.twemoji && (c(e.twemoji), c(e.wpemoji)))
      }(window, document, window._wpemojiSettings);
   </script>
   <style>
      img.wp-smiley,
      img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 0.07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
      }
   </style>
   <link rel="stylesheet" id="astra-theme-css-css" href="./../wp-content/themes/astra/assets/css/minified/main.min.css?ver=3.9.2" media="all">
   <style id="astra-theme-css-inline-css">
      .picker__select--year, .picker__select--month {
         padding: 2px !important;
      }
      .ast-no-sidebar .entry-content .alignfull {
         margin-left: calc(-50vw + 50%);
         margin-right: calc(-50vw + 50%);
         max-width: 100vw;
         width: 100vw;
      }

      .ast-no-sidebar .entry-content .alignwide {
         margin-left: calc(-41vw + 50%);
         margin-right: calc(-41vw + 50%);
         max-width: unset;
         width: unset;
      }

      .ast-no-sidebar .entry-content .alignfull .alignfull,
      .ast-no-sidebar .entry-content .alignfull .alignwide,
      .ast-no-sidebar .entry-content .alignwide .alignfull,
      .ast-no-sidebar .entry-content .alignwide .alignwide,
      .ast-no-sidebar .entry-content .wp-block-column .alignfull,
      .ast-no-sidebar .entry-content .wp-block-column .alignwide {
         width: 100%;
         margin-left: auto;
         margin-right: auto;
      }

      .wp-block-gallery,
      .blocks-gallery-grid {
         margin: 0;
      }

      .wp-block-separator {
         max-width: 100px;
      }

      .wp-block-separator.is-style-wide,
      .wp-block-separator.is-style-dots {
         max-width: none;
      }

      .entry-content .has-2-columns .wp-block-column:first-child {
         padding-right: 10px;
      }

      .entry-content .has-2-columns .wp-block-column:last-child {
         padding-left: 10px;
      }

      @media (max-width: 782px) {
         .entry-content .wp-block-columns .wp-block-column {
            flex-basis: 100%;
         }

         .entry-content .has-2-columns .wp-block-column:first-child {
            padding-right: 0;
         }

         .entry-content .has-2-columns .wp-block-column:last-child {
            padding-left: 0;
         }
      }

      body .entry-content .wp-block-latest-posts {
         margin-left: 0;
      }

      body .entry-content .wp-block-latest-posts li {
         list-style: none;
      }

      .ast-no-sidebar .ast-container .entry-content .wp-block-latest-posts {
         margin-left: 0;
      }

      .ast-header-break-point .entry-content .alignwide {
         margin-left: auto;
         margin-right: auto;
      }

      .entry-content .blocks-gallery-item img {
         margin-bottom: auto;
      }

      .wp-block-pullquote {
         border-top: 4px solid #555d66;
         border-bottom: 4px solid #555d66;
         color: #40464d;
      }

      :root {
         --ast-container-default-xlg-padding: 6.67em;
         --ast-container-default-lg-padding: 5.67em;
         --ast-container-default-slg-padding: 4.34em;
         --ast-container-default-md-padding: 3.34em;
         --ast-container-default-sm-padding: 6.67em;
         --ast-container-default-xs-padding: 2.4em;
         --ast-container-default-xxs-padding: 1.4em;
      }

      html {
         font-size: 100%;
      }

      a,
      .page-title {
         color: var(--ast-global-color-2);
      }

      a:hover,
      a:focus {
         color: var(--ast-global-color-1);
      }

      body,
      button,
      input,
      select,
      textarea,
      .ast-button,
      .ast-custom-button {
         font-family: 'Open Sans', sans-serif;
         font-weight: 400;
         font-size: 16px;
         font-size: 1rem;
      }

      blockquote {
         color: var(--ast-global-color-3);
      }

      p,
      .entry-content p {
         margin-bottom: 1em;
      }

      h1,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6,
      .site-title,
      .site-title a {
         font-family: 'Vollkorn', serif;
         font-weight: 700;
      }

      .site-title {
         font-size: 35px;
         font-size: 2.1875rem;
         display: none;
      }

      header .custom-logo-link img {
         max-width: 120px;
      }

      .astra-logo-svg {
         width: 120px;
      }

      .ast-archive-description .ast-archive-title {
         font-size: 40px;
         font-size: 2.5rem;
      }

      .site-header .site-description {
         font-size: 15px;
         font-size: 0.9375rem;
         display: none;
      }

      .entry-title {
         font-size: 30px;
         font-size: 1.875rem;
      }

      h1,
      .entry-content h1 {
         font-size: 80px;
         font-size: 5rem;
         font-family: 'Vollkorn', serif;
         line-height: 1.1;
      }

      h2,
      .entry-content h2 {
         font-size: 56px;
         font-size: 3.5rem;
         font-family: 'Vollkorn', serif;
         line-height: 1.2;
      }

      h3,
      .entry-content h3 {
         font-size: 40px;
         font-size: 2.5rem;
         font-family: 'Vollkorn', serif;
         line-height: 1.2;
      }

      h4,
      .entry-content h4 {
         font-size: 32px;
         font-size: 2rem;
         font-family: 'Vollkorn', serif;
      }

      h5,
      .entry-content h5 {
         font-size: 24px;
         font-size: 1.5rem;
         font-family: 'Vollkorn', serif;
      }

      h6,
      .entry-content h6 {
         font-size: 18px;
         font-size: 1.125rem;
         font-family: 'Vollkorn', serif;
      }

      .ast-single-post .entry-title,
      .page-title {
         font-size: 30px;
         font-size: 1.875rem;
      }

      ::selection {
         background-color: var(--ast-global-color-0);
         color: #ffffff;
      }

      body,
      h1,
      .entry-title a,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6 {
         color: var(--ast-global-color-3);
      }

      .tagcloud a:hover,
      .tagcloud a:focus,
      .tagcloud a.current-item {
         color: #ffffff;
         border-color: var(--ast-global-color-2);
         background-color: var(--ast-global-color-2);
      }

      input:focus,
      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="password"]:focus,
      input[type="reset"]:focus,
      input[type="search"]:focus,
      textarea:focus {
         border-color: var(--ast-global-color-2);
      }

      input[type="radio"]:checked,
      input[type=reset],
      input[type="checkbox"]:checked,
      input[type="checkbox"]:hover:checked,
      input[type="checkbox"]:focus:checked,
      input[type=range]::-webkit-slider-thumb {
         border-color: var(--ast-global-color-2);
         background-color: var(--ast-global-color-2);
         box-shadow: none;
      }

      .site-footer a:hover+.post-count,
      .site-footer a:focus+.post-count {
         background: var(--ast-global-color-2);
         border-color: var(--ast-global-color-2);
      }

      .single .nav-links .nav-previous,
      .single .nav-links .nav-next {
         color: var(--ast-global-color-2);
      }

      .entry-meta,
      .entry-meta * {
         line-height: 1.45;
         color: var(--ast-global-color-2);
      }

      .entry-meta a:hover,
      .entry-meta a:hover *,
      .entry-meta a:focus,
      .entry-meta a:focus *,
      .page-links>.page-link,
      .page-links .page-link:hover,
      .post-navigation a:hover {
         color: var(--ast-global-color-1);
      }

      #cat option,
      .secondary .calendar_wrap thead a,
      .secondary .calendar_wrap thead a:visited {
         color: var(--ast-global-color-2);
      }

      .secondary .calendar_wrap #today,
      .ast-progress-val span {
         background: var(--ast-global-color-2);
      }

      .secondary a:hover+.post-count,
      .secondary a:focus+.post-count {
         background: var(--ast-global-color-2);
         border-color: var(--ast-global-color-2);
      }

      .calendar_wrap #today>a {
         color: #ffffff;
      }

      .page-links .page-link,
      .single .post-navigation a {
         color: var(--ast-global-color-2);
      }

      .widget-title {
         font-size: 22px;
         font-size: 1.375rem;
         color: var(--ast-global-color-3);
      }

      .ast-logo-title-inline .site-logo-img {
         padding-right: 1em;
      }

      .site-logo-img img {
         transition: all 0.2s linear;
      }

      @media (max-width:921px) {
         #ast-desktop-header {
            display: none;
         }
      }

      @media (min-width:921px) {
         #ast-mobile-header {
            display: none;
         }
      }

      .wp-block-buttons.aligncenter {
         justify-content: center;
      }

      @media (max-width:921px) {

         .ast-theme-transparent-header #primary,
         .ast-theme-transparent-header #secondary {
            padding: 0;
         }
      }

      @media (max-width:921px) {
         .ast-plain-container.ast-no-sidebar #primary {
            padding: 0;
         }
      }

      .ast-plain-container.ast-no-sidebar #primary {
         margin-top: 0;
         margin-bottom: 0;
      }

      @media (min-width:1200px) {

         .ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignfull,
         .ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignfull,
         .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignfull,
         .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignfull {
            margin-left: -6.67em;
            margin-right: -6.67em;
            max-width: unset;
            width: unset;
         }

         .ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignwide,
         .ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignwide,
         .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignwide,
         .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignwide {
            margin-left: -20px;
            margin-right: -20px;
            max-width: unset;
            width: unset;
         }
      }

      @media (min-width:1200px) {
         .wp-block-group .has-background {
            padding: 20px;
         }
      }

      @media (min-width:1200px) {

         .ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignwide,
         .ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignwide {
            margin-left: -20px;
            margin-right: -20px;
            padding-left: 20px;
            padding-right: 20px;
         }

         .ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignfull,
         .ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignfull {
            margin-left: -6.67em;
            margin-right: -6.67em;
            padding-left: 6.67em;
            padding-right: 6.67em;
         }
      }

      @media (min-width:1200px) {

         .wp-block-cover-image.alignwide .wp-block-cover__inner-container,
         .wp-block-cover.alignwide .wp-block-cover__inner-container,
         .wp-block-cover-image.alignfull .wp-block-cover__inner-container,
         .wp-block-cover.alignfull .wp-block-cover__inner-container {
            width: 100%;
         }
      }

      .wp-block-columns {
         margin-bottom: unset;
      }

      .wp-block-image.size-full {
         margin: 2rem 0;
      }

      .wp-block-separator.has-background {
         padding: 0;
      }

      .wp-block-gallery {
         margin-bottom: 1.6em;
      }

      .wp-block-group {
         padding-top: 4em;
         padding-bottom: 4em;
      }

      .wp-block-group__inner-container .wp-block-columns:last-child,
      .wp-block-group__inner-container :last-child,
      .wp-block-table table {
         margin-bottom: 0;
      }

      .blocks-gallery-grid {
         width: 100%;
      }

      .wp-block-navigation-link__content {
         padding: 5px 0;
      }

      .wp-block-group .wp-block-group .has-text-align-center,
      .wp-block-group .wp-block-column .has-text-align-center {
         max-width: 100%;
      }

      .has-text-align-center {
         margin: 0 auto;
      }

      @media (min-width:1200px) {

         .wp-block-cover__inner-container,
         .alignwide .wp-block-group__inner-container,
         .alignfull .wp-block-group__inner-container {
            max-width: 1200px;
            margin: 0 auto;
         }

         .wp-block-group.alignnone,
         .wp-block-group.aligncenter,
         .wp-block-group.alignleft,
         .wp-block-group.alignright,
         .wp-block-group.alignwide,
         .wp-block-columns.alignwide {
            margin: 2rem 0 1rem 0;
         }
      }

      @media (max-width:1200px) {
         .wp-block-group {
            padding: 3em;
         }

         .wp-block-group .wp-block-group {
            padding: 1.5em;
         }

         .wp-block-columns,
         .wp-block-column {
            margin: 1rem 0;
         }
      }

      @media (min-width:921px) {
         .wp-block-columns .wp-block-group {
            padding: 2em;
         }
      }

      @media (max-width:544px) {

         .wp-block-cover-image .wp-block-cover__inner-container,
         .wp-block-cover .wp-block-cover__inner-container {
            width: unset;
         }

         .wp-block-cover,
         .wp-block-cover-image {
            padding: 2em 0;
         }

         .wp-block-group,
         .wp-block-cover {
            padding: 2em;
         }

         .wp-block-media-text__media img,
         .wp-block-media-text__media video {
            width: unset;
            max-width: 100%;
         }

         .wp-block-media-text.has-background .wp-block-media-text__content {
            padding: 1em;
         }
      }

      .wp-block-image.aligncenter {
         margin-left: auto;
         margin-right: auto;
      }

      .wp-block-table.aligncenter {
         margin-left: auto;
         margin-right: auto;
      }

      @media (min-width:544px) {
         .entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content {
            padding: 0 8% 0 0;
         }

         .entry-content .wp-block-media-text .wp-block-media-text__content {
            padding: 0 0 0 8%;
         }

         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-left>*,
         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-right>*,
         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-left>*,
         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-right>*,
         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-right>*,
         .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-left>* {
            margin: 0;
         }
      }

      @media (max-width:544px) {
         .entry-content .wp-block-media-text .wp-block-media-text__content {
            padding: 8% 0;
         }

         .wp-block-media-text .wp-block-media-text__media img {
            width: auto;
            max-width: 100%;
         }
      }

      .wp-block-button.is-style-outline .wp-block-button__link {
         border-color: #ffffff;
         border-top-width: 2px;
         border-right-width: 2px;
         border-bottom-width: 2px;
         border-left-width: 2px;
      }

      .wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color),
      .wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color) {
         color: #ffffff;
      }

      .wp-block-button.is-style-outline .wp-block-button__link:hover,
      .wp-block-button.is-style-outline .wp-block-button__link:focus {
         color: var(--ast-global-color-1) !important;
         background-color: rgba(255, 255, 255, 0.8);
         border-color: rgba(255, 255, 255, 0.8);
      }

      .post-page-numbers.current .page-link,
      .ast-pagination .page-numbers.current {
         color: #ffffff;
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
         border-radius: 2px;
      }

      @media (max-width:921px) {
         .wp-block-button.is-style-outline .wp-block-button__link {
            padding-top: calc(15px - 2px);
            padding-right: calc(30px - 2px);
            padding-bottom: calc(15px - 2px);
            padding-left: calc(30px - 2px);
         }
      }

      @media (max-width:544px) {
         .wp-block-button.is-style-outline .wp-block-button__link {
            padding-top: calc(15px - 2px);
            padding-right: calc(30px - 2px);
            padding-bottom: calc(15px - 2px);
            padding-left: calc(30px - 2px);
         }
      }

      @media (min-width:544px) {
         .entry-content>.alignleft {
            margin-right: 20px;
         }

         .entry-content>.alignright {
            margin-left: 20px;
         }

         .wp-block-group.has-background {
            padding: 20px;
         }
      }

      @media (max-width:921px) {

         .ast-separate-container #primary,
         .ast-separate-container #secondary {
            padding: 1.5em 0;
         }

         #primary,
         #secondary {
            padding: 1.5em 0;
            margin: 0;
         }

         .ast-left-sidebar #content>.ast-container {
            display: flex;
            flex-direction: column-reverse;
            width: 100%;
         }

         .ast-separate-container .ast-article-post,
         .ast-separate-container .ast-article-single {
            padding: 1.5em 2.14em;
         }

         .ast-author-box img.avatar {
            margin: 20px 0 0 0;
         }
      }

      @media (min-width:922px) {

         .ast-separate-container.ast-right-sidebar #primary,
         .ast-separate-container.ast-left-sidebar #primary {
            border: 0;
         }

         .search-no-results.ast-separate-container #primary {
            margin-bottom: 4em;
         }
      }

      .elementor-button-wrapper .elementor-button {
         border-style: solid;
         text-decoration: none;
         border-top-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-bottom-width: 0;
      }

      body .elementor-button.elementor-size-sm,
      body .elementor-button.elementor-size-xs,
      body .elementor-button.elementor-size-md,
      body .elementor-button.elementor-size-lg,
      body .elementor-button.elementor-size-xl,
      body .elementor-button {
         border-radius: 4px;
         padding-top: 15px;
         padding-right: 24px;
         padding-bottom: 15px;
         padding-left: 24px;
      }

      @media (max-width:921px) {

         .elementor-button-wrapper .elementor-button.elementor-size-sm,
         .elementor-button-wrapper .elementor-button.elementor-size-xs,
         .elementor-button-wrapper .elementor-button.elementor-size-md,
         .elementor-button-wrapper .elementor-button.elementor-size-lg,
         .elementor-button-wrapper .elementor-button.elementor-size-xl,
         .elementor-button-wrapper .elementor-button {
            padding-top: 14px;
            padding-right: 24px;
            padding-bottom: 14px;
            padding-left: 24px;
         }
      }

      @media (max-width:544px) {

         .elementor-button-wrapper .elementor-button.elementor-size-sm,
         .elementor-button-wrapper .elementor-button.elementor-size-xs,
         .elementor-button-wrapper .elementor-button.elementor-size-md,
         .elementor-button-wrapper .elementor-button.elementor-size-lg,
         .elementor-button-wrapper .elementor-button.elementor-size-xl,
         .elementor-button-wrapper .elementor-button {
            padding-top: 12px;
            padding-right: 22px;
            padding-bottom: 12px;
            padding-left: 22px;
         }
      }

      .elementor-button-wrapper .elementor-button {
         border-color: #ffffff;
         background-color: #ffffff;
      }

      .elementor-button-wrapper .elementor-button:hover,
      .elementor-button-wrapper .elementor-button:focus {
         color: var(--ast-global-color-1);
         background-color: rgba(255, 255, 255, 0.8);
         border-color: rgba(255, 255, 255, 0.8);
      }

      .wp-block-button .wp-block-button__link,
      .elementor-button-wrapper .elementor-button,
      .elementor-button-wrapper .elementor-button:visited {
         color: var(--ast-global-color-0);
      }

      .elementor-button-wrapper .elementor-button {
         font-family: Georgia, Times, serif;
         font-weight: 700;
         line-height: 1;
      }

      body .elementor-button.elementor-size-sm,
      body .elementor-button.elementor-size-xs,
      body .elementor-button.elementor-size-md,
      body .elementor-button.elementor-size-lg,
      body .elementor-button.elementor-size-xl,
      body .elementor-button {
         font-size: 15px;
         font-size: 0.9375rem;
      }

      .wp-block-button .wp-block-button__link:hover,
      .wp-block-button .wp-block-button__link:focus {
         color: var(--ast-global-color-1);
         background-color: rgba(255, 255, 255, 0.8);
         border-color: rgba(255, 255, 255, 0.8);
      }

      .elementor-widget-heading h1.elementor-heading-title {
         line-height: 1.1;
      }

      .elementor-widget-heading h2.elementor-heading-title {
         line-height: 1.2;
      }

      .elementor-widget-heading h3.elementor-heading-title {
         line-height: 1.2;
      }

      .wp-block-button .wp-block-button__link {
         border: none;
         background-color: #ffffff;
         color: var(--ast-global-color-0);
         font-family: Georgia, Times, serif;
         font-weight: 700;
         line-height: 1;
         font-size: 15px;
         font-size: 0.9375rem;
         border-radius: 4px;
         padding: 15px 30px;
      }

      .wp-block-button.is-style-outline .wp-block-button__link {
         border-style: solid;
         border-top-width: 2px;
         border-right-width: 2px;
         border-left-width: 2px;
         border-bottom-width: 2px;
         border-color: #ffffff;
         padding-top: calc(15px - 2px);
         padding-right: calc(30px - 2px);
         padding-bottom: calc(15px - 2px);
         padding-left: calc(30px - 2px);
      }

      @media (max-width:921px) {
         .wp-block-button .wp-block-button__link {
            font-size: 14px;
            font-size: 0.875rem;
            border: none;
            padding: 15px 30px;
         }

         .wp-block-button.is-style-outline .wp-block-button__link {
            padding-top: calc(15px - 2px);
            padding-right: calc(30px - 2px);
            padding-bottom: calc(15px - 2px);
            padding-left: calc(30px - 2px);
         }
      }

      @media (max-width:544px) {
         .wp-block-button .wp-block-button__link {
            font-size: 13px;
            font-size: 0.8125rem;
            border: none;
            padding: 15px 30px;
         }

         .wp-block-button.is-style-outline .wp-block-button__link {
            padding-top: calc(15px - 2px);
            padding-right: calc(30px - 2px);
            padding-bottom: calc(15px - 2px);
            padding-left: calc(30px - 2px);
         }
      }

      .menu-toggle,
      button,
      .ast-button,
      .ast-custom-button,
      .button,
      input#submit,
      input[type="button"],
      input[type="submit"],
      input[type="reset"] {
         border-style: solid;
         border-top-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-bottom-width: 0;
         color: var(--ast-global-color-0);
         border-color: #ffffff;
         background-color: #ffffff;
         border-radius: 4px;
         padding-top: 15px;
         padding-right: 24px;
         padding-bottom: 15px;
         padding-left: 24px;
         font-family: Georgia, Times, serif;
         font-weight: 700;
         font-size: 15px;
         font-size: 0.9375rem;
         line-height: 1;
      }

      button:focus,
      .menu-toggle:hover,
      button:hover,
      .ast-button:hover,
      .ast-custom-button:hover .button:hover,
      .ast-custom-button:hover,
      input[type=reset]:hover,
      input[type=reset]:focus,
      input#submit:hover,
      input#submit:focus,
      input[type="button"]:hover,
      input[type="button"]:focus,
      input[type="submit"]:hover,
      input[type="submit"]:focus {
         color: var(--ast-global-color-1);
         background-color: rgba(255, 255, 255, 0.8);
         border-color: rgba(255, 255, 255, 0.8);
      }

      @media (min-width:544px) {
         .ast-container {
            max-width: 100%;
         }
      }

      @media (max-width:544px) {

         .ast-separate-container .ast-article-post,
         .ast-separate-container .ast-article-single,
         .ast-separate-container .comments-title,
         .ast-separate-container .ast-archive-description {
            padding: 1.5em 1em;
         }

         .ast-separate-container #content .ast-container {
            padding-left: 0.54em;
            padding-right: 0.54em;
         }

         .ast-separate-container .ast-comment-list li.depth-1 {
            padding: 1.5em 1em;
            margin-bottom: 1.5em;
         }

         .ast-separate-container .ast-comment-list .bypostauthor {
            padding: .5em;
         }

         .ast-search-menu-icon.ast-dropdown-active .search-field {
            width: 170px;
         }

         .menu-toggle,
         button,
         .ast-button,
         .button,
         input#submit,
         input[type="button"],
         input[type="submit"],
         input[type="reset"] {
            padding-top: 12px;
            padding-right: 22px;
            padding-bottom: 12px;
            padding-left: 22px;
            font-size: 13px;
            font-size: 0.8125rem;
         }
      }

      @media (max-width:921px) {

         .menu-toggle,
         button,
         .ast-button,
         .button,
         input#submit,
         input[type="button"],
         input[type="submit"],
         input[type="reset"] {
            padding-top: 14px;
            padding-right: 24px;
            padding-bottom: 14px;
            padding-left: 24px;
            font-size: 14px;
            font-size: 0.875rem;
         }

         .ast-mobile-header-stack .main-header-bar .ast-search-menu-icon {
            display: inline-block;
         }

         .ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon {
            margin: 0;
         }

         .ast-comment-avatar-wrap img {
            max-width: 2.5em;
         }

         .ast-separate-container .ast-comment-list li.depth-1 {
            padding: 1.5em 2.14em;
         }

         .ast-separate-container .comment-respond {
            padding: 2em 2.14em;
         }

         .ast-comment-meta {
            padding: 0 1.8888em 1.3333em;
         }
      }

      body,
      .ast-separate-container {
         background-color: var(--ast-global-color-4);
         ;
         background-image: none;
         ;
      }

      .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
         margin-left: -6.67em;
         margin-right: -6.67em;
         width: auto;
      }

      @media (max-width: 1200px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -2.4em;
            margin-right: -2.4em;
         }
      }

      @media (max-width: 768px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -2.14em;
            margin-right: -2.14em;
         }
      }

      @media (max-width: 544px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -1em;
            margin-right: -1em;
         }
      }

      .ast-no-sidebar.ast-separate-container .entry-content .alignwide {
         margin-left: -20px;
         margin-right: -20px;
      }

      .ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignfull,
      .ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignwide {
         margin-left: auto;
         margin-right: auto;
         width: 100%;
      }

      @media (max-width:921px) {
         .site-title {
            display: none;
         }

         .ast-archive-description .ast-archive-title {
            font-size: 40px;
         }

         .site-header .site-description {
            display: none;
         }

         .entry-title {
            font-size: 30px;
         }

         h1,
         .entry-content h1 {
            font-size: 56px;
         }

         h2,
         .entry-content h2 {
            font-size: 40px;
         }

         h3,
         .entry-content h3 {
            font-size: 32px;
         }

         h4,
         .entry-content h4 {
            font-size: 24px;
            font-size: 1.5rem;
         }

         h5,
         .entry-content h5 {
            font-size: 20px;
            font-size: 1.25rem;
         }

         h6,
         .entry-content h6 {
            font-size: 17px;
            font-size: 1.0625rem;
         }

         .ast-single-post .entry-title,
         .page-title {
            font-size: 30px;
         }

         .astra-logo-svg {
            width: 120px;
         }

         header .custom-logo-link img,
         .ast-header-break-point .site-logo-img .custom-mobile-logo-link img {
            max-width: 120px;
         }
      }

      @media (max-width:544px) {
         .site-title {
            display: none;
         }

         .ast-archive-description .ast-archive-title {
            font-size: 40px;
         }

         .site-header .site-description {
            display: none;
         }

         .entry-title {
            font-size: 30px;
         }

         h1,
         .entry-content h1 {
            font-size: 36px;
         }

         h2,
         .entry-content h2 {
            font-size: 32px;
         }

         h3,
         .entry-content h3 {
            font-size: 24px;
         }

         h4,
         .entry-content h4 {
            font-size: 20px;
            font-size: 1.25rem;
         }

         h5,
         .entry-content h5 {
            font-size: 18px;
            font-size: 1.125rem;
         }

         h6,
         .entry-content h6 {
            font-size: 16px;
            font-size: 1rem;
         }

         .ast-single-post .entry-title,
         .page-title {
            font-size: 30px;
         }

         header .custom-logo-link img,
         .ast-header-break-point .site-branding img,
         .ast-header-break-point .custom-logo-link img {
            max-width: 112px;
         }

         .astra-logo-svg {
            width: 112px;
         }

         .ast-header-break-point .site-logo-img .custom-mobile-logo-link img {
            max-width: 112px;
         }
      }

      @media (max-width:921px) {
         html {
            font-size: 91.2%;
         }
      }

      @media (max-width:544px) {
         html {
            font-size: 91.2%;
         }
      }

      @media (min-width:922px) {
         .ast-container {
            max-width: 1240px;
         }
      }

      @media (min-width:922px) {
         .site-content .ast-container {
            display: flex;
         }
      }

      @media (max-width:921px) {
         .site-content .ast-container {
            flex-direction: column;
         }
      }

      @media (min-width:922px) {

         .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover>.sub-menu,
         .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus>.sub-menu {
            margin-left: -0px;
         }
      }

      blockquote {
         padding: 1.2em;
      }

      :root .has-ast-global-color-0-color {
         color: var(--ast-global-color-0);
      }

      :root .has-ast-global-color-0-background-color {
         background-color: var(--ast-global-color-0);
      }

      :root .wp-block-button .has-ast-global-color-0-color {
         color: var(--ast-global-color-0);
      }

      :root .wp-block-button .has-ast-global-color-0-background-color {
         background-color: var(--ast-global-color-0);
      }

      :root .has-ast-global-color-1-color {
         color: var(--ast-global-color-1);
      }

      :root .has-ast-global-color-1-background-color {
         background-color: var(--ast-global-color-1);
      }

      :root .wp-block-button .has-ast-global-color-1-color {
         color: var(--ast-global-color-1);
      }

      :root .wp-block-button .has-ast-global-color-1-background-color {
         background-color: var(--ast-global-color-1);
      }

      :root .has-ast-global-color-2-color {
         color: var(--ast-global-color-2);
      }

      :root .has-ast-global-color-2-background-color {
         background-color: var(--ast-global-color-2);
      }

      :root .wp-block-button .has-ast-global-color-2-color {
         color: var(--ast-global-color-2);
      }

      :root .wp-block-button .has-ast-global-color-2-background-color {
         background-color: var(--ast-global-color-2);
      }

      :root .has-ast-global-color-3-color {
         color: var(--ast-global-color-3);
      }

      :root .has-ast-global-color-3-background-color {
         background-color: var(--ast-global-color-3);
      }

      :root .wp-block-button .has-ast-global-color-3-color {
         color: var(--ast-global-color-3);
      }

      :root .wp-block-button .has-ast-global-color-3-background-color {
         background-color: var(--ast-global-color-3);
      }

      :root .has-ast-global-color-4-color {
         color: var(--ast-global-color-4);
      }

      :root .has-ast-global-color-4-background-color {
         background-color: var(--ast-global-color-4);
      }

      :root .wp-block-button .has-ast-global-color-4-color {
         color: var(--ast-global-color-4);
      }

      :root .wp-block-button .has-ast-global-color-4-background-color {
         background-color: var(--ast-global-color-4);
      }

      :root .has-ast-global-color-5-color {
         color: var(--ast-global-color-5);
      }

      :root .has-ast-global-color-5-background-color {
         background-color: var(--ast-global-color-5);
      }

      :root .wp-block-button .has-ast-global-color-5-color {
         color: var(--ast-global-color-5);
      }

      :root .wp-block-button .has-ast-global-color-5-background-color {
         background-color: var(--ast-global-color-5);
      }

      :root .has-ast-global-color-6-color {
         color: var(--ast-global-color-6);
      }

      :root .has-ast-global-color-6-background-color {
         background-color: var(--ast-global-color-6);
      }

      :root .wp-block-button .has-ast-global-color-6-color {
         color: var(--ast-global-color-6);
      }

      :root .wp-block-button .has-ast-global-color-6-background-color {
         background-color: var(--ast-global-color-6);
      }

      :root .has-ast-global-color-7-color {
         color: var(--ast-global-color-7);
      }

      :root .has-ast-global-color-7-background-color {
         background-color: var(--ast-global-color-7);
      }

      :root .wp-block-button .has-ast-global-color-7-color {
         color: var(--ast-global-color-7);
      }

      :root .wp-block-button .has-ast-global-color-7-background-color {
         background-color: var(--ast-global-color-7);
      }

      :root .has-ast-global-color-8-color {
         color: var(--ast-global-color-8);
      }

      :root .has-ast-global-color-8-background-color {
         background-color: var(--ast-global-color-8);
      }

      :root .wp-block-button .has-ast-global-color-8-color {
         color: var(--ast-global-color-8);
      }

      :root .wp-block-button .has-ast-global-color-8-background-color {
         background-color: var(--ast-global-color-8);
      }

      :root {
         --ast-global-color-0: #EF4D48;
         --ast-global-color-1: #D90700;
         --ast-global-color-2: #2B161B;
         --ast-global-color-3: #453E3E;
         --ast-global-color-4: #F7F3F5;
         --ast-global-color-5: #FFFFFF;
         --ast-global-color-6: #000000;
         --ast-global-color-7: #4B4F58;
         --ast-global-color-8: #F6F7F8;
      }

      :root {
         --ast-border-color: #dddddd;
      }

      .ast-breadcrumbs .trail-browse,
      .ast-breadcrumbs .trail-items,
      .ast-breadcrumbs .trail-items li {
         display: inline-block;
         margin: 0;
         padding: 0;
         border: none;
         background: inherit;
         text-indent: 0;
      }

      .ast-breadcrumbs .trail-browse {
         font-size: inherit;
         font-style: inherit;
         font-weight: inherit;
         color: inherit;
      }

      .ast-breadcrumbs .trail-items {
         list-style: none;
      }

      .trail-items li::after {
         padding: 0 0.3em;
         content: "\00bb";
      }

      .trail-items li:last-of-type::after {
         display: none;
      }

      h1,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6 {
         color: var(--ast-global-color-2);
      }

      @media (max-width:921px) {

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row>*:first-child,
         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
         }
      }

      @media (max-width:544px) {

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row>*:first-child,
         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
         }
      }

      .ast-builder-layout-element[data-section="title_tagline"] {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
         }
      }

      .ast-builder-menu-1 {
         font-family: Georgia, Times, serif;
         font-weight: 700;
      }

      .ast-builder-menu-1 .menu-item>.menu-link {
         font-size: 15px;
         font-size: 0.9375rem;
         color: var(--ast-global-color-3);
      }

      .ast-builder-menu-1 .menu-item>.ast-menu-toggle {
         color: var(--ast-global-color-3);
      }

      .ast-builder-menu-1 .menu-item:hover>.menu-link,
      .ast-builder-menu-1 .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
         color: var(--ast-global-color-1);
      }

      .ast-builder-menu-1 .menu-item:hover>.ast-menu-toggle {
         color: var(--ast-global-color-1);
      }

      .ast-builder-menu-1 .menu-item.current-menu-item>.menu-link,
      .ast-builder-menu-1 .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
      .ast-builder-menu-1 .current-menu-ancestor>.menu-link {
         color: var(--ast-global-color-1);
      }

      .ast-builder-menu-1 .menu-item.current-menu-item>.ast-menu-toggle {
         color: var(--ast-global-color-1);
      }

      .ast-builder-menu-1 .sub-menu,
      .ast-builder-menu-1 .inline-on-mobile .sub-menu {
         border-top-width: 2px;
         border-bottom-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-color: var(--ast-global-color-0);
         border-style: solid;
         border-radius: 0;
      }

      .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
      .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
         margin-top: 0;
      }

      .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu:before,
      .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper:before {
         height: calc(0px + 5px);
      }

      .ast-desktop .ast-builder-menu-1 .menu-item .sub-menu .menu-link {
         border-style: none;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
         }

         .ast-builder-menu-1 .menu-item-has-children>.menu-link:after {
            content: unset;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
         }
      }

      .ast-builder-menu-1 {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
         }
      }

      .ast-builder-social-element:hover {
         color: #0274be;
      }

      .ast-social-stack-desktop .ast-builder-social-element,
      .ast-social-stack-tablet .ast-builder-social-element,
      .ast-social-stack-mobile .ast-builder-social-element {
         margin-top: 6px;
         margin-bottom: 6px;
      }

      .ast-social-color-type-official .ast-builder-social-element,
      .ast-social-color-type-official .social-item-label {
         color: var(--color);
         background-color: var(--background-color);
      }

      .header-social-inner-wrap.ast-social-color-type-official .ast-builder-social-element svg,
      .footer-social-inner-wrap.ast-social-color-type-official .ast-builder-social-element svg {
         fill: currentColor;
      }

      .social-show-label-true .ast-builder-social-element {
         width: auto;
         padding: 0 0.4em;
      }

      [data-section^="section-fb-social-icons-"] .footer-social-inner-wrap {
         text-align: center;
      }

      .ast-footer-social-wrap {
         width: 100%;
      }

      .ast-footer-social-wrap .ast-builder-social-element:first-child {
         margin-left: 0;
      }

      .ast-footer-social-wrap .ast-builder-social-element:last-child {
         margin-right: 0;
      }

      .ast-header-social-wrap .ast-builder-social-element:first-child {
         margin-left: 0;
      }

      .ast-header-social-wrap .ast-builder-social-element:last-child {
         margin-right: 0;
      }

      .ast-builder-social-element {
         line-height: 1;
         color: #3a3a3a;
         background: transparent;
         vertical-align: middle;
         transition: all 0.01s;
         margin-left: 6px;
         margin-right: 6px;
         justify-content: center;
         align-items: center;
      }

      .ast-builder-social-element {
         line-height: 1;
         color: #3a3a3a;
         background: transparent;
         vertical-align: middle;
         transition: all 0.01s;
         margin-left: 6px;
         margin-right: 6px;
         justify-content: center;
         align-items: center;
      }

      .ast-builder-social-element .social-item-label {
         padding-left: 6px;
      }

      .ast-header-social-1-wrap .ast-builder-social-element {
         margin-left: 12px;
         margin-right: 12px;
      }

      .ast-header-social-1-wrap .ast-builder-social-element svg {
         width: 18px;
         height: 18px;
      }

      .ast-header-social-1-wrap .ast-social-color-type-custom svg {
         fill: var(--ast-global-color-0);
      }

      .ast-header-social-1-wrap .ast-social-color-type-custom .ast-builder-social-element:hover {
         color: var(--ast-global-color-2);
      }

      .ast-header-social-1-wrap .ast-social-color-type-custom .ast-builder-social-element:hover svg {
         fill: var(--ast-global-color-2);
      }

      .ast-header-social-1-wrap .ast-social-color-type-custom .social-item-label {
         color: var(--ast-global-color-0);
      }

      .ast-header-social-1-wrap .ast-builder-social-element:hover .social-item-label {
         color: var(--ast-global-color-2);
      }

      @media (max-width:921px) {
         .ast-header-social-1-wrap .ast-builder-social-element {
            margin-left: 15px;
            margin-right: 15px;
         }

         .ast-header-social-1-wrap {
            margin-top: 25px;
            margin-bottom: 25px;
            margin-left: 25px;
            margin-right: 25px;
         }
      }

      .ast-builder-layout-element[data-section="section-hb-social-icons-1"] {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="section-hb-social-icons-1"] {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="section-hb-social-icons-1"] {
            display: flex;
         }
      }

      .site-below-footer-wrap {
         padding-top: 20px;
         padding-bottom: 20px;
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"] {
         background-color: ;
         ;
         background-image: none;
         ;
         min-height: 40px;
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row {
         max-width: 1200px;
         margin-left: auto;
         margin-right: auto;
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row,
      .site-below-footer-wrap[data-section="section-below-footer-builder"] .site-footer-section {
         align-items: flex-start;
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-inline .site-footer-section {
         display: flex;
         margin-bottom: 0;
      }

      .ast-builder-grid-row-full .ast-builder-grid-row {
         grid-template-columns: 1fr;
      }

      @media (max-width:921px) {
         .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      @media (max-width:544px) {
         .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"] {
         padding-bottom: 40px;
      }

      @media (max-width:544px) {
         .site-below-footer-wrap[data-section="section-below-footer-builder"] {
            padding-top: 24px;
            padding-bottom: 24px;
            padding-left: 24px;
            padding-right: 24px;
         }
      }

      .site-below-footer-wrap[data-section="section-below-footer-builder"] {
         display: grid;
      }

      @media (max-width:921px) {
         .ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"] {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"] {
            display: grid;
         }
      }

      .ast-footer-copyright {
         text-align: center;
      }

      .ast-footer-copyright {
         color: var(--ast-global-color-3);
      }

      @media (max-width:921px) {
         .ast-footer-copyright {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .ast-footer-copyright {
            text-align: center;
         }
      }

      .ast-footer-copyright {
         font-size: 14px;
         font-size: 0.875rem;
      }

      .ast-footer-copyright.ast-builder-layout-element {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
         }
      }

      .ast-builder-social-element:hover {
         color: #0274be;
      }

      .ast-social-stack-desktop .ast-builder-social-element,
      .ast-social-stack-tablet .ast-builder-social-element,
      .ast-social-stack-mobile .ast-builder-social-element {
         margin-top: 6px;
         margin-bottom: 6px;
      }

      .ast-social-color-type-official .ast-builder-social-element,
      .ast-social-color-type-official .social-item-label {
         color: var(--color);
         background-color: var(--background-color);
      }

      .header-social-inner-wrap.ast-social-color-type-official .ast-builder-social-element svg,
      .footer-social-inner-wrap.ast-social-color-type-official .ast-builder-social-element svg {
         fill: currentColor;
      }

      .social-show-label-true .ast-builder-social-element {
         width: auto;
         padding: 0 0.4em;
      }

      [data-section^="section-fb-social-icons-"] .footer-social-inner-wrap {
         text-align: center;
      }

      .ast-footer-social-wrap {
         width: 100%;
      }

      .ast-footer-social-wrap .ast-builder-social-element:first-child {
         margin-left: 0;
      }

      .ast-footer-social-wrap .ast-builder-social-element:last-child {
         margin-right: 0;
      }

      .ast-header-social-wrap .ast-builder-social-element:first-child {
         margin-left: 0;
      }

      .ast-header-social-wrap .ast-builder-social-element:last-child {
         margin-right: 0;
      }

      .ast-builder-social-element {
         line-height: 1;
         color: #3a3a3a;
         background: transparent;
         vertical-align: middle;
         transition: all 0.01s;
         margin-left: 6px;
         margin-right: 6px;
         justify-content: center;
         align-items: center;
      }

      .ast-builder-social-element {
         line-height: 1;
         color: #3a3a3a;
         background: transparent;
         vertical-align: middle;
         transition: all 0.01s;
         margin-left: 6px;
         margin-right: 6px;
         justify-content: center;
         align-items: center;
      }

      .ast-builder-social-element .social-item-label {
         padding-left: 6px;
      }

      .ast-footer-social-1-wrap .ast-builder-social-element {
         margin-left: 12px;
         margin-right: 12px;
      }

      .ast-footer-social-1-wrap .ast-builder-social-element svg {
         width: 18px;
         height: 18px;
      }

      .ast-footer-social-1-wrap .ast-social-color-type-custom svg {
         fill: var(--ast-global-color-1);
      }

      .ast-footer-social-1-wrap .ast-social-color-type-custom .ast-builder-social-element:hover {
         color: var(--ast-global-color-2);
      }

      .ast-footer-social-1-wrap .ast-social-color-type-custom .ast-builder-social-element:hover svg {
         fill: var(--ast-global-color-2);
      }

      .ast-footer-social-1-wrap .ast-social-color-type-custom .social-item-label {
         color: var(--ast-global-color-1);
      }

      .ast-footer-social-1-wrap .ast-builder-social-element:hover .social-item-label {
         color: var(--ast-global-color-2);
      }

      [data-section="section-fb-social-icons-1"] .footer-social-inner-wrap {
         text-align: right;
      }

      @media (max-width:921px) {
         [data-section="section-fb-social-icons-1"] .footer-social-inner-wrap {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         [data-section="section-fb-social-icons-1"] .footer-social-inner-wrap {
            text-align: center;
         }
      }

      .ast-builder-layout-element[data-section="section-fb-social-icons-1"] {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="section-fb-social-icons-1"] {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="section-fb-social-icons-1"] {
            display: flex;
         }
      }

      .site-above-footer-wrap {
         padding-top: 20px;
         padding-bottom: 20px;
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"] {
         background-color: ;
         ;
         background-image: none;
         ;
         min-height: 60px;
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"] .ast-builder-grid-row {
         grid-column-gap: 24px;
         max-width: 1200px;
         margin-left: auto;
         margin-right: auto;
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"] .ast-builder-grid-row,
      .site-above-footer-wrap[data-section="section-above-footer-builder"] .site-footer-section {
         align-items: flex-start;
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"].ast-footer-row-inline .site-footer-section {
         display: flex;
         margin-bottom: 0;
      }

      .ast-builder-grid-row-3-lheavy .ast-builder-grid-row {
         grid-template-columns: 2fr 1fr 1fr;
      }

      @media (max-width:921px) {
         .site-above-footer-wrap[data-section="section-above-footer-builder"].ast-footer-row-tablet-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-above-footer-wrap[data-section="section-above-footer-builder"].ast-footer-row-tablet-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-equal .ast-builder-grid-row {
            grid-template-columns: repeat(3, 1fr);
         }
      }

      @media (max-width:544px) {
         .site-above-footer-wrap[data-section="section-above-footer-builder"].ast-footer-row-mobile-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-above-footer-wrap[data-section="section-above-footer-builder"].ast-footer-row-mobile-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"] {
         padding-top: 80px;
         padding-bottom: 40px;
         padding-left: 40px;
         padding-right: 40px;
      }

      @media (max-width:921px) {
         .site-above-footer-wrap[data-section="section-above-footer-builder"] {
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
         }
      }

      @media (max-width:544px) {
         .site-above-footer-wrap[data-section="section-above-footer-builder"] {
            padding-top: 40px;
            padding-bottom: 40px;
            padding-left: 20px;
            padding-right: 20px;
         }
      }

      .site-above-footer-wrap[data-section="section-above-footer-builder"] {
         display: grid;
      }

      @media (max-width:921px) {
         .ast-header-break-point .site-above-footer-wrap[data-section="section-above-footer-builder"] {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .site-above-footer-wrap[data-section="section-above-footer-builder"] {
            display: grid;
         }
      }

      .site-footer {
         background-color: var(--ast-global-color-4);
         ;
         background-image: none;
         ;
      }

      .site-primary-footer-wrap {
         padding-top: 45px;
         padding-bottom: 45px;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         background-color: ;
         ;
         background-image: none;
         ;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .ast-builder-grid-row {
         max-width: 1200px;
         margin-left: auto;
         margin-right: auto;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .ast-builder-grid-row,
      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .site-footer-section {
         align-items: center;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-inline .site-footer-section {
         display: flex;
         margin-bottom: 0;
      }

      .ast-builder-grid-row-3-cheavy .ast-builder-grid-row {
         grid-template-columns: 1fr 2fr 1fr;
      }

      @media (max-width:921px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-tablet-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-tablet-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      @media (max-width:544px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-mobile-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-mobile-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         padding-top: 48px;
         padding-bottom: 24px;
         padding-left: 40px;
         padding-right: 40px;
      }

      @media (max-width:921px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            padding-top: 40px;
            padding-bottom: 24px;
            padding-left: 40px;
            padding-right: 40px;
         }
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         display: grid;
      }

      @media (max-width:921px) {
         .ast-header-break-point .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            display: grid;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"].footer-widget-area-inner {
         text-align: left;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"].footer-widget-area-inner {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"].footer-widget-area-inner {
            text-align: center;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"].footer-widget-area-inner {
         text-align: left;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"].footer-widget-area-inner {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"].footer-widget-area-inner {
            text-align: center;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"].footer-widget-area-inner {
         text-align: left;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"].footer-widget-area-inner {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"].footer-widget-area-inner {
            text-align: center;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
         color: var(--ast-global-color-2);
         font-size: 32px;
         font-size: 2rem;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 25px;
            font-size: 1.5625rem;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .widget-title {
            font-size: 20px;
            font-size: 1.25rem;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] {
            display: block;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] {
            display: block;
         }
      }

      .elementor-widget-heading .elementor-heading-title {
         margin: 0;
      }

      .elementor-post.elementor-grid-item.hentry {
         margin-bottom: 0;
      }

      .woocommerce div.product .elementor-element.elementor-products-grid .related.products ul.products li.product,
      .elementor-element .elementor-wc-products .woocommerce[class*='columns-'] ul.products li.product {
         width: auto;
         margin: 0;
         float: none;
      }

      .ast-left-sidebar .elementor-section.elementor-section-stretched,
      .ast-right-sidebar .elementor-section.elementor-section-stretched {
         max-width: 100%;
         left: 0 !important;
      }

      .elementor-template-full-width .ast-container {
         display: block;
      }

      @media (max-width:544px) {
         .elementor-element .elementor-wc-products .woocommerce[class*="columns-"] ul.products li.product {
            width: auto;
            margin: 0;
         }

         .elementor-element .woocommerce .woocommerce-result-count {
            float: none;
         }
      }

      .ast-header-break-point .main-header-bar {
         border-bottom-width: 1px;
      }

      @media (min-width:922px) {
         .main-header-bar {
            border-bottom-width: 1px;
         }
      }

      .main-header-menu .menu-item,
      #astra-footer-menu .menu-item,
      .main-header-bar .ast-masthead-custom-menu-items {
         -js-display: flex;
         display: flex;
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -moz-box-pack: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -moz-box-orient: vertical;
         -moz-box-direction: normal;
         -ms-flex-direction: column;
         flex-direction: column;
      }

      .main-header-menu>.menu-item>.menu-link,
      #astra-footer-menu>.menu-item>.menu-link {
         height: 100%;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -moz-box-align: center;
         -ms-flex-align: center;
         align-items: center;
         -js-display: flex;
         display: flex;
      }

      .ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg {
         top: .2em;
         margin-top: 0px;
         margin-left: 0px;
         width: .65em;
         transform: translate(0, -2px) rotateZ(270deg);
      }

      .ast-mobile-popup-content .ast-submenu-expanded>.ast-menu-toggle {
         transform: rotateX(180deg);
      }

      .ast-separate-container .blog-layout-1,
      .ast-separate-container .blog-layout-2,
      .ast-separate-container .blog-layout-3 {
         background-color: transparent;
         background-image: none;
      }

      .ast-separate-container .ast-article-post {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      .ast-separate-container .ast-article-single:not(.ast-related-post),
      .ast-separate-container .comments-area .comment-respond,
      .ast-separate-container .comments-area .ast-comment-list li,
      .ast-separate-container .ast-woocommerce-container,
      .ast-separate-container .error-404,
      .ast-separate-container .no-results,
      .single.ast-separate-container .ast-author-meta,
      .ast-separate-container .related-posts-title-wrapper,
      .ast-separate-container.ast-two-container #secondary .widget,
      .ast-separate-container .comments-count-wrapper,
      .ast-box-layout.ast-plain-container .site-content,
      .ast-padded-layout.ast-plain-container .site-content,
      .ast-separate-container .comments-area .comments-title {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      .ast-off-canvas-active body.ast-main-header-nav-open {
         overflow: hidden;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-overlay {
         background-color: rgba(0, 0, 0, 0.4);
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         visibility: hidden;
         opacity: 0;
         transition: opacity 0.2s ease-in-out;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-header {
         -js-display: flex;
         display: flex;
         justify-content: flex-end;
         min-height: calc(1.2em + 24px);
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-header .menu-toggle-close {
         background: transparent;
         border: 0;
         font-size: 24px;
         line-height: 1;
         padding: .6em;
         color: inherit;
         -js-display: flex;
         display: flex;
         box-shadow: none;
      }

      .ast-mobile-popup-drawer.ast-mobile-popup-full-width .ast-mobile-popup-inner {
         max-width: none;
         transition: transform 0s ease-in, opacity 0.2s ease-in;
      }

      .ast-mobile-popup-drawer.active {
         left: 0;
         opacity: 1;
         right: 0;
         z-index: 100000;
         transition: opacity 0.25s ease-out;
      }

      .ast-mobile-popup-drawer.active .ast-mobile-popup-overlay {
         opacity: 1;
         cursor: pointer;
         visibility: visible;
      }

      body.admin-bar .ast-mobile-popup-drawer,
      body.admin-bar .ast-mobile-popup-drawer .ast-mobile-popup-inner {
         top: 32px;
      }

      body.admin-bar.ast-primary-sticky-header-active .ast-mobile-popup-drawer,
      body.admin-bar.ast-primary-sticky-header-active .ast-mobile-popup-drawer .ast-mobile-popup-inner {
         top: 0px;
      }

      @media (max-width: 782px) {

         body.admin-bar .ast-mobile-popup-drawer,
         body.admin-bar .ast-mobile-popup-drawer .ast-mobile-popup-inner {
            top: 46px;
         }
      }

      .ast-mobile-popup-content>*,
      .ast-desktop-popup-content>* {
         padding: 10px 0;
         height: auto;
      }

      .ast-mobile-popup-content>*:first-child,
      .ast-desktop-popup-content>*:first-child {
         padding-top: 10px;
      }

      .ast-mobile-popup-content>.ast-builder-menu,
      .ast-desktop-popup-content>.ast-builder-menu {
         padding-top: 0;
      }

      .ast-mobile-popup-content>*:last-child,
      .ast-desktop-popup-content>*:last-child {
         padding-bottom: 0;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-icon,
      .ast-mobile-popup-drawer .main-header-bar-navigation .menu-item-has-children .sub-menu,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-icon {
         display: none;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon.ast-inline-search label,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon.ast-inline-search label {
         width: 100%;
      }

      .ast-mobile-popup-content .ast-builder-menu-mobile .main-header-menu,
      .ast-mobile-popup-content .ast-builder-menu-mobile .main-header-menu .sub-menu {
         background-color: transparent;
      }

      .ast-mobile-popup-content .ast-icon svg {
         height: .85em;
         width: .95em;
         margin-top: 15px;
      }

      .ast-mobile-popup-content .ast-icon.icon-search svg {
         margin-top: 0;
      }

      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-slide-up>.menu-item>.sub-menu,
      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-slide-up>.menu-item .menu-item>.sub-menu,
      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-slide-down>.menu-item>.sub-menu,
      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-slide-down>.menu-item .menu-item>.sub-menu,
      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-fade>.menu-item>.sub-menu,
      .ast-mobile-popup-drawer.show,
      .ast-desktop .ast-desktop-popup-content .astra-menu-animation-fade>.menu-item .menu-item>.sub-menu {
         opacity: 1;
         visibility: visible;
      }

      .ast-mobile-popup-drawer {
         position: fixed;
         top: 0;
         bottom: 0;
         left: -99999rem;
         right: 99999rem;
         transition: opacity 0.25s ease-in, left 0s 0.25s, right 0s 0.25s;
         opacity: 0;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-inner {
         width: 100%;
         transform: translateX(100%);
         max-width: 90%;
         right: 0;
         top: 0;
         background: #fafafa;
         color: #3a3a3a;
         bottom: 0;
         opacity: 0;
         position: fixed;
         box-shadow: 0 0 2rem 0 rgba(0, 0, 0, 0.1);
         -js-display: flex;
         display: flex;
         flex-direction: column;
         transition: transform 0.2s ease-in, opacity 0.2s ease-in;
         overflow-y: auto;
         overflow-x: hidden;
      }

      .ast-mobile-popup-drawer.ast-mobile-popup-left .ast-mobile-popup-inner {
         transform: translateX(-100%);
         right: auto;
         left: 0;
      }

      .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-popup-drawer .main-header-bar-navigation ul .menu-item .sub-menu .menu-link {
         padding-left: 30px;
      }

      .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-popup-drawer .main-header-bar-navigation .sub-menu .menu-item .menu-item .menu-link {
         padding-left: 40px;
      }

      .ast-mobile-popup-drawer .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle {
         right: calc(20px - 0.907em);
      }

      .ast-mobile-popup-drawer.content-align-flex-end .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle {
         left: calc(20px - 0.907em);
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon,
      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon.slide-search,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon.slide-search {
         width: 100%;
         position: relative;
         display: block;
         right: auto;
         transform: none;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon.slide-search .search-form,
      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon .search-form,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon.slide-search .search-form,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon .search-form {
         right: 0;
         visibility: visible;
         opacity: 1;
         position: relative;
         top: auto;
         transform: none;
         padding: 0;
         display: block;
         overflow: hidden;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon.ast-inline-search .search-field,
      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon .search-field,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon.ast-inline-search .search-field,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon .search-field {
         width: 100%;
         padding-right: 5.5em;
      }

      .ast-mobile-popup-drawer .ast-mobile-popup-content .ast-search-menu-icon .search-submit,
      .ast-mobile-popup-drawer .ast-desktop-popup-content .ast-search-menu-icon .search-submit {
         display: block;
         position: absolute;
         height: 100%;
         top: 0;
         right: 0;
         padding: 0 1em;
         border-radius: 0;
      }

      .ast-mobile-popup-drawer.active .ast-mobile-popup-inner {
         opacity: 1;
         visibility: visible;
         transform: translateX(0%);
      }

      .ast-mobile-popup-drawer.active .ast-mobile-popup-inner {
         background-color: #ffffff;
         ;
      }

      .ast-mobile-header-wrap .ast-mobile-header-content,
      .ast-desktop-header-content {
         background-color: #ffffff;
         ;
      }

      .ast-mobile-popup-content>*,
      .ast-mobile-header-content>*,
      .ast-desktop-popup-content>*,
      .ast-desktop-header-content>* {
         padding-top: 0;
         padding-bottom: 0;
      }

      .content-align-flex-start .ast-builder-layout-element {
         justify-content: flex-start;
      }

      .content-align-flex-start .main-header-menu {
         text-align: left;
      }

      .ast-mobile-popup-drawer.active .menu-toggle-close {
         color: #3a3a3a;
      }

      .ast-mobile-header-wrap .ast-primary-header-bar,
      .ast-primary-header-bar .site-primary-header-wrap {
         min-height: 96px;
      }

      .ast-desktop .ast-primary-header-bar .main-header-menu>.menu-item {
         line-height: 96px;
      }

      @media (max-width:921px) {

         #masthead .ast-mobile-header-wrap .ast-primary-header-bar,
         #masthead .ast-mobile-header-wrap .ast-below-header-bar {
            padding-left: 20px;
            padding-right: 20px;
         }
      }

      .ast-header-break-point .ast-primary-header-bar {
         border-bottom-width: 0;
         border-bottom-color: #eaeaea;
         border-bottom-style: solid;
      }

      @media (min-width:922px) {
         .ast-primary-header-bar {
            border-bottom-width: 0;
            border-bottom-color: #eaeaea;
            border-bottom-style: solid;
         }
      }

      .ast-primary-header-bar {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      @media (max-width:921px) {

         .ast-mobile-header-wrap .ast-primary-header-bar,
         .ast-primary-header-bar .site-primary-header-wrap {
            min-height: 80px;
         }
      }

      @media (max-width:544px) {

         .ast-mobile-header-wrap .ast-primary-header-bar,
         .ast-primary-header-bar .site-primary-header-wrap {
            min-height: 72px;
         }
      }

      .ast-primary-header-bar {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-primary-header-bar {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-primary-header-bar {
            display: grid;
         }
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-fill {
         color: #ffffff;
         border: none;
         background: var(--ast-global-color-0);
         border-radius: 2px;
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg {
         width: 20px;
         height: 20px;
         fill: #ffffff;
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-wrap .mobile-menu {
         color: #ffffff;
      }

      .ast-builder-menu-mobile .main-navigation .menu-item>.menu-link {
         font-family: Georgia, Times, serif;
         font-weight: 700;
         line-height: 1;
      }

      .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
         top: 0;
      }

      .ast-builder-menu-mobile .main-navigation .menu-item-has-children>.menu-link:after {
         content: unset;
      }

      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .main-header-menu,
      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .main-header-menu,
      .ast-hfb-header .ast-mobile-header-content .ast-builder-menu-mobile .main-navigation .main-header-menu,
      .ast-hfb-header .ast-mobile-popup-content .ast-builder-menu-mobile .main-navigation .main-header-menu {
         border-top-width: 1px;
         border-color: #eaeaea;
      }

      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link,
      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .menu-link,
      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link,
      .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .menu-link,
      .ast-hfb-header .ast-mobile-header-content .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link,
      .ast-hfb-header .ast-mobile-header-content .ast-builder-menu-mobile .main-navigation .menu-item .menu-link,
      .ast-hfb-header .ast-mobile-popup-content .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link,
      .ast-hfb-header .ast-mobile-popup-content .ast-builder-menu-mobile .main-navigation .menu-item .menu-link {
         border-bottom-width: 1px;
         border-color: #eaeaea;
         border-style: solid;
      }

      .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
         top: 0;
      }

      @media (max-width:921px) {
         .ast-builder-menu-mobile .main-navigation {
            font-size: 15px;
            font-size: 0.9375rem;
         }

         .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item>.menu-link {
            padding-top: 25px;
            padding-bottom: 25px;
            padding-left: 25px;
            padding-right: 25px;
         }

         .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 25px;
            right: calc(25px - 0.907em);
         }

         .ast-builder-menu-mobile .main-navigation .menu-item-has-children>.menu-link:after {
            content: unset;
         }
      }

      @media (max-width:544px) {
         .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 25px;
         }
      }

      .ast-builder-menu-mobile .main-navigation {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-menu-mobile .main-navigation {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-menu-mobile .main-navigation {
            display: block;
         }
      }

      .footer-nav-wrap .astra-footer-vertical-menu {
         display: grid;
      }

      @media (min-width: 769px) {
         .footer-nav-wrap .astra-footer-horizontal-menu li {
            margin: 0;
         }

         .footer-nav-wrap .astra-footer-horizontal-menu a {
            padding: 0 0.5em;
         }
      }

      @media (min-width: 769px) {
         .footer-nav-wrap .astra-footer-horizontal-menu li:first-child a {
            padding-left: 0;
         }

         .footer-nav-wrap .astra-footer-horizontal-menu li:last-child a {
            padding-right: 0;
         }
      }

      .footer-widget-area[data-section="section-footer-menu"] .astra-footer-horizontal-menu {
         justify-content: center;
      }

      .footer-widget-area[data-section="section-footer-menu"] .astra-footer-vertical-menu .menu-item {
         align-items: center;
      }

      #astra-footer-menu .menu-item>a {
         padding-left: 16px;
         padding-right: 16px;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-tablet-horizontal-menu {
            justify-content: center;
         }

         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-tablet-vertical-menu {
            display: grid;
         }

         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-tablet-vertical-menu .menu-item {
            align-items: center;
         }

         #astra-footer-menu .menu-item>a {
            padding-left: 16px;
            padding-right: 16px;
         }

         #astra-footer-menu {
            margin-top: 16px;
            margin-bottom: 16px;
         }
      }

      @media (max-width:544px) {
         #astra-footer-menu {
            margin-top: 16px;
            margin-bottom: 16px;
         }

         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-mobile-horizontal-menu {
            justify-content: center;
         }

         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-mobile-vertical-menu {
            display: grid;
         }

         .footer-widget-area[data-section="section-footer-menu"] .astra-footer-mobile-vertical-menu .menu-item {
            align-items: center;
         }

         #astra-footer-menu .menu-item>a {
            padding-top: 2px;
            padding-bottom: 2px;
         }
      }

      .footer-widget-area[data-section="section-footer-menu"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="section-footer-menu"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="section-footer-menu"] {
            display: block;
         }
      }

      :root {
         --e-global-color-astglobalcolor0: #EF4D48;
         --e-global-color-astglobalcolor1: #D90700;
         --e-global-color-astglobalcolor2: #2B161B;
         --e-global-color-astglobalcolor3: #453E3E;
         --e-global-color-astglobalcolor4: #F7F3F5;
         --e-global-color-astglobalcolor5: #FFFFFF;
         --e-global-color-astglobalcolor6: #000000;
         --e-global-color-astglobalcolor7: #4B4F58;
         --e-global-color-astglobalcolor8: #F6F7F8;
      }
   </style>
   <link rel="stylesheet" id="astra-google-fonts-css" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C500%7CVollkorn%3A700%2C&#038;display=fallback&#038;ver=3.9.2" media="all">
   <link rel="stylesheet" id="wp-block-library-css" href="./../wp-includes/css/dist/block-library/style.min.css?ver=6.0.3" media="all">
   <style id="global-styles-inline-css">
      body {
         --wp--preset--color--black: #000000;
         --wp--preset--color--cyan-bluish-gray: #abb8c3;
         --wp--preset--color--white: #ffffff;
         --wp--preset--color--pale-pink: #f78da7;
         --wp--preset--color--vivid-red: #cf2e2e;
         --wp--preset--color--luminous-vivid-orange: #ff6900;
         --wp--preset--color--luminous-vivid-amber: #fcb900;
         --wp--preset--color--light-green-cyan: #7bdcb5;
         --wp--preset--color--vivid-green-cyan: #00d084;
         --wp--preset--color--pale-cyan-blue: #8ed1fc;
         --wp--preset--color--vivid-cyan-blue: #0693e3;
         --wp--preset--color--vivid-purple: #9b51e0;
         --wp--preset--color--ast-global-color-0: var(--ast-global-color-0);
         --wp--preset--color--ast-global-color-1: var(--ast-global-color-1);
         --wp--preset--color--ast-global-color-2: var(--ast-global-color-2);
         --wp--preset--color--ast-global-color-3: var(--ast-global-color-3);
         --wp--preset--color--ast-global-color-4: var(--ast-global-color-4);
         --wp--preset--color--ast-global-color-5: var(--ast-global-color-5);
         --wp--preset--color--ast-global-color-6: var(--ast-global-color-6);
         --wp--preset--color--ast-global-color-7: var(--ast-global-color-7);
         --wp--preset--color--ast-global-color-8: var(--ast-global-color-8);
         --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
         --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
         --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
         --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
         --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
         --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
         --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
         --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
         --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
         --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
         --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
         --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
         --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
         --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
         --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
         --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
         --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
         --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
         --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
         --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
         --wp--preset--font-size--small: 13px;
         --wp--preset--font-size--medium: 20px;
         --wp--preset--font-size--large: 36px;
         --wp--preset--font-size--x-large: 42px;
      }

      body {
         margin: 0;
      }

      body {
         --wp--style--block-gap: 24px;
      }

      .wp-site-blocks>.alignleft {
         float: left;
         margin-right: 2em;
      }

      .wp-site-blocks>.alignright {
         float: right;
         margin-left: 2em;
      }

      .wp-site-blocks>.aligncenter {
         justify-content: center;
         margin-left: auto;
         margin-right: auto;
      }

      .wp-site-blocks>* {
         margin-block-start: 0;
         margin-block-end: 0;
      }

      .wp-site-blocks>*+* {
         margin-block-start: var(--wp--style--block-gap);
      }

      .has-black-color {
         color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-color {
         color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-color {
         color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-color {
         color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-color {
         color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-color {
         color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-color {
         color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-color {
         color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-color {
         color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-color {
         color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-color {
         color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-color {
         color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-color {
         color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-color {
         color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-color {
         color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-color {
         color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-color {
         color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-color {
         color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-color {
         color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-color {
         color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-color {
         color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-black-background-color {
         background-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-background-color {
         background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-background-color {
         background-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-background-color {
         background-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-background-color {
         background-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-background-color {
         background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-background-color {
         background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-background-color {
         background-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-background-color {
         background-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-background-color {
         background-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-background-color {
         background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-background-color {
         background-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-background-color {
         background-color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-background-color {
         background-color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-background-color {
         background-color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-background-color {
         background-color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-background-color {
         background-color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-background-color {
         background-color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-background-color {
         background-color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-background-color {
         background-color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-background-color {
         background-color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-black-border-color {
         border-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-border-color {
         border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-border-color {
         border-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-border-color {
         border-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-border-color {
         border-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-border-color {
         border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-border-color {
         border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-border-color {
         border-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-border-color {
         border-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-border-color {
         border-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-border-color {
         border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-border-color {
         border-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-border-color {
         border-color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-border-color {
         border-color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-border-color {
         border-color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-border-color {
         border-color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-border-color {
         border-color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-border-color {
         border-color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-border-color {
         border-color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-border-color {
         border-color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-border-color {
         border-color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
         background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
      }

      .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
         background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
      }

      .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
         background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-orange-to-vivid-red-gradient-background {
         background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
      }

      .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
         background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
      }

      .has-cool-to-warm-spectrum-gradient-background {
         background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
      }

      .has-blush-light-purple-gradient-background {
         background: var(--wp--preset--gradient--blush-light-purple) !important;
      }

      .has-blush-bordeaux-gradient-background {
         background: var(--wp--preset--gradient--blush-bordeaux) !important;
      }

      .has-luminous-dusk-gradient-background {
         background: var(--wp--preset--gradient--luminous-dusk) !important;
      }

      .has-pale-ocean-gradient-background {
         background: var(--wp--preset--gradient--pale-ocean) !important;
      }

      .has-electric-grass-gradient-background {
         background: var(--wp--preset--gradient--electric-grass) !important;
      }

      .has-midnight-gradient-background {
         background: var(--wp--preset--gradient--midnight) !important;
      }

      .has-small-font-size {
         font-size: var(--wp--preset--font-size--small) !important;
      }

      .has-medium-font-size {
         font-size: var(--wp--preset--font-size--medium) !important;
      }

      .has-large-font-size {
         font-size: var(--wp--preset--font-size--large) !important;
      }

      .has-x-large-font-size {
         font-size: var(--wp--preset--font-size--x-large) !important;
      }
   </style>
   <link rel="stylesheet" id="exad-slick-css" href="./../wp-content/plugins/exclusive-addons-for-elementor/assets/vendor/css/slick.min.css?ver=6.0.3" media="all">
   <link rel="stylesheet" id="exad-slick-theme-css" href="./../wp-content/plugins/exclusive-addons-for-elementor/assets/vendor/css/slick-theme.min.css?ver=6.0.3" media="all">
   <link rel="stylesheet" id="exad-image-hover-css" href="./../wp-content/plugins/exclusive-addons-for-elementor/assets/vendor/css/imagehover.css?ver=6.0.3" media="all">
   <link rel="stylesheet" id="exad-main-style-css" href="./../wp-content/plugins/exclusive-addons-for-elementor/assets/css/exad-styles.min.css?ver=6.0.3" media="all">
   <link rel="stylesheet" id="elementor-icons-css" href="./../wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.16.0" media="all">
   <link rel="stylesheet" id="elementor-frontend-css" href="./../wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.7.8" media="all">
   <link rel="stylesheet" id="elementor-post-5-css" href="./../wp-content/uploads/elementor/css/post-5.css?ver=1666161505" media="all">
   <link rel="stylesheet" id="elementor-post-640-css" href="./../wp-content/uploads/elementor/css/post-640.css?ver=1666839863" media="all">
   <link rel="stylesheet" id="eael-general-css" href="./../wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css?ver=5.3.2" media="all">
   <link rel="stylesheet" id="google-fonts-1-css" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.0.3" media="all">
   <!--[if IE]>
      <script src='http://localhost/mcc/wp-content/themes/astra/assets/js/minified/flexibility.min.js?ver=3.9.2' id='astra-flexibility-js'></script>
      <script id='astra-flexibility-js-after'>
         flexibility(document.documentElement);
      </script>
      <![endif]-->
   <script src="./../wp-includes/js/jquery/jquery.min.js?ver=3.6.0" id="jquery-core-js"></script>
   <script src="./../wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2" id="jquery-migrate-js"></script>
   <link rel="https://api.w.org/" href="./../wp-json/index.html">
   <link rel="alternate" type="application/json" href="./../wp-json/wp/v2/pages/640/index.html">
   <link rel="EditURI" type="application/rsd+xml" title="RSD" href="./../xmlrpc.php?rsd">
   <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="./../wp-includes/wlwmanifest.xml">
   <meta name="generator" content="WordPress 6.0.3">
   <link rel="canonical" href="./index.html">
   <link rel="shortlink" href="./../index.html?p=640">
   <link rel="alternate" type="application/json+oembed" href="./../wp-json/oembed/1.0/embed/index.html?url=.%2Fenroll-now%2F">
   <link rel="alternate" type="text/xml+oembed" href="./../wp-json/oembed/1.0/embed/index.html?url=.%2Fenroll-now%2F&#038;format=xml">

   <style type="text/css">
      .ae_data .elementor-editor-element-setting {
         display: none !important;
      }
   </style>
   <!-- HappyForms global container -->
   <script type="text/javascript">
      HappyForms = {};
   </script>
   <!-- End of HappyForms global container -->
   <style>
      .recentcomments a {
         display: inline !important;
         padding: 0 !important;
         margin: 0 !important;
      }
   </style>
</head>

<body itemtype="https://schema.org/WebPage" itemscope="itemscope" class="page-template-default page page-id-640 wp-custom-logo exclusive-addons-elementor ast-single-post ast-inherit-site-logo-transparent ast-hfb-header ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-3.9.2 ast-normal-title-enabled elementor-default elementor-kit-5 elementor-page elementor-page-640">
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-dark-grayscale">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0 0.49803921568627"></fefuncr>
               <fefuncg type="table" tablevalues="0 0.49803921568627"></fefuncg>
               <fefuncb type="table" tablevalues="0 0.49803921568627"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-grayscale">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0 1"></fefuncr>
               <fefuncg type="table" tablevalues="0 1"></fefuncg>
               <fefuncb type="table" tablevalues="0 1"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-purple-yellow">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0.54901960784314 0.98823529411765"></fefuncr>
               <fefuncg type="table" tablevalues="0 1"></fefuncg>
               <fefuncb type="table" tablevalues="0.71764705882353 0.25490196078431"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-blue-red">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0 1"></fefuncr>
               <fefuncg type="table" tablevalues="0 0.27843137254902"></fefuncg>
               <fefuncb type="table" tablevalues="0.5921568627451 0.27843137254902"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-midnight">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0 0"></fefuncr>
               <fefuncg type="table" tablevalues="0 0.64705882352941"></fefuncg>
               <fefuncb type="table" tablevalues="0 1"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-magenta-yellow">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0.78039215686275 1"></fefuncr>
               <fefuncg type="table" tablevalues="0 0.94901960784314"></fefuncg>
               <fefuncb type="table" tablevalues="0.35294117647059 0.47058823529412"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-purple-green">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0.65098039215686 0.40392156862745"></fefuncr>
               <fefuncg type="table" tablevalues="0 1"></fefuncg>
               <fefuncb type="table" tablevalues="0.44705882352941 0.4"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
      <defs>
         <filter id="wp-duotone-blue-orange">
            <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 "></fecolormatrix>
            <fecomponenttransfer color-interpolation-filters="sRGB">
               <fefuncr type="table" tablevalues="0.098039215686275 1"></fefuncr>
               <fefuncg type="table" tablevalues="0 0.66274509803922"></fefuncg>
               <fefuncb type="table" tablevalues="0.84705882352941 0.41960784313725"></fefuncb>
               <fefunca type="table" tablevalues="1 1"></fefunca>
            </fecomponenttransfer>
            <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
         </filter>
      </defs>
   </svg>
   <a class="skip-link screen-reader-text" href="#content" role="link" title="Skip to content">
      Skip to content</a>
   <div class="loader-wrapper" id="preloader">
      <span class="loader"><span class="loader-inner"></span></span>
   </div>
   <link rel="stylesheet" type="text/css" href="../loader/styles.css" />
   <script>
      var loader = document.getElementById("preloader");
      window.addEventListener("load", function() {
         loader.style.display = "none"
      })
   </script>
   <div class="hfeed site" id="page">
      <header class="site-header header-main-layout-1 ast-primary-menu-enabled ast-logo-title-inline ast-hide-custom-menu-mobile ast-builder-menu-toggle-icon ast-mobile-header-inline" id="masthead" itemtype="https://schema.org/WPHeader" itemscope="itemscope" itemid="#masthead">
         <div id="ast-desktop-header" data-toggle-type="off-canvas">
            <div class="ast-main-header-wrap main-header-bar-wrap ">
               <div class="ast-primary-header-bar ast-primary-header main-header-bar site-header-focus-item" data-section="section-primary-header-builder">
                  <div class="site-primary-header-wrap ast-builder-grid-row-container site-header-focus-item ast-container" data-section="section-primary-header-builder">
                     <div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-grid-center-col-layout">
                        <div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">
                           <div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">
                              <div class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope">
                                 <span class="site-logo-img"><a href="./../" class="custom-logo-link" rel="home"><img width="120" height="120" src="./../wp-content/uploads/2022/10/mcc-removebg-preview-120x120.png" class="custom-logo" alt="Madridejos Community College" srcset="./../wp-content/uploads/2022/10/mcc-removebg-preview-120x120.png 120w, ./../wp-content/uploads/2022/10/mcc-removebg-preview-300x300.png 300w, ./../wp-content/uploads/2022/10/mcc-removebg-preview-150x150.png 150w, ./../wp-content/uploads/2022/10/mcc-removebg-preview.png 400w" sizes="(max-width: 120px) 100vw, 120px"></a></span>
                              </div>
                              <!-- .site-branding -->
                           </div>
                           <div class="site-header-primary-section-left-center site-header-section ast-flex ast-grid-left-center-section">
                           </div>
                        </div>
                        <div class="site-header-primary-section-center site-header-section ast-flex ast-grid-section-center">
                           <div class="ast-builder-menu-1 ast-builder-menu ast-flex ast-builder-menu-1-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-menu-1">
                              <div class="ast-main-header-bar-alignment">
                                 <div class="main-header-bar-navigation">
                                    <nav class="site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item" id="primary-site-navigation" aria-label="Site Navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope">
                                       <div class="main-navigation ast-inline-flex">
                                          <ul id="ast-hf-menu-1" class="main-header-menu ast-menu-shadow ast-nav-menu ast-flex  submenu-with-border stack-on-mobile">
                                             <li id="menu-item-644" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-644"><a href="./../" class="menu-link">Home</a></li>
                                             <li id="menu-item-645" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-645"><a href="./../academics/" class="menu-link">Academics</a></li>
                                             <li id="menu-item-647" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-647"><a href="./../about/" class="menu-link">About</a></li>
                                             <li id="menu-item-648" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-648"><a href="./../contact/" class="menu-link">Contact</a></li>
                                             <li id="menu-item-649" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-640 current_page_item menu-item-649"><a href="./../enrollnow" aria-current="page" class="menu-link">Enroll Now</a></li>
                                             <li id="menu-item-650" name="button1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-650">
                                                <a href="../step/students/" class="menu-link"><?php echo $button1 ?></a>
                                             </li>
                                          </ul>
                                       </div>
                                    </nav>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">
                           <div class="site-header-primary-section-right-center site-header-section ast-flex ast-grid-right-center-section">
                           </div>
                           <div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="section-hb-social-icons-1">
                              <div class="ast-header-social-1-wrap ast-header-social-wrap">
                                 <div class="header-social-inner-wrap element-social-inner-wrap social-show-label-false ast-social-color-type-custom ast-social-stack-none ast-social-element-style-filled">
                                    <a href="https://web.facebook.com/profile.php?id=100083759292324" aria-label="Facebook" target="_blank" rel="noopener noreferrer" style="--color: #557dbc; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook header-social-item">
                                       <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                             <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                          </svg>
                                       </span>
                                    </a>
                                    <a href="https://www.facebook.com/groups/250995015059471" aria-label="Facebook" group target="_blank" rel="noopener noreferrer" style="--color: #3D87FB; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook_group header-social-item">
                                       <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewbox="0 0 30 28">
                                             <title>Facebook Group</title>
                                             <path d="M9.266 14a5.532 5.532 0 00-4.141 2H3.031C1.468 16 0 15.25 0 13.516 0 12.25-.047 8 1.937 8c.328 0 1.953 1.328 4.062 1.328.719 0 1.406-.125 2.078-.359A7.624 7.624 0 007.999 10c0 1.422.453 2.828 1.266 4zM26 23.953C26 26.484 24.328 28 21.828 28H8.172C5.672 28 4 26.484 4 23.953 4 20.422 4.828 15 9.406 15c.531 0 2.469 2.172 5.594 2.172S20.063 15 20.594 15C25.172 15 26 20.422 26 23.953zM10 4c0 2.203-1.797 4-4 4S2 6.203 2 4s1.797-4 4-4 4 1.797 4 4zm11 6c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6zm9 3.516C30 15.25 28.531 16 26.969 16h-2.094a5.532 5.532 0 00-4.141-2A7.066 7.066 0 0022 10a7.6 7.6 0 00-.078-1.031A6.258 6.258 0 0024 9.328C26.109 9.328 27.734 8 28.062 8c1.984 0 1.937 4.25 1.937 5.516zM28 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4z"></path>
                                          </svg>
                                       </span>
                                    </a>
                                    <a href="tel:09279817079" aria-label="Phone" style="--color: inherit; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-phone header-social-item">
                                       <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                             <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
                                          </svg>
                                       </span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Main Header Bar Wrap -->
         <div id="ast-mobile-header" class="ast-mobile-header-wrap " data-type="off-canvas">
            <div class="ast-main-header-wrap main-header-bar-wrap">
               <div class="ast-primary-header-bar ast-primary-header main-header-bar site-primary-header-wrap site-header-focus-item ast-builder-grid-row-layout-default ast-builder-grid-row-tablet-layout-default ast-builder-grid-row-mobile-layout-default" data-section="section-primary-header-builder">
                  <div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-builder-grid-row-no-center">
                     <div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">
                        <div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">
                           <div class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope">
                              <span class="site-logo-img"><a href="./../" class="custom-logo-link" rel="home"><img width="120" height="120" src="./../wp-content/uploads/2022/10/mcc-removebg-preview-120x120.png" class="custom-logo" alt="Madridejos Community College" srcset="./../wp-content/uploads/2022/10/mcc-removebg-preview-120x120.png 120w, ./../wp-content/uploads/2022/10/mcc-removebg-preview-300x300.png 300w, ./../wp-content/uploads/2022/10/mcc-removebg-preview-150x150.png 150w, ./../wp-content/uploads/2022/10/mcc-removebg-preview.png 400w" sizes="(max-width: 120px) 100vw, 120px"></a></span>
                           </div>
                           <!-- .site-branding -->
                        </div>
                     </div>
                     <div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">
                        <div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="section-header-mobile-trigger">
                           <div class="ast-button-wrap">
                              <button type="button" class="menu-toggle main-header-menu-toggle ast-mobile-menu-trigger-fill" aria-expanded="false">
                                 <span class="screen-reader-text">Main Menu</span>
                                 <span class="mobile-menu-toggle-icon">
                                    <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                       <svg class="ast-mobile-svg ast-menu-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                                          <path d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path>
                                       </svg>
                                    </span>
                                    <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                       <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                                          <path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
                                       </svg>
                                    </span>
                                 </span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- #masthead -->
      <div id="content" class="site-content">
         <div class="ast-container">
            <div id="primary" class="content-area primary">
               <main id="main" class="site-main">
                  <article class="post-640 page type-page status-publish ast-article-single" id="post-640" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                     <?php if (!empty($academicYear) && !empty($semester) && in_array($academicYear['status'] and $semester['sem_status'], array('1'))) : ?>
                        <header class="entry-header ast-no-thumbnail ast-no-meta" style="text-align: center;">
                           <h1 class="entry-title" itemprop="headline">Pre-enrollment for Academic Year : <?= $academicYear['academic_start']; ?>-<?= $academicYear['academic_end']; ?> | <?= $semester['semester_name']; ?></h1>
                        </header>
                        <!-- .entry-header -->
                     <?php endif; ?>
                     <?php if (!empty($academicYear) && !empty($semester) && in_array($academicYear['status'] and $semester['sem_status'], array('0'))) : ?>
                        <header class="entry-header ast-no-thumbnail ast-no-meta">
                           <h1 class="entry-title" itemprop="headline">Pre-enrollment is currently NOT AVAILABLE.</h1>
                        </header>
                        <!-- .entry-header -->
                     <?php endif; ?>
                     <div class="entry-content clear" itemprop="text">
                        <div data-elementor-type="wp-page" data-elementor-id="640" class="elementor elementor-640">
                           <section class="elementor-section elementor-top-section elementor-element elementor-element-0fc146a elementor-section-boxed elementor-section-height-default elementor-section-height-default exad-glass-effect-no exad-sticky-section-no" data-id="0fc146a" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;none&quot;}">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-66e892e exad-glass-effect-no exad-sticky-section-no" data-id="66e892e" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                       <div class="elementor-element elementor-element-d52c864 exad-sticky-section-no exad-glass-effect-no elementor-invisible elementor-widget elementor-widget-exad-exclusive-tabs" data-id="d52c864" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="exad-exclusive-tabs.default">
                                          <div class="elementor-widget-container">
                                             <?php if (!empty($academicYear) && !empty($semester) && in_array($academicYear['status'] and $semester['sem_status'], array('1'))) : ?>
                                                <div class="exad-tabs-d52c864 exad-advance-tab exad-tab-horizontal-full-width exad-tab-align-center" data-tabs>
                                                   <style type="text/css">
                                                      .elementor-widget-container li:hover {
                                                         background-color: #949191;
                                                      }

                                                      .elementor-widget-container li:active {
                                                         background-color: #DC736C;
                                                      }
                                                   </style>
                                                   <ul class="exad-advance-tab-nav">
                                                      <?php if (!empty($enroll) && $enroll['enroll_name'] == 'New Students') { ?>
                                                         <li class=" " data-tab>
                                                            <div class="color">
                                                               <span class="exad-tab-title">New Students Pre-Enrollment</span>
                                                            </div>
                                                         </li>
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Transferee Students') { ?>
                                                         <li class=" " data-tab>
                                                            <div class="color">
                                                               <span class="exad-tab-title">Transferee Pre-Enrollment</span>
                                                            </div>
                                                         </li>
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Old Students') { ?>
                                                         <li class=" " data-tab>
                                                            <div class="color">
                                                               <span class="exad-tab-title">Old Students Pre-Enrollement</span>
                                                            </div>
                                                         </li>
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Shift Students') { ?>
                                                         <li class=" " data-tab>
                                                            <div class="color">
                                                               <span class="exad-tab-title">Shift Students Pre-Enrollment</span>
                                                            </div>
                                                         </li>
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'All') { ?>
                                                         <li class=" " data-tab>
                                                            <div class="color" style="background-color: #9EF19E; border-radius: 20px;">
                                                               <span class="exad-tab-title">New Students</span>
                                                            </div>
                                                         </li>
                                                         <li class=" " data-tab>
                                                            <div class="color" style="background-color: #B4DBF5; border-radius: 20px;">
                                                               <span class="exad-tab-title">Transferee</span>
                                                            </div>
                                                         </li>
                                                         <li class=" " data-tab>
                                                            <div class="color" style="background-color: #FAFDC1; border-radius: 20px;">
                                                               <span class="exad-tab-title">Old Students</span>
                                                            </div>
                                                         </li>
                                                         <li class=" " data-tab>
                                                            <div class="color" style="background-color: #FBCCAE; border-radius: 20px;">
                                                               <span class="exad-tab-title">Shift Students</span>
                                                            </div>
                                                         </li>
                                                      <?php } else { ?>
                                                      <?php } ?>
                                                   </ul>
                                                   <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                      <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                      <!-- HappyForms CSS variables -->
                                                      <style>
                                                         #happyforms-710 {
                                                            --happyforms-form-title-font-size: 32px;
                                                            --happyforms-part-title-font-size: 16px;
                                                            --happyforms-part-description-font-size: 12px;
                                                            --happyforms-part-value-font-size: 16px;
                                                            --happyforms-submit-button-font-size: 16px;
                                                            --happyforms-color-primary: #000000;
                                                            --happyforms-color-success-notice: #ebf9f0;
                                                            --happyforms-color-success-notice-text: #1eb452;
                                                            --happyforms-color-error: #f23000;
                                                            --happyforms-color-error-notice: #ffeeea;
                                                            --happyforms-color-error-notice-text: #f23000;
                                                            --happyforms-color-part-title: #000000;
                                                            --happyforms-color-part-value: #000000;
                                                            --happyforms-color-part-placeholder: #888888;
                                                            --happyforms-color-part-description: #454545;
                                                            --happyforms-color-part-border: #dbdbdb;
                                                            --happyforms-color-part-border-focus: #7aa4ff;
                                                            --happyforms-color-part-background: #ffffff;
                                                            --happyforms-color-part-background-focus: #ffffff;
                                                            --happyforms-color-submit-background: #000000;
                                                            --happyforms-color-submit-background-hover: #000000;
                                                            --happyforms-color-submit-border: transparent;
                                                            --happyforms-color-submit-text: #ffffff;
                                                            --happyforms-color-submit-text-hover: #ffffff;
                                                            --happyforms-color-table-row-odd: #fcfcfc;
                                                            --happyforms-color-table-row-even: #efefef;
                                                            --happyforms-color-table-row-odd-text: #000000;
                                                            --happyforms-color-table-row-even-text: #000000;
                                                            --happyforms-color-dropdown-item-bg: #ffffff;
                                                            --happyforms-color-dropdown-item-text: #000000;
                                                            --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                            --happyforms-color-dropdown-item-text-hover: #000000;
                                                         }
                                                      </style>
                                                      <!-- End of HappyForms CSS variables -->
                                                      <!-- HappyForms Additional CSS -->
                                                      <style data-happyforms-additional-css></style>
                                                      <!-- End of HappyForms Additional CSS -->
                                                      <div class=" happyforms-styles" id="happyforms-710">
                                                         <?php if (!empty($enroll) && $enroll['enroll_name'] == 'New Students') { ?>
                                                            <form id="happyforms-form-710 pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                               <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                               <input type="hidden" name="action" value="happyforms_message">
                                                               <input type="hidden" name="client_referer" value="">
                                                               <input type="hidden" name="happyforms_form_id" value="710">
                                                               <input type="hidden" name="happyforms_step" value="0">
                                                               <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                               <input type="hidden" value="<?= $academic ?>" name="academic">
                                                               <div class="happyforms-flex">
                                                                  <input type="text" name="710-number" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                     <h4 style="text-align: center;">New Students</h4>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_1" class="happyforms-part__label">
                                                                              <span class="label">First Name</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Juan</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_2" class="happyforms-part__label">
                                                                              <span class="label">Middle Name</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_3" class="happyforms-part__label">
                                                                              <span class="label">Last Name</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                              <span class="label">Age</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 21</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input min="17" max="80" maxlength="2" id="happyforms-710_single_line_text_12" type="number" name="age" value="" placeholder="Age" autocomplete="off" maz spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                              <span class="label">Senior High School Strand</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: STEM</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_13" type="text" name="strand" value="" placeholder="Senior High Strand" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                              <span class="label">Address</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_select_5" class="happyforms-part__label">
                                                                              <span class="label">Status</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-custom-select">
                                                                              <div class="happyforms-part__select-wrap">
                                                                                 <select name="status" data-serialize class="happyforms-select" required>
                                                                                    <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                                    <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                                    <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                                    <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                                    <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                                 </select>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_select_6" class="happyforms-part__label">
                                                                              <span class="label">Gender</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-custom-select">
                                                                              <div class="happyforms-part__select-wrap">
                                                                                 <select name="gender" data-serialize class="happyforms-select" required>
                                                                                    <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                                    <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                                    <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                                    <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                                    <optgroup label="" id="select_6_option_1666592388682">
                                                                                    </optgroup>
                                                                                 </select>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_7" class="happyforms-part__label">
                                                                              <span class="label">Place of Birth</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_8" class="happyforms-part__label">
                                                                              <span class="label">Date of Birth</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                               <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                              <span class="label">Regilion</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_10" class="happyforms-part__label">
                                                                              <span class="label">Contact No.</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 09279817079</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input min="999999999" max="9999999999" id="happyforms-710_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_11" class="happyforms-part__label">
                                                                              <span class="label">Email Address</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                              <span class="label">Guardian / Parents</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                              <span class="label">Occupation</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Nurse</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_14" class="happyforms-part__label">
                                                                              <span class="label">Guardian Address</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_15" class="happyforms-part__label">
                                                                              <span class="label">Home Zipcode</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 6053</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input min="99" max="9999" id="happyforms-710_single_line_text_15" type="number" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_16" class="happyforms-part__label">
                                                                              <span class="label">NSAT Score</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_17" class="happyforms-part__label">
                                                                              <span class="label">Year</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                              <span class="label">Elementary</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Malbago Elemenraty School</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                              <span class="label">School Year</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 2012-2013</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                              <span class="label">School Address (Elementary)</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                              <span class="label">High School</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                              <span class="label">School Year</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                              <span class="label">School Address (High School)</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                              <span class="label">Last School Attended / School Graduated</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                              <span class="label">School Year</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                     <div class="happyforms-part-wrap">
                                                                        <div class="happyforms-part__label-container">
                                                                           <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                              <span class="label">School Address</span>
                                                                              <span class="happyforms-required"></span>
                                                                           </label>
                                                                        </div>
                                                                        <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                        <div class="happyforms-part__el">
                                                                           <div class="happyforms-input">
                                                                              <input id="happyforms-710_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="exam_remarks">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="applicant_id">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="course_id">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="year_id">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="id_number">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="section_id">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="type" value="New">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="nso">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="card">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="good_moral">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="status_type" value="New Applicant">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="picture">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="raw_score">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="stanine">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="percentile">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="category">
                                                                  </div>
                                                                  <div>
                                                                     <input type="hidden" name="findings">
                                                                  </div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                                     <button name="new" type="submit" class="happyforms-submit happyforms-button--submit form-btn ">Submit</button>
                                                                  </div>
                                                               </div>
                                                            </form>
                                                      </div>
                                                   </div>
                                                   <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                      <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                      <!-- HappyForms CSS variables -->
                                                      <style>
                                                         #happyforms-767 {
                                                            --happyforms-form-title-font-size: 32px;
                                                            --happyforms-part-title-font-size: 16px;
                                                            --happyforms-part-description-font-size: 12px;
                                                            --happyforms-part-value-font-size: 16px;
                                                            --happyforms-submit-button-font-size: 16px;
                                                            --happyforms-color-primary: #000000;
                                                            --happyforms-color-success-notice: #ebf9f0;
                                                            --happyforms-color-success-notice-text: #1eb452;
                                                            --happyforms-color-error: #f23000;
                                                            --happyforms-color-error-notice: #ffeeea;
                                                            --happyforms-color-error-notice-text: #f23000;
                                                            --happyforms-color-part-title: #000000;
                                                            --happyforms-color-part-value: #000000;
                                                            --happyforms-color-part-placeholder: #888888;
                                                            --happyforms-color-part-description: #454545;
                                                            --happyforms-color-part-border: #dbdbdb;
                                                            --happyforms-color-part-border-focus: #7aa4ff;
                                                            --happyforms-color-part-background: #ffffff;
                                                            --happyforms-color-part-background-focus: #ffffff;
                                                            --happyforms-color-submit-background: #000000;
                                                            --happyforms-color-submit-background-hover: #000000;
                                                            --happyforms-color-submit-border: transparent;
                                                            --happyforms-color-submit-text: #ffffff;
                                                            --happyforms-color-submit-text-hover: #ffffff;
                                                            --happyforms-color-table-row-odd: #fcfcfc;
                                                            --happyforms-color-table-row-even: #efefef;
                                                            --happyforms-color-table-row-odd-text: #000000;
                                                            --happyforms-color-table-row-even-text: #000000;
                                                            --happyforms-color-dropdown-item-bg: #ffffff;
                                                            --happyforms-color-dropdown-item-text: #000000;
                                                            --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                            --happyforms-color-dropdown-item-text-hover: #000000;
                                                         }
                                                      </style>
                                                      <!-- End of HappyForms CSS variables -->
                                                      <!-- HappyForms Additional CSS -->
                                                      <style data-happyforms-additional-css></style>
                                                      <!-- End of HappyForms Additional CSS -->
                                                      <div class=" happyforms-styles" id="happyforms-710">
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Transferee Students') { ?>
                                                         <form id="happyforms-form-710 pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                            <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                            <input type="hidden" name="action" value="happyforms_message">
                                                            <input type="hidden" name="client_referer" value="">
                                                            <input type="hidden" name="happyforms_form_id" value="710">
                                                            <input type="hidden" name="happyforms_step" value="0">
                                                            <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                            <input type="hidden" value="<?= $academic ?>" name="academic">
                                                            <div class="happyforms-flex">
                                                               <input type="text" name="710-number" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                  <h4 style="text-align: center;">Transferee Students</h4>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_1" class="happyforms-part__label">
                                                                           <span class="label">First Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Juan</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_2" class="happyforms-part__label">
                                                                           <span class="label">Middle Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_3" class="happyforms-part__label">
                                                                           <span class="label">Last Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                           <span class="label">Age</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 21</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="17" max="80" id="happyforms-710_single_line_text_9" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17)" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                           <span class="label">Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_select_5" class="happyforms-part__label">
                                                                           <span class="label">Status</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="status" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                                 <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                                 <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                                 <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                                 <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_select_6" class="happyforms-part__label">
                                                                           <span class="label">Gender</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="gender" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                                 <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                                 <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                                 <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                                 <optgroup label="" id="select_6_option_1666592388682">
                                                                                 </optgroup>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_7" class="happyforms-part__label">
                                                                           <span class="label">Place of Birth</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_8" class="happyforms-part__label">
                                                                           <span class="label">Date of Birth</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                         <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                           <span class="label">Regilion</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_10" class="happyforms-part__label">
                                                                           <span class="label">Contact No.</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 09279817079</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="999999999" max="99999999999" id="happyforms-710_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_11" class="happyforms-part__label">
                                                                           <span class="label">Email Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                           <span class="label">Guardian / Parents</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                           <span class="label">Occupation</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Nurse</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_14" class="happyforms-part__label">
                                                                           <span class="label">Guardian Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_15" class="happyforms-part__label">
                                                                           <span class="label">Home Zipcode</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 6053</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="99" max="9999" id="happyforms-710_single_line_text_15" type="text" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_16" class="happyforms-part__label">
                                                                           <span class="label">NSAT Score</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_17" class="happyforms-part__label">
                                                                           <span class="label">Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">Elementary</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Malbago Elemenraty School</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2012-2013</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address (Elementary)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">High School</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address (High School)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">Last School Attended / School Graduated</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Cebu Normal University</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-710_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="exam_remarks">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="course_id">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="applicant_id">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="year_id">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="id_number">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="section_id">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="type" value="Transferee">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="nso">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="card">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="good_moral">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="status_type" value="New Applicant">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="picture">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="strand" value="Transferee">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="raw_score">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="stanine">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="percentile">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="category">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="findings">
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                                  <button type="submit" class="happyforms-submit happyforms-button--submit form-btn " name="new">Submit</button>
                                                               </div>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                   <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                      <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                      <!-- HappyForms CSS variables -->
                                                      <style>
                                                         #happyforms-768 {
                                                            --happyforms-form-title-font-size: 32px;
                                                            --happyforms-part-title-font-size: 16px;
                                                            --happyforms-part-description-font-size: 12px;
                                                            --happyforms-part-value-font-size: 16px;
                                                            --happyforms-submit-button-font-size: 16px;
                                                            --happyforms-color-primary: #000000;
                                                            --happyforms-color-success-notice: #ebf9f0;
                                                            --happyforms-color-success-notice-text: #1eb452;
                                                            --happyforms-color-error: #f23000;
                                                            --happyforms-color-error-notice: #ffeeea;
                                                            --happyforms-color-error-notice-text: #f23000;
                                                            --happyforms-color-part-title: #000000;
                                                            --happyforms-color-part-value: #000000;
                                                            --happyforms-color-part-placeholder: #888888;
                                                            --happyforms-color-part-description: #454545;
                                                            --happyforms-color-part-border: #dbdbdb;
                                                            --happyforms-color-part-border-focus: #7aa4ff;
                                                            --happyforms-color-part-background: #ffffff;
                                                            --happyforms-color-part-background-focus: #ffffff;
                                                            --happyforms-color-submit-background: #000000;
                                                            --happyforms-color-submit-background-hover: #000000;
                                                            --happyforms-color-submit-border: transparent;
                                                            --happyforms-color-submit-text: #ffffff;
                                                            --happyforms-color-submit-text-hover: #ffffff;
                                                            --happyforms-color-table-row-odd: #fcfcfc;
                                                            --happyforms-color-table-row-even: #efefef;
                                                            --happyforms-color-table-row-odd-text: #000000;
                                                            --happyforms-color-table-row-even-text: #000000;
                                                            --happyforms-color-dropdown-item-bg: #ffffff;
                                                            --happyforms-color-dropdown-item-text: #000000;
                                                            --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                            --happyforms-color-dropdown-item-text-hover: #000000;
                                                         }
                                                      </style>
                                                      <!-- End of HappyForms CSS variables -->
                                                      <!-- HappyForms Additional CSS -->
                                                      <style data-happyforms-additional-css></style>
                                                      <!-- End of HappyForms Additional CSS -->
                                                      <div class=" happyforms-styles" id="happyforms-768">
                                                      <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Old Students') { ?>
                                                         <?php if(isset($isAlreadySubmitted) && $isAlreadySubmitted): ?>
                                                         <div style="width: calc(100% - 1px); text-align: center;">
                                                            <h4>You already pre enrolled. Please wait for the announcement.</h4>
                                                            <h6>
                                                               <a href="/step/students/">View my account...</a>
                                                            </h6>
                                                         </div>
                                                         <?php elseif(!empty($enroll) && $enroll['enroll_name'] != 'Old Students'): ?>
                                                         <div style="width: calc(100% - 1px); text-align: center;">
                                                            <h4>Current pre enrollment is for Old Students only. Please wait until pre enrollment for New Students is open.</h4>
                                                         </div>
                                                         <?php else: ?>
                                                         <form id="pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                            <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                            <input type="hidden" name="action" value="happyforms_message">
                                                            <input type="hidden" name="client_referer" value="">
                                                            <input type="hidden" name="happyforms_form_id" value="768">
                                                            <input type="hidden" name="happyforms_step" value="0">
                                                            <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                            <input type="hidden" value="<?= $academic ?>" name="academic">
                                                            <div class="happyforms-flex">
                                                               <input type="text" name="768-single_line_text" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                  <h4 style="text-align: center;">Old Students</h4>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_1" class="happyforms-part__label">
                                                                           <span class="label">First Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Juan</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_1" value="<?php echo isset($student['fname']) ? $student['fname'] : '' ?>" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_2" class="happyforms-part__label">
                                                                           <span class="label">Middle Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_2" value="<?php echo isset($student['mname']) ? $student['mname'] : '' ?>" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_3" class="happyforms-part__label">
                                                                           <span class="label">Last Name</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_3" value="<?php echo isset($student['lname']) ? $student['lname'] : '' ?>" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">  
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                           <span class="label">Course</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="course_id" id="course_id" data-serialize class="happyforms-select" onchange="fetchYear(this.value, 'old')" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Course</option>
                                                                                 <?php
                                                                                 if (!empty($courses)) {
                                                                                    foreach ($courses as $course) {
                                                                                       $selected = isset($student['course_id']) && $student['course_id'] == $course['course_id'] ? ' selected'  : null;
                                                                                       echo '<option ' . $selected . ' value=' . $course['course_id'] . '>' . $course['course_name'] . '|' . $course['course_code'] . '</option>';
                                                                                    }
                                                                                 }
                                                                                 ?>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                           <span class="label">Year Level</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="year_id" id="year_id" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Course First</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <input type="hidden" id="type" name="type" value="<?php echo isset($student['type']) && $student['type'] == "New" ? 'Regular' : $student['type'] ?>">
                                                               <!-- <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                           <span class="label">Students Type</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="type" id="type" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Student Type</option>
                                                                                 <option value="Regular">Regular</option>
                                                                                 <option value="Irregular">Irregular</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div> -->
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                           <span class="label">ID Number</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-0349</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-768_single_line_text_11" type="text" value="<?php echo isset($student['id_number']) ? $student['id_number'] : '' ?>" name="id_number" value="" placeholder="ID Number" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                           <span class="label">Age</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 21</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="17" max="80" id="happyforms-768_single_line_text_11" value="<?php echo isset($student['age']) ? $student['age'] : '' ?>" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                           <span class="label">Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_4" type="text" value="<?php echo isset($student['address']) ? $student['address'] : '' ?>" name="address" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                           <span class="label">Status</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="status" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                                 <option <?php echo isset($student['status']) && $student['status'] == "Single" ? 'selected' : '' ?> value="Single" id="select_5_option_1666592286529">Single </option>
                                                                                 <option <?php echo isset($student['status']) && $student['status'] == "Married" ? 'selected' : '' ?> value="Married" id="select_5_option_1666592295476">Married </option>
                                                                                 <option <?php echo isset($student['status']) && $student['status'] == "Widow" ? 'selected' : '' ?> value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                                 <option <?php echo isset($student['status']) && $student['status'] == "Others" ? 'selected' : '' ?> value="Others" id="select_5_option_1666592316421">Others </option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                           <span class="label">Gender</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-custom-select">
                                                                           <div class="happyforms-part__select-wrap">
                                                                              <select name="gender" data-serialize class="happyforms-select" required>
                                                                                 <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                                 <option <?php echo isset($student['gender']) && $student['gender'] == "Male" ? 'selected' : '' ?> value="Male" id="select_6_option_1666592286529">Male </option>
                                                                                 <option <?php echo isset($student['gender']) && $student['gender'] == "Female" ? 'selected' : '' ?> value="Female" id="select_6_option_1666592295476">Female </option>
                                                                                 <option <?php echo isset($student['gender']) && $student['gender'] == "Others" ? 'selected' : '' ?> value="Others" id="select_6_option_1666592316421">Others </option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_7" class="happyforms-part__label">
                                                                           <span class="label">Place of Birth</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_7" value="<?php echo isset($student['place_of_birth']) ? $student['place_of_birth'] : '' ?>"  type="text" name="place_of_birth" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_8" class="happyforms-part__label">
                                                                           <span class="label">Date of Birth</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                         <input id="datepicker" type="text" value="<?php echo isset($student['date_of_birth']) ? $student['date_of_birth'] : '' ?>" name="date_of_birth" placeholder="Date of birth" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_9" class="happyforms-part__label">
                                                                           <span class="label">Regilion</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_9" type="text" name="religion" value="<?php echo isset($student['religion']) ? $student['religion'] : '' ?>" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_10" class="happyforms-part__label">
                                                                           <span class="label">Contact No.</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 09279817079</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="999999999" max="99999999999" id="happyforms-768_single_line_text_10" type="number" name="contact" value="<?php echo isset($student['contact']) ? $student['contact'] : '' ?>" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                           <span class="label">Email Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_11" type="email" name="email" value="<?php echo isset($student['email']) ? $student['email'] : '' ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_12" class="happyforms-part__label">
                                                                           <span class="label">Guardian / Parents</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_12" type="text" name="guardian" value="<?php echo isset($student['guardian']) ? $student['guardian'] : '' ?>" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_13" class="happyforms-part__label">
                                                                           <span class="label">Occupation</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Nurse</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_13" type="text" name="occupation" value="<?php echo isset($student['occupation']) ? $student['occupation'] : '' ?>" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_14" class="happyforms-part__label">
                                                                           <span class="label">Guardian Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_14" type="text" name="guardian_address" value="<?php echo isset($student['guardian_address']) ? $student['guardian_address'] : '' ?>" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_15" class="happyforms-part__label">
                                                                           <span class="label">Home Zipcode</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 6053</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input min="99" max="9999" id="happyforms-768_single_line_text_15" type="number" name="home_zipcode" value="<?php echo isset($student['home_zipcode']) ? $student['home_zipcode'] : '' ?>" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_16" class="happyforms-part__label">
                                                                           <span class="label">NSAT Score</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_16" type="text" name="nsat_score" value="<?php echo isset($student['nsat_score']) ? $student['nsat_score'] : '' ?>" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_17" class="happyforms-part__label">
                                                                           <span class="label">Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-768_single_line_text_17" type="text" name="year" value="<?php echo isset($student['year']) ? $student['year'] : '' ?>" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">Elementary</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Malbago Elementray School</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_18" type="text" name="elementary" value="<?php echo isset($student['elementary']) ? $student['elementary'] : '' ?>" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year (Elementary)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="elem_year" value="<?php echo isset($student['elem_year']) ? $student['elem_year'] : '' ?>" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address (Elementary)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_20" type="text" name="elem_address" value="<?php echo isset($student['elem_address']) ? $student['elem_address'] : '' ?>" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">High School</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_18" type="text" name="high_school" value="<?php echo isset($student['high_school']) ? $student['high_school'] : '' ?>" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year (High School)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="high_year" value="<?php echo isset($student['high_year']) ? $student['high_year'] : '' ?>" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address (High School)</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_20" type="text" name="high_address" value="<?php echo isset($student['high_address']) ? $student['high_address'] : '' ?>" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                           <span class="label">School Graduated / Last School Attended</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_18" type="text" name="school_graduated" value="<?php echo isset($student['school_graduated']) ? $student['school_graduated'] : '' ?>" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                           <span class="label">School Year</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="school_year" value="<?php echo isset($student['school_year']) ? $student['school_year'] : '' ?>" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                  <div class="happyforms-part-wrap">
                                                                     <div class="happyforms-part__label-container">
                                                                        <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                           <span class="label">School Address</span>
                                                                           <span class="happyforms-required"></span>
                                                                        </label>
                                                                     </div>
                                                                     <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                     <div class="happyforms-part__el">
                                                                        <div class="happyforms-input">
                                                                           <input id="happyforms-768_single_line_text_20" type="text" name="school_address" value="<?php echo isset($student['school_address']) ? $student['school_address'] : '' ?>" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="nso" value="Avialable">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="card" value="Avialable">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="good_moral" value="Avialable">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="exam_remarks" value="Old Students">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="status_type" value="Old Students">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="picture">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" class="form-control" name="applicant_id" id="applicant_id" style="color: red" value="" readonly>
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="strand">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="raw_score">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="stanine">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="percentile">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="category">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="findings">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                               </div>
                                                               <div>
                                                                  <input type="hidden" name="section_id">
                                                               </div>
                                                               <div>
                                                                  <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                                     <button type="submit" class="happyforms-submit happyforms-button-submit form-btn " name="data">Submit</button>
                                                                  </div>
                                                               </div>
                                                         </form>
                                                         <?php endif; ?>

                                                         <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                            <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                            <!-- HappyForms CSS variables -->
                                                            <style>
                                                               #happyforms-768 {
                                                                  --happyforms-form-title-font-size: 32px;
                                                                  --happyforms-part-title-font-size: 16px;
                                                                  --happyforms-part-description-font-size: 12px;
                                                                  --happyforms-part-value-font-size: 16px;
                                                                  --happyforms-submit-button-font-size: 16px;
                                                                  --happyforms-color-primary: #000000;
                                                                  --happyforms-color-success-notice: #ebf9f0;
                                                                  --happyforms-color-success-notice-text: #1eb452;
                                                                  --happyforms-color-error: #f23000;
                                                                  --happyforms-color-error-notice: #ffeeea;
                                                                  --happyforms-color-error-notice-text: #f23000;
                                                                  --happyforms-color-part-title: #000000;
                                                                  --happyforms-color-part-value: #000000;
                                                                  --happyforms-color-part-placeholder: #888888;
                                                                  --happyforms-color-part-description: #454545;
                                                                  --happyforms-color-part-border: #dbdbdb;
                                                                  --happyforms-color-part-border-focus: #7aa4ff;
                                                                  --happyforms-color-part-background: #ffffff;
                                                                  --happyforms-color-part-background-focus: #ffffff;
                                                                  --happyforms-color-submit-background: #000000;
                                                                  --happyforms-color-submit-background-hover: #000000;
                                                                  --happyforms-color-submit-border: transparent;
                                                                  --happyforms-color-submit-text: #ffffff;
                                                                  --happyforms-color-submit-text-hover: #ffffff;
                                                                  --happyforms-color-table-row-odd: #fcfcfc;
                                                                  --happyforms-color-table-row-even: #efefef;
                                                                  --happyforms-color-table-row-odd-text: #000000;
                                                                  --happyforms-color-table-row-even-text: #000000;
                                                                  --happyforms-color-dropdown-item-bg: #ffffff;
                                                                  --happyforms-color-dropdown-item-text: #000000;
                                                                  --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                                  --happyforms-color-dropdown-item-text-hover: #000000;
                                                               }
                                                            </style>
                                                            <!-- End of HappyForms CSS variables -->
                                                            <!-- HappyForms Additional CSS -->
                                                            <style data-happyforms-additional-css></style>
                                                            <!-- End of HappyForms Additional CSS -->
                                                            <div class=" happyforms-styles" id="happyforms-768">
                                                            <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'Shift Students') { ?>
                                                               <form id="pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                                  <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                                  <input type="hidden" name="action" value="happyforms_message">
                                                                  <input type="hidden" name="client_referer" value="">
                                                                  <input type="hidden" name="happyforms_form_id" value="768">
                                                                  <input type="hidden" name="happyforms_step" value="0">
                                                                  <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                                  <input type="hidden" value="<?= $academic ?>" name="academic">
                                                                  <div class="happyforms-flex">
                                                                     <input type="text" name="768-single_line_text" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                        <h4 style="text-align: center;">Shift Students</h4>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_1" class="happyforms-part__label">
                                                                                 <span class="label">First Name</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Juan</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_2" class="happyforms-part__label">
                                                                                 <span class="label">Middle Name</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_3" class="happyforms-part__label">
                                                                                 <span class="label">Last Name</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                                 <span class="label">Last Course Enroll</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-custom-select">
                                                                                 <div class="happyforms-part__select-wrap">
                                                                                    <select name="course_id" id="course_id" data-serialize class="happyforms-select" onchange="fetchYear(this.value, 'shift')" required>
                                                                                       <option value="" class="happyforms-placeholder-option">Select Course</option>
                                                                                       <?php
                                                                                       if (!empty($courses)) {
                                                                                          foreach ($courses as $course) {
                                                                                             echo '<option value=' . $course['course_id'] . '>' . $course['course_name'] . '|' . $course['course_code'] . '</option>';
                                                                                          }
                                                                                       }
                                                                                       ?>
                                                                                    </select>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                                 <span class="label">Last Year Enroll</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-custom-select">
                                                                                 <div class="happyforms-part__select-wrap">
                                                                                    <select name="year_id_shift" id="year_id_shift" data-serialize class="happyforms-select" required>
                                                                                       <option value="" class="happyforms-placeholder-option">Select Course First</option>
                                                                                    </select>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                                 <span class="label">ID Number</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 2019-0349</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input maxlength="9" id="happyforms-768_single_line_text_11" type="text" name="id_number" value="" placeholder="ID Number" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                                 <span class="label">Age</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 21</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input min="17" max="80" id="happyforms-768_single_line_text_11" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                                 <span class="label">Address</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                                 <span class="label">Status</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-custom-select">
                                                                                 <div class="happyforms-part__select-wrap">
                                                                                    <select name="status" data-serialize class="happyforms-select" required>
                                                                                       <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                                       <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                                       <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                                       <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                                       <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                                    </select>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                                 <span class="label">Gender</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-custom-select">
                                                                                 <div class="happyforms-part__select-wrap">
                                                                                    <select name="gender" data-serialize class="happyforms-select" required>
                                                                                       <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                                       <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                                       <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                                       <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                                       <optgroup label="" id="select_6_option_1666592388682">
                                                                                       </optgroup>
                                                                                    </select>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_7" class="happyforms-part__label">
                                                                                 <span class="label">Place of Birth</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_8" class="happyforms-part__label">
                                                                                 <span class="label">Date of Birth</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                               <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_9" class="happyforms-part__label">
                                                                                 <span class="label">Regilion</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_10" class="happyforms-part__label">
                                                                                 <span class="label">Contact No.</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 09279817079</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input min="999999999" max="99999999999" id="happyforms-768_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                                 <span class="label">Email Address</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_12" class="happyforms-part__label">
                                                                                 <span class="label">Guardian / Parents</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_13" class="happyforms-part__label">
                                                                                 <span class="label">Occupation</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Nurse</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_14" class="happyforms-part__label">
                                                                                 <span class="label">Guardian Address</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_15" class="happyforms-part__label">
                                                                                 <span class="label">Home Zipcode</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 6053</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input min="99" max="9999" id="happyforms-768_single_line_text_15" type="number" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_16" class="happyforms-part__label">
                                                                                 <span class="label">NSAT Score</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_17" class="happyforms-part__label">
                                                                                 <span class="label">Year</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input maxlength="9" id="happyforms-768_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                                 <span class="label">Elementary</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Malbago Elementray School</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                                 <span class="label">School Year (Elementary)</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                                 <span class="label">School Address (Elementary)</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                                 <span class="label">High School</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                                 <span class="label">School Year (High School)</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                                 <span class="label">School Address (High School)</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                                 <span class="label">School Graduated / Last School Attended</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                                 <span class="label">School Year</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                                        <div class="happyforms-part-wrap">
                                                                           <div class="happyforms-part__label-container">
                                                                              <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                                 <span class="label">School Address</span>
                                                                                 <span class="happyforms-required"></span>
                                                                              </label>
                                                                           </div>
                                                                           <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                           <div class="happyforms-part__el">
                                                                              <div class="happyforms-input">
                                                                                 <input id="happyforms-768_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="type" value="Shift">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="nso" value="Avialable">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="card" value="Avialable">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="good_moral" value="Avialable">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="exam_remarks" value="Old Students">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="status_type" value="Shift Students">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="picture">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" class="form-control" name="applicant_id" id="applicant_id" style="color: red" value="" readonly>
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="strand">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="raw_score">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="stanine">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="percentile">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="category">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="findings">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="section_id">
                                                                     </div>
                                                                     <div>
                                                                        <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                                           <button type="submit" class="happyforms-submit happyforms-button-submit form-btn " name="shift">Submit</button>
                                                                        </div>
                                                                     </div>
                                                               </form>

                                                            </div>
                                                         </div>
                                                      </div>
                                                   <?php } elseif (!empty($enroll) && $enroll['enroll_name'] == 'All') { ?>
                                                      <form id="happyforms-form-710 pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                         <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                         <input type="hidden" name="action" value="happyforms_message">
                                                         <input type="hidden" name="client_referer" value="">
                                                         <input type="hidden" name="happyforms_form_id" value="710">
                                                         <input type="hidden" name="happyforms_step" value="0">
                                                         <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                         <input type="hidden" value="<?= $academic ?>" name="academic">
                                                         <div class="happyforms-flex">
                                                            <input type="text" name="710-number" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <h4 style="text-align: center;">New Students</h4>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_1" class="happyforms-part__label">
                                                                        <span class="label">First Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Juan</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_2" class="happyforms-part__label">
                                                                        <span class="label">Middle Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_3" class="happyforms-part__label">
                                                                        <span class="label">Last Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                        <span class="label">Age</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 21</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="17" max="80" maxlength="2" id="happyforms-710_single_line_text_12" type="number" name="age" value="" placeholder="Age" autocomplete="off" maz spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                        <span class="label">Senior High School Strand</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: STEM</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_13" type="text" name="strand" value="" placeholder="Senior High Strand" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                        <span class="label">Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_select_5" class="happyforms-part__label">
                                                                        <span class="label">Status</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="status" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                              <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                              <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                              <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                              <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_select_6" class="happyforms-part__label">
                                                                        <span class="label">Gender</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="gender" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                              <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                              <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                              <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                              <optgroup label="" id="select_6_option_1666592388682">
                                                                              </optgroup>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_7" class="happyforms-part__label">
                                                                        <span class="label">Place of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_8" class="happyforms-part__label">
                                                                        <span class="label">Date of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                      <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                        <span class="label">Regilion</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_10" class="happyforms-part__label">
                                                                        <span class="label">Contact No.</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 09279817079</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="999999999" max="9999999999" id="happyforms-710_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_11" class="happyforms-part__label">
                                                                        <span class="label">Email Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                        <span class="label">Guardian / Parents</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                        <span class="label">Occupation</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Nurse</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_14" class="happyforms-part__label">
                                                                        <span class="label">Guardian Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_15" class="happyforms-part__label">
                                                                        <span class="label">Home Zipcode</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 6053</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="99" max="9999" id="happyforms-710_single_line_text_15" type="number" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_16" class="happyforms-part__label">
                                                                        <span class="label">NSAT Score</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_17" class="happyforms-part__label">
                                                                        <span class="label">Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">Elementary</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago Elemenraty School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2012-2013</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (Elementary)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">High School</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (High School)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">Last School Attended / School Graduated</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="exam_remarks">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="applicant_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="course_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="year_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="id_number">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="section_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="type" value="New">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="nso">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="card">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="good_moral">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="status_type" value="New Applicant">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="picture">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="raw_score">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="stanine">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="percentile">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="category">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="findings">
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                               <button name="new" type="submit" class="happyforms-submit happyforms-button--submit form-btn ">Submit</button>
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                   <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                   <!-- HappyForms CSS variables -->
                                                   <style>
                                                      #happyforms-767 {
                                                         --happyforms-form-title-font-size: 32px;
                                                         --happyforms-part-title-font-size: 16px;
                                                         --happyforms-part-description-font-size: 12px;
                                                         --happyforms-part-value-font-size: 16px;
                                                         --happyforms-submit-button-font-size: 16px;
                                                         --happyforms-color-primary: #000000;
                                                         --happyforms-color-success-notice: #ebf9f0;
                                                         --happyforms-color-success-notice-text: #1eb452;
                                                         --happyforms-color-error: #f23000;
                                                         --happyforms-color-error-notice: #ffeeea;
                                                         --happyforms-color-error-notice-text: #f23000;
                                                         --happyforms-color-part-title: #000000;
                                                         --happyforms-color-part-value: #000000;
                                                         --happyforms-color-part-placeholder: #888888;
                                                         --happyforms-color-part-descriptron: #454545;
                                                         --happyforms-color-part-border: #dbdbdb;
                                                         --happyforms-color-part-border-focus: #7aa4ff;
                                                         --happyforms-color-part-background: #ffffff;
                                                         --happyforms-color-part-background-focus: #ffffff;
                                                         --happyforms-color-submit-background: #000000;
                                                         --happyforms-color-submit-background-hover: #000000;
                                                         --happyforms-color-submit-border: transparent;
                                                         --happyforms-color-submit-text: #ffffff;
                                                         --happyforms-color-submit-text-hover: #ffffff;
                                                         --happyforms-color-table-row-odd: #fcfcfc;
                                                         --happyforms-color-table-row-even: #efefef;
                                                         --happyforms-color-table-row-odd-text: #000000;
                                                         --happyforms-color-table-row-even-text: #000000;
                                                         --happyforms-color-dropdown-item-bg: #ffffff;
                                                         --happyforms-color-dropdown-item-text: #000000;
                                                         --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                         --happyforms-color-dropdown-item-text-hover: #000000;
                                                      }
                                                   </style>
                                                   <!-- End of HappyForms CSS variables -->
                                                   <!-- HappyForms Additional CSS -->
                                                   <style data-happyforms-additional-css></style>
                                                   <!-- End of HappyForms Additional CSS -->
                                                   <!-- TRANSFEREE START -->
                                                   <div class=" happyforms-styles" id="happyforms-710">
                                                      <form id="happyforms-form-710 pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                         <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                         <input type="hidden" name="action" value="happyforms_message">
                                                         <input type="hidden" name="client_referer" value="">
                                                         <input type="hidden" name="happyforms_form_id" value="710">
                                                         <input type="hidden" name="happyforms_step" value="0">
                                                         <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                         <input type="hidden" value="<?= $academic ?>" name="academic">
                                                         <div class="happyforms-flex">
                                                            <input type="text" name="710-number" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <h4 style="text-align: center;">Transferee Students</h4>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_1" class="happyforms-part__label">
                                                                        <span class="label">First Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Juan</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_2" class="happyforms-part__label">
                                                                        <span class="label">Middle Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_3" class="happyforms-part__label">
                                                                        <span class="label">Last Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                        <span class="label">Age</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 21</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="17" max="80" id="happyforms-710_single_line_text_9" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17)" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                        <span class="label">Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_select_5" class="happyforms-part__label">
                                                                        <span class="label">Status</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="status" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                              <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                              <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                              <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                              <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_select_6" class="happyforms-part__label">
                                                                        <span class="label">Gender</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="gender" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                              <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                              <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                              <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                              <optgroup label="" id="select_6_option_1666592388682">
                                                                              </optgroup>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_7" class="happyforms-part__label">
                                                                        <span class="label">Place of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_8" class="happyforms-part__label">
                                                                        <span class="label">Date of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                      <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_9" class="happyforms-part__label">
                                                                        <span class="label">Regilion</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_10" class="happyforms-part__label">
                                                                        <span class="label">Contact No.</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 09279817079</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="999999999" max="99999999999" id="happyforms-710_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_11" class="happyforms-part__label">
                                                                        <span class="label">Email Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_12" class="happyforms-part__label">
                                                                        <span class="label">Guardian / Parents</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-710_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_13" class="happyforms-part__label">
                                                                        <span class="label">Occupation</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Nurse</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_14" class="happyforms-part__label">
                                                                        <span class="label">Guardian Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_15" class="happyforms-part__label">
                                                                        <span class="label">Home Zipcode</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 6053</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="99" max="9999" id="happyforms-710_single_line_text_15" type="text" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_16" class="happyforms-part__label">
                                                                        <span class="label">NSAT Score</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_17" class="happyforms-part__label">
                                                                        <span class="label">Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">Elementary</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago Elemenraty School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2012-2013</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (Elementary)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">High School</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (High School)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-710_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">Last School Attended / School Graduated</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Cebu Normal University</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-710_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-710_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-710_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-710_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="exam_remarks">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="course_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="applicant_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="year_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="id_number">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="section_id">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="type" value="Transferee">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="nso">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="card">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="good_moral">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="status_type" value="New Applicant">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="picture">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="strand" value="Transferee">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="raw_score">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="stanine">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="percentile">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="category">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="findings">
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                               <button type="submit" class="happyforms-submit happyforms-button--submit form-btn " name="new">Submit</button>
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                                   <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                                   <!-- HappyForms CSS variables -->
                                                   <style>
                                                      #happyforms-768 {
                                                         --happyforms-form-title-font-size: 32px;
                                                         --happyforms-part-title-font-size: 16px;
                                                         --happyforms-part-description-font-size: 12px;
                                                         --happyforms-part-value-font-size: 16px;
                                                         --happyforms-submit-button-font-size: 16px;
                                                         --happyforms-color-primary: #000000;
                                                         --happyforms-color-success-notice: #ebf9f0;
                                                         --happyforms-color-success-notice-text: #1eb452;
                                                         --happyforms-color-error: #f23000;
                                                         --happyforms-color-error-notice: #ffeeea;
                                                         --happyforms-color-error-notice-text: #f23000;
                                                         --happyforms-color-part-title: #000000;
                                                         --happyforms-color-part-value: #000000;
                                                         --happyforms-color-part-placeholder: #888888;
                                                         --happyforms-color-part-description: #454545;
                                                         --happyforms-color-part-border: #dbdbdb;
                                                         --happyforms-color-part-border-focus: #7aa4ff;
                                                         --happyforms-color-part-background: #ffffff;
                                                         --happyforms-color-part-background-focus: #ffffff;
                                                         --happyforms-color-submit-background: #000000;
                                                         --happyforms-color-submit-background-hover: #000000;
                                                         --happyforms-color-submit-border: transparent;
                                                         --happyforms-color-submit-text: #ffffff;
                                                         --happyforms-color-submit-text-hover: #ffffff;
                                                         --happyforms-color-table-row-odd: #fcfcfc;
                                                         --happyforms-color-table-row-even: #efefef;
                                                         --happyforms-color-table-row-odd-text: #000000;
                                                         --happyforms-color-table-row-even-text: #000000;
                                                         --happyforms-color-dropdown-item-bg: #ffffff;
                                                         --happyforms-color-dropdown-item-text: #000000;
                                                         --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                         --happyforms-color-dropdown-item-text-hover: #000000;
                                                      }
                                                   </style>
                                                   <!-- End of HappyForms CSS variables -->
                                                   <!-- HappyForms Additional CSS -->
                                                   <style data-happyforms-additional-css></style>
                                                   <!-- End of HappyForms Additional CSS -->
                                                   <!-- OLD STUDENTS -->
                                                   <div class=" happyforms-styles" id="happyforms-768">
                                                      <form id="pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                         <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                         <input type="hidden" name="action" value="happyforms_message">
                                                         <input type="hidden" name="client_referer" value="">
                                                         <input type="hidden" name="happyforms_form_id" value="768">
                                                         <input type="hidden" name="happyforms_step" value="0">
                                                         <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                         <input type="hidden" value="<?= $academic ?>" name="academic">
                                                         <div class="happyforms-flex">
                                                            <input type="text" name="768-single_line_text" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <h4 style="text-align: center;">Old Students</h4>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_1" class="happyforms-part__label">
                                                                        <span class="label">First Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Juan</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_2" class="happyforms-part__label">
                                                                        <span class="label">Middle Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_3" class="happyforms-part__label">
                                                                        <span class="label">Last Name</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                        <span class="label">Course</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="course_id" id="course_id" data-serialize class="happyforms-select" onchange="fetchYear(this.value, 'old')" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Course</option>
                                                                              <?php
                                                                              if (!empty($courses)) {
                                                                                 foreach ($courses as $course) {
                                                                                    echo '<option value=' . $course['course_id'] . '>' . $course['course_name'] . '|' . $course['course_code'] . '</option>';
                                                                                 }
                                                                              }
                                                                              ?>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                        <span class="label">Year Level</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="year_id" id="year_id" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Course First</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                        <span class="label">Students Type</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="type" id="type" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Student Type</option>
                                                                              <option value="Regular">Regular</option>
                                                                              <option value="Irregular">Irregular</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                        <span class="label">ID Number</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-0349</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-768_single_line_text_11" type="text" name="id_number" value="" placeholder="ID Number" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                        <span class="label">Age</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 21</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="17" max="80" id="happyforms-768_single_line_text_11" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                        <span class="label">Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                        <span class="label">Status</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="status" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                              <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                              <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                              <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                              <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                        <span class="label">Gender</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-custom-select">
                                                                        <div class="happyforms-part__select-wrap">
                                                                           <select name="gender" data-serialize class="happyforms-select" required>
                                                                              <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                              <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                              <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                              <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                              <optgroup label="" id="select_6_option_1666592388682">
                                                                              </optgroup>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_7" class="happyforms-part__label">
                                                                        <span class="label">Place of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_8" class="happyforms-part__label">
                                                                        <span class="label">Date of Birth</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: October 20,1992</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                      <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_9" class="happyforms-part__label">
                                                                        <span class="label">Regilion</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_10" class="happyforms-part__label">
                                                                        <span class="label">Contact No.</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 09279817079</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="999999999" max="99999999999" id="happyforms-768_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                        <span class="label">Email Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_12" class="happyforms-part__label">
                                                                        <span class="label">Guardian / Parents</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_13" class="happyforms-part__label">
                                                                        <span class="label">Occupation</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Nurse</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_14" class="happyforms-part__label">
                                                                        <span class="label">Guardian Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_15" class="happyforms-part__label">
                                                                        <span class="label">Home Zipcode</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 6053</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input min="99" max="9999" id="happyforms-768_single_line_text_15" type="number" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_16" class="happyforms-part__label">
                                                                        <span class="label">NSAT Score</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_17" class="happyforms-part__label">
                                                                        <span class="label">Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-768_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">Elementary</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Malbago Elementray School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year (Elementary)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (Elementary)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">High School</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year (High School)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address (High School)</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                        <span class="label">School Graduated / Last School Attended</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                        <span class="label">School Year</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: 2019-2020</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                               <div class="happyforms-part-wrap">
                                                                  <div class="happyforms-part__label-container">
                                                                     <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                        <span class="label">School Address</span>
                                                                        <span class="happyforms-required"></span>
                                                                     </label>
                                                                  </div>
                                                                  <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                                  <div class="happyforms-part__el">
                                                                     <div class="happyforms-input">
                                                                        <input id="happyforms-768_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="nso" value="Avialable">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="card" value="Avialable">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="good_moral" value="Avialable">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="exam_remarks" value="Old Students">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="status_type" value="Old Students">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="picture">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" class="form-control" name="applicant_id" id="applicant_id" style="color: red" value="" readonly>
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="strand">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="raw_score">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="stanine">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="percentile">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="category">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="findings">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                            </div>
                                                            <div>
                                                               <input type="hidden" name="section_id">
                                                            </div>
                                                            <div>
                                                               <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                                  <button type="submit" class="happyforms-submit happyforms-button-submit form-btn " name="data">Submit</button>
                                                               </div>
                                                            </div>
                                                      </form>
                                                   </div>
                                                </div>
                                          </div>


                                          <!-- SHFT STUDENTS START -->
                                          <div class="exad-advance-tab-content exad-tab-image-has-no  exad-tab-image-right">
                                             <link rel="stylesheet" property="stylesheet" href="./../wp-content/plugins/happyforms/bundles/css/frontend.css">
                                             <!-- HappyForms CSS variables -->
                                             <style>
                                                #happyforms-768 {
                                                   --happyforms-form-title-font-size: 32px;
                                                   --happyforms-part-title-font-size: 16px;
                                                   --happyforms-part-description-font-size: 12px;
                                                   --happyforms-part-value-font-size: 16px;
                                                   --happyforms-submit-button-font-size: 16px;
                                                   --happyforms-color-primary: #000000;
                                                   --happyforms-color-success-notice: #ebf9f0;
                                                   --happyforms-color-success-notice-text: #1eb452;
                                                   --happyforms-color-error: #f23000;
                                                   --happyforms-color-error-notice: #ffeeea;
                                                   --happyforms-color-error-notice-text: #f23000;
                                                   --happyforms-color-part-title: #000000;
                                                   --happyforms-color-part-value: #000000;
                                                   --happyforms-color-part-placeholder: #888888;
                                                   --happyforms-color-part-description: #454545;
                                                   --happyforms-color-part-border: #dbdbdb;
                                                   --happyforms-color-part-border-focus: #7aa4ff;
                                                   --happyforms-color-part-background: #ffffff;
                                                   --happyforms-color-part-background-focus: #ffffff;
                                                   --happyforms-color-submit-background: #000000;
                                                   --happyforms-color-submit-background-hover: #000000;
                                                   --happyforms-color-submit-border: transparent;
                                                   --happyforms-color-submit-text: #ffffff;
                                                   --happyforms-color-submit-text-hover: #ffffff;
                                                   --happyforms-color-table-row-odd: #fcfcfc;
                                                   --happyforms-color-table-row-even: #efefef;
                                                   --happyforms-color-table-row-odd-text: #000000;
                                                   --happyforms-color-table-row-even-text: #000000;
                                                   --happyforms-color-dropdown-item-bg: #ffffff;
                                                   --happyforms-color-dropdown-item-text: #000000;
                                                   --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                                   --happyforms-color-dropdown-item-text-hover: #000000;
                                                }
                                             </style>
                                             <!-- End of HappyForms CSS variables -->
                                             <!-- HappyForms Additional CSS -->
                                             <style data-happyforms-additional-css></style>
                                             <!-- End of HappyForms Additional CSS -->

                                             <!-- SHIFT STUDENTS -->
                                             <div class=" happyforms-styles" id="happyforms-768">
                                                <form id="pre-enroll" autocomplete="off" onsubmit="return preEnrol(this)">
                                                   <input type="hidden" name="happyforms_random_seed" value="3639626543">
                                                   <input type="hidden" name="action" value="happyforms_message">
                                                   <input type="hidden" name="client_referer" value="">
                                                   <input type="hidden" name="happyforms_form_id" value="768">
                                                   <input type="hidden" name="happyforms_step" value="0">
                                                   <input type="hidden" value="<?= $new_user_id ?>" name="new_user_id">
                                                   <input type="hidden" value="<?= $academic ?>" name="academic">
                                                   <div class="happyforms-flex">
                                                      <input type="text" name="768-single_line_text" style="position:absolute;left:-5000px;" tabindex="-1" autocomplete="off"> <span class="screen-reader-text">Leave this field blank</span>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-710_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                         <h4 style="text-align: center;">Shift Students</h4>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_1-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_1" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_1" class="happyforms-part__label">
                                                                  <span class="label">First Name</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Juan</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_1" type="text" name="fname" value="" placeholder="First name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_2-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_2" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_2" class="happyforms-part__label">
                                                                  <span class="label">Middle Name</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Padilla (Leave it blank if NONE)</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_2" type="text" name="mname" value="" placeholder="Middle name" autocomplete="off" spellcheck="false" autocorrect="off">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_3-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_3" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_3" class="happyforms-part__label">
                                                                  <span class="label">Last Name</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Dela Cruz</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_3" type="text" name="lname" value="" placeholder="Last name" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                  <span class="label">Last Course Enroll</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-custom-select">
                                                                  <div class="happyforms-part__select-wrap">
                                                                     <select name="course_id" id="course_id" data-serialize class="happyforms-select" onchange="fetchYear(this.value, 'shift')" required>
                                                                        <option value="" class="happyforms-placeholder-option">Select Course</option>
                                                                        <?php
                                                                        if (!empty($courses)) {
                                                                           foreach ($courses as $course) {
                                                                              echo '<option value=' . $course['course_id'] . '>' . $course['course_name'] . '|' . $course['course_code'] . '</option>';
                                                                           }
                                                                        }
                                                                        ?>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                  <span class="label">Last Year Enroll</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-custom-select">
                                                                  <div class="happyforms-part__select-wrap">
                                                                     <select name="year_id_shift" id="year_id_shift" data-serialize class="happyforms-select" required>
                                                                        <option value="" class="happyforms-placeholder-option">Select Course First</option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                  <span class="label">ID Number</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 2019-0349</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input maxlength="9" id="happyforms-768_single_line_text_11" type="text" name="id_number" value="" placeholder="ID Number" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                  <span class="label">Age</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 21</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input min="17" max="80" id="happyforms-768_single_line_text_11" type="number" name="age" value="" placeholder="Age" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Age required at least 17')" oninput="this.setCustomValidity('')">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_4-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_4" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_4" class="happyforms-part__label">
                                                                  <span class="label">Address</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_4" type="text" name="address" value="" placeholder="Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_5-part" data-happyforms-type="select" data-happyforms-id="select_5" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_select_5" class="happyforms-part__label">
                                                                  <span class="label">Status</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-custom-select">
                                                                  <div class="happyforms-part__select-wrap">
                                                                     <select name="status" data-serialize class="happyforms-select" required>
                                                                        <option value="" class="happyforms-placeholder-option">Select Status</option>
                                                                        <option value="Single" id="select_5_option_1666592286529">Single </option>
                                                                        <option value="Married" id="select_5_option_1666592295476">Married </option>
                                                                        <option value="Widow" id="select_5_option_1666592309774">Widow </option>
                                                                        <option value="Others" id="select_5_option_1666592316421">Others </option>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-part-select--required happyforms-form__part happyforms-part happyforms-part--select happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_select_6-part" data-happyforms-type="select" data-happyforms-id="select_6" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_select_6" class="happyforms-part__label">
                                                                  <span class="label">Gender</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-custom-select">
                                                                  <div class="happyforms-part__select-wrap">
                                                                     <select name="gender" data-serialize class="happyforms-select" required>
                                                                        <option value="" class="happyforms-placeholder-option">Select Gender</option>
                                                                        <option value="Male" id="select_6_option_1666592286529">Male </option>
                                                                        <option value="Female" id="select_6_option_1666592295476">Female </option>
                                                                        <option value="Others" id="select_6_option_1666592316421">Others </option>
                                                                        <optgroup label="" id="select_6_option_1666592388682">
                                                                        </optgroup>
                                                                     </select>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_7-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_7" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_7" class="happyforms-part__label">
                                                                  <span class="label">Place of Birth</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Malbago, Madridejos, Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_7" type="text" name="place_of_birth" value="" placeholder="Place of birth" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_8-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_8" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_8" class="happyforms-part__label">
                                                                  <span class="label">Date of Birth</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: October 20,1992</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="datepicker" type="text" name="date_of_birth" placeholder="Date of birth" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_9-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_9" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_9" class="happyforms-part__label">
                                                                  <span class="label">Regilion</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Roman Catholic</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_9" type="text" name="religion" value="" placeholder="Religion" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_10-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_10" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_10" class="happyforms-part__label">
                                                                  <span class="label">Contact No.</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 09279817079</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input min="999999999" max="99999999999" id="happyforms-768_single_line_text_10" type="number" name="contact" value="" placeholder="Contact #" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Phone Number')" oninput="this.setCustomValidity('')">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_11-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_11" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_11" class="happyforms-part__label">
                                                                  <span class="label">Email Address</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: mcc@gmail.com (*Valid email only)</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_11" type="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email" autocomplete="off" spellcheck="false" autocorrect="off" readonly>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_12-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_12" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_12" class="happyforms-part__label">
                                                                  <span class="label">Guardian / Parents</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Jose Rizal</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_12" type="text" name="guardian" value="" placeholder="Guardian/Parents" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-half happyforms-part--label-show" id="happyforms-768_single_line_text_13-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_13" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_13" class="happyforms-part__label">
                                                                  <span class="label">Occupation</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Nurse</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_13" type="text" name="occupation" value="" placeholder="Occupation" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_14-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_14" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_14" class="happyforms-part__label">
                                                                  <span class="label">Guardian Address</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Tugas, Madridejosm Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_14" type="text" name="guardian_address" value="" placeholder="Addresss" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_15-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_15" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_15" class="happyforms-part__label">
                                                                  <span class="label">Home Zipcode</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 6053</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input min="99" max="9999" id="happyforms-768_single_line_text_15" type="number" name="home_zipcode" value="" placeholder="Zipcode" autocomplete="off" spellcheck="false" autocorrect="off" required oninvalid="this.setCustomValidity('Enter Valid Zipcode')" oninput="this.setCustomValidity('')">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_16-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_16" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_16" class="happyforms-part__label">
                                                                  <span class="label">NSAT Score</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 42, Please type NONE if not avialable.</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_16" type="text" name="nsat_score" value="" placeholder="NSAT score" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_17-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_17" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_17" class="happyforms-part__label">
                                                                  <span class="label">Year</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 2016, Please type NONE if not avialable.</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input maxlength="9" id="happyforms-768_single_line_text_17" type="text" name="year" value="" placeholder="Year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                  <span class="label">Elementary</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Malbago Elementray School</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_18" type="text" name="elementary" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                  <span class="label">School Year (Elementary)</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 2019-2020</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="elem_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                  <span class="label">School Address (Elementary)</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_20" type="text" name="elem_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                  <span class="label">High School</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_18" type="text" name="high_school" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                  <span class="label">School Year (High School)</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 2019-2020</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="high_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                  <span class="label">School Address (High School)</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_20" type="text" name="high_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-auto happyforms-part--label-show" id="happyforms-768_single_line_text_18-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_18" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_18" class="happyforms-part__label">
                                                                  <span class="label">School Graduated / Last School Attended</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Madridejos National High School</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_18" type="text" name="school_graduated" value="" placeholder="School graduated" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-third happyforms-part--label-show" id="happyforms-768_single_line_text_19-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_19" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_19" class="happyforms-part__label">
                                                                  <span class="label">School Year</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: 2019-2020</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input maxlength="9" id="happyforms-768_single_line_text_19" type="text" name="school_year" value="" placeholder="School year" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="happyforms-form__part happyforms-part happyforms-part--single_line_text happyforms-part--width-full happyforms-part--label-show" id="happyforms-768_single_line_text_20-part" data-happyforms-type="single_line_text" data-happyforms-id="single_line_text_20" data-happyforms-required="">
                                                         <div class="happyforms-part-wrap">
                                                            <div class="happyforms-part__label-container">
                                                               <label for="happyforms-768_single_line_text_20" class="happyforms-part__label">
                                                                  <span class="label">School Address</span>
                                                                  <span class="happyforms-required"></span>
                                                               </label>
                                                            </div>
                                                            <span class="happyforms-part__description">ex: Poblacion, Madridejos, Cebu</span>
                                                            <div class="happyforms-part__el">
                                                               <div class="happyforms-input">
                                                                  <input id="happyforms-768_single_line_text_20" type="text" name="school_address" value="" placeholder="School Address" autocomplete="off" spellcheck="false" autocorrect="off" required>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="type" value="Shift">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="nso" value="Avialable">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="card" value="Avialable">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="good_moral" value="Avialable">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="exam_remarks" value="Old Students">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="status_type" value="Shift Students">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="picture">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" class="form-control" name="applicant_id" id="applicant_id" style="color: red" value="" readonly>
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="strand">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="raw_score">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="stanine">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="percentile">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="category">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="findings">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="semester_id" value="<?= !empty($semester) ? $semester['semester_name'] : null; ?>">
                                                      </div>
                                                      <div>
                                                         <input type="hidden" name="section_id">
                                                      </div>
                                                      <div>
                                                         <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                                            <button type="submit" class="happyforms-submit happyforms-button-submit form-btn " name="shift">Submit</button>
                                                         </div>
                                                      </div>
                                                </form>
                                             <?php } else { ?>
                                                <h1 class="entry-title" itemprop="headline" style="text-align: center;">Pre-enrollment is not yet started. Please wait for the announcement.</h1>
                                             <?php } ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                     </section>
            </div>
         <?php else : ?>
            <h5 class="fs-2x fw-bolder mb-0" style="text-align: center;">Pre-enrollment is currently NOT AVAILABLE.</h5>
         <?php endif; ?>
         </div>
         <!-- .entry-content .clear -->
         </article>
         <!-- #post-## -->
         </main>
         <!-- #main -->
      </div>
      <!-- #primary -->
   </div> <!-- ast-container -->
   </div>
   <!-- #content -->
   <div id="ast-mobile-popup-wrapper">
      <div id="ast-mobile-popup" class="ast-mobile-popup-drawer content-align-flex-start ast-mobile-popup-right">
         <div class="ast-mobile-popup-overlay"></div>
         <div class="ast-mobile-popup-inner">
            <div class="ast-mobile-popup-header">
               <button type="button" id="menu-toggle-close" class="menu-toggle-close" aria-label="Close menu">
                  <span class="ast-svg-iconset">
                     <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                        <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                           <path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
                        </svg>
                     </span>
                  </span>
               </button>
            </div>
            <div class="ast-mobile-popup-content">
               <div class="ast-builder-menu-mobile ast-builder-menu ast-builder-menu-mobile-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-header-mobile-menu">
                  <div class="ast-main-header-bar-alignment">
                     <div class="main-header-bar-navigation">
                        <nav class="site-navigation" id="ast-mobile-site-navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="Site Navigation">
                           <div id="ast-hf-mobile-menu" class="main-navigation">
                              <ul class="main-header-menu ast-nav-menu ast-flex  submenu-with-border astra-menu-animation-fade  stack-on-mobile">
                                 <li class="page_item page-item-465 menu-item"><a href="./../" class="menu-link">Home</a></li>
                                 <li class="page_item page-item-152 menu-item"><a href="./../about/" class="menu-link">About</a></li>
                                 <li class="page_item page-item-153 menu-item"><a href="./../academics/" class="menu-link">Academics</a></li>
                                 <li class="page_item page-item-155 menu-item"><a href="./../contact/" class="menu-link">Contact</a></li>
                                 <li class="page_item page-item-640 current-menu-item menu-item current-menu-php"><a href="" class="menu-link">Enroll Now</a></li>
                                 <li class="page_item page-item-640 menu-item"><a href="../step/" class="menu-link"><?php echo $button1 ?></a></li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="section-hb-social-icons-1">
                  <div class="ast-header-social-1-wrap ast-header-social-wrap">
                     <div class="header-social-inner-wrap element-social-inner-wrap social-show-label-false ast-social-color-type-custom ast-social-stack-none ast-social-element-style-filled">
                        <a href="https://web.facebook.com/profile.php?id=100083759292324" aria-label="Facebook" target="_blank" rel="noopener noreferrer" style="--color: #557dbc; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook header-social-item">
                           <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                 <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                              </svg>
                           </span>
                        </a>
                        <a href="https://www.facebook.com/groups/250995015059471" aria-label="Facebook" group target="_blank" rel="noopener noreferrer" style="--color: #3D87FB; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook_group header-social-item">
                           <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewbox="0 0 30 28">
                                 <title>Facebook Group</title>
                                 <path d="M9.266 14a5.532 5.532 0 00-4.141 2H3.031C1.468 16 0 15.25 0 13.516 0 12.25-.047 8 1.937 8c.328 0 1.953 1.328 4.062 1.328.719 0 1.406-.125 2.078-.359A7.624 7.624 0 007.999 10c0 1.422.453 2.828 1.266 4zM26 23.953C26 26.484 24.328 28 21.828 28H8.172C5.672 28 4 26.484 4 23.953 4 20.422 4.828 15 9.406 15c.531 0 2.469 2.172 5.594 2.172S20.063 15 20.594 15C25.172 15 26 20.422 26 23.953zM10 4c0 2.203-1.797 4-4 4S2 6.203 2 4s1.797-4 4-4 4 1.797 4 4zm11 6c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6zm9 3.516C30 15.25 28.531 16 26.969 16h-2.094a5.532 5.532 0 00-4.141-2A7.066 7.066 0 0022 10a7.6 7.6 0 00-.078-1.031A6.258 6.258 0 0024 9.328C26.109 9.328 27.734 8 28.062 8c1.984 0 1.937 4.25 1.937 5.516zM28 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4z"></path>
                              </svg>
                           </span>
                        </a>
                        <a href="tel:09279817079" aria-label="Phone" style="--color: inherit; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-phone header-social-item">
                           <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                 <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
                              </svg>
                           </span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ast-desktop-popup-content">
            </div>
         </div>
      </div>
   </div>
   <footer class="site-footer" id="colophon" itemtype="https://schema.org/WPFooter" itemscope="itemscope" itemid="#colophon">
      <div class="site-above-footer-wrap ast-builder-grid-row-container site-footer-focus-item ast-builder-grid-row-3-lheavy ast-builder-grid-row-tablet-3-equal ast-builder-grid-row-mobile-full ast-footer-row-stack ast-footer-row-tablet-inline ast-footer-row-mobile-stack" data-section="section-above-footer-builder">
         <div class="ast-builder-grid-row-container-inner">
            <div class="ast-builder-footer-grid-columns site-above-footer-inner-wrap ast-builder-grid-row">
               <div class="site-footer-above-section-1 site-footer-section site-footer-section-1">
                  <aside class="footer-widget-area widget-area site-footer-focus-item footer-widget-area-inner" data-section="sidebar-widgets-footer-widget-1" aria-label="Footer Widget 1">
                     <section id="text-2" class="widget widget_text">
                        <h2 class="widget-title">Madridejos Community College</h2>
                        <div class="textwidget">
                           <p>7P7F+F99, Bantayan &#8211; Madridejos Rd,<br>
                              Madridejos, 6053 Cebu
                           </p>
                        </div>
                     </section>
                  </aside>
               </div>
               <div class="site-footer-above-section-2 site-footer-section site-footer-section-2">
                  <aside class="footer-widget-area widget-area site-footer-focus-item footer-widget-area-inner" data-section="sidebar-widgets-footer-widget-2" aria-label="Footer Widget 2">
                     <section id="text-3" class="widget widget_text">
                        <h2 class="widget-title">Registration Office</h2>
                        <div class="textwidget">
                           <p>+639279817079<br>
                              8:00 a.m. &#8211; 4:00 p.m.
                           </p>
                        </div>
                     </section>
                  </aside>
               </div>
               <div class="site-footer-above-section-3 site-footer-section site-footer-section-3">
                  <div class="ast-builder-layout-element ast-flex site-footer-focus-item" data-section="section-fb-social-icons-1">
                     <div class="ast-footer-social-1-wrap ast-footer-social-wrap">
                        <div class="footer-social-inner-wrap element-social-inner-wrap social-show-label-false ast-social-color-type-custom ast-social-stack-none ast-social-element-style-filled">
                           <a href="https://web.facebook.com/profile.php?id=100083759292324" aria-label="Facebook" target="_blank" rel="noopener noreferrer" style="--color: #557dbc; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook footer-social-item">
                              <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                    <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                 </svg>
                              </span>
                           </a>
                           <a href="https://www.facebook.com/groups/250995015059471" aria-label="Facebook" group target="_blank" rel="noopener noreferrer" style="--color: #3D87FB; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-facebook_group footer-social-item">
                              <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewbox="0 0 30 28">
                                    <title>Facebook Group</title>
                                    <path d="M9.266 14a5.532 5.532 0 00-4.141 2H3.031C1.468 16 0 15.25 0 13.516 0 12.25-.047 8 1.937 8c.328 0 1.953 1.328 4.062 1.328.719 0 1.406-.125 2.078-.359A7.624 7.624 0 007.999 10c0 1.422.453 2.828 1.266 4zM26 23.953C26 26.484 24.328 28 21.828 28H8.172C5.672 28 4 26.484 4 23.953 4 20.422 4.828 15 9.406 15c.531 0 2.469 2.172 5.594 2.172S20.063 15 20.594 15C25.172 15 26 20.422 26 23.953zM10 4c0 2.203-1.797 4-4 4S2 6.203 2 4s1.797-4 4-4 4 1.797 4 4zm11 6c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6zm9 3.516C30 15.25 28.531 16 26.969 16h-2.094a5.532 5.532 0 00-4.141-2A7.066 7.066 0 0022 10a7.6 7.6 0 00-.078-1.031A6.258 6.258 0 0024 9.328C26.109 9.328 27.734 8 28.062 8c1.984 0 1.937 4.25 1.937 5.516zM28 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4z"></path>
                                 </svg>
                              </span>
                           </a>
                           <a href="tel:09279817079" aria-label="Phone" style="--color: inherit; --background-color: transparent;" class="ast-builder-social-element ast-inline-flex ast-phone footer-social-item">
                              <span class="ahfb-svg-iconset ast-inline-flex svg-baseline">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                    <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
                                 </svg>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="site-primary-footer-wrap ast-builder-grid-row-container site-footer-focus-item ast-builder-grid-row-3-cheavy ast-builder-grid-row-tablet-full ast-builder-grid-row-mobile-full ast-footer-row-stack ast-footer-row-tablet-stack ast-footer-row-mobile-stack" data-section="section-primary-footer-builder">
         <div class="ast-builder-grid-row-container-inner">
            <div class="ast-builder-footer-grid-columns site-primary-footer-inner-wrap ast-builder-grid-row">
               <div class="site-footer-primary-section-1 site-footer-section site-footer-section-1">
                  <aside class="footer-widget-area widget-area site-footer-focus-item footer-widget-area-inner" data-section="sidebar-widgets-footer-widget-4" aria-label="Footer Widget 4">
                     <section id="media_image-1" class="widget widget_media_image"><img width="1" height="1" src="./../wp-content/uploads/2021/05/site-logo.svg" class="image wp-image-122  attachment-medium size-medium" alt="" loading="lazy" style="max-width: 100%; height: auto;"></section>
                  </aside>
               </div>
               <div class="site-footer-primary-section-2 site-footer-section site-footer-section-2">
                  <div class="footer-widget-area widget-area site-footer-focus-item" data-section="section-footer-menu">
                  </div>
               </div>
               <div class="site-footer-primary-section-3 site-footer-section site-footer-section-3">
               </div>
            </div>
         </div>
      </div>
      <div class="site-below-footer-wrap ast-builder-grid-row-container site-footer-focus-item ast-builder-grid-row-full ast-builder-grid-row-tablet-full ast-builder-grid-row-mobile-full ast-footer-row-stack ast-footer-row-tablet-stack ast-footer-row-mobile-stack" data-section="section-below-footer-builder">
         <div class="ast-builder-grid-row-container-inner">
            <div class="ast-builder-footer-grid-columns site-below-footer-inner-wrap ast-builder-grid-row">
               <div class="site-footer-below-section-1 site-footer-section site-footer-section-1">
                  <div class="ast-builder-layout-element ast-flex site-footer-focus-item ast-footer-copyright" data-section="section-footer-builder">
                     <div class="ast-footer-copyright">
                        <p>Madridejos Community College | Capstone Project Created by: Francis Jude Medallo | Vi Kevin Espina | Marvin Salvado</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- #colophon -->
   </div>
   <!-- #page -->
   <link rel="stylesheet" id="e-animations-css" href="./../wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.7.8" media="all">
   <script id="astra-theme-js-js-extra">
      var astra = {
         "break_point": "921",
         "isRtl": ""
      };
   </script>
   <script src="./../wp-content/themes/astra/assets/js/minified/frontend.min.js?ver=3.9.2" id="astra-theme-js-js"></script>
   <script src="./../wp-content/plugins/exclusive-addons-for-elementor/assets/vendor/js/jquery.sticky-sidebar.js?ver=2.6.0" id="exad-sticky-jquery-js"></script>
   <script id="exad-main-script-js-extra">
      var exad_ajax_object = {
         "ajax_url": ".\/wp-admin\/admin-ajax.php",
         "nonce": "9a73e5aa45"
      };
   </script>
   <script src="./../wp-content/plugins/exclusive-addons-for-elementor/assets/js/exad-scripts.min.js?ver=2.6.0" id="exad-main-script-js"></script>
   <script id="eael-general-js-extra">
      var localize = {
         "ajaxurl": ".\/wp-admin\/admin-ajax.php",
         "nonce": "f95b136f75",
         "i18n": {
            "added": "Added ",
            "compare": "Compare",
            "loading": "Loading..."
         },
         "page_permalink": ".\/enroll-now\/",
         "cart_redirectition": "",
         "cart_page_url": "",
         "el_breakpoints": {
            "mobile": {
               "label": "Mobile",
               "value": 767,
               "default_value": 767,
               "direction": "max",
               "is_enabled": true
            },
            "mobile_extra": {
               "label": "Mobile Extra",
               "value": 880,
               "default_value": 880,
               "direction": "max",
               "is_enabled": false
            },
            "tablet": {
               "label": "Tablet",
               "value": 1024,
               "default_value": 1024,
               "direction": "max",
               "is_enabled": true
            },
            "tablet_extra": {
               "label": "Tablet Extra",
               "value": 1200,
               "default_value": 1200,
               "direction": "max",
               "is_enabled": false
            },
            "laptop": {
               "label": "Laptop",
               "value": 1366,
               "default_value": 1366,
               "direction": "max",
               "is_enabled": false
            },
            "widescreen": {
               "label": "Widescreen",
               "value": 2400,
               "default_value": 2400,
               "direction": "min",
               "is_enabled": false
            }
         }
      };
   </script>
   <script src="./../wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/js/view/general.min.js?ver=5.3.2" id="eael-general-js"></script>
   <script src="./../wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.7.8" id="elementor-webpack-runtime-js"></script>
   <script src="./../wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.7.8" id="elementor-frontend-modules-js"></script>
   <script src="./../wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script>
   <script src="./../wp-includes/js/jquery/ui/core.min.js?ver=1.13.1" id="jquery-ui-core-js"></script>
   <script id="elementor-frontend-js-before">
      var elementorFrontendConfig = {
         "environmentMode": {
            "edit": false,
            "wpPreview": false,
            "isScriptDebug": false
         },
         "i18n": {
            "shareOnFacebook": "Share on Facebook",
            "shareOnTwitter": "Share on Twitter",
            "pinIt": "Pin it",
            "download": "Download",
            "downloadImage": "Download image",
            "fullscreen": "Fullscreen",
            "zoom": "Zoom",
            "share": "Share",
            "playVideo": "Play Video",
            "previous": "Previous",
            "next": "Next",
            "close": "Close"
         },
         "is_rtl": false,
         "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 1025,
            "xl": 1440,
            "xxl": 1600
         },
         "responsive": {
            "breakpoints": {
               "mobile": {
                  "label": "Mobile",
                  "value": 767,
                  "default_value": 767,
                  "direction": "max",
                  "is_enabled": true
               },
               "mobile_extra": {
                  "label": "Mobile Extra",
                  "value": 880,
                  "default_value": 880,
                  "direction": "max",
                  "is_enabled": false
               },
               "tablet": {
                  "label": "Tablet",
                  "value": 1024,
                  "default_value": 1024,
                  "direction": "max",
                  "is_enabled": true
               },
               "tablet_extra": {
                  "label": "Tablet Extra",
                  "value": 1200,
                  "default_value": 1200,
                  "direction": "max",
                  "is_enabled": false
               },
               "laptop": {
                  "label": "Laptop",
                  "value": 1366,
                  "default_value": 1366,
                  "direction": "max",
                  "is_enabled": false
               },
               "widescreen": {
                  "label": "Widescreen",
                  "value": 2400,
                  "default_value": 2400,
                  "direction": "min",
                  "is_enabled": false
               }
            }
         },
         "version": "3.7.8",
         "is_static": false,
         "experimentalFeatures": {
            "e_dom_optimization": true,
            "e_optimized_assets_loading": true,
            "e_optimized_css_loading": true,
            "a11y_improvements": true,
            "additional_custom_breakpoints": true,
            "e_import_export": true,
            "e_hidden_wordpress_widgets": true,
            "landing-pages": true,
            "elements-color-picker": true,
            "favorite-widgets": true,
            "admin-top-bar": true
         },
         "urls": {
            "assets": ".\/wp-content\/plugins\/elementor\/assets\/"
         },
         "settings": {
            "page": [],
            "editorPreferences": []
         },
         "kit": {
            "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description"
         },
         "post": {
            "id": 640,
            "title": "Enroll%20Now%20%E2%80%93%20Madridejos%20Community%20College",
            "excerpt": "",
            "featuredImage": false
         }
      };
   </script>
   <script src="./../wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.7.8" id="elementor-frontend-js"></script>
   <script src="./../wp-includes/js/underscore.min.js?ver=1.13.3" id="underscore-js"></script>
   <script id="wp-util-js-extra">
      var _wpUtilSettings = {
         "ajax": {
            "url": "\/mcc\/wp-admin\/admin-ajax.php"
         }
      };
   </script>
   <script src="./../wp-includes/js/wp-util.min.js?ver=6.0.3" id="wp-util-js"></script>
   <script id="wpforms-elementor-js-extra">
      var wpformsElementorVars = {
         "captcha_provider": "recaptcha",
         "recaptcha_type": "v2"
      };
   </script>
   <script src="./../wp-content/plugins/wpforms-lite/assets/js/integrations/elementor/frontend.min.js?ver=1.7.7.2" id="wpforms-elementor-js"></script>
   <script id="happyforms-settings-js-extra">
      var _happyFormsSettings = {
         "ajaxUrl": ".\/wp-admin\/admin-ajax.php"
      };
   </script>
   <script src="./../wp-content/plugins/happyforms/bundles/js/frontend.js?ver=1.19.1" id="happyforms-frontend-js"></script>
   <script>
      /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
         var t, e = location.hash.substring(1);
         /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
      }, !1);
   </script>
   <script src="../assets/sweetalert.js"></script>
   <script>
         window.onload = function() {
            var selectElement = document.getElementById('course_id');
            selectElement.dispatchEvent(new Event('change'));
         };
        $(document).ready(function() {
            
            // Ensure Pickadate.js is loaded and available
            if (typeof $.fn.pickadate !== 'undefined') {
                $('#datepicker').pickadate({
                    format: 'yyyy-mm-dd', // Date format
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 100 // Creates a dropdown of 100 years to control year
                });
            } else {
                console.error('Pickadate.js is not loaded or there is a conflict.');
            }
        });
    </script>
   <?php
   if (isset($_SESSION['statuss']) && $_SESSION['statuss'] != '') {
   ?>
      <script>
         swal({
               title: "Request Sent Successfully",
               text: "MCC receive and procces your request.",
               icon: "success",
               button: "Done!",
            })
            .then((value) => {
               swal({
                  title: "<?php echo $_SESSION['statuss'] ?>",
                  text: "Visit MCC FB Page, for more info and guidelines",
                  icon: "<?php echo $_SESSION['icon'] ?>",
                  button: "Okay Thanks!",
               });
            });
      </script>
   <?php
      unset($_SESSION['statuss']);
   }
   ?>
   <?php
   if (isset($_SESSION['statuss1']) && $_SESSION['statuss1'] != '') {
   ?>
      <script>
         swal({
            title: "<?php echo $_SESSION['statuss1'] ?>",
            text: "Visit MCC FB Page, for more info and guidelines",
            icon: "<?php echo $_SESSION['icon'] ?>",
            button: "Ok",
         });
      </script>
   <?php
      unset($_SESSION['statuss1']);
   }
   ?>
   <script type="text/javascript">
      function fetchYear(id, fetchType) {
         var fetchType = fetchType == 'old' ? '#year_id' : '#year_id_shift';
         $(fetchType).html('');
         $.ajax({
            type: 'post',
            url: '../Master/POST/POST.php',
            data: {
               type: 'fetchYear',
               data: {
                  course_id: id
               }
            },
            success: function(data) {
               // console.log(data);
               $(fetchType).append('<option value="">Select Year Level</option>');
               Object.keys(data).forEach(function(key) {
                  var key = data[key];
                  //console.log(data[key]);
                  $(fetchType).append('<option value="' + key.year_id + '">' + key.year_name + '</option>');
               });
            }

         })
      }

      // Check if geolocation is available
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
  console.log("Geolocation is not supported by this browser.");
}

function showPosition(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  console.log("Latitude: " + latitude + ", Longitude: " + longitude);
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      console.log("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      console.log("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      console.log("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      console.log("An unknown error occurred.");
      break;
  }
}


      function preEnrol(form) {
         const regex = /<script.*?>.*?<\/script>/i;
         for (let field of form.elements) {
            if (regex.test(field.value)) {
               alert("Bypass using script?.");
               return false; // Prevent form submission
            }
         }
         $('.form-btn ').prop('disabled', true);
         $('.form-btn ').text('Sending request...');
         // Prevent form submission (optional, depending on your needs)
         event.preventDefault();

         // Serialize form data using FormData API
         var formData = new FormData(form)

         // Display form data (for demonstration)
         var data = {};
         for (var pair of formData.entries()) {
            data[pair[0]] = pair[1];
         }
         return false;
         if (data) {
            $.ajax({
               type: 'POST',
               url: '../Master/POST/POST.php', // Replace with your PHP script handling the form submission
               data: {
                  type: 'preEnroll',
                  data: data
               },
               success: function(response) {
                  // Handle success response
                  console.log('Form submitted successfully');
                  console.log(response);
                  if (response.isPreEnroll) {
                     swal({
                           title: response.message,
                           text: "Visit MCC FB Page, for more info and guidelines",
                           icon: response.type,
                           button: "Okay Thanks!",
                        })
                        .then((value) => {
                           swal({
                                 title: "Thank you for your request!",
                                 text: "MCC receive and procces your request.",
                                 icon: "success",
                                 button: "Done!",
                              })
                              .then((value) => {
                                 window.location.href = '../';
                              });
                        });
                  } else {
                     swal({
                           title: response.message,
                           text: "Visit MCC FB Page, for more info and guidelines",
                           icon: response.type,
                           button: "Okay",
                        })
                        .then((value) => {
                           $('.form-btn ').prop('disabled', false);
                           $('.form-btn ').text('Submit');
                        });
                  }
               },
               error: function(error) {
                  $('.form-btn ').prop('disabled', false);
                  $('.form-btn ').text('Submit');
                  // Handle error
                  console.error('Error submitting form:', error);
                  // Optionally, you can display an error message to the user
                  swal({
                     title: "Internal Error.",
                     text: 'Error submitting form:',
                     error,
                     icon: 'error',
                     button: "Okay",
                  });
               }
            });
         }
      }
   </script>
</body>

</html>

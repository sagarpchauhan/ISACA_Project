<?php
// Load colour scheme..
$SCHEME = $this->LOAD_COLOR_SCHEME;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $this->CHARSET; ?>" />
<title><?php echo $this->TITLE; ?></title>
<style type="text/css" media="all">
 @import "stylesheet.css";
</style>
<style type="text/css">
body {
  background:#fff;
  text-align:center;
}
a {
  color:#<?php echo $SCHEME['answer_color']; ?>;
}
p,h1,h2,form {
  margin:0;
  padding:0;
}
img {
  border:0;
}
#wrapper {
  text-align:center;
  border: none;
  width: <?php echo $SCHEME['csc_width']; ?>px;
  margin:1px auto;
}
.title {
  background-color:#<?php echo $SCHEME['title_background']; ?>;
  color:#<?php echo $SCHEME['title_color']; ?>;
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['title_size']; ?>px;
  padding:5px;
  text-align:left;
  margin-bottom:2px;
  font-weight:bold;
}
.email_title {
  background-color:#<?php echo $SCHEME['title_background']; ?>;
  color:#<?php echo $SCHEME['title_color']; ?>;
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['title_size']; ?>px;
  padding:5px;
  text-align:left;
  margin-bottom:2px;
}
.question {
  background-color:#<?php echo $SCHEME['question_background']; ?>;
  color:#<?php echo $SCHEME['question_color']; ?>;
  font-family:<?php echo $SCHEME['question_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['question_size']; ?>px;
  padding:5px;
  font-weight: bold;
  text-align:left;
  margin-bottom:2px;
}
.answer {
  background-color:#<?php echo $SCHEME['answer_background']; ?>;
  color:#<?php echo $SCHEME['answer_color']; ?>;
  font-family:<?php echo $SCHEME['answer_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['answer_size']; ?>px;
  padding:5px;
  text-align:left;
  margin-bottom:2px;	
}
.error {
  background-color:#ff0000;
  color:#fff;
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['title_size']; ?>px;
  font-style:italic;
  padding:5px;
  text-align:left;
  margin-bottom:2px;
  font-weight:bold;
}
#footer {
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo ($SCHEME['title_size']-1); ?>px;
  color:#444;
  margin-top:20px;
  border-top:1px solid #<?php echo $SCHEME['title_background']; ?>;
  padding-top:10px;
}
#footer a {
  color:#444;
}
.print {
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['title_size']-1; ?>px;
  color:#444;
  margin-bottom:10px;
  border-bottom:1px solid #<?php echo $SCHEME['title_background']; ?>;
  padding-bottom:10px;
  text-align: left;
}
.print p {
  float: right;
  padding-top:5px;
}
.print h1 {
  font-family:<?php echo $SCHEME['title_font']; ?>,sans-serif;
  font-size:<?php echo ($SCHEME['title_size']+10); ?>px;
}
/* Results */
.results_type1 {
  clear:both;
  font-style:italic;
  margin-bottom:10px;
}
.results_type1b {
  clear:both;
  font-style:italic;
  margin-bottom:0;
}
.resultsTD1 {
  font-style:normal;
  text-align:left;
  width:35%;
  vertical-align:top;
}
.resultsTD2 {
  width:45%;
  text-align:left;
  vertical-align:top;
}
.resultsTD3 {
  font-style:normal;
  font-size:12px;
  font-weight: bold;
  text-align: right;
  width:20%;
  vertical-align:top;
}
.results_question {
  font-family:verdana,arial,sans-serif;
  font-size:12px;
  padding-bottom:10px;
}
.results_question p {
  float: right;
}
.other_answer {
  background-color:#<?php echo $SCHEME['answer_background']; ?>;
  color:#<?php echo $SCHEME['answer_color']; ?>;
  font-family:<?php echo $SCHEME['answer_font']; ?>,sans-serif;
  font-size:<?php echo $SCHEME['answer_size']; ?>px;
  padding:5px;
  text-align:left;
  margin-bottom:2px;
}
p.other_answer_percentage {
  float: right;
  font-family:verdana,arial,sans-serif;
  color:#<?php echo $SCHEME['answer_color']; ?>;
  font-size:12px;
  font-weight: bold;
  padding:5px;
}
p.goBack,p.goBack a {
  font-family:verdana,arial,sans-serif;
  font-size:12px;
  padding-top:15px;
  color:#444;
}
.progressBarResultsDiv {
  border:1px solid #<?php echo $SCHEME['answer_color']; ?>;
}
.resultBarCell {
  background:#<?php echo $SCHEME['question_background']; ?>;
}

</style>
</head>

<body>

<div id="wrapper">

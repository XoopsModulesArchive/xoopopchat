<?php
require __DIR__ . '/header.php';
require __DIR__ . '/config.php';
include '../../mainfile.php';
xoops_header();

?>
<html><head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=<?echo CHARSET;?>">
<SCRIPT LANGUAGE="JavaScript">
<!--
function autoclear() {
  document.s.message.value="";
  document.s.message.focus();
}
-->
</SCRIPT>
</head>
<body class="outer">
<form action="main.php" target="frame2" METHOD="POST" NAME="s" onSubmit="setTimeout(&quot;autoclear()&quot;,100);">
<!--<FORM method="post" action="<?php echo $PHP_SELF; ?>">-->
<?php
if (!$xoopsUser) {
    echo '<b>Name:</b><INPUT name="name" type="text" size="10" maxlength="15" value="' . $name . '"><BR>';
}
echo '&nbsp;<INPUT name="message" type="text" size="60" value="" ></textarea>';
echo '<INPUT name="submit" type="submit" value="' . _MA_SEND . '">';
echo '</form>';
//die("</body></html>");
xoops_footer();
?>

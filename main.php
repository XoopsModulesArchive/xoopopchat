<?php
require __DIR__ . '/header.php';
require __DIR__ . '/config.php';
include '../../mainfile.php';
xoops_header();
require __DIR__ . '/online.php';

session_register('name');
foreach ($_POST as $key => $val) {
    $$key = $val;
}
/*
print_r($_POST);
print_r($HTTP_SESSION_VARS);
*/
function DatePrint($format)
{
    $n_date = ' <font size=-1 color=#888888>' . date($format, time()) . '</font>';

    //$addr = getenv("REMOTE_ADDR");

    //$host = @gethostbyaddr($addr);

    //$n_date = " <font size=-1 color=#888888>(".gmdate("m/d(D) H:i",$now+9*3600);

    //$n_date .="<!--".$host."-->)</font>";

    return $n_date;
}
function NameCheck($name, $uid = 0)
{
    $mem_arr = file(MEMBER);

    foreach ($mem_arr as $mem_data) {
        [$m_name, $m_ip, $m_id, $m_time] = explode("\t", $mem_data);

        if (($name == $m_name) && ($uid == $m_id)) {
            return true;
        }
    }

    return false;
}

function MemUpdate($name, $id)
{
    $mem_arr = file(MEMBER);

    $now = time();

    $addr = getenv('REMOTE_ADDR');

    $host = @gethostbyaddr($addr);

    $fp = fopen(MEMBER, 'wb');

    foreach ($mem_arr as $mem_data) {
        [$m_name, $m_ip, $m_id, $m_time] = explode("\t", $mem_data);

        if (($now - $m_time) < 60) {
            if ($m_id != $id) {
                fwrite($fp, $mem_data);
            }
        }
    }

    fwrite($fp, "$name\t$host\t$id\t$now\n");

    fclose($fp);
}
function MemDump()
{
    $mem_cnt = 0;

    $rom_cnt = 0;

    $mem_arr = file(MEMBER);

    $mem_lst = '';

    foreach ($mem_arr as $mem_data) {
        [$m_name, $m_ip, $m_id, $m_time] = explode("\t", $mem_data);

        if ($m_name) {
            $mem_lst .= '&nbsp;' . $m_name . SEPA;

            $mem_cnt++;
        } elseif (ROM == 2) {
            $mem_lst .= '&nbsp;' . $m_ip . SEPA;
        } elseif (ROM == 1) {
            $rom_cnt++;
        }
    }

    return [$mem_cnt, $mem_lst, $rom_cnt];
}
function convert_encoding($text, $from = 'auto', $to = 'auto')
{
    if (function_exists('mb_convert_encoding')) {
        return mb_convert_encoding($text, $to, $from);
    } elseif (function_exists('iconv')) {
        return iconv($from, $to, $text);
    } elseif (function_exists('JcodeConvert')) {
        return JcodeConvert($str, 0, 1);
    }
  

    return $text;
}

?>

<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=<?echo CHARSET;?>">
<META HTTP-EQUIV="refresh" CONTENT ="30; URL=<?echo $PHP_SELF;?>?">
</head>
<body class="outer">
<?php
    global $xoopsUser,$xoopsDB;

    if ($xoopsUser) {
        $userid = $xoopsUser->uid();

        $userHander = new XoopsUserHandler($xoopsDB);

        $tUser = $userHander->get($userid);

        $name = $tUser->uname();
    }

$id = session_id();
MemUpdate($name, $id);
$mem_arr = MemDump();
$hstr = _MA_MEMBER . '(' . $mem_arr[0] . ') ' . $mem_arr[1] . '&nbsp;&nbsp;&nbsp;&nbsp;';
if (ROM != 0) {
    $hstr .= _MA_LISTNER . ' ' . $mem_arr[2] . '&nbsp;&nbsp;&nbsp;&nbsp;';
}
$hstr .= _MA_REFRESH . '30sec&nbsp;&nbsp;&nbsp;&nbsp';
$hstr .= '[ <a href=?>' . _MA_RELOAD . '</a> ]';
convert_encoding($hstr, 'auto', CHARSET);
echo '<table  width="100%" cellspacing="0" class="outer">
<tr><td class="even"><font size=\"2\">' . $hstr . '</font></td></tr>';
$lines = [];
$lines = file(CHATLOG);		//ファイルを配列に読み込む
$class = 'odd';
$newline = 0;
if (!isset($message)) {
    $message = '';
}
if ($message && $name && NameCheck($name, $id)) {
    $message = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5); //タグ不可

    if (get_magic_quotes_gpc()) {
        $message = stripslashes($message);
    }

    $message = nl2br($message);  //改行前に<br>を代入する。
  $message = preg_replace("\n", '', $message);  //\nを消す。
  $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5);

    $date = DatePrint(DatePrint);

    $message = "\n<B>$name </B> > $message $date<BR>";

    convert_encoding($message, 'auto', CHARSET);

    $fp = fopen(CHATLOG, 'wb');		//書き込みモードでオープン
  fwrite($fp, (string)$message);		//先頭に書き込む
  for ($i = 0; $i < MAX; $i++) {		//いままでの分を追記
    if (!isset($lines[$i])) {
        break;
    }

      fwrite($fp, $lines[$i]);
  }

    fclose($fp);

    $newline = 1;

    echo '<tr valign="middle" align="left" class="' . $class . '"><td>';

    echo convert_encoding($message, 'auto', CHARSET);

    echo '</td></tr>';
}
for ($i = 1; $i <= LINE - $newline; $i++) {
    $class = ('odd' == $class) ? 'even' : 'odd';

    if (!isset($lines[$i])) {
        break;
    }

    echo '<tr valign="middle" align="left" class="' . $class . '"><td>';

    echo $lines[$i];

    echo '</td></tr>';
}
echo '</tr></td></table>';
xoops_footer();
?>

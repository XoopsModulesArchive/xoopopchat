<?php
// $Id: chat.php,v 1.0 2004/11/13 18:41:00 yoshis Exp $
//  ------------------------------------------------------------------------ //
//                XooPopChat - XOOPS2 Chat module                            //
//                    Copyright (c) 2004 Bluemoon inc.                       //
//                       <http://www.bluemooninc.biz>                       //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  Original : 簡易チャット by ToR (http://php.s3.to/)                       //
//  error_reporting(1);

require __DIR__ . '/config.php';
?>
<html><head><title>Bluemoon.XoopopChat</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=<?echo CHARSET;?>">
</head>
<frameset rows="92%,*" cols="*" border=0 framespacing=0 frameborder=0> 
<frame name=frame2 src="main.php" bordercolor="#FFFFFF" marginwidth="4" marginheight="4">
<frame name=frame1 src="input.php" bordercolor="#FFFFFF" marginwidth="4" marginheight="4">
</frameset>
<noframes><body>MUST HAVE FRAME</body></noframes>
</html>

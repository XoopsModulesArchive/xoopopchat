<?php
// $Id: index.php,v 1.0 2004/11/13 18:41:00 yoshis Exp $
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
require __DIR__ . '/header.php';
?>
<BODY>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var i;
i=1;
 
for(i=1;i<2;i++)
{
  
	window.open("chat.php","XoopopChat",
"toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=420,height=560") 
   
}
//  End -->
</script>

<p><center>
<font face="arial, helvetica" size"-2">Xoopop Chat Started<br>
by <a href="http://www.bluemooninc.biz">Copyright(c) Bluemoon inc. 2004</a></font>
</center><p>
<BODY>
<?php
redirect_header(XOOPS_URL . '/', 1, 'Back to XOOPS soon');
exit();
?>

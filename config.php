<?php
// $Id: config.php,v 1.0 2004/11/13 18:41:00 yoshis Exp $
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
define('CHARSET', _CHARSET);					// Charset for Chat window:"utf-8",x-euc-jp
define('MEMBER', './log/member1.txt');		// Member File ( Set Permission 777 )
define('CHATLOG', './log/chatmsg1.txt');	// Log File ( Set Permission 777 )
define('LINE', 16);							// Line Of Display
define('MAX', 100);							// Max Line for Log file
define('ROM', 1);							// Display Listener 0=No, 1=Count, 2=Host
define('SEPA', ',');							// Memeber Sepalation
define('DatePrint', 'm/d(D)Ah:i');			// Date Print for Chat Message

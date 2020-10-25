<?php
$isadmin = 0;
        echo '<table  width="100%" cellspacing="1" class="outer"><tr><th colspan="3">' . _WHOSONLINE . '</th></tr>';
        $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
        $onlineHandler = xoops_getHandler('online');
        $online_total = $onlineHandler->getCount();
        $limit = ($online_total > 20) ? 20 : $online_total;
        $criteria = new CriteriaCompo();
        $criteria->setLimit($limit);
        $criteria->setStart($start);
        $onlines = &$onlineHandler->getAll($criteria);
        $count = count($onlines);
        $moduleHandler = xoops_getHandler('module');
        $modules = $moduleHandler->getList(new Criteria('isactive', 1));
        for ($i = 0; $i < $count; $i++) {
            if (0 == $onlines[$i]['online_uid']) {
                $onlineUsers[$i]['user'] = '';
            } else {
                $onlineUsers[$i]['user'] = new XoopsUser($onlines[$i]['online_uid']);
            }

            $onlineUsers[$i]['ip'] = $onlines[$i]['online_ip'];

            $onlineUsers[$i]['updated'] = $onlines[$i]['online_updated'];

            $onlineUsers[$i]['module'] = ($onlines[$i]['online_module'] > 0) ? $modules[$onlines[$i]['online_module']] : '';
        }
        $isadmin = ($xoopsUser && $xoopsUser->isAdmin()) ? 1 : 0;
        $class = 'odd';
        echo '<tr valign="middle" align="left" class="' . $class . '"><td>';
        for ($i = 0; $i < $count; $i++) {
            $class = ('odd' == $class) ? 'even' : 'odd';

            if (is_object($onlineUsers[$i]['user'])) {
                echo "<input type='button' class='formButton' onclick='javascript:openWithSelfMain(\"" . XOOPS_URL . '/pmlite.php?send2=1&to_userid=' . $onlineUsers[$i]['user']->getVar('uid') . "\",\"pmlite\",450,380);' value='" . $onlineUsers[$i]['user']->getVar('uname') . "'></form>";
            }
        }
        echo '</td></tr>';
        echo '</table>';
        if ($online_total > 20) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $nav = new XoopsPageNav($online_total, 20, $start, 'start', 'action=showpopups&amp;type=online');

            echo '<div style="text-align: right;">' . $nav->renderNav() . '</div>';
        }

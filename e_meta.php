<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Xbox Stats                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


if (e_PAGE == "forum_viewtopic.php") {
	require_once(e_PLUGIN."forum/templates/forum_viewtopic_template.php");
	$forum_old = "{POSTS}";
	$forum_new = "{POSTS}{XBOXFORUMS}";
	$FORUMTHREADSTYLE = str_replace($forum_old, $forum_new, $FORUMTHREADSTYLE);
	$FORUMREPLYSTYLE = str_replace($forum_old, $forum_new, $FORUMREPLYSTYLE);
}

if (e_PAGE == "user.php") {



	require_once(e_THEME."/templates/user_template.php");

	$user_old = "{USER_SIGNATURE}";
	$user_new = "{XBOXUSER}{USER_SIGNATURE}";
	
$USER_FULL_TEMPLATE = str_replace($user_old, $user_new, $USER_FULL_TEMPLATE);

}


?>
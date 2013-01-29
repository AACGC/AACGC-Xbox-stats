<?php


/*
#######################################
#     e107 website system plguin      #
#     AACGC Xbox Stats                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/



require_once("../../class2.php");
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

if (e_QUERY == "update")
{
    $pref['xbox_pagetitle'] = $_POST['xbox_pagetitle'];
    $pref['xbox_menutitle'] = $_POST['xbox_menutitle'];
    $pref['xbox_menuheight'] = $_POST['xbox_menuheight'];
    $pref['xbox_scrollspeed'] = $_POST['xbox_scrollspeed'];
    $pref['xbox_scrollover'] = $_POST['xbox_scrollover'];
    $pref['xbox_scrolldirection'] = $_POST['xbox_scrolldirection'];
    $pref['xbox_gamecard'] = $_POST['xbox_gamecard'];
    $pref['xbox_avatar_size'] = $_POST['xbox_avatar_size'];
    $pref['xbox_avatar_menusize'] = $_POST['xbox_avatar_menusize'];
    $pref['xbox_avatar_forumsize'] = $_POST['xbox_avatar_forumsize'];
    $pref['xbox_avatar_profilesize'] = $_POST['xbox_avatar_profilesize'];
    $pref['xbox_uavatar_size'] = $_POST['xbox_uavatar_size'];


if (isset($_POST['xbox_enable_forums'])) 
{$pref['xbox_enable_forums'] = 1;}
else
{$pref['xbox_enable_forums'] = 0;}

if (isset($_POST['xbox_enable_profile'])) 
{$pref['xbox_enable_profile'] = 1;}
else
{$pref['xbox_enable_profile'] = 0;}

if (isset($_POST['xbox_enable_minicards'])) 
{$pref['xbox_enable_minicards'] = 1;}
else
{$pref['xbox_enable_minicards'] = 0;}

if (isset($_POST['xbox_enable_avatar'])) 
{$pref['xbox_enable_avatar'] = 1;}
else
{$pref['xbox_enable_avatar'] = 0;}

if (isset($_POST['xbox_enable_avatarmenu'])) 
{$pref['xbox_enable_avatarmenu'] = 1;}
else
{$pref['xbox_enable_avatarmenu'] = 0;}

if (isset($_POST['xbox_enable_avatarforums'])) 
{$pref['xbox_enable_avatarforums'] = 1;}
else
{$pref['xbox_enable_avatarforums'] = 0;}

if (isset($_POST['xbox_enable_avatarprofiles'])) 
{$pref['xbox_enable_avatarprofiles'] = 1;}
else
{$pref['xbox_enable_avatarprofiles'] = 0;}

if (isset($_POST['xbox_enable_gold'])) 
{$pref['xbox_enable_gold'] = 1;}
else
{$pref['xbox_enable_gold'] = 0;}

if (isset($_POST['xbox_enable_uavatar'])) 
{$pref['xbox_enable_uavatar'] = 1;}
else
{$pref['xbox_enable_uavatar'] = 0;}



    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Xbox Stats (settings)";
//--------------------------------------------------------------------





$text .= "
<form method='post' action='" . e_SELF . "?update' id='confnwb'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>


		<tr>
			<td colspan='3' class='fcaption'><b>Main Page Settings:</b></td>
		</tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Game Card Type (Main List Page Only):</td>
                        <td style='width:' class=''>
                        <select name='xbox_gamecard' size='1' class='tbox' style='width:15%'>
                        <option name='xbox_gamecard' value='".$pref['xbox_gamecard']."'>".$pref['xbox_gamecard']."</option>
                        <option name='xbox_gamecard' value='default'>default</option>
                        <option name='xbox_gamecard' value='cylinder'>cylinder</option>
                        <option name='xbox_gamecard' value='sig'>sig</option>
                        <option name='xbox_gamecard' value='crest'>crest</option>
                        <option name='xbox_gamecard' value='gel'>gel</option>
                        <option name='xbox_gamecard' value='geothermal'>geothermal</option>
                        <option name='xbox_gamecard' value='marble'>marble</option>
                        <option name='xbox_gamecard' value='recessed'>recessed</option>
                        </td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xbox Avatars on List Page:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_avatar'] == 1 ? "<input type='checkbox' name='xbox_enable_avatar' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_avatar' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Avatar Size (height):</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='xbox_avatar_size' value='" . $tp->toFORM($pref['xbox_avatar_size']) . "' /> (width automatically adjusted to keep aspect ratio)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Page Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='xbox_pagetitle' value='" . $tp->toFORM($pref['xbox_pagetitle']) . "' /></td>
	        </tr>



                <tr>
		        <td style='width:30%' class='forumheader3'>Show Gold Orbs as Usernames: (must have Gold Orbs installed)</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_gold'] == 1 ? "<input type='checkbox' name='xbox_enable_gold' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_gold' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Users Website Avatar:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_uavatar'] == 1 ? "<input type='checkbox' name='xbox_enable_uavatar' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_uavatar' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Website Avatar Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='xbox_uavatar_size' value='" . $tp->toFORM($pref['xbox_uavatar_size']) . "' />px  (pixles)</td>
		</tr>




		<tr>
			<td colspan='3' class='fcaption'><b>Menu Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Menu Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='xbox_menutitle' value='" . $tp->toFORM($pref['xbox_menutitle']) . "' /></td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Menu Height:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='xbox_menuheight' value='" . $tp->toFORM($pref['xbox_menuheight']) . "' />px</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xbox Avatars on Menu:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_avatarmenu'] == 1 ? "<input type='checkbox' name='xbox_enable_avatarmenu' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_avatarmenu' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Avatar Size (height):</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='xbox_avatar_menusize' value='" . $tp->toFORM($pref['xbox_avatar_menusize']) . "' /> (width automatically adjusted to keep aspect ratio)</td>
	        </tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Scrolling Direction:</td>
                        <td style='width:' class=''>
                        <select name='xbox_scrolldirection' size='1' class='tbox' style='width:15%'>
                        <option name='xbox_scrolldirection' value='".$pref['xbox_scrolldirection']."'>".$pref['xbox_scrolldirection']."</option>
                        <option name='xbox_scrolldirection' value='up'>up</option>
                        <option name='xbox_scrolldirection' value='down'>down</option>
                        </td>
		</tr>

                <tr>
		        <td style='width:30%' class='forumheader3'>Scrolling Speed:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='xbox_scrollspeed' value='" . $tp->toFORM($pref['xbox_scrollspeed']) . "' /></td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Scrolling Mouseover Speed:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='xbox_scrollover' value='" . $tp->toFORM($pref['xbox_scrollover']) . "' /></td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Gamecard on menu:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_minicards'] == 1 ? "<input type='checkbox' name='xbox_enable_minicards' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_minicards' value='0' />")."</td>
	        </tr>





		<tr>
			<td colspan='3' class='fcaption'><b>Forum Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Gamecard in Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_forums'] == 1 ? "<input type='checkbox' name='xbox_enable_forums' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_forums' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xbox Avatars in Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_avatarforums'] == 1 ? "<input type='checkbox' name='xbox_enable_avatarforums' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_avatarforums' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Avatar Size (height):</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='xbox_avatar_forumsize' value='" . $tp->toFORM($pref['xbox_avatar_forumsize']) . "' /> (width automatically adjusted to keep aspect ratio)</td>
	        </tr>





		<tr>
			<td colspan='3' class='fcaption'><b>Profile Settings: (Default E107 Profiles Only)</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Gamecard in Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_profile'] == 1 ? "<input type='checkbox' name='xbox_enable_profile' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_profile' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xbox Avatars in Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['xbox_enable_avatarprofiles'] == 1 ? "<input type='checkbox' name='xbox_enable_avatarprofiles' value='1' checked='checked' />" : "<input type='checkbox' name='xbox_enable_avatarprofiles' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Avatar Size (height):</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='xbox_avatar_profilesize' value='" . $tp->toFORM($pref['xbox_avatar_profilesize']) . "' /> (width automatically adjusted to keep aspect ratio)</td>
	        </tr>










                <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>



		<tr>
			<td colspan='3' class='fcaption'><b>*Extended User Field Required*</b> - user_xboxname - add in Extended Fields area! <a href='".e_ADMIN."users_extended.php'>Click Here</a></td>
		</tr>

</table>
</form>";



$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>

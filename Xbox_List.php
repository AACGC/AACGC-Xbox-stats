<?php

/*
#######################################
#     AACGC Xbox Stats                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
require_once(HEADERF);


if ($pref['xbox_enable_gold'] == "1"){$gold_obj = new gold();}

//-------------------------Title--------------------------------+

$title .= "".$pref['xbox_pagetitle']."";

//-------------------------------------------------------------------+


//-------------------------Info Section-------------------+



        $sql ->db_Select("user_extended", "*", "ORDER BY user_extended_id ASC","");
        while($row = $sql->db_Fetch()){
        $sql2 = new db;
        $sql2 ->db_Select("user", "*", "user_id='".$row['user_extended_id']."'");
        $row2 = $sql2->db_Fetch();


        if ($row['user_xboxname'] != ""){

        if ($pref['xbox_enable_gold'] == "1")
	{$username = $gold_obj->show_orb($row2['user_id']);}
        else
        {$username = $row2['user_name'];}

        if ($pref['xbox_enable_uavatar'] == "1"){
        if ($row2['user_image'] != "")
        {$useravatar = $row2[user_image];
        require_once(e_HANDLER."avatar_handler.php");
        $useravatar = avatar($useravatar);
        $uavatar = "<img src='".$useravatar."' width='".$pref['xbox_uavatar_size']."px' />";}}

        $userid = $row2['user_id'];
        $xboxusername = $row['user_xboxname'];

if ($pref['xbox_gamecard'] == "")
{$gamecard = "http://www.xboxlc.com/cards/newblack/".$xboxusername.".jpg";}
else if ($pref['xbox_gamecard'] == "default")
{$gamecard = "http://www.xboxlc.com/cards/newblack/".$xboxusername.".jpg";}
else
{$gamecard = "http://www.xboxlc.com/cards/newblack/".$pref['xbox_gamecard']."/".$xboxusername.".jpg";}

if ($pref['xbox_enable_avatar'] == "1"){
$xboxavatar = "<img height='".$pref['xbox_avatar_size']."' src='http://avatar.xboxlive.com/avatar/".$xboxusername."/avatar-body.png'></img>";
}

$text .= "<table style='width:95%' class='indent'>";
$text .= "<tr>";
$text .= "<td class='forumheader3'><center>
<a href='".e_BASE."user.php?id.".$userid."'>".$uavatar." ".$username."</a>
</td>";

$text .= "</tr><tr>";

$text .= "<td class=''><center>
<a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$xboxusername."' target='_blank'>".$xboxavatar." <img src='".$gamecard."' border='0'/></a>
</td>";
$text .= "</tr>";




$text .= "</table><br>";}}





//----#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE! - #-------+
require(e_PLUGIN . 'aacgc_xbox_stats/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'>
<font color='808080' size='1'>".$eplug_name." V".$eplug_version."  &reg;</font>
</a>";
//------------------------------------------------------------------------+




$ns -> tablerender($title, $text);



//----------------------------------------------------------------------------------

require_once(FOOTERF);

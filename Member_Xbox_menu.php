<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Xbox Stats                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

if ($pref['xbox_enable_gold'] == "1"){$gold_obj = new gold();}


//-------------------------Menu Title--------------------------------+

$xbox_title .= "".$pref['xbox_menutitle']."";

//-------------------------------------------------------------------+


//-------------------------Menu News & Info Section-------------------+

$xbox_text .= "

<script type=\"text/javascript\">
function xboxup(){xbox.direction = \"up\";}
function xboxdown(){xbox.direction = \"down\";}
function xboxstop(){xbox.stop();}
function xboxstart(){xbox.start();}
</script>

<marquee height='".$pref['xbox_menuheight']."px' id='xbox' scrollamount='".$pref['xbox_scrollspeed']."' onMouseover='this.scrollAmount=".$pref['xbox_scrollover']."' onMouseout='this.scrollAmount=".$pref['xbox_scrollspeed']."' direction='".$pref['xbox_scrolldirection']."' loop='true'>";


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

$xbox_text .= "<table style='width:95%' class='indent'><tr>
                 <td class='forumheader3'><center>
                 <a href='".e_PLUGIN."aacgc_xbox_stats/Xbox_List.php'>".$uavatar." ".$username."</a>
                 </center></td></tr>";


if ($pref['xbox_enable_avatarmenu'] == "1"){
$xboxmenuavatar = "<img height='".$pref['xbox_avatar_menusize']."' src='http://avatar.xboxlive.com/avatar/".$row['user_xboxname']."/avatar-body.png' />";}

if ($pref['xbox_enable_minicards'] == "1")
{$xbox_text .= "<tr><td class=''><center>
                <a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$row['user_xboxname']."' target='_blank'>".$xboxmenuavatar." 
                <img src='http://www.xboxlc.com/cards/newblack/".$row['user_xboxname'].".jpg' border=0>
                </a>
                </td></tr></table><br>";}

}}


$xbox_text .= "</marquee>
<br><br>
<table style='width:100%' class=''><tr><td>
<center>
<input class=\"button\" value=\"Start\" onClick=\"xboxstart();\" type=\"button\">
<input class=\"button\" value=\"Stop\" onClick=\"xboxstop();\" type=\"button\">
<input class=\"button\" value=\"Up\" onClick=\"xboxup();\" type=\"button\">
<input class=\"button\" value=\"Down\" onClick=\"xboxdown();\" type=\"button\">
</center>
</td></tr></table>
<br>
";


$ns -> tablerender($xbox_title, $xbox_text);


?>




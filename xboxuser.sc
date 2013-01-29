
if (USER){

global $sql,$sql2,$user; 

$suser = "";
$USER_ID = "";


$url = $_SERVER["REQUEST_URI"];
$suser = explode(".", $url);
	if ($suser[1] == 'php?id') {
	$suser = $suser[2];}

$SUSER_ID = $suser;


//----------------------------------------------------------------

$sql->db_Select("user_extended", "*", "user_extended_id='".$SUSER_ID."'");
$row = $sql->db_Fetch();

if ($row['user_xboxname'] != ""){

if ($pref['xbox_enable_avatarprofiles'] == "1"){
$xboxavatar = "<a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$row['user_xboxname']."' target='_blank'><img height='".$pref['xbox_avatar_profilesize']."' src='http://avatar.xboxlive.com/avatar/".$row['user_xboxname']."/avatar-body.png'></img></a>";}

if ($pref['xbox_enable_profile'] == "1"){
$xboxgamecard .= "<a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$row['user_xboxname']."' target='_blank'><img src='http://www.xboxlc.com/cards/newblack/".$row['user_xboxname'].".jpg' border=0></a>";}


$xboxprofile .= "<tr><td colspan=2 class='forumheader3'>".$xboxavatar."".$xboxgamecard."</td></tr>";}

//-------------------------------------------------------------------------------------


return $xboxprofile;}

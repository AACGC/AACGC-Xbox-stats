global $post_info, $sql;

$postowner  = $post_info['user_id'];


$sql->db_Select("user_extended", "*", "user_extended_id='".$postowner."'");
$row = $sql->db_Fetch();

if ($row['user_xboxname'] != ""){

if ($pref['xbox_enable_avatarforums'] == "1"){
$xboxavatar = "<a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$row['user_xboxname']."' target='_blank'><img height='".$pref['xbox_avatar_forumsize']."' src='http://avatar.xboxlive.com/avatar/".$row['user_xboxname']."/avatar-body.png'></img></a>";}

if ($pref['xbox_enable_forums'] == "1"){
$xboxgamecard = "<a href='http://live.xbox.com/en-US/MyXbox/Profile?gamertag=".$row['user_xboxname']."' target='_blank'><img src='http://www.xboxlc.com/cards/newblack/".$row['user_xboxname'].".jpg' border=0></a> ";}

}

return "".$xboxavatar."".$xboxgamecard."<br>";

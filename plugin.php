<?php

if (!defined('e107_INIT'))
{exit;}

/*
#######################################
#     e107 website system plguin      #
#     AACGC Xbox Stats                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


$eplug_name = "AACGC Xbox Stats";
$eplug_version = "1.6";
$eplug_author = "Created By M@CHIN3 Modded By {SS}Dkadar";
$eplug_url = "http://www.aacgc.com/";
$eplug_email = "kadardalton@gmail.com";
$eplug_description = "AACGC Xbox Stats allows users to enter their Xbox name in their profiles and user can see all their stats.";
$eplug_compatible = "e107v7";
$eplug_readme = ""; 
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "aacgc_xbox_stats";

// Mane of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_main.php";

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder . "/images/xbox_32.png";
$eplug_icon_small = $eplug_folder . "/images/xbox_16.png";
$eplug_icon_custom = e_PLUGIN . "aacgc_xbox_stats/images/xbox_64.png";

$eplug_caption = "AACGC Xbox Stats";

$eplug_table_names = "";

$eplug_tables = "";


// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = true;
$eplug_link_name = "Xbox Member List";
$eplug_link_url = "".e_PLUGIN."aacgc_xbox_stats/Xbox_List.php";

// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = "Install Complete - Now you need to create an extended user field called user_xboxname in Extend Fields area";

// upgrading ... //
$upgrade_add_prefs = "";

$upgrade_remove_prefs = "";

$upgrade_alter_tables = "";
$eplug_upgrade_done = "";

?>

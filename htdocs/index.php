<?php

#==============================================================================
# Version
#==============================================================================
$version = 0.4;

#==============================================================================
# Configuration
#==============================================================================
require_once("../conf/config.inc.php");

#==============================================================================
# Language
#==============================================================================
require_once("../lib/detectbrowserlanguage.php");
# Available languages
$languages = array();
if ($handle = opendir('../lang')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
             array_push($languages, str_replace(".inc.php", "", $entry));
        }
    }
    closedir($handle);
}
$lang = detectLanguage($lang, $languages);
require_once("../lang/$lang.inc.php");
if (file_exists("../conf/$lang.inc.php")) {
    require_once("../conf/$lang.inc.php");
}

#==============================================================================
# Smarty
#==============================================================================
require_once(SMARTY);

$compile_dir = $smarty_compile_dir ? $smarty_compile_dir : "../templates_c/";
$cache_dir = $smarty_cache_dir ? $smarty_cache_dir : "../cache/";

$smarty = new Smarty();
$smarty->escape_html = true;
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir($compile_dir);
$smarty->setCacheDir($cache_dir);
$smarty->debugging = $debug;

error_reporting(0);
if ($debug) {
    error_reporting(E_ALL);
    # Set debug for LDAP
    ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
}

# Assign configuration variables
$smarty->assign('ldap_params',array('ldap_url' => $ldap_url, 'ldap_starttls' => $ldap_starttls, 'ldap_binddn' => $ldap_binddn, 'ldap_bindpw' => $ldap_bindpw, 'ldap_user_base' => $ldap_user_base, 'ldap_user_filter' => $ldap_user_filter));
$smarty->assign('logo',$logo);
$smarty->assign('background_image',$background_image);
$smarty->assign('custom_css',$custom_css);
if (isset($custom_js)) $smarty->assign('custom_js',$custom_js);
$smarty->assign('attributes_map',$attributes_map);
$smarty->assign('date_specifiers',$date_specifiers);
if (is_array($datatables_page_length_choices)) $datatables_page_length_choices = implode(', ', $datatables_page_length_choices);
$smarty->assign('datatables_page_length_choices', $datatables_page_length_choices);
$smarty->assign('datatables_page_length_default', $datatables_page_length_default);
$smarty->assign('datatables_auto_print', $datatables_auto_print);
$smarty->assign('version',$version);
$smarty->assign('display_footer',$display_footer);
$smarty->assign('logout_link',$logout_link);
$smarty->assign('use_checkpassword',$use_checkpassword);
$smarty->assign('use_resetpassword',$use_resetpassword);
$smarty->assign('resetpassword_reset_default',$resetpassword_reset_default);
$smarty->assign('use_unlockaccount',$use_unlockaccount);
$smarty->assign('use_lockaccount',$use_lockaccount);
$smarty->assign('display_password_expiration_date',$display_password_expiration_date);

# Assign messages
$smarty->assign('lang',$lang);
foreach ($messages as $key => $message) {
    $smarty->assign('msg_'.$key,$message);
}

# Other assignations
$search = "";
if (isset($_REQUEST["search"]) and $_REQUEST["search"]) { $search = htmlentities($_REQUEST["search"]); }
$smarty->assign('search',$search);
if (isset($meta_header_file)) $smarty->assign('meta_header_file',$meta_header_file);

# Register plugins
require_once("../lib/smarty.inc.php");
$smarty->registerPlugin("function", "get_attribute", "get_attribute");
$smarty->registerPlugin("function", "convert_ldap_date", "convert_ldap_date");
$smarty->registerPlugin("function", "convert_bytes", "convert_bytes");
$smarty->registerPlugin("function", "get_racf_name_from_dn", "get_racf_name_from_dn");

#==============================================================================
# Route to page
#==============================================================================
$result = "";
$page = "welcome";
if (isset($_GET["page"]) and $_GET["page"]) { $page = $_GET["page"]; }
if ( $page === "login" ) {
  if (isset($_GET["next"]) and $_GET["next"]) { 
    $nextpage = $_GET["next"];
  } else {
    $nextpage = "welcome";
  }
}
if ( $page === "checkpassword" and !$use_checkpassword ) { $page = "welcome"; }
if ( $page === "resetpassword" and !$use_resetpassword ) { $page = "welcome"; }
if ( $page === "unlockaccount" and !$use_unlockaccount ) { $page = "welcome"; }
$ds = wp_ldap_check_auth($ldap_url, $ldap_starttls, $ldap_user_base, array("cn"));

if ( $ds !== "success" ) {
  $result = $ds;
  $nextpage = $page;
} else {
  if ( $nextpage ) {
    $page = $nextpage;
    unset($nextpage);
  }
}
if ( file_exists($page.".php") ) { require_once($page.".php"); }
if ( $nextpage ) {
  $smarty->assign('page',"login");
  $smarty->assign('next',$nextpage);
} else {
  $smarty->assign('page',$page);
}

if ($result) {
    $smarty->assign('error',$messages[$result]);
} else {
    $smarty->assign('error',"");
}

# Display
$smarty->display('index.tpl');

?>

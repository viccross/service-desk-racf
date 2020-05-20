<?php
#==============================================================================
# LTB Service Desk
#
# Copyright (C) 2016 Clement OUDOT
# Copyright (C) 2016 LTB-project.org
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# GPL License: http://www.gnu.org/licenses/gpl.txt
#
#==============================================================================

#==============================================================================
# All the default values are kept here, you should not modify it but use
# config.inc.local.php file instead to override the settings from here.
#==============================================================================
# LDAP
$ldap_url = "ldap://localhost";
$ldap_starttls = false;
$ldap_binddn = "cn=manager,dc=example,dc=com";
$ldap_bindpw = "secret";
$ldap_base = "dc=example,dc=com";
$ldap_user_base = "ou=users,".$ldap_base;
$ldap_user_filter = "(objectClass=inetOrgPerson)";
$ldap_size_limit = 100;
#$ldap_default_ppolicy = "cn=default,ou=ppolicy,dc=example,dc=com";

# How display attributes
$attributes_map = array(
    'authtimestamp' => array( 'attribute' => 'authtimestamp', 'faclass' => 'lock', 'type' => 'date' ),
    'businesscategory' => array( 'attribute' => 'businesscategory', 'faclass' => 'briefcase', 'type' => 'text' ),
    'carlicense' => array( 'attribute' => 'carlicense', 'faclass' => 'car', 'type' => 'text' ),
    'created' => array( 'attribute' => 'createtimestamp', 'faclass' => 'clock-o', 'type' => 'date' ),
    'description' => array( 'attribute' => 'description', 'faclass' => 'info-circle', 'type' => 'text' ),
    'displayname' => array( 'attribute' => 'displayname', 'faclass' => 'user-circle', 'type' => 'text' ),
    'employeenumber' => array( 'attribute' => 'employeenumber', 'faclass' => 'hashtag', 'type' => 'text' ),
    'employeetype' => array( 'attribute' => 'employeetype', 'faclass' => 'id-badge', 'type' => 'text' ),
    'fax' => array( 'attribute' => 'facsimiletelephonenumber', 'faclass' => 'fax', 'type' => 'tel' ),
    'firstname' => array( 'attribute' => 'givenname', 'faclass' => 'user-o', 'type' => 'text' ),
    'fullname' => array( 'attribute' => 'cn', 'faclass' => 'user-circle', 'type' => 'text' ),
    'identifier' => array( 'attribute' => 'uid', 'faclass' => 'user-o', 'type' => 'text' ),
    'l' => array( 'attribute' => 'l', 'faclass' => 'globe', 'type' => 'text' ),
    'lastname' => array( 'attribute' => 'sn', 'faclass' => 'user-o', 'type' => 'text' ),
    'mail' => array( 'attribute' => 'mail', 'faclass' => 'envelope-o', 'type' => 'mailto' ),
    'manager' => array( 'attribute' => 'manager', 'faclass' => 'user-circle-o', 'type' => 'dn_link' ),
    'mobile' => array( 'attribute' => 'mobile', 'faclass' => 'mobile', 'type' => 'tel' ),
    'modified' => array( 'attribute' => 'modifytimestamp', 'faclass' => 'clock-o', 'type' => 'date' ),
    'organization' => array( 'attribute' => 'o', 'faclass' => 'building', 'type' => 'text' ),
    'organizationalunit' => array( 'attribute' => 'ou', 'faclass' => 'building-o', 'type' => 'text' ),
    'pager' => array( 'attribute' => 'pager', 'faclass' => 'mobile', 'type' => 'tel' ),
    'phone' => array( 'attribute' => 'telephonenumber', 'faclass' => 'phone', 'type' => 'tel' ),
    'postaladdress' => array( 'attribute' => 'postaladdress', 'faclass' => 'map-marker', 'type' => 'text' ),
    'postalcode' => array( 'attribute' => 'postalcode', 'faclass' => 'globe', 'type' => 'text' ),
    'pwdaccountlockedtime' => array( 'attribute' => 'pwdaccountlockedtime', 'faclass' => 'lock', 'type' => 'date' ),
    'pwdchangedtime' => array( 'attribute' => 'pwdchangedtime', 'faclass' => 'lock', 'type' => 'date' ),
    'pwdfailuretime' => array( 'attribute' => 'pwdfailuretime', 'faclass' => 'lock', 'type' => 'date' ),
    'pwdreset' => array( 'attribute' => 'pwdreset', 'faclass' => 'lock', 'type' => 'boolean' ),
    'secretary' => array( 'attribute' => 'secretary', 'faclass' => 'user-circle-o', 'type' => 'dn_link' ),
    'state' => array( 'attribute' => 'st', 'faclass' => 'globe', 'type' => 'text' ),
    'street' => array( 'attribute' => 'street', 'faclass' => 'map-marker', 'type' => 'text' ),
    'title' => array( 'attribute' => 'title', 'faclass' => 'certificate', 'type' => 'text' ),
# RACF resources
    'resource' => array( 'attribute' => 'profilename', 'faclass' => 'database', 'type' => 'text' ),
    'owner' => array( 'attribute' => 'racfowner', 'faclass' => 'user-circle-o', 'type' => 'dn_racuser_link' ),
    'uacc' => array( 'attribute' => 'racfuacc', 'faclass' => 'lock', 'type' => 'text' ),
    'access' => array( 'attribute' => 'racfaccesscontrol', 'faclass' => 'lock', 'type' => 'racfaccess' ),
    'racfid' => array( 'attribute' => 'racfid', 'faclass' => 'id-badge', 'type' => 'text' ),
    'defaultgroup' => array( 'attribute' => 'racfdefaultgroup', 'faclass' => 'building-o', 'type' => 'dn_racgrp_link' ),
    'connectgroup' => array( 'attribute' => 'racfconnectgroupname', 'faclass' => 'building-o', 'type' => 'dn_racgrp_link' ),
    'racfattr' => array( 'attribute' => 'racfattributes', 'faclass' => 'info-circle', 'type' => 'text' ),
    'authdate' => array( 'attribute' => 'racfauthorizationdate', 'faclass' => 'calendar-day', 'type' => 'text' ),
    'lastaccess' => array( 'attribute' => 'racflastaccess', 'faclass' => 'calendar-check', 'type' => 'text' ),
    'pwdinterval' => array( 'attribute' => 'racfpasswordinterval', 'faclass' => 'calendar-minus', 'type' => 'text' ),
    'logondays' => array( 'attribute' => 'racflogondays', 'faclass' => 'calendar-check', 'type' => 'text' ),
    'logontime' => array( 'attribute' => 'racflogontime', 'faclass' => 'clock', 'type' => 'text' ),
);

# Search
$search_attributes = array('uid', 'cn', 'mail');
$search_use_substring_match = true;
$search_result_items = array('identifier', 'mail', 'mobile');
$search_result_title = "fullname";
$search_result_sortby = "lastname";
$search_result_linkto = array("fullname");
$search_result_show_undefined = true;
$search_result_truncate_value_after = 20;

$datatables_page_length_choices = array(10, 25, 50, 100, -1);
$datatables_page_length_default = 10;
$datatables_auto_print = true;

$display_items = array('identifier', 'firstname', 'lastname', 'title', 'businesscategory', 'employeenumber', 'employeetype', 'mail', 'phone', 'mobile', 'fax', 'postaladdress', 'street', 'postalcode', 'l', 'state', 'organizationalunit', 'organization');
$display_title = "fullname";
$display_show_undefined = false;
$display_password_items = array('pwdchangedtime', 'pwdreset', 'pwdaccountlockedtime', 'pwdfailuretime','pwdpolicysubentry', 'authtimestamp', 'created', 'modified');

# RACF User
$racuser_items = array('racfid', 'owner', 'defaultgroup', 'connectgroup', 'racfattr', 'authdate', 'lastaccess');
$racuser_title = "racfid";
$racuser_password_items = array('pwdinterval', 'logondays', 'logontime');
$racuser_result_items = array('owner', 'lastaccess');
$racuser_result_title = "racfid";

# Features
$use_checkpassword = true;
$use_resetpassword = true;
$resetpassword_reset_default = true;
$use_unlockaccount = true;

# Language
$lang ="en";
$date_specifiers = "%Y-%m-%d %H:%M:%S (%Z)";

# Graphics
$logo = "images/ltb-logo.png";
$background_image = "images/unsplash-space.jpeg";
$custom_css = "";
$display_footer = true;
#$logout_link = "http://auth.example.com/logout";

# Debug mode
$debug = false;

# Smarty
#define("SMARTY", "/usr/share/php/smarty3/Smarty.class.php");

# Allow to override current settings with local configuration
if (file_exists (dirname (__FILE__) . '/config.inc.local.php')) {
    include dirname (__FILE__) . '/config.inc.local.php';
}

?>

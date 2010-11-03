<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$id_carteira      = $params->get('id_carteira');
$page_url         = $params->get('page_url');
$logo             = $params->get('logo');
$logo_on          = $params->get('logo_on');

require( JModuleHelper::getLayoutPath( 'mod_moip' ) );
?>

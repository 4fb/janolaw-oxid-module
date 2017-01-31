<?php
/**
 * Module information for the janolaw AGB Hosting Service
 */
$aModule = array(
    'id'           	=> 'janolaw',
    'title'        	=> 'janolaw AGB Hosting Service',
    'description'  	=> array(
                          'de'	=>'Das Modul integriert die von janolaw bereitgestellten Bestandteile AGB, Widerrufsbelehrung, Impressum, Datenschutzerkl&auml;rung und Muster-Widerrufsformular in den OXID eShop. <br />Diese werden sowohl im Onlineshop angezeigt als auch in der E-Mail Best&auml;tigung an den Kunden.<br />Dank der integrierten Schnittstelle k&ouml;nnen die Dokumente bei rechtlichen &Auml;nderungen automatisch von den Anw&auml;lten der janolaw AG aktualisiert werden.',
                          'en'	=>'The module is for integration of janolaw components like terms, company details, right of withdrawal, data protection and model withdrawal form in OXID eShop. <br />This components are shown in eShop and in mails to the customer.',
                      ),
    'thumbnail'    	=> 'logo.png',
    'version'      	=> '2.1.0',
	'url'           => 'http://www.janolaw.de/agb-service/einbindung-oxid-esales.html?partnerid=8621#menu',
    'email' 		=> 'support@janolaw.de',
    'author'       	=> 'four for business AG',
    'extend'      	=> array(
        'oxcontent' 	=> 'ffb/janolaw/application/models/janolaw_oxcontent',
        'oxcontentlist' => 'ffb/janolaw/application/models/janolaw_oxcontentlist',
        'oxemail'       => 'ffb/janolaw/application/models/janolaw_oxemail'
    ),
    'files'			=> array(
    	'janolaw'		=> 'ffb/janolaw/application/controllers/admin/janolaw.php',	
    ),
    'templates'		=> array(
    	'janolaw.tpl' 	=> 'ffb/janolaw/application/views/admin/janolaw.tpl'
    ),
    'settings'		=> array(
    	array('group' => 'main', 'name' => 'infotext', 'type' => 'text',  'value' => '')
    ),
	'blocks'		=> array(
		array('template' => 'email/html/order_cust.tpl', 'block' => 'email_html_order_cust_orderemailend', 'file' => 'application/views/blocks/email/html/janolaw_order_cust.tpl'),
		array('template' => 'email/plain/order_cust.tpl', 'block' => 'email_plain_order_cust_orderemailend', 'file' => 'application/views/blocks/email/plain/janolaw_order_cust_plain.tpl')
		
	)
);
<?php
/**
 * This file contains additional methods for the oxContentList
 * class to provide the janolaw service.
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 *
 */

/**
 * janolaw overridden oxContentList class
 *
 * This class extends the default OXID class oxContentList by several
 * methods to provide the janolaw service.
 *
 * @extends oxContentList
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 */
class janolaw_oxContentList extends janolaw_oxContentList_parent {
	
   /**
	* Array with all service keys, needs to be here for backward compability
	* @array $_aServiceKeys
	*/
	protected $_aServiceKeys = array('oximpressum', 'oxagb', 'oxsecurityinfo', 'oxdeliveryinfo', 'oxrightofwithdrawal', 'oxorderinfo', 'oxcredits');

   /**
	* Constructor function
	*/
    public function __construct() {
        parent::__construct();

        $oxContent = oxRegistry::get('oxContent');
        if ($oxContent->getJanolawApiVersion() == 3) {
            $keys = $this->getServiceKeys();
            $keys[] = $oxContent->getJanolawWdFormPageIdent();

            $this->setServiceKeys($keys);
        }
    }
	
   /**
	* Set serice keys
	*/
	public function setServiceKeys($aServiceKeys) {
        $this->_aServiceKeys = $aServiceKeys;
    }
	
   /**
	* Gets service keys
	* @return array $_aServiceKeys
	*/
	public function getServiceKeys() {
		return $this->_aServiceKeys;
	}
}
?>
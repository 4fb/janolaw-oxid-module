<?php
/**
 * This file contains additional methods for the oxEmail
 * class to provide the janolaw service.
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 *
 */

/**
 * janolaw overridden oxEmail class
 *
 * This class extends the default OXID class oxEmail by methods
 * to provide the janolaw service.
 *
 * @extends oxEmail
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 */
class janolaw_oxEmail extends janolaw_oxEmail_parent {
    /**
     * Flag to turn on/off the attachments clear function
     * This was needed because OXID clears attachments when using the parent function.
     * @var bool
     */
    protected $_attachmentsClear = true;

    /**
     * Overloads the method oxEmail::sendOrderEmailToUser().
     * Attaches the desired PDF files to the order email for the user.
     *
     * @param oxOrder $order
     * @param null $subject
     * @return mixed
     */
    public function sendOrderEmailToUser($order, $subject = null) {
        $this->clearAttachments();
        $this->_attachmentsClear = false;

        $oxContent = oxRegistry::get('oxContent');
        if ($oxContent->getJanolawApiVersion() != 3) {
            // get smarty
            $oSmarty = oxRegistry::get('oxUtilsView')->getSmarty();
            $janolawInject = $oxContent->getJanolawInjects();
            $aEmailContents = array();
            $iLang = oxRegistry::getLang()->getBaseLanguage();
            $oxContent->setLanguage($iLang);
            // add data to the mail
            foreach ($janolawInject as $identName => $inject) {
                if ($inject[2] == 0) {
                    continue;
                }
                
                if($identName == "ffb_janolaw_wd_form") {
                    continue;
                }
                
                if($oxContent->loadByIdent($identName, true) !== false) {
                    $aEmailContents[] = array("oxtitle" => $oxContent->oxcontents__oxtitle->value, "oxcontent" => $oxContent->oxcontents__oxcontent->value);
                }
                
            }
            // assign data via smarty
            $oSmarty->assign('aJanolawData', $aEmailContents);
            return parent::sendOrderEmailToUser($order, $subject);
        
        }
        $orderLang = $order->getOrderLanguage();
        $janolawLangs = $this->getConfig()->getShopConfVar("janolaw_langs");

        $janolawLang = $janolawLangs[$orderLang];

        foreach ($oxContent->getJanolawInjects() as $identName => $inject) {
            if ($inject[2] == 0) {
                continue;
            }

            if ($this->getConfig()->getShopConfVar('janolaw_pdf_' . $identName) != 1) {
                continue;
            }

            $file = $oxContent->getJanolawFilesDirectory() . $oxContent->getJanolawPdfFilename($identName, $janolawLang);
            $this->addAttachment($file);
        }

        $return = parent::sendOrderEmailToUser($order, $subject);

        $this->_attachmentsClear = true;

        return $return;
    }

    /**
     * Overloads the method oxEmail::clearAttachments().
     * Workaround to add attachments before mail initializaion (which will reset all attachments).
     */
    public function clearAttachments() {
        if ($this->_attachmentsClear === true) {
            return parent::clearAttachments();
        }

        return;
    }
}
?>
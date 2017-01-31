<?php
/**
 * This file contains the backend view clsas for
 * the janolaw service.
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 *
 */
 
 /**
 * janolaw backend view class 
 *
 * This file contains the backend view clsas for
 * the janolaw service.
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 */
class Janolaw extends oxAdminDetails {
	/**
	 * @see	oxAdminDetails::render();
	 */
	public function render() {
		// Get the current base and template language for the bachend.
		$baseLanguage 	= oxRegistry::getLang()->getBaseLanguage();
		$tplLanguage 	= oxRegistry::getLang()->getTplLanguage();

		// Set the new base language by the current backend language, if they dont match.
		// If we dont do that the titles of the content pages are not in the backend language.					
		if ($baseLanguage != $tplLanguage) {
			oxRegistry::getLang()->setBaseLanguage($tplLanguage);
		}
		
		// execute the render() method of oxAdminDetails
		parent::render();
	
		$content = oxNew("oxContent");
		$config = $this->getConfig();

        $wdPageAvailable = $this->isJanolawWithdrawalPageAvailable();
        $wdPageSetup = $this->setupJanolawWithdrawalPage();
		
		// get all inject idents temporary in an array
		// while iterating, configurable items are removed from this array
		// so we have all not configurable idents in this array left and can
		// add hidden form values so they always are loaded
		$hiddenContent = $content->getJanolawInjects();
		$availableLanguages = $content->getJanolawLanguages();
		
		$data = array();
		
		$activeContentCount = 0;
		
		$contentObjects = $languageItems = array();

		// Iterate over each injectable content
		foreach ($content->getJanolawConfigurableInjectIdents() as $injectIdent) {
			$cont = oxNew("oxContent");
			$cont->loadByIdent($injectIdent, true);
			
			// Get the active state for updates with this identifier.
			$configValue = $config->getShopConfVar('janolaw_' . $injectIdent);
			
			// Store the active state.
			$contentObjects[$injectIdent]['configValue'] = $configValue;
			$activeContentCount = $activeContentCount + (int) $configValue;

            // Get the active state for integration of PDF files
            $contentObjects[$injectIdent]['pdfConfigValue'] = $config->getShopConfVar('janolaw_pdf_' . $injectIdent);

			$contentObjects[$injectIdent]['contentName'] = $injectIdent;
			$contentObjects[$injectIdent]['link'] = $cont->getLink();
			if(oxRegistry::getConfig()->getVersion() < '4.9.0') {
				$contentObjects[$injectIdent]['title'] = $cont->oxcontents__oxtitle->value;
			} else {
				$contentObjects[$injectIdent]['title'] = $cont->getTitle();
			}
			
			unset($hiddenContent[$injectIdent]);
		}
		
		$janolawLangs = $config->getShopConfVar("janolaw_langs");
		
		foreach (oxRegistry::getLang()->getLanguageArray() as $language) {
		    $languageItems[] = array(
		        'id' => $language->id,
		        'name' => $language->name,
		        'janolawLang' => $janolawLangs[$language->id]
		    );
		}
		
		// Get the basic configuration of the Janolaw service.
		$data['janolaw_userid'] 	= $config->getShopConfVar('janolaw_userid');
		$data['janolaw_shopid'] 	= $config->getShopConfVar('janolaw_shopid');
		$data['janolaw_interval'] 	= $config->getShopConfVar('janolaw_interval');
		
		$lastUpdateTimestamp 		= (int) $config->getShopConfVar('janolaw_lastupdate_timestamp');
		$langDateFormat 			= oxRegistry::getLang()->translateString('fullDateFormat');
		
		// Check if there were an update or not
		if ($lastUpdateTimestamp == 0) {
			$lastUpdate = oxRegistry::getLang()->translateString('JANOLAW_ADMIN_NEVER');
		} else {
			$lastUpdate = date($langDateFormat, $lastUpdateTimestamp);
		}
		
		// Set the template variables.
		$this->_aViewData['availableLanguages'] = $availableLanguages;
		
		$this->_aViewData['activeContentCount']	= $activeContentCount;
		$this->_aViewData['contentObjects'] 	= $contentObjects;
		$this->_aViewData['languageItems'] 		= $languageItems;
		$this->_aViewData['hiddenContent'] 		= $hiddenContent;
		$this->_aViewData['lastUpdate']			= $lastUpdate;
		$this->_aViewData['data'] 				= $data;
		
		$this->_aViewData['apiVersion']         = $content->getJanolawApiVersion();

        if (isset($this->_aViewData['janolawNotice']) === false && $wdPageAvailable === false) {
            if ($wdPageSetup === true) {
                $wdPageLanguageString = 'JANOLAW_ADMIN_WDFORM_SETUP_SUCCESS';
				$this->_aViewData['janolawNoticeState'] = 'success';
            } else {
                $wdPageLanguageString = 'JANOLAW_ADMIN_WDFORM_SETUP_FAILURE';
				$this->_aViewData['janolawNoticeState'] = 'error';
            }

            $this->_aViewData['janolawNotice'] = sprintf(
                oxRegistry::getLang()->translateString($wdPageLanguageString),
                $content->getJanolawWdFormPageIdent()
            );
			
			
        }
		
		// Return name of template to display
		return "janolaw.tpl";
	}    

	/**
	 * Saves the configuration.
	 *
	 * @return	void
	 */
	public function saveConfiguration() {
		$config = $this->getConfig();
		
		// Get the janolaw config from the backend form and store them into database.
		$configs = $config->getRequestParameter("janolaw");
		if (is_array($configs)) {
			foreach ($configs as $varName => $varValue) {
				$config->saveShopConfVar("str", $varName, $varValue);
			}
		}

		$configsLanguage = $config->getRequestParameter("janolaw_langs");
		if (is_array($configsLanguage)) {
		    $config->saveShopConfVar("aarr", "janolaw_langs", $configsLanguage);
		}
		
		$configsHidden = $config->getRequestParameter("janolaw_hidden");
		if (is_array($configsHidden)) {
			foreach ($configsHidden as $varName => $parentIdent) {
				$varValue = 0;
				if (isset($configs['janolaw_' . $parentIdent])) {
					$varValue = $configs['janolaw_' . $parentIdent];
				}
				
				$config->saveShopConfVar("str", $varName, $varValue);
			}
		}
        
        $this->checkApiVersion();

        return 'janolaw';
    }
    
    /**
     * Clean all janolaw data on content save
     * Removes pdf files and oxcontent elements
     * 
     * @return void
     */
    public function cleanJanolawData() {
        // clean files in janolaw file directory
        $oxContent = oxRegistry::get('oxContent');
        // gets janolaw file directory
        $janolawFileDirectory = $oxContent->getJanolawFilesDirectory();
        // if is directory
        if (is_dir($janolawFileDirectory)) {
            // iterate with dir iterator and remove files
            $oDirectory = new DirectoryIterator($janolawFileDirectory);
            foreach ( $oDirectory as $oDirContent ) {
                if ( $oDirContent->isFile() && !$oDirContent->isDot() ) {
                    $fileName = $oDirContent->getFilename();
                    unlink($janolawFileDirectory . $fileName);
                }
            }
        }
        // clean all content elements from database for all languages
        $injectIdents = $oxContent->getJanolawInjectIdents();
        
        foreach ($injectIdents as $identName) {
            foreach (oxRegistry::getLang()->getLanguageArray() as $language) {
                $oxContent->setLanguage($language->id);
                $oxContent->loadByIdent($identName, true);
                $oxContent->oxcontents__oxcontent = new oxField("", oxField::T_RAW);
                $oxContent->save();
            }
        }
    }

        /**
     * Checks and updates api version
     */
	public function checkApiVersion() {
	    $content = oxNew("oxContent");
		$content->updateJanolawApiVersion();
	}
	
	/** 
	 * Calls the updateJanolawContent() method in 
	 * the overriden oxContent class and marks the 
	 * update as forced.
	 *
	 * @return	void
	 */
	public function forceUpdate() {
        
         // clean all data before update
        $this->cleanJanolawData();

		$content = oxNew("oxContent");
		
		$noticeMessage = $content->updateJanolawContent(true);
		if ($noticeMessage === oxRegistry::getLang()->translateString('JANOLAW_ADMIN_FORCED_UPDATE_SUCCESSFUL')) {
			$this->_aViewData['janolawNoticeState'] = 'success';
		} else {
			$this->_aViewData['janolawNoticeState'] = 'error';
		}
		
	    $this->_aViewData['janolawNotice'] = $noticeMessage;
	}

    /**
     * Returns the state if withdrawal form page is available or not.
     * @return bool
     */
    public function isJanolawWithdrawalPageAvailable() {
        $content = oxNew('oxContent');
        $content->loadByIdent($content->getJanolawWdFormPageIdent(), true);

        return $content->isLoaded();
    }

    /**
     * Setups the withdrawal form page when it is not available.
     * @return bool
     */
    public function setupJanolawWithdrawalPage() {
        // If page is already available, do nothing further
        if ($this->isJanolawWithdrawalPageAvailable() === true) {
            return false;
        }

        // Check for the page with the ident "oximpressum" to clone it later
        $content = oxNew('oxContent');
        $content->loadByIdent('oximpressum', true);
        if ($content->isLoaded() === false) {
            return false;
        }

        // Clone the loaded content page
        $newPage = oxNew('oxContent');
        $newPage->oxClone($content);
        $newPage->setId();
        $newPage->oxcontents__oxloadid = new oxField($content->getJanolawWdFormPageIdent(), oxField::T_RAW);

        // Save the data for each shop language
        foreach (oxRegistry::getLang()->getLanguageArray() as $language) {
            $translationString = 'JANOLAW_ADMIN_WDFORM_TITLE_' . strtoupper($language->abbr);
            $translation = oxRegistry::getLang()->translateString($translationString);

            if ($translation == $translationString) {
                $translation = oxRegistry::getLang()->translateString('JANOLAW_ADMIN_WDFORM_TITLE_EN');
            }

            $newPage->setLanguage($language->id);
            $newPage->oxcontents__oxactive = new oxField(0, oxField::T_RAW);
            $newPage->oxcontents__oxcontent = new oxField('', oxField::T_RAW);
			
			if(oxRegistry::getConfig()->getVersion() < '4.9.0') {
				$newPage->oxcontents__oxtitle = new oxField($translation, oxField::T_RAW);
			} else {
				$newPage->setTitle($translation);
			}

            $newPage->save();
        }

        return true;
    }
}
?>
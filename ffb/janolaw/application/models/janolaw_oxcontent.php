<?php
/**
 * This file contains additional methods for the oxContent
 * class to provide the janolaw service.
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 *
 */

/**
 * janolaw overridden oxContent class 
 *
 * This class extends the default OXID class oxContent by several
 * methods to provide the janolaw service.
 *
 * @extends oxContent
 *
 * @version 2.0.0
 * @author four for business AG
 * @copyright four for business AG
 */
class janolaw_oxContent extends janolaw_oxContent_parent {
    /**
     * Array with available janolaw languages
     * @var array
     */
    private $_janolawLanguages = array('de', 'gb', 'fr');

	/**
	 * janolaw host address.
	 * This address is used for the fsockopen call.
	 * @var	string
	 */
	private $_janolawHost	= "www.janolaw.de";

	/**
	 * janolaw default path.
	 * This path is appended to the janolaw host
	 * and will be called every time.
	 * Possible placeholders are <USERID>, <SHOPID> and <LANGUAGEID>.
	 * @var	string
	 */
	private $_janolawPath   = "agb-service/shops/<USERID>/<SHOPID>/<LANGUAGEID>/";

    /**
     * janolaw default path for API version 1.
     * This path is appended to the janolaw host
     * and will be called every time when using API version 1.
     * @var	string
     */
	private $_janolawPathV1   = "agb-service/shops/<USERID>/<SHOPID>/";

    /**
     * Identifier for the model withdrawal form page in OXID.
     * @var string
     */
	private $_janolawWdFormPageIdent = 'ffb_janolaw_wd_form';

	/**
	 * Injects array.
	 * Contains all idents of contents in OXID eShop
	 * which should be "injected". Only if a content
	 * is listed in this array it can be replaced with
	 * janolaw content.
	 * The ident is the key of each array entry. Its value
	 * is an array. The first value is the name of file which
	 * contents are written to the database. The second value
	 * contains the file suffix. The third value defines,
     * if the ident is configurable (1) via backend
	 * or not (0). The forth value defines from which ident
	 * the hidden form field value should be loaded.
	 * @var	array
	 */
	private $_janolawInjects = array(
                                "oximpressum" 				=> array("legaldetails", "_include.html", 1, ''),
								"oxagb" 					=> array("terms", "_include.html", 1, ''),
								"oxrightofwithdrawal" 		=> array("revocation", "_include.html", 1, ''),
								"oxsecurityinfo" 			=> array("datasecurity", "_include.html", 1, ''));

    /**
     * Array with the filename mapping for the API version 1.
     * @var array mapping array
     */
	private $_janolawApiV1FileMapping = array(
	    'legaldetails' => 'impressum',
	    'terms' => 'agb',
	    'revocation' => 'widerrufsbelehrung',
	    'datasecurity' => 'datenschutzerklaerung'
	);
    
    
    /**
     * Array with file names for different languages
     * 
     * @var array mapping array
     */
    private $_janolawTranslationFileMapping = array(
        'legaldetails' => array('de' => 'impressum', 'gb' => 'imprint', 'fr' => 'mentions-legales'),
        'terms'        => array('de' => 'agb', 'gb' => 'general-terms-and-conditions', 'fr' => 'conditions-generales-de-vente'),
        'revocation'   => array('de' => 'widerrufsbelehrung', 'gb' => 'instructions-on-withdrawal', 'fr' => 'informations-standardisees-sur-la-retractation'),
        'datasecurity' => array('de' => 'datenschutzerklaerung', 'gb' => 'data-privacy-policy', 'fr' => 'declaration-quant-a-la-protection-des-donnees'),
        'model-withdrawal-form' => array('de' => 'muster-widerrufsformular', 'gb' => 'model-withdrawal-form', 'fr' => 'modele-de-formulaire-de-retractation')
    );

    /**
     * Public constructor.
     * Adds the model withdrawal form page to the injects and sets it ability
     * to be configured depending which API version is used.
     */
	public function __construct() {
	    parent::__construct();

	    $this->_janolawInjects[$this->_janolawWdFormPageIdent] = array(
	        "model-withdrawal-form",
            "_include.html",
	        1,
	        ''
	    );
	}

    /**
     * Overloads the method oxContent::assign().
     * This method does a little workaround, because oxContent objects loaded by oxContent::loadByIdent()
     * are not recognized as being loaded.
     */
    public function assign($dbRecord) {
        $assign = parent::assign($dbRecord);

        if ($this->getId() != '' && is_array($dbRecord)) {
            $this->_isLoaded = true;
        }

        return $assign;
    }

    /**
     * Overloads the method oxContent::load().
     * If $noInject is not true while saving content
     * in the fsockopen loop we will produce an endless loop.
     *
     * @param	string	$oxId		OXID of content
     * @param	boolean	$noInject	true disables the call of the injection method
     *
     * @return	mixed
     */
    public function load($oxId, $noInject = false) {
        $return = parent::load($oxId);

        if ($noInject === false && in_array($this->getLoadId(), $this->getJanolawInjectIdents())) {
            $this->updateJanolawContent(false);
        }

        return $return;
    }

    /**
     * Overloads the method oxContent::loadByIdent().
     * If $noInject is not true while saving content
     * in the fsockopen loop we ill produce an endless loop.
     *
     * @param	string	$ident		OXID eShop content identifier
     * @param	boolean	$noInject	true disables the call of the injection method
     *
     * @return	mixed
     */
    public function loadByIdent($ident, $noInject = false) {
        $return = parent::loadByIdent($ident);

        if ($noInject === false && in_array($this->getLoadId(), $this->getJanolawInjectIdents())) {
            $this->updateJanolawContent(false);
        }

        return $return;
    }

	/**
	 * Returns the injects array. Detailed information for this array is available in the
     * class variable documentation.
	 * @return	array	Injects array
	 */
	public function getJanolawInjects() {
		return $this->_janolawInjects;
	}

    /**
     * Returns the identifier of the model withdrawal form page.
     * @return string identifier
     */
	public function getJanolawWdFormPageIdent() {
	    return $this->_janolawWdFormPageIdent;
	}

    /**
     * Returns the API version number for janolaw.
     * If there is not stored version number for the API, the version number 1 will be assumed.
     * @return int version number
     */
	public function getJanolawApiVersion() {
	    $apiVersion = (int) $this->getConfig()->getShopConfVar('janolaw_api_version');
	    if ($apiVersion > 0) {
	        return $apiVersion;
	    }

	    return 1;
	}

    /**
     * Returns an array with all available janolaw languages,
     * which can be loaded from server.
     * @return array array with languages
     */
	public function getJanolawLanguages() {
	    return $this->_janolawLanguages;
	}

	/**
	 * Returns an array with all injectable idents of OXID eShop contents.
	 * @return	array	Injectable idents
	 */
	public function getJanolawInjectIdents() {
		return array_keys($this->_janolawInjects);
	}

	/**
	 * Returns an array with configurable injectable idents of OXID eShop contents.
	 * @return	array	Injectable idents
	 */
	public function getJanolawConfigurableInjectIdents() {
	    $data = $this->getJanolawInjectIdents();
		foreach ($data as $index => $ident) {
			if ($this->_janolawInjects[$ident][2] == 0) {
				unset($data[$index]);
			}
		}

		return $data;
	}

	/**
	 * Returns the janolaw path and replaces
	 * the placeholders with their values.
	 * @return	string	Janolaw path
	 */
	public function getJanolawPath($languageId = '') {
		$search 	= array("<SHOPID>", "<USERID>");

		$replace 	= array($this->getConfig()->getShopConfVar('janolaw_shopid'),
							$this->getConfig()->getShopConfVar('janolaw_userid'));

		$janolawPath = ($languageId == '') ? $this->_janolawPathV1 : $this->_janolawPath;

		if ($languageId != '') {
		    $search[] = "<LANGUAGEID>";
		    $replace[] = $languageId;
		}

		return str_replace($search, $replace, $janolawPath);
	}

	/**
	 * Returns the filename for an OXID eShop content identifier.
	 *
	 * @param	string	$ident	Identifier name
     * @param   bool    $loadPdfFile  whether to override the filename to load the PDF file or not
     * @param   bool    $inCheck    whether the method is used to check the API version or not
	 *
	 * @return	string	Name of file
	 */
	private function _getJanolawFilenameByIdent($ident, $loadPdfFile = false, $inCheck = false) {
        $filename = '';

		if (is_array($this->_janolawInjects[$ident])) {
            $filename = $this->_janolawInjects[$ident][0];
		}

		if ($filename !== '' && $this->getJanolawApiVersion() == 1 && $inCheck === false) {
            $filename = $this->_janolawApiV1FileMapping[$filename];
		}

        if ($loadPdfFile) {
            $suffix = '.pdf';
        } else {
            $suffix = $this->_janolawInjects[$ident][1];
        }

		return $filename . $suffix;
	}

	/**
	 * Performs an update of the contents.
	 * This method first checks for the last update time and the interval.
	 * If there is a necessity to update the contents the method iterate over
	 * each entry in the injectable contents array and checks if the content
	 * should be updated or not (administrable via backend).
	 * If contents should be updated, the method connects via fsockopen to
	 * the janolaw server, fetchs the content and save it into the database.
	 *
	 * @param	boolean	$forceUpdate	If true an update will be forced.
	 *
	 * @return	string	If forced update was enabled it returns a string with
	 *					information for the backend user
	 */
	public function updateJanolawContent($forceUpdate = false) {
		$success = false;

		$config = $this->getConfig();

		$shopId = $config->getShopConfVar('janolaw_shopid');
		$userId = $config->getShopConfVar('janolaw_userid');

		$state = "";

		if ($shopId == 0 && $userId == 0) {
			return $state;
		}

		$lastUpdate = (int) $config->getShopConfVar('janolaw_lastupdate_timestamp');
		$updateInterval = (int) $config->getShopConfVar('janolaw_interval');

		// The interval is saved in hours, but we need it in seconds
		$timeDiff = $updateInterval * 60 * 60;

		// Do updates only if this is forced or the time check matches
		if ($forceUpdate == false && time() < ($lastUpdate + $timeDiff)) {
			return $state;
		}

        // if API version is not 3, we load from "de" (API version 2)
        // or from base directory (API version 1)
        if ($this->getJanolawApiVersion() != 3) {
            $janolawLangs = array($this->getJanolawApiVersion() == 1 ? '' : 'de');
        } else {
            $janolawLangs = $config->getShopConfVar("janolaw_langs");
        }

        if ($this->getJanolawApiVersion() == 3) {
            $janolawFileDirectory = $this->getJanolawFilesDirectory();
        }

		// Iterate over all injectable contents
		foreach ($this->getJanolawInjectIdents() as $identName) {
			// Only do update if the admin wants it.
			if ((int) $config->getShopConfVar('janolaw_' . $identName) != 1) {
				continue;
			}

            if ($this->getJanolawApiVersion() != 3 && $identName == $this->_janolawWdFormPageIdent) {
                continue;
            }

            foreach ($janolawLangs as $oxLanguageId => $janolawLang) {
                $stateInfo = $this->_readJanolawServerContent($identName, $janolawLang);
                $successState = $stateInfo[0];
                $stateMessage = $stateInfo[1];

                if ($successState === true) {
                    // Set success flag to true so the last update timestamp can be refreshed.
                    $success = true;

                    // Instantiate new oxContent object and save the new content into database.
                    // Important: second parameter in method call loadByIdent MUST BE true
                    // Otherwise we get an endless loop...

                    $cont = oxNew("oxContent");

                    // multi language content is only supported with API version 3
                    if ($this->getJanolawApiVersion() == 3) {
                        $cont->setLanguage($oxLanguageId);
                    }

                    $cont->loadByIdent($identName, true);
                    $cont->oxcontents__oxcontent = new oxField($stateMessage, oxField::T_RAW);
                    $cont->save();
                } else {
                    $success = false;
                    break;
                }

                // interrupt this iteration step if API version is not 3
                // because PDF files are only supported with this version
                if ($this->getJanolawApiVersion() != 3 || (int) $config->getShopConfVar('janolaw_pdf_' . $identName) != 1) {
                    continue;
                }

                $stateInfo = $this->_readJanolawServerContent($identName, $janolawLang, true);
                $successState = $stateInfo[0];
                $stateMessage = $stateInfo[1];

                if ($successState === true) {
                    // Set success flag to true so the last update timestamp can be refreshed.
                    $success = true;

                    $filename = $janolawFileDirectory . $this->getJanolawPdfFilename($identName, $janolawLang);

                    if (file_exists($filename)) {
                        unlink($filename);
                    }

                    file_put_contents($filename, $stateMessage);
                } else {
                    $success = false;
                    break;
                }
            }
		} // end foreach

		if ($success == true) {
			// Update timestamp of last update
			$config->saveShopConfVar("str", "janolaw_lastupdate_timestamp", time());

			// Print out an success notice in backend...
			$state = oxRegistry::getLang()->translateString('JANOLAW_ADMIN_FORCED_UPDATE_SUCCESSFUL');
		} else {
			// ...or return an error message.
			$state = $stateMessage;
		}

		return $state;
	}

    /**
     * Returns the path for the janolaw files to store.
     * @return string path
     */
    public function getJanolawFilesDirectory() {
        $directory = getShopBasePath() . 'tmp/janolaw/';
        if (is_dir($directory) === false) {
            mkdir($directory, 0777);
        }

        return $directory;
    }

    /**
     * Builds and returns the PDF filename for a janolaw ident.
     *
     * @param string $identName name of the identifier
     * @param string $janolawLang janolaw language ID
     * @return string filename
     */
    public function getJanolawPdfFilename($identName, $janolawLang) {
        $injectIdent = $this->_janolawInjects[$identName][0];
        return $this->_janolawTranslationFileMapping[$injectIdent][$janolawLang] . '.pdf';
    }

	/**
	 * Performs the update of one specific content identifier.
	 *
	 * @param	string	$identName	oxid content identifier
	 * @param   string  $janolawLanguageId   janloaw language ID
     * @param   bool    $loadPdfFile    whether to load the PDF file or not
     * @param   bool    $inCheck    whether the method is called to check API version or not
	 *
	 * @return	array	array with error state or content
	 */
	private function _readJanolawServerContent($identName, $janolawLanguageId, $loadPdfFile = false, $inCheck = false) {
		$fileContent  = '';

		// Open new socket to server with timeout of 5 seconds
		// We suppress warning from fsockopen and catch them in a friendlier way
		$socket = @fsockopen($this->_janolawHost, 80, $errorNo, $error, 5);

        // Return error message if something went wrong with the connection
		if (!$socket) {
			return array(false, oxRegistry::getLang()->translateString('JANOLAW_ADMIN_ERROR_PROBLEM_WITH_CONNECTION') . $error);
		}

        $filename = $this->_getJanolawFileNameByIdent($identName, $loadPdfFile, $inCheck);

		// Send request to server...
		fputs($socket, "GET /" . $this->getJanolawPath($janolawLanguageId) . $filename . " HTTP/1.1\r\n");
		fputs($socket, "Host: " . $this->_janolawHost . "\r\n");
		fputs($socket, "Connection: close\r\n\r\n");

		// ... and fetches the content.
		while (!feof($socket)) {
			$fileContent .= fgets($socket, 128);
		}

		// Close the socket.
		fclose($socket);

		// HTTP Status Code is placed in the first line
		// at position 9 (after HTTP/1.1 plus whitespace)
		// To fetch the status code we need three chars
		$statusCode = substr($fileContent, 9, 3);

		// If the status code is not 200 (for OK) we interrupt
		// the loop and print out an error message for the backend
		if ($statusCode != 200) {
			return array(false, oxRegistry::getLang()->translateString('JANOLAW_ADMIN_ERROR_COULD_NOT_LOAD_FILE'));
		}

        // Strip socket information from retrieved content
        $separator 	= strpos($fileContent, "\r\n\r\n");
        $fileContent = substr($fileContent, $separator + 4);

		return array(true, $fileContent);
	}

    /**
     * Updates the janolaw API version by performing some checks.
     */
	public function updateJanolawApiVersion() {
	    $withdrawalForm = $this->_readJanolawServerContent($this->_janolawWdFormPageIdent, 'de', false, true);
	    if ($withdrawalForm[0] === true) {
	        $this->getConfig()->saveShopConfVar("str", 'janolaw_api_version', 3);
	        return;
	    }

        $keys = $this->getJanolawInjectIdents();
	    $withdrawalForm = $this->_readJanolawServerContent($keys[0], 'de', false, true);
        if ($withdrawalForm[0] === true) {
	        $this->getConfig()->saveShopConfVar("str", 'janolaw_api_version', 2);
	        return;
	    }

	    $this->getConfig()->saveShopConfVar("str", 'janolaw_api_version', 1);
	}
}
?>
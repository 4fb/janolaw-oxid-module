==Title==
janolaw AGB Hosting Service

==Author==
four for business AG

==Prefix==
janolaw

==Version==
2.1.0

==Link==
http://www.oxid-esales.com

==Mail==
info@4fb.de

==Description==
The module is for integration of janolaw components like terms, company details, right of withdrawal and data protection in OXID eShop.
This components are shown in eShop and in mails to the customer.

==Extend==
*oxcontent
--load
--loadByIdent

==Installation==

 - Copy all files from "copy_this" folder to your OXID installation.
   The folder contains additional files only. No shop-files would be replaced.
 - Navigate in backend to "Extensions" -> "Modules" and choose "janolaw AGB Hosting Service". Activate this module.
 - Clear the directory tmp/ in the shop root.
 - Register in backend again. This is important for loading the advanced navigation. 
   You have to see at menu item "Service" the new entry "janolaw".
   Click on the link and configurate the module.
   It is important to use correct shop- and user-ID.
   
 If you would not use the janolaw-service anymore, you can configurate the contents at "Customer Info" -> "CMS Pages".

 ==Installation with Composer from OXID eShop 4.9.6 ==

  - Please install Composer if it's not installed yed: https://getcomposer.org/
  - Change to the modules folder on your terminal: "cd /myshop/modules"
  - Please enter following command in your terminal: "composer require ffb/janolaw-oxid-module"
  - After instalation module will be placed in "/myshop/modules/vendor/ffb/janolaw"
  - Further informations about Composer installation in OXID eShop: https://oxidforge.org/en/composer-integration-for-projects-from-oxid-eshop-4-9-6-on.html

==Modules==
oxcontent => janolaw/application/models/janolaw_oxcontent

==Libraries==
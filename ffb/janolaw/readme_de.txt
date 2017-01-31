==Title==
janolaw AGB Hosting Service

==Autor==
four for business AG

==Prefix==
janolaw

==Version==
2.1.0

==Link==
http://www.oxid-esales.com

==Mail==
info@4fb.de

==Beschreibung==
Das Modul integriert die von janolaw bereitgestellten Bestandteile AGB, Widerrufsbelehrung, Impressum und Datenschutzerklärung in den OXID eShop.
Diese werden sowohl im Onlineshop angezeigt als auch in der E-Mail Bestätigung an den Kunden.

==Extend==
*oxcontent
--load
--loadByIdent

==Installation==

 - Bitte laden Sie alle Inhalte aus dem Ordner "copy_this" in die jeweils angegebenen Verzeichnisse hoch. 
   Bitte achten Sie darauf, dass es sich um zusätzliche Dateien handelt und demnach keine der vorhandenen Dateien des Shops überschrieben werden müssen.
 - Navigieren Sie im Backend unter "Erweiterungen" -> "Module" und wählen dort "janolaw AGB Hosting Service" aus. Aktivieren Sie dieses Modul.
 - Leeren Sie den Ordner tmp/ im Stammverzeichnis Ihres Shops.
 - Melden Sie sich erneut im Backend an. Dies ist erforderlich um die erweiterterte Navigation laden zu können.
   Sie müssten nun unter dem Navigationspunkt "Services" einen neuen Eintrag "janolaw" sehen können.
   Klicken Sie den Link an und konfigurieren Sie das Modul nach Ihren Wünschen.
   Achten Sie bitte darauf, dass Sie eine korrekte Shop- und User-ID eingeben.
   
 Wenn Sie den janolaw-Service nicht mehr nutzen möchten, können Sie die Inhalte der Seite über "Kundeninformationen", "CMS-Seiten" nach ihren eigenen Wünschen gestalten.

==Installation mit Composer ab Version OXID eShop 4.9.6 ==

 - Installieren Sie bitte zunächsts den Composer, falls dieser noch nicht installiert ist: https://getcomposer.org/
 - Wechseln sie in den Ordner modules Ihres Shops auf der Konsole: "cd /meinshop/modules"
 - Geben Sie in Ihrer Konsole folgenden Befehl ein: "composer require ffb/janolaw-oxid-module"
 - Nach der Installation befindet sich das Modul im Ordner "/meinshop/modules/vendor/ffb/janolaw"
 - Weitere Informationen hierzu finden Sie hier: https://oxidforge.org/en/composer-integration-for-projects-from-oxid-eshop-4-9-6-on.html

==Module==
oxcontent => janolaw/application/models/janolaw_oxcontent

==Bibliotheken==
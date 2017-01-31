[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
[{assign var="oConfig" value=$oView->getConfig()}]
<style>
.o2c_wrapper {
    padding: 35px 20px;
    position: relative;
    min-width: 600px;
}
.o2c_wrapper * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.o2c_wrapper .o2c_icon {
    left: 20px;
    position: absolute;
    top: 35;
}
.o2c_wrapper .o2c_inner {
    margin: 0 0 0 62px
}
.o2c_wrapper .o2c_inner .head {
    margin: 0 0 5px 0;
    padding: 0 0 15px 0;
    position: relative;
}
.o2c_wrapper .o2c_inner .head:before {
    background: #000;
    bottom: 0;
    content: '';
    display: block;
    height: 1px;
    left: 0;
    position: absolute;
    width: 10px;
}
.o2c_wrapper .o2c_inner .head > h1,
.o2c_wrapper .o2c_inner .head > h2 {
    color: #000;
    font-family: Tahoma, Verdana, sans-serif;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}
.o2c_wrapper .o2c_inner .head > h1 {
    margin: 0 0 5px 0;
}
.o2c_wrapper .o2c_inner .head > h2 {
    color: #0079C1;
    font-size: 12px;
    padding: 0 0 0 15px;
    position: relative;
}
.o2c_wrapper .o2c_inner .head > h2:before {
    content: '';
    display: block;
    border-style: solid;
    border-width: 6px 0 6px 6px;
    border-color: transparent transparent transparent #007bff;
    height: 0;
    left: 0;
    position: absolute;
    top: 0;
    width: 0;
}
.o2c_wrapper .o2c_inner .content {
	width: 580px;
}
.o2c_wrapper .o2c_inner .content > span:first-child {
    color: #1D1D1B;
    display: block;
    font-size: 11px;
    font-style: italic;
    font-weight: bold;
    margin: 0 0 30px 0;
}
.o2c_wrapper .o2c_inner .content > span:first-child+p+p,
.o2c_wrapper .o2c_inner .content > span:first-child+p+p+p {
	font-style: italic;
}
.o2c_wrapper .o2c_inner .content > span:first-child+p+p b {
	color: #0079C1;
	display: block;
}
.o2c_wrapper .o2c_inner .content p {
    line-height: 17px;
    margin: 0 0 20px 0;
}
.o2c_wrapper .o2c_inner .content span {
    line-height: 17px;
}
.o2c_wrapper .o2c_inner .content ul {
    display: inline-block;
    list-style: disc;
    list-style-position: inside;
    padding: 0 0 0 35px;
}
.o2c_wrapper .o2c_inner .content ul li {
    background: none;
    color: #0079C1;
    list-style: inherit;
    padding: 0;
}
.o2c_wrapper .o2c_inner .content ul li > * {
    color: #000;
    padding: 0 0 0 8px;
}
.o2c_wrapper .o2c_inner .content p+ul,
.o2c_wrapper .o2c_inner .content ul+p {
    margin: 20px 0 20px 0;
}
.o2c_wrapper .o2c_inner .content form {

}
.o2c_wrapper .o2c_inner .content form .form-group {
    clear: both;
    font-size: 0;
}
.o2c_wrapper .o2c_inner .content form .form-group span {
    font-size: 11px;
}
.o2c_wrapper .o2c_inner .content form > .form-group {
    display: inline-block;
}
.o2c_wrapper .o2c_inner .content form .form-group+.form-group {
    margin: 5px 0 0 0;
}
.o2c_wrapper .o2c_inner .content form .form-group label {
    display: inline-block;
    font-family: Verdana, sans-serif;
    font-size: 11px;
    margin: 0 20px 0 0;
    width: 360px;
}
.o2c_wrapper .o2c_inner .content form .form-group .select-wrapper {
    display: inline-block;
    position: relative;
}
.o2c_wrapper .o2c_inner .content form .form-group input,
.o2c_wrapper .o2c_inner .content form .form-group select {
    border: 1px solid #7F7E7E;
    font-family: Verdana, sans-serif;
    font-size: 11px;
    height: 20px;
    margin: 0;
    padding: 0 8px;
    width: 190px;
}
.o2c_wrapper .o2c_inner .content form .form-group select {
    padding-left: 4px;
    padding-right: 0;
}
.o2c_wrapper .o2c_inner .content form .form-group.small input,
.o2c_wrapper .o2c_inner .content form .form-group.small select {
    width: 100px;
}
.o2c_wrapper .o2c_inner .content form .form-group.submit {
    margin: -10px 0 0 0;
}
.o2c_wrapper .o2c_inner .content form > .form-group.submit {
    margin: 30px 0 0 0;
}
.o2c_wrapper .o2c_inner .content form .form-group.submit input {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #2684C5;
    border: 0;
    color: #fff;
    cursor: pointer;
    font-family: Verdana, sans-serif;
    font-size: 11px;
    height: auto;
    margin: 0 0 0 470px;
    min-height: 20px;
    outline: 0 none;
    padding: 5px 8px;
    text-transform: uppercase;
    white-space: normal;
}
.o2c_wrapper .o2c_inner .content form .form-group .info {

}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox {

}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox.hint {
    width: 750px;
    margin: 10px 0px 0px 0px;
}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox.hint div span {
    color: #777777;
}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox > label {
}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox .checkbox-group {
	display: inline-block;
}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox .checkbox-group label {
	display: block;
	clear: none;
	float: left;
	padding: 2px 1em 0 0;
	width: auto;
}
.o2c_wrapper .o2c_inner .content form .form-group.checkbox .checkbox-group input {
	clear: none;
	float: left;
	height: auto;
	margin: 2px 5px 0 2px;
	width: auto;
}
.o2c_wrapper .o2c_inner .content form fieldset {
    background: none;
    border: 0 none;
    border-radius: 0;
    margin: 0;
    padding: 0;
}
.o2c_wrapper .o2c_inner .content form fieldset+fieldset {
    margin: 45px 0 0 0;
}
.o2c_wrapper .o2c_inner .content form fieldset legend {
    clear: both;
    color: #0079C1;
    display: block;
    font-family: Verdana, sans-serif;
    font-size: 11px;
    font-weight: bold;
    margin: 0 0 17px 0;
    max-width: 500px;
    padding: 0;
    width: 100%;
}
.o2c_wrapper .o2c_inner .content form fieldset legend+p {
    color: #000;
    font-family: Verdana, sans-serif;
    font-size: 11px;
    font-style: italic;
    margin: -17px 0 40px 0;
    width: 290px;
}
.o2c_wrapper .o2c_inner .content .form-group-message {
	background: #F3F3F3;
    font-weight: bold;
    margin: 0 0 20px 0;
    max-width: 100%;
    padding: 10px;
    width: 570px;
}
.o2c_wrapper .o2c_inner .content .form-group-message.error > * {
    color: red;
}
.o2c_wrapper .o2c_inner .content .form-group-message.success > * {
    color: green;
}
.o2c_wrapper .o2c_inner .content .form-group-message+fieldset,
.o2c_wrapper .o2c_inner .content fieldset+.form-group-message {
    margin: 40px 0 0 0;
}
.o2c_wrapper .o2c_inner .content form .form-group .btnShowHelpPanel {
    -moz-appearance: none;
    background: rgba(0, 0, 0, 0) url([{$oConfig->getOutUrl()}]/admin/src/bg/ico_help.gif) no-repeat scroll 0 0;
    border: 0 none;
    margin-left: 10px;
    outline: 0 none;
    padding: 0;
    position: relative;
    top: 2px;
    width: 21px !important;
    height: 16px !important;
}

.o2c_wrapper .o2c_inner .content .image-row {
    display: inline-block;
    margin: 25px 0 0 0;
}
.o2c_wrapper .o2c_inner .content .image-row img+img {
    margin: 0 0 0 55px;
}
.o2c_wrapper .o2c_inner .content .image-row .logo-contenido {
    position: relative;
    top: -4px;
}
.o2c_wrapper .o2c_inner .content .log-container {
    margin: 35px 0 0 0;
}
.o2c_wrapper .o2c_inner .content .log-container pre {
    font-family: verdana;
    font-size: 11px;
    line-height: 25px;
    margin: 0;
}
.o2c_wrapper .o2c_inner .content #myeditlogs > .form-group.submit {
    margin: 35px 0 0 0;
}
.o2c_wrapper .o2c_inner .content #myeditlogs > .form-group.submit input {
    margin: 0;
}

.o2c_wrapper .o2c_inner .content form .form-group.form-group-header {

}
.o2c_wrapper .o2c_inner .content form .form-group.form-group-header label {
	color: #777777;
}
.o2c_wrapper .o2c_inner .content form .update-informations {

}
.o2c_wrapper .o2c_inner .content form .update-informations .form-group > label {
	width: 190px;
}
.o2c_wrapper .o2c_inner .content form .update-informations .form-group.form-group-header label+label {
	white-space: nowrap;
	width: 102px;
}
.o2c_wrapper .o2c_inner .content form .update-informations .form-group.checkbox .checkbox-group label {
	width: 100px;
}
.o2c_wrapper .o2c_inner .content form .update-languages {
}
.o2c_wrapper .o2c_inner .content form .update-languages .form-group > label {
	width: 120px;
}
.o2c_wrapper .o2c_inner .content .forms-wrapper {
	position: relative;
}
.o2c_wrapper .o2c_inner .content .forms-wrapper > form:first-child > fieldset:first-child {
	margin-bottom: 120px;
}
.o2c_wrapper .o2c_inner .content form.row .form-group {
	margin: 0;
}
.o2c_wrapper .o2c_inner .content form.row .form-group.submit input {
	margin: 0;
	max-width: none;
	text-transform: none;
	white-space: nowrap;
}
.o2c_wrapper .o2c_inner .content form.row .form-group.submit label > span {
	color: #777777;
}
.o2c_wrapper .o2c_inner .content form.row+form.row {
	margin: 10px 0 0 0;
}
.o2c_wrapper .o2c_inner .content .absolute-forms {
	left: 0;
	position: absolute;
	top: 100px;
}
</style>

<div class="o2c_wrapper">
    <div class="o2c_icon">
    </div>
    <div class="o2c_inner">
        <div class="head">
            <h1>[{ oxmultilang ident="JANOLAW_ADMIN_TITLE" }]</h1>
            <h2>Information</h2>
        </div>
        <div class="content">
        	<span>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION1" }]</span>
        	<p>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION2" }]</p>
        	<p>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION3" }]</p>
        	<p>[{ oxmultilang ident="JANOLAW_ADMIN_DESCRIPTION" }]</p>

			<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
			    [{ $oViewConf->getHiddenSid() }]
			    <input type="hidden" name="oxid" value="[{ $oxid }]">
			    <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
			    <input type="hidden" name="cl" value="janolaw">
			    <input type="hidden" name="language" value="[{ $actlang }]">
			</form>
                        [{*
			[{if $apiVersion < 3}]
				<div class="form-group form-group-message error">
					<span>[{ oxmultilang ident="JANOLAW_ADMIN_LEGACY_API_NOTICE" }]</span>
				</div>
			[{/if}]
                        *}]

			[{if $janolawNotice != "" }]
				<div class="form-group form-group-message [{$janolawNoticeState}]">
					<span>[{ $janolawNotice }]</span>
				</div>
			[{ /if }]

			<div class="forms-wrapper">

				<form name="myedit" id="myedit" onsubmit="return chkInsert()" action="[{ $oViewConf->getSelfLink() }]" method="post">

					<fieldset>
						
						<div class="form-group">
							<label>[{ oxmultilang ident="JANOLAW_ADMIN_USERID" }]</label>
							<input type="text" size="20" maxlength="9" id="janolaw_userid" name="janolaw[janolaw_userid]" value="[{ $data.janolaw_userid }]" />
						</div>

						<div class="form-group">
							<label>[{ oxmultilang ident="JANOLAW_ADMIN_SHOPID" }]</label>
							<input type="text" size="20" maxlength="6" id="janolaw_shopid" name="janolaw[janolaw_shopid]" value="[{ $data.janolaw_shopid }]" />
						</div>

						<div class="form-group">
							<label>[{ oxmultilang ident="JANOLAW_ADMIN_INTERVAL" }]</label>
							<div class="select-wrapper">
								<select name="janolaw[janolaw_interval]">
									<option [{ if $data.janolaw_interval == 2 }]selected="selected"[{/if}] value="2">2 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
									<option [{ if $data.janolaw_interval == 4 }]selected="selected"[{/if}] value="4">4 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
									<option [{ if $data.janolaw_interval == 8 }]selected="selected"[{/if}] value="8">8 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
									<option [{ if $data.janolaw_interval == 12 }]selected="selected"[{/if}] value="12">12 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
									<option [{ if $data.janolaw_interval == 24 }]selected="selected"[{/if}] value="24">24 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
									<option [{ if $data.janolaw_interval == 48 }]selected="selected"[{/if}] value="48">48 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								</select>
							</div>
						</div>

					</fieldset>

					[{ $oViewConf->getHiddenSid() }]
					<input type="hidden" name="cl" value="janolaw" />
					<input type="hidden" name="fnc" value="saveConfiguration" />
					<input type="hidden" name="oxid" value="[{ $oxid }]" />
					<input type="hidden" name="voxid" value="[{ $oxid }]" />

					[{foreach from=$hiddenContent key=hiddenContentName item=defaultValue name="hiddencontents" }]
						<input type="hidden" name="janolaw_hidden[janolaw_[{ $hiddenContentName }]]" value='[{ $defaultValue.2 }]' />
					[{/foreach}]

					[{if $apiVersion == 3}]
						<fieldset class="update-languages">
							<legend>[{oxmultilang ident="JANOLAW_ADMIN_UPDATE_LANGUAGES" }]</legend>
							
							<div class="form-group form-group-header">
								<label>[{oxmultilang ident="JANOLAW_ADMIN_SHOP_LANGUAGES" }]</label>
								<label>[{oxmultilang ident="JANOLAW_ADMIN_SHOP_SOURCE_LANGUAGES" }]</label>
							</div>

							[{foreach from=$languageItems item=language name="langugages" }]

								<div class="form-group checkbox">
									<label>[{ $language.name }]</label>
									<div class="checkbox-group">
										[{foreach from=$availableLanguages item=janolawLanguage name="janolawLanguages" }]
											<label>
												<input [{ if $language.janolawLang == $janolawLanguage }]checked="checked"[{/if}] type="radio" name="janolaw_langs[[{$language.id}]]" value='[{$janolawLanguage}]' /><span>[{$janolawLanguage|upper}]</span>
											</label>
										[{/foreach}]
									</div>
								</div>

							[{/foreach}]

							[{ if $languageItems|@count == 0 }]
								<div class="form-group form-group-message error">
									<span>[{ oxmultilang ident="JANOLAW_ADMIN_NO_LANGUAGES_DEFINED" }]</span>
								</div>
							[{ /if }]

						</fieldset>
					[{/if}]


					<fieldset class="update-informations">
						<legend>[{oxmultilang ident="JANOLAW_ADMIN_UPDATE_SERVICES" }]</legend>

						<div class="form-group form-group-header">
							<label></label>
							<label>[{ oxmultilang ident="JANOLAW_ADMIN_LOAD_CONTENT" }]</label>
							[{if $apiVersion == 3}]
								<label>[{ oxmultilang ident="JANOLAW_ADMIN_PDF_ORDER_CONFIRMATION" }]</label>
                                                        [{else}]
                                                                <label>[{ oxmultilang ident="JANOLAW_ADMIN_EMAIL_ORDER_CONFIRMATION" }]</label>
							[{/if}]
						</div>

						[{foreach from=$contentObjects item=content name="contents" }]

							<div class="form-group checkbox">
								<label><a href="[{ $content.link }]" target="_blank" title="ID: [{$content.contentName}]">[{ $content.title }]</a></label>

								<input type="hidden" name="janolaw[janolaw_[{ $content.contentName }]]" value='0' />

								<div class="checkbox-group">
                                                                    [{if $content.contentName == 'ffb_janolaw_wd_form'}]
                                                                        [{if $apiVersion == 3}]
                                                                            <label>
                                                                                    <input [{ if $content.configValue == 1 }]checked="checked"[{/if}]  type="checkbox" name="janolaw[janolaw_[{ $content.contentName }]]" value='1' />
                                                                            </label>

                                                                            <label>
                                                                                    <input type="hidden" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='0' />
                                                                                    <input [{ if $content.pdfConfigValue == 1 }]checked="checked"[{/if}] type="checkbox" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='1' />
                                                                            </label>
                                                                        [{else}]
                                                                            <label>
                                                                                   [{ oxinputhelp ident="JANOLAW_ADMIN_WDFORM_HINT" }]
                                                                            </label>
                                                                        [{/if}]
                                                                    [{else}]
                                                                        <label>
                                                                            <input [{ if $content.configValue == 1 }]checked="checked"[{/if}]  type="checkbox" name="janolaw[janolaw_[{ $content.contentName }]]" value='1' />
                                                                        </label>

                                                                        <label>
                                                                                <input type="hidden" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='0' />
                                                                                <input [{ if $content.pdfConfigValue == 1 }]checked="checked"[{/if}] type="checkbox" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='1' />
                                                                        </label>
                                                                    [{/if}]
								</div>

							</div>

						[{/foreach}]
                                               
						[{ if $contentObjects|@count == 0 }]
							<div class="form-group form-group-message error">
								<span>[{ oxmultilang ident="JANOLAW_ADMIN_NO_CONTENTS_DEFINED" }]</span>
							</div>
						[{ /if }]

					</fieldset>


					<div class="form-group submit small">
						<input type="submit" name="save" value="[{ oxmultilang ident="GENERAL_SAVE" }]"/ >
					</div>

				</form>

				<div class="absolute-forms">

					<form class="row" name="myedit2" id="myedit2" action="[{ $oViewConf->getSelfLink() }]" method="post">
						[{ $oViewConf->getHiddenSid() }]
						<input type="hidden" name="cl" value="janolaw">
						<input type="hidden" name="fnc" value="forceUpdate">

						<div class="form-group submit">
							<label>[{oxmultilang ident="JANOLAW_ADMIN_LAST_UPDATE" }]: <span>[{ $lastUpdate }]</span></label>
							<input [{ if $smarty.foreach.contents.total == 0 || $activeContentCount == 0 }]disabled="disabled"[{ /if }] type="submit" value="[{ oxmultilang ident="JANOLAW_ADMIN_UPDATE_NOW" }]" />
						</div>

					</form>
					
					<form class="row" name="myedit3" id="myedit3" action="[{ $oViewConf->getSelfLink() }]" method="post">
						[{ $oViewConf->getHiddenSid() }]
						<input type="hidden" name="cl" value="janolaw">
						<input type="hidden" name="fnc" value="checkApiVersion">

						<div class="form-group submit">
							<label>[{oxmultilang ident="JANOLAW_ADMIN_RECOGNOZED_API_VERSION" }]: <span>[{ $apiVersion }]</span></label>
							<input type="submit" value="[{ oxmultilang ident="JANOLAW_ADMIN_CHECK_API_VERSION" }]" /><br />
						</div>

					</form>

				</div>

			</div>

        </div>
    </div>
</div>

<!--

    <form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
        [{ $oViewConf->getHiddenSid() }]
        <input type="hidden" name="oxid" value="[{ $oxid }]">
        <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
        <input type="hidden" name="cl" value="janolaw">
        <input type="hidden" name="language" value="[{ $actlang }]">
    </form>

	<table cellspacing="0" cellpadding="0" border="0" width="98%">
		<tr>
			<td colspan="3">
				<p><b>[{ oxmultilang ident="JANOLAW_ADMIN_TITLE" }]</b></p>
				<p>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION1" }]</p>
				<p>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION2" }]</p>
				<p>[{ oxmultilang ident="JANOLAW_ADMIN_INTRODUCTION3" }]</p>
				<p>[{ oxmultilang ident="JANOLAW_ADMIN_DESCRIPTION" }]</p>
				
				[{if $apiVersion < 3}]
					<p style="color:red">[{ oxmultilang ident="JANOLAW_ADMIN_LEGACY_API_NOTICE" }]</p>
				[{/if}]
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
        [{if $janolawNotice != "" }]
        <tr>
            <td colspan="3"><p style="color:red">[{ $janolawNotice }]</p></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        [{ /if }]
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="15"></td>
			<td valign="top">
				<form name="myedit" id="myedit" onsubmit="return chkInsert()" action="[{ $oViewConf->getSelfLink() }]" method="post">
					[{ $oViewConf->getHiddenSid() }]
					<input type="hidden" name="cl" value="janolaw" />
					<input type="hidden" name="fnc" value="saveConfiguration" />
					<input type="hidden" name="oxid" value="[{ $oxid }]" />
					<input type="hidden" name="voxid" value="[{ $oxid }]" />
					[{foreach from=$hiddenContent key=hiddenContentName item=defaultValue name="hiddencontents" }]
						<input type="hidden" name="janolaw_hidden[janolaw_[{ $hiddenContentName }]]" value='[{ $defaultValue.2 }]' />
					[{/foreach}]

					<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td class="edittext" width="160">
							[{ oxmultilang ident="JANOLAW_ADMIN_USERID" }]
						</td>
						<td class="edittext" width="250">
							<input type="text" class="editinput" size="20" maxlength="9" id="janolaw_userid" name="janolaw[janolaw_userid]" value="[{ $data.janolaw_userid }]" />
						</td>
					</tr>
					<tr>
						<td class="edittext" width="160">
							[{ oxmultilang ident="JANOLAW_ADMIN_SHOPID" }]
						</td>
						<td class="edittext" width="250">
							<input type="text" class="editinput" size="20" maxlength="6" id="janolaw_shopid" name="janolaw[janolaw_shopid]" value="[{ $data.janolaw_shopid }]" />
						</td>
					</tr>
					<tr>
						<td class="edittext" width="160">
							[{ oxmultilang ident="JANOLAW_ADMIN_INTERVAL" }]
						</td>
						<td class="edittext" width="250">
							<select name="janolaw[janolaw_interval]" class="editinput">
								<option [{ if $data.janolaw_interval == 2 }]selected="selected"[{/if}] value="2">2 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								<option [{ if $data.janolaw_interval == 4 }]selected="selected"[{/if}] value="4">4 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								<option [{ if $data.janolaw_interval == 8 }]selected="selected"[{/if}] value="8">8 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								<option [{ if $data.janolaw_interval == 12 }]selected="selected"[{/if}] value="12">12 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								<option [{ if $data.janolaw_interval == 24 }]selected="selected"[{/if}] value="24">24 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
								<option [{ if $data.janolaw_interval == 48 }]selected="selected"[{/if}] value="48">48 [{oxmultilang ident="JANOLAW_ADMIN_HOURS" }]</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							&nbsp;
						</td>
					</tr>
					[{if $apiVersion == 3}]
						<tr>
							<td colspan="2">
								&nbsp;
							</td>
						</tr>
						<tr>
							<td colspan="2">
								[{oxmultilang ident="JANOLAW_ADMIN_UPDATE_LANGUAGES" }]
							</td>
						</tr>
						<tr>
							<td colspan="2">
								&nbsp;
							</td>
						</tr>
						[{foreach from=$languageItems item=language name="langugages" }]
						<tr>
							<td class="edittext" align="right">
								[{ $language.name }]&nbsp;&nbsp;&nbsp;
							</td>
							<td class="edittext">
								[{foreach from=$availableLanguages item=janolawLanguage name="janolawLanguages" }]
									&nbsp;<input [{ if $language.janolawLang == $janolawLanguage }]checked="checked"[{/if}] class="edittext" type="radio" name="janolaw_langs[[{$language.id}]]" value='[{$janolawLanguage}]' /> [{$janolawLanguage|upper}]&nbsp;
								[{/foreach}]
							</td>
						</tr>
						[{/foreach}]
						[{ if $languageItems|@count == 0 }]
						<tr>
							<td class="edittext" colspan="2">
								[{ oxmultilang ident="JANOLAW_ADMIN_NO_LANGUAGES_DEFINED" }]
							</td>
						</tr>
						[{ /if }]
						<tr>
							<td colspan="2">
								&nbsp;
							</td>
						</tr>
					[{/if}]
					<tr>
						<td colspan="2">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td colspan="2">
							[{oxmultilang ident="JANOLAW_ADMIN_UPDATE_SERVICES" }]
						</td>
					</tr>
					<tr>
						<td colspan="2">
							&nbsp;
						</td>
					</tr>
					[{foreach from=$contentObjects item=content name="contents" }]
					<tr>
						<td class="edittext" align="right">
							<a href="[{ $content.link }]" target="_blank" title="ID: [{$content.contentName}]">[{ $content.title }]</a>&nbsp;&nbsp;&nbsp;
						</td>
						<td class="edittext">
							<input type="hidden" name="janolaw[janolaw_[{ $content.contentName }]]" value='0' />
							&nbsp;<input [{ if $content.configValue == 1 }]checked="checked"[{/if}] class="edittext" type="checkbox" name="janolaw[janolaw_[{ $content.contentName }]]" value='1' />
                            &nbsp;&nbsp;[{ oxmultilang ident="JANOLAW_ADMIN_LOAD_CONTENT" }]
                            [{if $apiVersion == 3}]
                                &nbsp;&nbsp;

                                <input type="hidden" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='0' />
                                &nbsp;&nbsp;&nbsp;<input [{ if $content.pdfConfigValue == 1 }]checked="checked"[{/if}] class="edittext" type="checkbox" name="janolaw[janolaw_pdf_[{ $content.contentName }]]" value='1' />
                                &nbsp;&nbsp;[{ oxmultilang ident="JANOLAW_ADMIN_PDF_ORDER_CONFIRMATION" }]
                            [{/if}]
						</td>
					</tr>
					[{/foreach}]
					[{ if $contentObjects|@count == 0 }]
					<tr>
						<td class="edittext" colspan="2">
							[{ oxmultilang ident="JANOLAW_ADMIN_NO_CONTENTS_DEFINED" }]
						</td>
					</tr>
					[{ /if }]
					<tr>
						<td class="edittext">
						</td>
						<td class="edittext"><br>
						<input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="GENERAL_SAVE" }]"/ ><br>
						</td>
					</tr>
					</table>
				</form>
			</td>
			<td valign="top">
				<form name="myedit2" id="myedit2" action="[{ $oViewConf->getSelfLink() }]" method="post">
					[{ $oViewConf->getHiddenSid() }]
					<input type="hidden" name="cl" value="janolaw">
					<input type="hidden" name="fnc" value="forceUpdate">
					<input [{ if $smarty.foreach.contents.total == 0 || $activeContentCount == 0 }]disabled="disabled"[{ /if }] type="submit" value="[{ oxmultilang ident="JANOLAW_ADMIN_UPDATE_NOW" }]" class="edittext" /><br />
					&nbsp;[{oxmultilang ident="JANOLAW_ADMIN_LAST_UPDATE" }]: [{ $lastUpdate }]
				</form>
				
				<br /><br />
				
				<form name="myedit3" id="myedit3" action="[{ $oViewConf->getSelfLink() }]" method="post">
					[{ $oViewConf->getHiddenSid() }]
					<input type="hidden" name="cl" value="janolaw">
					<input type="hidden" name="fnc" value="checkApiVersion">
					<input type="submit" value="[{ oxmultilang ident="JANOLAW_ADMIN_CHECK_API_VERSION" }]" class="edittext" /><br />
					&nbsp;[{oxmultilang ident="JANOLAW_ADMIN_RECOGNOZED_API_VERSION" }]: [{ $apiVersion }]
				</form>
			</td>
		</tr>
	</table>
	-->

    <script type="text/javascript">
        function chkInsert() {
            if (document.getElementById('janolaw_userid').value == "") {
                alert("[{ oxmultilang ident="JANOLAW_ADMIN_PLEASE_INSERT_YOUR_USERID" }]");
                document.getElementById('janolaw_userid').focus();
                return false;
            } else if (document.getElementById('janolaw_userid').value.length > 9) {
                alert("[{ oxmultilang ident="JANOLAW_ADMIN_ERROR_INVALID_CHARCOUNT_USERID" }]");
                document.getElementById('janolaw_userid').focus();
                return false;
            }

            if (document.getElementById('janolaw_shopid').value == "") {
                alert("[{ oxmultilang ident="JANOLAW_ADMIN_PLEASE_INSERT_YOUR_SHOPID" }]");
                document.getElementById('janolaw_shopid').focus();
                return false;
            } else if (document.getElementById('janolaw_shopid').value.length > 6) {
                alert("[{ oxmultilang ident="JANOLAW_ADMIN_ERROR_INVALID_CHARCOUNT_SHOPID" }]");
                document.getElementById('janolaw_shopid').focus();
                return false;
            }
        }
    </script>

[{** 
	Do not display the link for the help page because they does not exist. 
	Therefore we must reassign $sHelpUrl to an empty string.
**}]

[{ assign var="sHelpURL" value="" }]

[{ include file="bottomnaviitem.tpl" }]

[{ include file="bottomitem.tpl" }]
{* $Header$ *}
{strip}
<div class="floaticon">{bithelp}</div>

<div class="admin sitehome">
	{if $preview}
		<h2>Preview {$gContent->mInfo.title|escape}</h2>
		<div class="preview">
			{include file="bitpackage:sitehome/display_sitehome_inc.tpl" page=`$gContent->mInfo.sitehome_id`}
		</div>
	{/if}

	<div class="header">
		<h1>
			{if $gContent->mInfo.sitehome_id}
				{tr}{tr}Edit{/tr} {$gContent->mInfo.title|escape}{/tr}
			{else}
				{tr}Create New Record{/tr}
			{/if}
		</h1>
	</div>

	<div class="body">
		{form enctype="multipart/form-data" id="editsitehomeform"}
			{jstabs}
				{jstab title="Edit"}
					{legend legend="Edit/Create SiteHome Record"}
						<input type="hidden" name="sitehome[sitehome_id]" value="{$gContent->mInfo.sitehome_id}" />

						<div class="control-group">
							{formlabel label="Title" for="title"}
							{forminput}
								<input type="text" size="60" maxlength="200" name="sitehome[title]" id="title" value="{$gContent->mInfo.title|escape}" />
							{/forminput}
						</div>

						<div class="control-group">
							{formlabel label="Description" for="description"}
							{forminput}
								<input size="60" type="text" name="sitehome[description]" id="description" value="{$gContent->mInfo.description|escape:html}" />
								{formhelp note="Brief description of the page."}
							{/forminput}
						</div>

						{include file="bitpackage:liberty/edit_format.tpl"}

						{if $gBitSystem->isFeatureActive('package_smileys')}
							{include file="bitpackage:smileys/smileys_full.tpl"}
						{/if}

						{if $gBitSystem->isFeatureActive('package_quicktags')}
							{include file="bitpackage:quicktags/quicktags_full.tpl"}
						{/if}

						<div class="control-group">
							{forminput}
								<textarea {spellchecker} id="{$textarea_id}" name="sitehome[edit]" rows="{$smarty.cookies.rows|default:20}" cols="50">{$gContent->mInfo.data|escape:html}</textarea>
							{/forminput}
						</div>

						{* any simple service edit options *}
						{include file="bitpackage:liberty/edit_services_inc.tpl" serviceFile="content_edit_mini_tpl"}

						<div class="control-group submit">
							<input type="submit" name="preview" value="{tr}Preview{/tr}" /> 
							<input type="submit" name="save_sitehome" value="{tr}Save{/tr}" />
						</div>
					{/legend}
				{/jstab}

				{if $gBitUser->hasPermission('p_liberty_attach_attachments') }
					{jstab title="Attachments"}
						<div class=row>
						{legend legend="Attachments"}
							{include file="bitpackage:liberty/edit_storage.tpl"}

						{/legend}
						</div>
					{/jstab}
				{/if}

				{* any service edit template tabs *}
				{include file="bitpackage:liberty/edit_services_inc.tpl" serviceFile="content_edit_tab_tpl"}
			{/jstabs}
		{/form}
	</div><!-- end .body -->
</div><!-- end .sitehome -->

{/strip}

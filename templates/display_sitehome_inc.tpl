{strip}
{include file="bitpackage:liberty/services_inc.tpl" serviceLocation='nav' serviceHash=$gContent->mInfo}
<div class="display sitehome">
	<div class="floaticon">
		{if $print_page ne 'y'}
			{if $gContent->hasUpdatePermission()}
				<a title="{tr}Edit this sitehome{/tr}" href="{$smarty.const.SITEHOME_PKG_URL}edit.php?sitehome_id={$gContent->mInfo.sitehome_id}">{biticon ipackage="icons" iname="accessories-text-editor" iexplain="Edit Sitehome"}</a>
				<a title="{tr}Remove this sitehome{/tr}" href="{$smarty.const.SITEHOME_PKG_URL}remove_sitehome.php?sitehome_id={$gContent->mInfo.sitehome_id}">{biticon ipackage="icons" iname="edit-delete" iexplain="Remove Sitehome"}</a>
			{/if}
			{include file="bitpackage:liberty/services_inc.tpl" serviceLocation='icon' serviceHash=$gContent->mInfo}
		{/if}<!-- end print_page -->
	</div><!-- end .floaticon -->
	
	{if $gBitSystem->isFeatureActive( 'sitehome_display_title' ) || $gBitSystem->isFeatureActive( 'sitehome_display_description' ) || $gBitSystem->isFeatureActive( 'sitehome_display_date' )}
		<div class="header">
		{if $gBitSystem->isFeatureActive( 'sitehome_display_title' )}
			<h1>{$gContent->mInfo.title|escape|default:"Sitehome"}</h1>
		{/if}
		{if $gBitSystem->isFeatureActive( 'sitehome_display_description' )}
			<p>{$gContent->mInfo.description|escape}</p>
		{/if}
		{if $gBitSystem->isFeatureActive( 'sitehome_display_date' )}
			<div class="date">
				{tr}Created by{/tr}: {displayname user=$gContent->mInfo.creator_user user_id=$gContent->mInfo.creator_user_id real_name=$gContent->mInfo.creator_real_name}, {tr}Last modification by{/tr}: {displayname user=$gContent->mInfo.modifier_user user_id=$gContent->mInfo.modifier_user_id real_name=$gContent->mInfo.modifier_real_name}, {$gContent->mInfo.last_modified|bit_long_datetime}
			</div>
		{/if}
		</div><!-- end .header -->
	{/if}
	
	<div class="body">
		<div class="content">
			{include file="bitpackage:liberty/services_inc.tpl" serviceLocation='body' serviceHash=$gContent->mInfo}
			{$gContent->mInfo.parsed_data}
		</div><!-- end .content -->
	</div><!-- end .body -->
</div><!-- end .sitehome -->
{include file="bitpackage:liberty/services_inc.tpl" serviceLocation='view' serviceHash=$gContent->mInfo}
{/strip}

{strip}
	<ul>
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}index.php">{biticon iname="go-home" iexplain="Sitehome Home" ilocation=menu}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}list_sitehomes.php">{biticon iname="format-justify-fill" iexplain="List Sitehomes" ilocation=menu}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_create' )}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}edit.php">{biticon iname="document-new" iexplain="Create Sitehome" ilocation=menu}</a></li>
		{/if}
	</ul>
{/strip}

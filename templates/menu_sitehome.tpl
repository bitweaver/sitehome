{strip}
	<ul>
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}index.php">{tr}SiteHomes Home{/tr}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_read')  || $gBitUser->hasPermission( 'p_sitehome_remove' ) }
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}list_sitehomes.php">{tr}List SiteHomes{/tr}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_create' ) || $gBitUser->hasPermission( 'p_sitehome_edit' ) }
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}edit.php">{tr}Create SiteHome{/tr}</a></li>
		{/if}
	</ul>
{/strip}

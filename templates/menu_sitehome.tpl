{strip}
	<ul>
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}index.php">{tr}SiteHomes Home{/tr}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}list_sitehomes.php">{tr}List SiteHomes{/tr}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_create' )}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}edit.php">{tr}Create SiteHome{/tr}</a></li>
		{/if}
	</ul>
{/strip}

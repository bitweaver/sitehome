{strip}
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> {tr}{$packageMenuTitle}{/tr} <b class="caret"></b></a>
<ul class="{$packageMenuClass}">
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}index.php">{booticon iname="icon-home" iexplain="Sitehome Home" ilocation=menu}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_read')}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}list_sitehomes.php">{booticon iname="icon-list" iexplain="List Sitehomes" ilocation=menu}</a></li>
		{/if}
		{if $gBitUser->hasPermission( 'p_sitehome_create' )}
			<li><a class="item" href="{$smarty.const.SITEHOME_PKG_URL}edit.php">{booticon iname="icon-file" iexplain="Create Sitehome" ilocation=menu}</a></li>
		{/if}
	</ul>
{/strip}

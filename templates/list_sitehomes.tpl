{* $Header$ *}
{strip}
<div class="floaticon">{bithelp}</div>

<div class="listing sitehome">
	<div class="header">
		<h1>{tr}SiteHome Records{/tr}</h1>
	</div>

	<div class="body">
		{minifind sort_mode=$sort_mode}

		{form id="checkform"}
			<input type="hidden" name="offset" value="{$control.offset|escape}" />
			<input type="hidden" name="sort_mode" value="{$control.sort_mode|escape}" />

			<table class="table data">
				<tr>
					{if $gBitSystem->isFeatureActive( 'sitehome_list_sitehome_id' ) eq 'y'}
						<th>{smartlink ititle="SiteHome Id" isort=sitehome_id offset=$control.offset iorder=desc idefault=1}</th>
					{/if}

					{if $gBitSystem->isFeatureActive( 'sitehome_list_title' ) eq 'y'}
						<th>{smartlink ititle="Title" isort=title offset=$control.offset}</th>
					{/if}

					{if $gBitSystem->isFeatureActive( 'sitehome_list_description' ) eq 'y'}
						<th>{smartlink ititle="Description" isort=description offset=$control.offset}</th>
					{/if}

					{if $gBitSystem->isFeatureActive( 'sitehome_list_data' ) eq 'y'}
						<th>{smartlink ititle="Text" isort=data offset=$control.offset}</th>
					{/if}

					{if $gBitUser->hasPermission( 'p_sitehome_update' )}
						<th>{tr}Actions{/tr}</th>
					{/if}
				</tr>

				{foreach item=sitehome from=$sitehomesList}
					<tr class="{cycle values="even,odd"}">
						{if $gBitSystem->isFeatureActive( 'sitehome_list_sitehome_id' )}
							<td><a href="{$smarty.const.SITEHOME_PKG_URL}index.php?sitehome_id={$sitehome.sitehome_id|escape:"url"}" title="{$sitehome.sitehome_id}">{$sitehome.sitehome_id}</a></td>
						{/if}

						{if $gBitSystem->isFeatureActive( 'sitehome_list_title' )}
							<td>{$sitehome.title|escape}</td>
						{/if}

						{if $gBitSystem->isFeatureActive( 'sitehome_list_description' )}
							<td>{$sitehome.description|escape}</td>
						{/if}

						{if $gBitSystem->isFeatureActive( 'sitehome_list_data' )}
							<td>{$sitehome.data|escape}</td>
						{/if}

						{if $gBitUser->hasPermission( 'p_sitehome_update' )}
							<td class="actionicon">
								{smartlink ititle="Edit" ifile="edit.php" booticon="icon-edit" sitehome_id=$sitehome.sitehome_id}
								<input type="checkbox" name="checked[]" title="{$sitehome.title|escape}" value="{$sitehome.sitehome_id}" />
							</td>
						{/if}
					</tr>
				{foreachelse}
					<tr class="norecords"><td colspan="16">
						{tr}No records found{/tr}
					</td></tr>
				{/foreach}
			</table>

			{if $gBitUser->hasPermission( 'p_sitehome_update' )}
				<div style="text-align:right;">
					<script type="text/javascript">/* <![CDATA[ check / uncheck all */
						document.write("<label for=\"switcher\">{tr}Select All{/tr}</label> ");
						document.write("<input name=\"switcher\" id=\"switcher\" type=\"checkbox\" onclick=\"BitBase.switchCheckboxes(this.form.id,'checked[]','switcher')\" /><br />");
					/* ]]> */</script>

					<select name="submit_mult" onchange="this.form.submit();">
						<option value="" selected="selected">{tr}with checked{/tr}:</option>
						{if $gBitUser->hasPermission( 'p_sitehome_update' )}
							<option value="remove_sitehomes">{tr}remove{/tr}</option>
						{/if}
					</select>

					<noscript><div><input type="submit" class="btn btn-default" value="{tr}Submit{/tr}" /></div></noscript>
				</div>
			{/if}
		{/form}

		{pagination}
	</div><!-- end .body -->
</div><!-- end .admin -->
{/strip}

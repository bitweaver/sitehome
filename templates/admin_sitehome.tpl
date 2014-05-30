{strip}
{form}
	{jstabs}
		{jstab title="Home SiteHome"}
			{legend legend="Select Homepage"}
				<input type="hidden" name="page" value="{$page}" /> 
				<div class="form-group">
					{formlabel label="Current Homepage" for="homeSiteHome"}
					{forminput}
						<select name="homeSiteHome" id="homeSiteHome">
							{section name=ix loop=$sitehomes}
								<option value="{$sitehomes[ix].sitehome_id|escape}" {if $sitehomes[ix].sitehome_id eq $home_sitehome}selected="selected"{/if}>{$sitehomes[ix].title|escape|truncate:20:"...":true}</option>
							{sectionelse}
								<option>{tr}No records found{/tr}</option>
							{/section}
						</select>
					{/forminput}
				</div>

				<div class="form-group submit">
					<input type="submit" class="btn btn-default" name="homeTabSubmit" value="{tr}Change preferences{/tr}" />
				</div>
			{/legend}
		{/jstab}

		{jstab title="Display Options"}
			{legend legend="Site Homepage Display Options"}
				<input type="hidden" name="page" value="{$page}" /> 
				{foreach from=$formSiteHomeOpts key=item item=output}
					<div class="form-group">
						{formlabel label=$output.label for=$item}
						{forminput}
							{html_checkboxes name="$item" values="y" checked=$gBitSystem->getConfig($item) labels=false id=$item}
							{formhelp note=$output.note page=$output.page}
						{/forminput}
					</div>
				{/foreach}

				<div class="form-group submit">
					<input type="submit" class="btn btn-default" name="optsTabSubmit" value="{tr}Change preferences{/tr}" />
				</div>
			{/legend}
		{/jstab}

		{jstab title="List Settings"}
			{legend legend="List Settings"}
				<input type="hidden" name="page" value="{$page}" />
				{foreach from=$formSiteHomeLists key=item item=output}
					<div class="form-group">
						{formlabel label=$output.label for=$item}
						{forminput}
							{html_checkboxes name="$item" values="y" checked=$gBitSystem->getConfig($item) labels=false id=$item}
							{formhelp note=$output.note page=$output.page}
						{/forminput}
					</div>
				{/foreach}

				<div class="form-group submit">
					<input type="submit" class="btn btn-default" name="listTabSubmit" value="{tr}Change preferences{/tr}" />
				</div>
			{/legend}
		{/jstab}
	{/jstabs}
{/form}
{/strip}

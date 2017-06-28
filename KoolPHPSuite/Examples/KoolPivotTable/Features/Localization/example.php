<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolAjax/koolajax.php";
	$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";

	require $KoolControlsFolder."/KoolPivotTable/koolpivottable.php";

	if(isset($_POST["localization_select"]))
	{
		$_SESSION["localization_select"] = $_POST["localization_select"];
	}
	else
	{
		if (!$koolajax->isCallback)
		{
			//Page Init: show default style
			$_SESSION["localization_select"] = "en";
		}
	}
		
	$ds = new MySQLiPivotDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
	$ds	->select("customerName, productName, productLine, dollar_sales")
		->from("customer_product_dollarsales");

	$pivot = new KoolPivotTable("pivot");
	$pivot->scriptFolder = $KoolControlsFolder."/KoolPivotTable";
	$pivot->styleFolder = "office2007";
	$pivot->DataSource = $ds;


	//Loading language
	$pivot->Localization->Load($KoolControlsFolder."/KoolPivotTable/localization/".$_SESSION["localization_select"].".xml");



	//Turn on ajax features.
	$pivot->AjaxEnabled = true;

	//Set the Width of pivot and use horizontal scrolling
	$pivot->Width = "800px";
	$pivot->HorizontalScrolling = true;

	//Set the Height of pivot and use Vertical Scrolling
	$pivot->Height = "400px";
	$pivot->VerticalScrolling = true;

	//Allow filtering
	$pivot->AllowFiltering = true;
	//Allow sorting
	$pivot->AllowSorting = true;
	//Allow reordering
	$pivot->AllowReorder = true;
	
	
	//Make the RowHeader wider.
	$pivot->Appearance->RowHeaderMinWidth = "250px";

	//Use the Prev and Next Numneric Pager
	$pivot->Pager = new PivotPrevNextAndNumericPager();
	$pivot->Pager->PageSize = 20;

	//Turn on caching to help pivot working faster.
	$pivot->AllowCaching = true;
	
	
	//Data Field
	$field = new PivotSumField("dollar_sales");
	$field->Text = "Dollar Sales";
	$field->FormatString = "\${n}";
	$field->AllowReorder = false;
	$pivot->AddDataField($field);

	//Row Fields
	$field = new PivotField("customerName");
	$field->Text = "Customer";
	$pivot->AddRowField($field);

	//Column Fields
	$field = new PivotField("productLine");
	$field->Text = "Product Line";
	$pivot->AddColumnField($field);
	
	$field = new PivotField("productName");
	$field->Text = "Product";
	$pivot->AddColumnField($field);
	
	
	//Process the pivot
	$pivot->Process();

?>

<form id="form1" method="post">
	<?php echo $koolajax->Render();?>
	Select localization:
	<select id="localization_select" name="localization_select" onchange="submit();">
		<option value="en"		<?php if ($_SESSION["localization_select"]=="en") echo "selected" ?> >English</option>
		<option value="es"		<?php if ($_SESSION["localization_select"]=="es") echo "selected" ?> >Spanish</option>
		<option value="de"		<?php if ($_SESSION["localization_select"]=="de") echo "selected" ?> >German</option>
		<option value="vn"		<?php if ($_SESSION["localization_select"]=="vn") echo "selected" ?> >Vietnamese</option>
	</select>
	
	<div style="padding-top:10px;">
		<?php echo $pivot->Render();?>
	</div>
	<div style="margin-top:10px;"><i>* <u>Note</u>:</i>Generate your own pivot table with <a style="color:#B8305E;" target="_blank" href="http://codegen.koolphp.net/pivot_table/">Code Generator</a></div>
	
</form>

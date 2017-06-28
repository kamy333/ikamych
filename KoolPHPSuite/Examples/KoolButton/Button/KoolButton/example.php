<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolForm/koolform.php";	
	$myform_manager = new KoolForm("myform");
	$myform_manager->scriptFolder = $KoolControlsFolder."/KoolForm";	
	$myform_manager->styleFolder = "office2010silver";
	$myform_manager->DecorationEnabled = true;
	
	//Button with Left Image
	$btnOK_left_image = new KoolButton("btnOK_left_image");
	$btnOK_left_image->Text = "OK";
	$btnOK_left_image->AutoPostback=true;
	$btnOK_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/check2.png";	
	$myform_manager->AddControl($btnOK_left_image);

	$btnCancel_left_image = new KoolButton("btnCancel_left_image");
	$btnCancel_left_image->Text = "Cancel";
	$btnCancel_left_image->AutoPostback=true;
	$btnCancel_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/delete2.png";	
	$myform_manager->AddControl($btnCancel_left_image);

	$btnViewInvoice_left_image = new KoolButton("btnViewInvoice_left_image");
	$btnViewInvoice_left_image->Text = "View Invoice";
	$btnViewInvoice_left_image->AutoPostback=true;
	$btnViewInvoice_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/text.png";	
	$myform_manager->AddControl($btnViewInvoice_left_image);

	$btnRate_left_image = new KoolButton("btnRate_left_image");
	$btnRate_left_image->Text = "Rate";
	$btnRate_left_image->AutoPostback=true;
	$btnRate_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/star_yellow.png";	
	$myform_manager->AddControl($btnRate_left_image);

	$btnTools_left_image = new KoolButton("btnTools_left_image");
	$btnTools_left_image->Text = "Tools";
	$btnTools_left_image->AutoPostback=true;
	$btnTools_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/gear.png";	
	$myform_manager->AddControl($btnTools_left_image);

	$btnCut_left_image = new KoolButton("btnCut_left_image");
	$btnCut_left_image->Text = "Cut";
	$btnCut_left_image->AutoPostback=true;
	$btnCut_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/cut.png";	
	$myform_manager->AddControl($btnCut_left_image);

	$btnCopy_left_image = new KoolButton("btnCopy_left_image");
	$btnCopy_left_image->Text = "Copy";
	$btnCopy_left_image->AutoPostback=true;
	$btnCopy_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/copy.png";	
	$myform_manager->AddControl($btnCopy_left_image);

	$btnPaste_left_image = new KoolButton("btnPaste_left_image");
	$btnPaste_left_image->Text = "Paste";
	$btnPaste_left_image->AutoPostback=true;
	$btnPaste_left_image->LeftImage = $KoolControlsFolder."/KoolForm/icons/plain/paste.png";	
	$myform_manager->AddControl($btnPaste_left_image);


	//Button with Right Image
	$btnOK_right_image = new KoolButton("btnOK_right_image");
	$btnOK_right_image->Text = "OK";
	$btnOK_right_image->AutoPostback=true;
	$btnOK_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/check2.png";	
	$myform_manager->AddControl($btnOK_right_image);

	$btnCancel_right_image = new KoolButton("btnCancel_right_image");
	$btnCancel_right_image->Text = "Cancel";
	$btnCancel_right_image->AutoPostback=true;
	$btnCancel_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/delete2.png";	
	$myform_manager->AddControl($btnCancel_right_image);

	$btnViewInvoice_right_image = new KoolButton("btnViewInvoice_right_image");
	$btnViewInvoice_right_image->Text = "View Invoice";
	$btnViewInvoice_right_image->AutoPostback=true;
	$btnViewInvoice_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/text.png";	
	$myform_manager->AddControl($btnViewInvoice_right_image);

	$btnRate_right_image = new KoolButton("btnRate_right_image");
	$btnRate_right_image->Text = "Rate";
	$btnRate_right_image->AutoPostback=true;
	$btnRate_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/star_yellow.png";	
	$myform_manager->AddControl($btnRate_right_image);

	$btnTools_right_image = new KoolButton("btnTools_right_image");
	$btnTools_right_image->Text = "Tools";
	$btnTools_right_image->AutoPostback=true;
	$btnTools_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/gear.png";	
	$myform_manager->AddControl($btnTools_right_image);

	$btnCut_right_image = new KoolButton("btnCut_right_image");
	$btnCut_right_image->Text = "Cut";
	$btnCut_right_image->AutoPostback=true;
	$btnCut_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/cut.png";	
	$myform_manager->AddControl($btnCut_right_image);

	$btnCopy_right_image = new KoolButton("btnCopy_right_image");
	$btnCopy_right_image->Text = "Copy";
	$btnCopy_right_image->AutoPostback=true;
	$btnCopy_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/copy.png";	
	$myform_manager->AddControl($btnCopy_right_image);

	$btnPaste_right_image = new KoolButton("btnPaste_right_image");
	$btnPaste_right_image->Text = "Paste";
	$btnPaste_right_image->AutoPostback=true;
	$btnPaste_right_image->RightImage = $KoolControlsFolder."/KoolForm/icons/plain/paste.png";	
	$myform_manager->AddControl($btnPaste_right_image);



	//Init form
	$myform_manager->Init();
?>

<form id="myform" method="post" class="decoration">
	
	<style type="text/css">
		table.table_of_buttons
		{
			width:400px;
			border-left:solid 1px #CCCCCC;
			border-top:solid 1px #CCCCCC;
		}
		table.table_of_buttons td
		{
			padding:5px 10px 5px 10px;
			border:solid 1px #CCCCCC;
			border-left:none;
			border-top:none;
		}
		table.table_of_buttons tr.alt
		{
			background:#EEEEEE;
		}
		table.table_of_buttons tr:hover
		{
			background:#FDFEE3;
		}
	</style>

	<table class="table_of_buttons">
		<tr>
			<td><b>Left Image</b></td>
			<td><b>Right Image</b></td>
		</tr>
		<tr>
			<td><?php echo $btnCut_left_image->Render(); ?></td>
			<td><?php echo $btnCut_right_image->Render(); ?></td>
		</tr>		
		<tr class="alt">
			<td><?php echo $btnCopy_left_image->Render(); ?></td>
			<td><?php echo $btnCopy_right_image->Render(); ?></td>
		</tr>
		<tr>
			<td><?php echo $btnPaste_left_image->Render(); ?></td>
			<td><?php echo $btnPaste_right_image->Render(); ?></td>
		</tr>		
		<tr class="alt">
			<td><?php echo $btnRate_left_image->Render(); ?></td>
			<td><?php echo $btnRate_right_image->Render(); ?></td>
		</tr>		
		<tr>
			<td><?php echo $btnOK_left_image->Render(); ?></td>
			<td><?php echo $btnOK_right_image->Render(); ?></td>
		</tr>
		<tr class="alt">
			<td><?php echo $btnCancel_left_image->Render(); ?></td>
			<td><?php echo $btnCancel_right_image->Render(); ?></td>
		</tr>
		<tr>
			<td><?php echo $btnViewInvoice_left_image->Render(); ?></td>
			<td><?php echo $btnViewInvoice_right_image->Render(); ?></td>
		</tr>
		<tr class="alt">
			<td><?php echo $btnTools_left_image->Render(); ?></td>
			<td><?php echo $btnTools_right_image->Render(); ?></td>
		</tr>
				
	</table>
	<?php echo $myform_manager->Render();?>
</form>
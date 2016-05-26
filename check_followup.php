<?php
session_start();
if($_SESSION['cpid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "../dbc/db_connection.php";	
	$userid = $_SESSION['cpid'];
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/script.js"></script>
		
		
		<script src="lib/dirPagination.js"></script>
		
	</head>
	<body class="nav-md" ng-app="FollowModule">
		<div class="container body" ng-controller="FollowController">
            <!-- sidebar navigation -->
			<?php include_once ("sidebar.php"); ?>	
            <!-- /sidebar navigation -->			

            <!-- top navigation -->
			<?php include_once ("top.php"); ?>	
            <!-- /top navigation -->

            <!-- page content -->
            
				 <div class="right_col">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_content">
									<form class="form-horizontal form-label-left" id="OptometristForm" autocomplete="off" enctype="multipart/form-data" ng-show="add_form" name="OptometristForm"  novalidate>
										
								 <input type="hidden" name="id" ng-model="id" value={{ Optometrist.id }}>   
										<div class="form-group">
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">MRNO</label>
												<input type="text" class="form-control" id="selectedMRNO" name="selectedMRNO" ng-readonly="true" ng-model="selectedMRNO" />
											</div>
											<div class="col-sm-6" style="padding: 0px 10px 0px 10px;">
												<label class="control-label" >Patient Name</label>
										      <input type="text" class="form-control" id="PatientName" name="PatientName" value={{PatientName}} ng-readonly="true" ng-model="PatientName" /> 
											</div>
										</div>
										
										<div class="form-group">											
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
										<label class="control-label" style="padding:0;">AR Right</label>
										<input type="text" id="ar_right" class="form-control" name="ar_right" ng-readonly="true" ng-model="ar_right" />
										</div>
										<div class="col-sm-6">
										<label class="control-label" style="padding:0;">AR Left</label>
										<input type="text" id="ar_left" class="form-control" name="ar_left" ng-readonly="true" ng-model="ar_left" />
										</div>
										</div>
										
										<div class="form-group">
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="Complaint" style="padding:0;">Complaint</label>
												<input type="text" class="form-control" id="selectedComp" name="selectedComp" ng-readonly="true" ng-model="selectedComp" />
												<p>&nbsp;</p>
												<p>
												<textarea class="form-control" placeholder="Other" name="cother" rows="2" id="cother" ng-show="cotherbox" ng-readonly="true" ng-model="cother" ></textarea>
												</p>
											</div>
											<div class="col-sm-6">
												<label class="control-label" for="History" style="padding:0;">History</label>
												<textarea class="form-control" placeholder="History" name="History"  rows="4" id="History" ng-readonly="true" ng-model="history"></textarea>
											</div>
																	
										</div>
										
										<div class="form-group ">
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="hname" style="padding:0;">Present Glass Description</label>
												<table width="100%">
													<tr>
														<td valign="bottom">
															<label style="padding: 15px 0 0 0;">Right</label>
														</td>
														<td>&nbsp;</td>
														<td>
															<label>SPHERE</label>
															<input type="text" ng-readonly="true" ng-model="Rp_sphere" class="form-control" />
														</td>
														<td>
															<label>CYL</label>
															<input type="text" ng-readonly="true" ng-model="Rp_cyl" class="form-control" />
														</td>
														<td>
															<label>AXIS</label>
															<input type="text" ng-readonly="true" ng-model="Rp_axis" class="form-control" />
														</td>
														<td>
															<label>ADD</label>
															<input type="text" ng-readonly="true" ng-model="Rp_add" class="form-control" />
														</td>
														<td>
															<label>CVA</label>
															<input type="text" ng-readonly="true" ng-model="Rp_cva" class="form-control" />
														</td>
													</tr>
													<tr>
														<td valign="middle"><label>Left</label></td>
														<td>&nbsp;</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Lp_sphere" class="form-control" />
															</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Lp_cyl" class="form-control" />
														</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Lp_axis" class="form-control" />
														</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Lp_add" class="form-control" />
														</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Lp_cva" class="form-control" />
														</td>
													</tr>
												</table>
											</div>
											
											<div class="col-sm-6" style="padding: 0px 10px 0px 10px;">
												<label class="control-label" for="hname" style="padding:0;">New Glass Prescription</label>
												<table width="100%">
													<tr>
														<td valign="bottom">
															<label style="padding: 15px 0 0 0;">Right</label>
														</td>
														<td>&nbsp;</td>
														<td>
															<label>UVA</label>
															<input type="text" ng-readonly="true" ng-model="Rn_uva" class="form-control " />
														</td>
														<td>
															<label>SPHERE</label>
															<input type="text" ng-readonly="true" ng-model="Rn_sphere" class="form-control " />
														</td>
														<td>
															<label>CYL</label>
															<input type="text" ng-readonly="true" ng-model="Rn_cyl" class="form-control " />
														</td>
														<td>
															<label>AXIS</label>
															<input type="text" ng-readonly="true" ng-model="Rn_axis" class="form-control " />
														</td>
														<td>
															<label>ADD</label>
															<input type="text" ng-readonly="true" ng-model="Rn_add" class="form-control " />
														</td>
														<td>
															<label>CVA</label>
															<input type="text" ng-readonly="true" ng-model="Rn_cva" class="form-control " />
														</td>
													</tr>
													<tr>
														<td valign="middle"><label>Left</label></td>
														<td>&nbsp;</td>
														<td>
															<input type="text" ng-readonly="true" ng-model="Ln_uva" class="form-control " />
														</td>
														<td>
															<input  type="text" ng-readonly="true" ng-model="Ln_sphere" class="form-control" />
														</td>
														<td>
															<input  type="text" ng-readonly="true" ng-model="Ln_cyl" class="form-control " />
														</td>
														<td>
															<input  type="text" ng-readonly="true" ng-model="Ln_axis" class="form-control " />
														</td>
														<td>
															<input  type="text" ng-readonly="true" ng-model="Ln_add" class="form-control " />
														</td>
														<td>
															<input  type="text" ng-readonly="true" ng-model="Ln_cva" class="form-control " />
														</td>
													</tr>
												</table>
											</div>
										</div>
										
										
										<br />
										
										
										<div class="form-group ">
										<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 0px;">
											<label class="control-label" style="padding:0;">Optometerist Name</label>
										<input type="text" id="name" class="form-control" name="name" ng-readonly="true" ng-init="get_optoname()" ng-model="name" />
											</div>
											
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 10px;">
												<label class="control-label" for="Dilation" style="padding:3px 0;">Dilation&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label>Yes&nbsp;<input type="radio" name="dilation" id="dilation" ng-model="dilation" value="Yes" ng-checked="false" ng-disabled="true" /></label>
				                              <label>No&nbsp;<input type="radio" name="dilation" id="dilation" ng-model="dilation" value="No" ng-checked="false" ng-disabled="true"  /></label>
				
											</div>
											</div>
											<br/>
											<div class="form-group ">
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="Dominant" style="padding: 3px 0;">Dominant Eye&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label>Right&nbsp;<input type="radio" name="dominanteye" id="dominanteye" ng-disabled="true" ng-model="dominanteye" ng-checked="false" value="Right" /></label>&nbsp;&nbsp;&nbsp;
				                         <label>Left&nbsp;<input type="radio" name="dominanteye" id="dominanteye" ng-disabled="true" ng-model="dominanteye" ng-checked="false" value="Left" /></label>
				
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 10px;">
											<label class="control-label" for="NCT" style="padding:3px 0;">NCT&nbsp;&nbsp;</label>
											<span style="display:block;height:0;">&nbsp;</span>
											<div style="padding: 0 5px 0 0;" class="col-md-5 col-sm-3 col-xs-12">
												<label>Right<input type="text" class="form-control" name="nctright" id="nctright" ng-readonly="true" ng-model="nctright"  /></label>
											</div>
											<div style="padding: 0 0 0 5px;" class="col-md-5 col-sm-3 col-xs-12">
												<label>Left<input type="text" class="form-control" name="nctleft" id="nctleft" ng-readonly="true" ng-model="nctleft"  /></label>
											</div>
											</div>
											
																		
										</div>
										
										<div class="form-group ">
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" style="padding: 3px 0;">Near Vision&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label><input type="checkbox" name="" id="c1" ng-disabled="true"   ng-model="n6" ng-checked="check1()"  />&nbsp;N6</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c2" ng-disabled="true"   ng-model="n8" ng-checked="check2()"  />&nbsp;N8</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c3" ng-disabled="true" ng-model="n10" ng-checked="check3()"  />&nbsp;N10</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c4" ng-disabled="true" ng-model="n12" ng-checked="check4()"  />&nbsp;N12</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c5" ng-disabled="true" ng-model="n18" ng-checked="check5()"  />&nbsp;N18</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c6" ng-disabled="true" ng-model="n24" ng-checked="check6()"  />&nbsp;N24</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c7" ng-disabled="true"  ng-model="n36" ng-checked="check7()"  />&nbsp;N36</label>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12" style="padding: 0px 10px 0px 10px;">
												<label class="control-label" style="padding: 3px 0;">Habits&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label><input type="checkbox" name="" id="c8" ng-disabled="true" ng-checked="check8()"  ng-model="smoking" />&nbsp;Smoking</label>&nbsp;&nbsp;
												<label><input type="checkbox" name="" id="c9" ng-disabled="true" ng-checked="check9()"  ng-model="alcohol" />&nbsp;Alcohol</label>
											</div>			
											<div class="col-md-3 col-sm-3 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label  for="state">Contact Lens</label>
												<select class="form-control" ng-readonly="true" ng-model="selectedcontactlens" ng-options="contactlens for contactlens in contactlensArray" >
													<option value="">[Select Contactlens]</option>
												</select>
											</div>			
										</div>
										
										<div class="form-group ">
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="Dieases" style="padding: 3px 0;">Dieases&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label><input type="checkbox"  id="c10" ng-disabled="true"   ng-model="dm" ng-checked="check10()"  />&nbsp;DM</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c11" ng-disabled="true" ng-model="hypertension" ng-checked="check11()"  />&nbsp;Hypertension</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c12" ng-disabled="true"  ng-model="cva" ng-checked="check12()"  />&nbsp;CVA</label>&nbsp;&nbsp;
												<label>&nbsp;<input type="checkbox"  id="c13" ng-disabled="true" ng-model="asthama" ng-checked="check13()"  />&nbsp;Asthama</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c14" ng-disabled="true" ng-model="ptccabc" ng-checked="check14()"  />&nbsp;PTC/CABC</label>
												<label><input type="checkbox"  id="c15" ng-disabled="true" ng-model="epilebsy" ng-checked="check15()"  />&nbsp;Epilebsy</label>
												<label><input type="checkbox"  id="c16" ng-disabled="true" ng-model="none" ng-checked="check16()"  />&nbsp;None</label>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 10px;">
												<label class="control-label"style="padding: 3px 0;">Treatment</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label><input type="checkbox" id="c17"  ng-checked="check17()" ng-disabled="true" ng-model="anticoagulants" />&nbsp;AntiCoagulants</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c18" ng-checked="check18()" ng-disabled="true" ng-model="insulin" />&nbsp;Insulin</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c19" ng-checked="check19()" ng-disabled="true" ng-model="antipsychotis" />&nbsp;Antipsychotis</label>&nbsp;&nbsp;
												<label><input type="checkbox"  id="c20" ng-checked="check20()" ng-disabled="true" ng-model="others" />&nbsp;Others</label>
											</div>			
										</div>
										
										<div class="form-group ">
											<div class="col-md-7 col-sm-7 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="Dieases" style="padding: 3px 0;">Allergies&nbsp;&nbsp;&nbsp;</label>
												<span style="display:block;height:0;">&nbsp;</span>
											<label><input type="checkbox" name="" id="c21" ng-checked="check21()" ng-disabled="true" ng-model="nill" />&nbsp;None</label>&nbsp;&nbsp;
											<label><input type="checkbox" name="" id="c22" ng-checked="check22()" ng-disabled="true" ng-model="pencillin" />&nbsp;Pencillin</label>&nbsp;&nbsp;
											<label>&nbsp;<input type="checkbox" name="" id="c23" ng-checked="check23()" ng-disabled="true" ng-model="xylocaine" />Xylocaine</label>&nbsp;&nbsp;
											<label>&nbsp;<input type="checkbox"  name="" id="c24"  ng-checked="check24()" ng-disabled="true" ng-model="sulpha" />Sulpha</label>&nbsp;&nbsp;
											<label>&nbsp;<input type="checkbox" name="" id="c25" ng-checked="check25()" ng-disabled="true" ng-model="atropin" />Atropin</label>&nbsp;&nbsp;
											<label><input type="checkbox" name=""  id="c26" ng-checked="check26()" ng-disabled="true" ng-model="drosyn" />&nbsp;Drosyn</label>
											</div>
																		
										</div>									
																		
										<div class="form-group">
											<div class="col-sm-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="History" style="padding:0;">Comments</label>
												<textarea class="form-control" placeholder="Comments" name="comments"  rows="5" id="comments" ng-readonly="true" ng-model="comments"></textarea>
											</div>		
										</div>
										
										<div class="form-group ">
											<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" for="ocular" style="padding: 3px 0;">External Ocular Examination</label>
												<span style="display:block;height:0;">&nbsp;</span>
												<label><input type="checkbox" name=""  ng-model="full" ng-disabled="true" ng-checked="check27()" />&nbsp;Full</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="restricted" ng-disabled="true" ng-checked="check28()"  />&nbsp;Restricted</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="rcs" ng-disabled="true" ng-checked="check29()" />&nbsp;RCS</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="rds" ng-disabled="true" ng-checked="check30()" />&nbsp;RDS</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="lcs" ng-disabled="true" ng-checked="check31()" />&nbsp;LCS</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="lds" ng-disabled="true"  ng-checked="check32()" />&nbsp;LDS</label>&nbsp;&nbsp;
												<label><input type="checkbox" name=""  ng-model="others" ng-disabled="true" ng-checked="check33()" />&nbsp;Others</label>									
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">Anterior Segment</label>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-12 centered" style="padding: 0px 10px 0px 0px;">
												<table width="100%">
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="35%" align="center"><label>RE</label></td>
														<td width="15%">&nbsp;</td>
														<td width="35%" align="center"><label>LE</label></td>
													</tr>
													
													<tr>
														<td><label>LIDS</label></td>
														<td><input style="font-size: 13px;line-height: 0;font-size: 13px;line-height: 0;" ng-readonly="true" type="text" ng-model="asr_lids" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;font-size: 13px;line-height: 0;" ng-readonly="true" type="text" ng-model="asl_lids" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>CONJUNCTIVA</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_conjunctiva" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_conjunctiva" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>CORNEA</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_cornea" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_cornea" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>AC</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_ac" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_ac" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>IRIS</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_iris" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_iris" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>PUPIL</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_pupil" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_pupil" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>LENS</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asr_lens" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="asl_lens" ng-readonly="true" class="form-control" /></td>
													</tr>
												</table>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12" style="padding: 0px 0px 0px 10px;">&nbsp;</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">Fundus</label>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-12 centered" style="padding: 0px 10px 0px 0px;">
												<table width="100%">
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="35%" align="center"><label>RE</label></td>
														<td width="15%">&nbsp;</td>
														<td width="35%" align="center"><label>LE</label></td>
													</tr>
													
													<tr>
														<td><label>RETINA</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusr_retina" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusl_retina" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>DISC</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusr_disc" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusl_disc" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>MACULA</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusr_macula" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusl_macula" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													
													<tr>
														<td><label>VITREOUS</label></td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusr_vitreous" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td><input style="font-size: 13px;line-height: 0;" type="text" ng-model="fundusl_vitreous" ng-readonly="true" class="form-control" /></td>
													</tr>
												</table>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12" style="padding: 0px 0px 0px 10px;">&nbsp;</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">Gonioscopy</label>
											</div>
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center"><label>RE</label></td>
													</tr>
													
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="15%" rowspan="1" style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsr_top" class="form-control" /></td>
														<td width="15%">&nbsp;</td>
													</tr>
													
													<tr>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsr_left" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsr_right" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsr_bottom" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
													</tr>
												</table>
											</div>
											<div class="col-sm-6" style="padding: 0px 0px 0px 10px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center"><label>LE</label></td>
													</tr>
													
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="15%" rowspan="1" style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text"  ng-readonly="true" ng-model="gnsl_top" class="form-control" /></td>
														<td width="15%">&nbsp;</td>
													</tr>
													
													<tr>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsl_left" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsl_right" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="gnsl_bottom" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
													</tr>
												</table>
											</div>
										</div>
																				
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">After Indentation</label>
											</div>
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center"><label>RE</label></td>
													</tr>
													
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="15%" rowspan="1" style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="air_top" ng-readonly="true" class="form-control" /></td>
														<td width="15%">&nbsp;</td>
													</tr>
													
													<tr>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="air_left" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="air_right" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="air_bottom" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
													</tr>
												</table>
											</div>
											<div class="col-sm-6" style="padding: 0px 0px 0px 10px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center"><label>LE</label></td>
													</tr>
													
													<tr>
														<td width="15%">&nbsp;</td>
														<td width="15%" rowspan="1" style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-readonly="true" ng-model="ail_top" class="form-control" /></td>
														<td width="15%">&nbsp;</td>
													</tr>
													
													<tr>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="ail_left" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="ail_right" ng-readonly="true" class="form-control" /></td>
													</tr>
													
													<tr>
														<td>&nbsp;</td>
														<td style="padding: 1px;"><input style="font-size: 13px;line-height: 0;" type="text" ng-model="ail_bottom" ng-readonly="true" class="form-control" /></td>
														<td>&nbsp;</td>
													</tr>
												</table>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-sm-12" style="padding: 0px 10px 0px 0px;">
												<label class="control-label"style="padding:0;" >Applanation</label>
											</div>
										</div>
											
										<div class="form-group">
											<div class="col-sm-4" style="padding: 0px 10px 0px 0px;">
												<label class="control-label"style="padding:0;" >RE</label>
												<input type="text" class="form-control" id="ar_left" name="ar_left" ng-readonly="true" ng-model="Applanation_RE" />
											</div>
											<div class="col-sm-4" style="padding: 0px 0px 0px 10px;">
												<label class="control-label" style="padding:0;">LE</label>
												<input type="text" class="form-control"id="ar_right" name="ar_right" ng-readonly="true" ng-model="Applanation_LE" />
											</div>
											<div class="col-sm-4" style="padding: 0px 0px 0px 10px;">
												<label style="margin: 0px;">Time</label>
												<span style="display:block;height:0;padding:0;">&nbsp;</span>
												<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0 2px 0 0;">
													<input type="text" id="time" name="time" ng-model="time" class="form-control" />
												</div>
												<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0 0 0 2px;">
													<input type="text" ng-model="selectedtimetype"  class="form-control">
														
												</div>
											</div>
										</div>
										
										<div class="form-group ">
											<div class="col-sm-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label" style="padding:0;">Provisional Diagnosis</label>
												<textarea class="form-control" name="Diagnosis" id="Diagnosis" ng-model="Diagnosis"></textarea>
											</div>
											<div class="col-sm-6" style="padding: 0px 0px 0px 10px;">
												<label class="control-label" for="care" style="padding:0;">Advice</label>
												<textarea class="form-control" placeholder="Advice" name="advice" id="advice" ng-model="advice"></textarea>
											</div>				
										</div>
										<div class="form-group ">
											<div class="col-md-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">Comments</label>
												<textarea class="form-control" placeholder="Comments" name="dcomments" id="dcomments" ng-model="dcomments"></textarea>
											</div>
											
										</div>
										<div class="form-group ">
											<div class="col-md-6" style="padding: 0px 10px 0px 0px;">
												<label class="control-label">Next Visit</label>
												<input type="date" class="form-control" ng-model="nextvisit" placeholder="Date" required value="{{ nextvisit|date :'dd/mm/yyyy'}}" /> 
												</div>
										</div>
																						
										
									</form>
									<div ng-show="list">
										<div class="form-group">
											<div class="col-md-6" style="padding: 0px 10px 0px 0px;">
												<h4>Search</h4>
												<div class="input-append">
													<input ng-model="query[queryBy]" class="form-control" />
													<span class="add-on"><i class="icon-search"></i></span>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">&nbsp;</div>
										</div>
										<div class="clearfix"></div>
										
										<p>&nbsp;</p>
										<h4 ng-show="list">FollowUp</h4>
										<table border=1 class="table table-striped table-condensed table-hover">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>MRNO</th>
													<th>Patient Name</th>
													<th>Consulted Doctor</th>
													<th>History</th>
												</tr>
											</thead>
											<tbody ng-init="get_followup()">
												<tr dir-paginate="optometrist in pagedItems|filter:query|itemsPerPage:5">
													<td>{{ $index+1 }}</td>
													<td>{{ optometrist.mrno | uppercase }}</td>
													<td>{{ optometrist.patient_name | uppercase }}</td> 
													<td>{{ optometrist.docname | uppercase }}</td> 
													<td><a href="" ng-click="view_history(optometrist.id)">Past History</a></td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="7" align="center">
														<div class="pagination pull-right"></div>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
            			</div>
        				</div>
					</div>
				</div>
				<?php include_once ("footer.php"); ?>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>

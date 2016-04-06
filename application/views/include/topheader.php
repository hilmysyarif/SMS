<?php 
$LANGUAGE=!empty($this->session->userdata('LANGUAGE')) ? $this->session->userdata('LANGUAGE'):'';

	$check=$this->utilities->select_phrase();
	$PhraseArray[]="";
	$PhraseIdArray[]="";
	foreach($check as $row)
	{
		$PhraseIdArray[]=$row->PhraseId;
		$PhraseArray[]=$row->Phrase;
	}	
	if($PhraseArray!="")
	$_SESSION['PHRASE']=implode(",",$PhraseArray);
	if($PhraseIdArray!="")
	$_SESSION['PHRASEID']=implode(",",$PhraseIdArray);
	$check1=$this->utilities->select_translate($LANGUAGE);;	
	$row1=$check1;
	$_SESSION['TRANSLATION']=isset($row1[0]->Translation)?$row1[0]->Translation:'';
	
function Translate($Phrase)
{
	$PhrasePassed="";
	if(!is_numeric($Phrase))
	{
		$PhrasePassed=1;
		$PhraseArray=explode(",",$_SESSION['PHRASE']);
		$PhraseIdArray=explode(",",$_SESSION['PHRASEID']);
		$PhraseSearch=array_search($Phrase,$PhraseArray);
		if($PhraseSearch===FALSE)
		$PhraseId="";
		else
		$PhraseId=$PhraseIdArray[$PhraseSearch];
	}
	else
	$PhraseId=$Phrase;
	$Found="";
	$Translation=$_SESSION['TRANSLATION'];
	if($Translation!="")
	$Translation=explode("||",$Translation);
	if($Translation!="")
	foreach($Translation as $TranslationValue)
	{
		$TP=explode("**",$TranslationValue);
		if($TP[0]==$PhraseId)
		{
			$Found=1;
			if(($TP[1]=="" && is_numeric($Phrase)) || $TP[1]!="")
			return($TP[1]);		
			else
			return($Phrase);
			break;
		}
	}
	
	if($Found!=1 && $PhrasePassed==1)
	return($Phrase);
}
?>
<body class="page-body skin-white" id="element">
<div class="page-loading-overlay">
				<div class="loader-2"></div>
			</div>
<nav class="navbar horizontal-menu navbar-fixed-top" style="background:url(<?=base_url();?>assets/images/4.png) repeat"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="javascript:;" class="logo">
				
				<p class="center  text-blac"><?php  if(!empty($this->currentsession)){ print_r($this->currentsession[0]->SchoolName);}else{ echo "School Management";} ?></p>
					<!--<img src="<?=base_url();?>assets/images/logo-white-bg@2x.png" width="80" alt="" class="hidden-xs" />
					<img src="<?=base_url();?>assets/images/logo@2x.png" width="80" alt="" class="visible-xs" />-->
				</a>
				
			</div>
				
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
							
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="javascript:;" data-toggle="mobile-menu-both">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
			<!-- main menu -->
				<?php   if(in_array('Settings',$this->session->userdata('pagename'))   ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>	
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;">
						<i class="linecons-cog"></i>
						<span class="title"> <?php echo Translate('Setting'); ?> </span><span class="caret"></span>
					</a>
					<ul>
					<?php  if(in_array('GeneralSetting',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/generalsetting">
								<span class="title"><?php echo Translate('General Setting'); ?></span>
							</a>
						</li>
					<?php }  if(in_array('MasterEntry',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/masterentry">
								<span class="title"><?php echo Translate('Master Entry'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageUser',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageuser">
								<span class="title"><?php echo Translate('Manage User'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageAccounts',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageaccount">
								<span class="title"><?php echo Translate('Manage Accounts'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageClass',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageclass">
								<span class="title"><?php echo Translate('Manage Class'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageSubject',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/managesubject">
								<span class="title"><?php echo Translate('Manage Subject'); ?>t</span>
							</a>
						</li>
						<?php } if(in_array('ManageExam',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageexam">
								<span class="title"><?php echo Translate('Manage Exam'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageSCArea',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/managescarea">
								<span class="title"><?php echo Translate('Manage SC Area'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageSCIndicator',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/managescindicator">
								<span class="title"><?php echo Translate('Manage SC Indicator'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageFee',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/managefee">
								<span class="title"><?php echo Translate('Manage Fees'); ?></span>
							</a>
						</li>
						<?php } if(in_array('salaryhead',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/salaryhead">
								<span class="title"><?php echo Translate('Salary Head'); ?></span>
							</a>
						</li>
						<?php } if(in_array('salarystructure',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/structuretemplate">
								<span class="title"><?php echo Translate('Salary Structure'); ?></span>
							</a>
						</li>
						<?php } if(in_array('schoolmaterial',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageschoolmaterial">
								<span class="title"><?php echo Translate('School Material'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageLocation',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/managelocation">
								<span class="title"><?php echo Translate('Manage Location'); ?></span>
							</a>
						</li>
						<?php } if(in_array('ManageHeaderFooter',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/manageheaderandfooter">
								<span class="title"><?php echo Translate('Header & Footer'); ?></span>
							</a>
						</li>
						<?php } if(in_array('PrintOption',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/printoption">
								<span class="title"><?php echo Translate('Print Option'); ?></span>
							</a>
						</li>
						<?php } if(in_array('Permission',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li>
							<a href="<?=base_url();?>master/permission">
								<span class="title"><?php echo Translate('Permission'); ?></span>
							</a>
						</li>
						<?php } ?>
					</ul>
				</li>
				
				
				
			
			</ul>
				<?php  } if(in_array('ChangeSession',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
			<ul class="navbar-nav">
				<li>
							<a href="javascript:;">
								<span class="title"><?php  if(!empty($this->currentsession[0]->SchoolStartDate)){  $year=$this->currentsession[0]->SchoolStartDate; $schoolstartyear=date("Y",$year); if(!empty($this->currentsession[0]->CurrentSession)){echo $this->currentsession[0]->CurrentSession;}else{ echo "Please Select Session"; } }else{ echo "Please Select Session"; } ?></span><span class="caret"></span>
							</a> 
					<ul>
					<?php 
					if(!empty($this->currentsession[0]->SchoolStartDate)){
					$DDMMYYYY=date("d-m-Y");
					$SCHOOLSTARTDATE=$this->currentsession[0]->SchoolStartDate;
					$SCHOOLSTARTYEAR=date("Y",$SCHOOLSTARTDATE);
					$SCHOOLSTARTPREVIOUSYEAR=$SCHOOLSTARTYEAR-1;
					$SCHOOLSTARTNEXTYEAR=$SCHOOLSTARTYEAR+1;
					$SCHOOLSTARTMONTH=date("n",$SCHOOLSTARTDATE);
					if($SCHOOLSTARTMONTH<=3)
					$SCHOOLSTARTSESSION="$SCHOOLSTARTPREVIOUSYEAR-$SCHOOLSTARTYEAR";
					else
					$SCHOOLSTARTSESSION="$SCHOOLSTARTYEAR-$SCHOOLSTARTNEXTYEAR";
					$SCHOOLSESSION[0]=$SCHOOLSTARTSESSION;
					$CURRENTYEAR=date("Y",strtotime($DDMMYYYY))+1;
					$CURRENTMONTH=date("n",strtotime($DDMMYYYY));			
					$k0=1;
					for($i0=$SCHOOLSTARTYEAR;$i0<=($CURRENTYEAR);$i0++)
					{
						$j0=$i0+1;
						$p0="$i0-$j0";
						$SCHOOLSESSION[$k0]=$p0;
						$k0++;
					}
					$SCHOOLSESSION=array_unique($SCHOOLSESSION);
					 foreach($SCHOOLSESSION as $SCHOOLSESSION){?>
						<li>
							<a href="<?=base_url();?>master/set_session/<?=$SCHOOLSESSION?>">
								<span class="title"><?=$SCHOOLSESSION?></span>
							</a>
						</li>
					<?php }}else{
						
					}?>
						
					</ul>
				</li>
				
				
				
			
			</ul>
			
				<?php } if(in_array('Balance',$this->session->userdata('pagename'))  ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
			<ul class="navbar-nav">
				<li>
				<?php $AccountBalance= $this->utilities->get_balance(); ?>
				<a href="javascript:;">
					<i class="linecons-database"></i>
					
						<span class="title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php foreach($AccountBalance as $AccountBalance){?><?=$AccountBalance->AccountName?>: <?=$AccountBalance->totalamount?> INR <?php echo"\r\n"; } ?>">
					Balance </span>
					</a>
				</li>
				
				
				
			
			</ul>
				<?php } ?>
			<ul class="navbar-nav">
				<li>
				
					<a href="javascript:;">
						<i class="fa-arrows-alt title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="Full-Screen" data-original-title="Full-Screen" onclick="var el = document.getElementById('element'); el.webkitRequestFullscreen();"></i>
						
					</a>
					
				</li>
				
				
				
			
			</ul>
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;">
						<i class="fa-expand title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="Exit Full-Screen" data-original-title="Exit Full-Screen"></i>
						
					</a>
					
				</li>
				
				
				
			
			</ul>
			
			<ul class="navbar-nav">
				<li>
				<?php $LanguageName= $this->utilities->get_language();  ?>
				<?php if(!empty($LANGUAGE)){ $LanguageName1= $this->utilities->get_languagename($LANGUAGE);  }?>
					<a href="javascript:;">
						<i class="fa-language"></i>
						<span class="title"><?=isset($LanguageName1[0]->LanguageName)?$LanguageName1[0]->LanguageName:'English'?></span> <span class="caret"></span>
					</a>
					<ul>
					 <?php foreach($LanguageName as $lang){?>
						<li>
							<a href="<?=base_url();?>master/changelanguage/<?=isset($lang->LanguageId)?$lang->LanguageId:''?>">
								<span class="title"><?=isset($lang->LanguageName)?$lang->LanguageName:''?></span>
							</a>
						</li>
						<?php } ?>
						<li>
							<a href="<?=base_url();?>master/changelanguage/0">
								<span class="title">English</span>
							</a>
						</li>
					
					</ul>
				</li>
				
				
				
			
			</ul>
					
					<ul class="navbar-nav">
				<li>
					<a href="<?=base_url();?>dashboard/help" target="blank">
						<i class=" title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="Help For Guidance" data-original-title="Help For Guidance">Help</i>
						
					</a>
					
				</li>
				
				
				
			
			</ul>
			
			<!-- notifications and other links -->
			<ul class="nav nav-userinfo navbar-right">
				<li class="dropdown user-profile">
					<a href="javascript:;" data-toggle="dropdown">
						<img src="<?=base_url();?>assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							Hi!! <?=$this->info['usermailid']?>
							<i class="fa-angle-down"></i>
						</span>
					</a>
					
					<ul class="dropdown-menu user-profile-menu list-unstyled">
						<li>
							<a href="#edit-profile">
								<i class="fa-edit"></i>
								Change Password
							</a>
						</li>
					<li class="last">
							<a href="<?=base_url();?>login/logout">
								<i class="fa-lock"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
				
			
				
			</ul>
	
		</div>
		
	</nav>

				<!-- /.navbar-collapse -->
		
			
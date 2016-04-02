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
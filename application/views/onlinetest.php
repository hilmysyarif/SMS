<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>Online Exam</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css">

	<script src="<?=base_url();?>assets/js/jquery-1.11.1.min.js"></script>
	
	<style>
	td, th {
    padding: 2px;
}
	</style>
	
	<script>
	<?php if(isset($studentinfo['timer'])){ $time=explode(":",$studentinfo['timer']); $h=$time[0]; $m=$time[1]; $s=$time[2];?>
	var h = <?=$h?>;
    var m = <?=$m?>;
    var s = <?=$s?>;
	
function startTime() 
	{
		
		 hs = h < 10 ? "0" + h : h;
		 ms = m < 10 ? "0" + m : m;
		 ss = s < 10 ? "0" + s : s;
		document.getElementById('txt').innerHTML ="Timer :" + hs + ":" + ms + ":" + ss;
		
		var t = setTimeout(startTime, 1000);
		
		<?php if(!empty($stopcounter)){?>
		clearTimeout(t);
		<?php }else{ ?>
		if(m==0 && h==0 && s==0){
			
		clearTimeout(t);
		<?php //$this->session->unset_userdata('studentinfo');?>
		window.location = "<?=base_url();?>onlineexam/preview";
		}
		<?php } ?>
		
		if(0<s){
			s=s-1;
										$.post(window.location,
											{
											  timer: hs +":"+ ms +":"+ ss,
											}, function(data,status){
										//	alert("Data: " + data + "\nStatus: " + status);
											});
		}else{
			s=59;
			m=m-1;
		}
		if(0==m && h !=0){
			h=h-1;
			m=59;
		}
	}
	<?php } ?>
	  function next() {
		 
        document.getElementById('examform').submit();
    }

</script>
</head>

<body class="page-body" onload="startTime()" >
<center>
	<div class="page-container container">
		
		<div class="main-content">
				
			
			<div class="col-md-8" style="float:none">
					
					<!-- Default panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
						<?php if(empty($finish)){?>
							<div class="row">
							
								<table  style="td.padding: 3px"><th><tr><td>Online Exam :</td><td><?=isset($studentinfo['examname'])? $studentinfo['examname'] : ''?></td><td style="padding-left: 150px" id="txt"> </td></tr>
								<tr><td> Name :</td><td><?=isset($studentinfo['StudentName'])? $studentinfo['StudentName'] : ''?></td></tr>
								<tr><td> Roll No :</td><td><?=isset($studentinfo['AdmissionNo'])? $studentinfo['AdmissionNo'] : ''?></td></tr>
								<tr><td> Class:</td><td><?=isset($studentinfo['ClassName'])? $studentinfo['ClassName'] : ''?> <?=isset($studentinfo['SectionName'])? $studentinfo['SectionName'] : ''?></td></tr>
								</th></table>
								
							</div>
						<?php }else{ ?>
						<div class="row"><p>Your Time Is Finish !!</p></div>
						<?php } ?>
						</div>
						
						<div class="panel-body">
							<?php if(isset($completed)=="ok"){ ?>
							<div>
							<p>Thank You For Participating In Exam.</p>
							<p>We Will Get You Soon Or Login To Your Account To See Result Report.</p>
							<p>Note: Before Leave Your System Please Close Your Browser Tab..</p>
							</div>
							<?php }else{  ?>
							<table width="510" border="0" align="center">
						<tbody><tr>
							<td>
							<table width="100%">
								<tbody><tr>
									
									<td align="right" style="font-size:8pt">
										Question <?=isset($studentinfo['sno'])? $studentinfo['sno'] : ''?> of <?=isset($studentinfo['totalquscount'])? $studentinfo['totalquscount'] : ''?>
									</td>
								</tr>
							</tbody></table>
							</td>
						</tr>						
						<tr><td style="font-weight:bold;font-size:12pt"><?=isset($studentinfo['sno'])? $studentinfo['sno'] : ''?>. <span id="lblQuestionText" class="cssQuestionText"><?=isset($qustion[0]->qustion)? $qustion[0]->qustion : ''?><br></span><hr></td></tr>
						<tr><td><table>
						<form action="<?=base_url();?>onlineexam/onlineexamsave" method="post" id="examform">
						<input type="hidden" value="<?=isset($qustion[0]->qust_id)? $qustion[0]->qust_id : ''?>" name="qustionid"/>
						<input type="hidden" value="<?=isset($qustion[0]->answer)? $qustion[0]->answer : ''?>" name="answer"/>
						
<tbody>
<?php $qustionoption=explode(",",$qustion[0]->qus_option); foreach($qustionoption as $qustionoption){ $opt=explode("-",$qustionoption); ?>
<tr>
<td valign="top"><input type="radio"  name="qus_option" value="<?=$opt[0]?>">&nbsp;<span class=""><?=ucwords($opt[1])?>.</span></td>
</tr>
<?php } ?>
</tbody>
</form>
</table>
</td></tr>
						<tr><td align="right"> <hr></td></tr>
						<tr><td>
							<table width="100%" border="0"><tbody><tr>
							<td align="left" width="5%" nowrap=""></td>
							<td align="right" width="95%">&nbsp;<a id="cmdNext" class="ActionLink" tabindex="3" href="javascript:;" onclick="next()">Next</a>
</td>
							</tr></tbody></table>
						</td>
						</tr>
					</tbody></table>
							<?php } ?>
						</div>
					</div>
					
				</div>
				
				
			
			
		</div>
		
	</div>
	</center>
	<center>
	<footer class="main-footer sticky footer-type-1">
		<div class="footer-inner">
			<div class="footer-text">
				&copy; 2015 
				<strong>Online Exam</strong> 
				by <a href="junctiontech.in" target="_blank">Junction Tech</a>
			</div>
			
			<div class="go-up">
				<a href="#" rel="go-top">
					<i class="fa-angle-up"></i>
				</a>
			</div>
		</div>
	</footer>
	</center>
	<!-- Bottom Scripts -->
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/js/TweenMax.min.js"></script>
	<script src="<?=base_url();?>assets/js/resizeable.js"></script>
	<script src="<?=base_url();?>assets/js/joinable.js"></script>
	<script src="<?=base_url();?>assets/js/xenon-api.js"></script>
	<script src="<?=base_url();?>assets/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?=base_url();?>assets/js/xenon-custom.js"></script>

</body>
</html>
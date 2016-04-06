
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
   
  <h2 style ="margin-top:100px"> Setup Guide</h2>
  <h4 style ="margin-top:50px;margin-bottom:20px">This setup guide page will be available in help menu in rightmost corner</h4>
  <ul>
  <li> You need to fill basic information of your school in Generalsetting page.</li>
  <li>Software date is mandatory to fill and it can not be updated further.</li>
  <li>Next you need to fill current session for your school, this is mandatory and need to be filled to run software.This is present in top menu.</li>
  <li>According to your need you can change details in master entry page.</li>
  <li>Further you can provide permissions to your user from permission page. this is all present in settings on top menu.</li>
  <li> We provide facility to upload students detail through Excel sheet.Before uploading look through the instruction file that can be downloade from this setup page.</li>
  </ul>
  <h4 style ="margin-top:50px;margin-bottom:20px"> To know more about our software ,watch this video</h4>
  <li style ="margin-top:50px;margin-bottom:20px">  Setup guide video</li>
   
   <video width="350" height="260" controls>
  <source src="<?=base_url();?>sample.mp4" type="video/mp4">

Your browser does not support the video tag.
</video>
 					
   

   <li style ="margin-top:50px;margin-bottom:20px">To download instruction file for uploading of student detail through Excel sheet</li>
    <form role="form" method="post" action="<?=base_url();?>dashboard/download">
	<div class="col-sm-12">
		
           <input type="submit" class="btn btn-info btn-lg" name="submit" value="Download File" />
	</div>
       </form>
	   
 <div class="col-sm-12" >

<a href="<?=base_url();?>master/generalsetting" class="btn btn-primary btn-lg" style="margin-top:10px ;background-color:black;float:right">Next</a>
</div>
      
 </div>
  </div>	
</div>								

</body>

<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" class="no-js"> <!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link rel="image_src" href="{$commonMetaImage|default:''}" /><title>{if $resBlogDetails.blogMetaTitle neq ''}{$resBlogDetails.blogMetaTitle|unescape:'html'|escape:'html'}{else if $settingsMetaTitle neq ''}{$settingsMetaTitle|unescape:'html'|escape:'html'}{else}{$commonMetaTitle|unescape:'html'|escape:'html'}{/if}</title><meta name="Description" content="{if $resBlogDetails.blogMetaDescription neq ''}{$resBlogDetails.blogMetaDescription|unescape:'html'|escape:'html'}{else if $settingsMetaDescription neq ''}{$settingsMetaDescription|unescape:'html'|escape:'html'}{else}{$commonMetaDescription|unescape:'html'|escape:'html'}{/if}" /><meta name="viewport" content="width=device-width"><meta name="Keywords" content="{if $resBlogDetails.blogMetaKeywords neq ''}{$resBlogDetails.blogMetaKeywords|unescape:'html'|escape:'html'}{else if $settingsMetaKeywords neq ''}{$settingsMetaKeywords|unescape:'html'|escape:'html'}{else}{$commonMetaKeywords|unescape:'html'|escape:'html'}{/if}" />{assign var="sefcategory" value=$sefcategory|default:''}<meta property="og:title" content="{$resBlogDetails.blogTitle|stripslashes}"/><meta property="og:description" content=""/><meta property="og:image" content="{$view_public_path}/uploads/blog/blog-post/{$resBlogDetails.blogImage}"/> <meta property="og:url" content="{$views_host_share}/{$resBlogDetails.blogID|sef_path:'blog':$sefcategory}"/><link rel="stylesheet" href="{$view_styles}/blog.css" />{include file='CommonJavaScript.tpl' caching=true cache_lifetime=7200}<script type="text/javascript" src="{$common_frontend_js}/captcha.page.js"></script><script type="text/javascript" src="{$common_js}/jsrender.plugin.js"></script><link rel="stylesheet" type="text/css" href="{$common_frontend_css}/print-preview.css" /><link rel="stylesheet" type="text/css" href="{$view_styles}/cms.css" /><script type="text/javascript">$(document).ready(function(){		$('#hidImageCaptchaCode').css('visibility', 'hidden');});</script>{form->basepath_script}{form->rootpath_script}<link rel="stylesheet" type="text/css" href="{$baseurl}/css/social-icon-font.css"/><link rel="stylesheet" type="text/css" href="{$baseurl}/fonts/custom-font.css"/><!-- Bootstrap --><link rel="stylesheet" type="text/css" href="{$baseurl}/css/bootstrap-theme.css"/><link rel="stylesheet" type="text/css" href="{$baseurl}/css/bootstrap.css"/><link rel="stylesheet" type="text/css" href="{$baseurl}/css/style.css"/></head><body><noscript>		<div class="noscript-alert">			<div class="alert-wrapper"><strong>{$language.msgJavascriptDisabled} </strong>{$language.msgJavascriptEnable}</div>		</div>	</noscript><header>  <div class="container">    <div class="row">      <div class="col-md-4 logo-div"> <a href="http://designs.ispg.co.in/pan01/05/DB/01/index_5.html" class="logo"><img src="{$baseurl}/images/logo.jpg"></a>        <select class="form-control select-city" >          <option>Bhopal</option>        </select>      </div>      <div class="col-md-6 mwt_nav">        <div class="row">          <nav class="navbar navbar-default">            <div class="navbar-header">              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>              <a class="navbar-brand" href="#">Menu</a> </div>            <div id="navbar" class="navbar-collapse collapse">              <ul class="nav navbar-nav">                <li class="active"><a href="http://demo.zeekin.com/DBcorp/design/V-1/home.html">Home Search</a></li>                <li><a href="http://demo.zeekin.com/DBcorp/design/home_online/city-listing.html">Pre Buying Advice</a></li>                <li><a href="http://demo.zeekin.com/DBcorp/design/home_online/post-buying-services.html">Post Buing Service</a></li>                <li><a href="http://designs.ispg.co.in/pan01/05/DB/04/home_interior_landing.html">Home Interiors</a></li>                <li><a href="http://designs.ispg.co.in/pan02/51/homeonline/home_tips.html">Home Tips</a></li>              </ul>            </div>            <!--/.container-fluid -->           </nav>        </div>      </div>      <div class="col-md-2"> <a href="#" class="cart-div">0</a> <a href="#" class="sign-in-div"><img src="{$baseurl}/images/user-icon.jpg" width="21" height="21"> SIGN IN</a>         <!-- Single button -->        <select class="language-btn">          <option>EN</option>          <option>EN</option>          <option>EN</option>        </select>      </div>    </div>  </div></header><article>  <div class="page-path-div">    <div class="container"> <a href="#">Home <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a> <a href="blog">Home Tips <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a> <span class="current">Home Tips</span> </div>  </div>  <div class="top-tab">    <div class="container">      <div class="row">	 	  {if $resBlogCategories|@count gt 0 && $settingsCategoryTree eq 'Yes'}        <div class="col-sm-9">		          <ul >		{function name=categoryTree level=0} 						{assign var="currLevel" value=$level}						{assign var="i" value=0}												{foreach from=$data item="cat" key="catkey" } 									 <li>						{if $blogCount[$cat.blogCategoryID]>0}									{html->anchor href="{$cat.blogCategoryID|sef_path:'blog/category'}" class="{if $categoryKey|default:'' eq $cat.blogCategoryKey}active{/if} Fsbold" caption="{$cat.blogCategoryName|stripslashes} <span >({$blogCount[$cat.blogCategoryID]})</span>"}								{/if}			</li>			           {if !(isset($cat['children']) && is_array($cat['children']) && !empty($cat['children']))}								{if $currLevel > 0 && $cat['children']|count|default:0>$i}									{assign var="level" value=$currLevel-1}								{else}									{assign var="i" value=$i+1}								{/if}								{/if}													{/foreach}					{/function}						{call name=categoryTree data=$resBlogCategories}            <div class="clearfix"></div>          </ul>        </div>		{/if}				        <div class="col-sm-3">          <div class="right-search">		  		  {form->start name="formBlogText" action="blog/index" method="post" enctype="multipart/form-data"}				{form->textbox name="serBlogName" placeholder="{$language.lblBlogSearch}"}				{form->submit name="submitBlogText" form="formBlogText"}				<!-- Start : Error Message Start -->				<div class="clear"></div>				<div class="blog-search-error-outer" style="display:none;">					<div class="blog-search-error-arrow"></div>					<div class="blog-search-error">{$language.errBlogSearch}</div>				</div>				<!-- End : Error Message Start -->			{form->close}		                         <span class="glyphicon glyphicon-search seachicon" aria-hidden="true"></span>          </div>        </div>      </div>    </div>  </div>  <div class="container">    <div class="row">     <div class="col-sm-8 col-md-9 pull-right">	         <div class="right-content">				{if $resBlogDetails.blogID}		          <h2 class="blog-post-title"><span>{if $settingsBlogPublishDate eq 'Yes'} {$language.lblPublishedOn} {$resBlogDetails.publishedDate|date_format:$settingsDateFormat} {$resBlogDetails.publishedDate|date_format:$settingsTimeFormat} In{/if}</span> {$resBlogDetails.blogTitle|stripslashes} </h2>		            <div class="post-tag-text">		  {if $resBlogDetails.blogTags neq ''}		  		  {assign var="i" value=0} 													{assign var="tagKeys" value=','|explode:$resBlogDetails.blogTags}													{foreach from=$resBlogTagsList item="tags" key="tag1"}  														{if $tags.blogTagID|in_array:$tagKeys}		  <a href="{$baseurl}/blog/tag/{$tags.blogTagKey}">{if $tagKeys|count>0 && $i>=1}{/if}{$tags.blogTagName}</a> 		  		  {assign var="i" value=$i+1}		  		  {/if}													{/foreach}		  		  {/if}			  		  </div>		            <div class="b-post-author">		              <div class="row">              <div class="col-md-7">                <div class="media">                  <div class="pull-left"> <a href="#"> <img src="{$baseurl}/images/img-sm.jpg" width="54" height="55"> </a> </div>                  <div class="media-body">				                    {if $settingsBlogAuthor eq 'Yes'}  <h4 class="media-heading">  {$resBlogDetails.adminname}</h4>{/if}				                      Vima pest control										</div>					                </div>				                <div class="email-phone-n">                  <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="#"> amyjohnson@homeonline.com</a></p>                  <p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> +91 7025 145 808</p>                </div>                <div class="clearfix"></div>              </div>              <div class="col-md-5">                

<div class="share-this-div"> Share This 

<a href="javascript:;" onClick="fbShare('{$views_host_share}/{$shareUrl}')"><img src="{$baseurl}/images/social-icon_03.jpg" width="29" height="29"></a> 

<a href="javascript:;" onClick="googlePlusShare('{$views_host_share}/{$shareUrl}')"><img src="{$baseurl}/images/social-icon_09.jpg" width="29" height="29"></a> 

<a href="javascript:;" onClick="pinterestShare('{$views_host_share}/{$shareUrl}','{$view_host}/public/uploads/blog/blog-post/{$resBlogDetails.blogImage}','{$resBlogDetails.blogTitle|escape:"quotes"|unescape:"html"|escape:"html"}')"><img src="{$baseurl}/images/pinit.jpg" width="29" height="29"></a> 

<a href="javascript:;" onClick="twitterShare('{$views_host_share}/{$shareUrl}','{$resBlogDetails.blogTitle|escape:'quotes'|unescape:'html'|escape:'html'}')" ><img src="{$baseurl}/images/social-icon_05.jpg" width="29" height="29"></a> 

<a href="mailto:?subject={$language.lblBlogsFrom} {$commonSiteName}&amp;body={$resBlogDetails.blogTitle|unescape:'html'|escape:'url'} Checkout: {$views_host_share}/{$shareUrl}"><img src="{$baseurl}/images/message.jpg" width="29" height="29"></a> 



</div>     

         </div>          
		 </div>     

     </div>	
	 
	 {if $resBlogDetails.blogImage neq ''}	
	 
	 <p><img src="{$view_public_path}/uploads/blog/blog-post/{$resBlogDetails.blogImage}" title="{$resBlogDetails.blogTitle|stripslashes}" width="100%" ></p>	
	 {/if}	
	 
	 <div class="default-style">{$resBlogDetails.blogContent|stripslashes}</div>
	 
	 
	 
	 <div class="comments-div">  
	 
	 <h3>Comments</h3>     
	 
	 <div class="media">  
	 
	 <div class="pull-left"> 
	 
	 <a href="#"> <img src="{$baseurl}/images/img02.png"> </a>
	 
	 </div>     
	 
	 <div class="media-body">    
	 
	 <h4 class="media-heading">Media heading <span>on 12 May,2015 | at 11:45am</span></h4> 
	 
	 Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla 
	 
	 </div>           

	 </div>   
	 
	 <div class="media">  
	 
	 <div class="pull-left"> 
	 
	 <a href="#"> <img src="{$baseurl}/images/img02.png"> </a>

	 </div>  
	 
	 <div class="media-body">   
	 
	 <h4 class="media-heading">Media heading <span>on 12 May,2015 | at 11:45am</span></h4> 
	 
	 Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla

	 </div>   
	 
	 </div>        
	 
	 <div class="media">    
	 
	 <div class="pull-left">
	 
	 <a href="#"> <img src="{$baseurl}/images/img02.png"> </a> 
	 
	 </div>   
	 
	 <div class="media-body">   
	 
	 <h4 class="media-heading">Media heading <span>on 12 May,2015 | at 11:45am</span></h4>  
	 
	 Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla Hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla 
	 
	 </div>       
	 
     </div>  
	 
	 <div class="load-more-div">
	 
	 <a href="#">Load More <img src="{$baseurl}/images/refresh-animated.gif"></a>
	 
	 </div> 
	 
	 <h3>Leave a Reply</h3> 
	 
	 <div class="leavereply-div"> 
	 
	 <div class="row">    
	 
	 <div class="col-sm-6">
	 
	 <p><input type="text" class="form-control" placeholder="Name" >
	 
	 </p>
	 
	 </div> 
	 
	 <div class="col-sm-6">
	 
	 <p><input type="text" class="form-control" placeholder="Email" ></p>
	 
	 </div> 
	 
	 <div class="col-sm-12">
	 
	 <p><textarea placeholder="Enter Your Comment" rows="5" class="form-control"></textarea></p> 
	 
	 <div class="post-button">  
	 
	 <a href="#" class="btn btn-orange">Post Comment</a> 

	 </div> 
	 
	 </div> 
	 
	 </div>  
	 
	 </div> 
	 
	 </div>  
	 
	 </div>	
	 
	 {/if}	
	 
	 </div>  
	 
	 <div class="col-sm-4 col-md-3 pull-left">  
	 
	 <div class="side-bar-div">		
	 
	 <h3>{$language.lblCategories}</h3>  
	 
     <ul class="cat-links">  
	 
	 {foreach from=$blogsubcat item=subcat}	
	 
	 {if $subcat.blogCategoryParent>0}	
	 
	 <li class="active"><a href="{$subcat.blogCategoryID|sef_path:'blog/category'}">{$subcat.blogCategoryKey} 
	 <span>({$blogCount[$subcat.blogCategoryID]})</span></a></li>
	 
	 {/if}		
	 
	 {/foreach}	
	 
	 </ul>      
	 
	 <h3>Meet Our Experts</h3>          
          <ul class="our-expert">
            <li class="active">
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <li>
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <li>
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <li>
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <li>
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <li>
              <div class="img-div"> <a href="http://designs.ispg.co.in/pan02/51/homeonline/expert_detail.html" class="link"></a> <img src="{$baseurl}/images/out-team.jpg" width="98" height="98"> </div>
              <h4>Thomas Jefferson</h4>
              Vaastu Expert </li>
            <div class="clearfix"></div>
          </ul>
		  
          <a href="http://designs.ispg.co.in/pan02/51/homeonline/our_experts.html" class="view-all-btn">View all experts <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>  
		  
		  {if $resBlogTags|@count gt 0 && $settingsTagCloud eq 'Yes'} 
			
          <div class="tags-div">
		  
            <h3>{$language.lblTags}</h3>
			
			{foreach from=$resBlogTags item="tag" key="tagCount"}  

						{if ($tagCount < $settingsTagCloudCount && $settingsTagCloudCount !='') || ($settingsTagCloudCount == '')} 
						
             <a href="{$baseurl}/blog/tag/{$tag.blogTagKey}" class="{if $tagKey|default:'' eq $tag.blogTagKey}active{/if}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> {$tag.blogTagName|stripslashes}</a> 
			
			{/if}

					{/foreach}
			
			</div>
			
			{/if} 
			
		  </div> 
		  </div>  
		  </div>  
		  </div>
		  </article>
		  <footer>
		  <div class="footer-div">  
		  <div class="container">   
		  <div class="row">         
		  <div class="col-sm-4 col-md-2"> 
		  <h5>Resources</h5>       
		  <ul>                    
		  <li><a href="#">Footer Link</a></li> 
		  <li><a href="#">Footer Link</a></li>  
		  <li><a href="#">Footer Link</a></li>  
		  <li><a href="#">Footer Link</a></li>     
		  <li><a href="#">Footer Link</a></li>  
		  <li><a href="#">Footer Link</a></li>  
		  </ul>               
		  </div>        
		  <div class="col-sm-4 col-md-2">
		  <h5>Company</h5>       
		  <ul>                   
		  <li><a href="#">Footer Link</a></li> 
		  <li><a href="#">Footer Link</a></li> 
		  <li><a href="#">Footer Link</a></li> 
		  <li><a href="#">Footer Link</a></li> 
		  </ul>               
		  </div>            
		  <div class="col-sm-4 col-md-5"> 
		  <h5>Get in Touch</h5>           
		  <table cellpadding="0" cellspacing="0" width="100%">   
		  <tr>                       
		  <td width="25" valign="top"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>                            <td valign="top">Dolor sit amet, consectetuer adipiscing elit, </td>     
                   </tr>                        <tr>                        	<td width="25" valign="top"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>                            <td valign="top">Dolor sit amet, consectetuer adipiscing elit, </td>                        </tr>                    </table>                    <br>                    <h5>Follow Us</h5>                    <div class="footer-social-icon">                    	<a href="#"><img src="{$baseurl}/images/f-fb-icon.png"></a>                        <a href="#"><img src="{$baseurl}/images/f-in-icon.png"></a>                        <a href="#"><img src="{$baseurl}/images/f-tw-icon.png"></a>                    </div>                </div>              <div class="col-sm-12 col-md-3">               	<h5>Customer Service</h5>                	<p><strong>1800 0000 0000</strong> Toll Free</p>                    <p><strong>1800 0000 0000</strong> International Helpline</p>                    <br>                     <a href="#"><img src="{$baseurl}/images/googl-play-icon.png"></a>                </div>            </div>   		 </div>    </div></footer><script type="text/javascript" src="{$baseurl}/js/jquery.min.js"></script><script type="text/javascript" src="{$baseurl}/js/bootstrap.js"></script><script type="text/javascript" src="{$baseurl}/js/script.js"></script><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>  <script src="../js2/html5shiv.js"></script>  <script src="../js2/respond.min.js"></script><![endif]-->{html->messages_script section="BlogView" id="common_message"}{form->validate_script form="formComments"}{form->rootpath_script}{form->basepath_script} {include file='CommonJavaScriptBottom.tpl' caching=true cache_lifetime=7200} <script type="text/javascript">	var lblConfirmDeleteGeneral	="{$language.lblConfirmDeleteGeneral}";	var msgPostReplyComment	='';	var msgVerifyReply	='';	var msgConfirmDelete =	"{$language.lblConfirmDeleteGeneral}";	var commentTitle	=	"{$language.lblEnterYourComment}";	{literal}		$(".comments").click(function() { 			$("body,html").animate({scrollTop: $('.blog_view').height()}, 800);			return false;		});	function testClick(){		var str	=	$('#content_comment').html();		$('#content_comment').remove();		$('.main_comment').append("<div class='content' id='content_comment'>"+str+"</div>");		$('.cancel').css('display','none');		$("#hidImageCaptchaCode").val('');		$('#captchaCode').load(function(){				refreshCaptcha();			});	}	function captchaload(){ 		setCapcha();  }{/literal}</script><script type="text/javascript" src="{$common_frontend_js}/blog.page.js"></script><script type="text/javascript" src="{$common_js}/fancybox.plugin.js"></script><script type="text/javascript" src="{$common_js}/jquery.printpreview.plugin.js"></script><script type="text/javascript">	$(document).ready(function(){	$("#mailIt").fancybox({		'width'				: 600,		'height'			: 500,		'autoScale'			: false,		'transitionIn'		: 'none',		'transitionOut'		: 'none',		'type'				: 'iframe',		'titleShow'         : false,		'iframe_page'		: "",	});	$("#printIt").click(function(){		window.print();	});});</script>	</body></html>
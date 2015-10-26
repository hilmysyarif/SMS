<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('library_model');
		$this->load->model('master_model');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }

	 /*school management Library controller start*/	
	function managebook($id=false)
	{	
		if(Authority::checkAuthority('managebook')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Books', base_url().'library/managebook');
		$this->data['Token']=bin2hex(mcrypt_create_iv(10, MCRYPT_DEV_RANDOM));			
		if($id){
				$this->data['bookid']=$id;
				$filter = array('BookId'=>$id);
				$this->data['updatebook'] = $this->library_model->get_info($filter,'book');
				
		}
		$this->data['purpose'] = $this->library_model->get_purpose();
		$this->data['subject'] = $this->library_model->get_subject(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['booklist'] = $this->library_model->getbooklist();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managebook',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	/*school management Library Insert/Update Book start*/	
	function insertbook($id=false)
	{	
		if(Authority::checkAuthority('managebook')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		if($this->input->post('bookname') && $this->input->post('authorname') && $this->input->post('publisher')){
			$data=array('BookStatus'=>'Active',
						'BookName'=>$this->input->post('bookname'),
						'AuthorName'=>$this->input->post('authorname'),
						'Publisher'=>$this->input->post('publisher'),
						'SubjectId'=>$this->input->post('subject'),
						'Purpose'=>$this->input->post('purpose'),
						'Price'=>$this->input->post('price'),
						'DOEUsername'=>$this->info['usermailid']);
		
		if($this->input->post('bookid')){
				$filter = array('BookId'=>$this->input->post('bookid'));
				$this->library_model->insertbook('book',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("managebook").' Book Updated Successfully!!');
				
		}else{
				$this->library_model->insertbook('book',$data);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("managebook").' Book Added Successfully!!');
		}
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("managebook").' All the fields are mandatory!!');
		}
		    redirect('library/managebook');
	}
	
	/*school management Library Confirm List Book start*/	
	function confirmlist()
	{	
		if(Authority::checkAuthority('managebook')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		if($this->input->post('date') && $this->input->post('remarks') && $this->input->post('token')){
			
			$Token=$this->input->post('token');
			
			$check= $this->library_model->getaccession();
			$AccessionNoArray='';$Found='';
			foreach($check as $row){
			$AccessionNoArray[]=$row->AccessionNo;
			}
			$check1= $this->library_model->getaccessionbytoken($Token);
			$count1=count($check1);
			if(!empty($AccessionNoArray)){
			foreach($check1 as $row1)
			{
				$AccessionNo=$row1->AccessionNo;
				$SearchIndex=array_search($AccessionNo,$AccessionNoArray);
				if($SearchIndex===FALSE) {}
				else
				{
					$Found++;
					$AccessionNoFound[]=$AccessionNo;
				}
			}
			}
			if($count1==0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managebook")."No book list found!!");
			}	
			elseif($Found>0)
			{
				$AccessionNoFound=implode(",",$AccessionNoFound);
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managebook")."Acession No \"$AccessionNoFound\" are already added!!");
			}else{
			
			$data=array('ListBookConfirmStatus'=>'Active',
						'DOA'=>strtotime($this->input->post('date')),
						'DOE'=>strtotime(date("y M d")),
						'Token'=>$this->input->post('token'),
						'DOEUsername'=>$this->info['usermailid']);
			$data1=array('ListBookStatus'=>'Active');
			$filter1=array('Token'=>$this->input->post('token'));
				$this->library_model->insertbook('listbookconfirm',$data);
				$this->library_model->insertbook('listbook',$data1,$filter1);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("managebook").' New books are added into the list successfully!!!!');
		
			}}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("managebook").' All the fields are mandatory!!');
		}
		    redirect('library/managebook');
	}
	
	 /*school management Library controller start*/	
	function issuereturn($action=false,$id=false)
	{	
		if(Authority::checkAuthority('issuereturn')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Issue & Return 
		<a href="'.base_url().'library/issuereturn/student"><span class="badge badge-red ">Student</span></a> 
		<a href="'.base_url().'library/issuereturn/staff"><span class="badge badge-info  ">Staff</span></a>', base_url().'library/issuereturn');
		
		
		if($action==""){
				$this->data['action']=$action="student";
		}else{
			$this->data['action']=$action;
		}
		if(!empty($id))
		{
			$this->data['id']=$id;
			
					$check3= $this->library_model->getreturnbok();
					foreach($check3 as $row3)
					{
						$BookNameArray[]=$row3->BookName;
						$BookAuthorNameArray[]=$row3->AuthorName;
						$BookAccessionNoArray[]=$row3->AccessionNo;
						$BookListBookIdArray[]=$row3->ListBookId;
					}
			
			if($action=="student"){
			$check4= $this->library_model->getreturnstu($id);
			}else{
			 $check4= $this->library_model->getreturnstaff($id);
			}
			
			$count4=count($check4);
						if($count4>0)
						{
							$row4=$check4;
							$this->data['ReturnName']=$ReturnName=$row4[0]->Name;
							$this->data['ReturnMobile']=$ReturnMobile=$row4[0]->Mobile;
							$ReturnBooks=explode(",",$row4[0]->Books);
							$ReturnDOI=date("d M Y,h:ia",$row4[0]->DOI);
							$ReturnBookReturnWithDateTime=explode(",",$row4[0]->BookReturn);
							
							foreach($ReturnBookReturnWithDateTime as $ReturnBookReturnWithDateTimeValue)
							{	
								$ReturnBookReturnWithDateTimeValue=explode("-",$ReturnBookReturnWithDateTimeValue);
								
								$ReturnBookId[]=$ReturnBookReturnWithDateTimeValue[0];
								$ReturnBookDateTime[]=isset($ReturnBookReturnWithDateTimeValue[1])?$ReturnBookReturnWithDateTimeValue[1]:'';
							}
							$ReturnRemarks=$row4[0]->Remarks;
							$NotReturnedBooks=array_diff($ReturnBooks,$ReturnBookId);
							foreach($NotReturnedBooks as $NotReturnedBooksValue)
							{	$NotReturnedBookList='';
								$NotReturnSearchIndex=array_search($NotReturnedBooksValue,$BookListBookIdArray);
								$NotReturnBookName=$BookNameArray[$NotReturnSearchIndex];
								$NotReturnBookAuthorName=$BookAuthorNameArray[$NotReturnSearchIndex];
								$NotReturnBookAccessionNo=$BookAccessionNoArray[$NotReturnSearchIndex];
								$NotReturnedBookList.="<option value=\"$NotReturnedBooksValue\">($NotReturnBookAccessionNo) $NotReturnBookName $NotReturnBookAuthorName</option>";
							}
							$this->data['NotReturnedBookList']=isset($NotReturnedBookList)?$NotReturnedBookList:'';
						}
			
			
		}
		
		if($action=="student"){
			$this->data['selectbox'] = $this->library_model->getstudentisuue(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
			$this->data['issuelist'] = $this->library_model->getissueliststu();
		}else{
			$this->data['selectbox'] = $this->library_model->getstaffisuue();
			$this->data['issuelist'] = $this->library_model->getissueliststaff();
		}
		
		$this->data['book'] = $this->library_model->getbookissue();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('issue&return',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	/*school management Library Insert/Update Book start*/	
	function issuebook($id=false)
	{	
		if(Authority::checkAuthority('issuereturn')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		if($this->input->post('bookid') && $this->input->post('issueto') && $this->input->post('doissue') && $this->input->post('remarks')){
				$Books=$this->input->post('bookid');
				$IRToDetail=$this->input->post('issueto');
				$IRTo=$this->input->post('to');
				$DOI=$this->input->post('doissue');
				$Remarks=$this->input->post('remarks');
				$Date=date("d M Y h:i");
				$CountBooks=count($Books);
				foreach($Books as $BookId)
				{
					$i++;
					$QuerySearch.=" ListBookId='$BookId' ";
					if($i<$CountBooks)
					$QuerySearch.=" or ";
				}
				$QuerySearch="( $QuerySearch )";
				
				$check=$this->library_model->getissueaccession($QuerySearch);
				foreach($check as $row)
				{
					$BookName=$row->BookName;
					$AuthorName=$row->AuthorName;
					$IRStatus=$row->IRStatus;
					$AccessionNo=$row->AccessionNo;
					if($IRStatus=="Issued")
					{
						$IssueBooks++;
						$AccessionNoList[]=$AccessionNo;
					}
				}
				
				if($IRTo=="student")
				{
				
					$check1=$this->library_model->checkstu($this->currentsession[0]->CurrentSession,$IRToDetail);
				}
				elseif($IRTo=="staff")
				{
					$check1=$this->library_model->checkstaff($IRToDetail);
				}
				
				$count1=count($check1);
				
				if($IssueBooks>0)
				{
					$AccessionNo=implode(",",$AccessionNoList);
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("issuereturn")."Book $AccessionNo already issued!!");		
				}
				elseif($count1!=1)
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("issuereturn")."$IRTo is not valid!!");
				}
				else
				{
					$Books=implode(",",$Books);
					$DOE=strtotime($Date);
					$DOITimeStamp=strtotime($DOI);
					
					$this->library_model->issuebook($IRTo,$IRToDetail,$Books,$DOITimeStamp,$Remarks,$DOE,$this->info['usermailid']);
					$this->library_model->updatebook($QuerySearch);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("issuereturn").' Book Issue Successfully!!');
				}
				
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("issuereturn").' All the fields are mandatory!!');
		}
		    redirect('library/issuereturn/'.$IRTo);
	}
	
	/*school management Library Return Book start*/	
	function bookreturn()
	{	
		if(Authority::checkAuthority('issuereturn')==true){
			
		}else{
		$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
		redirect('dashboard');
		}
		
		if($this->input->post('irto') && $this->input->post('bookissueid') && $this->input->post('bookreturnid') && $this->input->post('dor')){
				$IRTo=$this->input->post('irto');
				$BookIssueId=$this->input->post('bookissueid');
				$ReturnBooks=$this->input->post('bookreturnid');
				$DOR=strtotime($this->input->post('dor'));
				$Date=date("d M Y h:i");
				
				$check=$this->library_model->getboksreturninfo($IRTo,$BookIssueId);
				$count=count($check);

				if($count>0)
				{
					$row=$check;
					
					$Books=explode(",",$row[0]->Books);
					$BookReturnOriginal=$row[0]->BookReturn;
					$BookReturn=explode(",",$row[0]->BookReturn);
					foreach($BookReturn as $BookReturnValue)
					{
						$BookReturnValeWithDateTime=explode("-",$BookReturnValue);
						$ReturnBookId[]=$BookReturnValeWithDateTime[0];
						$ReturnBookDateTime[]=$BookReturnValeWithDateTime[1];
					}
				}
				
				$CountReturnBooks=count($ReturnBooks);
				foreach($ReturnBooks as $ReturnBooksValue)
				{
					$SearchForIndex=array_search($ReturnBooksValue,$Books);
					if($SearchForIndex===FALSE) { $NotFoundInIssuedBook++; }
					$SearchForIndex2=array_search($ReturnBooksValue,$ReturnBookId);
					if($SearchForIndex2===FALSE){}
					else
					{$FoundInReturnedBook++;}
					if($BookReturnOriginal=="")
					$BookReturnOriginal="$ReturnBooksValue-$DOR";
					else
					$BookReturnOriginal.=",$ReturnBooksValue-$DOR";
					$UpdateQuery.=" ListBookId='$ReturnBooksValue' ";
					$i++;
					if($i<$CountReturnBooks)
					$UpdateQuery.=" or ";
				}
				$UpdateQuery="( $UpdateQuery )";
				
				if($FoundInReturnedBook>0)
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("bookreturn").' Some of the book is already returned!!');
				}
				elseif($NotFoundInIssuedBook>0)
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("bookreturn").' Some of the book are not issued!!');	
				}
				elseif($count!=1)
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("bookreturn").' This is not a valid URL!!');
				}
				else
				{
					$this->library_model->updatebookissue($BookReturnOriginal,$BookIssueId);
					$this->library_model->updatebooklist($UpdateQuery);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("bookreturn").' Book returned successfully!!');
				}
				
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("bookreturn").' All the fields are mandatory!!');
		}
		    redirect('library/issuereturn/'.$IRTo."/".$BookIssueId);
	}

	/*school management Library Delete start........................................................................*/	
	function delete($action=false,$on=false,$id=false)
	{
	
		if($id){
			$filter=array($on=>$this->data['id']=$id);
			$this->master_model->delete($action,$filter);
			$this->master_model->delete($action,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete").' Deleted Successfully!!');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	}
/*school management Library Delete End.............................................................................*/

}

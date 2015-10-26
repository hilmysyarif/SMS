<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispatchreceiving extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('dispatchreceiving_model');
		$this->load->model('authority_model');
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
		$this->info= $this->session->userdata('user_data');
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	 
	function dispatch($id=false)
	{			
	   if($id!='')
	   {
		  
		 
		  $this->data['id']=$id;
		  $did=$this->data['did']=$this->dispatchreceiving_model->dispatch_up($id);
		 //print_r($did);die;
	   }
	   
	   $this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Dispatch Register ', base_url().'dispatchreceiving/dispatch');
	   
		$list=$this->data['list']=$this->dispatchreceiving_model->show_dispatch_list();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('dispatch',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function add_dispatch()
	{		
		if($this->input->post('add'))
		{
		$data=array('Reference'=>$this->input->post('Reference'),
					'AddressTo'=>$this->input->post('AddressTo'),
					'Remarks'=>$this->input->post('Remarks'),
					'Title'=>$this->input->post('Title'),
					'Date'=>strtotime($this->input->post('Date')),
					'DRType'=>'dispatch');
					
					
		
		if($this->input->post('id'))
		{
			$filter=array('Id'=>$this->input->post('id'));
			$this->dispatchreceiving_model->insert_call($data,'drregister',$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("dispatch").' Dispatch Updated Successfully');
		}else
		{
		
		$this->dispatchreceiving_model->insert_call($data,'drregister');
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("dispatch").' Dispatch Added Successfully');
		
		}
		
	}
	redirect('dispatchreceiving/dispatch');
		
	}
	
	function delete_dispatch_data($id)
	{
		if($id)
			//print_r($id);die;
		{
		$this->dispatchreceiving_model->delete_dispatch($id);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("delete_receiving_data").' Deleted Successfully');
				redirect('dispatchreceiving/dispatch');

		}
	}
	
	

	
	
	function receiving($id=false)
	{	
		if($id!='')
		{
			
		  $this->data['id']=$id;
		  $rid=$this->data['rid']=$this->dispatchreceiving_model->receiving_up($id);
		}
	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Receiving Register ', base_url().'dispatchreceiving/receiving');
	
		$listrec=$this->data['listrec']=$this->dispatchreceiving_model->show_receiving_list();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('receiving',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
    function add_receiving()
	{
		if($this->input->post('add'))
		{
		$data=array('Reference'=>$this->input->post('Reference'),
					'AddressTo'=>$this->input->post('AddressTo'),
					'Remarks'=>$this->input->post('Remarks'),
					'Title'=>$this->input->post('Title'),
					'Date'=>strtotime($this->input->post('Date')),
					'DRType'=>'receiving');
					
					
					
		if($this->input->post('id'))
		{
			$filter=array('Id'=>$this->input->post('id'));
			$this->dispatchreceiving_model->insert_call($data,'drregister',$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("receive").' Receiving Updated Successfully');
		}
		
		else
		{
		
		$this->dispatchreceiving_model->insert_call($data,'drregister');
		$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("receive").' Receiving Added Successfully');
		}
		
	}
	redirect('dispatchreceiving/receiving');
		
	}

	function delete_receiving_data($id)
	{
		if($id)
			//print_r($id);die;
		{
		$this->dispatchreceiving_model->delete_receiving($id);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("delete_receiving_data").' Deleted Successfully');
		}
		redirect('dispatchreceiving/receiving');
	}
}
	
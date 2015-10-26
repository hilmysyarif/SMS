<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transports extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('Transport_model');
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
	/*Transports transport view load start................................................................................................*/
	function transport($action=false,$id=false)
	{	
	if(Authority::checkAuthority('Transport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Transport Reading And Fuel', base_url().'transports/transport');
		
		if($action && $id !=''){
			if($action=='vehicle'){
				
				$this->data['vehicleid']=$id;
				$this->data['vehicle_up'] = $this->Transport_model->get_vehicle_byid($id);
				
			}elseif($action=='fuel'){
				
					$this->data['fuelid']=$id;
					$this->data['fuel_up'] = $this->Transport_model->get_fuel_byid($id);
					
			}elseif($action=='reading'){
				
					$this->data['readingid']=$id;
					$this->data['reading_up'] = $this->Transport_model->get_reading_byid($id);
					
			}else{
				
			}
		}
		$this->data['vehicle'] = $this->Transport_model->get_vehicle();
		
		if($this->input->post('fuelstartingdate') && $this->input->post('fuelenddate')){
			$FDTSFuel=strtotime($this->input->post('fuelstartingdate'));
			$TDTSFuel=strtotime($this->input->post('fuelenddate'));
			$id=$this->input->post('fuelvehicleid');
			$FuelVehicleQuery=" and vehiclefuel.VehicleId='$id' ";
			$this->data['fuelstartingdate']=$this->input->post('fuelstartingdate');
			$this->data['fuelenddate']=$this->input->post('fuelenddate');
			$this->data['fuelvehicleid']=$this->input->post('fuelvehicleid');
			$this->data['fuel'] = $this->Transport_model->get_fuel($FDTSFuel,$TDTSFuel,$FuelVehicleQuery);
		}else{
			$this->data['fuelstartingdate']=date("Y-m-d");
			$this->data['fuelenddate']=date("Y-m-d");
			$Date=date("Y-m-d");
			$FuelVehicleQuery="";
			$DateddMMyyyy=date("d-m-Y",strtotime($Date));
									$FromDateFuel=$DateddMMyyyy;
									$ToDateFuel=$DateddMMyyyy;
									$FromDateFuelStart="$FromDateFuel 00:00";
									$ToDateFuelEnd="$ToDateFuel 23:59";
									$FDTSFuel=strtotime($FromDateFuelStart);
									$TDTSFuel=strtotime($ToDateFuelEnd);
		$this->data['fuel'] = $this->Transport_model->get_fuel($FDTSFuel,$TDTSFuel,$FuelVehicleQuery);
		}
		
		if($this->input->post('readingstartingdate') && $this->input->post('readingenddate')){
			$FDTSFuel=strtotime($this->input->post('readingstartingdate'));
			$TDTSFuel=strtotime($this->input->post('readingenddate'));
			$id=$this->input->post('readingvehicleid');
			$FuelVehicleQuery=" and vehiclereading.VehicleId='$id' ";
			$this->data['readingstartingdate']=$this->input->post('readingstartingdate');
			$this->data['readingenddate']=$this->input->post('readingenddate');
			$this->data['readingvehicleid']=$this->input->post('readingvehicleid');
			$this->data['reading'] = $this->Transport_model->get_reading($FDTSFuel,$TDTSFuel,$FuelVehicleQuery);
		}else{
			$this->data['readingstartingdate']=date("Y-m-d");
			$this->data['readingenddate']=date("Y-m-d");
			$Date=date("Y-m-d");
			$FuelVehicleQuery="";
			$DateddMMyyyy=date("d-m-Y",strtotime($Date));
									$FromDateFuel=$DateddMMyyyy;
									$ToDateFuel=$DateddMMyyyy;
									$FromDateFuelStart="$FromDateFuel 00:00";
									$ToDateFuelEnd="$ToDateFuel 23:59";
									$FDTSFuel=strtotime($FromDateFuelStart);
									$TDTSFuel=strtotime($ToDateFuelEnd);
		$this->data['reading'] = $this->Transport_model->get_reading($FDTSFuel,$TDTSFuel,$FuelVehicleQuery);
		}
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('transport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Transports transport view load End................................................................................................*/
	
	/*Transport Insert And Update Vehicle  start................................................................................................*/
	function insert_vehicle()
	{	
	if(Authority::checkAuthority('Transport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date=date("Y-m-d");
			$Date=strtotime($Date);
			
			$data=array('VehicleNumber'=>$this->input->post('vehicle_no'),
			'VehicleName'=>$this->input->post('vehicle_name'),
			'DOE'=>$Date,
			'VehicleStatus'=>'Active');
			
		if($this->input->post('vehicleid')){
			$filter=array('VehicleId'=>$this->input->post('vehicleid'));
			$this->Transport_model->insert($data,'vehicle',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Vehicle Updated Successfully!!');
		}else{
		$this->Transport_model->insert($data,'vehicle');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Vehicle Added Successfully!!');
		}
		}
		redirect('transports/transport');
	}
	 /*Transport Insert And Update Vehicle  End................................................................................................*/
	
	/*Transport Insert And Update Fuel  start................................................................................................*/
	function insert_fuel()
	{	
	if(Authority::checkAuthority('Transport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date1=date("Y-m-d");
			$Date1=strtotime($Date1);
			$Date=strtotime($this->input->post('dofuel'));
			
			$data=array('VehicleId'=>$this->input->post('vehicle'),
			'Quantity'=>$this->input->post('quantity'),
			'Rate'=>$this->input->post('rate'),
			'DOF'=>$Date,
			'ReceiptNo'=>$this->input->post('receiptno'),
			'DOE'=>$Date1,
			'Remarks'=>$this->input->post('remark'),
			'FuelStatus'=>'Active');
			
		if($this->input->post('fuelid')){
			$filter=array('FuelId'=>$this->input->post('fuelid'));
			$this->Transport_model->insert($data,'vehiclefuel',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Fuel Updated Successfully!!');
		}else{
		$this->Transport_model->insert($data,'vehiclefuel');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Fuel Added Successfully!!');
		}
		}
		redirect('transports/transport');
	}
	 /*Transport Insert And Update Fuel  End................................................................................................*/
	
	/*Transport Insert And Update Reading  start................................................................................................*/
	function insert_reading()
	{	
	if(Authority::checkAuthority('Transport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date1=date("Y-m-d");
			$Date1=strtotime($Date1);
			$Date=strtotime($this->input->post('doreading'));
			
			$data=array('VehicleId'=>$this->input->post('vehicle'),
			'Reading'=>$this->input->post('reading'),
			'DOR'=>$Date,
			'Remarks'=>$this->input->post('remark'),
			'DOE'=>$Date1,
			'VehicleReadingStatus'=>'Active');
			
		if($this->input->post('readingid')){
			$filter=array('VehicleReadingId'=>$this->input->post('readingid'));
			$this->Transport_model->insert($data,'vehiclereading',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Reading Updated Successfully!!');
		}else{
		$this->Transport_model->insert($data,'vehiclereading');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("transport").' Reading Added Successfully!!');
		}
		}
		redirect('transports/transport');
	}
	 /*Transport Insert And Update Reading  End................................................................................................*/
	
	
	/*Transports route view load start................................................................................................*/
	function route($action=false,$id=false,$uproutedetail=false,$updetailid=false)
	{	
	if(Authority::checkAuthority('TransportRoute')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Transport Route', base_url().'transports/route');
		
		if($action=="updateroute"){
			$this->data['routeid']=$id;
			$this->data['route_update'] = $this->Transport_model->get_route_update(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'',$id);
		}elseif($action=="viewroute"){
			$this->data['viewrouteid']=$id;
			$this->data['route_single'] = $this->Transport_model->get_route_single($id,!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
			$this->data['student'] = $this->Transport_model->get_student($this->currentsession[0]->CurrentSession);
			$this->data['routedetails_list'] = $this->Transport_model->get_route_details($id);
			if($uproutedetail=="updateroutedetail" && $updetailid){
				$this->data['updetailid']=$updetailid;
				$this->data['routedetails_up'] = $this->Transport_model->get_route_details_up($id,$updetailid);
			}
			
		}
		
		$this->data['route_list'] = $this->Transport_model->get_route_list(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['vehicle_list'] = $this->Transport_model->get_vehicle();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('route',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Transports Route view load End................................................................................................*/

	/*Transport Insert And Update route  start................................................................................................*/
	function insert_route()
	{	
	if(Authority::checkAuthority('TransportRoute')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date1=date("Y-m-d");
			$Date1=strtotime($Date1);
			$routestop=implode(",",$this->input->post('routestop'));
			$data=array('VehicleRouteName'=>$this->input->post('routename'),
			'VehicleId'=>$this->input->post('vehicle'),
			'Route'=>$routestop,
			'RouteTo'=>$this->input->post('to'),
			'VehicleRouteRemarks'=>$this->input->post('remark'),
			'DOE'=>$Date1,
			'Session'=>$this->currentsession[0]->CurrentSession,
			'VehicleRouteStatus'=>'Active');
			
		if($this->input->post('routeid')){
			$filter=array('VehicleRouteId'=>$this->input->post('routeid'));
			$this->Transport_model->insert($data,'vehicleroute',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("route").' Route Updated Successfully!!');
		}else{
		$this->Transport_model->insert($data,'vehicleroute');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("route").' Route Added Successfully!!');
		}
		}
		redirect('transports/route');
	}
	 /*Transport Insert And Update route  End................................................................................................*/
	
	/*Transport Insert And Update route Details start.................................................................................*/
	function insert_routedetails()
	{	
	if(Authority::checkAuthority('TransportRoute')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date1=date("Y-m-d");
			$Date1=strtotime($Date1);
			
			$data=array('RouteStoppageId'=>$this->input->post('stoppage'),
			'VehicleRouteId'=>$this->input->post('routeid'),
			'Students'=>$this->input->post('student'),
			'DOE'=>$Date1,
			'VehicleRouteDetailStatus'=>'Active');
			
		if($this->input->post('updetailid')){
			$filter=array('VehicleRouteDetailId'=>$this->input->post('updetailid'));
			$this->Transport_model->insert($data,'vehicleroutedetail',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("route").' Route Details Updated Successfully!!');
		}else{
		$this->Transport_model->insert($data,'vehicleroutedetail');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("route").' Route Details Added Successfully!!');
		}
		}
		redirect('transports/route/viewroute/'.$this->input->post('routeid'));
	}
	 /*Transport Insert And Update route Details End........................................................................................*/
	
	
	
		
	
}

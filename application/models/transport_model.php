<?php
class Transport_model extends CI_Model
{
	//variable initialize
	var $title   = '';
	var $content = '';
	var $date    = '';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	function get_vehicle()
	{
			$qry = $this->db->query("select VehicleName,VehicleNumber,VehicleId from vehicle where VehicleStatus='Active' order by VehicleName");	
			return $qry->Result();	
	}
	
	function get_fuel($FDTSFuel=false,$TDTSFuel=false,$FuelVehicleQuery=false)
	{
			$qry = $this->db->query("select FuelId,ReceiptNo,Quantity,Rate,DOF,VehicleName,VehicleNumber from vehiclefuel,vehicle where
										vehiclefuel.VehicleId=vehicle.VehicleId and FuelStatus='Active' and DOF>='$FDTSFuel' and DOF<='$TDTSFuel' $FuelVehicleQuery");	
			return $qry->Result();	
			
	}
	
	function get_reading($FDTSReading=false,$TDTSReading=false,$ReadingVehicleQuery=false)
	{
			$qry = $this->db->query("select VehicleReadingId,Reading,DOR,VehicleName,VehicleNumber from vehiclereading,vehicle where
										vehiclereading.VehicleId=vehicle.VehicleId and VehicleReadingStatus='Active' and DOR>='$FDTSReading' and DOR<='$TDTSReading' $ReadingVehicleQuery");	
			return $qry->Result();	
			
	}
	
	function insert($data=false,$table=false,$filter=false)
	{
		if($filter !=''){
		$this->db->where($filter);
    	$this->db->update($table,$data);
		}else{
			$this->db->insert($table,$data);
			//echo $this->db->last_query();die;
		}
	}
	
	function get_vehicle_byid($UniqueId=false)
	{
			$qry = $this->db->query("select * from vehicle where VehicleId='$UniqueId'");	
			return $qry->Result();	
	}
	
	function get_fuel_byid($UniqueId=false)
	{
			$qry = $this->db->query("select VehicleId,ReceiptNo,Quantity,Rate,DOF,Remarks from vehiclefuel where FuelId='$UniqueId' and FuelStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_reading_byid($UniqueId=false)
	{
			$qry = $this->db->query("select VehicleId,Reading,DOR,Remarks from vehiclereading where VehicleReadingId='$UniqueId' and VehicleReadingStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_route_list($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select VehicleRouteId,VehicleRouteName,VehicleName,VehicleNumber,Route,MasterEntryValue from vehicle,vehicleroute,masterentry where
		VehicleRouteStatus='Active' and
		vehicleroute.VehicleId=vehicle.VehicleId and
		vehicleroute.RouteTo=masterentry.MasterEntryId and
		vehicleroute.Session='$CURRENTSESSION' 
		order by VehicleRouteName");	
			return $qry->Result();	
	}
	
	function get_route_update($CURRENTSESSION=false,$UniqueId)
	{
			$qry = $this->db->query("select * from vehicleroute where VehicleRouteId='$UniqueId' and Session='$CURRENTSESSION'");	
			return $qry->Result();	
	}
	
	function get_student($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select admission.AdmissionId,StudentName,FatherName,ClassName,SectionName,Mobile,Distance from registration,class,section,admission,studentfee where
			registration.RegistrationId=admission.RegistrationId and
			admission.AdmissionId=studentfee.AdmissionId and
			studentfee.Session='$CURRENTSESSION' and
			studentfee.SectionId=section.SectionId and
			class.ClassId=section.ClassId 
			order by StudentName,FatherName");	
			return $qry->Result();	
	}
	
	function get_route_details($UniqueId=false)
	{
			$qry = $this->db->query("Select VehicleRouteDetailId,RouteStoppageId,MasterEntryValue,Students,DOE from vehicleroutedetail,masterentry where
		vehicleroutedetail.RouteStoppageId=masterentry.MasterEntryId and
		VehicleRouteId='$UniqueId' and
		VehicleRouteDetailStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_route_single($UniqueId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select * from vehicleroute where VehicleRouteId='$UniqueId' and Session='$CURRENTSESSION'");	
			return $qry->Result();	
	}
	
	function get_route_details_up($UniqueId=false,$SUniqueId=false)
	{
			$qry = $this->db->query("select VehicleRouteDetailId,VehicleRouteId,RouteStoppageId,Students from vehicleroutedetail where VehicleRouteDetailId='$SUniqueId' and VehicleRouteId='$UniqueId'");	
			return $qry->Result();	
	}
	
	
	
	
	 
}
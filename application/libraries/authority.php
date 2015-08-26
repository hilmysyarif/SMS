<?php 
/*  class for read permissions for user authority  */
class Authority  
{
	public static function checkAuthority($function)
	{
		$obj =& get_instance();
		$user_session_data = $obj->session->userdata('user_data');	
		$role=$user_session_data['UserType'];
		$list_permision=$obj->data['list_permision']=$obj->authority_model->list_permision($role);
		if($list_permision !=''){
		$permissionstring=explode(",",$list_permision[0]->PermissionString);
		foreach($permissionstring as $var)
		{	
			$checkpage=$obj->authority_model->checkpage($var);
			
		  if($checkpage[0]->PageName==$function || $role==0)
			{  
			return true;
			}
		}
		}elseif($list_permision =='' || $role==0){
			return true;
		}else{
					$obj->session->set_flashdata('category_error', " You Are Not Authorised To Access $function");        
				
					redirect('dashboard');
			}		
	}
}
/*END OF FILE*/

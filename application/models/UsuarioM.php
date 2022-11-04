<?php  
/**
 * 
 */
class UsuarioM extends CI_Model
{
	
	function validaUsuario($Correo, $Pass){
		$sql="Select IdUsuario, Correo, Perfil from Usuarios where Correo = '$Correo' and Pass = '$Pass'";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->result();
	}
}?>
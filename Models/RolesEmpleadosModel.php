<?php 

	class RolesEmpleadosModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectRolesEmpleados()
		{
			// $whereAdmin = "";
			// if($_SESSION['idUser'] != 1 ){
			// 	$whereAdmin = " and idrolempleado != 1 ";
			// }
			//EXTRAE ROLES
			// $sql = "SELECT * FROM rol_empleado WHERE status != 0".$whereAdmin;
			$sql = "SELECT * FROM rol_empleado WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectRolesEmpleadosventa()
{
    $sql = "SELECT 
                re.idrolempleado AS rol_id,
                re.nombrerolempleado AS rol_nombre,
                p.idpersona AS persona_id,
                CONCAT(p.nombres, ' ', p.apellidos) AS persona_nombre
            FROM 
                rol_empleado re
            LEFT JOIN 
                persona p ON re.idrolempleado = p.rolidempleado
            WHERE 
                re.status != 0 
                AND (p.status IS NULL OR p.status != 0)
                AND p.idpersona IS NOT NULL  -- Solo roles asignados a personas
            ORDER BY 
                re.idrolempleado, p.nombres, p.apellidos;";
    $request = $this->select_all($sql);
    return $request;
}
// public function selectRolesEmpleadosventa()
// {
//     $sql = "SELECT 
//                 re.idrolempleado AS rol_id,
//                 re.nombrerolempleado AS rol_nombre,
//                 p.idpersona AS persona_id,
//                 CONCAT(p.nombres, ' ', p.apellidos) AS persona_nombre
//             FROM 
//                 rol_empleado re
//             LEFT JOIN 
//                 persona p ON re.idrolempleado = p.rolidempleado
//             WHERE 
//                 re.status != 0 
//                 AND (p.status IS NULL OR p.status != 0)
//                 AND LOWER(re.nombrerolempleado) NOT IN ('cargador') -- Excluir el rol Cargador en minúsculas
//             ORDER BY 
//                 re.idrolempleado, p.nombres, p.apellidos;";
//     $request = $this->select_all($sql);
//     return $request;
// }


		public function selectRol(int $idrol)
		{
			//BUSCAR ROLE
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM rol_empleado WHERE idrolempleado = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}

		public function insertRol(string $rol, string $descripcion, int $status){

			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol_empleado WHERE nombrerolempleado = '{$this->strRol}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO rol_empleado(nombrerolempleado,descripcion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol_empleado WHERE nombrerolempleado = '$this->strRol' AND idrolempleado != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE rol_empleado SET nombrerolempleado = ?, descripcion = ?, status = ? WHERE idrolempleado = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE rol_empleado SET status = ? WHERE idrolempleado = $this->intIdrol ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}
	}
 ?>
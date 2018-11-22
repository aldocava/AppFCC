<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anuncio_model extends CI_Model {

    public function __construct(){
        parent::__construct();
	}
	
	public function getAnuncios(){
		$cadena="select * from anuncio order by Fecha_inicio;";
		$query = $this->db->query($cadena);
		if ($query->num_rows() > 0)
			return $query;
		else
			return FALSE;
	}

	public function getMisAnuncios( $data ){
		$cadena="select * from anuncio where Usuarios_idUsuarios=".$data["idUsuario"]." order by Fecha_inicio;";
		$query = $this->db->query($cadena);
		if ($query->num_rows() > 0)
			return $query;
		else
			return FALSE;
	}

	public function getAnuncio( $data ){
		$cadena="select * from `anuncio` where `Id_Anuncio`=".$data["Id_Anuncio"].";";
		$query = $this->db->query($cadena);
		if ($query->num_rows() > 0)
			return $query;
		else
			return FALSE;
	}

	public function pushAnuncio( $data ){
		$cadena="insert into anuncio(Nombre,Fecha_inicio,Fecha_fin,Imagen,Descripcion,Usuarios_idUsuarios) 
		values('".$data["nombre"]."','".$data["fecha_inicio"]."','".$data["fecha_fin"]."','".$data["image"]."','".$data["descripcion"]."','".$data["idUsuario"]."');";
		$this->db->query($cadena);
	}

	public function updateAnuncio( $data ){
		$cadena="update anuncio set Nombre='".$data["Nombre"]."', Fecha_inicio=".$data["Fecha_inicio"].", Fecha_fin='".$data["Fecha_fin"]."', Descripcion='".$data["Descripcion"]."' where Id_Anuncio=".$data["Id_Anuncio"].";";
		$this->db->query($cadena);
	}

	public function deleteAnuncio( $data ){
		$cadena="delete from anuncio where Id_Anuncio=".$data["Id_Anuncio"].";";
		$this->db->query($cadena);
	}

}

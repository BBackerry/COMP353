<?php
class Organization_model extends CI_Model {

	function get_organization($idOrganization)
	{
		$sql = "SELECT * FROM organization WHERE idOrganization = ? ";
		$query = $this->db->query($sql, array($idOrganization)); 
		return $query->result();
	}

	function get_all_organization()
	{
		$sql = "SELECT * FROM organization ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_organization($idOrganization, $organizationName)
	{
		$sql = "INSERT INTO organization VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idOrganization, $organizationName)); 
		return $query;
	}

	function update_organization($idOrganization, $organizationName )
	{
		$sql = "UPDATE organization SET organizationName = ? WHERE idOrganization = ? ";
		$query = $this->db->query($sql, array( $organizationName, $idOrganization)); 
		return $query;
	}

	function delete_organization($idOrganization)
	{
		$sql = "DELETE FROM organization WHERE idOrganization= ? ";
		$query = $this->db->query($sql, array($idOrganization)); 
		return $query;
	}

}
?>
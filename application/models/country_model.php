<?php
class Country_model extends CI_Model {

	function get_country($idCountry)
	{
		$sql = "SELECT * FROM country WHERE idCountry = ? ";
		$query = $this->db->query($sql, array($idCountry)); 
		return $query->result();
	}

	function get_all_country()
	{
		$sql = "SELECT * FROM country ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_country($idCountry, $countryName)
	{
		$sql = "INSERT INTO country VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idCountry, $countryName)); 
		return $query;
	}

	function update_country($idCountry, $countryName )
	{
		$sql = "UPDATE country SET countryName = ? WHERE idCountry = ? ";
		$query = $this->db->query($sql, array( $countryName, $idCountry)); 
		return $query;
	}

	function delete_country($idCountry)
	{
		$sql = "DELETE FROM country WHERE idCountry= ? ";
		$query = $this->db->query($sql, array($idCountry)); 
		return $query;
	}

}
?>
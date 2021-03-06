<?php
class User_model extends CI_Model {
	
	function get_all_users()
	{
		$sql = "SELECT * FROM user ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_user($userID)
	{
		$sql = "SELECT * FROM user WHERE idUser = ? ";
		$query = $this->db->query($sql, array($userID)); 
		return $query->result();
	}

	function create_user($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)
	{
		$sql = "INSERT INTO user (idUser, password, firstName, lastName, email, country, organization, confirmed, department) VALUES(?, ?, ?, ?, ?, ?, ?, 0, ?)";
		$query = $this->db->query($sql, array($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)); 
		return $query;
	}

	function update_user($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)
	{
		$sql = "UPDATE user SET password = ?, firstName = ?, lastName = ?, email = ?, country = ?, organization = ?, department = ?  WHERE idUser = ?";
		$query = $this->db->query($sql, array( $password, $firstName, $lastName, $email, $country, $organization, $department, $idUser)); 
		return $query;
	}

	function validate_user($idUser)
	{
		$sql = "UPDATE user SET confirmed = 1 WHERE idUser = ?";
		$query = $this->db->query($sql, array($idUser)); 
		return $query;
	}

	function delete_user($idUser)
	{
		$sql = "DELETE FROM user WHERE idUser= ? ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query;
	}
}
?>
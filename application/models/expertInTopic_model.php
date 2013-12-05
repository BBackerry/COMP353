<?php
class ExpertInTopic_model extends CI_Model {

	function get_expertInTopic_of_user($idUser)
	{
		$sql = "SELECT * FROM expertInTopic WHERE idUser = ? ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query->result();
	}

	function get_all_expertInTopic()
	{
		$sql = "SELECT * FROM expertInTopic ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_all_expertInTopic_of_topic($idTopic)
	{
		$sql = "SELECT * FROM expertInTopic WHERE idTopic = ?";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query->result();
	}

	function create_expertInTopic($idUser, $idTopic)
	{
		$sql = "INSERT INTO expertInTopic VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idUser, $idTopic)); 
		return $query;
	}

	function delete_expertInTopic($idUser, $idTopic)
	{
		$sql = "DELETE FROM expertInTopic WHERE idUser= ? AND idTopic = ?";
		$query = $this->db->query($sql, array($idUser, $idTopic)); 
		return $query;
	}
	
	function delete_expertInTopic_by_user($idUser)
	{
		$sql = "DELETE FROM expertInTopic WHERE idUser= ?";
		$query = $this->db->query($sql, array($idUser)); 
		return $query;
	}
}
?>
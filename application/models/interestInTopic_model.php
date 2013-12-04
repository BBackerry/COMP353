<?php
class InterestInTopic_model extends CI_Model {

	function get_interestInTopic_of_user($idUser)
	{
		$sql = "SELECT * FROM interestInTopic WHERE idUser = ? ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query->result();
	}
	
	function get_Topic_by_interested_user($idUser)
	{
		$sql = "SELECT * FROM topic t WHERE EXISTS(SELECT * FROM interestInTopic i WHERE i.idTopic = t.idTopic AND i.idUser = ?) ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query->result();
	}
	
	function get_all_interestInTopic()
	{
		$sql = "SELECT * FROM interestInTopic ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_all_interestInTopic_of_topic($idTopic)
	{
		$sql = "SELECT * FROM interestInTopic WHERE idTopic = ?";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query->result();
	}

	function create_interestInTopic($idUser, $idTopic)
	{
		$sql = "INSERT INTO interestInTopic VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idUser, $idTopic)); 
		return $query;
	}

	function delete_interestInTopic($idUser, $idTopic)
	{
		$sql = "DELETE FROM interestInTopic WHERE idUser= ? AND idTopic = ?";
		$query = $this->db->query($sql, array($idUser, $idTopic)); 
		return $query;
	}
	
	function delete_interestInTopic_by_user($idUser)
	{
		$sql = "DELETE FROM interestInTopic WHERE idUser= ?";
		$query = $this->db->query($sql, array($idUser)); 
		return $query;
	}

}
?>
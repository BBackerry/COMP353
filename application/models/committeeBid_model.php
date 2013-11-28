<?php
class CommitteeBid_model extends CI_Model {

	function get_committeeBid($idUser, $idPaper)
	{
		$sql = "SELECT * FROM committeeBid WHERE idUser = ? AND idPaper = ? ";
		$query = $this->db->query($sql, array($idUser, $idPaper));
		return $query->result();
	}

	function getget_all_committeeBid()
	{
		$sql = "SELECT * FROM committeeBid";
		$query = $this->db->query($sql, array($idUser, $idPaper));
		return $query->result();
	}

	function get_committeeBid_by_user($idUser)
	{
		$sql = "SELECT * FROM committeeBid WHERE idUser = ? ";
		$query = $this->db->query($sql, array($idUser));
		return $query->result();
	}

	function get_committeeBid_by_paper($idPaper)
	{
		$sql = "SELECT * FROM commiteeBid WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper));
		return $query->result();
	}

	function create_committeeBid($idUser, $idPaper, $bid)
	{
		$sql = "INSERT INTO committeeBid VALUES( ?, ?, ?)";
		$query = $this->db->query($sql, array($idUser, $idPaper, $bid));
		return $query;
	}

	function update_committeeBid($idUser, $idPaper, $bid)
	{
		$sql = "UPDATE committeeBid SET bid = ? WHERE idUser = ? AND idPaper = ?";
		$query = $this->db->query($sql, array( $bid, $idUser, $idPaper));
		return $query;
	}

	function delete_committeeBid($idUser, $idPaper)
	{
		$sql = "DELETE FROM committeeBid WHERE idUser= ? AND idPaper = ?";
		$query = $this->db->query($sql, array($idUser, $idPaper));
		return $query;
	}

}
?>
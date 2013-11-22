<?php

/**
 * Get a User by ID
 *
 */
function db_get_user($userID)
{
   $CI = get_instance();
   $sql = "SELECT * FROM user WHERE idUser = ? ";

   $query = $CI->db->query($sql, array($userID)); 
   return $query;
}

function db_create_user($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)
{
   $CI = get_instance();
   $sql = "INSERT INTO user VALUES( ?, ?, ?, ?, ?, ?, ?, 0, ?)";

   $query = $CI->db->query($sql, array($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)); 
   return $query;
}

function update_user($idUser, $password, $firstName, $lastName, $email, $country, $organization, $department)
{
   $CI = get_instance();
   $sql = "UPDATE user SET password = ?, firstName = ?, lastName = ?, email = ?, country = ?, organization = ?, department = ?  WHERE idUser = ?";

   $query = $CI->db->query($sql, array( $password, $firstName, $lastName, $email, $country, $organization, $department, $idUser)); 
   return $query;
}

function validate_user($idUser)
{
   $CI = get_instance();
   $sql = "UPDATE user SET confirmed = 1 WHERE idUser = ?";

   $query = $CI->db->query($sql, array($idUser)); 
   return $query;
}

function delete_user($idUser)
{
   $CI = get_instance();
   $sql = "DELETE FROM user WHERE idUser= ? ";

   $query = $CI->db->query($sql, array($idUser)); 
   return $query;
}

function get_collumns()
{
    return('idUser', 'password','firstName','lastName','email', 'country','organization','confirmed','department');
}

?>
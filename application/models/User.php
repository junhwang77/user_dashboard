<?php
class User extends CI_Model {
    function get_all_users()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }
    function get_user_by_email($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }
    function get_user_by_id($id)
    {
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }
    function add_user($user)
    {
        $query = "INSERT INTO users (first_name, last_name, email, password, salt, user_level, created_at, updated_at) VALUES(?,?,?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['salt'], $user['user_level'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function edit_user_info($user)
    {
        $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ?, updated_at = ? WHERE id = ?";
        $set = array($user['first_name'], $user['last_name'], $user['email'], $user['user_level'], date("Y-m-d, H:i:s"), $user['id']);
        return $this->db->query($query, $set);
    }
    function edit_user_desc($user)
    {
        $query = "UPDATE users SET description = ?, updated_at = ? WHERE id = ?";
        $set = array($user['description'], date("Y-m-d, H:i:s"), $user['user_id']);
        return $this->db->query($query, $set);
    }
    function edit_password($user)
    {
        $date = date("Y-m-d, H:i:s");
        $query = "UPDATE users SET password = ?, salt = ?, updated_at = ? WHERE id = ?";
        $set = array($user['password'], $user['salt'], date("Y-m-d, H:i:s"), $user['id']);
        return $this->db->query($query, $set);
    }
    function remove_user($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $where = array($id);
        return $this->db->query($query, $where);
    }
}

 ?>

<?php

namespace Quockhanh\Asignment2\Models;

use Quockhanh\Asignment2\common\Model;

class Users extends Model
{
    protected $table = "users";
    // protected $primary_key = "id";
    protected $fillable = ["name", "email", "password", "image", "address", "phone", "role"];
    // protected $rules = [
    //     "name" => "required",
    //     "email" => "required|email",
    //     "password" => "required",
    //     "role" => "required"
    // ];
    public function getAll()
    {
        $sql = "SELECT 
        r.name AS r_name,
        u.id AS u_id,
        u.name AS u_name,
        u.email AS u_email,
        u.password AS u_password,
        u.image AS u_image,
        u.address AS u_address,
        u.phone AS u_phone,
        u.role AS u_role
    FROM $this->table u
    INNER JOIN roles r ON u.role = r.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertUser($data)
    {
        $columns = implode(', ', $this->fillable);
        $placeholders = ':' . implode(', :', $this->fillable);
        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);

        foreach ($this->fillable as $column) {
            $stmt->bindParam(':' . $column, $data[$column]);
        }

        $stmt->execute();
    }


    public function getUserById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateUser($id, $data)
    {
        try {
            $sql = "UPDATE $this->table SET name = :name, email = :email, password = :password WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->execute();
        } catch (\PDOException $e) {
            $err = $e->getMessage();
            return "<script>Không thể cập nhật $this->table với lỗi:$err </script>";
        }
    }

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            $err = $e->getMessage();
            return "<script>Không thể xóa $this->table với lỗi:$err </script>";
        }
    }

    public function getEmailAndPassword($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch();
    }
}

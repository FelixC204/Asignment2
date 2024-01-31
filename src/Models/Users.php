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
        $sql = "SELECT * FROM $this->table";
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
}

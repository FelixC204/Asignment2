<?php

namespace Quockhanh\Asignment2\Models;

use Quockhanh\Asignment2\common\Model;

class Categories extends Model
{
    protected $table = "category";

    protected $fillable = [
        "name",
        "create_at"
    ];

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insert($data)
    {
        try {
            $sql = "INSERT INTO $this->table (name,create_at) VALUES(:name,:create_at)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $data["name"], \PDO::PARAM_STR);
            $stmt->bindParam(":create_at", $data["create_at"], \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($id, $name)
    {
        try {
            $sql = "UPDATE $this->table SET name = :name where id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id,);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getCategoryById($id)
    {
        try {    
            $sql = "SELECT * FROM $this->table WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function deleteCategory($id)
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

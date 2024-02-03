<?php

namespace Quockhanh\Asignment2\Models;

use Quockhanh\Asignment2\common\Model;

class Posts extends Model
{
    protected $table = "post";
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'thumbnail',
    ];

    public function insert($data)
    {
        $sql = "INSERT INTO $this->table (title,excerpt,content,thumbnail,category_id) VALUES (:title,:excerpt,:content,:thumbnail,:category_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':excerpt', $data['excerpt']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':thumbnail', $data['thumbnail']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->execute();
    }


    public function getPostById($id)
    {
        $sql = "       
        SELECT
            c.name c_name,
            p.id p_id,
            p.title p_title,
            p.excerpt p_excerpt,
            p.content p_content,
            p.thumbnail p_thumbnail,
            p.category_id p_category_id
            FROM post p
            INNER JOIN category c 
            ON p.category_id = c.id
            WHERE p.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getAll()
    {
        try {
            $sql = "       
        SELECT
            c.name c_name,
            p.id p_id,
            p.title p_title,
            p.excerpt p_excerpt,
            p.thumbnail p_thumbnail
            FROM post p
            INNER JOIN category c 
            ON p.category_id = c.id
        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function update($id, $data)
    {
        $sql = "
        UPDATE $this->table
        SET category_id     = :category_id, 
            title           = :title, 
            excerpt         = :excerpt, 
            content         = :content, 
            thumbnail           = :thumbnail
        WHERE id = :id
        ";

        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':title',  $data['title']);
        $stmt->bindParam(':excerpt',  $data['excerpt']);
        $stmt->bindParam(':content',  $data['content']);
        $stmt->bindParam(':thumbnail',  $data['thumbnail']);

        $stmt->execute();
    }
}

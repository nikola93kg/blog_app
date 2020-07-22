<?php 

class Post extends QueryBuilder {

    public $newPostStatus = null;

    public function createPost() {
        $title = $_POST['post_title'];
        $desc = $_POST['post_desc'];
        $created_at = date('Y.m.d H:i');
        $user_id = $_SESSION['loggedUser']->id;

        $sql = "INSERT INTO posts VALUES (NULL, :t, :d, :u, :c)";
        $query = $this->db->prepare($sql);
        $query->execute([
            ":t" => $title,
            ":d" => $desc,
            ":u" => $user_id,
            ":c" => $created_at
        ]);

        if ($query) {
            $this->newPostStatus = true;
        } else {
            $this->newPostStatus = false;
        }
    }
    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([":id"=>$id]);
    }
    public function selectById($id) {
        $sql = "SELECT * FROM posts WHERE user_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([":id" => $id]);
        
        $userPost = $query->fetch(PDO::FETCH_OBJ);
        return $userPost;
        
    }
}

?>
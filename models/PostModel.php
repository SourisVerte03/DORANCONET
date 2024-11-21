<?php
class PostModel {
   public $id;
   public $user_id;
   public $content;
   public $image_path;
   public $likes;
   public $created_at;
   
    public function __construct($id, $user_id, $content, $image_path, $likes, $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->content = $content;
        $this->image_path = $image_path;
        $this->likes = $likes;
        $this->created_at = $created_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }


}
?>
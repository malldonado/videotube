<?php

class Video
{
    private $con;
    private $sqlData;
    private $userLoggedInObj;

    public function __construct($con, $input, $userLoggedInObj)
    {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
        $this->sqlData = is_array($input) ? $input : $this->fetchVideoData($input);
    }

    private function fetchVideoData($id)
    {
        $query = $this->con->prepare("SELECT * FROM videos WHERE id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getId()
    {
        return $this->sqlData["id"];
    }

    public function getUploadedBy()
    {
        return $this->sqlData["uploadedBy"];
    }

    public function getTitle()
    {
        return $this->sqlData["title"];
    }

    public function getDescription()
    {
        return $this->sqlData["description"];
    }

    public function getPrivacy()
    {
        return $this->sqlData["privacy"];
    }

    public function getFilePath()
    {
        return $this->sqlData["filePath"];
    }

    public function getCategory()
    {
        return $this->sqlData["category"];
    }

    public function getUploadDate()
    {
        return $this->sqlData["uploadDate"];
    }

    public function getViews()
    {
        return $this->sqlData["views"];
    }

    public function getDuration()
    {
        return $this->sqlData["duration"];
    }

    public function incrementViews()
    {
        $videoId = $this->getId();
        $query = $this->con->prepare("UPDATE videos SET views = views + 1 WHERE id = :id");
        $query->bindParam(":id", $videoId);
        $query->execute();

        $this->sqlData["views"]++;
    }
}

?>

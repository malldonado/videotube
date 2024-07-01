<?php
class Video {

    private $con, $sqlData, $userLoggedInObj;

    public function __construct($con, $input, $userLoggedInObj) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;

        if(is_array($input)) {
            $this->sqlData = $input;
        } else {
            $this->loadVideoData($input);
        }
    }

    private function loadVideoData($id) {
        $query = $this->con->prepare("SELECT * FROM videos WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getId() {
        return $this->sqlData["id"];
    }

    public function getUploadedBy() {
        return $this->sqlData["uploadedBy"];
    }

    public function getTitle() {
        return $this->sqlData["title"];
    }

    public function getDescription() {
        return $this->sqlData["description"];
    }

    public function getPrivacy() {
        return $this->sqlData["privacy"];
    }

    public function getFilePath() {
        return $this->sqlData["filePath"];
    }

    public function getCategory() {
        return $this->sqlData["category"];
    }

    public function getUploadDate() {
        return $this->sqlData["uploadDate"];
    }

    public function getViews() {
        return $this->sqlData["views"];
    }

    public function getDuration() {
        return $this->sqlData["duration"];
    }

    public function incrementViews() {
        $query = $this->con->prepare("UPDATE videos SET views=views+1 WHERE id=:id");
        $videoId = $this->getId();
        $query->bindParam(":id", $videoId);
        $query->execute();

        $this->sqlData["views"] += 1;
    }

    public function getLikes() {
        return $this->getInteractionCount('likes');
    }

    public function getDislikes() {
        return $this->getInteractionCount('dislikes');
    }

    private function getInteractionCount($table) {
        $query = $this->con->prepare("SELECT count(*) as 'count' FROM $table WHERE videoId = :videoId");
        $videoId = $this->getId();
        $query->bindParam(":videoId", $videoId);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data["count"];
    }

    public function like() {
        $id = $this->getId();
        $username = $this->userLoggedInObj->getUsername();

        if($this->hasUserLiked($id, $username)) {
            $query = $this->con->prepare('DELETE FROM likes WHERE username=:username AND videoId=:videoId');
            $query->bindParam(":username", $username);
            $query->bindParam(":videoId", $id);
            $query->execute();
        } else {
            $query = $this->con->prepare('DELETE FROM dislikes WHERE username=:username AND videoId=:videoId');
            $query->bindParam(":username", $username);
            $query->bindParam(":videoId", $id);
            $query->execute();

            $query = $this->con->prepare("INSERT INTO likes(username, videoId) VALUES(:username, :videoId)");
            $query->bindParam(":username", $username);
            $query->bindParam(":videoId", $id);
            $query->execute();
        }
    }

    private function hasUserLiked($videoId, $username) {
        $query = $this->con->prepare("SELECT * FROM likes WHERE username=:username AND videoId=:videoId");
        $query->bindParam(":username", $username);
        $query->bindParam(":videoId", $videoId);
        $query->execute();

        return $query->rowCount() > 0;
    }

    private function insertLike($videoId, $username) {
        $query = $this->con->prepare("INSERT INTO likes(username, videoId) VALUES(:username, :videoId)");
        $query->bindParam(":username", $username);
        $query->bindParam(":videoId", $videoId);
        $query->execute();
    }
}
?>

<?php
class VideoDetailsFormProvider
{
    private $conn;

    public function __construct($con)
    {
        $this->conn = $con; // instantiating the object VideoDetailsFormProvider and called the attribute $con
    }

    public function createUploadForm()
    {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $categoriesInput = $this->createCategoriesInput();
        return "<form action='processing.php' method='POST'>
                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $categoriesInput
                </form>";
    }

    private function createFileInput()
    {

        return "<div class='form-group form-file'>
                    <label for='exampleFormControlFile1'>Your file</label>
                    <input type='file' class='form-control-file' id='exampleFormControlFile1' shadow-none required>
                </div>";
    }

    private function createTitleInput()
    {
        return "<div class='form-group create-title-input'>
                    <input class='form-control' type='text' placeholder='Title' name='titleInput' shadow-none>
                </div>";
    }

    private function createDescriptionInput()
    {
        return "<div class='form-group create-description-input'>
                    <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3' shadow-none></textarea>
                </div>";
    }

    private function createPrivacyInput()
    {
        return "<div class='form-group create-privacy-input'>
                    <select class='form-control' name='privacyInput'>
                        <option value='0'>Private</option>
                        <option value='1'>Public</option>
                    </select>
                </div>";
    }

    private function createCategoriesInput()
    {
        $query = $this->conn->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='form-group create-categories-input'>
                <select class='form-control' name='categoryInput'>";
    
        while($row = $query->fetch(PDO::FETCH_ASSOC)) { //selected query
            $id = $row['id'];
            $name = $row['name'];
            $html .= "<option value='$id'>$name</option>";
        }

        $html .= "</select>
        </div>";

        return $html;
    }
}

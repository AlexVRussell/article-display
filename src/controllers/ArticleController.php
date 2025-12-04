<?php
// very similar to java OOP princples and syntax
// So should be easy

Class ArticleController {

    private mysqli $db;

    // Constructor 
    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    /**
     * Create a get all articles method
     * prioritizing moest recent articles first
     * 
     * https://stackoverflow.com/questions/17056349/convert-sql-results-into-php-array
     */
    public function getAllArticles(): array {
        $articles = [];

        // Select all from artices where Updated at DESC?
        $sql = "SELECT * from articles ORDER BY created_at DESC;";
        $result = $this->db->query($sql);

        if (!$result){
            return [];
        }
        // While rows exist return rows in an assoicative array
        $articles = $result->fetch_all(MYSQLI_ASSOC);

        return $articles;
    }

    /** 
     * Create a method to get article by ID
     * 
     */
    public function getArticleById(int $id): ?array {
        $article = null; 
        // Select article by ID
        $sql = "SELECT * FROM articles WHERE id = ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $article ?? null;
    }
}
?>
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

        // Select all from artices and order by when created (DESC, so its the latest first)
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
     * Create a method to get article by ID or slug
     * 
     * @param int $id
     * 
     */
    public function getArticleById(int $id): ?array {
        $article = null; 
        // Select article by ID 
        $sql = "SELECT * FROM articles WHERE a_id = ?;";
        
        // prepare returning false? 
        // future me, i put 'id' in the the sql query not 'a_id'
        // Thanks - https://www.quora.com/How-do-you-fix-fatal-error-call-to-a-member-function-bind_param-on-bool-PHP-MySQL-mysqli-development 
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc() ?: null;
    }

    /**
     * Get article by slug, assumption that slug is known (I included slug for each article in preview)
     * Pretty much identical to getArticleById()
     * 
     * @param string $slug
     */
    public function getArticleBySlug (string $slug): ?array {
        $article = null;

        $sql = "SELECT * FROM articles WHERE a_slug = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc() ?: null;
    }
}
?>
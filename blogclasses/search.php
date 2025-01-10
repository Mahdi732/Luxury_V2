<?php
require_once('../connection/connect.php');
class SearchFilter{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    function dataAfiched($variable){
        echo '
            <div class="bg-[#242526] rounded-lg shadow mb-4">
    <div class="p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-gray-200 font-semibold">'.$variable["client_name"].'</p>
                    <p class="text-gray-400 text-sm">'.$variable["created_at"].'</p>
                </div>
            </div>
        </div>
        <p class="text-gray-200 mt-4">'.$variable["article_title"].'</p>
        <img src="'.$variable["image"].'" alt="Post" class="w-full h-[400px] object-cover rounded-lg mt-4">

        <!-- Reactions -->
        <div class="flex items-center justify-between mt-4 px-2">
            <div class="flex items-center space-x-1">
                <span class="text-red-800 bg-red-800 rounded-full p-1"><i class="fas fa-thumbs-up text-xs text-white"></i></span>
                <span class="text-gray-400 text-sm">1.2K</span>
            </div>
            <div class="flex space-x-2 text-sm text-gray-400">
                <span>234 comments</span>
                <span>56 shares</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="border-t border-[#3A3B3C] mt-4 pt-1">
            <div class="flex justify-between py-1">
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="far fa-thumbs-up text-gray-400"></i>
                    <span class="text-gray-400">Like</span>
                </button>
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="far fa-comment text-gray-400"></i>
                    <span class="text-gray-400">Comment</span>
                </button>
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="fas fa-share text-gray-400"></i>
                    <span class="text-gray-400">Share</span>
                </button>
            </div>
        </div>
    </div>
</div>';
    }
    function dataAfichedAdmin($variable){
        echo '
            <div class="bg-[#242526] rounded-lg shadow mb-4">
    <div class="p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-gray-200 font-semibold">'.$variable["client_name"].'</p>
                    <p class="text-gray-400 text-sm">'.$variable["created_at"].'</p>
                </div>
            </div>
        </div>
        <p class="text-gray-200 mt-4">'.$variable["article_title"].'</p>
        <img src="'.$variable["image"].'" alt="Post" class="w-full h-[400px] object-cover rounded-lg mt-4">

        <!-- Reactions -->
        <div class="flex items-center justify-between mt-4 px-2">
            <div class="flex items-center space-x-1">
                <span class="text-red-800 bg-red-800 rounded-full p-1"><i class="fas fa-thumbs-up text-xs text-white"></i></span>
                <span class="text-gray-400 text-sm">1.2K</span>
            </div>
            <div class="flex space-x-2 text-sm text-gray-400">
                <span>234 comments</span>
                <span>56 shares</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="border-t border-[#3A3B3C] mt-4 pt-1">
            <div class="flex justify-between py-1">
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="far fa-thumbs-up text-gray-400"></i>
                    <span class="text-gray-400">Like</span>
                </button>
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="far fa-comment text-gray-400"></i>
                    <span class="text-gray-400">Comment</span>
                </button>
                <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                    <i class="fas fa-share text-gray-400"></i>
                    <span class="text-gray-400">Share</span>
                </button>
            </div>
        </div>
    </div>
    <div class="flex justify-around p-2">
                <form action="../blogclasses/search.php" method="POST">
                    <input type="hidden" name="idreservation" value="'.$variable["article_id"].'">
                    <input type="hidden" value="approved"
                    name="approved">
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-check mr-2"></i> Accept
                    </button>
                </form>

                <form action="../blogclasses/search.php" method="POST">
                    <input type="hidden" name="idreservation" value="'.$variable["article_id"].'">
                    <input type="hidden" value="rejected"
                    name="rejected">
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors
                    ">
                        <i class="fas fa-check mr-2"></i> Rejected
                    </button>
                </form>
            </div>
</div>';
    }

    public function searchByNAme($title){
    $stmt = $this->conn->prepare("SELECT 
        ba.article_id,
        ba.title AS article_title,
        ba.created_at AS created_at,
        ba.status AS statu,
        ba.content AS article_content,
        ba.image_url AS image,
        th.name AS theme_name,
        u.username AS client_name,
        GROUP_CONCAT(t.name) AS tags
    FROM blog_articles ba
    JOIN theme th ON ba.theme_id = th.theme_id
    JOIN users u ON ba.user_id = u.user_id
    LEFT JOIN article_tags at ON ba.article_id = at.article_id
    LEFT JOIN tags t ON at.tag_id = t.tag_id
    WHERE ba.title LIKE :title
    GROUP BY ba.article_id");
    $stmt->bindValue(':title', '%' . $title . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function afficheAllPost(){
    $stmt = $this->conn->prepare("SELECT 
    ba.article_id,
    ba.title AS article_title,
    ba.created_at AS created_at,
    ba.status AS statu,
    ba.content AS article_content,
    ba.image_url AS image,
    th.name AS theme_name,
    u.username AS client_name,
    GROUP_CONCAT(t.name) AS tags
    FROM blog_articles ba
    JOIN theme th ON ba.theme_id = th.theme_id
    JOIN users u ON ba.user_id = u.user_id
    LEFT JOIN article_tags at ON ba.article_id = at.article_id
    LEFT JOIN tags t ON at.tag_id = t.tag_id
    GROUP BY ba.article_id
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pagination($numbero) {
        $numbero = max(0, (int)$numbero);
        $aficheNumber = $numbero * 9;
        $stmt = $this->conn->prepare("SELECT 
    ba.article_id,
    ba.title AS article_title,
    ba.created_at AS created_at,
    ba.status AS statu,
    ba.content AS article_content,
    ba.image_url AS image,
    th.name AS theme_name,
    u.username AS client_name,
    GROUP_CONCAT(t.name) AS tags
FROM blog_articles ba
JOIN theme th ON ba.theme_id = th.theme_id
JOIN users u ON ba.user_id = u.user_id
LEFT JOIN article_tags at ON ba.article_id = at.article_id
LEFT JOIN tags t ON at.tag_id = t.tag_id
WHERE ba.status = 'approved'
GROUP BY ba.article_id
LIMIT 9 OFFSET $aficheNumber;

        ");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pageNumber(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM blog_articles WHERE status = 'approved'");
        $stmt->execute();
        $total_vehicles = $stmt->fetchColumn();
        $numberForAfiche = 9;
        $numberOfThePage = $total_vehicles / $numberForAfiche;
        return $numberOfThePage;
    }

    public function changeStatus($article, $statusUp){
        $stmt = $this->conn->prepare("UPDATE blog_articles
        SET status = :statu
        WHERE article_id = :article;
        ");
        $stmt->bindParam(':statu', $statusUp);
        $stmt->bindParam(':article', $article);
        $stmt->execute();
        header('Location: ../blog/blogManagement.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST["rechercheByName"] ?? null;
    $number = $_POST["number"] ?? null;
    $idreservation = $_POST["idreservation"] ?? null;
    $rejected = $_POST["rejected"] ?? null;
    $approved = $_POST["approved"] ?? null;

    $searchFilter = new SearchFilter();
    if ($idreservation && $approved !== null) {
        $searchFilter->changeStatus($idreservation, $approved);
    }

    if ($idreservation && $rejected !== null) {
        $searchFilter->changeStatus($idreservation, $rejected);
    }


    if ($number !== null) {
        $results = $searchFilter->pagination($number);
    } elseif (empty(trim($search))) {
        $results = $searchFilter->afficheAllPost();
    } else {
        $results = $searchFilter->searchByName($search);
    }

    foreach ($results as $row) {
        if ($row['statu'] === 'approved') {
            echo $searchFilter->dataAfiched($row);
        }
    }
}
?>
<!-- User.php -->
<?php
class User
{
    
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createUser($full_name, $email, $password_hash)
    {
        // Hasher le mot de passe
        $passwordHash = password_hash($password_hash, PASSWORD_DEFAULT);
        // Préparer la requête
        $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
        // Exécuter la requête
        $stmt->execute([$full_name, $email, $passwordHash]);
        // Vérifier si l'insertion a réussi
        return $stmt->rowCount() === 1;
    }

    public function getUserByEmail($email)
    {
        // Préparer la requête
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        // Exécuter la requête
        $stmt->execute([$email]);
        // Récupérer l'utilisateur
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($password_hash, $hash)
    {
        // Vérifier si le mot de passe correspond au hachage
        return password_verify($password_hash, $hash);
    }

    public function storeResetToken($userId, $token) {
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $sql = "UPDATE users SET reset_token = :reset_token, reset_token_expiry = :reset_token_expiry WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':reset_token', $token);
        $stmt->bindParam(':reset_token_expiry', $expiry);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }

    public function getUserByResetToken($token) {
        $sql = "SELECT * FROM users WHERE reset_token = :reset_token AND reset_token_expiry > NOW()";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':reset_token', $token);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($userId, $newPassword) {
        $passwordHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password_hash = :password_hash, reset_token = NULL, reset_token_expiry = NULL WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':password_hash', $passwordHash);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }
}
?>

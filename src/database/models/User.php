<!-- User.php -->
<?php
class User
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createUser($email, $password_hash)
    {
        // Hasher le mot de passe
        $passwordHash = password_hash($password_hash, PASSWORD_DEFAULT);
        // Préparer la requête
        $stmt = $this->db->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
        // Exécuter la requête
        $stmt->execute([$email, $passwordHash]);
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
}
?>

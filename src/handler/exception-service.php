<?php

namespace App\Exceptions;

use Exception;

class ServiceException extends Exception
{
    // Code d'erreur spécifique à l'application, peut être utilisé pour des catégories d'erreurs
    private int $errorCode;

    // Constructeur de l'exception, accepte un message, un code d'erreur spécifique et une exception précédente
    public function __construct(string $message, int $errorCode = 0, Exception $previous = null)
    {
        // Initialise la classe parent (Exception)
        parent::__construct($message, $errorCode, $previous);
        $this->errorCode = $errorCode;
    }

    // Récupère le code d'erreur spécifique
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    // Formate le message d'erreur pour un affichage plus structuré
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->errorCode}]: {$this->message}\n";
    }
}

?>

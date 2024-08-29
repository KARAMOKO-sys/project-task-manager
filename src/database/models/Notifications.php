<?php
class Notification{
    private $id;
    private $userId;
    private $notificationText;
    private $isRead;
    private $createdAt;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     */
    public function setUserId($userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of notificationText
     */
    public function getNotificationText()
    {
        return $this->notificationText;
    }

    /**
     * Set the value of notificationText
     */
    public function setNotificationText($notificationText): self
    {
        $this->notificationText = $notificationText;

        return $this;
    }

    /**
     * Get the value of isRead
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set the value of isRead
     */
    public function setIsRead($isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
?>
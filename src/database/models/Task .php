<!-- Task.php -->
<?php
class Task {
    private $id;
    private $userId;
    private $categoryId;
    private $priorityId;
    private $taskName;
    private $taskDescription;
    private $statusId;
    private $dueDate;
    private $createdAt;
    private $updatedAt;
    private $status;



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
     * Get the value of categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set the value of categoryId
     */
    public function setCategoryId($categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get the value of priorityId
     */
    public function getPriorityId()
    {
        return $this->priorityId;
    }

    /**
     * Set the value of priorityId
     */
    public function setPriorityId($priorityId): self
    {
        $this->priorityId = $priorityId;

        return $this;
    }

    /**
     * Get the value of taskName
     */
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * Set the value of taskName
     */
    public function setTaskName($taskName): self
    {
        $this->taskName = $taskName;

        return $this;
    }

    /**
     * Get the value of taskDescription
     */
    public function getTaskDescription()
    {
        return $this->taskDescription;
    }

    /**
     * Set the value of taskDescription
     */
    public function setTaskDescription($taskDescription): self
    {
        $this->taskDescription = $taskDescription;

        return $this;
    }

    /**
     * Get the value of statusId
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set the value of statusId
     */
    public function setStatusId($statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * Get the value of dueDate
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set the value of dueDate
     */
    public function setDueDate($dueDate): self
    {
        $this->dueDate = $dueDate;

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

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     */
    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }
}
?>
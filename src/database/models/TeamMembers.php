<?php
class TeamMembers {
    private $userId;
    private $taskId;

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
     * Get the value of taskId
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * Set the value of taskId
     */
    public function setTaskId($taskId): self
    {
        $this->taskId = $taskId;

        return $this;
    }
}
?>
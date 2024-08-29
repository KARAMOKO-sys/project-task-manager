<?php
class ProjectTask {
    private $projectId;
    private $taskId;

    /**
     * Get the value of projectId
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set the value of projectId
     */
    public function setProjectId($projectId): self
    {
        $this->projectId = $projectId;

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
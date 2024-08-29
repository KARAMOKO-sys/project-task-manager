<?php
class TaskStastues 
{
    private $id;
    private $taskId;
    private $filePath;
    private $uploadedAt;

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

    /**
     * Get the value of filePath
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set the value of filePath
     */
    public function setFilePath($filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get the value of uploadedAt
     */
    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    /**
     * Set the value of uploadedAt
     */
    public function setUploadedAt($uploadedAt): self
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }
}

?>
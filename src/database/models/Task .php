<!-- Task.php -->
<?php
class Task {
    private $task_id;
    private $user_id;
    private $title;
    private $description;
    private $status;
    private $priority;
    private $due_date;

    public function getTaskId() {
        return $this->task_id;
    }

    public function setTaskId($task_id) {
        $this->task_id = $task_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function getDueDate() {
        return $this->due_date;
    }

    public function setDueDate($due_date) {
        $this->due_date = $due_date;
    }
}
?>
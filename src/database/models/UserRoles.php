<?php
class UserRoles {
    private $userId;
    private $roleId;

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
     * Get the value of roleId
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set the value of roleId
     */
    public function setRoleId($roleId): self
    {
        $this->roleId = $roleId;

        return $this;
    }
}
?>
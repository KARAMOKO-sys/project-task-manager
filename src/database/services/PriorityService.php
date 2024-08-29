<?php

namespace App\Services;

use App\Repositories\PriorityRepository;
use App\Models\Priority;

class PriorityService
{
    private $priorityRepository;

    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }

    public function getAllPriorities()
    {
        return $this->priorityRepository->findAll();
    }

    public function getPriorityById($id)
    {
        return $this->priorityRepository->findById($id);
    }

    public function createPriority($name, $level)
    {
        $priority = new Priority();
        $priority->setName($name);
        $priority->setLevel($level);
        $this->priorityRepository->save($priority);
    }

    public function updatePriority($id, $name, $level)
    {
        $priority = $this->priorityRepository->findById($id);
        if ($priority) {
            $priority->setName($name);
            $priority->setLevel($level);
            $this->priorityRepository->update($priority);
        }
    }

    public function deletePriority($id)
    {
        $this->priorityRepository->delete($id);
    }
}
?>
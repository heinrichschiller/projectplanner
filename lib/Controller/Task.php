<?php

namespace Controller;

use \Model\Resource\Task as TaskResource;

class Task extends Base
{
    public function indexAction()
    {
        $task = new TaskResource();

        $tasks = $task->getTasks();

        echo $this->render('task.phtml', array('tasks' => $tasks));
    }
}

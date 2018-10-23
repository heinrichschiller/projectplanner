<?php

namespace Controller;

use \Model\Resource\Customer as CustomerResource;
use \Model\Resource\Project as ProjectResource;
use \Model\Resource\Task as TaskResource;

class Task extends Base
{
    public function indexAction()
    {
        $task = new TaskResource();

        $tasks = $task->getTasks();

        echo $this->render('tasks_overview.phtml', array('tasks' => $tasks));
    }
    
    public function newAction()
    {
        $customers = new CustomerResource();
        $projects  = new ProjectResource();
        
        $customerList = $customers->getCustomers();
        $projectsList = $projects->getProjects();
        
        $list = [
            'customers' => $customerList,
            'projects'  => $projectsList
        ];
        
        echo $this->render('task.phtml', $list);
    }
    
    public function addAction() {
        $task = new TaskResource();
        
        $task->add($_POST);
        
        header('Location: ' . \App::getBaseUrl() . 'task/index');
    }
}

<?php

namespace Controller;

use Model\Resource\Project  as ProjectResource;
use Model\Resource\Customer as CustomerResource;
use Model\Resource\Task     as TaskResource;
use Session\User;

class Project extends Base
{
    public function indexAction()
    {
        User::checkLogin();

        $project = new ProjectResource();

        $projectList = $project->getProjects();

        echo $this->render('projects_overview.phtml', array('projects' => $projectList));
    }

    public function newAction($params)
    {
        User::checkLogin();

        $customer = new CustomerResource();

        $customerList = $customer->getCustomers();

        echo $this->render('project.phtml', array('customers' => $customerList));
    }

    public function addAction()
    {
        User::checkLogin();

        $project = new ProjectResource();

        $project->add($_POST);

        header('Location: ' . \App::getBaseUrl() . 'project/index');
    }

    public function viewAction($params)
    {
        User::checkLogin();
        
        $customer = new CustomerResource();
        $project = new ProjectResource();
        $task = new TaskResource();
        
        $projectList = $project->getProjectById($params['id']);

        $id = $projectList->getCustomerId();
        $customerList = $customer->getCustomer($id);
        $taskList = $task->getCustomerTasks($id);

        $list = [
            'customer' => $customerList,
            'project'  => $projectList,
            'tasks'    => $taskList
        ];
        
        echo $this->render('project_overview.phtml', $list);
    }
}

<?php

namespace Controller;

use Model\Resource\Customer as CustomerResource;
use Model\Resource\Project as ProjectResource;
use Model\Resource\Task as TaskResource;
use Session\User;

class Customer extends Base
{
    public function indexAction($params)
    {
        User::checkLogin();

        $customer = new CustomerResource();

        $customers = $customer->getCustomers();

        echo $this->render('customers_overview.phtml', array('customers' => $customers));
    }

    public function newAction($params)
    {
        User::checkLogin();

        echo $this->render('customer.phtml');
    }

    public function addAction($params)
    {
        User::checkLogin();

        $customer = new CustomerResource();

        $customer->add($_POST);

        header('Location: '. \App::getBaseUrl() . 'customer/index');
    }

    public function viewAction($params)
    {
        User::checkLogin();
        
        $customer = new CustomerResource();
        $project = new ProjectResource();
        $task = new TaskResource();

        $customers = $customer->getCustomer($params['id']);
        $projects = $project->getCustomerProjects($params['id']);
        $tasks = $task->getCustomerTasks($params['id']);

        $list = [
            'customer' => $customers,
            'projects' => $projects,
            'tasks'    => $tasks
        ];

        echo $this->render('customer_overview.phtml', $list);
    }
}

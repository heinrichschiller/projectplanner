<?php

namespace Controller;

use Model\Resource\Customer as CustomerResource;
use Model\Resource\Project as ProjectResource;
use Model\Resource\Task as TaskResource;

class Customer extends Base
{
    public function indexAction($params)
    {
        $customer = new CustomerResource();

        $customers = $customer->getCustomers();

        echo $this->render('customers_overview.phtml', array('customers' => $customers));
    }

    public function newAction($params)
    {
        echo $this->render('customer.phtml');
    }

    public function addAction($params)
    {
        $customer = new CustomerResource();

        $customer->add($_POST);

        header('Location: http://projektmanager.localhost/customer/index');
    }

    public function viewAction($params)
    {
        $customer = new CustomerResource();
        $project = new ProjectResource();
        $task = new TaskResource();

        $customers = $customer->getCustomer($params);
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

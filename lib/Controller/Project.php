<?php

namespace Controller;

use \Model\Resource\Project as ProjectResource;
use \Model\Resource\Customer as CustomerResource;

class Project extends Base
{
    public function indexAction()
    {
        $project = new ProjectResource();

        $projectList = $project->getProjects();

        echo $this->render('projects_overview.phtml', array('projects' => $projectList));
    }

    public function newAction($params)
    {
        $customer = new CustomerResource();

        $customerList = $customer->getCustomers();

        echo $this->render('project.phtml', array('customers' => $customerList));
    }

    public function addAction($params)
    {
        $project = new ProjectResource();

        $project->add($_POST);

        header('Location: http://projektmanager.localhost/project/index');
    }

    public function viewAction($params)
    {

    }
}

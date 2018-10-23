<?php

namespace Controller;

use Model\Resource\Project;
use Model\Resource\Customer;
use Model\Resource\Task;

class Index extends Base
{
    public function indexAction($params)
    {
        //$model = new Picture();

        //$pictures = $model->getPictures();

        //echo $this->render('pictures.phtml', array('pictures' => $pictures));
    }

    public function loginAction($params)
    {
        echo 'loginAction';
    }

    public function registerAction($params)
    {
        echo 'registerAction';
    }

    public function logoutAction($params)
    {
        echo 'logoutAction';
    }

    public function uploadAction($params)
    {
        echo 'uploadAction';
    }

    public function mainAction($params)
    {
      $model = new Project();
      $customer = new Customer();
      $task = new Task();

      $projects = $model->getProjects();
      $customers = $customer->getCustomers();
      $tasks = $task->getTasks();

      $list = [
          'projects' => $projects,
          'customers' => $customers,
          'tasks' => $tasks
      ];

      echo $this->render('mainpage.phtml',$list);
    }
}

<?php

namespace Controller;

use Model\Resource\ContactResource;
use Model\Resource\ProjectResource;
use Model\Resource\TaskResource;
use Helper\HtmlFormHelper;
use Session\User;

class TaskController extends Base
{
    public function indexAction()
    {
        User::checkLogin();

        $task = new TaskResource();

        $tasks = $task->getTasks();

        echo $this->render('tasks_overview.phtml', array('tasks' => $tasks));
    }

    public function newAction()
    {
        User::checkLogin();

        $contacts = new ContactResource();
        $projects  = new ProjectResource();

        $contactList = $contacts->getContacts();
        $projectsList = $projects->getProjects();
        $statusList = HtmlFormHelper::getInstance()->getStatusList();

        $list = [
            'contacts'   => $contactList,
            'projects'   => $projectsList,
            'statusList' => $statusList
        ];

        echo $this->render('task.phtml', $list);
    }

    public function editAction($params)
    {
        User::checkLogin();

        $task    = new TaskResource();
        $contact = new ContactResource();
        $project = new ProjectResource();

        $taskItem = $task->getTask($params['id']);

        $list = [
            'task'    => $taskItem,
            'contact' => $contact->getContact($taskItem->getContactId()),
            'project' => $project->getProject($taskItem->getProjectId())
        ];

        echo $this->render('task.phtml', $list);
    }

    public function addAction()
    {
        User::checkLogin();

        $task = new TaskResource();

        $task->add($_POST);

        header('Location: ' . \App::getBaseUrl() . 'task/index');
    }

    public function viewAction($params)
    {
        User::checkLogin();

        $task = new TaskResource();
        $contact = new ContactResource();
        $project = new ProjectResource();

        $taskItem = $task->getTask($params['id']);

        $list = [
            'task' => $taskItem,
            'contact' => $contact->getContact($taskItem->getContactId()),
            'project' => $project->getProject($taskItem->getProjectId())
        ];

        echo $this->render('task_overview.phtml', $list);
    }

    public function deleteAction(array $params)
    {
        User::checkLogin();

        $task = new TaskResource();

        $task->delete($params['id']);

        header('Location: ' . \App::getBaseUrl() . 'task/index');
    }
}

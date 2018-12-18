<?php

namespace Controller;

use Model\Resource\Project as ProjectResource;
use Model\Resource\Contact as ContactResource;
use Model\Resource\Task    as TaskResource;
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

        $contact = new ContactResource();

        $contactList = $contact->getContacts();

        echo $this->render('project.phtml', array('contacts' => $contactList));
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

        $contact = new ContactResource();
        $project = new ProjectResource();
        $task = new TaskResource();

        $projectList = $project->getProjectById($params['id']);

        $id = $projectList->getContactId();
        $contactList = $contact->getContact($id);
        $taskList = $task->getContactTasks($id);

        $list = [
            'contact' => $contactList,
            'project'  => $projectList,
            'tasks'    => $taskList
        ];

        echo $this->render('project_overview.phtml', $list);
    }
}

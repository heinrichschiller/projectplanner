<?php

namespace Model\Resource;

use \Model\ProjectModel;

class ProjectResource extends Base
{
    public function getProjects()
    {
        $sql = '
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`,
            `created_at`
            FROM `projects`
        ';

        $dbResult = $this->connect()->query($sql);

        $projects = [];

        while($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $project = new ProjectModel();

            $project->setId($row['id']);
            $project->setTitle($row['title']);
            $project->setDesc($row['desc']);
            $project->setBegin($row['begin']);
            $project->setEnd($row['end']);
            $project->setStatus($row['status']);
            $project->setContactId($row['contact_id']);
            $project->setCreatedAt($row['created_at']);

            $projects[] = $project;
        }

        return $projects;
    }

    public function getProjectById(int $id)
    {
        $sql = "
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`,
            `created_at`
            FROM `projects`
            WHERE `id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $project = new ProjectModel();

        $project->setId($row['id']);
        $project->setTitle($row['title']);
        $project->setDesc($row['desc']);
        $project->setBegin($row['begin']);
        $project->setEnd($row['end']);
        $project->setStatus($row['status']);
        $project->setContactId($row['contact_id']);
        $project->setCreatedAt($row['created_at']);

        return $project;
    }

    public function getContactProjects(int $id)
    {
        $sql = "
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`,
            `created_at`
            FROM `projects`
            WHERE `contact_id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $projects = [];

        while($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $project = new ProjectModel();

            $project->setId($row['id']);
            $project->setTitle($row['title']);
            $project->setDesc($row['desc']);
            $project->setBegin($row['begin']);
            $project->setEnd($row['end']);
            $project->setStatus($row['status']);
            $project->setContactId($row['contact_id']);
            $project->setCreatedAt($row['created_at']);

            $projects[] = $project;
        }

        return $projects;
    }

    public function add($values)
    {
        $sql = "
        INSERT INTO `projects`(
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`)
            VALUES (
                :title,
                :desc,
                :begin,
                :end,
                :status,
                :contact_id)
        ";
echo '<pre>';var_dump($values);
        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':title', $values['title']);
        $stmt->bindParam(':desc', $values['desc']);
        $stmt->bindParam(':begin', $values['begin']);
        $stmt->bindParam(':end', $values['end']);
        $stmt->bindParam(':status', $values['status']);
        $stmt->bindParam(':contact_id', $values['contactId']);

        $stmt->execute();
    }
}

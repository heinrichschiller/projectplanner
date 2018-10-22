<?php

namespace Model\Resource;

use \Model\Project as ProjectModel;

class Project extends Base
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
            `customer_id`,
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
            $project->setCustomerId($row['customer_id']);
            $project->setCreatedAt($row['created_at']);

            $projects[] = $project;
        }

        return $projects;
    }

    public function getCustomerProjects(int $id)
    {
        $sql = "
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `customer_id`,
            `created_at`
            FROM `projects`
            WHERE `customer_id` = $id
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
            $project->setCustomerId($row['customer_id']);
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
            `customer_id`)
            VALUES (:title,
                :desc,
                :begin,
                :end,
                :status,
                :customer_id)
        ";

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':title', $value['title']);
        $stmt->bindParam(':desc', $value['desc']);
        $stmt->bindParam(':begin', $value['begin']);
        $stmt->bindParam('end', $value['end']);
        $stmt->bindParam('status', $value['status']);
        $stmt->bindParam('customer_id', $value['customer_id']);

        $stmt->execute();
    }
}
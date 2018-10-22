<?php

namespace Model\Resource;

use \Model\Task as TaskModel;

class Task extends Base
{
    public function getTasks()
    {
        $sql = '
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `customer_id`,
            `project_id`,
            `created_at`,
            `updated_at`
            FROM `tasks`
        ';

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $task = new TaskModel;

            $task->setId($row['id']);
            $task->setTitle($row['title']);
            $task->setDesc($row['desc']);
            $task->setBegin($row['begin']);
            $task->setEnd($row['end']);
            $task->setStatus($row['status']);
            $task->setCustomerId($row['customer_id']);
            $task->setProjectId($row['project_id']);
            $task->setCreatedAt($row['created_at']);
            $task->setUpdatedAt($row['updated_at']);

            $taskList[] = $task;
        }

        return $taskList;
    }

    public function getCustomerTasks(int $id)
    {
        $sql = "
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `customer_id`,
            `project_id`,
            `created_at`,
            `updated_at`
            FROM `tasks`
            WHERE `customer_id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $task = new TaskModel;

            $task->setId($row['id']);
            $task->setTitle($row['title']);
            $task->setDesc($row['desc']);
            $task->setBegin($row['begin']);
            $task->setEnd($row['end']);
            $task->setStatus($row['status']);
            $task->setCustomerId($row['customer_id']);
            $task->setProjectId($row['project_id']);
            $task->setCreatedAt($row['created_at']);
            $task->setUpdatedAt($row['updated_at']);

            $taskList[] = $task;
        }

        return $taskList;
    }
}

<?php

namespace App\Model;

use PDO;

class ItemManager extends AbstractManager
{
    public const TABLE = 'camping';

    /**
     * Insert new item in database
     */
    public function insert(array $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        return $statement->execute();
    }
    public function sort($question1, $question2, $question3, $question4): array
    {
            $query = "SELECT * FROM camping WHERE question1 like '$question1' AND question2 like '$question2' AND question3 like '$question3' AND question4 like '$question4'";
            return $this->pdo->query($query)->fetchAll();
    }
}

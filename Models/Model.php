<?php
namespace Otus\Mvc\Models;
use PDO;

abstract class Model
{
    private static $connectonInstance;

    public static function config(): array
    {
        return require implode(DIRECTORY_SEPARATOR,[$_SERVER['DOCUMENT_ROOT'],'config','database.php']);
    }

    private static function getInstance(): object
    {
        if(self::$connectonInstance === null)
        {
            $config = self::config();
            self::$connectonInstance = new PDO($config['type'].":host=".$config['host'].";dbname=".$config['db'],
                $config['user'],
                $config['password'],
                [
                    // При возврате результатов запроса - возвращать в виде ассоциативного массива
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
                ]);
        }
        return self::$connectonInstance;
    }

    public function Model(): object
    {
        self::getInstance();
    }

    protected static $table;

    private static function getTableName(): string
    {
        return static::$table;
    }

    public static function getById(int $value): ?object
    {
        $modelName = static::class;
        $model = new $modelName();
        $tableName = self::getTableName();
        $sql = "SELECT * FROM $tableName where id = ? limit 1";
        $statement = self::getInstance()->prepare($sql);
        $statement->execute([$value]);
        $result = $statement->fetch();
        if($statement->rowCount() === 0)
            return null;
        $model->isInserted = true;
        return $model;
    }

    private $isInserted = false;

    public function save()
    {
        $parameters = get_object_vars($this);
        unset($parameters['isInserted']);
        $tableName = self::getTableName();

        if($this->isInserted)
        {
            $params = array_keys($parameters);
            $values = array_values($parameters);
            $values[] = array_shift($values);
            $update = "";
            unset($params[0]);
            foreach ($params as $key)
            {
                $update .= "$key = ?,";
            }
            $update = substr($update,0,-1);
            $query = "update $tableName set $update where id = ?";
            $statement = self::getInstance()->prepare($query);
            $statement->execute($values);
        } else {
            $params = array_keys($parameters);
            $templ = substr(str_repeat('?,',sizeof($params)),0,-1);
            $columns = implode(',',$params);
            $values = array_values($parameters);
            $query = "insert into $tableName ($columns) values ($templ)";
            $statement = self::getInstance()->prepare($query);
            $statement->execute($values);
            $this->id = self::getInstance()->lastInsertId();
        }
    }

    public function delete()
    {
        $modelName = static::class;
        $model = new $modelName();
        $tableName = self::getTableName();
        $sql = "DELETE FROM $tableName where id = ?";
        $statement = self::getInstance()->prepare($sql);
        $statement->execute([$this->id]);
    }

    public static function getSQL(string $sql, array $parameters): array
    {
        $modelName = static::class;
        $model = new $modelName();
        $tableName = self::getTableName();
        $statement = self::getInstance()->prepare($sql);
        $statement->execute($parameters);
        $result = $statement->fetchAll();
        if($statement->rowCount() === 0)
            return [];
        return $result;
    }
}

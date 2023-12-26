<?php

namespace app\lib;

use PDO;
use PDOException;

class Database {
    protected $db;

    public function __construct() {
        try {
            $config = require 'app/config/database.php';

            if (!$this->isDbExists()) {
                $this->createDb();
            }

            $this->db = new PDO('mysql:host=' .$config['host']. ';dbname=' .$config['dbname'], $config['username'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->checkAndCreateTables();
        } catch (PDOException $e) {
            die("Помилка з'єднання з базою даних: " . $e->getMessage());
        }
    }

    public function query($sql, $params=[]) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $item) {
                $stmt->bindValue(':' .$key, $item);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    // Check and create Database
    private function isDbExists() {
        $config = require 'app/config/database.php';
        $pdo = new PDO('mysql:host=' .$config['host'], $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbName = $config['dbname'];
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$dbName]);

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return True;
        } else {
            return False;
        }
    }

    private function createDb() {
        try {
            $config = require 'app/config/database.php';

            $pdo = new PDO('mysql:host=' .$config['host'], $config['username'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "CREATE DATABASE " .$config['dbname']. " CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

            $pdo->exec($query);

        } catch (PDOException $e) {
            die("Помилка при створенні бази даних: " . $e->getMessage());
        }
    }

    // Check and create Tables in Database
    public function isTableNotEmpty($tableName) {
        $sql = "SELECT COUNT(*) FROM $tableName";
        $result = $this->query($sql);

        return $result > 0;
    }

    private function checkAndCreateTables() {
        try {
            $tables = require 'app/config/dbTables.php';
            // Перевірка наявності кожної таблиці
            foreach ($tables as $name => $columns) {
                $tableExists = $this->isTableExists($name);

                if (!$tableExists) {
                    $this->createTable($name, $columns);
                    $this->fillTable($name, $columns);
                }
            }

        } catch (PDOException $e) {
            echo "Помилка: " . $e->getMessage();
        }
    }

    private function isTableExists($tableName) {
        $stmt = $this->db->prepare("SHOW TABLES LIKE ?");
        $stmt->execute([$tableName]);

        return $stmt->rowCount() > 0;
    }

    private function createTable($name, $columns) {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS $name (";

            foreach ($columns as $name => $type) {
                $sql .= "$name $type, ";
            }

            $sql = rtrim($sql, ', ');
            $sql .= ")";

            $this->db->exec($sql);
        } catch (PDOException $e) {
            echo "Помилка створення таблиці: " . $e->getMessage();
        }
    }

    // Filling Tables
    private function fillTable($name, $columns) {
        try {
            $tablesData = require 'app/config/baseTablesData.php';

            foreach ($tablesData[$name] as $data) {
                $sql = "INSERT INTO " . $name . " (";
                foreach ($columns as $column => $params) {
                    if (strpos($params, 'NOT NULL')) {
                        $sql .= $column . ", ";
                    }
                }
                $sql = substr_replace($sql, ') VALUES (', -2);
                foreach ($columns as $column => $params) {
                    if (strpos($params, 'NOT NULL')) {
                        $sql .= ":" . $column . ", ";
                    }
                }
                $sql = substr_replace($sql, ')', -2);

                $this->query($sql, $data);
            }
        } catch (PDOException $e) {
            echo "Помилка при заповненні таблиць: " .$e->getMessage();
        }
    }
}
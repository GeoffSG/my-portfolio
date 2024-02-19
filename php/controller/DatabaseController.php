
<?php

/**
 * This file is the controller for the database operations.
 * It handles the connection to the database and executes queries.
 * It uses the environment variables to connect to the database.
 * It catches the exceptions and prints the error messages.
 */
class DatabaseController {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    
    /**
     * DatabaseController constructor.
     * It initializes the database connection parameters.
     * It reads the environment variables for the database connection.
     * It throws an exception if the environment variables are not set.
     * It catches the exception and prints the error message.
     */
    public function __construct() {
        try{   
            $this->host = $_ENV['DB_HOST'];
            $this->username = $_ENV['DB_USERNAME'];
            $this->password = $_ENV['DB_PASSWORD'];
            $this->database = $_ENV['DB_DATABASE'];
        } catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
            exit;
        }
    }

    /**
     * Connects to the database.
     * It creates a new PDO connection to the database.
     * It sets the error mode to exception.
     * It returns true if the connection is successful.
     */
    public function connect() {
        try {
            
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Disconnects from the database.
     */
    public function disconnect() {
        $this->connection = null;
    }

    /**
     * Executes a query on the database.
     * It prepares the query and executes it.
     * It returns the result of the query execution.
     * It catches the exception and prints the error message.
     *
     * @param string $query The query to be executed.
     * @return mixed The result of the query execution.
     */
    public function query($query) {
        try {
            $statement = $this->connection->prepare($query);
            if ($statement === false) {
                throw new PDOException('Failed to prepare statement');
            }

            $success = $statement->execute();
            if ($success === false) {
                throw new PDOException('Failed to execute statement');
            }
            
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error selecting data: " . $e->getMessage();
        }
    }
}

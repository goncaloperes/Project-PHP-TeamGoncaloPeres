<?php

class Database
{
    private $host = DB_HOST; //DB_HOST and the following are constants that we will setup in the config.php file
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME; //Private to only be accessed in this class

    private $dbh; //dbh is basically a handler so we can interact with the DB
    private $error;
    private $stmt;


    public function __construct() //Whatever is in the constructor is going to be called whenever you create a new DB object.
    {
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        //Set options
        $options = array
        (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create a new PDO instance
        try
        {
            $this->dbh = new PDO ($dsn, $this->user, $this->pass,$options);
        }
        catch ( PDOException $e )
        {
            $this->error = $e->getMessage();
        }
    }


    public function query($query) //Query function that is going to create a statement
    {
        $this->stmt = $this->dbh->prepare($query);
    }


    public function bind($param, $value, $type = null) //Bind values to the statement (this will prevent SQL injections)
    {
        if(is_null ($type))
        {
            switch(true)
            {
                case is_int ($value) :
                    $type = PDO::PARAM_INT; //Checking the type of input and putting some sanitation/validation on it
                    break;
                case is_bool ($value) :
                    $type = PDO::PARAM_BOOL;
                case is_null ($value) :
                    $type = PDO::PARAM_NULL;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }


    public function execute()
    {
        return $this->stmt->execute();
    }


    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


    public function rowCount()
    {
        return $this->stmt->rowCount();
    }


    public function lastInsertID()
    {
        return $this->dbh->lastInsertId();
    }


    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }


    public function endTransaction()
    {
        $this->dbh->commit();
    }


    public function cancelTransaction()
    {
        $this->dbh->rollBack();
    }


}
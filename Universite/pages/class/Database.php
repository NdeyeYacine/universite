
      <?php
        class Database{

          private static $dbHost= "localhost";
           private static $dbName = "Gestion_Universite";
           private static $dbUser = "root";
           private static $dbUserPassword = "sowpoulo";
           

           private static $connection = null;

              function connect() {
                try
                {
                  self::$connection = new PDO ("mysql:host=".self::$dbHost.";dbname=".self::$dbName,self::$dbUser,self::$dbUserPassword);
                  self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e)
                {
                  die($e->getMessage());
                }
                return self::$connection;

              }
              function disconnect(){
                return self::$connection;
              }
        }
       // Database::connect();

        ?>
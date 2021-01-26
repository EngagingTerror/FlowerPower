<?php  



class database{​​​​



    // properties

    private $host;

    private $dbh;

    private $user;

    private $pass;

    private $db;



    function __construct(){​​​​

        $this->host = 'localhost';

        $this->user = 'root';

        $this->pass = '';

        $this->db = 'Gebruikersnaam';



        try{​​​​

            $dsn = "mysql:host=$this->host;dbname=$this->db"; // data source name = dsn

            $this->dbh = new PDO($dsn, $this->user, $this->pass);

        }​​​​catch(PDOException $e){​​​​

            // die en exit zijn hetzelfde

            die("Unable to connect: " . $e->getMessage());

        }​​​​

    }​​​​



    public function addFirstUser(){​​​​



        $sql = "INSERT INTO users VALUES (:Gebruikersnaam, :Wachtwoord);";



        $statement = $this->dbh->prepare($sql); // prepared statement



        $statement->execute([

            'id'=>NULL, // NULL want kolom is auto_increment

            'Gebruikersnaam'=>'',

            'Wachtwoord'=>password_hash('', PASSWORD_DEFAULT), // sensitive data (niet leesbaar voor menselijk oog)


        ]);

    }​​​​



    // login -> login + error_log()

    public function login($uname, $psw){​​​​



    }​​​​



}​​​​



?>
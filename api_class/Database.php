<?php
//require_once dirname(__DIR__)."/includes/config.php";


class Database
{
    private $host;
    private $name;
    private $user;
    private $password;

    private ?PDO $conn =null;

    public function __construct(string $host, string $name, string $user, string $password )
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return PDO
     * @noinspection PhpComposerExtensionStubsInspection
     */
    public function getConnection(): PDO
    {
        if ($this->conn===null){
            $dsn = "mysql:host={$this->host};dbname={$this->name};charset";
           $this->conn= new PDO($dsn, $this->user, $this->password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false]);
        }
        return $this->conn;
    }
}
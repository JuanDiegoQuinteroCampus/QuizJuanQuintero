<?php
class departamento extends connect
{
    private $queryPost = 'INSERT INTO departamento(idDep,nombreDep,idPais) VALUES(:num,:namedep,:idcountry)';
    private $queryGetAll = 'SELECT * FROM departamento';
    private $queryUpdate = 'UPDATE departamento SET idDep = :num, nombreDep = :namedep, idPais = :idcountry  WHERE idDep = :num';
    private $queryDelete = 'DELETE FROM departamento WHERE idDep = :num';
    private $message;
    use getInstance;  
    function __construct(private $idDep = 1, public $nombreDep = 1, private $idPais = 1)
    {
        parent::__construct();
        
    }
    public function postdepartamento()
    {
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("num", $this->idDep);
            $res->bindValue("namedep", $this->nombreDep);
            $res->bindValue("idcountry", $this->idPais);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "inserted data"];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAlldepartamento()
    {
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $res->bindValue("num", 1);
            $res->bindValue("namedep", 1);
            $res->bindValue("idcountry", 1);
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function putdepartamento()
{
    try {
        $res = $this->conx->prepare($this->queryUpdate);
        $res->bindValue("num", $this->idDep);
        $res->bindValue("namedep", $this->nombreDep);
        $res->bindValue("idcountry", $this->idPais);
        
        $res->execute();

        if ($res->rowCount() > 0) {
            $this->message = ["Code" => 200, "Message" => "Data updated"];
        } else {
            $this->message = ["Code" => 404, "Message" => "There is no record"];
        }
    } catch (\PDOException $e) {
        $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
    } finally {
        print_r($this->message);
    }
}

    public function deletedepartamento()
    {
        try {
            $res = $this->conx->prepare($this->queryDelete);
            $res->bindValue("num", $this->idDep);
/*             $res->bindValue("nameregion", $this->name_region);
            $res->bindValue("idcountry", $this->id_country); */
            $res->execute();
            $this->message = ["Code" => 200, "Message" => "Data delete"];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
}

<?php
class campers extends connect
{
    private $queryPost = 'INSERT INTO campers(idCamper ,nombreCamper ,apellidoCamper,fechaNac ,idReg  ) VALUES(:num,:name,:lastname,:fechanac ,:idreg )';
    private $queryGetAll = 'SELECT * FROM campers';
    private $queryUpdate = 'UPDATE campers SET idCamper  = :num, nombreCamper  = :name, apellidoCamper  = :lastname, fechaNac  = :fechanac , idReg  = :idreg   WHERE idCamper  = :num';
    private $queryDelete = 'DELETE FROM campers WHERE idCamper  = :num';
    private $message;
    use getInstance;  
    function __construct(private $idCamper  = 1, public $nombreCamper  = 1, private $apellidoCamper  = 1,public $fechaNac  = '2023-03-01',private $idReg  = 1)
    {
        parent::__construct();
        
    }
    public function postcampers()
    {
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("num", $this->idCamper );
            $res->bindValue("name", $this->nombreCamper );
            $res->bindValue("lastname", $this->apellidoCamper );
            $res->bindValue("fechanac", $this->fechaNac );
            $res->bindValue("idreg", $this->idReg );
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "inserted data"];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAllcampers()
    {
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $res->bindValue("num", 1);
            $res->bindValue("name", 1);
            $res->bindValue("lastname", 1);
            $res->bindValue("fechanac", 1);
            $res->bindValue("idreg", 1);
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function putcampers()
{
    try {
        $res = $this->conx->prepare($this->queryUpdate);
        $res->bindValue("num", $this->idCamper );
        $res->bindValue("name", $this->nombreCamper );
        $res->bindValue("lastname", $this->apellidoCamper );
        $res->bindValue("fechanac", $this->fechaNac );
        $res->bindValue("idreg", $this->idReg ); 
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

    public function deletecampers()
    {
        try {
            $res = $this->conx->prepare($this->queryDelete);
            $res->bindValue("num", $this->idCamper);
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

<?php

namespace SON;

class Categoria
{
    private $id;
    private $nome;
    private $db;
    
    public function __construct(Db\Connection $db)
    {
        $this->db = $db;
    }
    
    public function listar()
    {
        $query = "Select * from Categorias";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
}

<?php

namespace SON;

class Produto implements CategoriaAwareInterface
{
    private $categoria;
    
    public function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }

}

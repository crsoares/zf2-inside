<?php

namespace SON;

class Produto
{
    private $categoria;
    
    public function addCategoria(CategoriaInterface $categoria) {
        $this->categoria[] = $categoria;
    }

}

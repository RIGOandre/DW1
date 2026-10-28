<?php 

class Animal {
    const TIPO = 'animal';

    public function som(): void {
        echo 'Som de ';
    }

}

class Cachorro extends Animal {
    public function som(): void {
        parent::som();
        echo 'Au Au';
    }
}

$cachorro = new Cachorro();
$cachorro->som();
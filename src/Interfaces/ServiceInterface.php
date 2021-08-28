<?php


namespace App\Interfaces;


interface ServiceInterface
{
    public function search($filter);

    public function save(EntityInterface $entity);

    public function delete(EntityInterface $entity);
}
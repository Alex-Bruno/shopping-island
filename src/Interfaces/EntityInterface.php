<?php


namespace App\Interfaces;

/**
 * Class EntityInterface
 * @package App\Interfaces
 */
interface EntityInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return array
     */
    public function toArray();
}
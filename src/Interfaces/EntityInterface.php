<?php


namespace App\Interfaces;

/**
 * Class EntityInterface
 * @package App\Interfaces
 */
interface EntityInterface
{
    /**
     * @param bool $enabled
     * @return mixed
     */
    public function setEnabled(bool $enabled);

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return array
     */
    public function toArray();
}
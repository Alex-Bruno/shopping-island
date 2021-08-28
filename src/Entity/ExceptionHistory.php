<?php


namespace App\Entity;

use App\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ExceptionHistory
 * @package App\Entity
 * @ORM\Table()
 * @ORM\Entity()
 */
class ExceptionHistory
{
    use EntityTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected int $id;

    /**
     * @var string
     * @ORM\Column(name="file", type="string")
     */
    protected string $file;

    /**
     * @var string
     * @ORM\Column(name="line", type="integer")
     */
    protected string $line;

    /**
     * @var string
     * @ORM\Column(name="trace", type="text")
     */
    protected string $trace;

    /**
     * @var string
     * @ORM\Column(name="status", type="integer")
     */
    protected int $status;

    /**
     * @var string
     * @ORM\Column(name="message", type="string")
     */
    protected string $message;

    /**
     * ExceptionHistory constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ExceptionHistory
     */
    public function setId(int $id): ExceptionHistory
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return ExceptionHistory
     */
    public function setFile(string $file): ExceptionHistory
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @param string $line
     * @return ExceptionHistory
     */
    public function setLine(string $line): ExceptionHistory
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrace(): string
    {
        return $this->trace;
    }

    /**
     * @param string $trace
     * @return ExceptionHistory
     */
    public function setTrace(string $trace): ExceptionHistory
    {
        $this->trace = $trace;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ExceptionHistory
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return ExceptionHistory
     */
    public function setMessage(string $message): ExceptionHistory
    {
        $this->message = $message;
        return $this;
    }

}
<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

use JsonSerializable;

class JobDating implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $nbpro;

    /**
     * @var string
     */
    private $nbstud;

    /**
     * @var string
     */
    private $startTime;

    /**
     * @var string
     */
    private $endTime;

    /**
     * @param int|null  $id
     * @param string    $name
     * @param string    $place
     * @param string    $date
     * @param string    $nbpro
     * @param string    $nbstud
     * @param string    $startTime
     * @param string    $endTime
     */
    public function __construct(?int $id, string $name, string $place, string $date, string $nbpro, string $nbstud, string $startTime, string $endTime)
    {
        $this->id = $id;
        $this->name = ucfirst($name);

    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getnbpro(): string
    {
        return $this->nbpro;
    }

    /**
     * @return string
     */
    public function getnbstud(): string
    {
        return $this->nbstud;
    }

    /**
     * @return string
     */
    public function getstartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @return string
     */
    public function getendTime(): string
    {
        return $this->endTime;
    }

    public function update(object $datas): bool
    {
        $response = false;
        foreach ($datas as $k => $v) {
            if(!empty($this->{$k}) && $this->{$k} !== $v) {
                $this->{$k} = $v;
                $response = true;
            }
        }
        return $response;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'place' => $this->place,
            'date' => $this->date,
            'nbpro' => $this->nbpro,
            'nbstud' => $this->nbstud,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime
        ];
    }
}

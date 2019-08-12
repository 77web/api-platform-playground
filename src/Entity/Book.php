<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class Book
 *
 * @ORM\Table
 * @ORM\Entity()
 * @ApiResource()
 * @package App\Entity
 */
class Book
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime")
     */
    private $registeredAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTimeImmutable $registeredAt
     * @return Book
     */
    public function setRegisteredAt($registeredAt)
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }
}

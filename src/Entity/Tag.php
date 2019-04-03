<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity()
 */

class Tag
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true)
     */

    private $label;
    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Tag
     */
    public function setLabel(string $label): Tag
    {
        $this->label = $label;
        return $this;
    }

}
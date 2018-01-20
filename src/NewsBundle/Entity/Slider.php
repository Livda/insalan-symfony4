<?php

declare(strict_types=1);

namespace App\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\NewsBundle\Repository\SliderRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Slider
{
    const UPLOAD_PATH = 'uploads/slider/';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank("Un slider doit avoir un titre non vide")
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $link;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Slider
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return Slider
     */
    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Slider
     */
    public function setLink($link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * Set file
     *
     * @param UploadedFile|null $file
     *
     * @return Slider
     */
    public function setFile(UploadedFile $file = null): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file.
     *
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * ORM\PostPersist
     */
    public function onPostPersist()
    {
        $this->uploadFile();
    }

    /**
     * ORM\PostUpdate
     */
    public function onPostUpdate()
    {
        $this->uploadFile();
    }

    /**
     * ORM\PostRemove
     */
    public function onPreRemove()
    {
        $name = Slider::UPLOAD_PATH.DIRECTORY_SEPARATOR.$this->getId().'.png';
        if (file_exists($name)) {
            unlink($name);
        }
    }

    /**
     * @return Slider
     */
    private function uploadFile(): self
    {
        // the file property can be empty if the field is not required
        if ($this->getFile() === null) {
            return $this;
        }

        $this->getFile()->move(Slider::UPLOAD_PATH, $this->getId().'.png');

        $this->setFile(null);

        return $this;
    }
}

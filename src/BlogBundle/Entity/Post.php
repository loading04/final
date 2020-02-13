<?php


namespace BlogBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="post")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */


class Post
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="photo", type="string", length=500)
     * @Assert\File(maxSize="500k", mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
     */
    private $photo;



    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Section")
     * @ORM\JoinColumn(name="section_id",referencedColumnName="id")
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Tag")
     * @ORM\JoinColumn(name="tag_id",referencedColumnName="id")
     */
    private $tag;







    /**
     * @param \DateTime $postdate
     */
    public function setPostdate($postdate)
    {
        $this->postdate = $postdate;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postdate", type="date")
     */
    private $postdate;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    /**
     * @return \DateTime
     */
    public function getPostdate()
    {
        return $this->postdate;
    }

    /**
     * Set section
     *
     * @param \BlogBundle\Entity\Section $section
     *
     * @return Post
     */
    public function setSection(\BlogBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \BlogBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set tag
     *
     * @param \BlogBundle\Entity\Tag $tag
     *
     * @return Post
     */
    public function setTag(\BlogBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \BlogBundle\Entity\Tag
     */
    public function getTag()
    {
        return $this->tag;
    }
}

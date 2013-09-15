<?php


namespace Cotya\YoFo\Entity;

/** @Entity */
class Patch {

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="text") */
    protected $content;

    /** @Column(type="string") */
    protected $source;


    /**
     * @OneToMany(targetEntity="PatchComment", mappedBy="patch", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    protected $comments;


    /**
     * @ManyToMany(targetEntity="Project", inversedBy="patches")
     * @JoinTable(name="project_patches")
     **/
    protected $projects;

    public function __construct() {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param PatchComment $comment
     */
    public function addComment(PatchComment $comment)
    {
        $this->comments[] = $comment;
    }

    /**
     * @param Project $project
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;
    }

    public function __toString()
    {
        return "Patch Entity {$this->source}({$this->id})\n"
        ."{$this->content}";
    }
    
    
}
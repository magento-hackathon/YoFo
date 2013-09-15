<?php

namespace Cotya\YoFo\Entity;


/** @Entity(repositoryClass="Cotya\YoFo\EntityRepository\Repository") */
class Repository {

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="text") */
    protected $description;

    /** @Column(type="string") */
    protected $type;

    /** @Column(type="string") */
    protected $location;

    /** @Column(type="string") */
    protected $version;


    /**
     * @ManyToMany(targetEntity="Project", inversedBy="repositories")
     * @JoinTable(name="project_repositories")
     **/
    protected $projects;

    public function __construct() {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param Project $project
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;
    }

    
    public function __toString(){
        return "Repository Entity ({$this->id})\n"
        ."{$this->type} {$this->location} {$this->version}\n"
        ."{$this->description}";
    }
    
}
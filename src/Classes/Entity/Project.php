<?php

namespace Cotya\YoFo\Entity;


/** @Entity */
class Project {

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="string") */
    protected $name;

    /**
     * @ManyToMany(targetEntity="Patch", mappedBy="projects")
     **/
    protected $patches;

    /**
     * @ManyToMany(targetEntity="Issue", mappedBy="projects")
     **/
    protected $issues;

    /**
     * @ManyToMany(targetEntity="Repository", mappedBy="projects")
     **/
    protected $repositories;

    public function __construct() {
        $this->patches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->issues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->repositories = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    /**
     * @return Issue[]
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @return Patch[]
     */
    public function getPatches()
    {
        return $this->patches;
    }

    /**
     * @return Repository[]
     */
    public function getRepositories()
    {
        return $this->repositories;
    }
    
    

    public function __toString(){
        return "Project Entity {$this->name}({$this->id})";
    }
}
<?php


namespace Cotya\YoFo\Entity;


/** @Entity */
class Issue {

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="string") */
    protected $title;

    /** @Column(type="text") */
    protected $content;

    /**
     * @OneToMany(targetEntity="IssueComment", mappedBy="issue", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    protected $comments;


    /**
     * @ManyToMany(targetEntity="Project", inversedBy="issues")
     * @JoinTable(name="project_issues")
     **/
    protected $projects;

    public function __construct() {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param IssueComment $comment
     */
    public function addComment(IssueComment $comment)
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
        return "Issue Entity {$this->title}({$this->id})\n"
        ."{$this->content}";
    }

}
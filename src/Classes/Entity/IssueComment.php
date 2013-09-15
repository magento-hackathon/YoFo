<?php


namespace Cotya\YoFo\Entity;


/** @Entity */
class IssueComment extends Comment {


    /**
     * @ManyToOne(targetEntity="Issue", inversedBy="comments")
     * @JoinColumn(name="issue_id", referencedColumnName="id")
     **/
    protected $issue;

}
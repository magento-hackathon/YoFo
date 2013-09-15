<?php


namespace Cotya\YoFo\Entity;


/** @Entity */
class PatchComment extends Comment {

    /**
     * @ManyToOne(targetEntity="Patch", inversedBy="comments")
     * @JoinColumn(name="patch_id", referencedColumnName="id")
     **/
    protected $patch;

}
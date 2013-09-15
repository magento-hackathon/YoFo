<?php
/**
 * 
 * 
 * 
 * 
 * 
 */

namespace Cotya\YoFo\Entity;

/** @MappedSuperclass */
class Comment {

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="text") */
    protected $content;
    
    /** @Column(type="integer") */
    protected $userId;

} 
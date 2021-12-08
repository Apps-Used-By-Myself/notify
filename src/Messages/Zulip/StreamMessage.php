<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages\Zulip;

use Guanguans\Notify\Messages\Message;

class StreamMessage extends Message
{
    protected $type = 'stream';

    public function __construct(array $options = [])
    {
        parent::__construct(array_merge($options, ['type' => $this->type]));
    }

    /**
     * @var string[]
     */
    protected $defined = [
        'type',
        'to',
        'content',
        'topic',
        'queue_id',
        'local_id',
    ];

    /**
     * @var string[]
     */
    protected $required = [
        'type',
        'to',
        'content',
        'topic',
    ];

    /**
     * @var array
     */
    protected $allowedTypes = [
        'to' => ['string', 'int'],
        'content' => 'string',
        'topic' => 'string',
        'queue_id' => 'string',
        'local_id' => 'string',
    ];
}

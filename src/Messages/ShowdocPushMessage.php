<?php

declare(strict_types=1);

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages;

class ShowdocPushMessage extends Message
{
    /**
     * @var string[]
     */
    protected $defined = [
        'title',
        'content',
    ];

    public function __construct(string $title, string $content)
    {
        parent::__construct([
            'title' => $title,
            'content' => $content,
        ]);
    }
}

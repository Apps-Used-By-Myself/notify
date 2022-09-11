<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Clients;

class XiZhiClient extends Client
{
    /**
     * @var array<string, string>
     */
    public const REQUEST_URL_TEMPLATE = [
        'single' => 'https://xizhi.qqoq.net/%s.send',
        'channel' => 'https://xizhi.qqoq.net/%s.channel',
    ];

    /**
     * @var string[]
     */
    protected $defined = [
        'token',
        'message',
        'type',
    ];

    /**
     * @var string[]
     */
    protected $options = [
        'type' => 'single',
    ];

    /**
     * @var \string[][]
     */
    protected $allowedValues = [
        'type' => ['single', 'channel'],
    ];

    public function getType(): string
    {
        return $this->getOption('type');
    }

    /**
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->setOption('type', $type);

        return $this;
    }

    public function getRequestUrl(): string
    {
        return sprintf(static::REQUEST_URL_TEMPLATE[$this->getType()], $this->getToken());
    }
}

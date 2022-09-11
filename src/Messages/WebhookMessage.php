<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages;

class WebhookMessage extends Message
{
    /**
     * @var string[]
     */
    protected $defined = [
        'headers',
        'query',
        'body',
        'verify',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $options = [
        'verify' => false,
    ];

    /**
     * @var array
     */
    protected $allowedTypes = [
        'verify' => 'bool',
    ];

    public function __construct(array $body = [])
    {
        parent::__construct([
            'body' => $body,
        ]);
    }

    public function setHeaders(array $headers): self
    {
        $this->setOption('headers', $headers);

        return $this;
    }

    public function setQuery(array $query): self
    {
        $this->setOption('query', $query);

        return $this;
    }

    public function setBody(array $body): self
    {
        $this->setOption('body', $body);

        return $this;
    }

    public function setVerify(bool $verify): self
    {
        $this->setOption('verify', $verify);

        return $this;
    }

    public function transformToRequestParams()
    {
        return $this->getOption('body');
    }
}

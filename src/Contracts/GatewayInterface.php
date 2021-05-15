<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Contracts;

interface GatewayInterface
{
    public function getName(): string;

    /**
     * @param \Guanguans\Notify\Contracts\MessageInterface|null $message
     *
     * @return mixed
     */
    public function send(MessageInterface $message = null);
}

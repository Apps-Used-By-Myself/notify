<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages\WeWork;

use Guanguans\Notify\Messages\Message;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsMessage extends Message
{
    protected $type = 'news';

    /**
     * @var string[]
     */
    protected $defined = [
        'articles',
    ];

    public function configureOptionsResolver(OptionsResolver $resolver): OptionsResolver
    {
        $resolver = parent::configureOptionsResolver($resolver);

        return tap($resolver, function ($resolver) {
            $resolver->setDefault('articles', []);
            $resolver->setAllowedTypes('articles', 'array');
        });
    }

    public function setArticles(array $articles)
    {
        return $this->addArticles($articles);
    }

    public function addArticles(array $articles)
    {
        foreach ($articles as $article) {
            $this->addArticle($article);
        }

        return $this;
    }

    public function setArticle(array $article)
    {
        return $this->addArticle($article);
    }

    public function addArticle(array $article)
    {
        $this->options['articles'][] = configure_options(array_diff($article, $this->options['articles']), function (OptionsResolver $resolver) {
            $resolver->setDefined([
                'title',
                'description',
                'url',
                'picurl',
            ]);
        });

        return $this;
    }

    public function transformToRequestParams()
    {
        return [
            'msgtype' => 'news',
            'news' => [
                'articles' => $this->options['articles'],
            ],
        ];
    }
}

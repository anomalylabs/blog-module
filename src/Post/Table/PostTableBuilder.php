<?php namespace Anomaly\PostsModule\Post\Table;

use Anomaly\PostsModule\Post\Table\Column\Status;
use Anomaly\PostsModule\Post\Table\Filter\StatusFilterQuery;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PostTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Table
 */
class PostTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'tags',
                'title',
                'summary',
                'meta_title',
                'meta_keywords',
                'meta_description'
            ]
        ],
        'author',
        'category',
        'status' => [
            'filter'  => 'select',
            'query'   => StatusFilterQuery::class,
            'options' => [
                'live'      => 'anomaly.module.posts::field.status.option.live',
                'draft'     => 'anomaly.module.posts::field.status.option.draft',
                'scheduled' => 'anomaly.module.posts::field.status.option.scheduled'
            ]
        ]
    ];

    /**
     * The tree buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'view' => [
            'target' => '_blank'
        ]
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'order_by' => [
            'publish_at' => 'DESC'
        ]
    ];
}

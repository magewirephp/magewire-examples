<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;

/**
 * @method bool getMarkAsDone()
 * @method bool hasMarkAsDone()
 *
 * @method array getThings()
 * @method bool hasThings()
 */
class ListShuffle extends Component
{
    public $markAsDone = false;

    public $things = [
        ['id' => 0, 'title' => 'Let\'s'],
        ['id' => 1, 'title' => 'Make'],
        ['id' => 2, 'title' => 'Magento'],
        ['id' => 3, 'title' => 'Awesome'],
        ['id' => 4, 'title' => 'Again'],
    ];

    public function shuffle(): void
    {
        $things = $this->things;
        shuffle($things);

        $this->things = $things;
        $entities = array_column($things, 'id');

        if ($this->getMarkAsDone()) {
            $title = 'List shuffle (' . join(',', $entities) . ')';
            $this->emitTo('magewire.todo-checklist', 'todo:finish', [$title]);
        }
        if ($entities === [2,1,3,0,4]) {
            $this->emitTo('magewire.dispatch-events', 'rick:roll');
        }
    }
}

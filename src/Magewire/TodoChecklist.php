<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;
use Magewirephp\Magewire\Model\Element\FlashMessage;

/**
 * @method array getTasks()
 * @method array hasTasks()
 */
class TodoChecklist extends Component
{
    public $tasks = [];

    protected $loader = true;

    protected $listeners = ['todo:finish' => 'saveTask'];

    /**
     * @param string|null $title
     */
    public function saveTask(string $title = null): void
    {
        $this->tasks[] = $title;
    }

    /**
     * @param int $index
     * @return FlashMessage|void
     */
    public function resetTask(int $index)
    {
        if (!isset($this->tasks[$index])) {
            return $this->dispatchErrorMessage(__('Task with ID "%1" doesnt exist', [$index]));
        }

        $this->emitTo('magewire.todo', 'todo:reset', [$this->tasks[$index]]);
        unset($this->tasks[$index]);
    }

    public function clearTasks(): void
    {
        $this->tasks = [];
    }
}

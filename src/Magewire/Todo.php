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
 * @method string getTask()
 * @method bool hasTask()
 *
 * @method array getTasks()
 * @method array hasTasks()
 *
 * @method int|null getIndex()
 * @method bool hasIndex()
 */
class Todo extends Component
{
    public $task = '';
    public $tasks = [];
    public $index;

    protected $loader = true;

    protected $listeners = ['todo:reset' => 'saveTask'];

    /**
     * @param string|null $title
     * @return FlashMessage|void
     */
    public function saveTask(string $title = null)
    {
        $title = ucfirst($title ?? $this->getTask());

        if (empty($title)) {
            return $this->dispatchErrorMessage(__('Title can not be empty'));
        }
        if (in_array($title, $this->tasks) && !$this->hasIndex()) {
            return $this->dispatchWarningMessage(__('Task already exists'));
        }
        if ($this->hasIndex()) {
            $this->tasks[$this->getIndex()] = $title;
        } else {
            $this->tasks[] = $title;
        }

        // Notify the customer just once as this is an example
        if (count($this->getTasks()) === 1) {
            $this->dispatchSuccessMessage(__('Task has been saved successfully.'));
        }
        // Always empty it's current input title.
        $this->task = '';
    }

    /**
     * @param int $index
     * @return FlashMessage|void
     */
    public function finishTask(int $index)
    {
        if (!isset($this->tasks[$index])) {
            return $this->dispatchErrorMessage(__('Task with ID "%1" doesnt exist', [$index]));
        }

        $this->emitTo('magewire.todo-checklist', 'todo:finish', [$this->tasks[$index]]);
        unset($this->tasks[$index]);
    }

    public function modifyTask(int $index)
    {
        if (!isset($this->tasks[$index])) {
            return $this->dispatchErrorMessage(__('Task with ID "%1" doesnt exist', [$index]));
        }

        $this->index = $index;
        $this->task = $this->tasks[$index];
    }
}

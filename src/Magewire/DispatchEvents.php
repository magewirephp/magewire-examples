<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;

class DispatchEvents extends Component
{
    public $process = false;

    protected $loader = ['process'];

    public function process(): void
    {
        $this->process = !$this->process;

        $this->dispatchBrowserEvent('process:after', ['show' => $this->process]);

        $this->emitTo(
            'magewire.todo-checklist',
            'todo:finish',
            'Process browser event (' . ($this->process ? 'show' : 'hide') . ')'
        );
    }
}

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
    protected $loader = ['process'];

    protected $listeners = ['rick:roll' => 'process'];

    public function process(): void
    {
        $this->dispatchBrowserEvent('show-rick-roll', [
            'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?enablejsapi=1&version=3&rel=0&showinfo=0&controls=0&autohide=1&autoplay=1&title=0&byline=0&portrait=0&badge=0'
        ]);

        $this->emitTo('magewire.todo-checklist', 'todo:finish', ['Watch Rick Astley on YouTube']);
    }
}

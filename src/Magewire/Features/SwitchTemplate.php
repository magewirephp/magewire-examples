<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire\Features;

use Magewirephp\Magewire\Component;

class SwitchTemplate extends Component
{
    public $templates;
    public $template;

    public function mount(array $templates)
    {
        $this->templates = $templates;
        $this->setTemplate('ta');
    }

    /**
     * @param string $key
     */
    public function setTemplate(string $key): void
    {
        if (isset($this->templates[$key])) {
            if ($key === $this->template) {
                $this->dispatchNoticeMessage('Template was already visible.');
            }

            $this->template = $key;
            $this->switchTemplate($this->templates[$this->template]);

            return;
        }

        $this->dispatchErrorMessage('Something went wrong.');
    }
}

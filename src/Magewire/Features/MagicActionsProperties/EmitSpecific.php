<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire\Features\MagicActionsProperties;

use Magewirephp\Magewire\Component;

class EmitSpecific extends Component
{
    public $global = false;
    public $specific = false;

    protected $listeners = [
        'global',
        'specific',
    ];

    /**
     * @see /Magewire/Features/MagicActionsProperties/EmitGlobal.php
     * @param string $prefix
     */
    public function global(string $prefix)
    {
        if ($this->global) {
            $this->dispatchNoticeMessage(strtoupper($prefix) . ': Global property value was reset to false');
        } else {
            $this->dispatchSuccessMessage(strtoupper($prefix) . ': Dispatch message from component ' . get_class($this));
        }

        $this->global = !$this->global;
    }

    public function specific(string $prefix)
    {
        if ($this->specific) {
            $this->dispatchNoticeMessage(strtoupper($prefix) . ': Specific property value was reset to false');
        } else {
            $this->dispatchSuccessMessage(strtoupper($prefix) . ': Specific dispatch message from component ' . get_class($this));
        }

        $this->specific = !$this->specific;
    }
}

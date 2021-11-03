<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire\Features\MagicActionsProperties;

use Magewirephp\Magewire\Component;

class EmitGlobal extends Component
{
    public $global = false;

    protected $listeners = [
        'global',
    ];

    /**
     * @see /Magewire/Features/MagicActionsProperties/EmitSpecific.php
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
}

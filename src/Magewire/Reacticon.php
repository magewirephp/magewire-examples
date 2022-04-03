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
 * @method int getQuantity()
 * @method bool hasQuantity()
 * @method int getInterval()
 * @method bool hasInterval()
 * @method bool getIncrement()
 * @method bool hasIncrement()
 * @method bool getDecrement()
 * @method bool hasDecrement()
 */
class Reacticon extends Component
{
    public $quantity  = 1;
    public $interval  = 1;
    public $increment = true;
    public $decrement = true;

    /**
     * @param bool $value
     * @return bool
     */
    public function updatingIncrement(bool $value): bool
    {
        $this->dispatchBrowserEvent('toggle-button', ['increment' => $value]);
        return $value;
    }

    /**
     * @param bool $value
     * @return bool
     */
    public function updatingDecrement(bool $value): bool
    {
        $this->dispatchBrowserEvent('toggle-button', ['decrement' => $value]);
        return $value;
    }

    /**
     * @return void
     */
    public function increment(): void
    {
        $this->quantity = $this->getQuantity() + $this->getInterval();
    }

    public function decrement()
    {
        $calc = $this->getQuantity() - $this->getInterval();

        if ($calc < 0) {
            $this->dispatchNoticeMessage('You can\'t go below zero');
        } else {
            $this->quantity = $calc;
        }
    }
}

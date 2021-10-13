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
     * @param string $value
     * @return string
     */
    public function updatingInterval(string $value): string
    {
        if ((int) $value === 10) {
            $this->emitTo('magewire.dispatch-events', 'rick:roll');
        }
        return $value;
    }

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
        $this->quantity++;
    }

    /**
     * @return void
     */
    public function decrement()
    {
        $this->quantity--;
    }
}

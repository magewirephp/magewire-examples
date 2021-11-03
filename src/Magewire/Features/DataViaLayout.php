<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire\Features;

use Magewirephp\Magewire\Component;

/**
 * @method string getFoo()
 * @method bool hasFoo()
 *
 * @method string getBar()
 * @method bool hasBar()
 *
 * @method bool getToggle()
 * @method bool hasToggle()
 */
class DataViaLayout extends Component
{
    public $foo,
           $bar,
           $toggle;

    public function foo()
    {
        $this->foo = strtoupper($this->getFoo());
    }

    public function bar()
    {
        $this->bar = strtolower($this->getBar());
    }

    public function toggle()
    {
        $this->toggle = !$this->getToggle();
    }
}

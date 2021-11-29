<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire\Features;

use Magewirephp\Magewire\Component;

class DollarWire extends Component
{
    public $foo;
    public $called = 0;

    public function promise()
    {
        $this->foo = random_int(0,999);
        $this->called++;
    }
}

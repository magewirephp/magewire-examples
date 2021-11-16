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
 * @method string|null getFoo()
 * @method bool hasFoo()
 * @method string|null getBar()
 * @method bool hasBar()
 */
class Reset extends Component
{
    public $foo;
    public $bar;

    public function resetByProperty(string $property)
    {
        $this->reset([$property]);
    }

    public function resetAll()
    {
        $this->reset();
    }
}

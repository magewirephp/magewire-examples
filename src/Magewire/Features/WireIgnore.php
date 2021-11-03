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
 */
class WireIgnore extends Component
{
    public $foo;
}

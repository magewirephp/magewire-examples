<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Model;

use Magewirephp\Magewire\Model\WireableInterface;

class Settings implements WireableInterface
{
    protected $items = [
        'foo' => 'bar',
        'bar' => 'foo',
    ];

    public function wire(): array
    {
        return $this->items;
    }

    public function unwire($value): WireableInterface
    {
        $this->items = $value;
        return $this;
    }
}

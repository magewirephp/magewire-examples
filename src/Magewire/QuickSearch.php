<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

use Exception;
use Magewirephp\Magewire\Component;

class QuickSearch extends Component
{
    public string $q = '';
    public array $results = [];

    /**
     * @param string $for
     */
    public function search(string $for)
    {
        $this->q = $for;
        $this->results = [];

        try {
            for ($i = random_int(1, 10); $i <= 10; $i++) {
                $this->results[] = substr(str_shuffle(str_repeat($c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', (int)ceil(10 / strlen($c)))), 1, 10);
            }
        } catch (Exception $e) {
            $this->results[] = __('No results found.');
        }
    }
}

<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;

class Pagination extends Component\Pagination
{
    /**
     * @inheritDoc
     */
    public function toPreviousPage(): void
    {
        $this->toPage(max($this->getPage() - 1, 1));
    }

    /**
     * @inheritDoc
     */
    public function toNextPage(): void
    {
        $this->toPage($this->getPage() + 1);
    }

    /**
     * @inheritDoc
     */
    public function toPage($page): void
    {
        if ($page === $this->getLastPage()) {
            $this->dispatchNoticeMessage(__('You\'ve reached the last page.'));
            $this->emitTo('magewire.dispatch-events', 'rick:roll');
        }

        $this->assign('page', (int) $page);
    }

    /**
     * @inheritDoc
     */
    public function getSize(): int
    {
        return (int) ceil(count($this->getAllPageItems()) / $this->getPageSize());
    }

    /**
     * @inheritDoc
     */
    public function onFirstPage(): bool
    {
        return $this->getPage() === 1;
    }

    /**
     * @inheritDoc
     */
    public function getLastPage(): int
    {
        return $this->getSize();
    }

    /**
     * @inheritDoc
     */
    public function hasPages(): bool
    {
        return $this->getSize() > 0;
    }

    /**
     * @inheritDoc
     */
    public function onLastPage(): bool
    {
        return $this->getPage() === $this->getLastPage();
    }

    /**
     * @inheritDoc
     */
    public function isCurrentPage($page): bool
    {
        return $this->getPage() === (int) $page;
    }

    /**
     * @inheritDoc
     */
    public function hasMorePages(): bool
    {
        return !$this->onLastPage();
    }

    /**
     * @inheritDoc
     */
    public function getPageItems(): array
    {
        $offset = ($this->getPage() * $this->getPageSize()) - $this->getPageSize();
        $length = $this->getPageSize();

        return array_slice($this->getAllPageItems(), $offset, $length, true);
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function getAllPageItems(): array
    {
        $items = [];

        for ($i = 0; $i < 100; $i ++) {
            $items[] = [
                'w' => $i,
                'd' => random_int(0, 99),
                's' => random_int(0, 99),
                'a' => random_int(0, 99),
            ];
        }

        return $items;
    }
}

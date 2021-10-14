<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Controller;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

abstract class Prototype implements HttpGetActionInterface
{
    public const TITLE = null;

    /** @var PageFactory */
    private $pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();

        if (self::TITLE !== null) {
            $page->getConfig()->getTitle()->set('Reacticon - Prototype - ' . self::TITLE);
        }

        return $page;
    }
}

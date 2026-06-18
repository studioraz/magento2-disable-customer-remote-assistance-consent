<?php
/**
 * Copyright © 2025 Studio Raz. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types=1);

namespace SR\DisableCustomerRemoteAssistanceConsent\Model\Resolver;

use Magento\LoginAsCustomerApi\Api\Data\IsLoginAsCustomerEnabledForCustomerResultInterface;
use Magento\LoginAsCustomerApi\Api\Data\IsLoginAsCustomerEnabledForCustomerResultInterfaceFactory;
use Magento\LoginAsCustomerApi\Api\IsLoginAsCustomerEnabledForCustomerInterface;

/**
 * Resolver that bypasses the customer consent check, always allowing Login As Customer.
 */
class AlwaysAllowedResolver implements IsLoginAsCustomerEnabledForCustomerInterface
{
    /**
     * @param IsLoginAsCustomerEnabledForCustomerResultInterfaceFactory $resultFactory
     */
    public function __construct(
        private readonly IsLoginAsCustomerEnabledForCustomerResultInterfaceFactory $resultFactory
    ) {
    }

    /**
     * @inheritdoc
     */
    public function execute(int $customerId): IsLoginAsCustomerEnabledForCustomerResultInterface
    {
        return $this->resultFactory->create(['messages' => []]);
    }
}

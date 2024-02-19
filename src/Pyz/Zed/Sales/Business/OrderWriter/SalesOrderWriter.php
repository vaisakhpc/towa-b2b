<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Sales\Business\OrderWriter;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriter as SprykerSalesOrderWriter;

/**
 * Extending the Spryker's core class with the Pyz version
 */
class SalesOrderWriter extends SprykerSalesOrderWriter
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\SpySalesOrderEntityTransfer $salesOrderEntityTransfer
     *
     * @return \Generated\Shared\Transfer\SpySalesOrderEntityTransfer
     */
    protected function hydrateSalesOrderEntityTransfer(
        QuoteTransfer $quoteTransfer,
        SpySalesOrderEntityTransfer $salesOrderEntityTransfer
    ): SpySalesOrderEntityTransfer {
        $salesOrderEntityTransfer = parent::hydrateSalesOrderEntityTransfer($quoteTransfer, $salesOrderEntityTransfer);
        $salesOrderEntityTransfer->setOrderName($quoteTransfer->getOrderName());
        return $salesOrderEntityTransfer;
    }
}

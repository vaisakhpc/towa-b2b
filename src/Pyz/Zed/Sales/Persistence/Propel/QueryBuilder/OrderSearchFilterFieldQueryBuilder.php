<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Sales\Persistence\Propel\QueryBuilder;

use Spryker\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilder as SprykerOrderSearchFilterFieldQueryBuilder;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderTableMap;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderItemTableMap;

/**
 * Extending the Spryker's core class with the Pyz version
 */
class OrderSearchFilterFieldQueryBuilder extends SprykerOrderSearchFilterFieldQueryBuilder
{
     /**
     * @var array<string, string>
     */
    protected const ORDER_SEARCH_TYPE_MAPPING = [
        self::SEARCH_TYPE_ORDER_REFERENCE => SpySalesOrderTableMap::COL_ORDER_REFERENCE,
        self::SEARCH_TYPE_ORDER_NAME => SpySalesOrderTableMap::COL_ORDER_NAME,
        self::SEARCH_TYPE_ITEM_NAME => SpySalesOrderItemTableMap::COL_NAME,
        self::SEARCH_TYPE_ITEM_SKU => SpySalesOrderItemTableMap::COL_SKU,
    ];

    /**
     * @uses \Spryker\Shared\Sales\SalesConfig::ORDER_SEARCH_TYPES
     *
     * @var string
     */
    protected const SEARCH_TYPE_ORDER_NAME = 'orderName';

    /**
     * @var array<string, string>
     */
    protected const ORDER_BY_COLUMN_MAPPING = [
        self::SEARCH_TYPE_ORDER_REFERENCE => SpySalesOrderTableMap::COL_ID_SALES_ORDER,
        'date' => SpySalesOrderTableMap::COL_CREATED_AT,
        self::SEARCH_TYPE_ORDER_NAME => SpySalesOrderTableMap::COL_ORDER_NAME,
    ];
}
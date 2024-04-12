<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomOrderTypeRepositoryInterface
{

    /**
     * Save CustomOrderType
     * @param \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface $customOrderType
     * @return \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface $customOrderType
    );

    /**
     * Retrieve CustomOrderType
     * @param string $customordertypeId
     * @return \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customordertypeId);

    /**
     * Retrieve CustomOrderType matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CustomOrderType
     * @param \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface $customOrderType
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface $customOrderType
    );

    /**
     * Delete CustomOrderType by ID
     * @param string $customordertypeId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customordertypeId);
}


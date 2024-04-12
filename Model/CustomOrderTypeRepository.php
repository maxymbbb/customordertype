<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Model;

use Bonecki\CustomOrderType\Api\CustomOrderTypeRepositoryInterface;
use Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface;
use Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterfaceFactory;
use Bonecki\CustomOrderType\Api\Data\CustomOrderTypeSearchResultsInterfaceFactory;
use Bonecki\CustomOrderType\Model\ResourceModel\CustomOrderType as ResourceCustomOrderType;
use Bonecki\CustomOrderType\Model\ResourceModel\CustomOrderType\CollectionFactory as CustomOrderTypeCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomOrderTypeRepository implements CustomOrderTypeRepositoryInterface
{

    /**
     * @var CustomOrderTypeInterfaceFactory
     */
    protected $customOrderTypeFactory;

    /**
     * @var CustomOrderType
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var CustomOrderTypeCollectionFactory
     */
    protected $customOrderTypeCollectionFactory;

    /**
     * @var ResourceCustomOrderType
     */
    protected $resource;


    /**
     * @param ResourceCustomOrderType $resource
     * @param CustomOrderTypeInterfaceFactory $customOrderTypeFactory
     * @param CustomOrderTypeCollectionFactory $customOrderTypeCollectionFactory
     * @param CustomOrderTypeSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCustomOrderType $resource,
        CustomOrderTypeInterfaceFactory $customOrderTypeFactory,
        CustomOrderTypeCollectionFactory $customOrderTypeCollectionFactory,
        CustomOrderTypeSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->customOrderTypeFactory = $customOrderTypeFactory;
        $this->customOrderTypeCollectionFactory = $customOrderTypeCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        CustomOrderTypeInterface $customOrderType
    ) {
        try {
            $this->resource->save($customOrderType);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customOrderType: %1',
                $exception->getMessage()
            ));
        }
        return $customOrderType;
    }

    /**
     * @inheritDoc
     */
    public function get($customOrderTypeId)
    {
        $customOrderType = $this->customOrderTypeFactory->create();
        $this->resource->load($customOrderType, $customOrderTypeId);
        if (!$customOrderType->getId()) {
            throw new NoSuchEntityException(__('CustomOrderType with id "%1" does not exist.', $customOrderTypeId));
        }
        return $customOrderType;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customOrderTypeCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        CustomOrderTypeInterface $customOrderType
    ) {
        try {
            $customOrderTypeModel = $this->customOrderTypeFactory->create();
            $this->resource->load($customOrderTypeModel, $customOrderType->getCustomordertypeId());
            $this->resource->delete($customOrderTypeModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CustomOrderType: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($customOrderTypeId)
    {
        return $this->delete($this->get($customOrderTypeId));
    }
}


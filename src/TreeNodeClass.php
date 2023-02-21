<?php

namespace genTree;

class TreeNodeClass
{
    private string $itemName;
    private ?string $parent;
    private array $children;

    public function __construct(string $itemName, ?string $parent)
    {
        $this->itemName = $itemName;
        $this->parent = $parent === '' ? null : $parent;
        $this->children = [];
    }

    public function getName(): ?string
    {
        return $this->itemName;
    }

    public function addChild(self $child): void
    {
        $this->children[] = $child;
    }

    public function setChildren(array $child): void
    {
        $this->children = $child;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function toArray(): array
    {
        $result = [
            'itemName' => $this->itemName,
            'parent' => $this->parent,
            'children' => [],
        ];

        foreach ($this->children as $child) {
            $result['children'][] = $child->toArray();
        }

        return $result;
    }
}
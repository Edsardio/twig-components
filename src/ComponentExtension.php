<?php

namespace Performing\TwigComponents;

use Twig\Extension\AbstractExtension;

class ComponentExtension extends AbstractExtension
{
    /**
     * @var []
     */
    private $relativePath;

    public function __construct($relativePath)
    {
        $this->relativePaths = rtrim($relativePath, DIRECTORY_SEPARATOR);
    }

    public function getTokenParsers()
    {
        return [
            new ComponentTokenParser($this->relativePath),
            new SlotTokenParser(),
        ];
    }
}

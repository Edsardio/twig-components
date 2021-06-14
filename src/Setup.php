<?php

namespace Performing\TwigComponents;

use Twig\Environment;

class Setup
{
    public static function init(Environment $twig, $relativePath, $config = null)
    {
        $twig->addExtension(new ComponentExtension($relativePath));

        $twig->setLexer(
            (new ComponentLexer($twig))
            ->withConfig($config)
        );

        /** @var \Twig\Extension\EscaperExtension */
        $escaper = $twig->getExtension(\Twig\Extension\EscaperExtension::class);
        $escaper->addSafeClass(AttributesBag::class, ['all']);
        $escaper->addSafeClass(SlotBag::class, ['all']);

        return $twig;
    }
}

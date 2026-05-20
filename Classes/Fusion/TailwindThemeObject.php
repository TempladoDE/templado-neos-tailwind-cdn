<?php

namespace Templado\TailwindTheme\Fusion;

use Neos\Fusion\FusionObjects\AbstractFusionObject;

class TailwindThemeObject extends AbstractFusionObject
{
    public function evaluate()
    {
        $colors = $this->fusionValue('colors') ?? [];
        $theme = [
            'color' => $colors,
        ];

        $style = ['@theme {'];
        foreach ($theme as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    $style[] = "  --$key-$subKey: $subValue;";
                }
            }
        }

        $style[] = '}';
        return implode("\n", $style);
    }
}

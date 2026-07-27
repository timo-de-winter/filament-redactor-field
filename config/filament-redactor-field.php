<?php

use TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin;

// config for TimoDeWinter/FilamentRedactorField
return [
    'darkmode_enabled' => true,

    'plugins' => [
        DefaultRedactorPlugin::Alignment,
        DefaultRedactorPlugin::BlockBackground,
        DefaultRedactorPlugin::BlockBorder,
        DefaultRedactorPlugin::BlockColor,
        DefaultRedactorPlugin::BlockFontsize,
        DefaultRedactorPlugin::BlockSpacing,
        DefaultRedactorPlugin::Emoji,
        DefaultRedactorPlugin::FontColor,
        DefaultRedactorPlugin::FontFamily,
        DefaultRedactorPlugin::FontSize,
        DefaultRedactorPlugin::FullScreen,
        DefaultRedactorPlugin::Icons,
        DefaultRedactorPlugin::ImageResize,
        DefaultRedactorPlugin::Limiter,
        DefaultRedactorPlugin::SpecialChars,
        DefaultRedactorPlugin::TextExpander,
    ],
];

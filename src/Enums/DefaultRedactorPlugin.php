<?php

namespace TimoDeWinter\FilamentRedactorField\Enums;

enum DefaultRedactorPlugin: string
{
        case Alignment = 'alignment';
        case BlockBackground = 'blockbackground';
        case BlockBorder = 'blockborder';
        case BlockClass = 'blockclass';
        case BlockCode = 'blockcode';
        case BlockColor = 'blockcolor';
        case BlockFontsize = 'blockfontsize';
        case BlockId = 'blockid';
        case BlockSpacing = 'blockspacing';
        case Clips = 'clips';
        case Counter = 'counter';
        case DefinedLinks = 'definedlinks';
        case Emoji = 'emoji';
        case FileLink = 'filelink';
        case FontColor = 'fontcolor';
        case FontFamily = 'fontfamily';
        case FontSize = 'fontsize';
        case FullScreen = 'fullscreen';
        case Icons = 'icons';
        case ImageResize = 'imageresize';
        case Limiter = 'limiter';
        case Math = 'math';
        case Mention = 'mention';
        case MergeTag = 'mergetag';
        case Print = 'print';
        case Snippets = 'snippets';
        case SpecialChars = 'specialchars';
        case Templates = 'templates';
        case TextDirection = 'textdirection';
        case TextExpander = 'textexpander';
        case Variable = 'variable';
}

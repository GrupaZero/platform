<tr{{$content->isActive ? '' : ' class="text-muted"'}} {{ $content->parentId ? ' style="background-color: rgba(182, 182, 182, 0.' . $content->level . ');"' : '' }}>
    <td class="text-left"{{ $content->parentId ? ' style="padding-left: ' . $content->level * 2 . '0px;"' : '' }}>
        <?php $activeTranslation = $content->translation($lang->code); ?>
        <?php $activeRoute = $content->routeTranslation($lang->code); ?>
        @if($activeTranslation)
            @if($content->isActive)
                <a href="{{ $activeRoute->url }}">{{ $activeTranslation->title }}</a>
            @else
                {{ $activeTranslation->title }}
            @endif
        @else
            @lang('common.noTranslation')
        @endif
    </td>
    <td>
        @if($content->isActive)
            @lang('common.published')
        @else
            @lang('common.notPublished')
        @endif
    </td>
    <td>
        {{ $content->weight }}
    </td>
    <td>
        {{ $content->authorName() }}
    </td>
    <td class="text-left">
        {{ $content->path }}
    </td>
    <td>
        {{ $content->type }}
    </td>
</tr>
@each('dev.treeNode', $content->children, 'content')

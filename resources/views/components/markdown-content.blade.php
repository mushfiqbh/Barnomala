@props([
    'content' => '',
    'previewId' => null,
    'render' => true,
    'previewClass' => 'markdown-preview text-gray-700',
    'options' => [],
])

@php
    $renderOptions = array_merge(
        [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ],
        $options ?? [],
    );
@endphp

<div {{ $attributes }}>
    <div @if ($previewId) id="{{ $previewId }}" @endif class="{{ $previewClass }}">
        @if ($render)
            {!! \Illuminate\Support\Str::markdown($content ?? '', $renderOptions) !!}
        @endif
    </div>
</div>

<style>
    /* Tailwind CSS Prose Styles for Markdown Preview */
    .markdown-preview h1,
    .markdown-preview h2,
    .markdown-preview h3,
    .markdown-preview h4,
    .markdown-preview h5,
    .markdown-preview h6 {
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    .markdown-preview h1 {
        font-size: 1.75rem;
    }

    .markdown-preview h2 {
        font-size: 1.5rem;
    }

    .markdown-preview h3 {
        font-size: 1.25rem;
    }

    .markdown-preview p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }

    .markdown-preview ul,
    .markdown-preview ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .markdown-preview li {
        margin-bottom: 0.5rem;
    }

    .markdown-preview blockquote {
        border-left: 4px solid #3b82f6;
        padding-left: 1rem;
        color: #4b5563;
        background-color: #f9fafb;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }

    .markdown-preview code {
        background-color: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.375rem;
        font-size: 0.95em;
    }

    .markdown-preview pre {
        background-color: #1f2937;
        color: #f3f4f6;
        padding: 1rem;
        border-radius: 0.75rem;
        overflow-x: auto;
        margin-bottom: 1.5rem;
    }

    .markdown-preview pre code {
        background: none;
        padding: 0;
    }
</style>

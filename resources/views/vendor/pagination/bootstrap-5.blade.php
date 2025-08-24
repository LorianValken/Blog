@if ($paginator->hasPages())
    <nav class="pagination-container">
        <div class="mobile-pagination d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i> @lang('pagination.previous')
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link hover-effect" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i> @lang('pagination.previous')
                        </a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link hover-effect" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            @lang('pagination.next') <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">
                            @lang('pagination.next') <i class="fas fa-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="desktop-pagination d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div class="pagination-info">
                <p class="pagination-stats">
                    {!! __('Showing') !!}
                    <span class="highlight">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="highlight">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="highlight">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="pagination-controls">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link hover-effect" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item dots disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                            <span class="page-number">{{ $page }}</span>
                                            <span class="active-indicator"></span>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link hover-effect" href="{{ $url }}">
                                            <span class="page-number">{{ $page }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link hover-effect" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

<style>
/* Modern Pagination Styles */
.pagination-container {
    margin: 2rem 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Mobile Pagination */
.mobile-pagination .pagination {
    width: 100%;
    gap: 0;
}

.mobile-pagination .page-link {
    min-width: 140px;
    height: 48px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: white;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.mobile-pagination .page-link:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.mobile-pagination .page-item.disabled .page-link {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.3);
}

/* Desktop Pagination */
.desktop-pagination {
    width: 100%;
}

.pagination-info {
    margin-right: 1rem;
}

.pagination-stats {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.9rem;
    margin: 0;
}

.highlight {
    color: white;
    font-weight: 600;
    padding: 0 4px;
}

.pagination-controls .pagination {
    gap: 6px;
}

.pagination-controls .page-link {
    position: relative;
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.pagination-controls .page-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.pagination-controls .hover-effect:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.pagination-controls .hover-effect:hover::before {
    opacity: 1;
}

.pagination-controls .page-item.active .page-link {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 4px 16px rgba(102, 126, 234, 0.4);
}

.pagination-controls .page-item.active .active-indicator {
    position: absolute;
    bottom: 6px;
    left: 50%;
    transform: translateX(-50%);
    width: 4px;
    height: 4px;
    background: white;
    border-radius: 50%;
}

.pagination-controls .page-item.disabled .page-link {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.3);
    cursor: not-allowed;
}

.pagination-controls .page-item.dots .page-link {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.5);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.pagination-container {
    animation: fadeIn 0.6s ease-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.page-item.active .page-link {
    animation: pulse 0.6s ease;
}

/* Icons */
.fas {
    font-size: 0.9rem;
}

/* Responsive */
@media (max-width: 767.98px) {
    .pagination-stats {
        text-align: center;
        margin-bottom: 1rem;
    }
    
    .desktop-pagination {
        flex-direction: column;
    }
    
    .pagination-info {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .pagination-controls {
        width: 100%;
    }
    
    .pagination-controls .pagination {
        justify-content: center;
    }
}
</style>
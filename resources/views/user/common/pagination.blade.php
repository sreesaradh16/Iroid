@if ($paginator->hasPages())
<div class="row">
    <div class="col-sm-12 col-md-5" style="padding-top: 8px;">
        <div class="dataTables_info" style="float: left;" id="example_info" role="status" aria-live="polite">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of total {{$paginator->total()}} entries </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
            <ul class="pagination" style="float: right;">
                <!-- previous starts -->
                @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                @else
                <li class="paginate_button page-item previous" id="example_previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                @endif
                <!-- previous ends -->

                @foreach ($elements as $element)
                @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a></li>
                @else
                <li class="paginate_button page-item "><a href="{{ $url }}" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">{{ $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach

                <!-- next starts -->
                @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" id="example_next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                @else
                <li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                @endif
                <!-- next ends -->
            </ul>
        </div>
    </div>
</div>
@endif
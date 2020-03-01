<li>{{ $sub_categories->title }}</li>
@if ($sub_categories->categories)
    <ul>
        @if(count($sub_categories->categories) > 0)
            @foreach ($sub_categories->categories as $subCategories)
                @include('sub_categories', ['sub_categories' => $subCategories])
            @endforeach
        @endif
    </ul>
@endif
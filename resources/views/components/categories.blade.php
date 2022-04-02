<div class="grid grid-cols-4 gap-4 md:grid-cols-6 lg:grid-cols-12">
    <button type="submit" form="search" class="{{ request()->input('category') === null ? 'ring-1 ring-blue' : '' }} col-span-2 p-2 md:p-4 transition bg-white rounded hover:ring-blue hover:ring-1 text-blue">
        <h3>{{ __('All') }}</h3>
    </button>
    @foreach ($categories as $category)
        <button name="category" type="submit" form="search" value="{{ $category->id }}" class="{{ request()->input('category') == $category->id ? 'ring-1 ring-blue' : '' }} col-span-2 p-2 md:p-4 transition bg-white rounded hover:ring-blue hover:ring-1 text-blue">
            <h3>{{ $category->name }}</h3>
        </button>
    @endforeach
</div>

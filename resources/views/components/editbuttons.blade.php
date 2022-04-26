<div class="inline-flex rounded-md shadow-sm" role="group">
    <x-button href="{{ route('admin.ads.reserve', ['ad'=> $ad]) }}" class="rounded-none rounded-l-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="hidden sm:block">
            {{ __("Reserve") }}
        </span>
    </x-button>
    <x-button href="{{ route('admin.ads.destroy', ['ad'=> $ad]) }}" onclick="return confirm('{{__('Are you sure you want to delete this resource?')}}');" class="rounded-none border-x-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
          <span class="hidden sm:block">
              {{ __("Delete") }}
          </span>
    </x-button>
    <x-button href="{{ route('admin.ads.edit', ['ad'=> $ad]) }}"  class="rounded-none rounded-r-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
        <span class="hidden sm:block">
            {{ __("Edit") }}
        </span>
    </x-button>
</div>

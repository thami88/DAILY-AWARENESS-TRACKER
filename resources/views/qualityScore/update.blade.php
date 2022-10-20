<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Quality Score') }}
        </h2>
    </x-slot>

    <x-page-body>
        <form action="/score/update/{{ $score->id }}" method="post">
            @csrf
            @method('PATCH')
            <x-form.text name="quality_score" :value="old('quality_score', $score->quality_score)" />
            <x-form.text name="description" :value="old('description', $score->description)" />
            <x-form.button>update</x-form.button>
        </form>
    </x-page-body>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Custom Quality Score') }}
        </h2>
    </x-slot>

    <!-- create page body -->
    <x-page-body>
        <form action="/score/store" method="post">
            @csrf
            <x-form.text name="quality_score" />
            <x-form.text name="description" />

            <x-form.button>save</x-form.button>
        </form>
    </x-page-body>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Journal Record') }}
        </h2>
    </x-slot>

    <x-page-body>
        <form action="/store" method="post">
            @csrf
            <x-form.text name="work_hours" />

            <div class="mt-6">
                <x-form.lable name="Quality Score" />
                <select name="score_id" id="quality_score">
                    @foreach ($scores as $score)
                        <option value="{{ $score->id }}">
                            {{ $score->quality_score }}</option>
                    @endforeach
                </select>
                <x-form.error name="quality_score" />
            </div>

            <x-form.text name="note" />

            <x-form.button>save</x-form.button>
        </form>
    </x-page-body>
</x-app-layout>

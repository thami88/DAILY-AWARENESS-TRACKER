<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Journal Record') }}
        </h2>
    </x-slot>

    {{-- Page Body --}}
    <x-page-body>
        <form action="/update/{{ $journal->id }}" method="post">
            @csrf
            @method('PATCH')
            <x-form.text name="work_hours" :value="old('work_hours', $journal->work_hours)" />

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

            <x-form..text name="note" :value="old('note', $journal->note)" />

            <x-form.button>update</x-form.button>
        </form>
    </x-page-body>
</x-app-layout>

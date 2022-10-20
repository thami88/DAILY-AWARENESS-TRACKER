<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Quality Score') }}
        </h2>
    </x-slot>

    {{-- Page Body --}}
    <x-page-body>

        <div class="flex">

            <aside class="w-48 flex-shrink-0">

                <h4 class="font-semibold mb-4">new custom quality score</h4>
                <ul>
                    <li>
                        <a href="/create/score">create</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">


                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">

                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Quality Score
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Score Description
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                                colspan="2">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($scores as $score)
                                            <tr class="border-b">
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $score->quality_score }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $score->description }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <a href="/score/edit/{{ $score->id }}"
                                                        class="hover:text-blue-600">Edit</a>
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <form action="/score/delete/{{ $score->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-xs text-gray-400">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

        </div>




    </x-page-body>
</x-app-layout>

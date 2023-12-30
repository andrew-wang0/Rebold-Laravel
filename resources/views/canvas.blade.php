@php
    use LonghornOpen\CanvasApi\CanvasApiClient;

    $api = new CanvasApiClient(env('CANVAS_HOST'), env('CANVAS_TOKEN'));

    $assignments = $api->get('/courses/22655/assignments');
@endphp

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Canvas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($assignments as $assignment)
                        <p>
                            <strong>{{ $assignment->name }}</strong>
{{--                            {!! $assignments[0]->description !!}--}}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

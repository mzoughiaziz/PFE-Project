
    @extends('layouts.app')

@section('content')
<div>

<livewire:calendar/>

@livewireScripts
@stack('scripts')
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

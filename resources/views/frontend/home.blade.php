@extends('layouts.frontend')

@section('content')
    <!-- Result Cards Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($games as $game)
            <div class="col-md-4 col-6">
                <div class="result-card position-relative">
                    @if($game->results->count() > 0)
                    <div class="new-badge">New</div>
                    @endif
                    <div class="result-header">
                        <div class="result-title">{{ $game->name }}</div>
                        <div>Time: {{ $game->game_time }}</div>
                        <div class="refresh-btn" onclick="location.reload()">Refresh Result</div>
                    </div>
                    <div class="result-body">
                        <div class="border-end">
                            <strong class="red">Last Day</strong>
                            <div>
                                {{ $game->results->where('result_date', Carbon\Carbon::yesterday()->format('Y-m-d'))->first()->result_number ?? 'XX' }}
                            </div>
                        </div>
                        <div>
                            <strong class="green">Today</strong>
                            <div>
                                {{ $game->results->where('result_date', Carbon\Carbon::today()->format('Y-m-d'))->first()->result_number ?? 'XX' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="header2">
  <h1>🔴 Today Live Satta King Result Chart</h1>
  <p>Latest updated results for Gali, Desawar, Faridabad, Ghaziabad and more</p>
</div>
<div class="container result-table">
  <table class="table table-light table-hover text-center">
    <thead class="satta-top-blink">
      <tr>
        <th>Game Name</th>
        <th>Result</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($games as $game)
      <tr>
        <td>{{ $game->name }}</td>
        <td><b>{{ $game->results->where('result_date', Carbon\Carbon::today()->format('Y-m-d'))->first()->result_number ?? 'XX' }}</b></td>
        <td>{{ $game->game_time }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@php
    $today = Carbon\Carbon::now();
    $yesterday = Carbon\Carbon::yesterday();
    
    function getDaySuffix($day) {
        if ($day >= 11 && $day <= 13) {
            return 'th';
        }
        switch ($day % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
            default: return 'th';
        }
    }
    
    $todayDay = $today->format('j');
    $todaySuffix = getDaySuffix($todayDay);
    $yesterdayDay = $yesterday->format('j');
    $yesterdaySuffix = getDaySuffix($yesterdayDay);
@endphp

<div class="header">
    Satta King Fast Results of 
    {{ $yesterday->format('F') }} {{ $yesterdayDay }}<sup>{{ $yesterdaySuffix }}</sup>, 
    {{ $yesterday->format('Y') }} & 
    {{ $today->format('F') }} {{ $todayDay }}<sup>{{ $todaySuffix }}</sup>, 
    {{ $today->format('Y') }}
</div>

<div class="container">
    <div class="row game-row games-list-header">
        <div class="col-6">
            <div class="game-title">Games List</div>
        </div>
        <div class="col-3 text-center">
            {{ $yesterday->format('D') }}. {{ $yesterdayDay }}<sup>{{ $yesterdaySuffix }}</sup>
        </div>
        <div class="col-3 text-center">
            {{ $today->format('D') }}. {{ $todayDay }}<sup>{{ $todaySuffix }}</sup>
        </div>
    </div>

    @foreach($games as $index => $game)
        <div class="row game-row {{ $index === 0 ? 'latest-result' : ($index === 1 ? 'just-past-result' : '') }}">
            <div class="col-6">
                <div class="game-title">{{ $game->name }}</div>
                <div class="time">at {{ $game->game_time }} <a href="{{ route('game.chart', $game->id) }}" class="record-link">Record Chart</a></div>
            </div>
            <div class="col-3 text-center">
                {{ $game->results->where('result_date', $yesterday->format('Y-m-d'))->first()->result_number ?? 'XX' }}
            </div>
            <div class="col-3 text-center">
                {{ $game->results->where('result_date', $today->format('Y-m-d'))->first()->result_number ?? 'XX' }}
            </div>
        </div>
    @endforeach
</div>
  
  <!-- Record Chart Section (Date Wise) -->
  <section id="monthly" class="record-chart">
    <div class="container">
        <h2>{{ date('F') }} {{ date('Y') }} - Satta King Result Chart</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark table-dark-2">
                    <tr>
                        <th>Date</th>
                        @foreach($monthlyGames as $game)
                            <th>{{ $game->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1, Carbon\Carbon::now()->daysInMonth) as $day)
                        <tr>
                            <td>{{ $day }}</td>
                            @foreach($monthlyGames as $game)
                                <td>
                                    @php
                                        $result = $game->results()
                                            ->whereDate('result_date', Carbon\Carbon::create(date('Y'), date('m'), $day))
                                            ->first();
                                    @endphp
                                    {{ $result ? $result->result_number : 'XX' }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
  
  <!-- Record Chart Section (Day Wise) -->
<section id="weekly" class="record-chart">
    <div class="container">
        <h2>Day Waise - Satta Network - Weekly Chart</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark-2">
                    <tr>
                        <th>Day</th>
                        @foreach($weeklyGames as $game)
                            <th>{{ $game->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($weekDays as $day)
                        <tr>
                            <td>{{ $day }}</td>
                            @foreach($weeklyGames as $game)
                                @php
                                    $result = $game->results
                                        ->where('result_date', Carbon\Carbon::now()
                                            ->startOfWeek()
                                            ->addDays($loop->parent->index)
                                            ->format('Y-m-d'))
                                        ->first();
                                @endphp
                                <td>{{ $result ? $result->result_number : 'XX' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Yearly Chart -->
<section class="record-chart">
    <div class="container">
        <h2>Monthly Top Repeat Satta King Result Chart - {{ date('Y') }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark table-dark-2">
                    <tr>
                        <th>Month</th>
                        <th>Desawar</th>
                        <th>Gali</th>
                        <th>Faridabad</th>
                        <th>Ghaziabad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyTopResults as $month => $results)
                        @if(array_key_exists($month, $monthlyTopResults))
                            <tr>
                                <td>{{ $month }}</td>
                                <td>{{ $results['Desawar'] }}</td>
                                <td>{{ $results['Gali'] }}</td>
                                <td>{{ $results['Faridabad'] }}</td>
                                <td>{{ $results['Ghaziabad'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Keep the existing Lucky Numbers section -->
        <div class="container my-4 best-number">
            <h5 class="mb-3">Lucky Numbers of the Year :</h5>
            <div class="row">
                @foreach($yearlyResults->chunk(2) as $chunk)
                    <div class="col-md-6">
                        @foreach($chunk as $result)
                            <p>
                                <strong>{{ $result['name'] }}:</strong>
                                <span class="highlight-number">{{ $result['number'] }} ({{ $result['count'] }} times)</span>
                            </p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="d-flex flex-column align-items-center justify-content-center">
    <div class="messages">
      <div class="greeting" id="greeting">🍀✅ Best of Luck! ✅🍀</div>
      <div class="before-spin" id="beforeSpin">🎯 Ready to Reveal Your Lucky Number? 🎯</div>
      <div class="spinning-message" id="spinningMessage">⏳ Wait for Your Lucky Number... ⏳</div>
    </div>

    <div class="wheel-container">
      <div class="wheel" id="wheel">
        <div class="arrow"></div>
        💫
      </div>
    </div>

    <button class="btn btn-custom" onclick="spin()">Try Your Luck</button>

    <audio id="spinSound">
      <source src="https://www.soundjay.com/button/sounds/button-16.mp3" type="audio/mp3">
    </audio>
  </div>
@endsection
@push('scripts')
<script>

</script>
@endpush

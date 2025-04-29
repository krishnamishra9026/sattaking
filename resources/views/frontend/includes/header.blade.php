  <div class="container">
    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <div class="result-card-top">
        <div class="digital-clock d-flex align-items-center flex-column">
        <h1><div class="auto-greeting" id="greeting2"></div></h1>
        <div class="clock" id="clock"></div>
        <div class="date" id="date"></div>
    </div>
        </div>
      </div>

    </div>
    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <div class="result-card-top">
          @php
    // Get the latest result from all games based on game_time
    $latestGame = $games->sortByDesc('game_time')->first();
    $latestResult = $latestGame?->results->sortByDesc('result_date')->first();
@endphp

@if($latestGame && $latestResult)
    <h2>{{ $latestGame->name }}</h2> <div class="result-number">{{ $latestResult->result_number }}</div>
@endif
</div>
      </div>
    </div>
  </div>
  <!-- Record Chart Navigation -->
  <div class="record-nav">
    <a href="#weekly">Weekly Chart</a>
    <a href="#monthly">Monthly Chart</a>
    <a href="#">Old Result Chart</a>
  </div>
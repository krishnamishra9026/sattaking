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
      <tr>
        <td>Gali</td>
        <td><b>78</b></td>
        <td>11:30 PM</td>
      </tr>
      <tr>
        <td>Desawar</td>
        <td><b>94</b></td>
        <td>05:00 AM</td>
      </tr>
      <tr>
        <td>Faridabad</td>
        <td><b>55</b></td>
        <td>06:15 PM</td>
      </tr>
      <tr>
        <td>Ghaziabad</td>
        <td><b>34</b></td>
        <td>08:15 PM</td>
      </tr>
      <tr>
        <td>Shri Ganesh</td>
        <td><b>21</b></td>
        <td>04:00 PM</td>
      </tr>
    </tbody>
  </table>
</div>
<?php
function getDaySuffix($day) {
    if ($day >= 11 && $day <= 13) {
        return 'th';
    }
    switch ($day % 10) {
        case 1: return 'th';
        case 2: return 'th';
        case 3: return 'th';
        default: return 'th';
    }
}

$today = new DateTime();
$yesterday = new DateTime();
$yesterday->modify('-1 day');

// आज का दिन और तारीख
$todayDay = $today->format('D'); // Mon, Tue, etc.
$todayDate = $today->format('j');
$todaySuffix = getDaySuffix((int)$todayDate);

// कल का दिन और तारीख
$yesterdayDay = $yesterday->format('D');
$yesterdayDate = $yesterday->format('j');
$yesterdaySuffix = getDaySuffix((int)$yesterdayDate);
?>

<div class="header">
Satta King Fast Results of <?php echo date('F'); ?> <?php echo "{$yesterdayDate}{$yesterdaySuffix}"; ?>, <?php echo date('Y'); ?> & <?php echo date('F'); ?> <?php echo "{$todayDate}{$todaySuffix}"; ?> <?php echo date('Y'); ?>
</div>
<div class="container">
    <div class="row game-row games-list-header">
      <div class="col-6">
        <div class="game-title">Games List</div>
      </div>
      <div class="col-3 text-center"><?php echo "$yesterdayDay. {$yesterdayDate}{$yesterdaySuffix}"; ?></div>
      <div class="col-3 text-center"><?php echo "$todayDay. {$todayDate}{$todaySuffix}"; ?></div>
    </div>
    <div class="row game-row latest-result">
      <div class="col-6">
        <div class="game-title">OLD FARIDABAD</div>
        <div class="time">at 07:50 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">33</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row just-past-result">
      <div class="col-6">
        <div class="game-title">FARIDABAD KING</div>
        <div class="time">at 07:45 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">51</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row">
      <div class="col-6">
        <div class="game-title">DELHI STAR</div>
        <div class="time">at 07:45 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">62</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row">
      <div class="col-6">
        <div class="game-title">DELHI GOLDEN</div>
        <div class="time">at 07:45 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">99</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row">
      <div class="col-6">
        <div class="game-title">FARIDA BAZAR</div>
        <div class="time">at 07:40 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">29</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row">
      <div class="col-6">
        <div class="game-title">PARAS</div>
        <div class="time">at 07:40 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">23</div>
      <div class="col-3 text-center">XX</div>
    </div>

    <div class="row game-row">
      <div class="col-6">
        <div class="game-title">GURGAON</div>
        <div class="time">at 07:30 PM <a href="#" class="record-link">Record Chart</a></div>
      </div>
      <div class="col-3 text-center">88</div>
      <div class="col-3 text-center">XX</div>
    </div>
  </div>
  
  <!-- Record Chart Section (Date Wise) -->
  <section id="monthly" class="record-chart">
    <div class="container">
      <h2><?php echo date('F'); ?> <?php echo date('Y'); ?> - Satta King Result Chart</h2>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark table-dark-2">
            <tr>
              <th>Date</th>
              <th>Desawar</th>
              <th>Gali</th>
              <th>Faridabad</th>
              <th>Ghaziabad</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>10</td>
              <td>60</td>
              <td>59</td>
              <td>67</td>
              <td>36</td>
            </tr>
            <tr>
              <td>11</td>
              <td>55</td>
              <td>50</td>
              <td>63</td>
              <td>40</td>
            </tr>
            <tr>
              <td>12</td>
              <td>64</td>
              <td>45</td>
              <td>72</td>
              <td>38</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <!-- Left Button -->
        <a href="/march" class="animated-btn">
          March
        </a>
    
        <!-- Right Button -->
        <a href="/may" class="animated-btn">
          May
        </a>
      </div>
    </div>
    </div>
  </section>
  
  <!-- Record Chart Section (Day Wise) -->
<section id="weekly" class="record-chart">
<div class="container">
  <h2>Day Waise - Satta Network - Weekly Chart</h2>
    <div class="table-responsive">
    <table>
    <thead class="table-dark-2">
      <tr>
        <th>Day</th>
        <th>Gali</th>
        <th>Desawar</th>
        <th>Faridabad</th>
        <th>Ghaziabad</th>
        <th>Delhi Bazar</th>
        <th>Mumbai Morning</th>
        <th>Ranchi</th>
      </tr>
    </thead>
    <tbody id="chart-body">
      <!-- JavaScript will fill this -->
    </tbody>
  </table>
</div>

<!-- Yearly Chart -->
  <section class="record-chart">
    <div class="container">
      <h2>Monthly Top Repeat Satta King Result Chart - 2025</h2>
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
            <tr>
              <td>February</td>
              <td>55</td>
              <td>50</td>
              <td>63</td>
              <td>40</td>
            </tr>
            <tr>
              <td>March</td>
              <td>62</td>
              <td>57</td>
              <td>68</td>
              <td>39</td>
            </tr>
            <tr>
              <td>April</td>
              <td>59</td>
              <td>52</td>
              <td>70</td>
              <td>42</td>
            </tr>
          </tbody>
        </table>
      </div>
  <div class="container my-4 best-number">
  <h5 class="mb-3">Lucky Numbers of the Year :</h5>
  <div class="row">
    <div class="col-md-6">
      <p><strong>Desawar:</strong> <span class="highlight-number">55 (5 times)</span></p>
      <p><strong>Gali:</strong> <span class="highlight-number">50 (4 times)</span></p>
    </div>
    <div class="col-md-6">
      <p><strong>Faridabad:</strong> <span class="highlight-number">63 (3 times)</span></p>
      <p><strong>Ghaziabad:</strong> <span class="highlight-number">40 (2 times)</span></p>
    </div>
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

<?php

namespace Legacy\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\User;
use Spatie\LaravelAnalytics\LaravelAnalyticsFacade as LaravelAnalytics;

class DashboardController extends Controller
{
    private $period;
    private $limit;
    private $start;
    private $end;
    private $country;

    public function __construct() {
        $this->period = 30;
        $this->limit = 16;
        $this->end = Carbon::today();
        $this->start = Carbon::today()->subDays($this->period);
        $this->country = env('ANALYTICS_COUNTRY');
        parent::__construct();
    }

    public function index(User $users)
    {
        $users = $users->whereNotNull('last_login_at')->orderBy('last_login_at','desc')->take(5)->get();
        $stats = [
            'pages'=>LaravelAnalytics::getMostVisitedPages($this->period, $this->limit),
            'users'=>LaravelAnalytics::getActiveUsers(),
            'total_visits'=>$this->getTotalVisits()
        ];
        return view('backend.dashboard', compact('users','stats'));
    }

    private function query( $options = [ ], $metrics = 'ga:visits' ) {
        return LaravelAnalytics::performQuery($this->start, $this->end, $metrics, $options)->rows;
    }

    private function getTotalVisits() {
        $options = [
            'dimensions'=>'ga:year',
        ];
        return $this->query($options)[0][1];
    }
}

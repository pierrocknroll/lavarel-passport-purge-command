<?php

namespace Pierrocknroll\LavarelPassportPurgeCommand\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PurgeOldTokens extends Command
{
    CONST DEFAULT_DAYS = 30;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:purge {--days=' . self::DEFAULT_DAYS . ' : Number of days the tokens must be expired}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge the expired access and refresh tokens';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $days = $this->option('days');
        if (!is_numeric($days)) {
            $days = self::DEFAULT_DAYS;
        }

        $date = Carbon::now()
            ->subDays($days)
            ->toDateString();

        $this->comment('Delete tokens older than ' . $date);

        $oldAccessTokens = DB::table('oauth_access_tokens')
            ->whereDate('expires_at', '<', $date)
            ->delete();

        $this->info('Removed ' . $oldAccessTokens . ' access tokens');

        $oldRefreshTokens = DB::table('oauth_refresh_tokens')
            ->whereDate('expires_at', '<', $date)
            ->delete();

        $this->info('Removed ' . $oldRefreshTokens . ' refresh tokens');
        $this->comment('Done !');
    }
}

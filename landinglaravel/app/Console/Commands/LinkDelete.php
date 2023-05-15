<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class LinkDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:link-delete {link_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $link_id = $this->argument('link_id');
        $link = Link::find($link_id);

        if ($link === null) {
            $this->error("Invalid or non-existent link ID.");
            return 1;
        }

        if ($this->confirm('Are you sure you want to delete this link? ' . $link->url)) {
            $link->delete();
            $this->info("Link deleted.");
        }

        return 0;
    }
}

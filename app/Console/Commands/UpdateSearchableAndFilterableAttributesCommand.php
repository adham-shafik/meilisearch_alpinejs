<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MeiliSearch\Client;

class UpdateSearchableAndFilterableAttributesCommand extends Command{    
    protected $signature = 'index-settings:update';

    protected $description = 'Command description';
    public function __construct(){
        parent::__construct();
    }


    public function handle(){
        $client = new Client(config('scout.meilisearch.host'));

        $this->updateSortableAttributes($client);

        $this->updateFilterableAttributes($client);

        return Command::SUCCESS;
    }

    protected function updateSortableAttributes(Client $client){
        // $client->index('articles')->updateSortableAttributes(['title','id']);
        $this->info('Updated sortable attributes...');
    }

    protected function updateFilterableAttributes(Client $client){
        $client->index('articles')->updateFilterableAttributes(['id','title','teaser']);
        $this->info('Updated filterable attributes...');
    }

   

}


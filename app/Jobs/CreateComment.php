<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sleep = 10;

    protected $comment;
    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $article_id)
    {
        $this->comment = [
            'subject' => $subject,
            'body' => $body,
            'article_id' => $article_id,
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Comment::create($this->comment);
        }
        catch(Exception $e) {
            info($e);
        }
    }

    
    /**
     * Неудачная обработка задачи.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        info(__CLASS__ . ": ошибка выполнения");
    }
}

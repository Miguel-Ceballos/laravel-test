<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class UserImageOptimizeJob implements ShouldQueue
{
    use Queueable;

    private int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        $this->onQueue('optimize');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $image = Storage::disk('public')->url('test.jpg');
        //dd($image);
        //$image = Image::make($image)->fit(200, 200)->encode('jpg');
        //Optimize the user's profile photo
        $this->user->update([
            'profile_photo_url' => $image,
        ]);
    }
}

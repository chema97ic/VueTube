<?php

namespace Vuetube\Jobs\Videos;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Vuetube\Video;
use FFMpeg\Format\Video\X264;
use FFMpeg;

class ConvertForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(100); //360p

        $med = (new X264('aac'))->setKiloBitrate(250);

        $high = (new X264('aac'))->setKiloBitrate(500);

        FFMpeg::fromDisk('local')
        ->open($this->video->path) //Cogemos la ruta
        ->exportForHLS() //Convertimos el video para streaming
        ->onProgress(function ($percentage) {
            $this->video->update([
                'percentage' => $percentage
            ]);
        }) //trackeamos el progreso y lo actualizamos en la base de datos.
        ->addFormat($low) //Lo convertimos a las 3 distintas calidades
        ->addFormat($med)
        ->addFormat($high)
        ->save("public/videos/{$this->video->id}/{$this->video->id}.m3u8"); //m3u8 es la extension para el formato stremeable
    }
}

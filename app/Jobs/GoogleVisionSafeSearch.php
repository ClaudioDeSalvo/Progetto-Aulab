<?php

namespace App\Jobs;

use App\Models\Image;
<<<<<<< HEAD
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
=======
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
<<<<<<< HEAD
=======
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

<<<<<<< HEAD
    private $announcement_image_id;
=======

    private $announcement_image_id;
    /**
     * Create a new job instance.
     */
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

<<<<<<< HEAD

=======
    /**
     * Execute the job.
     */
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if (!$i) {
            return;
        }
<<<<<<< HEAD
        $image = file_get_contents(storage_path('app/public/' . $i->path));
        putenv('GOOGLE_APPLICATION_CREDIANTIALS=' . base_path('google_credential.json'));
=======
        $image = file_get_contents(storage_path('app/public/'.$i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

<<<<<<< HEAD

=======
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

<<<<<<< HEAD

=======
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
        $likelihoodName = [
            'text-secondary bi bi-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
<<<<<<< HEAD
            'text-danger bi bi-dash-circle-fill',
=======
            'text-danger bi bi-dash-circle-fill'
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
        ];

        $i->adult = $likelihoodName[$adult];
        $i->spoof = $likelihoodName[$spoof];
        $i->racy = $likelihoodName[$racy];
        $i->medical = $likelihoodName[$medical];
        $i->violence = $likelihoodName[$violence];
<<<<<<< HEAD
        
=======

>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
        $i->save();
    }
}

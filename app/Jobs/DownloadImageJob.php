<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DownloadImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $imageUrl;
    public $productId;

    public function __construct($imageUrl, $productId)
    {
        $this->imageUrl = $imageUrl;
        $this->productId = $productId;
    }

    public function handle()
    {
        try {
            $imageContents = Http::get($this->imageUrl)->body();
            $extension = pathinfo($this->imageUrl, PATHINFO_EXTENSION);
            $filename = 'product_' . time() . '_' . uniqid() . '.' . $extension;
            $folderPath = public_path('uploads/products');

            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $filePath = $folderPath . '/' . $filename;
            file_put_contents($filePath, $imageContents);

            // Update product image path in DB
            \App\Models\Products::where('id', $this->productId)->update(['image_path    ' => 'uploads/products/' . $filename]);
        } catch (\Exception $e) {
            // Handle errors silently
        }
    }
}
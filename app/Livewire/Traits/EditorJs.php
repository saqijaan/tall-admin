<?php

namespace App\Livewire\Traits;

use App\Contracts\HasEditorJs;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

trait EditorJs
{
    use WithFileUploads;

    /** @var TemporaryUploadedFile|string */
    public $upload = null;

    public function uploadedFileResponse(): array
    {
        // $fileUrl = $this->upload->temporaryUrl();

        if ($this instanceof HasEditorJs) {
            $fileUrl = $this->uploadFile();
        }

        $this->cleanupOldUploads();

        $this->upload = null;

        return [
            'success' => 1,
            'file' => [
                'url' => $fileUrl
            ]
        ];
    }
}

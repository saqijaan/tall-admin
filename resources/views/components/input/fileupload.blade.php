<div
    x-data="{
        pond: {},
        images: @entangle('images').live,
        maxFiles: '{{ $maxFiles }}',
        showFilepond: true,
        intializeFilepond() {
            let self = this;

            if ( this.images.length >= this.maxFiles ){
                this.showFilepond = false;
            }

            FilePond.registerPlugin(FilePondPluginImagePreview)
            FilePond.registerPlugin(FilePondPluginFileValidateSize)
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            this.createFilepond();
            
            $watch('images', (images) => {
                images = Object.values(images);
                self.showFilepond = images.length < self.maxFiles;
            })

        },
        createFilepond() {
            let self = this;
            this.pond = FilePond.create($refs.input, {
                acceptedFileTypes: @if (is_array($filetypes)) {{ json_encode($filetypes, true) }} @else ['{{ $filetypes }}'] @endif,
                imagePreviewHeight: 100,
                maxFileSize: '{{ $maxUploadSize }}KB',
                allowMultiple: {{ $multiple ? 'true' : 'false' }},
                maxFiles: '{{ $maxFiles }}',
                onprocessfile: (error, file) => {
                    if (!error) {
                        self.pond.removeFile(file.id)
                    }
                },
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    },
                },
            })
    
            window.addEventListener('pondReset', e => {
                this.pond.removeFiles();
            });
        }
    }"
    x-on:remove-images.window="this.pond.removeFiles()"
    x-init="intializeFilepond"
    wire:ignore>

    <div x-show="showFilepond">
        <input type="file" x-ref="input">
    </div>
</div>

@pushOnce('pre_alpine_js')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endPushOnce


@pushOnce('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endPushOnce
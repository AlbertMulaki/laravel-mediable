<?php

return [
    /*
     * FQCN of the model to use for media
     *
     * Should extend Frasmage\Mediable\Media::class
     */
    'model' => Frasmage\Mediable\Media::class,

    /*
     * Filesystem disk to use if none is specified
     */
    'default_disk' => 'public',

    /*
     * Filesystems that can be used for media storage
     */
    'allowed_disks' => [
        'public',
    ],

    /*
     * The maximum file size in bytes for a single uploaded file
     */
    'max_size' => 1024 * 1024 * 10,

    /*
     * What to do if a duplicate file is uploaded. Options include:
     *
     * * 'increment': the new file's name is given an incrementing suffix
     * * 'replace' : the old file and media model is deleted
     * * 'error': an Exception is thrown
     *
     */
    'on_duplicate' => \Frasmage\Mediable\MediaUploader::ON_DUPLICATE_INCREMENT,

    /*
     * Reject files unless both their mime and extension are recognized and both match a single type
     */
    'strict_type_checking' => false,

    /*
     * Reject files whose mime type or extension is not recognized
     * if true, files will be given a type of `'other'`
     */
    'allow_unrecognized_types' => false,


    'allowed_mime_types' => [],
    'allowed_extensions' => [],
    'allowed_types' => [],

    /**
     * Global list of types by recognized mime types and extensions
     */
    'types' => [
        Frasmage\Mediable\Media::TYPE_IMAGE => [
            'mime_types' => [
                'image/jpeg',
                'image/png',
                'image/gif',
            ],
            'extensions' => [
                'jpg',
                'jpeg',
                'png',
                'gif',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_IMAGE_VECTOR => [
            'mime_types' => [
                'image/svg+xml',
            ],
            'extensions' => [
                'svg',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_PDF => [
            'mime_types' => [
                'application/pdf',
            ],
            'extensions' => [
                'pdf',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_AUDIO => [
            'mime_types' => [
                'audio/aac',
                'audio/ogg',
                'audio/mpeg',
                'audio/mp3',
                'audio/mpeg',
                'audio/wav'
            ],
            'extensions' => [
                'aac',
                'ogg',
                'oga',
                'mp3',
                'wav',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_VIDEO => [
            'mime_types' => [
                'video/mp4',
                'video/mpeg',
                'video/ogg',
                'video/webm'
            ],
            'extensions' => [
                'mp4',
                'm4v',
                'mov',
                'ogv',
                'webm'
            ]
        ],
        Frasmage\Mediable\Media::TYPE_ARCHIVE => [
            'mime_types' => [
                'application/zip',
                'application/x-compressed-zip',
                'multipart/x-zip',
            ],
            'extensions' => [
                'zip',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_DOCUMENT => [
            'mime_types' => [
                'text/plain',
                'application/plain',
                'text/xml',
                'text/json',
                'application/json',
                'application/msword',
                'application/application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ],
            'extensions' => [
                'doc',
                'docx',
                'txt',
                'text',
                'xml',
                'json',
            ]
        ],
        Frasmage\Mediable\Media::TYPE_SPREADSHEET => [
            'mime_types' => [
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ],
            'extensions' => [
                'xls',
                'xlsx',
            ]
        ],
    ],

    'source_adapters' => [
        'class' => [
            Symfony\Component\HttpFoundation\File\UploadedFile::class => Frasmage\Mediable\SourceAdapters\UploadedFileAdapter::class,
            Symfony\Component\HttpFoundation\File\File::class => Frasmage\Mediable\SourceAdapters\FileAdapter::class,
        ],
        'pattern' => [
            '^https?://' => Frasmage\Mediable\SourceAdapters\RemoteUrlAdapter::class,
            '^/' => Frasmage\Mediable\SourceAdapters\LocalPathAdapter::class
        ],
    ],

    'rehydrate_media' => true,
];

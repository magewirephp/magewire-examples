<?php declare(strict_types=1);

namespace Magewirephp\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;
use Magewirephp\Magewire\Exception\AcceptableException;
use Magewirephp\Magewire\Model\Upload\UploadAdapterInterface;
use Magewirephp\Magewire\Model\Wireable\WireableFile;
use Rakit\Validation\Validator;

class FileUploader extends Component\Upload
{
    public WireableFile $photo;

    public function __construct(
        Validator $validator,
        UploadAdapterInterface $uploadAdapter,
        WireableFile $file
    ) {
        parent::__construct($validator, $uploadAdapter);

        $this->photo = $file;
    }

    public function save()
    {
        try {
            $this->validate([
                'photo' => 'uploaded_file:0,1024K,jpeg', // 1MB Max
            ]);

            $this->dispatchSuccessMessage('File is uploaded');
        } catch (AcceptableException $exception) {
            $this->dispatchErrorMessage('Something went wrong while uploading the image');
        }

        $this->photo->store('photos');
    }
}

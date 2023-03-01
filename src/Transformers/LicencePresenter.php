<?php

namespace Corals\Modules\LicenceManager\Transformers;

use Corals\Foundation\Transformers\FractalPresenter;

class LicencePresenter extends FractalPresenter
{
    /**
     * @param array $extras
     * @return LicenceTransformer|\League\Fractal\TransformerAbstract
     */
    public function getTransformer($extras = [])
    {
        return new LicenceTransformer($extras);
    }
}

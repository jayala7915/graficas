<?php

namespace App\Repositories;

use App\Models\Contenido;
use App\Repositories\BaseRepository;

/**
 * Class ContenidoRepository
 * @package App\Repositories
 * @version May 5, 2025, 4:37 am UTC
*/

class ContenidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contenido::class;
    }
}

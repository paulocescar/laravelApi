<?php

    namespace App\Http\Resources;

    use App\Models\Addresses;
    use Illuminate\Http\Resources\Json\ResourceCollection;

    Class AddressesCollection extends ResourceCollection
    {
        /**
         * Transfor request in to array
         */
        public function toArray($request)
        {
            return parent::toArray($request);
        }
    }
